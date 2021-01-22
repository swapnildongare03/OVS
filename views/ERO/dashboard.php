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
        }
        .sidebarList:hover{
            color: #b300b3;
            border:20px solid #b300b3;
            border-right: transparent;
            border-top: transparent;
            border-bottom: transparent;
            background-color: #ffe6ff;
            cursor:pointer;
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
                <div class="col-12 sidebarList sidebarActive">hi</div>
                <div class="col-12 sidebarList">hi</div>
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
                    <div class="row" >
                        <div class="col-12">hi</div>
                        <div class="col-12">hi</div>
                        <div class="col-12">hi</div>
                        <div class="col-12">hi</div>
                        
                    </div>
                </div>
                <!-- End Main Content -->
        </div>

    </div>
</div>

</body>
</html>

<?php 
    }else{
        header("location:/OVS/views/Login/eroLogin.php");
    }

?>