<template>
  <section class="contenedor-articulos">
    
    <ArticuloCard 
      v-for="(articulo, index) in articulosData" 
      :key="index"
      :articulo="articulo"
    />
  </section>
</template>

<script>
import ArticuloCard from '../components/ArticuloCard.vue';

export default {
  name: 'HomePage',
  components: {
    ArticuloCard // Registramos el componente que vamos a usar
  },
  data() {
    return {
      
      articulosData: [
        {
          imagenUrl: '/Sprunkos.png',
          categoria: '01',
          titulo: '¡El Voluntariado más conocido y querido por y para los jovenes está de vuelta!',
          enlaceUrl: '#',
          resumen: 'Queremos que te vuelvas a unir a las actividades que puedas hacia niños....',
        },
        {
          imagenUrl: '/img/voluntariado2.jpg', 
          categoria: '02',
          titulo: 'Se solicita personas interesadas en ayudar en...',
          enlaceUrl: '#',
          resumen: '.....',
        },
        {
          imagenUrl: '/img/voluntariado3.jpg',
          categoria: '03',
          titulo: 'El programa de voluntariado nacional está buscandote!',
          enlaceUrl: '#',
          resumen: '....',
        },
        {
          imagenUrl: '/img/voluntariado3.jpg',
          categoria: '04',
          titulo: 'El programa de voluntariado nacional está buscandote!',
          enlaceUrl: '#',
          resumen: '....',
        },
                {
          imagenUrl: '/img/voluntariado3.jpg',
          categoria: '05',
          titulo: 'El programa de voluntariado nacional está buscandote!',
          enlaceUrl: '#',
          resumen: '....',
        },
      ]
    }
  }
}
</script>

<style scoped>
/* Aquí solo iría el estilo del contenedor principal, si lo necesitas */
.contenedor-articulos {
  max-width: 900px;
  margin: 40px auto;
  padding: 0 20px;
}



</style>
<style scoped>
.page{ min-height:60vh; display:grid; place-items:center; color:#e8eaed; text-align:center; }
</style>
