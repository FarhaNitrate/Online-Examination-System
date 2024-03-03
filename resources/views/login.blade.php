<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">

    <style>
        html,
        body {
            height: 100%;
        }

        .global-container {
            height: 100%;
            background-color: #f5f5f5;
        }

        .logo{
            width:70px;
        }

        form {
            padding-top: 10px;
            font-size: 14px;
            margin-top: 30px;
        }

        .btn {
            font-size: 14px;
            margin-top: 20px;
        }


        .login-form {
            width: 330px;
            margin: 20px;
        }

        .sign-up {
            text-align: center;
            padding: 20px 0 0;
        }

        .alert {
            margin-bottom: -30px;
            font-size: 13px;
            margin-top: 20px;
        }
    </style>

</head>

<body>
    <div class="global-container p-5">
        <div class="card login-form m-auto">
            <div class="card-body">
                <div class="text-center">
                    <img class="logo" src="https://www.bracu.ac.bd/sites/default/files/resources/media/bracu_logo.png">
                </div>
                <h3 class="card-title text-center mt-3">LOGIN</h3>
                <div class="card-text">                    
                    @if ($errors->any())
                    <div>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $errors->first() }}</div>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control form-control-sm" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <!-- <a href="#" style="float:right;font-size:12px;">Forgot password?</a> -->
                            <input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-info btn-block">Sign in</button>

                        <!-- <div class="sign-up">
                            Don't have an account? <a href="#">Create One</a>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>