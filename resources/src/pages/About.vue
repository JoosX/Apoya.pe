<template>
  <section class="about">
    <h1>Conoce a nuestro equipo</h1>

    <div class="list">
      <article class="card" v-for="(p, i) in team" :key="i">
        <img class="photo" :src="p.photo" :alt="p.name" />
        <div class="info">
          <h2>{{ p.name }}</h2>
          <p class="role">{{ p.role }}</p>
          <p class="bio">{{ p.bio }}</p>
        </div>
      </article>
    </div>
  </section>
</template>

<script setup>
const team = [
  {
    name: 'Romario Anchaise',
    role: 'Desarrollador Web',
    bio: 'frontend developer',
    photo: new URL('./romario.jpg', import.meta.url).href

  },
  {
    name: 'Gustavo Bailon',
    role: 'Desarrollador Web',
    bio: 'Crea herramientas para conectar voluntarios con organizaciones.',
    photo: new URL('./gustavo.png', import.meta.url).href
  },
  {
    name: 'David Puma',
    role: 'Backend Developer',
    bio: 'MySQL , php',
    photo: new URL('./DavidPuma.png', import.meta.url).href
  },
  {
    name: 'David Chambi',
    role: 'Backend',
    bio: 'MySQL',
    photo: new URL('./DavidChambi.png', import.meta.url).href
  },
  {
    name: 'Daniel Ortecho',
    role: 'Gestoro de Proyectos, Backend',
    bio: 'My SQL',
    photo: 'https://previews.123rf.com/images/ahasoft2000/ahasoft20001607/ahasoft2000160700517/60514582-engineer-icon-vector-style-is-flat-iconic-symbol-with-rounded-angles-black-color-white-background.jpg'
  }
]
</script>

<style scoped>
.about{
  min-height:100vh;
  background:#0f1115;
  color:#e8eaed;
  padding:60px 20px;
}
.about h1{
  text-align:center;
  color:#41b883;
  font-size:2rem;
  margin-bottom:32px;
}

/* Lista de perfiles */
.list{
  max-width:1080px;
  margin:0 auto;
  display:flex;
  flex-direction:column;
  gap:18px;
}

/* Tarjeta: foto izquierda + info derecha */
.card{
  background:#1b2127;
  border:1px solid #22262b;
  border-radius:14px;
  padding:18px;
  display:flex;
  gap:18px;
  align-items:center;
  transition:transform .25s ease, box-shadow .25s ease;
}
.card:hover{
  transform:translateY(-3px);
  box-shadow:0 12px 30px rgba(0,0,0,.35);
}

.photo{
  width:120px;
  height:120px;
  border-radius:12px;     /* cuadrado con esquinas redondeadas */
  object-fit:cover;
  flex-shrink:0;
  border:3px solid #41b883;
}

.info h2{
  margin:0 0 4px;
  font-size:1.2rem;
  color:#e8eaed;
}
.role{
  margin:0 0 8px;
  color:#9aa3ab;
  font-style:italic;
}
.bio{
  margin:0;
  color:#c9d1d9;
  line-height:1.4;
}

/* Responsive: apilar en móvil */
@media (max-width: 680px){
  .card{ flex-direction:column; text-align:center; }
  .photo{ width:140px; height:140px; }
}
</style>
