<script setup>
defineProps({
  title: {
    type: String,
    default: 'Hola desde Vue 3'
  }
})
</script>

<template>
  <div class="card">
    <h1>{{ title }}</h1>
    <p>Este componente confirma que la configuración de Vitest es exitosa.</p>
  </div>
</template>

<style scoped>
.card {
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 8px;
  text-align: center;
}
</style>
