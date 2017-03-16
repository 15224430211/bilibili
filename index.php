<?php
$a = mysqli_connect("127.0.0.1", "root", "", "bilibili");
//var_dump($a);
$sql = "SELECT
animation_detail.`name`
FROM
animation_detail
WHERE
animation_detail.`name` LIKE \"%王%\"
";
$result = mysqli_fetch_all(mysqli_query($a, $sql));
//var_dump($result);
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
</head>
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
    <!-- Standard button -->
    <button type="button" class="btn btn-default btn-lg">（默认样式）Default</button>
    <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
    </button>

    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
    <button type="button" class="btn btn-primary">（首选项）Primary</button>

    <!-- Indicates a successful or positive action -->
    <button type="button" class="btn btn-success">（成功）Success</button>

    <!-- Contextual button for informational alert messages -->
    <button type="button" class="btn btn-info">（一般信息）Info</button>

    <!-- Indicates caution should be taken with this action -->
    <button type="button" class="btn btn-warning">（警告）Warning</button>

    <!-- Indicates a dangerous or potentially negative action -->
    <button type="button" class="btn btn-danger">（危险）Danger</button>

    <!-- Deemphasize a button by making it look like a link while maintaining button behavior -->
    <button type="button" class="btn btn-link">（链接）Link</button>


</div>
</body>
</html>





