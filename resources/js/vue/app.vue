<template>
  <div class="todoListContainer">
    <div class="heading">
      <h2 id="title">Pokedex</h2>
    </div>
    <div class="lista">
      <list-view 
        :items="items" 
        v-on:reloadlist="getList()"
      />
    </div>
  </div>
</template>

<script>

import addItemForm from "./addItemForm";
import listView from "./listView";

export default {
  components: {
    addItemForm,
    listView
  },
  data: function () {
    return {
      items: []
    }
  },
  methods: {
    getList() {
      this.axios.get('api/list')
      .then( response => {
        this.items = response.data
      })
      .catch( error => {
        console.log( error );
      })
    }
  },
  created() {
    this.getList();
  }
}

</script>

<style scoped>

.todoListContainer {
  width: 80vh;
  margin: auto;
}

.heading {
  background: #e6e6e6;
  padding: 10px;
}

#title {
  text-align: center;
}

.lista {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: left;
    align-items: center;
}
</style>
