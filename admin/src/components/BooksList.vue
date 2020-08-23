<template>
  <div class="books-wrapper">
    <h3>Книги</h3>
    <add-new-button @onCreate="createBook"></add-new-button>
    <data-list :columns="columns" :data="books" @editItem="editBook" @deleteItem="deleteBook"></data-list>
  </div>
</template>

<script>
import AddNewButton from "./AddNewButton";
import DataList from "./DataList";
import bookDataService from "../services/BookDataService";

export default {
  name: "books-list",
  components: {
    AddNewButton,
    DataList
  },
  data() {
    return {
      columns: ["#", "Наименование", "ISBN", "Автор"],
      books: [],
    };
  },
  methods: {
    async retrieveBooks() {
      try {
        const { status, data } = await bookDataService.getAll();
        if (status == 200) {
          this.books = data;
        } else {
          alert(status);
        }
      } catch (error) {
        alert(error.message);
      }
    },
    async deleteBook(value) {
      try {
        await bookDataService.delete(value.id);
        this.refreshBooks();
      } catch (error) {
        alert(error.message);
      }
    },
    refreshBooks() {
      this.retrieveBooks();
    },
    createBook() {
      this.$router.push(`/admin/books/add`);
    },
    editBook(value) {
      this.$router.push(`/admin/books/${value.id}`);
    },
  },
  beforeMount() {
    this.retrieveBooks();
  },
};
</script>

<style scoped>
.books-wrapper {
  padding-top: 30px;
}
</style>