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
                      <div class="bili-item">
                        <a href="#">
                            <img class="bili-item-img img-responsive img-rounded" src="images/cover/' . $value['image_name'] . '.png">
                            <div class="bili-item-mask">
                                <p>' . $value['name'] . '</p>
                                <p>up主:坂田银时</p>
                                <p>播放数:' . $value['click_count'] . '</p>
                            </div>
                        </a>
                      </div>
                    </div>';
}
$bili_video_html = "";
$sql = "SELECT
animation_detail.id,
animation_detail.`name`,
animation_detail.click_count,
animation_detail.comment_count,
animation_detail.image_name,
animation_detail.length
FROM
animation_detail
LIMIT 8";

$result = mysqli_fetch_all(mysqli_query($a, $sql), MYSQLI_ASSOC);
foreach ($result as $value) {
    $bili_video_html .=
        "<div class='col-md-3' data-video-id='{$value["id"]}'>
                    <img class='bili-video-img' src='images/cover/" . $value['image_name'] . ".png'>
                    <div class='bili-video-background'>
                        <img src='#' style='width: 100%;'>
                    </div>
                    <div class='bili-video-mask'>
                     <div class='bili-video-progress'>
                     <div class='progress'>
                                <div class='progress-bar' role='progressbar'>
                                    <span class='sr-only'></span>
                                </div>
                            </div>
                     </div>
                     <div class='text-right'>  " . $value['length'] . "</div>
                    </div>
                    <div class='bili-video-title'><a href='#'>
                    <div> " . $value['name'] . "</div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div style='color: #aaa;'>
                                    <span class='glyphicon glyphicon-expand'></span>&nbsp;" . $value['click_count'] . "</div>
                                </div>
                                <div class='col-md-6'>
                                    <div style='color: #aaa;'>
                                        <span class='glyphicon glyphicon-comment'></span>&nbsp;" . $value['comment_count'] . "
</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>";

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
    <link href="images/icons/favicon.ico">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="assets/style.css"/>
    <style></style>

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

<div class="top-background">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <div class="row">
                    <div class="col-md-4">
                        <a class="btn btn-default btn-block" href="#" role="button">
                            <span class="glyphicon glyphicon glyphicon-stats"></span>&nbsp;排行榜
                        </a>
                    </div>
                    <div class="col-md-8">
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
                <h4><span class="glyphicon glyphicon-minus-sign"></span>黑屋</h4>
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

                        <div class="carousel-caption"></div>
                    </div>
                    <div class="item">
                        <img src="images/preview/naruto.png" class="carousel-inner img-responsive img-rounded">

                        <div class="carousel-caption"></div>
                    </div>
                    <div class="item">
                        <img src="images/preview/Yu-Gi-Oh!.png" class="carousel-inner img-responsive img-rounded">

                        <div class="carousel-caption"></div>
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

    <hr>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-1">
                    <img src="images/icons/MJ.png"/>
                </div>
                <div class="col-md-1" style="padding: 0px">
                    <a href="#">
                        <h4>动画</h4>
                    </a>
                </div>
                <div class="col-md-4">
                    <ul class="nav nav-tabs nav-justified">
                        <li role="presentation" class="active"><a href="#">有新动态</a></li>
                        <li role="presentation"><a href="#">最新投稿</a></li>
                    </ul>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-2" style="padding-right:0;">
                    <h5>
                        <button type="button" class="btn btn-default btn-block btn-xs">
                            <span class="glyphicon glyphicon-refresh"></span>&nbsp;111新动态
                        </button>
                    </h5>
                </div>
                <div class="col-md-2">
                    <h5>
                        <a class="btn btn-default btn-block btn-xs" href="#" role="button">
                            更多&nbsp;<span class="glyphicon glyphicon-chevron-right"></span> </a>
                    </h5>
                </div>


            </div>
            <div class="row">
                <?php
                echo $bili_video_html;
                ?>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-md-3">
                    <h3 style="margin-top: 10px">排行</h3>
                </div>
                <div class="col-md-3 col-md-offset-6">
                    <div class="dropdown" style="margin-top: 5px;">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                data-toggle="dropdown">
                            三日
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" style="min-width: 0;">
                            <li><a href="#">一周</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="media bili-ranking-media" style="margin-bottom: 15px;">
                        <div class="media-left">
                            <span class="label label-primary" style="display:inline-block;">1</span>
                        </div>
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="images/cover/Ace.png" style="height: 50px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <p class="media-heading">暗杀教室</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="media" style="margin-bottom: 15px;">
                        <div class="media-left">
                            <span class="label label-primary" style="display:inline-block;">1</span>
                        </div>
                        <div class="media-body">
                            <a href="#">
                                <div style="height: 20px;overflow: hidden;">
                                    暗杀教室暗杀教室暗杀教室暗杀教室暗杀教室暗杀教室暗杀教室暗杀教
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="media" style="margin-bottom: 15px;">
                        <div class="media-left">
                            <span class="label label-primary" style="display:inline-block;">1</span>
                        </div>
                        <div class="media-body">
                            <div style="height: 20px;overflow: hidden;">
                                暗杀教室暗杀教室暗杀教室暗杀教室暗杀教室暗杀教室暗杀教室暗杀教
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="media" style="margin-bottom: 15px;">
                        <div class="media-left">
                            <span class="label label-primary" style="display:inline-block;">1</span>
                        </div>
                        <div class="media-body">
                            <div style="height: 20px;overflow: hidden;">
                                暗杀教室暗杀教室暗杀教室暗杀教室暗杀教室暗杀教室暗杀教室暗杀教
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="media" style="margin-bottom: 15px;">
                        <div class="media-left">
                            <span class="label label-primary" style="display:inline-block;">1</span>
                        </div>
                        <div class="media-body">
                            <div style="height: 20px;overflow: hidden;">
                                暗杀教室暗杀教室暗杀教室暗杀教室暗杀教室暗杀教室暗杀教室暗杀教
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="media" style="margin-bottom: 15px;">
                        <div class="media-left">
                            <span class="label label-primary" style="display:inline-block;">1</span>
                        </div>
                        <div class="media-body">
                            <div style="height: 20px;overflow: hidden;">
                                暗杀教室暗杀教室暗杀教室暗杀教室暗杀教室暗杀教室暗杀教室暗杀教
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="media" style="margin-bottom: 15px;">
                        <div class="media-left">
                            <span class="label label-primary" style="display:inline-block;">1</span>
                        </div>
                        <div class="media-body">
                            <div style="height: 20px;overflow: hidden;">
                                暗杀教室暗杀教室暗杀教室暗杀教室暗杀教室暗杀教室暗杀教室暗杀教
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-offset-2 col-md-8">
                    <a class="btn btn-xs btn-block btn-default" href="#" role="button">查看更多</a>
                </div>
            </div>
        </div>

    </div>
    <hr style="margin-top: 10px;">


</div>
<div class="container bili-ranking-panel" style="display: none;position:absolute;">
    <div class="row">
        <div class="col-md-4">
            <div class="alert alert-warning" role="alert">
                <div class="row">
                    <div class="col-md-12">暗杀教室</div>
                </div>
                <hr style="margin-top: 10px;">
                <div class="row">
                    <div class="col-md-5">
                        <img src="images/cover/Ace.png" style="width: 100%;">
                    </div>
                    <div class="col-md-7">
                        <p style="height: 63px;overflow: hidden;">
                            震惊！龙女仆里配音过的角色最多的声优，小野大辅只排第二，第一竟然是TA！
                            开玩笑开玩笑。平时经常会搜罗一下自己喜欢的角色的cv的履历，
                            然后不停的惊讶于一个声优竟然可以配音这么多风格迥异的角色，甚至声音听起来完全不一样！
                        </p>
                    </div>
                </div>
                <hr style="margin-bottom: 10px;">
                <div class="row">
                    <div class="col-md-3"><span class="glyphicon glyphicon-expand"></span>&nbsp;1111</div>
                    <div class="col-md-3"><span class="glyphicon glyphicon-comment"></span>&nbsp;1111</div>
                    <div class="col-md-3"><span class="glyphicon glyphicon-heart-empty"></span>&nbsp;1111</div>
                    <div class="col-md-3"><span class="glyphicon glyphicon-star"></span>&nbsp;2222</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="assets/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/bootstrap.min.js"></script>

<script>
    $(".bili-item-img").mouseover(function () {
//        ???

        $(this).siblings(".bili-item-mask").css("display", "block");
    });
    $(".bili-item-mask").mouseleave(function () {
        $(this).css("display", "none");
    });


    $(".bili-video-mask").mousemove(function (e) {
//     enter_position_left
//        元素_position
        var ratio = Math.round((e.pageX - $(this).offset().left ) / $(this).innerWidth() * 10000) / 100;
        var background_index = parseInt(ratio / 10);
        var video_id = $(this).parents().data("video-id");
//        alert(video_id);
        $(this).find(".progress-bar").width(ratio + "%");
        $(this).siblings(".bili-video-background").find("img").prop("src", "images/videoshot/" + video_id + "/" + background_index + ".png");

//        alert(background_index);
    });

    $(".bili-video-img").mouseover(function () {
        $(this).siblings(".bili-video-mask,.bili-video-background").css("display", "block");
    });
    $(".bili-video-mask").mouseleave(function () {
        $(this).css("display", "none");
        $(this).siblings(".bili-video-background").css("display", "none");
    });

    $(".bili-ranking-media").mouseover(function () {
        var left = $(this).parents().offset().left;
        var top = $(this).offset().top;
        $(".bili-ranking-panel").css("display", "block");
        $(".bili-ranking-panel").offset(
            {
                top: top, left: left
            }
        );

    })
</script>


</body>
</html>





