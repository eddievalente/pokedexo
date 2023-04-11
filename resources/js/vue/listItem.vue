<template>
  <div :class="[ item.have_it ? '' : 'missing', 'item']">
    <div class="blockinfo">
      <input
        type="checkbox"
        class="blockcheck"
        @change="updateCheck()"
        v-model="item.have_it"
        :checked="item.have_it"
        />
      <span class="pokecode"> {{ item.id }} </span>
      <span class="pokesprite"> <img class="pokeimage" :src="item.sprite" /></span>
      <span class="pokename"> {{ item.name }} </span>
      <div class="poketypes">
        <span class="poketype"> {{ item.type_1 }} </span>
        <span v-if=item.type_2 class="poketype"> {{ item.type_2 }} </span>
      </div>
    </div>
    
  </div>
</template>

<script>
    export default {
        props: ['item'],
        emits: ['itemchanged'],
        methods: {
          updateCheck() {
            this.axios.put('api/pokemon/' + this.item.id, {
              item: this.item
            })
            .then( response => {
              if ( response.status == 200 ) {
                this.$emit('itemchanged');
              }
            })
            .catch( error => {
              console.log( error );
            })
          }
        }
    }
</script>

<style scoped>
.item {
  position: relative;
  float: left;
  display: table;
  width: 150px;
  margin: 5px;
  padding: 0;
  font-family: sans-serif;
  border: solid 3px #999999;
  background: #FFFFFF;
}
.missing {
  background: #FFD700;
}
.trashcan {
  background: #e6e6e6;
  border: none;
  color: #FF0000;
  outline: none;
}
.blockcheck {
  float:left;
  display: block;
}
.blockinfo {
  float: left;
  display: block;
  width: 100%;
  padding: 0;
  margin: 0;
}
.pokename {
  display: block;
  width: 100%;
  font-size: 14px;
  text-align: center;
  text-transform: uppercase;
}
.pokecode {
  display: block;
  width: 100%;
  font-size: 30px;
  text-align: right;
}
.pokesprite {
  display: block;
  width: 100%;
  text-align: center;
}
.pokeimage {
  height:80px;
}
.poketypes {
  float: left;
  width: 100%;
  padding: 5px;
  text-align: center;
  margin: 0;
}
.poketype {
  display: inline-block;
  padding: 5px 10px;
  font-size: 10px;
  margin: 0 5px;
  background: #000033;
  color: #FFFFFF;
  text-transform: uppercase;
  text-align: center;
}
</style>
