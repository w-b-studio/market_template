<template>
	<div class="modal_main_wrapper">
		<div class="modal_wrapper">
			<h1>Ваша корзина</h1>
			<span class="close" @click="CloseModal">X</span>
			<div class="c_item_wrapper">
				<CartItem />
				<CartItem />
				<CartItem />
				<CartItem />
				<CartItem />
				<CartItem />
				<CartItem />
			</div>
			<form>
				<legend>Введите ваш номер</legend>
				<input type="text" placeholder="+77077777777" min="11" max="12" required>
				<button @click="TakeOrder">Оставить заявку</button>
			</form>
		</div>
	</div>
</template>

<script>
import CartItem from '../components/CartItem.vue'
export default {
    name: 'Cart',
		props:{
			is_visible:{
				type: Boolean,
				default: false
			}
		},
		components:{
			CartItem
		},
		methods: {
			CloseModal(){
				document.getElementById("modal").style.visibility = "hidden"
			}
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
					background-color: #c11e26
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