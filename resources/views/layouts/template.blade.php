<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">
    <title>@yield('title')</title>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-3.4.0.min.js')}}"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="text-center">
                <p>Selamat Datang, Admin!</p>
            </div>
            <a href="/logout" class="btn btn-danger">Logout</a>
        </div>
        </div>
    </nav>
    <div class="container">
        <!-- Content -->
        @yield('content')

        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright &copf; myShoppingList</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

</body>

</html>