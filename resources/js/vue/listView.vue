<template>
  <div v-for="(item, index) in items" :key="index" >
    <list-item
      :item="item"
      class="item"
      v-on:itemchanged="$emit('reloadlist')"
      />
  </div>
</template>

<script>
    import listItem from "./listItem"
    import ListItem from "./listItem.vue"

    export default {
        props: ['items'],
        emits: ['reloadlist'],
        components: {
          listItem
        }
    }
</script>

<style scoped>
  .item {
    padding: 5px;
    margin-top: 5px;
  }

</style>
