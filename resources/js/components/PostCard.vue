<template>
  <div class="card mb-3" style="width: 18rem;">
    <img v-if="post.cover" :src="post.cover" class="card-img-top" alt="...">
    <div class="card-body">
      <p>Category: {{ categoryName }}</p>
      <h5 class="card-title">{{ post.title }}</h5>
      <p class="card-text">{{ troncateText(100) }}</p>
    </div>    
    <div class="card-body">
      <router-link :to="{ name: 'single-post', params: {slug: post.slug} }" class="card-link">Leggi post</router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: 'PostCard',
  props: {
    post: Object
  },
  computed: {
    categoryName() {
      return this.post.category ? this.post.category.name : "nessuna";
    }
  },
  methods: {
    troncateText(maxCharNumber) {
      // se il testo è piu lungo di maxCharNumber
      //taglia il testo e aggiungi ...
      // altrimenti ritorno il tensto intero 
      if (this.post.content.length > maxCharNumber) {
        return this.post.content.substr(0, maxCharNumber) + '...';
      }
      return this.post.content;
    }
  }
}
</script>

<style>
</style>