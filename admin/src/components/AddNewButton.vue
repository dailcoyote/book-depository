<template>
  <button @click="onCreate">Создать</button>
</template>

<script>
export default {
  name: "add-new-button",
  methods: {
    onCreate() {
      this.$emit("onCreate");
    },
  },
};
</script>

<style scoped>
button {
  margin: 0 0 10px 0;
  float: right;
  background-color: #343a40 !important;
  color: #fff;
  padding: 6px 5px;
  text-align: center;
  cursor: pointer;
  border-radius: 5px;
}
</style>