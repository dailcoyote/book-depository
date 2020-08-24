<template>
  <div>
    <h3>Авторы</h3>
    <v-table :columns="columns" :data="authors" :detailInfo="detailInfo" @onView="onView"></v-table>
  </div>
</template>

<script>
import VTable from "../components/VTable";
import authorsService from "../services/AuthorsService";

export default {
  name: "authors",
  components: {
    VTable,
  },
  data() {
    return {
      columns: ["ID", "Имя", "Фамилия", "Профессия", "Кол-во книг"],
      authors: [],
      detailInfo: true,
    };
  },
  methods: {
    onView(item) {
      this.$router.push({
        path: `/site/books`,
        query: {
          author_id: item.id,
          author_name: `${item.firstname} ${item.lastname}`,
        },
      });
    },
    async retrieveAuthors() {
      try {
        const { status, data } = await authorsService.getAll();
        if (status == 200) {
          this.authors = data;
        } else {
          alert(status);
        }
      } catch (error) {
        alert(error.message);
      }
    },
  },
  beforeMount() {
    this.retrieveAuthors();
  },
};
</script>

<style>
</style>