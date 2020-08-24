<template>
  <table>
    <tr>
      <th v-for="(col, i) in columns" :key="i">{{col}}</th>
    </tr>
    <tr v-for="(item, i) in data" :key="i">
      <td v-for="(value, k) in item" :key="k">{{ value }}</td>
      <td v-if="detailInfo">
        <a href="javascript:void(0)" @click="onView(item)">Просмотр</a>
      </td>
    </tr>
  </table>
</template>

<script>
export default {
  name: "v-table",
  props: {
    columns: {
      type: Array,
      required: true,
    },
    data: {
      type: Array,
      required: true,
    },
    detailInfo: Boolean,
  },
  methods: {
    onView(item) {
      this.$emit("onView", item);
    },
  },
};
</script>

<style>
table {
  width: 70%;
  margin-left: 15%;
  margin-right: 15%;
}

table td,
th {
  padding: 8px;
}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #ffffff;
  color: #343a40;
}
</style>