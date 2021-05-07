<?php
    class client{
        public function __construct()
        {
            $params=array('location'=>'http://localhost/Web-Service_co_ban/Lab12_SOAP/server.php',
            'uri'=>'urn://localhost/Web-Service_co_ban/Lab12_SOAP/server.php',
            'trace'=>'1');
            $this->instance = new SoapClient(NULL, $params);
            
        }
        public function getName($id_array){
            return $this->instance->__soapCall('getStudentName',$id_array);
        }
    }
    $client=new client;
?>