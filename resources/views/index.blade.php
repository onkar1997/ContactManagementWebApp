<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CMS Web App</title>

        <link rel="icon" href="{{asset('img/logo.png')}}" type="image/icon type">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

        <style>
            a {
                padding: 10px;
            }

            #navbarNav a:hover {
                border-bottom: 2px solid #333;
            }

            body {
                style="height:100vh;"
            }
        </style>
    </head>
    <body class="antialiased">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container container-fluid">
                    <a class="navbar-brand text-primary" style="font-size:2em; font-weight:500;" href="/">CMS</a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-5">
                            @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500" style="text-decoration:none;">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-dark" style="text-decoration:none;">Login</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="text-dark" style="text-decoration:none;">Register</a>
                                    @endif
                                @endauth
                            </div>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
        <div class="container">
            <img src="{{asset('img/bgimage.jpg')}}" alt="background image" style="height:20vh; width:20vw; margin-left:38%; margin-top:15%; box-shadow:0px 0px 50px 2px #00d;">
        </div>
    </body>
</html>
