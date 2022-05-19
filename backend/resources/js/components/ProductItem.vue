<template>
  <div class="product_main_wrapper" v-show="is_visible">
    <div class="product_wrapper">
      <img v-bind:src="image.path">
      <div class="right_wrapper">
        <h1>{{ItemData.id}}.{{ItemData.name}}</h1>
        <h2>Ценна: <span>{{ItemData.price}}</span> ₸</h2>
        <button @click="addToCard">Добавить</button>
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
    height: 40vh
    display: flex
    align-items: center
    justify-content: center
    .product_wrapper
      width: 70%
      height: 85%
      border-radius: 15px
      display: flex
      flex-direction: row
      background-color: #cacaca
      img
        border-radius: 10px
        margin-left: 1.8vw
        margin-top: 4.5vh
        width: 10vw
        height: 27vh
        background-color: gray
        background-size: 100% 100%
      .right_wrapper
        margin-left: 2vw
        width: 47%
        h1
          font-size: 1.3em
          margin-top: 5.5vh
        h2
          font-size: 1.1em
          font-weight: 400
          margin-top: 10vh
          margin-left: 2vw
          span
            font-weight: 700
            color: red
        button
          font-size: 1em
          float: right
          background-color: #eb4034
          border-radius: 10px
          padding-top: 0.8vh
          padding-bottom: 0.8vh
          padding-left: 1vw
          padding-right: 1vw
          margin-top: 5vh
          cursor: pointer

</style>