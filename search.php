<?php
$a = mysqli_connect("127.0.0.1", "root", "", "bilibili");


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
                <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
          <button class="btn btn-info" type="button"><span class="glyphicon glyphicon-search"></span>&nbsp;Search
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
                            <ul class="nav nav-pills">
                                <li role="presentation" class="active"><a href="#">
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
    <hr>
</div>



<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap.min.js"></script>

<script>

</script>
</body>
</html>