<template>
  <div class="product_main_wrapper">
    <div class="product_wrapper">
      <div class="image"></div>
      <div class="right_wrapper">
        <h1>Крутая футболка</h1>
        <h2>Ценна: <span>10000</span> ₸</h2>
        <button>Добавить</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    
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
      .image
        border-radius: 10px
        margin-left: 1.8vw
        margin-top: 4.5vh
        width: 35%
        height: 70%
        background: url('../assets/tshirt.png') no-repeat
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
          background-color: #de2e36
          border-radius: 10px
          padding-top: 0.8vh
          padding-bottom: 0.8vh
          padding-left: 1vw
          padding-right: 1vw
          margin-top: 5vh
          cursor: pointer

</style>