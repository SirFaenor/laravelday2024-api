{{--
    Blade base per pagine di errore
--}}
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .logo {max-width: 200px;}

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 1.3rem;
                padding: 20px;
            }

            .title a {
                color: inherit;
                text-decoration: underline;
            }

            .title a:hover {
                opacity: 0.4;
            }
        </style>
        <script>
            window.addEventListener('popstate', (event) => {
                window.location.reload();
            });
        </script>
    </head>
    <body>
        <div data-barba="container" data-barba-namespace="error">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <img class="logo" src="{{asset("img/logo.svg")}}" title="Logo">
                <div class="title">
                    @yield('message')
                </div>
            </div>
        </div>
    </body>
</html>
