<template>
  <div class="wrapper">
    <div class="main_header">
      <div class="link_wrapper">
        <span class="city"><img src="/assets/location.svg"> Алматы</span>
        <span class="header_phone"><img src="/assets/phone.svg"> +7 (777) 777 77 77</span>
        <span class="header_mobile"><img src="/assets/mobile.svg"> +7 777 777 77 77</span>
      </div>
      
    </div>
    <div class="categories_wrapper">
      <div class="second_wrapper">
        <div class="all" @mouseover="upHere = true" @mouseleave="upHere = false" >
          <img src="/assets/menu.svg">
          <span>Все категории</span>
          <img src="/assets/chevron-down.svg" class="down">
          <div class="all_categories" v-show="upHere">
            
            <CategoryItem class="category_item"
            v-for="item in categories" 
              :key="item.id"
              :ItemData = "item"/>
            </div>
        </div>
        <div class="categories">
          <CategoryItem class="one_category"
          v-for="(item,index) in categories" 
            :key="item.id"
            :ItemData = "item"
            :iter = "index"/>
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
      upHere : false,
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
    height: 95px
    font-family: 'Roboto Flex', sans-serif
    z-index: 10000
    .main_header
      width: 100vw
      height: 35px
      border-bottom: 1px solid grey
      background-color: #2B51A1
      display: flex
      align-items: center
      flex-direction: row
      justify-content: center
      .link_wrapper
        width: 1180px
        height: 35px
        display: flex
        flex-direction: row
        align-items: center
        color: white
        font-size: 0.8em
        .city
          font-size: 0.8em
          width: 8vw
        .header_mobile
          font-size: 0.8em
          margin-left: 2vw
        .header_phone
          font-size: 0.8em
          margin-left:64%

          
    .categories_wrapper
      width: 100vw
      height: 60px
      display: flex
      align-items: center
      justify-content: center
      border-bottom: 1px solid grey
      background-color: #FFFFFF
      .korzina
        width: 2.8vw
        height: 5vh
        margin-left: 8vw
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
          font-size: 10px
          color: white
          background-color: #2B51A1
          border-radius: 50%
          padding: 0.5vh
          z-index: 100
      .categories
        width: 770px
        height: 100%
        display: flex
        color: #4A75CF
        .one_category
          padding-left: 2vw
          padding-right: 2vw
      .second_wrapper
        width: 1180px
        height: 100%
        display: flex
        flex-direction: row
        align-items: center
        .all
          color: #4A75CF
          cursor: pointer
          border-right: 1px solid #E6E4E4
          height: 100%
          width: 170px
          display: flex
          align-items: center
          position: relative
          span
            font-size: 0.9em
            margin-left: 0.5vw
            padding-right: 0.4vw
          .all_categories
            position: absolute
            left: 0%
            top: 100%
            width: 170px
            border-left: 1px solid black
            border-right: 1px solid black
            border-bottom: 1px solid black
            background-color: #FFFFFF
            .category_item
              height: 5vh !important
              border-bottom: gray !important
              margin-left: 0.5vw

        
        
</style>
