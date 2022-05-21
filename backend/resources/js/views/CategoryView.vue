<template>
  <div class="wrapper_with_header">
    <div class="main_wrapper">
        
      <div class="wrapper">
        <div class="path">
          <router-link to="/">Главная</router-link> > <span>Футболки</span>
        </div>
        <h2>Футболки</h2>
        
        <ProductItem 
          v-for="item in products" 
          :key="item.id"
          :ItemData = "item"
          :is_category="true"/>
      </div>
    </div>

  </div>
</template>

<script>
import axios from 'axios'
import Header from '../components/Header.vue'
import ProductItem from '../components/ProductItem.vue'
export default {
  name:'HomeView',
  data() {
    return {
      products: [],
      category: []
    }
  },
  components:{
    ProductItem,
    Header
  },
  mounted() {
    axios
      .get('/api/product')
      .then(response => (this.products = response.data))
      .get('/api/category/ds'+ $this.$route.params.id)
      .then(response => (this.category = response.data));
    console.log(this.$route.params.id);
  },
}
</script>

<style lang="sass" scoped>
  .main_wrapper
    width: 100vw
    height: auto
    display: flex
    align-items: center
    justify-content: center
    .wrapper
      margin-top: 2vh
      width: 870px
      height: auto
      display: flex
      flex-direction: column
      .path
        display: flex
        flex-direction: row
        a
          text-decoration: none
          color: black
          padding-right: 1vw
        a:hover
          text-decoration: overline
        a:active
          color: black
        span
          padding-left: 1vw
</style>
