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

<style scoped>
.form-wrapper {
  padding: 30px;
  width: 50%;
  border-radius: 5px;
  background-color: #f2f2f2;
}

form {
  margin: 20px 0;
}

form input[type="text"],
select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

form #submit-btn {
  width: 100%;
  background-color: #343a40;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
</style>