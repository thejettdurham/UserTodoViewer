<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <script src="/js/app.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
        }

        body {
            padding: 0 2em;
        }

        .userBlock {
            margin: 1em;
            padding: 1em;
            border: solid 1px;
            border-radius: 15px;
        }

        .todos {
            margin-top: 0.5em;
        }

        .userName {
            font-size: 16pt;
        }

        #dataAlert {
            display: none;
            position: fixed;
            bottom: 0;
            right: 20px;
        }

    </style>
</head>
<body>

<div>
    <h1 class="center-block">User Todos</h1>
    @foreach(\UserTodo\User::all() as $user)
        <div class="userBlock">
            <div class="userHeader">
                <strong class="userName">{{ $user->name }}</strong>
                ({{ $user->username }})
                <a href="mailto:{{$user->email}}"><span class="glyphicon glyphicon-envelope"></span></a>
                <a href="tel:{{ $user->phone }}"><span class="glyphicon glyphicon-earphone"></span></a>
                <a href="http://{{ $user->website }}"><span class="glyphicon glyphicon-globe"></span></a>
            </div>
            <div class="todos">
                @foreach($user->todos as $todo)
                    <div class="">
                        @if($todo->completed)
                            <span class="glyphicon glyphicon-check"></span> <s>{{ $todo->title }}</s>
                        @else
                            <span class="glyphicon glyphicon-unchecked"></span> <span>{{ $todo->title }}</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

<div id="dataAlert" class="alert alert-info">
    Alert Placeholder
</div>

<script type="text/javascript">
    Echo.channel('incoming-data')
        .listen('UserDataImported', (e) => {
            var alert = $("#dataAlert");
            alert[0].innerText = 'Got updated data for user ' + e.user.name;
            alert.show();
            setTimeout(() => {
                alert.hide();
            }, 5000);
        });

</script>

</body>
</html>
