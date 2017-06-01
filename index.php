<?php
$a = mysqli_connect("127.0.0.1", "root", "", "bilibili");
$categoris_html = "";
$sql = "SELECT
categoris.`name`,
categoris.id,
categoris.visit_count,
categoris.daily_count
FROM
categoris";
$result_categoris = mysqli_fetch_all(mysqli_query($a, $sql), MYSQLI_ASSOC);
foreach ($result_categoris as $key => $value) {
    $categoris_html .= '<li>
            <a href="#" style="text-align: center;"><span class="label label-info">' . $value["daily_count"] . '</span>
                <div>' . $value["name"] . '</div>
            </a>
        </li>';
}


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


$bili_video_ranking_html = "";
foreach ($result_categoris as $categoris_key => $categoris_value) {
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
WHERE
animation_detail.categoris_id =" . $categoris_value['id'] . "
LIMIT 8";
    $result = mysqli_fetch_all(mysqli_query($a, $sql), MYSQLI_ASSOC);
    foreach ($result as $value) {
        $bili_video_html .=
            "<div class='col-md-3' data-video-id='{$value['id']}'>
                    <img class='bili-video-img' src='images/cover/" . $value['image_name'] . ".png'>
                    <div class='bili-video-background'>
                        <img src='#'>
                    </div>
                    <div class='bili-video-mask'>
                     <div class='bili-video-progress'>
                     <div class='progress'>
                                <div class='progress-bar' role='progressbar'>
                                    <span class='sr-only'></span>
                                </div>
                            </div>
                     </div>
                     <div class='text-right'>" . $value['length'] . "</div>
                    </div>
                    <div class='bili-video-title'><a href='#'>
                    <div>" . $value['name'] . "</div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div style='color: #aaa;'>
                                    <span class='glyphicon glyphicon-expand'></span>&nbsp;" . $value['click_count'] . "</div>
                                </div>
                                <div class='col-md-6'>
                                    <div style='color: #aaa;'>
                                        <span class='glyphicon glyphicon-comment'></span>&nbsp;" . $value['comment_count'] . "</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>";
    }
    $bili_video_html = "<div class='col-md-8'>
            <div class='row'>
                <div class='col-md-1'><img src='images/icons/" . $categoris_value['id'] . ".png'/></div>
                <div class='col-md-1' style='padding: 0px'><a href='#'><h4>" . $categoris_value['name'] . "</h4></a>
                </div>
                <div class='col-md-4'>
                    <ul class='nav nav-tabs nav-justified'>
                        <li role='presentation' class='active'><a href='#'>有新动态</a></li>
                        <li role='presentation'><a href='#'>最新投稿</a></li>
                    </ul>
                </div>
                <div class='col-md-2'></div>
                <div class='col-md-2' style='padding-right:0;'><h5>
                        <button type='button' class='btn btn-default btn-block btn-xs'>
                        <span class='glyphicon glyphicon-refresh'></span>&nbsp;111新动态</button></h5>
                </div>
                <div class='col-md-2'>
                    <h5>
                        <a class='btn btn-default btn-block btn-xs' href='#' role='button'>
                            更多&nbsp;<span class='glyphicon glyphicon-chevron-right'></span> </a>
                    </h5>
                </div>
            </div>
            <div class='row'>" . $bili_video_html
        . "</div>
        </div>";

    $bili_ranking_html = "";
    $sql = "SELECT
animation_detail.id,
animation_detail.`name`,
animation_detail.image_name
FROM
animation_detail
WHERE
animation_detail.categoris_id =" . $categoris_value['id'] . "
LIMIT 7";
    $result = mysqli_fetch_all(mysqli_query($a, $sql), MYSQLI_ASSOC);
    foreach ($result as $key => $value) {
        if ($key == 0) {
            $bili_ranking_html .= "
<div class='col-md-12' data-video-id='{$value["id"]}'>
                    <div class='media bili-ranking-media'>
                        <div class='media-left'><span class='label label-primary'>" . ($key + 1) . "</span>
                        </div>
                        <div class='media-left'>
                            <a href='#'>
                                <img class='media-object' src='images/cover/" . $value['image_name'] . ".png'>
                            </a>
                        </div>
                        <div class='media-body media-heading'>
                            <a href='#'>" . $value['name'] . "</a>
                        </div>
                    </div>
                    </div>";
        } else {
            $bili_ranking_html .= "
    <div class='col-md-12' data-video-id='{$value["id"]}'>
                    <div class='media bili-ranking-media'>
                        <div class='media-left'>
                            <span class='label label-primary'>" . ($key + 1) . "</span>
                        </div>
                        <div class='media-body'>
                            <a href='#'>
                                <div>
                                " . $value['name'] . "</div>
                            </a>
                        </div>
                    </div>
                </div>";
        }
    }
    $bili_ranking_html = "<div class='col-md-4'>
            <div class='row'>
                <div class='col-md-3'><h3 style='margin-top: 10px'>排行</h3>
                </div>
                <div class='col-md-3 col-md-offset-6'>
                    <div class='dropdown' style='margin-top: 5px;'>
                        <button class='btn btn-default dropdown-toggle' type='button' id='dropdownMenu1' data-toggle='dropdown'>
                                    三日 <span class='caret'></span>
                        </button>
                        <ul class='dropdown-menu' style='min-width: 0;'>
                            <li><a href='#'>一周</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class='row'>" . $bili_ranking_html . "
            <div class='col-md-offset-2 col-md-8'><a class='btn btn-xs btn-block btn-default' href='#' role='button'>查看更多</a>
            </div>

</div>
</div>";
    $bili_video_ranking_html .= "<hr><div class='row'>" . $bili_video_html . $bili_ranking_html . "</div>
";
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My bilibili</title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="//static.hdslb.com/images/favicon.ico">
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
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
        </div>
    </div>
    <div>

    </div>
</nav>


<div class="container bili-ranking-panel">
    <div class="row">
        <div class="col-md-4">
            <div class="alert alert-warning" role="alert">
                <div class="row">
                    <div class="col-md-12 bili-ranking-panel-name"><b></b></div>
                </div>
                <hr style="margin-top: 10px;">
                <div class="row">
                    <div class="col-md-5">
                        <img class="bili-ranking-panel-img" src="" alt="fuck">
                    </div>
                    <div class="col-md-7">
                        <p class="bili-ranking-panel-detail"></p>
                    </div>
                </div>
                <hr style="margin-bottom: 10px;">
                <div class="row">
                    <div class="col-md-3">
                        <span class="glyphicon glyphicon-expand"></span>&nbsp;<b class="bili-ranking-panel-click-count"></b>
                    </div>
                    <div class="col-md-3">
                        <span class="glyphicon glyphicon-comment"></span>&nbsp;<b class="bili-ranking-panel-comment-count"></b>
                    </div>
                    <div class="col-md-3">
                        <span class="glyphicon glyphicon-heart-empty"></span>&nbsp;<b class="bili-ranking-panel-fav-count"></b>
                    </div>
                    <div class="col-md-3">
                        <span class="glyphicon glyphicon-usd"></span>&nbsp;<b class="bili-ranking-panel-coin-count"></b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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
    <?php
    echo $bili_video_ranking_html;
    ?>
</div>


<div class="bili-footer" style="background-color: #CCCCFF;">
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div style="margin-bottom: 20px;">bili</div>
                <div class="row">
                    <div class="col-md-4">
                        <div><a href="#"><p>关于我们</p></a></div>
                        <div><a href="#"><p>友情链接</p></a></div>
                    </div>
                    <div class="col-md-4">
                        <div><a href="#"><p>哔哩周边</p></a></div>
                        <div><a href="#"><p>联系我们</p></a></div>
                    </div>
                    <div class="col-md-4">
                        <div><a href="#"><p>加入我们</p></a></div>
                        <div><a href="#"><p>官方认证</p></a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="border-left: solid 1px #e5e9ef;border-right:solid 1px #e5e9ef;">
                <div style="margin-bottom: 20px;">传送门</div>

                <div class="row">
                    <div class="col-md-4">
                        <div><a href="#"><p>帮助中心</p></a></div>
                        <div><a href="#"><p>侵权申诉</p></a></div>
                        <div><a href="#"><p>用户反馈</p></a></div>
                    </div>
                    <div class="col-md-4">
                        <div><a href="#"><p>高级弹幕</p></a></div>
                        <div><a href="#"><p>分院帽</p></a></div>
                        <div><a href="#"><p>壁纸站</p></a></div>
                    </div>
                    <div class="col-md-4">
                        <div><a href="#"><p>活动专题</p></a></div>
                        <div><a href="#"><p>活动中心</p></a></div>
                        <div><a href="#"><p>名人堂</p></a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-4">
                    <img src="images/icons/download.png">
                    <a href="#"><p>手机端下载</p></a>
                </div>
                <div class="col-md-4">
                    <img src="images/icons/weibo.png">
                    <a href="#"><p>新浪微博</p></a>
                </div>
                <div class="col-md-4">
                    <img src="images/icons/wechat.png">
                    <a href="#"><p>官方微信</p></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>Copyright © 2017 By Lemon</p>
            </div>
        </div>
    </div>

</div>


<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap.min.js"></script>

<script>
    var video_list;


    $(".bili-item-img").mouseover(function () {

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

        var video_id = $(this).parents().data("video-id");
        bili_ranking_panel(video_id);

        var left = $(this).parents().offset().left;
        var top = $(this).offset().top;
        $(".bili-ranking-panel").css("display", "block");
        $(".bili-ranking-panel").offset(
            {
                top: top - $(".bili-ranking-panel").height(), left: left
            }
        );

    });

    $(".bili-ranking-panel").mouseleave(function () {
        $(this).css("display", "none");
        $(this).siblings(".bili-ranking-media").css("display", "none");
    });


    $.post("video.php", function (data) {
        video_list = $.parseJSON(data);
    });


    function bili_ranking_panel(video_id) {
        $(".bili-ranking-panel-name").text(video_list[video_id]['name']);
        $(".bili-ranking-panel-img").prop("src", "images/cover/" + video_list[video_id]['image_name'] + ".png");
        $(".bili-ranking-panel-detail").text(video_list[video_id]['detail']);
        $(".bili-ranking-panel-click-count").text(video_list[video_id]['click_count']);
        $(".bili-ranking-panel-comment-count").text(video_list[video_id]['comment_count']);
        $(".bili-ranking-panel-fav-count").text(video_list[video_id]['fav_count']);
        $(".bili-ranking-panel-coin-count").text(video_list[video_id]['coin_count']);
    }
</script>


</body>
</html>





