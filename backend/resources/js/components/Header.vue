<template>
  <div class="wrapper">
    <div class="main_header">
      <div class="link_wrapper">
        <a href="/">Главная</a>
        <a href="#">О нас</a>
        <a href="#">Контакты</a>
      </div>
      <div class="korzina" @click="Modal">
        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
          <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
        </svg>
        <div class="products_number">
          {{cart_number}}
        </div>
      </div>
    </div>
    <div class="categories_wrapper">
      <div class="categories">
        <CategoryItem 
         v-for="item in categories" 
          :key="item.id"
          :ItemData = "item"/>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import CategoryItem from './CategoryItem.vue'
export default {
  name: 'Header',
  data() {
    return {
      categories: [],
      is_visible: false,
      cart_number: 0
    }
  },
  components:{
    CategoryItem
  },
  methods: {
    Modal(){
      this.$router.push('/cart').catch(()=>{});
    }
  },
  mounted() {
    axios
      .get('/api/category')
      .then(response => (this.categories = response.data));
     window.onbeforeunload = function(event)
    {
      var all = JSON.parse(localStorage.getItem("cart"));
      this.cart_number = all.length;
    };
  },
  beforeMount(){
    var all = JSON.parse(localStorage.getItem("cart"));
    console.log(all);
    this.cart_number = all.length;
  }
}
</script>

<style lang="sass" scoped>
  @import url('https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz@8..144&display=swap')
  .wrapper
    width: 100vw
    height: 13vh
    position: fixed
    backdrop-filter: blur(20px)
    font-family: 'Roboto Flex', sans-serif
    z-index: 10000
    .main_header
      width: 100vw
      height: 7vh
      border-bottom: 1px solid grey
      display: flex
      align-items: center
      flex-direction: row
      .korzina
        width: 2.8vw
        height: 5vh
        margin-left: 18vw
        display: flex
        justify-content: center
        align-items: center
        background-color: #cacaca
        border-radius: 50%
        position: relative
        z-index: 1
        cursor: pointer
        .products_number
          position: absolute
          width: 25px
          height: 25px
          text-align: center
          top: 60%
          left: -12%
          font-size: 0.7em
          background-color: #eb4034
          border-radius: 50%
          padding: 0.5vh
          z-index: 100
      .link_wrapper
        margin-left: 13vw
        width: 50vw
        height: 7vh
        display: flex
        flex-direction: row
        align-items: center
        justify-content: space-around
        a
          text-decoration: none
          color: black
          font-size: 1.3em
        a:active
          color: black
        a:hover
          color: #eb4034
    .categories_wrapper
      width: 100vw
      height: 6vh
      display: flex
      justify-content: center
      align-items: center
      border-bottom: 1px solid grey
      .categories
        width: 80%
        height: 100%
        display: flex
        align-items: center
        justify-content: space-around
</style>
