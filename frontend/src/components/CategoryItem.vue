<template>
  <div class="item_wrapper">
     <router-link :to='{ path: `/category/${ this.ItemData.id }` }' class="link" >{{ItemData.name}}</router-link>
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
}
</script>

<style lang="sass" scoped>
  .item_wrapper
    .link
      text-decoration: none
      color: black
    .link:hover
      color: #eb4034
</style>