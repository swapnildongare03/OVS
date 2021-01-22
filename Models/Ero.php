<?php 


class Ero{

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

        public function getAllVoterRecords(){
            try{
                $voterRecord = null;
                $query = "SELECT * FROM voter";
                if($sql = $this->conn->query($query))   
                {
                    while($row = mysqli_fetch_assoc($sql))
                    {
                        $voterRecord[] =$row; 
                    }
                }
                return $voterRecord;

                
            }catch(\Throwable $e){

            }
        }

        public function addVoter($name,$dob,$address,$gender,$area)
        {
            try {
                $bday = new DateTime($dob); 
                $today = new Datetime(date('y.m.d'));
                $diff = $today->diff($bday);
                $age = $diff->y;                
                $voterId = rand(10000,10000000000);
                if($age < 18)
                {
                    return "age is not 18 !";
                }
                $query = "INSERT INTO `voter` (`id`, `voter_id`, `voter_name`, `age`, `dob`, `address`, `gender`, `area`, `ero_id`) VALUES (NULL, '$voterId', '$name', '$age', '$dob', '$address', '$gender', '$area', '1');";
                if($res = $this->conn->query($query))
                {

                    echo "<script>alert('successfulyy registered Voter !')</script>"; 
                    header("location:/OVS/views/ERO/voterlist.php");
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        
}