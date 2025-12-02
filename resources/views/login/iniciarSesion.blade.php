<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
<link href="{{ asset('plantilla/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">



        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- IMPORTANDO JQUERY VALIDATE-->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Google Fonts (se deja igual porque es externo) -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,
300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ asset('plantilla/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">


</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido!!</h1>
                                    </div>
                                    <form class="user" method="post" action="{{ route('users.login') }}" id="frm_login">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                placeholder="Ingrese su email..." >
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                placeholder="Contraseña" >
                                        </div>
                                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <script>
 
    $("#frm_login").validate({
        rules:{
            email:{
                required: true,
            
            },
            password:{
                required: true,
            },

        },
        messages:{

              email:{
                required: "Campo obligatorio",
            
            },
            password:{
                required: "Campo obligatorio",
            },

        },
    });
</script>

<style>

    .error {
        color: red;
        font-family: 'Montserrat';
        font-size: 14px;
    }

    .form-control.error {
        border: 1px solid red;
    }
</style>
 <!-- Bootstrap core JavaScript-->
<script src="{{ asset('plantilla/admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plantilla/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('plantilla/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('plantilla/admin/js/sb-admin-2.min.js') }}"></script>






</body>

</html>