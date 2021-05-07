<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab05</title>

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

    <!-- Fonts -->
    <link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <!-- //Fonts -->
</head>

<body>
    <?php
    class SinhVien
    {
        public $hoten;
        public $lop;
        public $diem;
        public $email;
        public $password;

        //Hàm __construct(), cho phép người dùng khởi tạo các thuộc tính của một đối tượng khi tạo đối tượng.
        //Nếu tạo __construct() hàm, PHP tự động gọi hàm này khi tạo một đối tượng từ một lớp
        function __construct($hoten, $lop, $diem, $email, $password)
        {
            $this->hoten = $hoten;
            $this->lop = $lop;
            $this->diem = $diem;
            $this->email = $email;
            $this->password = $password;
        }
    }
    $svArr = array();
    $svArr[] = new SinhVien("Phan Thị Quỳnh Duyên", "CTK41", 7, "1710158@dlu.edu.vn", "123");
    $svArr[] = new SinhVien("Ngô Thị Hằng", "CTK41", 8.5, "1710166@dlu.edu.vn", "123");
    $svArr[] = new SinhVien("Nguyễn Văn A", "CTK40", 9.5, "nva@dlu.edu.vn", "123");

    function console_log($data)
    {
        echo '<script>';
        echo 'console.log(' . json_encode($data) . ')';
        echo '</script>';
    }



    ?>
    <h1></h1>
    <div class="wp-content">
        <h2>Đăng nhập</h2>
        <form action="#" method="post">
            <input type="email" name="email" placeholder="Email" require="">
            <input type="password" name="password" placeholder="Password" require="">
            <ul class="note_password">
                <li>
                    <input type="checkbox" id="brand1" value="">
                    <label for="brand1"><span></span>Remember me</label>
                    <a href="#">Forgot password?</a>
                </li>
            </ul>
            <div class="submit_ac">
                <input type="submit" value="LOGIN" name="Login">
            </div>
        </form>
        <br>
        <?php
        if (isset($_POST['Login'])) {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                if ($_POST['email'] !== "" && $_POST['password'] !== "") {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $svInfor = "";
                    foreach ($svArr as $sv) {
                        if ($sv->email === $email && $sv->password === $password) {
                            $svInfor = $sv;
                            break;
                        }
                        

                    }
                    console_log($svInfor);
                    if ($svInfor !== null) {
                        http_response_code(200);
                        $statusCode = http_response_code();
                        echo "<h3>Status code: $statusCode</h3>";
                        echo "
                        <div class='alert alert-success student-info'>
                            <h4>Tên sinh viên: $svInfor->hoten<br>Lớp: $svInfor->lop<br>Điểm: $svInfor->diem</h4>
                        </div>";
                    } else {
                        http_response_code(202);
                        $statusCode = http_response_code();
                        echo "<h3>Status code: $statusCode</h3>";
                        echo "<h4>Không có thông tin sinh viên</h4>";
                    }
                } else 
                {
                    http_response_code(400);
                    $statusCode = http_response_code();
                    echo "<h3>Status code: $statusCode</h3>";
                    echo "<h4>Vui lòng điền đầy đủ thông tin</h4>";
                }
            }
            
        }

        ?>
    </div>
</body>

</html>