<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'

const current = ref(0)
const images = [
  'https://media.gettyimages.com/id/1202283060/es/v%C3%ADdeo/diversos-voluntarios-empacando-cajas-de-donaci%C3%B3n-en-banco-de-alimentos-de-caridad.jpg?s=640x640&k=20&c=s9rCbhFyE4Z_NEIeyxWNFs_3oqanRmBnftvUaaopHAI=',
  'https://media.gettyimages.com/id/1404630980/es/v%C3%ADdeo/manos-colocando-latas-y-frascos-en-cajas-de-donaci%C3%B3n.jpg?s=640x640&k=20&c=r8tgSHFoGR-Q-fyTzO75-FKQpwh8_ZbCdq6XSFKK5M0=',
  'https://img.freepik.com/foto-gratis/diferentes-personas-haciendo-trabajo-voluntario-comida_23-2149012169.jpg?semt=ais_hybrid&w=740&q=80',
  'https://media.gettyimages.com/id/1211192415/es/v%C3%ADdeo/volunteers-feed-diverse-group-of-homeless-people-and-serve-food-at-venice-beach-in-los.jpg?s=640x640&k=20&c=nWBptJSU8I9gtTLo2HqbKyeEcWTJK_zfbOc1IySpG7c='
]

const next = () => { current.value = (current.value + 1) % images.length }
const prev = () => { current.value = (current.value - 1 + images.length) % images.length }

let timer
onMounted(() => { timer = setInterval(next, 5000) })
onBeforeUnmount(() => clearInterval(timer))
</script>

<template>
  <div class="page">
    <!-- Hero -->
    <main class="hero">
      <div class="box">
        <h1>Conecta ayuda con quien la necesita</h1>
        <p>Inscríbete para participar en ONGs, asociaciones y campañas solidarias.</p>
      </div>
    </main>

    <!-- Carrusel -->
    <section class="carousel-section">
      <h2>Proyectos de apoyo en acción</h2>

      <div class="carousel" @mouseenter="clearInterval(timer)" @mouseleave="timer = setInterval(next, 5000)">
        <div class="track" :style="{ transform: `translateX(-${current * 100}%)` }">
          <div v-for="(img, i) in images" :key="i" class="slide">
            <img :src="img" alt="Imagen de apoyo" />
          </div>
        </div>

        <button class="arrow left" @click="prev">❮</button>
        <button class="arrow right" @click="next">❯</button>
      </div>
    </section>
  </div>
</template>

<style>
:root{ --bg:#0f1115; --text:#e8eaed; --muted:#a0a7af; }

.page{ background:var(--bg); color:var(--text); min-height:100vh; }

.hero{
  width:100%; min-height:calc(100vh - 72px);
  display:flex; align-items:center; justify-content:center; text-align:center;
  background: radial-gradient(1200px 600px at 50% -10%, #1b2127 0%, rgba(27,33,39,0) 60%);
}
.box{ padding:0 40px; }
h1{ font-size:clamp(32px,6vw,56px); margin:0 0 12px; }
p{ margin:0 auto; max-width:720px; font-size:clamp(16px,2.5vw,20px); color:var(--muted); }

.carousel-section{ padding:60px 0; text-align:center; }
.carousel-section h2{ color:#41b883; margin-bottom:1.25rem; font-size:1.8rem; }

.carousel{ position:relative; max-width:1100px; margin:0 auto; overflow:hidden; border-radius:14px; }
.track{ display:flex; transition:transform .6s ease; }
.slide{ min-width:100%; height:420px; }
.slide img{ width:100%; height:100%; object-fit:cover; display:block; }

.arrow{
  position:absolute; top:50%; transform:translateY(-50%);
  background:rgba(15,17,21,.7); color:#e8eaed; border:none;
  width:44px; height:44px; border-radius:50%; cursor:pointer; font-size:22px;
}
.arrow.left{ left:10px; } .arrow.right{ right:10px; }
.arrow:hover{ background:rgba(15,17,21,.9); }


/* El contenedor del carrusel no debe superar el viewport */
.carousel{
  width: min(1100px, 100%);
  margin: 0 auto;
  overflow: hidden;       /* ya lo tenías, refuerzo */
}

/* Por si el hero crea un desborde por el gradiente */
.hero{ overflow-x: hidden; }

</style>
