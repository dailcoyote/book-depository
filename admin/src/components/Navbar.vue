<template>
  <div class="navbar">
    <a href="/admin/authors">Авторы</a>
    <a href="/admin/books">Книги</a>
  </div>
</template>

<script>
export default {
  name: "Navbar",
};
</script>

<style scoped>
.navbar {
  height: 50px;
  position: fixed;
  left: 0;
  top: 0;
  right: 0;
  line-height: 50px;
  background-color: #343a40 !important;
  color: #fff;
  padding: 0 15px;
  text-align: center;
  transition: font-weight 0.3s;
}
.navbar a {
  color: #fff;
  margin-right: 50px;
}
</style>