<template>
  <div class="main_wrapp">
    <div class="wrapper">
      <div class="top_footer">
        <div class="column_block">
          <h1>Компания</h1>
          <h3>Государственным организациям</h3>
          <h3>Корпоративным клиентам</h3>
          <h3>Дилерам</h3>
        </div>
        <div class="column_block">
          <h1>Покупателям</h1>
          <h3>Личный Кабинет</h3>
          <h3>Оплата</h3>
          <h3>Доставка</h3>
        </div>
        <div class="column_block">
          <h1>Помощь</h1>
          <h3>Как оформить заказ</h3>
          <h3>Возврат товара</h3>
          <h3>Сервис центры</h3>
        </div>
        <div class="column_block" style="width:14%;">
          <h1>Контакты</h1>
          <h3><img src="/assets/phone.svg"><span>+ 7 (727) 777 77 77 </span></h3>
          <h3><img src="/assets/watsapp.svg"><span>+ 7 777 777 77 77</span></h3>
          <h3><img src="/assets/mail.svg"><span>info@domen.kz</span></h3>
          <h3><img src="/assets/web.svg"><span>050013, Казахстан, г. Алматы, ул. Манаса, д. 34А</span></h3>
        </div>
      </div>
      <div class="bottom_footer">
        <h1>© 2022 IITU</h1>
        <h3>Политика конфиденциальности</h3>
        <h3>Публичная оферта</h3>
        <h3>Карта сайта</h3>
      </div>
    </div>
  </div>
</template>

<style lang="sass" scoped>
  .main_wrapp
    width: 100vw
    height: 285px
    display: flex
    align-items: center
    background-color: #333333
    justify-content: center
    .wrapper
      width: 1180px
      height: 100%
      color: #FFFFFF
      .top_footer
        width: 100%
        height: 83%
        display: flex
        flex-direction: row
        justify-content: space-between
        border-bottom: 1px solid #E6E4E4
        .column_block
          margin-top: 4vh
          h1
            font-size: 1.5em
          h3
            margin-top: 1vh
            font-size: 0.7em
            display: flex
            align-items: center
            span
              margin-left: 0.6vw
      .bottom_footer
        display: flex
        align-items: center
        height: 17%
        h1
          font-size: 0.9em
        h3
          font-size: 0.9em
          margin-left: 8vw

</style>