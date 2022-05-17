<template>
  <div class="wrapper">
    <div class="main_header">
      <div class="link_wrapper">
        <a href="/">Главная</a>
        <a href="#">О нас</a>
        <a href="#">Контакты</a>
      </div>
    </div>
    <div class="categories_wrapper">
      <div class="categories">
        <CategoryItem />
        <CategoryItem />
        <CategoryItem />
        <CategoryItem />
        <CategoryItem />
      </div>
    </div>
  </div>
</template>

<script>
import CategoryItem from './CategoryItem.vue'
export default {
  name: 'Header',
  components:{
    CategoryItem
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
    .main_header
      width: 100vw
      height: 7vh
      border-bottom: 1px solid grey
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
          color: #c11e26
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
