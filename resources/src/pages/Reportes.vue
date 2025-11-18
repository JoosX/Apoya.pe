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
          imagenUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTq9AHQpxI0RnaV3Fo1sX0-JWxOD_cvN1lTYQ&s',
          categoria: '01',
          titulo: '¡Caritas del Perú',
          enlaceUrl: '#',
          resumen: 'Promovemos y apoyamos campañas de sensibilización sobre las causas y consecuencias de la pobreza para promover la toma de conciencia y el cambio de actitud.',
        },
        {
          imagenUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTecUPLXCYiu4lmRhqLEw6Jyu4QFNTCoLG_rw&s', 
          categoria: '02',
          titulo: 'Cruz Roja Peruana.',
          enlaceUrl: '#',
          resumen: 'Somos un movimiento humanitario mundial, ayudamos a prevenir, aliviar y mitigar el sufrimiento humano de las personas y comunidades vulnerables en caso de emergencias o desastres.',
        },
        {
          imagenUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjWjW94z9FwZ8eCD9wCaJ3vvF_YabeqwMQ7w&s',
          categoria: '03',
          titulo: 'Aldeas Infantiles SOS!',
          enlaceUrl: '#',
          resumen: 'Somos la organización de desarrollo social más grande del mundo que trabaja por la promoción y defensa de los derechos de las niñas, niños, adolescentes y jóvenes, principalmente, por el derecho a vivir en familia de aquellos que han perdido el cuidado familiar o están en riesgo de perderlo.',
        },
        {
          imagenUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTlYeFVXwsRRejrWrs_ajih5OLz2715MXW3Q&s',
          categoria: '04',
          titulo: 'Alianza del Pacifico',
          enlaceUrl: '#',
          resumen: '....',
        },
                {
          imagenUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT66HSX2zVDTfIlvHDPxIjBpO20BMGWIn87dA&s',
          categoria: '05',
          titulo: 'Transformando Corazones',
          enlaceUrl: '#',
          resumen: 'El voluntariado de Fe y Alegría en el Perú quiere aportar a la formación de personas que contribuyan a la construcción de un Perú más justo y solidario. En un enfoque humanista, el voluntariado tiene también como objetivo el crecimiento permanente de nuestro ser personas con capacidad de trascender.',
        },
      ]
    }
  }
}
</script>

<style scoped>
/* Aquí solo iría el estilo del contenedor principal, si lo necesitasn atte.romarius */
.contenedor-articulos {
  max-width: 900px;
  margin: 40px auto;
  padding: 0 20px;
}



</style>
<style scoped>
.page{ min-height:60vh; display:grid; place-items:center; color:#e8eaed; text-align:center; }
</style>
