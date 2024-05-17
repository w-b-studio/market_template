<template>
  <div class="admin_wrapper">
    <form class="login" v-show="!this.is_auth">
      <legend class="text-center">Login</legend>
      <input type="text" v-model="username" placeholder="Username">
      <input type="password" v-model="password" placeholder="Password">
      <button @click="Login">Login</button>
    </form>
    <div class="d-flex flex-column align-items-center w-100" v-show="this.is_auth">
      <div class="wrapper">
        <div class="d-flex flex-column admin-item">
          <h2 class="text-left margins">Заявки</h2>
          <div
            v-for="item in requests" 
            :key="item.id"
            class="margins bot-line">
              <span>Имя: {{item.buy_name}}</span><br>
              <span>Телефон: {{item.number}}</span><br>
              <span>Адрес: {{item.city}}, {{item.area}}, {{item.address}}</span><br>
              <div class="req_product"> 
                <span v-for="product in item.requestproduct" :key="product.id">
                    {{product.product.name}} Ценна: {{product.product.price}}
                </span>
              </div> 
                <span>
                    Дата отправки: {{item.created_at}}
                </span>
          </div>
        </div>
        <div class="d-flex flex-column admin-item mt-3">
          <h2 class="text-left margins">Категории</h2>
          <form class="d-flex flex-row margins">
            <input type="text" placeholder="Название" v-model="category_name">
            <button class="button-margin" @click="CreateCategory">Создать</button>
          </form>
          <div
            v-for="item in categories" 
            :key="item.id"
            class="margins">
              <span class="item-text">{{item.id}}. {{item.name}}</span>
              <button class="button-margin" @click="DeleteCategory(item.id)">Удалить</button>
          </div>
        </div>
        <div class="d-flex flex-column admin-item mt-3">
          <h2 class="text-left margins">Продукты</h2>
          <form class="margins">
            <input class="input-margin" type="text" placeholder="Название" v-model="product_name" required>
            <input class="input-margin" type="text" placeholder="Цена" v-model="product_price" required>
            <input class="input-margin" type="text" placeholder="Характеристика 1" v-model="first_char" required>
            <input class="input-margin" type="text" placeholder="Характеристика 2" v-model="second_char" required>
            <input class="input-margin" type="text" placeholder="Характеристика 3" v-model="third_char" required>
            <input class="input-margin" type="text" placeholder="Характеристика 4" v-model="fourth_char" required>
            <input class="input-margin" type="text" placeholder="Характеристика 5" v-model="fivth_char" required>
            <select class="input-margin" type="text" placeholder="Название категории" v-model="product_category" required>
              <option v-for="option in categories"
              :key="option.id"
              :value="option.name">
                {{ option.name }}
              </option>
            </select>
            <button @click="CreateProduct">Создать</button>
          </form>
          <div
            v-for="item in products" 
            :key="item.id"
            class="margins">
              <span class="item-text">{{item.id}}. {{item.name}} {{item.price}}тг.</span>
              <input class="button-margin" type="file" name="image" id="file_input" @change="CreateImage($event, item.id)">
              <button class="button-margin" @click="DeleteProduct(item.id)">Удалить</button>
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
      first_char: null,
      second_char: null,
      third_char: null,
      fourth_char: null,
      fivth_char: null,
      delete_product: null,
      product_id: null,
      requests: [],
      categories: [],
      products: [],
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
        window.localStorage.setItem('is_admin',true)
      }else{
        alert('Не правильный логин или пароль');
      }
    },
    CreateCategory(){
      axios.post('/api/category', {
          name: this.category_name
          }) .then(function (response) {
          window.location.reload()
        })
        debugger;
    },
    CreateProduct(){
      axios.post('/api/product', {
          name: this.product_name,
          price: this.product_price,
          first_char: this.first_char,
          second_char: this.second_char,
          third_char: this.third_char,
          fourth_char: this.fourth_char,
          fivth_char: this.fivth_char,
          category: this.product_category
          }) .then(function (response) {
          window.location.reload()
        })
    },
    CreateImage(event,id){
      debugger;
      let bodyFormData = new FormData()
      bodyFormData.append('image', event.target.files[0])
      axios({
          method: 'post', 
          url:  '/api/create_image/'+ id, 
          data: bodyFormData,
          headers: { "Content-Type": "multipart/form-data" },
      }).then(function (response) {
          alert('good');
        })
    },
    DeleteProduct(id){
      axios.delete('/api/product/'+id).then(function (response) {
          window.location.reload()
        });
    },
    DeleteCategory(id){
      axios.delete('/api/category/'+id).then(function (response) {
          window.location.reload()
        });
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
    axios
      .get('/api/category')
      .then(response => (this.categories = response.data));
    axios
      .get('/api/product')
      .then(response => (this.products = response.data));
    this.is_auth = window.localStorage.getItem('is_admin');
  },
}
</script>

<style lang="sass" scoped>
  .button-margin
    margin-left: 1.5vw
  .input-margin
    margin-top: 2vh
    margin-left: 1vw 
  .wrapper
    margin-top: 5vh
    margin-left: 10vw
    margin-bottom: 5vh
  .bot-line
    border-bottom: 1px solid gray
    width: 80%
  .margins
    margin-left: 2vw
    margin-top: 2vh
  .admin-item
    border: 1px solid gray
    border-radius: 20px
    width: 60%
  .item-text
    font-size: 4vh
    margin-top: 2vh
    border-bottom: 1px solid gray
  .admin_wrapper
    width: 100vw
    height: 100%
    display: flex
    align-items: center
    justify-content: center
    .create_category
      width: 17% !important
    .create_product
      width: 20% !important
      height: 90vh
    .delete_product
      width: 14% !important
      legend
        font-size: 1.2em
        padding-bottom: 2vh
    .login
      width: 23%
      height: 40%
      background-color: gray
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
