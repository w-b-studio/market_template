<template>
  <div id="app">
    <Header />
    <router-view />
    <Footer />
  </div>
</template>

<script>
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'
export default {
  components:{
    Footer,
    Header
  }
}
</script>

<style lang="sass">
  body
    margin: 0
    font-size: 2vh
    overflow-x: hidden
    position: relative
</style>
