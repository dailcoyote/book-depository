<template>
  <div class="form-wrapper">
    <h3>Создание книги</h3>
    <form @submit.prevent="saveBook">
      <label for="title">Наименование</label>
      <input
        type="text"
        required
        id="title"
        name="title"
        v-model="book.title"
        placeholder="Наименование книги.."
      />

      <label for="isbn">Номер книжного издания</label>
      <input
        type="text"
        required
        id="isbn"
        name="isbn"
        v-model="book.isbn"
        placeholder="Номер книжного издания (ISBN) например:9-2661-466"
      />

      <label for="author">Автор</label>
      <select v-model="book.author_id" required>
        <option
          v-for="(author,index) in authors"
          :key="index"
          v-bind:value="author.id"
        >{{ author.fullname }}</option>
      </select>

      <button id="submit-btn">Сохранить</button>
    </form>
  </div>
</template>

<script>
import authorDataService from "../services/AuthorDataService";
import bookDataService from "../services/BookDataService";

export default {
  name: "add-book",
  data() {
    return {
      authors: [],
      book: {
        id: null,
        title: "",
        isbn: "",
        author_id: "",
      },
    };
  },
  methods: {
    async retrieveAuthors() {
      try {
        const { status, data } = await authorDataService.getShortList();
        if (status == 200) {
          this.authors = data;
        } else {
          alert(status);
        }
      } catch (error) {
        alert(error.message);
      }
    },
    async saveBook() {
      const { title, isbn, author_id } = this.book;
      if (title && isbn && author_id) {
        try {
          await bookDataService.create({ title, isbn, author_id });
          this.$router.push(`/admin/books`);
        } catch (error) {
          alert(error.message);
        }
      }
    },
  },
  beforeMount() {
    this.retrieveAuthors();
  },
};
</script>

<style lang="css">
@import "../assets/styles/form.css";
</style>