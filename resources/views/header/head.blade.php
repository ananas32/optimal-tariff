<meta charset="UTF-8">
<!--Адаптивність-->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="_token" content="{!! csrf_token() !!}"/>

<title>@yield('meta_title')</title>
<meta name="description" content="@yield('meta_description')">
<meta name="keywords" content="@yield('meta_keywords')">
<link rel="canonical" href="{{ url(Request::path()) }}"/>

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

<!--Шрифт іконок-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

<!--Шрифт-->
<link href='https://fonts.googleapis.com/css?family=Cuprum:400,400italic,700,700italic&subset=latin,cyrillic'
      rel='stylesheet' type='text/css'>

<link rel="icon" href="{{ asset('assets/img/icons/favicon.ico') }}">

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

<!--Легкий скрипт щоб приховати/показати блок-->
<script type="text/javascript">
    function showHide(ID, IDbars) {
        if (document.getElementById(ID)) {
            var tmp = document.getElementById(ID);
            if (tmp.style.display != "block") {
                tmp.style.display = "block";
                document.getElementById(IDbars).className = 'fa fa-times';
            }
            else {
                tmp.style.display = "none";
                document.getElementById(IDbars).className = 'fa fa-bars';
            }
        }
    }
</script>

<!-- Scripts -->
<script src="//ulogin.ru/js/ulogin.js"></script>

<script>
    window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
</script>