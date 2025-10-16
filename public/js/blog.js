// ====== Datos ficticios (puedes reemplazar por tu API) ======
const POSTS = [
  {
    id: "tips_estudiante",
    title: "10 Tips para Productividad como estudiante",
    excerpt:
      "La inteligencia artificial está evolucionando rápidamente. Descubra cómo la IA modelará nuestro futuro y transformará diversas industrias.",
    author: "Juan Hernandez",
    date: "4 marzo 2024",
    category: "Productividad",
    image:
      "https://images.unsplash.com/photo-1518779578993-ec3579fee39f?q=80&w=1600&auto=format&fit=crop",
    hero:
      "https://images.unsplash.com/photo-1515879218367-8466d910aaa4?q=80&w=1400&auto=format&fit=crop",
    content: [
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse potenti. Proin malesuada orci id tristique gravida.",
      "Aliquam erat volutpat. Quisque ornare, quam nec fermentum lacinia, massa libero lobortis libero, ac iaculis tortor orci at sapien.",
      "Mauris pharetra, ipsum a finibus finibus, velit consectetur arcu, ligula iaculis eros orci ac orci. Pellentesque quis urna ut justo bibendum, ut consequat arcu dictum."
    ]
  },
  {
    id: "ia_industria",
    title: "Cómo la IA está cambiando la industria",
    excerpt:
      "Tendencias y casos reales de uso para incrementar la eficiencia operativa en manufactura.",
    author: "Ana López",
    date: "7 marzo 2024",
    category: "Tecnología",
    image:
      "https://images.unsplash.com/photo-1504384308090-c894fdcc538d?q=80&w=1600&auto=format&fit=crop",
    hero:
      "https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?q=80&w=1400&auto=format&fit=crop",
    content: [
      "Integer finibus urna at risus vehicula, vitae accumsan magna pulvinar.",
      "Sed rhoncus, enim in volutpat eleifend, magna sapien varius lacus, at dapibus arcu magna sed lorem."
    ]
  },
  {
    id: "habitos_eficientes",
    title: "Hábitos eficientes para equipos remotos",
    excerpt:
      "Prácticas diarias que mejoran la colaboración y reducen el burnout.",
    author: "Carlos Pérez",
    date: "12 marzo 2024",
    category: "Cultura",
    image:
      "https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=1600&auto=format&fit=crop",
    hero:
      "https://images.unsplash.com/photo-1522199710521-72d69614c702?q=80&w=1400&auto=format&fit=crop",
    content: [
      "Donec non libero sit amet lacus posuere bibendum.",
      "Curabitur vehicula, elit nec gravida molestie, purus metus tempor mauris, non efficitur arcu eros in velit."
    ]
  }
];

// ====== Helpers de UI ======
const $ = (sel, parent = document) => parent.querySelector(sel);
const $$ = (sel, parent = document) => [...parent.querySelectorAll(sel)];

// Rutas súper simples con hash
window.addEventListener("hashchange", router);
window.addEventListener("load", () => {
  buildCarousel();
  buildGrid();
  router(); // por si entran con #/post/...
  initCarousel();
});

// ====== Render: Home ======
function buildCarousel() {
  const track = $("#carouselTrack");
  const dots = $("#carouselDots");
  track.innerHTML = "";
  dots.innerHTML = "";

  POSTS.forEach((p, i) => {
    const slide = document.createElement("article");
    slide.className = "carousel__slide";
    slide.innerHTML = `
      <img class="carousel__img" src="${p.image}" alt="${p.title}" loading="lazy">
      <div class="carousel__overlay">
        <span class="badge">${p.category}</span>
        <h3 class="carousel__title">${p.title}</h3>
        <p class="carousel__excerpt">${p.excerpt}</p>
        <div class="meta">
          <span>${p.author}</span>
          <span>${p.date}</span>
        </div>
      </div>
    `;
    slide.addEventListener("click", () => navigateToPost(p.id));
    track.appendChild(slide);

    const dot = document.createElement("button");
    dot.className = "carousel__dot" + (i === 0 ? " is-active" : "");
    dot.addEventListener("click", () => goToSlide(i));
    dots.appendChild(dot);
  });
}

function buildGrid() {
  const grid = $("#postsGrid");
  grid.innerHTML = "";
  POSTS.forEach((p) => {
    const card = document.createElement("article");
    card.className = "card";
    card.innerHTML = `
      <div class="card__media">
        <img class="card__img" src="${p.image}" alt="${p.title}" loading="lazy">
      </div>
      <div class="card__body">
        <div class="meta">${p.date} · ${p.author}</div>
        <h4 class="card__title">${p.title}</h4>
        <p class="card__excerpt">${p.excerpt}</p>
      </div>
    `;
    card.addEventListener("click", () => navigateToPost(p.id));
    grid.appendChild(card);
  });
}

// ====== Render: Detalle ======
function renderDetail(postId) {
  const p = POSTS.find((x) => x.id === postId);
  if (!p) return;

  const host = $("#detailPost");
  host.innerHTML = `
    <h1 class="post__title">${p.title}</h1>
    <div class="post__meta">${p.author} · ${p.date}</div>
    <img class="post__hero" src="${p.hero}" alt="${p.title}">
    <div class="post__content">
      ${p.content.map((para) => `<p>${para}</p>`).join("")}
    </div>
  `;
}

// ====== Navegación ======
function navigateToPost(id) {
  location.hash = `#/post/${id}`;
}
$("#backBtn").addEventListener("click", (e) => {
  e.preventDefault();
  location.hash = "#/";
});

function router() {
  const hash = location.hash || "#/";
  const home = $("#homeView");
  const detail = $("#detailView");

  if (hash.startsWith("#/post/")) {
    const id = hash.split("/").pop();
    renderDetail(id);
    home.hidden = true;
    detail.hidden = false;
    window.scrollTo({ top: 0, behavior: "instant" });
  } else {
    home.hidden = false;
    detail.hidden = true;
  }
}

// ====== Lógica del carrusel ======
let current = 0;
let intervalId = null;

function goToSlide(index) {
  const track = $("#carouselTrack");
  const slides = $$(".carousel__slide", track);
  const dots = $$(".carousel__dot", $("#carouselDots"));
  if (!slides.length) return;

  current = (index + slides.length) % slides.length;
  track.style.transform = `translateX(-${current * 100}%)`;
  dots.forEach((d, i) => d.classList.toggle("is-active", i === current));
}

function nextSlide(step = 1) {
  goToSlide(current + step);
}

function initCarousel() {
  $(".carousel .prev").addEventListener("click", () => {
    nextSlide(-1);
    restartAutoplay();
  });
  $(".carousel .next").addEventListener("click", () => {
    nextSlide(1);
    restartAutoplay();
  });

  startAutoplay();
  // pausa al pasar el mouse (opcional)
  const carousel = $(".carousel");
  carousel.addEventListener("mouseenter", stopAutoplay);
  carousel.addEventListener("mouseleave", startAutoplay);
}

function startAutoplay() {
  stopAutoplay();
  intervalId = setInterval(() => nextSlide(1), 5000);
}
function stopAutoplay() {
  if (intervalId) clearInterval(intervalId);
}
function restartAutoplay() {
  stopAutoplay();
  startAutoplay();
}
