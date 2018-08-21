<?php
    class Reg{
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "sayt";
        private $tabname = "users";
        private $con;
        
        public function __construct() {
            $this->con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            $login = $_POST['login_reg'];
            $password = $_POST['password_reg'];
            $sql = "SELECT login FROM users";
            $user_logins = $this->con->query($sql);
            $chek = TRUE;
            While ($log = $user_logins->fetch_assoc()){
                if ($log['login'] == $login){
                    $chek = FALSE;
                }
            }
            if($chek){
                $sql = "INSERT INTO $this->tabname VALUES (null,'$login','$password')";
                $this->con->query($sql);
                echo "Reg true";
            }
            else{
                echo "занято нахуй!";
            }
            $this->con->close();
        }
    }
    class Auth{
        
    }
    include_once 'header_auth.html';
    if (isset($_POST['login_reg']) && isset($_POST['password_reg'])){
        $reg = new Reg();
    }
    include_once 'footer.html';
    
