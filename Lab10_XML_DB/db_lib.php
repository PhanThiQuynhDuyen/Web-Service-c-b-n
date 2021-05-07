<?php
    $db_msg=null;
    function connect_db(){
        $host="localhost";
        $username="root";
        $pass = "";
        try {
            $db=new PDO("mysql:host=localhost;port=3306;dbname=sensors;",$username,$pass);
        } catch (PDOException $e) {
            $db=-1;
            $db_msg="Không kết nối được cơ sở du liệu ".$e->getMessage();
        }
        return $db;
    }
    
    function recordSensor($name, $value, $status){
        $db = connect_db();
        if($db){
            $sql = "INSERT  INTO sensorsinfo(SensorName, SensorValue, SensorStatus) VALUES (\"$name\", \"$value\", $status)";
            try{
                $r = $db->query($sql);
                //echo $sql;
            }catch(PDOException $e){
                echo "Loi trong qua trinh gi du lieu" . $e->getMessage();
            }
        }else {
            echo $db_msg;
        }
    }
?>
    
