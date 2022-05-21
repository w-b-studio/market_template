<template>
  <div class="wrapper_with_header">
    <div class="main_wrapper">
        <img src="/assets/main_block.png" class="main_block">
        <div class="four_wrapper">
          <div class="four_block_item" style="background-color: #4A75CF; color: white">
            <span>Доставка по регионам</span>
          </div>
          <div class="four_block_item" style="background-color: #E8E9ED; color: #5D5D64">
            <span>Оптовые ценны</span>
          </div>
          <div class="four_block_item" style="background-color: #D7E9F7; color: #5D5D64">
            <span>Гарантия качества</span>
          </div>
          <div class="four_block_item" style="background-color: #FFC626; color: white">
            <span>Консультация специалистов</span>
          </div>
        </div>
        <div class="partners_wrapper">
          <div class="partner_item">
            <img src="/assets/canon.svg">
          </div>
          <div class="partner_item">
            <img src="/assets/microsoft.svg">
          </div>
          <div class="partner_item">
            <img src="/assets/hp.svg">
          </div>
          <div class="partner_item">
            <img src="/assets/samsung.svg">
          </div>
          <div class="partner_item">
            <img src="/assets/lenovo.svg">
          </div>
          <div class="partner_item">
            <img src="/assets/oppo.svg">
          </div>
          <div class="partner_item">
            <img src="/assets/lg.svg">
          </div>
          <div class="partner_item">
            <img src="/assets/epson.svg">
          </div>
          <div class="partner_item">
            <img src="/assets/huawei.svg">
          </div>
        </div>
    </div>

  </div>
</template>

<script>
import Header from '../components/Header.vue'
import axios from 'axios'
import ProductItem from '../components/ProductItem.vue'
export default {
  name:'HomeView',
  data() {
    return {
      products: []
    }
  },
  components:{
    ProductItem,
    Header
  },
  mounted() {
    axios
        .get('/api/product')
        .then(response => (this.products = response.data));
  },
}
</script>

<style lang="sass" scoped>
  .main_wrapper
    width: 100vw
    height: auto
    display: flex
    align-items: center
    justify-content: center
    flex-direction: column
    background-color: #FCFCFC
    .main_block
      margin-top: 4vh
    .four_wrapper
      margin-top: 1vh
      width: 1180px
      display: flex
      flex-direction: row
      align-items: center
      justify-content: space-between
      .four_block_item
        height: 180px
        width: 24%
        display: flex
        align-items: center
        justify-content: center
        font-size: 1.5em
        font-weight: 700
        span
          width: 80%
          text-align: center
    .partners_wrapper
      width: 1180px
      height: 15vh
      display: flex
      flex-direction: row
      align-items: center
      justify-content: space-between
      margin-top: 1vh
      .partner_item
        width: 10%
        height: 60px
        display: flex
        align-items: center
        justify-content: center
        border: 1px solid #E6E4E4
        background-color: #FFFFFF
        border-radius: 10px
</style>
