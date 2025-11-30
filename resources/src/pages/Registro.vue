<template>
  <div class="login-register-container">
    <div class="form-card">
      <div class="logo-section">
        <img src="/img/Sprunkos.png" alt="Logo Apoya.pe" class="logo"> 
        <h2>INGRESAR</h2>
      </div>

      <div class="toggle-buttons">
        <button 
          @click="cambiarModo('login')" 
          :class="{ active: modoActual === 'login' }"
          class="toggle-btn"
        >
          Iniciar Sesión
        </button>
        <button 
          @click="cambiarModo('register')" 
          :class="{ active: modoActual === 'register' }"
          class="toggle-btn"
        >
          Registrarse
        </button>
      </div>
      
      <h3 class="acceso-titulo">
        {{ modoActual === 'login' ? 'Ingrese sus Datos registrados' : 'Creación de cuenta' }}
      </h3>

      <form @submit.prevent="manejarEnvio">
        
        <div class="input-group">
          <label for="username">Nombre de usuario</label>
          <input type="text" id="username" v-model="username" required>
        </div>

        <div class="input-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" v-model="password" required>
        </div>
        
        <div class="input-group" v-if="modoActual === 'register'">
          <label for="dni">DNI</label>
          <input type="text" id="dni" v-model="dni" required>
        </div>
        
        <div class="checkbox-group" v-if="modoActual === 'login'">
          <input type="checkbox" id="remember" v-model="rememberMe">
          <label for="remember">Recordar nombre de usuario</label>
        </div>
        
        <button type="submit" class="btn-acceder">
          {{ modoActual === 'login' ? 'Acceder' : 'Registrar' }}
        </button>
      </form>
      
      <p v-if="loginError" class="error-message">{{ loginError }}</p>
    </div>

  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'RegistroPage', // Nombre que usará el componente
  data() {
    return {
      // Estado principal
      modoActual: 'login',
      
      // Variables para ambos formularios (enlazadas con v-model)
      username: '',
      password: '',
      dni: '',       
      rememberMe: false,
      loginError: null, 
    };
  },
  methods: {
    cambiarModo(nuevoModo) {
      this.modoActual = nuevoModo;
      this.loginError = null; 
      this.username = ''; 
      this.password = ''; 
      this.dni = '';
    },

    manejarEnvio() {
      // Decide qué función llamar según el modo actual
      if (this.modoActual === 'login') {
        this.iniciarSesion();
      } else {
        this.registrarUsuario();
      }
    },

    iniciarSesion() {
      axios.post('http://127.0.0.1:8000/api/login', {
        email: this.username,
        password: this.password
      })
      .then(response => {
        localStorage.setItem("token", response.data.token);
        localStorage.setItem("usuario", JSON.stringify(response.data.user));
    
        alert("Inicio de sesión exitoso");

    // Redirigir o actualizar la UI
        this.$router.push('/home');
      })
      .catch(error => {
        this.loginError = "Credenciales incorrectas";
      });
    },

    async registrarUsuario() {
      if (!this.username || !this.password || !this.dni) {
        this.loginError = 'Por favor, complete todos los campos.';
        return;
      }

      try {
        const response = await axios.post('http://127.0.0.1:8000/api/register', {
          name: this.username,
          email: this.username + '@correo.com',
          password: this.password,
          dni: this.dni
        });

        alert('Usuario registrado exitosamente');
        this.cambiarModo('login');

      } catch (error) {
        this.loginError = 'Error al registrar: ' + error.response.data.message;
      }
    }
  }
};
</script>

<style scoped>

.login-register-container {
    display: flex; 
    min-height: 100vh;
    font-family: Arial, sans-serif;
    background-color: hsl(0, 1%, 17%);
    background-image: url('https://blog.experiencias.com.pe/wp-content/uploads/2024/03/Voluntariado-Reciclaje-1024x576.jpg');
    background-size: cover;       /* Ajusta la imagen al tamaño del contenedor */
    background-position: center;  /* Centra la imagen */
    background-repeat: no-repeat; /* Evita que se repita */
}

.form-card {
    width: 35%; 
    padding: 60px;
    background-color: white;
    color: #000000;
    display: flex;
    flex-direction: column;
}

.logo-section {
    margin-bottom: 30px;
}

.logo {
    width: 50px; 
    height: auto;
}

.acceso-titulo {
    font-weight: 600;
    margin: 25px 0 20px 0;
    font-size: 1.1em;
}


.input-group {
    margin-bottom: 20px;
}

.input-group label {
    display: block;
    font-size: 0.9em;
    margin-bottom: 5px;
    font-weight: 500;
}

.input-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box; 
}

.checkbox-group {
    display: flex;
    align-items: center;
    margin-bottom: 25px;
}

.checkbox-group label {
    margin-left: 8px;
    font-size: 0.85em;
    font-weight: normal;
}


.btn-acceder {
    width: 100%;
    padding: 12px;
    background-color: #41b883; 
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s;
}

.btn-acceder:hover {
    background-color: #2c7755;
}

.error-message {
    color: #b00020; /* Color de error*/
    font-weight: bold;
    margin-top: 15px;
}

.toggle-buttons {
    display: flex;
    justify-content: stretch;
    border-radius: 6px;
    overflow: hidden; 
    border: 1px solid #ccc;
    background-color: #f0f0f0; 
}

.toggle-btn {
    flex-grow: 1;
    padding: 10px 0;
    border: none;
    background: none; 
    color: #555;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s;
}

.toggle-btn:first-child {
    border-right: 1px solid #ccc;
}

.toggle-btn.active {
    background-color: #41b883 ; 
    color: white;
    font-weight: 700;
}


.visual-content ul {
    list-style: none; /* Eliminar viñetas por defecto */
    margin-top: 25px;
    font-size: 1.5em;
}

.visual-content li {
    margin-bottom: 8px;
    padding-left: 20px;
    position: relative;
}

.visual-content li::before {
    content: "•";
    color: white;
    font-size: 1.5em;
    line-height: 1;
    position: absolute;
    left: 0;
    top: 0;
}
</style>

<style scoped>
.page{ min-height:60vh; display:grid; place-items:center; color:#e8eaed; text-align:center; }
</style>
