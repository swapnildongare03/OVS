<?php 
include_once('../../Models/Auth.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/images/logo.png">
    <title>OVS | ERO:login</title>
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
    <div class="row m-2">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center" style="font-size:40px">
               <strong> ERO Login</strong>
            </div>
        </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="login">
                <div class="text-center">
                    <img class="img-fluid" src="../../assets/images/4.jpg" width="140px" style="border-radius: 10px" alt="">
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
                        <button class="btn btn-primary form-control" name="eroLogin">Login</button>
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
    if(isset($_POST['eroLogin']))
    {
        $auth = new Auth();
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(!empty($username) && !empty($password))
        {
            $auth->AuthEro($username,$password);
        }else{
            echo "<script>alert('Please fill all fileds !')</script>";
        }
    }
?>