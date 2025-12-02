<template>
  <!-- Cabecera de plantilla -->
  <section class="main-hero">
    <div class="main-hero-content-wrapper"> 
      <div class="main-hero-content">
         <h1>Descubre tu forma de ayudar</h1>
        <p>Encuentra el voluntariado ideal para ti.</p>
      </div>

      <div class="main-hero-image-wrapper">
        <img :src="organizacion.mainImage" alt="Imagen principal" class="main-hero-image" />
      </div>
    </div>
  </section>

  <div class="page">

    <!-- Imagen de presentacion (osea 'top') -->
    <header class="hero">
      <img :src="organizacion.topImage" alt="Imagen superior" class="hero-img" />
    </header>

    <!-- dos imagenes (left - right) -->
    <section class="two-up">
      <div class="card">
        <img :src="organizacion.leftImage" alt="Imagen izquierda" />
      </div>

      <div class="card">
        <img :src="organizacion.rightImage" alt="Imagen derecha" />
      </div>
    </section>

    <!-- Seccion de texto y presentacion con la imagen principal -->
    <section class="media-text">
      <img :src="organizacion.mainImage" alt="Imagen media" class="media-img" />

      <div class="media-content">
        <h2>{{ organizacion.titulo }}</h2>
        <p>{{ organizacion.descripcion }}</p>
        <button @click="scrollToForm('voluntario')">Quiero ayudar</button>
      </div>
    </section>

  </div>

  <!-- Texto adicional -->
  <section class="help-wrapper">
    <h2 class="help-title">
      Ser parte de {{ organizacion.titulo }} significa que puedes ayudar así:
    </h2>

    <div class="help-grid">

      <div class="help-card">
        <h3 class="help-card-title">Quiero ser <span>voluntario</span></h3>
        <p>Conoce oportunidades de voluntariado disponibles.</p>
        <button class="help-btn" @click="scrollToForm('voluntario')">
          Ver Voluntariados
        </button>
      </div>

      <div class="help-card">
        <h3 class="help-card-title">Quiero <span>donar bienes</span></h3>
        <p>Participa en campañas de donación.</p>
        <button class="help-btn" @click="scrollToForm('bienes')">
          Ver Donaciones
        </button>
      </div>

      <div class="help-card">
        <h3 class="help-card-title">Quiero <span>donar dinero</span></h3>
        <p>Apoya proyectos mediante donaciones económicas.</p>
        <button class="help-btn" @click="scrollToForm('dinero')">
          Ver Crowdfunding
        </button>
      </div>

    </div>
  </section>

  <!-- Formulario -->
  <section id="formulario-registro" class="join-us-section">
    <div class="form-container">
      <h2 class="form-title">Únete a la causa</h2>
      <p class="form-subtitle">
        Déjanos tus datos y selecciona cómo deseas ayudar. Te contactaremos pronto.
      </p>

      <form @submit.prevent="submitForm" class="support-form">

        <div class="form-group">
          <label for="name">Nombre Completo</label>
          <input type="text" id="name" v-model="formData.name" required />
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" v-model="formData.email" required />
          </div>

          <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="tel" id="phone" v-model="formData.phone" required />
          </div>
        </div>

        <div class="form-group">
          <label for="type">¿Cómo deseas ayudar?</label>
          <select id="type" v-model="formData.supportType" required>
            <option value="" disabled>Selecciona una opción</option>
            <option value="voluntario">Voluntariado</option>
            <option value="bienes">Donar Bienes</option>
            <option value="dinero">Donar Dinero</option>
            <option value="otro">Otro</option>
          </select>
        </div>

        <div class="form-group">
          <label for="message">Mensaje (Opcional)</label>
          <textarea id="message" v-model="formData.message" rows="4"></textarea>
        </div>

        <button type="submit" class="submit-btn">Enviar mis datos</button>

        <button type="button" class="submit-btn" @click="enviarWhatsApp">
        Contactar por WhatsApp
        </button>
      </form>
    </div>
  </section>
</template>


<script setup>
import { reactive } from 'vue'
import axios from 'axios'

const props = defineProps({
  organizacion: {
    type: Object,
    required: true
  }
})

