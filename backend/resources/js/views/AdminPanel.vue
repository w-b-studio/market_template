<template>
  <div class="admin_wrapper">
    <form v-show="!this.is_auth">
      <legend>Login</legend>
      <input type="text" v-model="username" placeholder="Username">
      <input type="password" v-model="password" placeholder="Password">
      <button @click="Login">Login</button>
    </form>
    <div class="template" v-show="this.is_auth">
        <form class="create_category">
          <legend>Создать Категорию</legend>
          <input type="text" placeholder="Название" v-model="category_name">
          <button @click="CreateCategory">Создать</button>
        </form>
        <button @click="Modal">Посмотреть заявки</button>
        <form class="create_product">
          <legend>Создать Продукт</legend>
          <input type="text" placeholder="Название" v-model="product_name">
          <input type="text" placeholder="Ценна" v-model="product_price">
          <input type="text" placeholder="Название категории" v-model="product_category">
          <button @click="CreateProduct">Создать</button>
        </form>
        <form>
          <legend>Добавить картинку</legend>
          <input type="text" placeholder="Id продукта" v-model="product_id">
          <input type="file" name="image" id="file_input" @change="CreateImage">
          Сначала id потом файл
        </form>
        <form class="delete_product">
         <legend>Удалить продукт</legend> 
          <input type="text" placeholder="Id продукта" v-model="delete_product">
          <button @click="DeleteProduct">Удалить</button>
         <legend>Удалить Категорию</legend> 
          <input type="text" placeholder="Id категории" v-model="delete_category">
          <button @click="DeleteCategory">Удалить</button>
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
      delete_category: null,
      delete_product: null,
      product_id: null,
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
      axios.post('/api/category', {
          name: this.category_name
          }) .then(function (response) {
          console.log(response);
        })
        debugger;
    },
    CreateProduct(){
      axios.post('/api/product', {
          name: this.product_name,
          price: this.product_price,
          category: this.product_category
          }) .then(function (response) {
          console.log(response);
        })
    },
    CreateImage(event){
      debugger;
      let bodyFormData = new FormData()
      bodyFormData.append('image', event.target.files[0])
      axios({
          method: 'post', 
          url:  '/api/create_image/'+ this.product_id, 
          data: bodyFormData,
          headers: { "Content-Type": "multipart/form-data" },
      })
    },
    DeleteProduct(){
      axios.delete('/api/product/'+this.delete_product);
    },
    DeleteCategory(){
      axios.delete('/api/category/'+this.delete_category);
    },
    Modal(){
      document.getElementById("admin_modal").style.visibility = "visible";
    },Modalback(){
      document.getElementById("admin_modal").style.visibility = "hidden";
    }
  },mounted() {
    axios
      .get('/api/request')
      .then(response => (this.requests = response.data));
  },
}
</script>

<style lang="sass" scoped>
  .admin_wrapper
    width: 100vw
    height: 100vh
    display: flex
    align-items: center
    justify-content: center
    .create_category
      width: 17% !important
    .create_product
      width: 20% !important
    .delete_product
      width: 14% !important
      legend
        font-size: 1.2em
        padding-bottom: 2vh
    form
      width: 23%
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
      width: 90%
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
