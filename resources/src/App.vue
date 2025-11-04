<script setup>
import Header from './components/Header.vue'
</script>

<template>
  <div class="page">
    <Header />
    <router-view /> <!-- Aquí se mostrarán las páginas -->
  </div>
</template>

<style>
body {
  margin: 0;
  background-color: #0f1115;
  color: #e8eaed;
  font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
}
</style>
