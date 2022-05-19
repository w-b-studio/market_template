<template>
  <div class="admin_wrapper">
    <form v-show="!this.is_auth">
      <legend>Login</legend>
      <input type="text" v-model="username" placeholder="Username">
      <input type="password" v-model="password" placeholder="Password">
      <button @click="Login">Login</button>
    </form>
    <div class="template" v-show="this.is_auth">
        <form>
          <legend>Создать Категорию</legend>
          <input type="text" placeholder="Название" v-model="category_name">
          <button @click="CreateCategory">Создать</button>
        </form>
        <button @click="Modal">Посмотреть заявки</button>
        <form>
          <legend>Создать Продукт</legend>
          <input type="text" placeholder="Название" v-model="product_name">
          <input type="text" placeholder="Ценна" v-model="product_price">
          <input type="text" placeholder="Название категории" v-model="product_category">
          <button @click="CreateProduct">Создать</button>
        </form>
        <div id="admin_modal">
          <a @click="Modalback">back</a>
          <div class="requests">
            <div class="request_item"
              v-for="item in requests" 
              :key="item.id">
              <span>Телефон: {{item.number}}</span> <div class="req_product"> <span v-for="product in item.requestproduct" :key="product.id">{{product.product.name}} Ценна: {{product.product.price}}</span></div> <span>Дата отправки: {{item.created_at}}</span>
            </div>
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
      requests: [],
      product_name: null,
      product_price: 0,
      product_category: null,
      category_name: null,
      username: null,
      password: null,
      admin_username: 'admin',
      admin_password: 'admin',
      is_auth: false,
      file: null
    }
  },
  methods: {
    Login(){
      if(this.username === this.admin_username && this.password === this.admin_password){
        this.is_auth = true;
      }else{
        alert('Не правильный логин или пароль');
      }
    },
    CreateCategory(){
      axios.post('http://localhost:8000/api/category', {
          name: this.category_name
          }) .then(function (response) {
          console.log(response);
        })
        debugger;
    },
    CreateProduct(){
      axios.post('http://localhost:8000/api/product', {
          name: this.product_name,
          price: this.product_price,
          category: this.product_category
          }) .then(function (response) {
          console.log(response);
        })
      // this.files = document.getElementById('file_input').file[0];
    },
    Modal(){
      document.getElementById("admin_modal").style.visibility = "visible";
    },Modalback(){
      document.getElementById("admin_modal").style.visibility = "hidden";
    }
  },mounted() {
    axios
      .get('http://localhost:8000/api/request')
      .then(response => (this.requests = response.data));
  },
}
</script>

<style lang="sass" scoped>
  .admin_wrapper
    width: 100vw
    height: 100vh
    display: flex
    justify-content: center
    align-items: center
    form
      width: 25%
      height: 40%
      background-color: black
      color: white
      display: flex
      justify-content: center
      align-items: center
      flex-direction: column
      legend
        padding-bottom: 4vh
        font-size: 2em
      input
        margin-bottom: 2vh
    .template
      width: 80%
      height: 100vh
      display: flex
      flex-direction: row
      align-items: center
      justify-content: space-around
      #admin_modal
        visibility: hidden
        width: 100vw
        height: 100vh
        position: absolute
        background-color: white
        display: flex
        align-items: center
        justify-content: center
        .requests
          width: 80%
          height: 90%
          background-color: #cacaca
          overflow-y: auto
          .request_item
            width: 100%
            height: 5vh
            margin-top: 2vh
            border-bottom: 1px solid black
            display: flex
            flex-direction: row
            align-items: center
            justify-content: space-around
            .req_product
              width: 50%
              display: grid
              grid-template-columns: 1fr 1fr 1fr
              overflow-y: auto
              overflow-x: hidden
              height: 100%
              span
                width: 100%
        a
          cursor: pointer
          color: red
          text-decoration: underline
          font-size: 2em
          left: 2%
          top: 3%
          position: absolute
</style>
