<template>
  <div id="default-layout">
    <navbar/>
    <router-view/>
  </div>
</template>

<script>
  import Navbar from "../components/Navbar";
  export default {
    name: "DefaultLayout",
    components: {Navbar}
  }
</script>

<style scoped>
  #default-layout{
    padding: 50px;
  }
</style>