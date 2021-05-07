<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đọc RSS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <form action="" method="post">
            <input type="text" name="feedurl" id="" placeholder="Nhập feed url của website">
            <input type="submit" name="submit" value="Lấy tin">
        </form>
        <?php
            $url="https://vnexpress.net/rss/cuoi.rss";
            if (isset($_POST['submit'])) {
                if ($_POST['feedurl']!='') {
                    $url = $_POST['feedurl'];
                }
            }
            $flag = false;
            /*simplexml_load_file() để load tệp tin của chúng ta lên với 
            tham số truyền vào là đường dẫn đến tệp tin này
            */
            if (@simplexml_load_file($url)) {
                $feeds = simplexml_load_file($url);
            }
            else{
                $flag = true;
                echo "<h3>Invalid RSS feed URL</h3>";
            }
            // echo "<pre>";
            // print_r($feeds);
            // echo "</pre>";
            // die;
            $i=0;
            if (!empty($feeds)) {
                $site=$feeds->channel->title;
                echo "<h1>".$site."</h1>";
                foreach($feeds->channel->item as $item){
                    $title = $item->title;
                    $link = $item->link;
                    $description = $item->description;
                    $postDate = $item->pubDate;
                    $pubDate = date('D, d M Y', strtotime($postDate));
                    if ($i > 5) {
                        break;
                    }
                    ?>
                    <div class="post">
                        <div class="post-head">
                            <a  class="feed-title" href="<?php echo $link; ?>"><h2><?php echo $title; ?></h2></a>
                            <span><?php echo $pubDate; ?></span>
                        </div>
                        <div class="post-connten">
                            <?php
                                echo implode(" ", array_slice(explode(' ', $description),0,50));
                            ?>
                        </div>
                    </div>
                    <hr>
                    <?php 
                        $i++;
                }
            }else{
                if(!$invalidurl){
                echo "<h2>No item found.</h2>";
                }
            }
            ?>
        
        
    </div>
</body>
</html>