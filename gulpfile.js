const { src, dest, watch, parallel } = require('gulp');
const dartSass = require('sass');
const gulpSassFactory = require('gulp-sass');
const gulpSass = gulpSassFactory(dartSass);

const plumber = require('gulp-plumber');
const autoprefixer = require('autoprefixer');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');
const cache = require('gulp-cache');
const imagemin = require('gulp-imagemin');
const webp = require('gulp-webp');
const avif = require('gulp-avif');
const terser = require('gulp-terser-js');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const webpackStream = require('webpack-stream');

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

// Exportaciones para Gulp
exports.css = css;
exports.js = javascript;
exports.imagenes = imagenes;
exports.versionWebp = versionWebp;
exports.versionAvif = versionAvif;
exports.dev = dev;
exports.default = parallel(css, imagenes, versionWebp, versionAvif, javascript, dev);
