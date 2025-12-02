<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import { RouterLink } from 'vue-router'

const current = ref(0)

const slides = [
  {
    title: 'Haz que el apoyo llegue donde se necesita',
    text: 'Reporta necesidades reales de tu barrio y conéctalas con personas dispuestas a ayudar.',
    image:
      'https://images.pexels.com/photos/6646913/pexels-photo-6646913.jpeg?auto=compress&cs=tinysrgb&w=1200',
  },
  {
    title: 'Organiza información, no solo mensajes sueltos',
    text: 'Los reportes se ordenan por tipo de ayuda, zona y estado, para que instituciones y voluntarios actúen rápido.',
    image:
      'https://images.pexels.com/photos/6646914/pexels-photo-6646914.jpeg?auto=compress&cs=tinysrgb&w=1200',
  },
  {
    title: 'Construye una comunidad solidaria',
    text: 'Apoya.pe conecta personas, organizaciones y autoridades para coordinar ayuda real y trazable.',
    image:
      'https://images.pexels.com/photos/6646907/pexels-photo-6646907.jpeg?auto=compress&cs=tinysrgb&w=1200',
  },
]

const next = () => {
  current.value = (current.value + 1) % slides.length
}
const prev = () => {
  current.value = (current.value - 1 + slides.length) % slides.length
}
const goTo = (index) => {
  current.value = index
}

let timer

onMounted(() => {
  timer = setInterval(next, 7000)
})

onBeforeUnmount(() => {
  if (timer) clearInterval(timer)
})
</script>

<template>
  <main class="home">
    <!-- PORTADA / IMAGEN SUPERIOR -->
    <section class="cover">
      <img
        class="cover-image"
        src="https://images.pexels.com/photos/6646905/pexels-photo-6646905.jpeg?auto=compress&cs=tinysrgb&w=1600"
        alt="Personas colaborando y organizando ayuda comunitaria"
      />
    </section>

    <!-- HERO PRINCIPAL -->
    <section class="hero">
      <div class="hero-text">
        <p class="badge">Plataforma ciudadana • Apoya.pe</p>

        <h1>
          Conecta ayuda
          <span>con quien más la necesita</span>
        </h1>

        <p class="lead">
          Apoya.pe te permite registrar necesidades urgentes, organizarlas por categoría
          y coordinar apoyo real entre ciudadanía, organizaciones e instituciones.
        </p>

        <div class="hero-actions">
          <RouterLink to="/reportes" class="btn primary">Ver reportes</RouterLink>
        </div>

        <ul class="metrics">
          <li>
            <strong>+120</strong>
            <span>casos atendidos</span>
          </li>
          <li>
            <strong>24/7</strong>
            <span>registro de reportes</span>
          </li>
          <li>
            <strong>Comunidad</strong>
            <span>de apoyo solidario</span>
          </li>
        </ul>
      </div>

      <!-- CARRUSEL -->
      <section class="hero-carousel" aria-label="Historias de apoyo destacadas">
        <div class="carousel">
          <div
            class="carousel-inner"
            :style="{ transform: `translateX(-${current * 100}%)` }"
          >
            <article
              v-for="(slide, index) in slides"
              :key="index"
              class="slide"
            >
              <img
                class="slide-image"
                :src="slide.image"
                :alt="slide.title"
              />
              <div class="slide-overlay">
                <h3>{{ slide.title }}</h3>
                <p>{{ slide.text }}</p>
              </div>
            </article>
          </div>

          <button class="arrow prev" type="button" @click="prev" aria-label="Anterior">
            ‹
          </button>
          <button class="arrow next" type="button" @click="next" aria-label="Siguiente">
            ›
          </button>

          <div class="dots" role="tablist">
            <button
              v-for="(slide, index) in slides"
              :key="index"
              type="button"
              class="dot"
              :class="{ active: current === index }"
              @click="goTo(index)"
              :aria-label="`Ir al slide ${index + 1}`"
            />
          </div>
        </div>
      </section>
    </section>

    <!-- CÓMO FUNCIONA -->
    <section class="how-it-works">
      <h2>¿Cómo funciona Apoya.pe?</h2>
      <p class="how-text">
        Simplificamos el flujo de información para que las necesidades no se pierdan en chats
        y redes sociales, sino que lleguen a quienes realmente pueden ayudar.
      </p>

      <div class="steps">
        <article class="step">
          <span class="step-number">1</span>
          <h3>Registra el caso</h3>
          <p>
            Describe la situación, ubicación y nivel de urgencia. Entre más claro, más fácil
            será que alguien pueda ayudarte.
          </p>
        </article>

        <article class="step">
          <span class="step-number">2</span>
          <h3>Se organiza la información</h3>
          <p>
            Los reportes se ordenan por tipo de necesidad, zona y estado, facilitando la gestión
            por organizaciones y voluntarios.
          </p>
        </article>

        <article class="step">
          <span class="step-number">3</span>
          <h3>Llega el apoyo</h3>
          <p>
            Voluntarios, instituciones u otros usuarios pueden contactar, coordinar y registrar
            el avance del apoyo brindado.
          </p>
        </article>
      </div>
    </section>
  </main>
</template>

<style scoped>
.home {
  width: 100%;
  max-width: 1120px;
  margin: 0 auto;
  padding: 2.5rem 1.5rem 3.5rem;
}

