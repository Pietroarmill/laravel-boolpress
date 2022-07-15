<template>
  <div class="container">
    <h2>Tags list</h2>
    <ul>
      <li>tag</li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'Tags',
  data() {
    return {
      tags: []
    }
  },
  created() {
    this.getTags();
  },
  methods: {
    getTags() {
      axios.get('http://127.0.0.1:8000/api/tags').then(resp => {
        this.tags = resp.data.result;
        console.log(this.tags);
      });
    },
  }
}
</script>

<style>
</style>