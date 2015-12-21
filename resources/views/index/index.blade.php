<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AutoRia Service</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">AutoRia Service Project </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li>
                    <a href="{{ url('about') }}">About</a>
                </li>
                <li>
                    <a href="{{ url('statistics') }}">Statistics</a>
                </li>
                <li>
                    <a href="contact.html"></a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('img/bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h2 style="position: relative; top: -140px;">Course project "AutoRia service"</h2>
                    <span class="subheading" style="position: relative; top: -130px;">Получение моделей авто и статистики с помошью API AutoRia</span>
                </div>
                <form method="post" action="model" role="form">
                    <div class="form-group col-xs-4" style="position: relative; left: -265px;top: -238px;">
                        <label for="type" style="color: #fff;">Марка автомобиля:</label>
                        <select id="type" name="transport" class="form-control">
                            @if(isset($name))
                                <option>{{$name}}</option>
                            @else
                                @foreach($typeTrans as $type)
                                    <option value="{{$type['value']}}">{{$type['name']}}</option>
                                @endforeach
                            @endif
                        </select>
                        <button class="btn btn-default" type="submit" style="margin-top: 10px;
                        position: absolute;left: 245px;top: 24px; padding: 5px 5px; border-radius: 5px;">Выбрать</button>

                    </div>
                    <input type="hidden" name="_token" id="_token" value="{!! csrf_token() !!}" />
                </form>

                <form method="post" action="cars" role="form">
                    <div class="form-group col-xs-4" style="position: relative; left: -265px;top: -238px;">
                        <label for="type" style="color: #fff;position: relative; top: 75px; right: 250px;">Модель автомобиля:</label>
                        <select id="type" name="model" class="form-control" style="position: absolute;top: 105px;right: 236px;">
                            @if(isset($models))
                            @foreach($models as $model)
                                <option value="{{$model['value']}}">{{$model['name']}}</option>
                            @endforeach
                            @endif
                        </select>
                        <button class="btn btn-default" type="submit" style="margin-top: 10px;position: absolute;left: 23px;top: 96px;
                        padding: 5px 5px; border-radius: 5px;">Выбрать</button>
                    </div>
                    <input type="hidden" name="_token" id="_token" value="{!! csrf_token() !!}" />
                </form>

            </div>

        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <div class="post-preview">
                @if(isset($data))
                  Найдено результатов: {{ $data->result_count }}
                @endif
            </div>
            <hr>
            @if(isset($imgArr))
                @foreach($imgArr as $img)
                        <img src="{{ $img }}" />
                @endforeach
            @endif
            <!-- Pager -->

        </div>
    </div>
</div>

<hr>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <ul class="list-inline text-center">
                    <li>
                        <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Lyovkin Anatoliy 2015</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
{{--<script src="js/clean-blog.min.js"></script>--}}

</body>

</html>