<template>
  <table id="data-list">
    <tr>
      <th v-for="(col, i) in columns" :key="i">{{col}}</th>
      <th></th>
      <th></th>
    </tr>
    <tr v-for="(item, i) in data" :key="i">
      <td v-for="(value, k) in item" :key="k">{{ value }}</td>
      <td>
        <a href="javascript:void(0)" @click="onEditItem(item)">Редактировать</a>
      </td>
      <td>
        <a href="javascript:void(0)" @click="onDeleteItem(item)">Удалить</a>
      </td>
    </tr>
  </table>
</template>

<script>
export default {
  name: "data-list",
  props: {
    columns: {
      type: Array,
      required: true,
    },
    data: {
      type: Array,
      required: true,
    },
  },
  methods: {
    onEditItem(value) {
      this.$emit("editItem", value);
    },
    onDeleteItem(value) {
      this.$emit("deleteItem", value);
    },
  },
};
</script>

<style>
#data-list {
  width: 100%;
}

#data-list td,
#data-list th {
  padding: 8px;
}

#data-list tr:nth-child(even) {
  background-color: #f2f2f2;
}

#data-list tr:hover {
  background-color: #ddd;
}

#data-list td a {
  color: black;
}

#data-list th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #ffffff;
  color: #343a40;
}
</style>