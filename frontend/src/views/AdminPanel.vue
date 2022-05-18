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
          <input type="text" placeholder="Название">
          <button @click="CreateCategory">Создать</button>
        </form>
        <button @click="Modal">Посмотреть заявки</button>
        <form>
          <legend>Создать Продукт</legend>
          <input type="text" placeholder="Название">
          <input type="text" placeholder="Ценна">
          <input type="text" placeholder="Название категории">
          <input type="file" name="image" id="file_input">
          <button @click="CreateProduct">Создать</button>
        </form>
        <div id="admin_modal">
          <a @click="Modalback">back</a>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
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

    },
    CreateProduct(event){
      this.files = document.getElementById('file_input').file[0];
    },
    Modal(){
      document.getElementById("admin_modal").style.visibility = "visible";
    },Modalback(){
      document.getElementById("admin_modal").style.visibility = "hidden";
    }
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
        a
          cursor: pointer
          color: red
          text-decoration: underline
          font-size: 2em
          margin-left: 3vw
          margin-top: 6vh
</style>
