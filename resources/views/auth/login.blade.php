<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIOSIS - Login</title>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    @vite(['resources/sass/app.scss', 'public/sbadmin/css/fontawesome-free/css/all.min.css', 'public/sbadmin/css/sbadmin.min.css', 'public/sbadmin/datatables/dataTables.bootstrap4.min.css', 'resources/js/app.js', 'public/sbadmin/js/jquery.min.js', 'public/sbadmin/js/bootstrap-bundle.min.js', 'public/sbadmin/js/jquery-easing.min.js', 'public/sbadmin/js/sbadmin.min.js', 'public/sbadmin/datatables/jquery.dataTables.min.js', 'public/sbadmin/datatables/dataTables.bootstrap4.min.js', 'public/sweetalert2.js'])

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-8 col-md-8">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><b>LOGIN SIOSIS</b></h1>
                                    </div>
                                    <hr>
                                    <img src="{{ asset('img/4585.jpg') }}" alt="" style="max-width:100%;">
                                    <form class="user" action="{{ url('/admin/login') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control form-control-user @error('token') is-invalid @enderror"
                                                name="email" id="email" aria-describedby="emailHelp"
                                                placeholder="Enter email">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control form-control-user @error('token') is-invalid @enderror"
                                                name="password" id="password" aria-describedby="passwordHelp"
                                                placeholder="Enter password">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    @include('sweetalert::alert')
</body>

</html>
