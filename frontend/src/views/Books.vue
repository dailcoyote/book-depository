<template>
  <div>
    <h3>Автор: {{this.$route.query.author_name}}. Бестселлеры</h3>
    <v-table v-if="books.length" :columns="columns" :data="books" :detailInfo="detailInfo"></v-table>
    <div v-else>Не найдено</div>
  </div>
</template>

<script>
import VTable from "../components/VTable";
import booksService from "../services/BooksService";

export default {
  name: "books",
  components: {
    VTable,
  },
  data() {
    return {
      columns: ["ID", "Наименование", "ISBN"],
      books: [],
      detailInfo: false,
    };
  },
  methods: {
    async retrieveBooks() {
      try {
        const { status, data } = await booksService.getByAuthorId(
          this.$route.query.author_id
        );
        if (status == 200) {
          this.books = data.map(({ id, title, isbn }) => {
            return { id, title, isbn };
          });
        } else {
          alert(status);
        }
      } catch (error) {
        alert(error.message);
      }
    },
  },
  beforeMount() {
    this.retrieveBooks();
  },
};
</script>

<style>
</style>