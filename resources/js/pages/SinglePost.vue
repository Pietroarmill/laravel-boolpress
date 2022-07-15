<template>
  <div class="container">
    <section v-if="post">
      <h1>{{ post.title }}</h1>
      <p>Category: {{ categoryName }}</p>
      <router-link :to="{ name: 'single-tag', params: {slug: tag.slug} }" v-for="tag in post.tags" :key="tag.id" class="badge bg-warning text-dark mb-3 mr-1">{{ tag.name }}</router-link>
      <p>{{ post.content }}</p>
    </section>
    <section v-else>
      Loading
    </section>
  </div>
</template>

<script>
export default {
  name: 'SinglePost',
  data() {
    return {
      post: null,
    }
  },
  created() {
    this.getPostDetails();
  },
  computed: {
    categoryName() {
      return this.post.category ? this.post.category.name : 'nessuna';
    }
  },
  methods: {
    getPostDetails() {
      // prendere lo slug dalla route di vue 
      const slug = this.$route.params.slug;
      // fare la chiamata axios dall'api, aggiungendo lo slug all'url dell'api
      axios.get(`/api/posts/${slug}`).then((resp) => {
        if (resp.data.success) {
          this.post = resp.data.results;
        } else {
          this.$router.push({name: 'not-found'});
        }
      });
    },
  },
};
</script>

<style>

</style>