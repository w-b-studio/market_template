<template>
  <div class="wrapper_with_header">
    <Header />
    <div class="main_wrapper">
        
      <div class="wrapper">
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
      products: []
    }
  },
  components:{
    ProductItem,
    Header
  },
  mounted() {
    axios
      .get('http://localhost:8000/api/product')
      .then(response => (this.products = response.data));
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
      margin-top: 20vh
      width: 80%
      height: auto
      display: grid
      grid-template-columns: 1fr 1fr
</style>
