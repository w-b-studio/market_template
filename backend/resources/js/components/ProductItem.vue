<template>
  <div class="product_main_wrapper" v-show="is_visible">
    <div class="product_wrapper">
      <img v-bind:src="image.path">
      <div class="right_wrapper">
        <h1>{{ItemData.id}}.{{ItemData.name}}</h1>
        <div class="right_block">
          <h2>Ценна<span>{{ItemData.price}} ₸</span></h2>
          <button @click="addToCard">Добавить</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
      return {
        is_visible: true,
        image: null
      }
    },
    props:{
      ItemData: {
        type: Object,
        default: () => {}
    },
    is_category: {
      type: Boolean,
      default: false
    }
    },
    methods: {
      addToCard(){
        if (!localStorage.getItem("cart")) {
          localStorage.setItem("cart", JSON.stringify([]));
        }
        const cartItems = JSON.parse(localStorage.getItem("cart"));
        cartItems.push(this.ItemData);
        localStorage.setItem("cart", JSON.stringify(cartItems));
        window.location.reload(true);
      }
    },
    mounted() {
      if(this.is_category){
        if(this.ItemData.category_id != this.$route.params.id){
          this.is_visible = false
        }
      }
      axios
        .get('/api/image/get/'+this.ItemData.id)
        .then(response => (this.image = response.data))
        .catch(function (error) {
          if (error.response) {
            console.log(error.response.data);
            console.log(error.response.status);
            console.log(error.response.headers);
          }
        });
    },
}
</script>

<style lang="sass" scoped>
  .product_main_wrapper
    width: 100%
    height: 38.4vh
    display: flex
    align-items: center
    justify-content: center
    position: relative
    padding-bottom: 3vh
    .product_wrapper
      width: 100%
      height: 100%
      display: flex
      flex-direction: row
      background-color: #FFFFFF
      img
        margin-left: 1.8vw
        margin-top: 2vh
        width: 200px
        height: 200px
        background-color: gray
        background-size: 100% 100%
      .right_wrapper
        margin-left: 2vw
        width: 47%
        h1
          font-size: 1.3em
          margin-top: 2vh
          border-bottom: 1px solid #E6E4E4
          padding-bottom: 1.5vh
        .right_block
          right: 3%
          position: absolute
          button
            font-size: 1em
            color: white
            background-color: #FC911F
            border: none
            padding-top: 0.8vh
            padding-bottom: 0.8vh
            padding-left: 1vw
            padding-right: 1vw
            cursor: pointer
          h2
            font-size: 1.1em
            font-weight: 700
            margin-top: 10vh
            display: flex
            flex-direction: column
            align-items: center
            span
              font-weight: 700
          
</style>