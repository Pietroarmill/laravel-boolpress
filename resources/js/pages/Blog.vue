<template>
  <div class="container">
    <Banner />
    <h1>Questo è il blog</h1>
    <Posts />
  </div>
</template>

<script>
import Posts from '../components/Posts.vue';
import Banner from '../components/Banner.vue';

export default {
  name: 'Blog',
  components: {
    Posts,
    Banner,
  }
}
</script>

<style>

</style>