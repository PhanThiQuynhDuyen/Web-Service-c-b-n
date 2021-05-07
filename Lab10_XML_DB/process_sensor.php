<?php
    include_once("db_lib.php");
    $xml = simplexml_load_file('data.xml');
    if ($xml) {
        
        foreach ($xml->Monitor->sensorList->sensor as $sensor) {
            echo "<p>".$sensor->name;
            echo ",".$sensor->value;
            echo ",".$sensor->status."</p>";
            recordSensor($sensor->name, $sensor->value, $sensor->status);
        }
        echo "--------------------------------------";
       
        print_r($xml);
    }
?>