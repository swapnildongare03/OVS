<?php
include_once('DB.php');

class Auth{
    
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname ="ovs";
    private $conn = null;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname);

        } catch (Exception $th) {
            echo "Connection failed :". $th->getMessage;
        }
    }

    public function AuthAdmin($user,$pass){
        $query = "SELECT * FROM admin WHERE username = '$user' AND password = '$pass'";

        $result = $this->conn->query($query);
        $userData =null;

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                session_start();
                $userData[]=$row;
                $_SESSION['userAdmin'] = $userData;
                header("location:/OVS/views/Admin/dashboard.php");

            }
        }else{
            return "Please check Credentials";
        }

    }

    public function AuthEro($user,$pass)
    {
        
        // echo "<script>alert('working $user and $pass !')</script>";
        try {
            $query = "SELECT * FROM ero WHERE username = '$user' AND password = '$pass'";

            $result = $this->conn->query($query);
            $eroData = null;

            if($result->num_rows > 0)
            {

                session_start();
                while($row = $result->fetch_assoc())
                {
                    $eroData = $row;
                    $_SESSION['userEro'] = $eroData;
                    header("location:/OVS/views/ERO/dashboard.php");
                }
            }else{
                echo "Please Check Credentials !";
            }

        } catch (Exception $e) {
            return "Failed :". $e->getMessage();
        }

    }
    public function authVoter($voterId,$password)
    {
        try {
            $query = "SELECT * FROM voter WHERE voter_id = '$voterId' AND dob = '$password'";
            $result = $this->conn->query($query);
            $voterData = null;
            if($result->num_rows > 0)
            {
                session_start();
                while($row = $result->fetch_assoc())
                {
                    $voterData = $row;
                    $_SESSION['userVoter'] = $voterData;
                    header("location:/OVS/views/Voter/profile.php");
                }
            }else{
                return "Please Check Credentials !";
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function test(){
        return "test";
    }

}

?>