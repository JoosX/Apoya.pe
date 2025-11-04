<template>
  <article class="articulo-card">
    <div class="articulo-imagen">
      <img :src="articulo.imagenUrl" :alt="articulo.titulo">
    </div>

    <div class="articulo-contenido">
      <span class="categoria">{{ articulo.categoria }}</span>
      <h2 class="titulo-articulo">
        <a :href="articulo.enlaceUrl">{{ articulo.titulo }}</a>
      </h2>
      <p class="resumen">
        {{ articulo.resumen }}
      </p>
    </div>
  </article>
</template>

<script>
export default {
  name: 'ArticuloCard', // Nombre del componente

  // Definimos las propiedades (props) que este componente espera recibir
  props: {
    // Definimos una prop llamada 'articulo' que será un Objeto
    articulo: {
      type: Object,
      required: true, // Debe ser obligatoria
      default: () => ({}) // Valor por defecto si no se pasa nada
    }
  }
}

</script>

<style scoped>
.articulo-card {
    /* CLAVE: Usa Flexbox para alinear la imagen y el contenido horizontalmente */
    display: flex; 
    align-items: flex-start; /* Alinea los ítems desde arriba */
    
    margin: 20px 0;
    padding-bottom: 20px;
    border-bottom: 1px solid #444; /* Línea separadora */
}

/* Contenedor de la imagen */
.articulo-imagen {
    /* Define un tamaño fijo para la imagen */
    width: 150px; 
    height: 100px; /* Asegura un aspecto fijo */
    margin-right: 15px;
    
    /* Hace que la imagen no se encoja */
    flex-shrink: 0; 
    
    /* Opcional: Para el borde que se ve en tu imagen original */
    border: 1px solid #555; 
    overflow: hidden;
}

.articulo-imagen img {
    /* La imagen debe ocupar todo el contenedor */
    width: 100%;
    height: 100%;
    /* CLAVE: Corta o ajusta la imagen sin distorsión */
    object-fit: cover; 
}

/* Contenido de texto */
.articulo-contenido {
    flex-grow: 1; /* Permite que el contenido ocupe el espacio restante */
}

.categoria {
    color: #42b983; /* O el color turquesa que usas */
    font-weight: bold;
    font-size: 0.8em;
    display: block;
    margin-bottom: 5px;
}

.titulo-articulo a {
    color: #41b883; /* Color de ejemplo */
    font-size: 1.4em;
    text-decoration: none;
    line-height: 1.2;
}

.resumen {
    color: #bbb;
    font-size: 0.9em;
    margin-top: 10px;
}
</style>