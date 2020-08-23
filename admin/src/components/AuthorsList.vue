<template>
  <div class="authors-wrapper">
    <h3>Авторы</h3>
    <add-new-button @onCreate="createAuthor"></add-new-button>
    <data-list :columns="columns" :data="authors" @editItem="editAuthor" @deleteItem="deleteAuthor"></data-list>
  </div>
</template>

<script>
import AddNewButton from "./AddNewButton";
import DataList from "./DataList";
import authorDataService from "../services/AuthorDataService";

export default {
  name: "authors-list",
  components: {
    AddNewButton,
    DataList
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
.authors-wrapper {
  padding-top: 30px;
}
</style>