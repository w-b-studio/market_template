<template>
  <div id="app">
    <Header />
    <router-view />
  </div>
</template>

<script>
import Header from './components/Header.vue'
export default {
    components:{
      Header
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
