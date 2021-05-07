<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    $sv = array(
            '1710158@dlu.edu.vn',
            '1',
            'Phan Thị Quỳnh Duyên',
            'CTK41',
            '5.0'
        );
    // print_r($sv);
    // echo "</pre>";
    $email = $sv[0];
    $mk = $sv[1];
    ?>
    <div class="loginbox">
        <img src="images/icons8-male-user-96.png" alt="" class="avatar">
        <h1>Đăng nhập</h1>
        <form action="" method="post">
            <p>Email</p>
            <input type="text" name="email" id="" placeholder="Nhập email của bạn">
            <p>Mật khẩu</p>
            <input type="password" name="pass" id="" placeholder="Nhập mật khẩu của bạn">
            <input type="submit" value="Đăng nhập" name="LOGIN">
            
        </form>
        <?php
            $thongtin="";
            if (isset($_POST['LOGIN'])) {
                # code...
                if ($_POST['email']==$email && $_POST['pass']==$mk) {
                    # code...
                    $thongtin = "Xin chào ".$sv[2]." lớp ".$sv[3].". Điểm của bạn là: ".$sv[4];
                }
                else
                   $thongtin = "Thông tin đăng nhập sai";
            }
            echo '<div class="thongbao">
                    <p> '.$thongtin.'</p>
            </div>';
        ?>
    </div>
</body>
</html>