<p align="center">
  <a href="#" target="_blank">
    <img src="/public/img/logo.png" width="400" alt="Apoya.pe Logo">
  </a>
</p>

<p align="center">
  <a><img src="https://img.shields.io/badge/Vue.js-3.x-42b883?style=for-the-badge&logo=vuedotjs&logoColor=white"></a>
  <a><img src="https://img.shields.io/badge/Laravel-12-ff2d20?style=for-the-badge&logo=laravel&logoColor=white"></a>
  <a><img src="https://img.shields.io/badge/Vite-Build-646cff?style=for-the-badge&logo=vite&logoColor=white"></a>
  <a><img src="https://img.shields.io/badge/MySQL-Database-00618a?style=for-the-badge&logo=mysql&logoColor=white"></a>
  <a><img src="https://img.shields.io/badge/STATUS-En%20Desarrollo-yellow?style=for-the-badge"></a>
</p>

---

# 🌱 Apoya.pe – Plataforma de Voluntariado y Ayuda Social

**Apoya.pe** es una plataforma digital diseñada para conectar voluntarios con actividades sociales, ambientales y comunitarias dentro del Perú.  
El sistema facilita la participación ciudadana en iniciativas como:

- Reciclaje y cuidado ambiental ♻️  
- Apoyo comunitario 🤝  
- Campañas solidarias 🧡  
- Actividades educativas 📚  

La plataforma opera como una aplicación **SPA (Single Page Application)** utilizando **Vue.js** en el frontend y **Laravel** como backend API.

---

# 🧩 Tecnologías utilizadas

### **Frontend**
- Vue.js 3  
- Vite  
- JavaScript  
- Axios  
- HTML + CSS  

### **Backend**
- Laravel 12  
- Rutas API REST  
- Controladores  
- Validación  
- Hash de contraseñas  

### **Base de datos**
- MySQL  
- Tabla `users` extendida con:
  - `username`
  - `dni`
  - `email` autogenerado
  - `password` encriptado

---

# 🔐 Autenticación (Login / Registro)

### ✔ Registro  
Incluye validación de:
- Username único  
- DNI único  
- Contraseña segura  
- Email autogenerado:  




## Instalación del proyecto

1. Clonar el repositorio
2. Ejecutar `composer install`
3. Ejecutar `npm install`
4. Configurar archivo `.env`
5. Ejecutar `php artisan serve`

