<head>

    @include('layouts.app')

</head>

    @include('common.errors')

    <body>
    <img src="loading.gif" id="imgLoad" style="display:none">

    <div class="top">
        <div class="row">
            <div class="container">
                <div class="col-md-6"></div>
                <div class="col-md-6">

                    <p>Привет,  {{ Auth::user()->name }} <br>
                    <a href='{{ URL::route('logout') }}'>Выход</a></p>
                </div>
            </div>
        </div>
    </div>

    <div id="order_dialog" style='display:none;'>
        <button class="addcont" id="new_good">Добавить товар</button>

        <table class="top_table">
            <tr>
                <th>Товар</th>
                <th>Цена</th>
                <th>Количество</th>
            </tr>
        </table>
        <div class="list_view_good">
            <table id="goods_table">

            </table>
        </div>

        <p id='itog'>Итого: 0</p>
        <div class="buttons">
            <button class="addcont" id="save_order">Сохранить</button>
            <button class="addcont" id="close_fan">Отмена</button>
        </div>

    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Мои заказы</h2><div class="right_but">

                            <button type="submit" href="#order_dialog" class="addcont new_order" > Новый заказ</button>

                    </div>

                    <table class="top_table">
                        <tr>
                            <th>Номер Заказа</th>
                            <th>Сумма</th>
                            <th>Опции</th>
                        </tr>
                    </table>

                    <div class="list_view">
                        <table>

                        </table>
                    </div>
                    <p id="sum_orders"></p>
                </div>
            </div>
        </div>
    </div>



@include('layouts.footer')