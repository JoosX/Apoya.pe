<template>
  <div class="login-register-container">
    <div class="form-card">
      <div class="logo-section">
        <h2>Ingresar</h2>
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
  name: 'RegistroPage',
  data() {
    return {
      modoActual: 'login',
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
        this.$router.push('/');
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
          email: this.username + '@apoya.com',
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
/* Estilos base responsivos */
.login-register-container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  font-family: Arial, sans-serif;
  background-color: hsl(0, 1%, 17%);
  background-image: url('https://blog.experiencias.com.pe/wp-content/uploads/2024/03/Voluntariado-Reciclaje-1024x576.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  padding: 20px;
  box-sizing: border-box;
}

.form-card {
  width: 100%;
  max-width: 450px;
  padding: 40px 30px;
  background-color: white;
  color: #000000;
  display: flex;
  flex-direction: column;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  box-sizing: border-box;
}

.logo-section {
  margin-bottom: 25px;
  text-align: center;
}

.logo {
  width: 50px;
  height: auto;
  margin-bottom: 10px;
}

.logo-section h2 {
  margin: 0;
  font-size: 1.5rem;
}

.acceso-titulo {
  font-weight: 600;
  margin: 20px 0 15px 0;
  font-size: 1.1em;
  text-align: center;
}

.input-group {
  margin-bottom: 18px;
}

.input-group label {
  display: block;
  font-size: 0.9em;
  margin-bottom: 6px;
  font-weight: 500;
}

.input-group input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-size: 1em;
}

.checkbox-group {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

.checkbox-group input {
  margin: 0;
}

.checkbox-group label {
  margin-left: 8px;
  font-size: 0.85em;
  font-weight: normal;
}

.btn-acceder {
  width: 100%;
  padding: 14px;
  background-color: #41b883;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-weight: bold;
  font-size: 1em;
  transition: background-color 0.3s;
}

.btn-acceder:hover {
  background-color: #2c7755;
}

.error-message {
  color: #b00020;
  font-weight: bold;
  margin-top: 15px;
  text-align: center;
  font-size: 0.9em;
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
  padding: 12px 0;
  border: none;
  background: none;
  color: #555;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.2s;
  font-size: 0.95em;
}

.toggle-btn:first-child {
  border-right: 1px solid #ccc;
}

.toggle-btn.active {
  background-color: #41b883;
  color: white;
  font-weight: 700;
}

/* Media Queries para diferentes tamaños de pantalla */

/* Tablets y pantallas medianas */
@media (max-width: 768px) {
  .form-card {
    padding: 30px 25px;
    max-width: 400px;
  }
  
  .logo-section h2 {
    font-size: 1.4rem;
  }
  
  .toggle-btn {
    padding: 10px 0;
    font-size: 0.9em;
  }
}

/* Teléfonos móviles */
@media (max-width: 480px) {
  .login-register-container {
    padding: 15px;
    align-items: flex-start;
    padding-top: 40px;
  }
  
  .form-card {
    padding: 25px 20px;
    max-width: 100%;
  }
  
  .logo-section {
    margin-bottom: 20px;
  }
  
  .logo {
    width: 45px;
  }
  
  .logo-section h2 {
    font-size: 1.3rem;
  }
  
  .acceso-titulo {
    font-size: 1em;
    margin: 15px 0 12px 0;
  }
  
  .input-group {
    margin-bottom: 15px;
  }
  
  .input-group input {
    padding: 10px;
  }
  
  .toggle-btn {
    padding: 10px 0;
    font-size: 0.85em;
  }
  
  .btn-acceder {
    padding: 12px;
  }
}

/* Pantallas muy pequeñas (ej. iPhone SE) */
@media (max-width: 320px) {
  .form-card {
    padding: 20px 15px;
  }
  
  .logo-section h2 {
    font-size: 1.2rem;
  }
  
  .toggle-buttons {
    flex-direction: column;
  }
  
  .toggle-btn:first-child {
    border-right: none;
    border-bottom: 1px solid #ccc;
  }
}
</style>