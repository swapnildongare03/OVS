<?php 
    session_start();
    include_once '../../Models/Ero.php';
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
                    <a href="/OVS/views/ERO/addvoter.php">Voter</a>
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
                    <div class="row mt-4" >
                    <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header">
                                    <div style="float:right">
                                    <a href="/OVS/views/ERO/addvoter.php" class="btn btn-outline-success">add new Voter</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">Sr. No</th>
                                        <th scope="col">Voter Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                        <?php
                                            $count =1;
                                            $voter = new Ero();
                                            $row = $voter->getAllVoterRecords();
                                        ?>
                                    <tbody>
                                        <?
                                            if(!empty($row))
                                            {
                                            foreach($row as $voter)
                                            {

                                            
                                        ?>
                                        <tr>
                                        <th scope="row"><?php echo $count;?></th>
                                        <td><?php echo $voter['voter_id'];?></td>
                                        <td><?php echo $voter['voter_name'];?></td>
                                        <td>
                                              <!-- Large modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo 'xyz'.$voter['id'].'abs' ?>">Details</button>

                                                <div class="modal fade bd-example-modal-lg" id="<?php echo 'xyz'.$voter['id'].'abs' ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h3><strong>voter details</strong></h3>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="container-fluid  text-center">
                                                                <div class="row">
                                                                    <div class="col-6"><strong>Voter Id :</strong></div>
                                                                        <div class="col-6"><?php echo $voter['voter_id'];?></div>
                                                                    </div>
                                                                <div class="row">
                                                                    <div class="col-6"><strong>Voter Name :</strong></div>
                                                                    <div class="col-6"><?php echo $voter['voter_name'];?></div>
                                                                </div>
                                                                <div class="row">
                                                                <div class="col-6"><strong>Age  :</strong></div>
                                                                    <div class="col-6"><?php echo $voter['age'];?></div>
                                                                </div>
                                                                <div class="row">
                                                                <div class="col-6"><strong>Date of Birth :</strong></div>
                                                                    <div class="col-6"><?php echo $voter['dob'];?></div>
                                                                </div>
                                                                <div class="row">
                                                                <div class="col-6"><strong>Address :</strong></div>
                                                                    <div class="co-6"><?php echo $voter['address'];?></div>
                                                                </div>
                                                                <div class="row">
                                                                <div class="col-6"><strong>Gender :</strong></div>
                                                                    <div class="col-6"><?php echo $voter['gender'];?></div>
                                                                </div>
                                                                <div class="row">
                                                                <div class="col-6"><strong>Area :</strong></div>
                                                                    <div class="col-6"><?php echo $voter['area'];?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                        </td>
                                        </tr>

                                            <?php
                                            $count++;
                                        }
                                    }else{
                                        echo('
                                        <tr>
                                        <th scope="row"></th>
                                        <td>no data found</td>
                                        <td></td>
                                        <td></td>
                                        </tr>
                                        ');
                                    }
                                            
                                            ?>
                                        
                                    </tbody>
                                </table>

                                </div>
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
    }else{
        header("location:/OVS/views/Login/eroLogin.php");
    }

?>