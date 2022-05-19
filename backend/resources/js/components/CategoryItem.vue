<template>
  <div class="item_wrapper">
     <div class="link" @click="goToPage">{{ItemData.name}}</div>
  </div>
</template>

<script>
export default {
  props: {
    ItemData: {
        type: Object,
        default: () => {}
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
    .link
      text-decoration: none
      color: black
    .link:hover
      cursor: pointer
      color: #eb4034
</style>