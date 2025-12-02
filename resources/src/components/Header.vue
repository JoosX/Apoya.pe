<script setup>
import { RouterLink } from 'vue-router'
</script>

<template>
  <header class="navbar">
    <div class="wrap">
      <div class="logo">Apoya.pe</div>

      <nav class="links">
        <RouterLink to="/" class="btn" active-class="active" exact-active-class="active">Inicio</RouterLink>
        <RouterLink to="/reportes" class="btn" active-class="active">Reportes</RouterLink>
        <RouterLink to="/about" class="btn" active-class="active">Acerca de nosotros</RouterLink>
        <RouterLink to="/registro" class="btn solid">Registro</RouterLink>
        <RouterLink v-if="user" to="/perfil" class="btn solid1">
          <strong>{{ user.name }}</strong>
        </RouterLink>
        <div v-if="user" class="cerrarsesion">
          <button class="btn logout-btn" @click="cerrarSesion">Cerrar sesión</button>
        </div>
      </nav>
    </div>
  </header>
</template>

<script>
export default{
  data(){
    return{
      user:null,
    };
  },
  mounted(){
    let usuarioStorage = localStorage.getItem("usuario");
    if(usuarioStorage){
      this.user = JSON.parse(usuarioStorage);
    };
  },

  methods:{
    cerrarSesion(){
    localStorage.removeItem("usuario");
    localStorage.removeItem("token");

    this.user = null;

    this.$router.push("/home");

    alert("Sesión cerrada correctamente");
    }
  }

  
}
  
</script>
<style>
.navbar {
  position: sticky;
  top: 0;
  width: 100%;
  background: #0f1115;
  border-bottom: 1px solid #22262b;
  z-index: 100;
  padding-top: 8px; /* 🔹 Le da aire arriba */
  padding-bottom: 8px; /* 🔹 Opcional: mantiene equilibrio */
}

.wrap {
  width: 100%;
  max-width: 1280px;
  margin: 0 auto;
  padding: 20px 40px; /* 🔹 aumenta el espacio interno */
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.navbar{ overflow-x: hidden; }  /* cinturón de seguridad */
.navbar {
  box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}


.logo {
  color: #41b883;
  font-weight: 800;
  font-size: 1.4rem;
}
.links {
  display: flex;
  gap: 0.75rem;
  flex-wrap: wrap;
}
.btn {
  padding: 8px 14px;
  border-radius: 8px;
  text-decoration: none;
  color: #e8eaed;
  border: 1px solid transparent;
  font-weight: 600;
  font-size: 0.95rem;
  transition: transform 0.12s, background 0.2s, color 0.2s, border 0.2s;
}
.btn:hover {
  transform: translateY(-1px);
}
.active {
  color: #29a36c;
  border-color: #22262b;
  background: #0f1418;
}
.solid1{
  background-color: #486358;
  color: white;
  border: 2px solid #41b883;
}
.solid {
  background: #41b883;
  color: #0f1115;
}
.solid:hover {
  background: #2e8f69;
}
</style>
