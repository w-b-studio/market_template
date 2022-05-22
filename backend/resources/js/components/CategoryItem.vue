<template>
  <div class="item_wrapper" v-show="iter < 5">
     <div class="link" @click="goToPage">{{ItemData.name}}</div>
  </div>
</template>

<script>
export default {
  props: {
    ItemData: {
        type: Object,
        default: () => {}
    },
    iter: {
        type: Number,
        default: 0
    }
  },
  methods: {
    goToPage(){
      this.$router.push('/category/' + this.ItemData.id);
      window.location.reload(true);
    }
  },
}
</script>

<style lang="sass" scoped>
  .item_wrapper
    display: flex
    align-items: center
    .link
      margin-left: 0.5vw
      text-decoration: none
      color: black
      color: #4A75CF
      font-size: 0.9em
    .link:hover
      cursor: pointer
</style>