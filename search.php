<?php
if (!isset($_GET['keyword'])) {
    $_GET['keyword'] = "";
}

if (isset($_GET['order'])&&$_GET['order']=="click_count") {
    $_GET['order'] = " animation_detail." . $_GET['order'];

}elseif(isset($_GET['order'])&&$_GET['order']=="fav_count"){
    $_GET['order'] = " animation_detail." . $_GET['order'];
}
elseif(isset($_GET['order'])&&$_GET['order']=="update_time"){
    $_GET['order'] = " animation_detail." . $_GET['order'];
}
else {
    $_GET['order'] = " (animation_detail.click_count*0.01 +
    animation_detail.comment_count*0.099 + animation_detail.fav_count*0.6 +
    animation_detail.coin_count*0.099) ";
}


$a = mysqli_connect("127.0.0.1", "root", "", "bilibili");
$search_html = "";
$sql = 'SELECT
animation_detail.*,
categoris.id,
categoris.`name` AS fuck
FROM
animation_detail ,
categoris
WHERE
categoris.id=animation_detail.categoris_id AND
animation_detail.`name` LIKE "%' . $_GET['keyword'] . '%"
ORDER BY
' . $_GET['order'] . ' DESC
LIMIT 8';
$result = mysqli_fetch_all(mysqli_query($a, $sql), MYSQLI_ASSOC);
foreach ($result as $key => $value) {
    $search_html .= '
<div class="col-md-12">
<hr>
            <div class="row">
                <div class="col-md-3 bili-search-detail-img">
                    <img src="images/cover/' . $value['image_name'] . '.png" >
                    <div>' . $value['length'] . '</div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 bili-search-detail-name">
                            <h4 style="">
                                <span class="label label-primary">1</span>&nbsp;<a href="#">' . $value['name'] . '</a>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p style="overflow: hidden;height: 80px;">' . $value['detail'] . '</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                        <span class="glyphicon glyphicon-play"></span>&nbsp;' . $value['click_count'] . '
                        </div>
                        <div class="col-md-2">
                        <span class="glyphicon glyphicon-comment"></span>&nbsp;' . $value['comment_count'] . '
                        </div>
                        <div class="col-md-2">
                        <span class="glyphicon glyphicon-time"></span>&nbsp;' . substr($value['update_time'], 2, 9) . '
                        </div>
                        <div class="col-md-2">up主:&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>';
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
</nav>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-2 col-md-offset-2">
            <a href="#">
                <img src="images/icons/search.png" style="width: 100%;">
            </a>
        </div>
        <div class="col-lg-5">
            <div class="input-group input-group-lg">
                <input id="bili-search-input" type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
          <button id="bili-search-submit" class="btn btn-info" type="button"><span class="glyphicon glyphicon-search"></span>&nbsp;Search
          </button>
      </span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs nav-justified bili-search-search-bar">
                <li role="presentation"><a href="#">游戏</a></li>
                <li role="presentation"><a href="#">音乐</a></li>
                <li role="presentation"><a href="#">影视</a></li>
                <li role="presentation"><a href="#">动画</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="bili-search-filter">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills bili-search-filter-order">
                            <li role="presentation" class="active"><a href="">
                                    <small>综合排序</small>
                                </a></li>
                            <li role="presentation"><a href="#">
                                    <small>最多点击</small>
                                </a></li>
                            <li role="presentation"><a href="#">
                                    <small>最新发布</small>
                                </a></li>
                            <li role="presentation"><a href="#">
                                    <small>最多弹幕</small>
                                </a></li>
                            <li role="presentation"><a href="#">
                                    <small>最多收藏</small>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills">
                            <li role="presentation" class="active"><a href="#">
                                    <small>全部时长</small>
                                </a></li>
                            <li role="presentation"><a href="#">
                                    <small>10分钟以下</small>
                                </a></li>
                            <li role="presentation"><a href="#">
                                    <small>10-30分钟</small>
                                </a></li>
                            <li role="presentation"><a href="#">
                                    <small>30-60分钟</small>
                                </a></li>
                            <li role="presentation"><a href="#">
                                    <small>60分钟以上</small>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills">
                            <li role="presentation" class="active"><a href="#">
                                    <small>全部分区</small>
                                </a></li>
                            <li role="presentation"><a href="#">
                                    <small>游戏</small>
                                </a></li>
                            <li role="presentation"><a href="#">
                                    <small>音乐</small>
                                </a></li>
                            <li role="presentation"><a href="#">
                                    <small>影视</small>
                                </a></li>
                            <li role="presentation"><a href="#">
                                    <small>动画</small>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row bili-search-detail">
        <?php
        echo $search_html;
        ?>
    </div>
    <hr>
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
            <div class="col-md-4 ">
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


    $("#bili-search-submit").click(function () {
        var keyword = $("#bili-search-input").val();
        var url = "/search.php?keyword=" + keyword;
        window.location.href = url;
    });



</script>
</body>
</html>