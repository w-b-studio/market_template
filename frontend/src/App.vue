<template>
  <div id="app">
    <Header id="header"/>
    <router-view />
  </div>
</template>

<script>
import Header from './components/Header.vue'
export default {
    components:{
      Header
  },
  mounted() {
    if(this.$route.path === '/admin'){
      document.getElementById("header").style.visibility = "hidden"
    }
  },
}
</script>

<style lang="sass">
  body
    margin: 0
    font-size: 2vh
    overflow-x: hidden
    position: relative
</style>
