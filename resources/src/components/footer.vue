<script setup>
import { RouterLink } from 'vue-router'
</script>

<template>
  <footer class="footer">
    <div class="footer-inner">
      <div class="footer-left">
        <h2 class="footer-brand">Apoya.pe</h2>
        <p class="footer-text">
          Plataforma de apoyo y registro para iniciativas sociales y académicas. 
          Información clara, ordenada y siempre disponible.
        </p>
      </div>

      <div class="footer-links">
        <div class="footer-column">
          <h3>Explorar</h3>
          <ul>
            <li><RouterLink to="/">Inicio</RouterLink></li>
            <li><RouterLink to="/reportes">Reportes</RouterLink></li>
            <li><RouterLink to="/about">Acerca de</RouterLink></li>
          </ul>
        </div>

        <div class="footer-column">
          <h3>Soporte</h3>
          <ul>
            <li><a href="#">Preguntas frecuentes</a></li>
            <li><a href="#">Políticas de privacidad</a></li>
            <li><a href="mailto:info@Apoya.pe">Contáctanos</a></li>
          </ul>
        </div>

        <div class="footer-column">
          <h3>Redes</h3>
          <div class="footer-social">
            <a href="#" aria-label="Facebook">Fb</a>
            <a href="#" aria-label="Instagram">Ig</a>
            <a href="#" aria-label="X / Twitter">X</a>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <p>© 2025 Apoya.pe · Todos los derechos reservados</p>
    </div>
  </footer>
</template>

<style scoped>
.footer {
  background: #0b0d12;
  border-top: 1px solid rgba(255,255,255,0.08);
  color: #e8eaed;
  padding: 32px 24px 18px;
  margin-top: 40px;
  font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
}

.footer-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: flex;
  flex-wrap: wrap;
  gap: 32px;
  justify-content: space-between;
  align-items: flex-start;
}

.footer-left {
  max-width: 320px;
}

.footer-brand {
  font-size: 22px;
  margin: 0 0 8px;
  font-weight: 700;
}

.footer-text {
  margin: 0;
  font-size: 14px;
  color: #a3a6ad;
  line-height: 1.5;
}

.footer-links {
  display: flex;
  flex-wrap: wrap;
  gap: 32px;
}

.footer-column h3 {
  font-size: 15px;
  margin-bottom: 8px;
  font-weight: 600;
}

.footer-column ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-column li {
  margin-bottom: 6px;
}

.footer-column a {
  font-size: 14px;
  color: #c3c7ce;
  text-decoration: none;
  transition: color 0.2s ease, opacity 0.2s ease;
}

.footer-column a:hover {
  color: #4f9cff;
  opacity: 0.95;
}

.footer-social {
  display: flex;
  gap: 10px;
  margin-top: 4px;
}

.footer-social a {
  width: 28px;
  height: 28px;
  border-radius: 999px;
  border: 1px solid rgba(255,255,255,0.16);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  color: #e8eaed;
}

.footer-social a:hover {
  border-color: #4f9cff;
  color: #4f9cff;
}

.footer-bottom {
  max-width: 1100px;
  margin: 18px auto 0;
  padding-top: 10px;
  border-top: 1px solid rgba(255,255,255,0.05);
  text-align: center;
}

.footer-bottom p {
  margin: 0;
  font-size: 12px;
  color: #8b8f98;
}

/* Responsive */
@media (max-width: 768px) {
  .footer-inner {
    align-items: flex-start;
  }

  .footer-links {
    width: 100%;
    justify-content: flex-start;
  }
}
</style>
