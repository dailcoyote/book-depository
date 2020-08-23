<template>
  <div class="books-wrapper">
    <h3>Авторы</h3>
    <button @click="createAuthor">Создать автора</button>
    <data-list :columns="columns" :data="authors" @editItem="editAuthor" @deleteItem="deleteAuthor"></data-list>
  </div>
</template>

<script>
import DataList from "./DataList";
import authorDataService from "../services/AuthorDataService";

export default {
  name: "authors-list",
  components: {
    DataList,
  },
  data() {
    return {
      columns: ["#", "Имя", "Фамилия", "Профессия", "Кол-во книг"],
      authors: [],
    };
  },
  methods: {
    async retrieveAuthors() {
      try {
        const { status, data } = await authorDataService.getAll();
        if (status == 200) {
          this.authors = data;
        } else {
          alert(status);
        }
      } catch (error) {
        alert(error.message);
      }
    },
    async deleteAuthor(value) {
      try {
        await authorDataService.delete(value.id);
        this.refreshAuthors();
      } catch (error) {
        alert(error.message);
      }
    },
    refreshAuthors() {
      this.retrieveAuthors();
    },
    createAuthor() {
      this.$router.push(`/admin/authors/add`);
    },
    editAuthor(value) {
      this.$router.push(`/admin/authors/${value.id}`);
    },
  },
  beforeMount() {
    this.retrieveAuthors();
  },
};
</script>

<style scoped>
.books-wrapper {
  padding-top: 30px;
}
.books-wrapper button {
  margin: 0 0 10px 0;
  float: right;
  background-color: #343a40 !important;
  color: #fff;
  padding: 6px 5px;
  text-align: center;
  cursor: pointer;
}
</style>