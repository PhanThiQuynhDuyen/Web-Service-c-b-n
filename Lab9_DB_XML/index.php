<?php
    include 'db.php';
    $result = mysqli_query($conn, 'SELECT * FROM sinhvien');
    $xml = new DOMDocument('1.0','UTF-8');
    $xml->formatOutput=true;
    $sinhvien = $xml->createElement("DS_SinhVien");
    $xml->appendChild($sinhvien);
    while($row=mysqli_fetch_array($result)){
        // echo "<pre>";
        // print_r($row);
        // echo "</pre>";
        $sv = $xml->createElement("SinhVien");
        $sinhvien->appendChild($sv);
        $mssv = $xml->createElement("MSSV", $row['MSSV']);
        $sv->appendChild($mssv);
        $tensv = $xml->createElement("HoTen", $row['HoTen']);
        $sv->appendChild($tensv);
        $namsinh=$xml->createElement("NamSinh",$row['NamSinh']);
        $sv->appendChild($namsinh);
        $diem = $xml->createElement("Diem");
        $sv->appendChild($diem);
        $diem1=$xml->createElement("DiemMon1",$row['DiemMon1']);
        $diem->appendChild($diem1);
        $diem2=$xml->createElement("DiemMon2",$row['DiemMon2']);
        $diem->appendChild($diem2);
        $diem3=$xml->createElement("DiemMon3",$row['DiemMon3']);
        $diem->appendChild($diem3);
    }
    echo "<xmp>".$xml->saveXML()."<xmp>";
    $xml->save("reports.xml");
    
?>