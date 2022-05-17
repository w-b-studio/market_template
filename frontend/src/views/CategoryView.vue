<template>
  <div class="main_wrapper">
    <div class="wrapper">
      <ProductItem />
      <ProductItem />
      <ProductItem />
    </div>
  </div>
</template>

<script>
import ProductItem from '../components/ProductItem.vue'
export default {
  name:'CategoryView',
  data() {
    return {
      
    }
  },
  components:{
    ProductItem
  }
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
