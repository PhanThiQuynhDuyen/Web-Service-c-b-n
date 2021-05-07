<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Reader</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $url_dulich="https://vnexpress.net/rss/du-lich.rss";
        $url_cuoi="https://vnexpress.net/rss/cuoi.rss";
        $dulich = simplexml_load_file($url_dulich);
        $cuoi=simplexml_load_file($url_cuoi);
        // echo "<pre>";
        //     print_r($dulich);
        //     echo "</pre>";
        //     die;
    ?>
    <div class="main">
        <h1>Nội dung nổi bật</h1>
        <div class="post">
            <?php
                $i=1;
                // $stt=1;
                $site = $dulich->channel->title;
                echo "<h2>$site</h2>
                <hr>";
                foreach ($dulich->channel->item as $item) {
                    # code...
                    $title = $item->title;
                    $description = $item->description;
                    $link = $item->link;
                    $pubDate = $item->pubDate;
                    $day = date('D, d M Y', strtotime($pubDate));
                    if ($i>6) {
                        # code...
                        break;
                    }
                    $i++;
                    
            ?>
            <div class="ps-head">
                <span><img src="images/icons8-new-26.png" alt=""></span>
                <a href="<?php echo $link;?>"><h3><?php echo $title;?></h3></a>
                <span><?php echo $day;?></span>
            </div>
            <div class="ps-content">
                <!-- <?php 
                    $arr = explode('</br>', $description);
                    $hinh = $arr[0];
                    // $mota = $arr[1];
                    $mota = substr($arr[1],0,100);
                    echo "<h4>".$mota."[...]</h4>";
                    
                ?> -->
            </div>
            <?php } ?>
        </div>
        <div class="post" style="margin-left: 6%;">
            <?php
                    $i=1;
                    $site = $cuoi->channel->title;
                    echo "<h2>$site</h2>
                    <hr>";
                    foreach ($cuoi->channel->item as $item) {
                        # code...
                        $title = $item->title;
                        $description = $item->description;
                        $link = $item->link;
                        $pubDate = $item->pubDate;
                        $day = date('D, d M Y', strtotime($pubDate));
                        if ($i>6) {
                            # code...
                            break;
                        }
                        $i++;
                    
                ?>
            <div class="ps-head">
                <span><img src="images/icons8-new-26.png" alt=""></span>
                <a href="<?php echo $link;?>"><h3><?php echo $title;?></h3></a>
                <span><?php echo $day;?></span>
            </div>
            <div class="ps-content">
                <!-- <?php echo $description;?> -->
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>