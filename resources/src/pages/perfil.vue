<template>
    <div class="perfil-container">
        <h1>Mi perfil</h1>

        <form @submit.prevent="actualizarPerfil" class="formperfil">
            <label class="labelperfil">Nombre:</label>
            <input class="input1" v-model="form.name" type="text" />

            <label class="labelperfil">Email:</label>
            <input class="input1" v-model="form.email" type="email" />

            <label class="labelperfil">DNI:</label>
            <input class="input1" v-model="form.dni" type="text" />

            <label class="labelperfil">Nueva contraseña:</label>
            <input class="input1" v-model="form.password" type="password" placeholder="Dejar vacío si no cambia" />

            <button type="submit" class="btn-save">Guardar cambios</button>
         </form>

            <button @click="eliminarCuenta" class="btn-delete">
            Eliminar cuenta
            </button>
    </div>
</template>
<script>
import axios from "axios";

export default {
  data() {
    const usuario = JSON.parse(localStorage.getItem("usuario")) || {};
    return {
      form: {
        name: usuario.name || "",
        email: usuario.email || "",
        dni: usuario.dni || "",
        password: "" 
      }
    };
  },
  methods: {
    async actualizarPerfil() {
      try {
        const response = await axios.put(
          "http://127.0.0.1:8000/api/update-profile",
          this.form,
          { headers: { Authorization: "Bearer " + localStorage.getItem("token") } }
        );

        alert("Perfil actualizado correctamente");

        // Actualizar datos del localStorage
        localStorage.setItem("usuario", JSON.stringify(response.data.user));

        // Recargar página o redirigir si quieres
        this.$router.go();
      } catch (error) {
        console.log(error);
        alert("Error al actualizar el perfil");
      }
    },

    async eliminarCuenta() {
      if (!confirm("¿Seguro que quieres eliminar tu cuenta?")) return;

      try {
        await axios.delete("http://127.0.0.1:8000/api/delete-account", {
          headers: { Authorization: "Bearer " + localStorage.getItem("token") }
        });

        localStorage.removeItem("token");
        localStorage.removeItem("usuario");

        alert("Cuenta eliminada");
        this.$router.push("/registro");

      } catch (error) {
        alert("Error al eliminar cuenta");
      }
    }
  }
};
</script>

<style>

.labelperfil{
  color: rgb(77, 202, 161);
}
.perfil-container {
  display: flex;
  max-width: 450px;
  padding: 25px 0px 30px 80px;
  flex-direction: column;
  gap: 2rem;
}

.input1 {
  display: block;
  width: 100%;
  margin-bottom: 14px;
  padding: 0px;
  background-color: rgb(20, 58, 45);
}

.btn-save {
  background: rgb(67, 145, 67);
  color: white;
  padding: 10px;
  width: 10rem;
  border-radius: 8px;
  cursor: pointer;
}

.btn-delete {
  width: 9rem;
  background: rgb(155, 50, 50);
  color: white;
  padding: 10px;
  border-radius: 8px;
  cursor: pointer;
}
</style>