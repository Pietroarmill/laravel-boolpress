<template>
  <div class="container">
    <h2>Posts list</h2>
    <div class="row">
      <div v-for="post in posts" :key="post.id" class="col">
        <!-- single post -->
        <PostCard :post="post"/>
        <!-- /single post -->
      </div>
    </div>
  </div>
</template>

<script>
import Axios from 'axios';
import PostCard from '../components/PostCard';

export default {
  name: 'Posts',
  components: {
    PostCard
  },
  data() {
    return {
      posts: []
    }
  },
  created() {
    this.getPosts();
  },
  methods: {
    getPosts() {
      axios.get('http://127.0.0.1:8000/api/posts').then(resp => {
        this.posts = resp.data.result;
      });
    },
  }
}
</script>

<style>
</style>