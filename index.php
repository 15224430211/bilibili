<?php
$a = mysqli_connect("127.0.0.1", "root", "", "bilibili");
$categoris_html = "";
//var_dump($a);
$sql = "SELECT
categoris.`name`,
categoris.id,
categoris.visit_count,
categoris.daily_count
FROM
categoris";
$result = mysqli_fetch_all(mysqli_query($a, $sql), MYSQLI_ASSOC);
//echo (json_encode($result,JSON_UNESCAPED_UNICODE));
foreach ($result as $key => $value) {
//    echo $value["name"];
    $categoris_html .= '<li>
            <a href="#" style="text-align: center;"><span class="label label-info">' . $value["daily_count"] . '</span>
                <div>' . $value["name"] . '</div>
            </a>
        </li>';
}
//echo $categoris_html;
$title_html = "";
$sql = "SELECT
animation_detail.image_name,
animation_detail.fav_count,
animation_detail.coin_count,
animation_detail.click_count,
animation_detail.update_time,
animation_detail.`name`,
animation_detail.comment_count,
animation_detail.id
FROM
animation_detail
LIMIT 6";
$result = mysqli_fetch_all(mysqli_query($a, $sql), MYSQLI_ASSOC);
foreach ($result as $value) {

    $title_html .= '<div class="col-md-4">
                    <div style="margin-bottom: 10px;">
                        <a href="#" style="width: 185px;">
                            <img class="bili-item-img img-responsive img-rounded" src="images/cover/' . $value['image_name'] . '.png">

                            <div class="bili-item" style="background-color: black; opacity: 0.5;text-align: center;position:absolute;
                          bottom: 10px; top: 0;left: 15px;right: 15px;color: #FFF;display: none;">
                                <p style="margin-top: 10px">' . $value['name'] . '</p>

                                <p style="margin-top: 30px;text-align: left;margin-left: 10px">up主:坂田银时</p>

                                <p style="margin-top: 5px;text-align: left;margin-left: 10px">播放数:' . $value['click_count'] . '</p>
                            </div>
                        </a>
                    </div>
                </div>';
}
//echo $title_html;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>My bilibili</title>

    <!-- Bootstrap -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        h4 {
            margin-top: 19px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default" style="margin-bottom:0px;">
    <div class="container">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="#"><span class="glyphicon glyphicon-star"></span>&nbsp;主站</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;画友</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-equalizer"></span>&nbsp;游戏中心</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-expand"></span>&nbsp;直播</a></li>
                <li><a href="#">周边</a></li>
                <li><a href="#">移动端</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">登录</a></li>
                <li><a href="#">注册</a></li>
                <li><a href="#">投稿</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div style="height: 170px; background: transparent no-repeat center -10px;
   background-image:url(http://i0.hdslb.com/bfs/archive/4f59bf959d51592016e07efe62969c411288826a.png);
         ;">
    <div class="container" style="padding-top: 120px;">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <div class="row">
                    <div class="col-md-4">
                        <a class="btn btn-default btn-block" href="#" role="button">
                            <span class="glyphicon glyphicon glyphicon-stats"></span>&nbsp;排行榜
                        </a>
                    </div>
                    <div class="col-md-8" style="padding-left:0px;">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn"><button class="btn btn-default" type="button">Go!
                                </button></span>
                        </div><!-- /input-group -->
                    </div>
                </div>
            </div>
        </div><!-- /.col-lg-6 -->
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <ul class="nav nav-pills">
                <li role="presentation">
                    <a href="#" style="text-align: center;"> <span class="glyphicon glyphicon-home"></span>

                        <div>首页</div>
                    </a>
                </li>
                <?php
                echo $categoris_html;
                ?>
            </ul>
        </div>
        <div class="col-md-1">
            <a href="#">
                <h4><span class="glyphicon glyphicon-road"></span>&nbsp;广场
                </h4>

            </a>
        </div>
        <div class="col-md-1">
            <a href="#">
                <h4><span class="glyphicon glyphicon-facetime-video"></span>&nbsp;直播
                </h4>

            </a>
        </div>
        <div class="col-md-1">
            <a href="#">
                <h4><span class="glyphicon glyphicon-minus-sign"></span>黑屋
                </h4>

            </a>
        </div>
        <div class="col-md-1">
            <img src="//i2.hdslb.com/bfs/active/74952c377ad1a128b8f1c6da171366e826207848.gif" alt="催泪向">
        </div>
    </div>


    <div class="row">
        <div class="col-md-5">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="images/preview/gintama.png" class="carousel-inner img-responsive img-rounded">

                        <div class="carousel-caption">
                            ...
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/preview/naruto.png" class="carousel-inner img-responsive img-rounded">

                        <div class="carousel-caption">
                            ...
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/preview/Yu-Gi-Oh!.png" class="carousel-inner img-responsive img-rounded">

                        <div class="carousel-caption">
                            ...
                        </div>
                    </div>

                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-7">
            <div class="row">
                <?php
                echo $title_html;
                ?>
            </div>
        </div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    $(".bili-item-img").mouseover(function () {
//        ???
        $(this).siblings(".bili-item").css("display", "block");
    });
    $(".bili-item").mouseleave(function () {
        $(this).css("display", "none");
    });
</script>


<ul class="nav nav-pills nav-stacked">
    <li role="presentation" class="active"><a href="#">Home</a></li>
    <li role="presentation"><a href="#">Profile</a></li>
    <li role="presentation"><a href="#">Messages</a></li>
</ul>


</body>
</html>