/* PORTADA / IMAGEN SUPERIOR */
.cover {
  margin-bottom: 2.2rem;
}

.cover-image {
  width: 100%;
  max-height: 320px;
  object-fit: cover;
  display: block;
  border-radius: 18px;
  border: 1px solid #22262b;
}

/* HERO */

.hero {
  display: grid;
  grid-template-columns: minmax(0, 1.2fr) minmax(0, 1fr);
  gap: 2rem;
  align-items: center;
  margin-bottom: 3rem;
}

.hero-text .badge {
  display: inline-flex;
  align-items: center;
  gap: 0.4rem;
  padding: 0.25rem 0.8rem;
  border-radius: 999px;
  border: 1px solid #22262b;
  background: #10141a;
  font-size: 0.75rem;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: #9ba4b5;
}

.hero-text h1 {
  margin-top: 1rem;
  font-size: clamp(2rem, 3vw + 1rem, 2.8rem);
  line-height: 1.1;
}

.hero-text h1 span {
  display: block;
  color: #41b883;
}

.lead {
  margin-top: 1rem;
  color: #c3cad5;
  font-size: 0.98rem;
  max-width: 36rem;
}

.hero-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 0.75rem;
  margin-top: 1.5rem;
}

.btn {
  border-radius: 999px;
  padding: 0.55rem 1.2rem;
  font-size: 0.9rem;
  border: 1px solid #22262b;
  cursor: pointer;
  text-decoration: none;
  transition: 0.15s ease-in-out;
}

.primary {
  background: #41b883;
  color: #0f1115;
}

.primary:hover {
  background: #2e8f69;
}

.metrics {
  margin: 1.8rem 0 0;
  padding: 0;
  list-style: none;
  display: flex;
  flex-wrap: wrap;
  gap: 1.5rem;
  font-size: 0.85rem;
  color: #9ba4b5;
}

.metrics li {
  display: flex;
  flex-direction: column;
  gap: 0.2rem;
}

.metrics strong {
  font-size: 1.2rem;
  color: #e8eaed;
}

/* CAROUSEL */

.hero-carousel {
  position: relative;
}

.carousel {
  position: relative;
  border-radius: 16px;
  overflow: hidden;
  border: 1px solid #22262b;
  background: radial-gradient(circle at top, #1a2533, #0f1115);
}

.carousel-inner {
  display: flex;
  transition: transform 0.5s ease-in-out;
}

.slide {
  min-width: 100%;
  position: relative;
}

.slide-image {
  width: 100%;
  height: 260px;
  object-fit: cover;
  display: block;
  filter: brightness(0.85);
}

.slide-overlay {
  position: absolute;
  inset: 0;
  padding: 1.25rem;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  background: linear-gradient(to top, rgba(4, 7, 11, 0.8), transparent 55%);
}

.slide-overlay h3 {
  margin: 0 0 0.3rem;
  font-size: 1rem;
}

.slide-overlay p {
  margin: 0;
  font-size: 0.85rem;
  color: #d0d7e2;
  max-width: 18rem;
}

.arrow {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  border: none;
  width: 32px;
  height: 32px;
  border-radius: 999px;
  background: rgba(9, 11, 16, 0.7);
  color: #e8eaed;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  transition: background 0.15s ease-in-out;
}

.arrow:hover {
  background: rgba(9, 11, 16, 0.95);
}

.prev {
  left: 10px;
}

.next {
  right: 10px;
}

.dots {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 10px;
  display: flex;
  justify-content: center;
  gap: 6px;
}

.dot {
  width: 8px;
  height: 8px;
  border-radius: 999px;
  border: none;
  background: rgba(255, 255, 255, 0.35);
  cursor: pointer;
  padding: 0;
}

.dot.active {
  width: 18px;
  background: #41b883;
}

/* CÓMO FUNCIONA */

.how-it-works {
  border-top: 1px solid #22262b;
  padding-top: 2.5rem;
}

.how-it-works h2 {
  font-size: 1.4rem;
  margin-bottom: 0.6rem;
}

.how-text {
  max-width: 38rem;
  font-size: 0.95rem;
  color: #c3cad5;
  margin-bottom: 1.8rem;
}

/* NUEVO DISEÑO DE TARJETAS / RESPONSIVE */
.steps {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 1.5rem;
}

.step {
  background: #11151b;
  border-radius: 14px;
  border: 1px solid #22262b;
  padding: 1.35rem 1.35rem 1.45rem;
  color: #dce3eb;
  transition: 0.25s ease;
}

.step:hover {
  background: #161c24;
  transform: translateY(-3px);
}

.step-number {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  background: #1f2933;
  color: #41b883;
  font-weight: 700;
  font-size: 0.9rem;
  margin-bottom: 0.7rem;
}

.step h3 {
  margin: 0 0 0.45rem;
  font-size: 1rem;
  color: #ffffff;
}

.step p {
  margin: 0;
  font-size: 0.9rem;
  color: #b7c2d1;
  line-height: 1.45;
}

/* RESPONSIVE */

@media (max-width: 900px) {
  .hero {
    grid-template-columns: minmax(0, 1fr);
  }

  .hero-carousel {
    margin-top: 1.5rem;
  }

  .slide-image {
    height: 220px;
  }
}

@media (max-width: 640px) {
  .home {
    padding-inline: 1rem;
  }

  .metrics {
    gap: 1rem;
  }
}
</style>
