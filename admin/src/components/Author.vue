<template>
  <div class="form-wrapper">
    <h3>Редактирование автора</h3>
    <form @submit.prevent="updateAuthor">
      <label for="fname">Имя</label>
      <input
        type="text"
        required
        id="fname"
        name="firstname"
        v-model="author.firstname"
        placeholder="Имя автора.."
      />

      <label for="lname">Фамилия</label>
      <input
        type="text"
        required
        id="lname"
        name="lastname"
        v-model="author.lastname"
        placeholder="Фамилия автора.."
      />

      <label for="occupation">Профессия</label>
      <input
        type="text"
        required
        id="occupation"
        name="occupation"
        v-model="author.occupation"
        placeholder="Писатель, поэт.."
      />

      <button id="submit-btn">Сохранить</button>
    </form>
  </div>
</template>

<script>
import authorDataService from "../services/AuthorDataService";

export default {
  name: "author",
  data() {
    return {
      author: {
        id: null,
        firstname: "",
        lastname: "",
        occupation: "",
      },
    };
  },
  methods: {
    async getAuthor() {
      try {
        const { status, data } = await authorDataService.get(
          this.$route.params.id
        );
        if (status == 200) {
          this.author = data;
        } else {
          alert(status);
        }
      } catch (error) {
          alert(error.message);
      }
    },
    async updateAuthor() {
      const { firstname, lastname, occupation } = this.author;
      const data = { firstname, lastname, occupation };
      if (firstname && lastname && occupation) {
        try {
          await authorDataService.update(this.$route.params.id, data);
          this.$router.push(`/admin/authors`);
        } catch (error) {
          alert(error.message);
        }
      }
    },
  },
  beforeMount() {
    this.getAuthor();
  },
};
</script>

<style lang="css">  
 @import '../assets/styles/form.css';
</style>