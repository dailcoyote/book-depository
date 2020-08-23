<template>
  <div class="books-wrapper">
    <h3>Авторы</h3>
    <data-list :columns="columns" :data="authors"></data-list>
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
  methods: {},
  async beforeMount() {
    try {
      const { status, data } = await authorDataService.getAll();
      if (status == 200) {
        this.authors = data;
      } else {
        alert(status);
      }
    } catch (error) {
      console.log(error);
    }
  },
};
</script>

<style scoped>
.books-wrapper {
  padding-top: 30px;
}
</style>