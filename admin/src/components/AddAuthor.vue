<template>
  <div class="form-wrapper">
    <h3>Создание автора</h3>
    <form @submit.prevent="saveAuthor">
      <label for="fname">Имя</label>
      <input type="text" required id="fname" name="firstname" v-model="author.firstname" placeholder="Имя автора.." />

      <label for="lname">Фамилия</label>
      <input type="text" required id="lname" name="lastname" v-model="author.lastname" placeholder="Фамилия автора.." />

      <label for="occupation">Профессия</label>
      <input type="text" required id="occupation" name="occupation" v-model="author.occupation" placeholder="Писатель, поэт.." />

      <button id="submit-btn">Сохранить</button>
    </form>
  </div>
</template>

<script>
import authorDataService from "../services/AuthorDataService";

export default {
  name: "add-author",
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
    async saveAuthor() {
      const { firstname, lastname, occupation } = this.author;
      const data = { firstname, lastname, occupation };
      if(firstname && lastname && occupation) {
          try {
              await authorDataService.create(data);
              this.$router.push(`/admin/authors`);      
          } catch (error) {
              alert(error.message);
          }
      }
    },
  },
};
</script>

<style lang="css">  
 @import '../assets/styles/form.css';
</style>