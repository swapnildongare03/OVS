<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/images/logo.png">
    <title>OVS | Admin:login</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <script src="../../bootstrap/js/jquery.slim.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../bootstrap/js/popper.min.js"></script>
    <style>
        .login{
            padding:29px;
            background-color: white;
            border: 1px solid #e6e6e6;
            border-radius:10px;
            flex:block;
        }
    </style>
</head>
<body>


    <div class="container" style="margin-top: 110px;">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            </div>
        </div>
    </div>

    <div class="row m-2">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center" style="font-size:40px">
               <strong> Admin Login</strong>
            </div>
        </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="login">
                <div class="text-center">
                    <img class="img-fluid" src="../../assets/images/logo.png" width="90px" alt="">
                </div>
                <div>
                <form action="" method="POST">
                    <div class="form-group">
                    <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-success form-control" name="adminLogin">Login</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>

<?php
include_once('../../Models/Auth.php');
    if(isset($_POST['adminLogin']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $auth = new Auth();
        
        if(!empty($username) && !empty($password))
        {
            echo $auth->AuthAdmin($username,$password);
        }else{
            echo "empty";
        }
    }
?>