const formData = reactive({
  name: '',
  email: '',
  phone: '',
  supportType: '',
  message: ''
})

async function submitForm() {

  try {
    const response = await axios.post("http://127.0.0.1:8000/api/encuestas", {
      name: formData.name,
      email: formData.email,
      phone: formData.phone,
      support_type: formData.supportType,
      message: formData.message,
      organizacion_nombre: props.organizacion.id
    });

    alert("¡Tu información fue enviada con éxito!");

    console.log("Guardado en BD:", response.data);

    // Reset
    formData.name = '';
    formData.email = '';
    formData.phone = '';
    formData.supportType = '';
    formData.message = '';

  } catch (error) {
    if (error.response) {
      alert("Error: " + (error.response.data.message || JSON.stringify(error.response.data)));
      console.error(error.response.data);
    } else {
      alert("Error de conexión. Verifica que Laravel esté corriendo.");
      console.error(error);
    }
  }

}

function scrollToForm(type) {
  formData.supportType = type
  const formElement = document.getElementById('formulario-registro')
  if (formElement) {
    formElement.scrollIntoView({ behavior: 'smooth' })
  }
}

function enviarWhatsApp() {
  const numero = "51918319155"; // tu número
  const nombre = formData.name || "Usuario";
  const tipo = formData.supportType || "sin especificar";

  const mensaje = `Hola, soy ${nombre}. Quisiera unirme al voluntario y ayudar con: ${tipo}.`;

  const url = `https://wa.me/${numero}?text=${encodeURIComponent(mensaje)}`;

  window.open(url, "_blank");
}

</script>

<style scoped>

.page {
  max-width: 1100px;
  margin: 0 auto;
  padding: 20px;
  font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
  color: #e2cfcf;
}


/* Banner HERO  */
.main-hero {
  background-color: rgb(182, 48, 77); 
  color: white;
  padding: 40px 0; 
  margin-bottom: 30px; 
  width: 100vw; 
  position: relative;
  left: 50%;
  right: 50%;
  margin-left: -50vw;
  margin-right: -50vw;
}

.main-hero-content-wrapper {
  max-width: 1100px; 
  margin: 0 auto; 
  padding: 0 20px; 
  display: flex;
  justify-content: space-between; 
  align-items: center;
  position: relative; 
  min-height: 250px;
}

.main-hero-content {
  flex-grow: 1; 
  max-width: 60%; 
  z-index: 2; 
}

.main-hero h1 {
  font-size: 2.5rem; 
  font-weight: 700;
  margin: 0 0 10px 0;
  line-height: 1.2;
}

.main-hero p {
  font-size: 1.2rem; 
  margin: 0;
}

.main-hero-image-wrapper {
  position: absolute; 
  right: 20px; 
  top: 0;
  bottom: 0;
  width: 40%; 
  overflow: hidden; 
}

.main-hero-image {
  width: 100%;
  height: 100%;
  object-fit: cover; 
  object-position: center; 
  display: block;
}

/* SECCIONES DE CONTENIDO */

.hero {
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  border-radius: 10px;
  margin-bottom: 24px;
}
.hero-img {
  width: 100%;
  height: auto;
  object-fit: cover;
  display: block;
}

.two-up {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
  margin-bottom: 24px;
}
.card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 8px;
  display: block;
}

.media-text {
  display: grid;
  grid-template-columns: 1fr 1.2fr;
  gap: 20px;
  align-items: center;
}
.media-img {
  width: 100%;
  height: auto;
  border-radius: 8px;
  object-fit: cover;
}
.media-content h2 {
  margin: 0 0 8px 0;
  font-size: 1.8rem; 
  font-weight: 700;
}
.media-content p {
  margin: 0 0 12px 0;
  line-height: 1.5;
}
.media-content button {
  padding: 12px 20px; 
  font-size: 1.05rem; 
  font-weight: 600;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  background: #c40d2be0;
  color: white;
  transition: background 0.3s ease, transform 0.2s ease;
}

.media-content button:hover {
  background: #a60b24e0;
  transform: translateY(-2px);
}


/* SECCIÓN AYUDA */

.help-wrapper {
  margin-top: 40px;
  text-align: center;
  padding: 20px 0;
}
.help-wrapper h2 {
  color: #c2a5a9e0;
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 30px;
}

