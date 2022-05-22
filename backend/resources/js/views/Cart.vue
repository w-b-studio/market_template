<template>
	<div class="modal_main_wrapper">
		<div class="path">
          <router-link to="/">Главная</router-link> > <span>Оформление заказов</span>
        <h2>Оформление заказов</h2>
        </div>
		<div class="modal_wrapper">
			<h1><span>Товары в корзине</span></h1>
			<div class="c_item_wrapper">
				<div style ="width: 100%; height: 120px; background-color: #FFFFFF; border-bottom: 1px solid #E6E4E4; display: flex; align-items: center;" v-for="(c, index) of cart_items" :key="c.id">
					<img v-bind:src="c.image.path">
					<div class="p_block">
						<span class="p_name">{{c.name}}</span>
						<ul>
							<li>{{c.first_char}}</li>
							<li>{{c.second_char}}</li>
						</ul>
						<span class="delete_object" @click="removeObject(index)"> Удалить </span>
					</div>
					<span>{{c.price}} ₸</span>
					
				</div>
			</div>
		</div>
		<div class="total">
			<div class="total_num">Итого {{products_i}} товара на сумму</div>
			<div class="total_sum">{{products_cost}} ₸</div>
			<button @click="TakeOrder">Оформить заказ</button>
		</div>
		<h2>Покупатель</h2>
		<form style="height: 12vh">
			<div class="input_block"><h3>ФИО</h3><input type="text" placeholder="Иванов Иван Иванович" required v-model="buy_name"></div>
			<div class="input_block"><h3>Мобильный телефон</h3><input type="text" placeholder="+77077777777" min="11" max="12" required v-model="phone"></div>
		</form>
		<h2>Адрес доставки</h2>
		<form style="height: 30vh; margin-bottom: 5vh;">
			<div class="input_block"><h3>Область</h3><select v-model="area">
				<option value="Алматинская область">Алматинская область</option>
			</select></div>
			<div class="input_block"><h3>Город / район</h3><select v-model="city">
				<option value="Алматы">Алматы</option>
			</select></div>
			<div class="input_block"><h3>Адрес</h3><input type="text" placeholder="Ваш адрес"  required v-model="address"></div>
			<div class="input_block"><h3>Комментарии</h3><textarea v-model="comments"></textarea></div>
		</form>
	</div>
</template>

<script>
import axios from 'axios'
export default {
    name: 'Cart',
	data() {
		return {
			buy_name: "",
			area: "",
			city: "",
			address: "",
			comments: "",
			phone: null,
			products_request: [],
			cart_items: [],
			all: [],
			products_i: 0,
			products_cost: 0
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
         axios.post('/api/request', {
			total_price: this.products_cost,
			buy_name: this.buy_name,
			area: this.area,
			city: this.city,
			address: this.address,
			comments: this.comments,
			number: this.phone,
			products: this.products_request
          }) .then(function (response) {
          console.log(response);
        }).catch(
          function (error) {
            localStorage.removeItem("cart");
          }
        )
		debugger;
        localStorage.removeItem("cart");
        }else{
          alert("У вас нету товаров");
        }
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
		if(this.cart_items!= null){
			this.cart_items.forEach((element) => {
			this.products_cost+= parseInt(element.price);
			});
			this.products_i = this.cart_items.length;
		}
		console.log(this.products_cost);
	},
}
</script>

<style lang="sass" scoped>
	.modal_main_wrapper
		width: 100vw
		display: flex
		flex-direction: column
		align-items: center
		.path
			width: 1180px
			margin-top: 2vh
			a
				padding-right: 1vw
				text-decoration: none
				color: black
			a:hover
				text-decoration: underline
			a:active
				color: black
			span
				padding-left: 1vw
			h2
				margin-top: 1vh
				padding-bottom: 2vh
		.modal_wrapper
			width: 870px
			margin-right: 310px
			height: 80%
			background-color: #FFFFFF
			position: relative
			border: 1px solid #E6E4E4
			.c_item_wrapper
				img
					width: 100px
					margin-left: 2vw
					height: 100px
					background-color: gray
					background-size: 100% 100%
				.p_block
					width: 70%
					.p_name
						margin-left: 2vw
						font-size: 1.2em
					ul
						font-size: 0.8em
						margin-bottom: 0.6vh
						margin-left: 1vw
					.delete_object
						font-weight: 700
						font-size: 0.8em
						margin-left: 3vw
						cursor: pointer
						color: #4A75CF
			h1
				margin-top: 2vh
				width: 100%
				border-bottom: 1px solid #E6E4E4
				font-size: 1.2em
				span
					margin-left: 1vw
			.close
				right: 4%
				top: 4%
				position: absolute
				color: black
				font-weight: 800
				font-size: 2em
			.close:hover
				cursor: pointer
		.total
			height: 27vh
			width: 16vw
			position: absolute
			right: 220px
			border: 1px solid #E6E4E4
			background-color: #FFFFFF
			top: 22vh
			display: flex
			flex-direction: column
			align-items: center
			.total_num
				font-size: 1.2em
				margin-top: 2vh
			.total_sum
				margin-top: 1vh
				font-weight: 700
				height: 35%
				width: 80%
				font-size: 1.2em
				text-align: center
				border-bottom: 1px solid #E6E4E4
			button
				margin-top: 8%
				color: white
				font-weight: 700
				background-color: #FC8507
				height: 22%
				width: 63%
				border: none
		h2
			width: 1180px
			margin-top: 3vh
			font-size: 1.2em
		form
			width: 870px
			background-color: #FFFFFF
			margin-left: -16.5vw
			border: 1px solid #E6E4E4
			display: flex
			justify-content: center
			flex-direction: column
			.input_block
				display: flex
				flex-direction: row
				align-items: center
				h3
					width: 13vw
					margin-left: 1vw
					margin-top: 1vh
					margin-bottom: 1vh
					font-size: 1em
				input
					border: 1px solid #E6E4E4
					height: 4vh
					width: 72%
					font-size: 2vh
				select
					border: 1px solid #E6E4E4
					height: 4vh
					width: 72%
					font-size: 2vh
				textarea
					border: 1px solid #E6E4E4
					height: 12vh
					width: 72%
					font-size: 2vh
</style>