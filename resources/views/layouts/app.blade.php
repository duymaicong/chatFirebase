<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->


    <style>
        body {
            font-family: 'Nunito';
        }

        #chat2 .form-control {
            border-color: transparent;
        }

        #chat2 .form-control:focus {
            border-color: transparent;
            box-shadow: inset 0px 0px 0px 1px transparent;
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta11/dist/js/tabler.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta11/dist/css/tabler.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta11/dist/css/tabler-flags.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta11/dist/css/tabler-payments.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta11/dist/css/tabler-vendors.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    @livewireStyles
</head>

<body>

    @yield('content')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>
    <script src=" https://www.gstatic.com/firebasejs/8.3.1/firebase-auth.js ">
    </script>
    <script src=" https://www.gstatic.com/firebasejs/8.3.1/firebase-database.js "> </script>
    <script src=" https://www.gstatic.com/firebasejs/8.3.1/firebase-firestore.js "> </script>
    <script src=" https://www.gstatic.com/firebasejs/8.3.1/firebase-storage.js "> </script>
    <script src=" https://www.gstatic.com/firebasejs/8.3.1/firebase-functions.js "> </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">


    <script>
        // var postElement;
        if (!firebase.apps.length) {
            var app = firebase.initializeApp({
                apiKey: "AIzaSyD1kQ9BIGa8zwtrefOHBdT1peLbDXuTzWQ",
                authDomain: "realtime-53ded.firebaseapp.com",
                databaseURL: "https://realtime-53ded-default-rtdb.firebaseio.com",
                projectId: "realtime-53ded",
                storageBucket: "realtime-53ded.appspot.com",
                messagingSenderId: "444165769388",
                appId: "1:444165769388:web:1448479fe19b11609db709",
                measurementId: "G-KGT12N75YZ",
            });
        }
    </script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>

    <script>
        window.addEventListener('alert', event => {
            var type = event.detail.type;
            if (event.detail.type == 'danger') {
                type = 'error';
            }
            toastr[type](event.detail.message, event.detail.title ?? ''), toastr.options = {
                "closeButton": true,
                "progressBar": false
            }
        });
    </script>

    @stack('script')
    @livewireScripts
</body>

</html>