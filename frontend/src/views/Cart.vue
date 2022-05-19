<template>
	<div class="modal_main_wrapper">
		<div class="modal_wrapper">
			<h1>Ваша корзина</h1>
			<span class="close" @click="CloseModal">X</span>
			<div class="c_item_wrapper">
				<div style ="width: 100%; height: 6vh; background-color: #cacaca; display: flex; align-items: center; justify-content: space-around; margin-top: 2vh" v-for="(c, index) of cart_items" :key="c.id">
          {{c.name}}<span>Ценна : {{c.price}} ₸</span>
          <svg style="cursor: pointer;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bucket" viewBox="0 0 16 16" @click="removeObject(index)">
          <path d="M2.522 5H2a.5.5 0 0 0-.494.574l1.372 9.149A1.5 1.5 0 0 0 4.36 16h7.278a1.5 1.5 0 0 0 1.483-1.277l1.373-9.149A.5.5 0 0 0 14 5h-.522A5.5 5.5 0 0 0 2.522 5zm1.005 0a4.5 4.5 0 0 1 8.945 0H3.527zm9.892 1-1.286 8.574a.5.5 0 0 1-.494.426H4.36a.5.5 0 0 1-.494-.426L2.58 6h10.838z"/>
          </svg>
        </div>
			</div>
			<form>
				<legend>Введите ваш номер</legend>
				<input type="text" placeholder="+77077777777" min="11" max="12" required v-model="phone">
				<button @click="TakeOrder">Оставить заявку</button>
			</form>
		</div>
	</div>
</template>

<script>
import Header from '../components/Header.vue'
import axios from 'axios'
export default {
    name: 'Cart',
	data() {
		return {
      phone: null,
      products_request: [],
			cart_items: [],
			all: []
		}
	},
		props:{
			is_visible:{
				type: Boolean,
				default: false
			}
		},
		methods: {
      TakeOrder(){
        if(this.cart_items.length != 0){
          this.cart_items.forEach((element) => {
          this.products_request.push({product_id: element.id});
        })
         axios.post('http://localhost:8000/api/request', {
          number: this.phone,
          products: this.products_request
          }) .then(function (response) {
          console.log(response);
        }).catch(
          function (error) {
            window.location.reload(true);
            localStorage.removeItem("cart");
          }
        )
        }else{
          alert("У вас нету товаров");
        }
      },
			CloseModal(){
				this.$router.push('/');
			},
      removeObject(id){
        var cartItems = JSON.parse(localStorage.getItem("cart"));
        localStorage.removeItem("cart");
        cartItems.splice(id, 1);
        localStorage.setItem("cart", JSON.stringify(cartItems));
        this.cart_items = JSON.parse(localStorage.getItem("cart"));
        window.location.reload(true);
      }
		},
		beforeMount() {
			this.cart_items = JSON.parse(localStorage.getItem("cart"));
			console.log(this.cart_items);
		},
}
</script>

<style lang="sass" scoped>
	.modal_main_wrapper
		width: 100vw
		height: 100vh
		position: absolute
		z-index: 1000
		background-color: rgba(0, 0, 0, 0.8)
		display: flex
		align-items: center
		justify-content: center
		.modal_wrapper
			width: 70%
			height: 80%
			background-color: white
			border-radius: 20px
			position: relative
			z-index: 9999
			.c_item_wrapper
				margin-top: 5vh
				overflow-y: auto
				height: 70%
			form
				margin-top: 2.5vh
				margin-left: 30vw
				legend
					padding-bottom: 1.5vh 
				input
					height: 3vh
					font-size: 1.5vh
				button
					margin-left: 1vw
					height: 3.5vh
					width: 8vw
					border-radius: 10px
					font-size: 1.5vh
					background-color: #eb4034
					cursor: pointer
			h1
				margin-left: 4vw
				font-size: 1.5em
			.close
				right: 4%
				top: 4%
				position: absolute
				color: black
				font-weight: 800
				font-size: 2em
			.close:hover
				cursor: pointer
				
</style>