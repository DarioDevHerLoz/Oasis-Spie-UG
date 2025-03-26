import { src, dest, watch, parallel } from 'gulp';
import * as dartSass from 'sass';
import gulpSassFactory from 'gulp-sass';
const gulpSass = gulpSassFactory(dartSass);

import plumber from 'gulp-plumber';
import autoprefixer from 'autoprefixer';
import postcss from 'gulp-postcss';
import sourcemaps from 'gulp-sourcemaps';
import cache from 'gulp-cache';
import imageminLib from 'gulp-imagemin';
const imagemin = imageminLib.default; // Necesario por ser ESM
import webp from 'gulp-webp';
import avif from 'gulp-avif';
import terser from 'gulp-terser-js';
import concat from 'gulp-concat';
import rename from 'gulp-rename';
import webpackStream from 'webpack-stream';

const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    imagenes: 'src/img/**/*.{png,jpg,jpeg}'
};

function css() {
    return src(paths.scss)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(gulpSass({ outputStyle: 'expanded' }))
        .pipe(postcss([autoprefixer()]))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('public/build/css'));
}

function javascript() {
    return src(paths.js)
        .pipe(webpackStream({
            module: {
                rules: [
                    {
                        test: /\.css$/i,
                        use: ['style-loader', 'css-loader']
                    }
                ]
            },
            mode: 'production',
            watch: true,
            entry: './src/js/app.js'
        }))
        .pipe(sourcemaps.init())
        .pipe(terser())
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('public/build/js'));
}

function imagenes() {
    return src(paths.imagenes)
        .pipe(cache(imagemin({ optimizationLevel: 3 })))
        .pipe(dest('public/build/img'));
}

function versionWebp() {
    return src(paths.imagenes)
        .pipe(webp({ quality: 50 }))
        .pipe(dest('public/build/img'));
}

function versionAvif() {
    return src(paths.imagenes)
        .pipe(avif({ quality: 50 }))
        .pipe(dest('public/build/img'));
}

function dev() {
    watch(paths.scss, css);
    watch(paths.js, javascript);
    watch(paths.imagenes, parallel(imagenes, versionWebp, versionAvif));
}

export { css, javascript as js, imagenes, versionWebp, versionAvif, dev };
export default parallel(css, imagenes, versionWebp, versionAvif, javascript, dev);
