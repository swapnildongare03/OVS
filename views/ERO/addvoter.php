<?php 
    session_start();
    if(isset($_SESSION['userEro']))
    {
    $ero = $_SESSION['userEro'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/images/logo.png">
    <title>OVS | ERO:Dashboard</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <script src="../../bootstrap/js/jquery.slim.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../bootstrap/js/popper.min.js"></script>
    <style>
        .mainSidebar{
            padding:0px;
            margin:0px;
            border-right: 2px solid #e0e0e0;
            height:666px;
            overflow-x:hidden;
        }


        .mainSidebar::-webkit-scrollbar 
        {
            display: none;
        }

        .mainContent{
            padding:0px;
            margin:0px;
            padding-left:10px;
            border-right: 2px solid #e0e0e0;
            height:598px;
            overflow-x:hidden;

        }


        .mainContent::-webkit-scrollbar 
        {
            display: none;
        }

        .sidebarList{
            margin:0px;
            padding:15px;
            border:0.5px solid #c0c0c0;
            width:100%;
            text-decoration :none;

        }
        .sidebarList:hover{
            color: #b300b3;
            border:20px solid #b300b3;
            border-right: transparent;
            border-top: transparent;
            border-bottom: transparent;
            background-color: #ffe6ff;
            cursor:pointer;
            text-decoration :none;
        }
        .sidebarActive{
            color: #b300b3;
            border:20px solid #b300b3;
            border-right: transparent;
            border-top: transparent;
            border-bottom: transparent;
            background-color: #ffe6ff;

        }
    </style>
    
</head>
<body>



<!-- dashboard -->
<div class="container-fluid">
    <div class="row" >
    <!-- sidebar -->
        <div class="col-md-3 text-center mainSidebar">
            <div class="row">
                <nav class="navbar bg-warning sticky-top col-12" style="padding:10px;widht:100%"> 
                 <img src="../../assets/images/4.jpg" width="50" height="50" class="d-inline-block align-top ml-5" style="border:2px solid white;border-radius:10px;" alt="" loading="lazy">
                    <a class="navbar-brand ml-2 text-white" href="/OVS">Dashboard</a>
                    <button class="navbar-toggler" disabled type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
                <div class="col-12 sidebarList">
                    <a href="/OVS/views/ERO/dashboard.php">Home</a>
                </div>
                <div class="col-12 sidebarList sidebarActive">
                    <a href="/OVS/views/ERO/voterlist.php">Voter</a>
                </div>
                <div class="col-12 sidebarList">hi</div>
                <div class="col-12 sidebarList">hi</div>
            </div>        
        </div>
    <!-- sidebar end -->
    <!--  -->
    <div class="col-md-9" style="padding:0px;margin:0px">

                <!-- Start Navigation -->
                <nav class="navbar navbar-expand-lg navbar-light bg-warning col-12" style="padding:16px;">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    Welcome &nbsp;
                    <strong>
                    <?php 
                        // var_dump($_SESSION['userEro']);                 
                       echo $ero['username'];
                    ?> </strong>                   
                    </ul>
                    <div style="float:right">
                    <a href="../../Models/Logout.php?logout" class="btn btn-outline-info">Logout</a>

                    </div>
                </div>
                </nav>

                <!-- End Navigation -->
                
                <!-- Main Content -->
                <div class="container-fluid mainContent" style="background-color: #f2f2f2;">
                    <div class="row mt-5 mb-5" >
                        <div class="col-md-2"></div>
                        <div class="col-md-6 card">
                            <div class="card-header text-center">
                                <h3>Add voter</h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                <div class="form-group">
                                    <label for=""> Voter Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter voter name">
                                </div>
                                <div class="form-group">
                                    <label for=""> Voter DOB</label>
                                    <input type="date" class="form-control" name="dob">
                                </div>
                                <div class="form-group">
                                    <label for=""> Voter address</label>
                                    <textarea name="address" id="" rows="5" class="form-control" style="resize:none"></textarea>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select" name="gender">
                                    <option selected value="null">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Area PIN Code" name="area">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="form-control btn btn-info" name="addVoter">Add</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main Content -->
        </div>

    </div>
</div>

</body>
</html>

<?php 
    if(isset($_POST['addVoter']))
    {
        include_once '../../Models/Ero.php';
        $ero = new Ero();
        if(!empty($_POST['name']) && !empty($_POST['dob']) && !empty($_POST['address']) && !empty($_POST['gender']) && !empty($_POST['area']))
        {
          $res =  $ero->addVoter($_POST['name'],$_POST['dob'],$_POST['address'],$_POST['gender'],$_POST['area']);

        }
    }
?>

<?php 
    }else{
        header("location:/OVS/views/Login/eroLogin.php");
    }

?>