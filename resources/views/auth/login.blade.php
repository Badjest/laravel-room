<head>

    <meta charset="utf-8" />

    <title>Личный кабинет</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{ URL::asset('libs/fancybox/jquery.fancybox.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('libs/bootstrap/bootstrap-grid-3.3.1.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/fonts.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
    <script type="text/javascript" src="{{ URL::asset('libs/ajax/jquery.min.js') }}"></script>
</head>
<body>
<div class="row">
    <div class="container">
        <div class="top_tx">
            <div class="col-md-6">Заказы и товары. <br>Личный кабинет</div>
        </div>
    </div>
</div>
@if (count($errors) > 0)
    <div>Ой, беда!</div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
@if(Session::has('message'))
    {!!Session::get('message')!!}
@endif
<div class="row">
    <div class="container">
        <div class="col-md-6">
            <div class="tabs_header">
                <div class="wrapper">
                    <div class="tabs">
                        <span class="tab">Вход</span>
                        <span class="tab">Регистрация</span>
                    </div>
                    <div class="tab_content">
                        <div class="tab_item">
                            <form method="post" action="login" class="form_begin">
                                <label>
                                    <span id="log">Логин: </span>
                                    <input type="text" name="name" required/>
                                </label>
                                <label>
                                    <span id="pass">Пароль:</span>
                                    <input type="password" name="password" required />
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                </label>
                                <button name="submit">
                                    Вход
                                </button>
                            </form>
                        </div>
                        <div class="tab_item">
                            <form action="register" method="post" class="form_begin">
                                <label>
                                    <span id="log">Логин: </span>
                                    <input type="text" name="name" required/>
                                </label>
                                <label>
                                    <span id="pass">Пароль:</span>
                                    <input type="password" name="password" required />
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                </label>
                                <button type="submit" name="reg">
                                    Регистрация
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>


    <script src="{{ URL::asset('libs/bootstrap-toolkit/bootstrap-toolkit.min.js') }}"></script>
    <script src="{{ URL::asset('js/first.js') }}"></script>

</body>
</html>