.help-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}

.help-card {
  background: white;
  border-radius: 14px;
  padding: 24px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  text-align: center;
}
.help-card h3 {
  font-size: 1.4rem;
  margin-bottom: 10px;
  color: #333;
}
.help-card h3 span {
  color: #c40d2be0; 
  font-weight: 700;
}
.help-card p {
  color: #444;
  line-height: 1.5;
  font-size: 0.95rem;
  margin-bottom: 16px;
}
.help-card button {
  background: #c40d2be0;
  border: none;
  padding: 10px 14px;
  border-radius: 8px;
  color: white;
  cursor: pointer;
  font-weight: 600;
  transition: background 0.3s ease, transform 0.2s ease;
}
.help-card button:hover {
  background: #a60b24e0;
  transform: translateY(-2px);
}


/* Estilos para el formulario */

.join-us-section {
  background-color: #fcfaf7; 
  padding: 60px 20px;
  margin-top: 50px;
  width: 100vw; 
  position: relative;
  left: 50%;
  right: 50%;
  margin-left: -50vw;
  margin-right: -50vw;
  color: #333; 
}

.form-container {
  max-width: 700px; 
  margin: 0 auto;
  background: white;
  padding: 40px;
  border-radius: 16px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}

.form-title {
  text-align: center;
  color: #c40d2be0;
  font-size: 2.2rem;
  font-weight: 800;
  margin-bottom: 10px;
}

.form-subtitle {
  text-align: center;
  color: #666;
  margin-bottom: 30px;
  font-size: 1.1rem;
}

.support-form {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 8px;
  text-align: left;
}

.form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

label {
  font-weight: 600;
  font-size: 0.95rem;
  color: #444;
}

input, select, textarea {
  padding: 12px 15px;
  border: 1px solid #ddd;
  border-radius: 8px;
  font-size: 1rem;
  font-family: inherit;
  transition: border-color 0.3s ease;
  background: #fafafa;
}

input:focus, select:focus, textarea:focus {
  outline: none;
  border-color: #c40d2be0; 
  background: white;
}

textarea {
  resize: vertical;
}

.submit-btn {
  margin-top: 10px;
  padding: 15px;
  background: #c40d2be0;
  color: white;
  font-size: 1.1rem;
  font-weight: 700;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background 0.3s ease, transform 0.2s ease;
}

.submit-btn:hover {
  background: #a60b24e0;
  transform: translateY(-2px);
}

/* ======================================= */
/* MEDIA QUERIES (RESPONSIVE) */
/* ======================================= */

@media (max-width: 768px) {
  /* Banner Hero - Ajustes para evitar scroll horizontal en móvil */
  .main-hero {
    margin-left: 0;
    margin-right: 0;
    width: 100%; 
  }
  .main-hero-content-wrapper {
    flex-direction: column; 
    text-align: center;
    padding: 30px 20px;
    min-height: unset;
  }
  .main-hero-content {
    max-width: 100%; 
    margin-bottom: 20px; 
    order: 2; 
  }
  .main-hero h1 {
    font-size: 2rem;
  }
  .main-hero-image-wrapper {
    position: relative; 
    width: 100%; 
    height: 180px; 
    border-radius: 8px; 
    margin-bottom: 20px;
    right: 0;
  }
  
  /* Secciones de Contenido - Pilares apilados */
  .two-up, .media-text, .help-grid {
    grid-template-columns: 1fr;
  }
  .media-content {
    order: 2;
  }
  

  .join-us-section {
    /* Resetear las propiedades de centrado complejo para móvil */
    margin-left: 0;
    margin-right: 0;
    left: 0;
    right: 0;
    width: 100%; /* Ahora simplemente toma el 100% del contenedor */
    padding: 40px 10px; /* Reducir padding lateral para móvil */
  }
  
  .form-row {
    grid-template-columns: 1fr; /* Campos apilados verticalmente */
    gap: 20px;
  }
  .form-container {
    padding: 25px; /* Reducir padding interno en móvil */
  }
}

@media (max-width: 480px) {
  .main-hero h1 {
    font-size: 1.8rem;
  }
  .form-title {
    font-size: 1.8rem;
  }
}
</style>
