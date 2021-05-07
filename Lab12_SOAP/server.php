<?php
    // phpinfo();
    class server{
        private $con;
        public function __construct(){
            //Hàm is_null() sẽ kiểm tra giá trị của biến có rỗng không, 
            //nếu biến rỗng hàm trả về TRUE, ngược lại nếu biến khác rỗng hàm trả về FALSE.
            $this->con=(is_null($this->con))? self::connect():$this->con;
 

        }
        static function connect(){
            $con=mysqli_connect("localhost","root","","soap");
            return $con;
        }
        public function getStudentName($id_array){
            $id=$id_array['id'];
            $sql="SELECT * FROM students WHERE id = '$id'";
            $qry=mysqli_query($this->con,$sql);
            $res=mysqli_fetch_array($qry);
            return $res['name'];
            //return "Phan Thị Quỳnh Duyên";
        }

    }
    $params = array('uri' => 'Web-Service_co_ban/Lab12_SOAP/server.php');
    $server = new SoapServer(NULL, $params);
    $server->setClass("server");
    $server->handle();
?>