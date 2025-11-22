<template>
  <main class="home-page"> 
    <h1 class="page-title">Descubre Nuestras Organizaciones Destacadas</h1> 
    
    <section class="contenedor-articulos">
      
      <article 
        v-for="articulo in articulosData" 
        :key="articulo.id"
        class="articulo-card"
      >
        <div class="card-image-wrapper">
          <img 
            :src="articulo.imagenUrl" 
            :alt="articulo.titulo" 
            class="card-image" 
            loading="lazy"

          >
          <span class="card-category">{{ articulo.categoria }}</span>
        </div>
        
        <div class="card-content">
          <h3 class="card-title">{{ articulo.titulo }}</h3>
          <p class="card-summary">{{ articulo.resumen }}</p>
          <a :href="articulo.enlaceUrl" class="card-link" target="_blank" rel="noopener noreferrer">
            Saber más 
            <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="5" y1="12" x2="19" y2="12"></line>
              <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
          </a>
        </div>
      </article>
      
      <p v-if="!articulosData.length" class="no-articulos-msg">
        No hay organizaciones disponibles para mostrar en este momento.
      </p>
    </section>
  </main>
</template>

<script>
export default {
  name: 'HomePage',
  data() {
    return {
      articulosData: [
        { id: 1, imagenUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTq9AHQpxI0RnaV3Fo1sX0-JWxOD_cvN1lTYQ&s', categoria: '01', titulo: '¡Caritas del Perú', enlaceUrl: '#', resumen: 'Promovemos y apoyamos campañas de sensibilización sobre las causas y consecuencias de la pobreza para promover la toma de conciencia y el cambio de actitud.' },
        { id: 2, imagenUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTecUPLXCYiu4lmRhqLEw6Jyu4QFNTCoLG_rw&s', categoria: '02', titulo: 'Cruz Roja Peruana.', enlaceUrl: '#', resumen: 'Somos un movimiento humanitario mundial, ayudamos a prevenir, aliviar y mitigar el sufrimiento humano de las personas y comunidades vulnerables en caso de emergencias o desastres.' },
        { id: 3, imagenUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjWjW94z9FwZ8eCD9wCaJ3vvF_YabeqwMQ7w&s', categoria: '03', titulo: 'Aldeas Infantiles SOS!', enlaceUrl: '#', resumen: 'Somos la organización de desarrollo social más grande del mundo que trabaja por la promoción y defensa de los derechos de las niñas, niños, adolescentes y jóvenes, principalmente, por el derecho a vivir en familia de aquellos que han perdido el cuidado familiar o están en riesgo de perderlo.' },
        { id: 4, imagenUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTlYeFVXwsRRejrWrs_ajih5OLz2715MXW3Q&s', categoria: '04', titulo: 'Alianza del Pacifico', enlaceUrl: '#', resumen: 'un área de integración profunda que busca alcanzar la libre circulación de bienes, servicios, capitales y personas e impulsar un mayor crecimiento, desarrollo y competitividad de las economías de las Partes.' },
        { id: 5, imagenUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRBpZwI3ll45ekwAPaAl8a08sxECSfRR5YNQ&s', categoria: '05', titulo: 'Transformando Corazones', enlaceUrl: '#', resumen: 'El voluntariado de Fe y Alegría en el Perú quiere aportar a la formación de personas que contribuyan a la construcción de un Perú más justo y solidario. En un enfoque humanista, el voluntariado tiene también como objetivo el crecimiento permanente de nuestro ser personas con capacidad de trascender.', },
      ]
    }
  },
  methods: {
    // Ejemplo de cómo manejaríamos srcset si tuvieras múltiples tamaños de imagen
    getResponsiveImageSrcset(baseUrl) {
      // Esto es solo un placeholder. En un caso real, necesitarías generar
      // o mapear tus URLs a diferentes resoluciones (e.g., small, medium, large)
      // Ejemplo: return `${baseUrl}-sm.jpg 480w, ${baseUrl}-md.jpg 800w, ${baseUrl}-lg.jpg 1200w`;
      return baseUrl; // Por ahora, devuelve la base URL si no tienes versiones
    }
  }
}
</script>

<style scoped>
/* ======================================= */
/* ESTILOS GLOBALES / HOME-PAGE (Dark Mode)*/
/* ======================================= */

.home-page {
  background-color: #0d0d0d; /* Un negro más profundo */
  padding: 60px 0; /* Más espacio vertical */
  min-height: 100vh;
  font-family: 'Inter', sans-serif; /* Usando Inter para un look más moderno */
  color: #e0e0e0; /* Color de texto base más claro */
}

/* Título de la página */
.page-title {
  text-align: center;
  font-size: 3.2rem; /* Título un poco más grande */
  color: #f0f0f0; /* Blanco puro para el título */
  margin-bottom: 70px; /* Más espacio debajo */
  font-weight: 800; /* Más audaz */
  letter-spacing: -1px; /* Espaciado ajustado */
  text-shadow: 0 4px 15px rgba(0, 0, 0, 0.4); /* Sombra más pronunciada */
}

/* Contenedor de las tarjetas - CSS Grid */
.contenedor-articulos {
  max-width: 1300px; /* Ancho un poco mayor */
  margin: 0 auto; 
  padding: 0 30px; /* Más padding horizontal */
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); /* Tarjetas un poco más grandes */
  gap: 35px; /* Más espacio entre tarjetas */
  justify-content: center; 
  align-items: stretch; 
}

/* ======================================= */
/* ESTILOS DE LA TARJETA (Dark Mode - Refinado) */
/* ======================================= */

.articulo-card {
  
  background: rgba(30, 30, 30, 0.85); 
  border: 1px solid rgba(60, 60, 60, 0.4); 
  border-radius: 18px;
  overflow: hidden; 

  box-shadow: 0 12px 28px rgba(0, 0, 0, 0.6), 0 0 0 1px rgba(255, 255, 255, 0.05); 
  transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1), box-shadow 0.4s cubic-bezier(0.25, 0.8, 0.25, 1); 
  display: flex;
  flex-direction: column; 
  height: 100%; 
  /* Efecto de fondo sutil al pasar el ratón */
  position: relative;
  z-index: 1; /* Para la sombra */
}

.articulo-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(145deg, rgba(66, 165, 245, 0.05), rgba(0, 123, 255, 0.03));
  opacity: 0;
  transition: opacity 0.4s ease;
  border-radius: 18px;
  z-index: -1;
}

.articulo-card:hover {
  transform: translateY(-12px); /* Un poco más de elevación */
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.8), 0 0 0 2px #007bff; /* Sombra más intensa y borde de acento */
}

.articulo-card:hover::before {
  opacity: 1; /* Mostrar gradiente al hover */
}


.card-image-wrapper {
  position: relative;
  width: 100%;
  padding-top: 60%; 
  overflow: hidden;
  /* Borde inferior suave para la imagen */
  border-bottom: 1px solid rgba(60, 60, 60, 0.2); 
}

.card-image {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover; 
  transition: transform 0.5s cubic-bezier(0.25, 0.8, 0.25, 1); 
  filter: brightness(0.95);
}

.articulo-card:hover .card-image {
  transform: scale(1.08); /* Zoom un poco más pronunciado */
  filter: brightness(1.05); /* Ligeramente más brillante al hover */
}

/* Categoría superpuesta */
.card-category {
  position: absolute;
  top: 20px; /* Un poco más abajo */
  right: 20px; /* Un poco más a la derecha */
  background: linear-gradient(45deg, #41b883, #2979ff); /* Gradiente para la categoría */
  color: #fff;
  padding: 6px 14px; /* Más padding */
  border-radius: 25px; /* Más redondeado */
  font-size: 0.9rem; /* Un poco más grande */
  font-weight: 700;
  letter-spacing: 0.5px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
}

/* Contenido de texto */
.card-content {
  padding: 25px 30px 30px; /* Más padding */
  display: flex;
  flex-direction: column;
  flex-grow: 1; 
}

.card-title {
  font-size: 1.7rem; /* Título más grande */
  color: #ffffff; 
  margin-bottom: 19px; 
  line-height: 1.4;
  font-weight: 700;
}

.card-summary {
  font-size: 1.05rem; /* Un poco más grande */
  color: #c0c0c0; /* Gris más claro */
  line-height: 1.7;
  margin-bottom:40px; /* Más espacio */
  flex-grow: 1; 
}

/* Enlace "Saber más" */
.card-link {
  display: inline-flex; 
  align-items: center;
  color: #41b883; /* Azul de acento */
  text-decoration: none;
  font-weight: 600;
  font-size: 1.05rem;
  transition: color 0.3s ease, transform 0.3s ease;
  border-bottom: none; /* Efecto de subrayado */
  padding-bottom: 2px;
}

.card-link:hover {
  color: #90caf9; /* Azul más claro al hover */
  transform: translateX(5px); /* Desplazamiento del texto */
  border-color: #64b5f6;
}

.arrow-icon {
  margin-left: 10px; /* Más espacio para el ícono SVG */
  width: 20px; /* Tamaño del ícono */
  height: 20px;
  stroke: currentColor; /* El ícono hereda el color del texto */
  transition: transform 0.3s ease;
}

.card-link:hover .arrow-icon {
  transform: translateX(8px); /* Desplazamiento del ícono */
}

/* Mensaje de no artículos */
.no-articulos-msg {
  grid-column: 1 / -1; 
  text-align: center;
  padding: 60px;
  font-size: 1.3rem;
  color: #a0a0a0;
  background-color: #1e1e1e; /* Fondo adaptado */
  border-radius: 12px;
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
  margin-top: 40px;
}
</style>