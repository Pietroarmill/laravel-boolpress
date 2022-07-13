<template>
  <div class="container text-center">
    <h2>Error 404! | Pagina non trovata.</h2>
    <router-link :to="{ name: 'home' }">Torna alla Home</router-link>
  </div>
</template>

<script>
export default {
  name: 'NotFound'
}
</script>

<style>

</style>