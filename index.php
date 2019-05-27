<?php include 'tool.php';
$sql = "SELECT * FROM article";
$result = $conn->query($sql);
$page_num  = $result->num_rows;
if ($page_num / 5 > (int)($page_num / 5))
    $page_num =  (int)($page_num / 5) + 1;
else
    $page_num = (int)$page_num / 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
?>
<!doctype html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>喵窝 - 我的个人博客 | Powered By Siner</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/nprogress.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="apple-touch-icon-precomposed" href="images/icon/icon.png">
    <link rel="shortcut icon" href="images/icon/favicon.ico">
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/nprogress.js"></script>
    <script src="js/jquery.lazyload.min.js"></script>
    <!--[if gte IE 9]>
  <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="js/html5shiv.min.js" type="text/javascript"></script>
  <script src="js/respond.min.js" type="text/javascript"></script>
  <script src="js/selectivizr-min.js" type="text/javascript"></script>
<![endif]-->
</head>

<body class="user-select">
    <?php include 'header.php' ?>
    <section class="container">
        <div class="content-wrap">
            <div class="content">
                <div class="jumbotron">
                    <h1>欢迎访问喵窝博客</h1>
                    <p>在这里可以看到前端技术，后端程序，网站内容管理系统等文章，还有我的程序人生！</p>
                </div>
                <div id="focusslide" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#focusslide" data-slide-to="0" class="active"></li>
                        <li data-target="#focusslide" data-slide-to="1"></li>
                        <li data-target="#focusslide" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active"> <a href="" target="_blank"><img src="images/banner/banner_01.jpg" alt="" class="img-responsive"></a>
                            <!--<div class="carousel-caption"> </div>-->
                        </div>
                        <div class="item"> <a href="" target="_blank"><img src="images/banner/banner_02.jpg" alt="" class="img-responsive"></a>
                            <!--<div class="carousel-caption"> </div>-->
                        </div>
                        <div class="item"> <a href="" target="_blank"><img src="images/banner/banner_03.jpg" alt="" class="img-responsive"></a>
                            <!--<div class="carousel-caption"> </div>-->
                        </div>
                    </div>
                    <a class="left carousel-control" href="#focusslide" role="button" data-slide="prev" rel="nofollow"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">上一个</span> </a> <a class="right carousel-control" href="#focusslide" role="button" data-slide="next" rel="nofollow"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">下一个</span> </a>
                </div>
                <article class="excerpt-minic excerpt-minic-index">
                    <h2><span class="red">【推荐】</span><a href="" title="">从下载看我们该如何做事</a></h2>
                    <p class="note">一次我下载几部电影，发现如果同时下载多部要等上几个小时，然后我把最想看的做个先后排序，去设置同时只能下载一部，结果是不到一杯茶功夫我就能看到最想看的电影。 这就像我们一段时间内想干成很多事情，是同时干还是有选择有顺序的干，结果很不一样。同时...</p>
                </article>
                <div class="title">
                    <h3>最新发布</h3>
                    <div class="more"><a href="">PHP</a><a href="">JavaScript</a><a href="">Unity</a><a href="">C Sharp</a><a href="">MySQL</a></div>
                </div>

                <?php
                $sql = "SELECT * FROM article LIMIT " . ($page - 1) * 5 . ",5";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <article class="excerpt excerpt-<?php echo $row['id'] ?>"><a class="focus" href="article.php?<?php echo $row['id'] ?>" title=""><img class="thumb" data-original="<?php echo $row['image'] ?>" src="<?php echo $row['image'] ?>" alt=""></a>
                            <header><a class="cat" href="program"><?php echo $row['classify'] ?><i></i></a>
                                <h2><a href="article.php" title=""><?php echo $row['title'] ?></a></h2>
                            </header>
                            <p class="meta">
                                <time class="time"><i class="glyphicon glyphicon-time"></i><?php echo $row['date'] ?></time>
                                <span class="views"><i class="glyphicon glyphicon-eye-open"></i> 共<?php echo $row['view'] ?>人围观</span> <a class="comment" href="article.php"><i class="glyphicon glyphicon-comment"></i> 0个不明物体</a></p>
                            <div class="note"><?php echo $row['foreword'] ?></div>
                        </article>
                    <?php
                }
            }
            ?>
                <div class="ias_end" style="display:none"><a>已是最后一页</a></div>
                <nav class="pagination" style="display: none;">
                    <ul>
                        <li class="prev-page"></li>
                        <?php
                        for ($i = 0; $i < $page_num; $i++) {
                            ?>
                            <li <?php echo $page == (1 + $i) ? "class=\"active\"" : "" ?>>
                                <a href="index.php?page=<?php echo (1 + $i) ?>">
                                    <?php echo (1 + $i) ?>
                                </a>
                            </li>
                        <?php
                    }
                    ?>
                        <li class="next-page"><a href="index.php?page=<?php echo ($page + 1) > $page_num ? $page_num + 1 : ($page + 1) ?>">下一页</a></li>
                        <li><span>共 <?php echo $page_num ?> 页</span></li>
                    </ul>
                </nav>
            </div>
        </div>
        <aside class="sidebar">
            <div class="fixed">
                <div class="widget widget-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#notice" aria-controls="notice" role="tab" data-toggle="tab">网站公告</a></li>
                        <li role="presentation"><a href="#centre" aria-controls="centre" role="tab" data-toggle="tab">会员中心</a></li>
                        <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">联系站长</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane notice active" id="notice">
                            <ul>
                                <?php
                                $sql = "SELECT * FROM notice";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <li>
                                            <time datetime="<?php echo $row['date'] ?>" title="该公告于 <?php echo $row['date'] ?> 发布。"><?php echo substr($row['date'], 6) ?></time>
                                            <a href="#" title="<?php echo $row['content'] ?>"><?php echo $row['content'] ?></a></li>
                                    <?php
                                }
                            }
                            ?>
                            </ul>
                        </div>
                        <div role="tabpanel" class="tab-pane centre" id="centre">
                            <h4>需要登录才能进入会员中心</h4>
                            <p> <a data-toggle="modal" data-target="#loginModal" class="btn btn-primary">立即登录</a> <a href="javascript:;" class="btn btn-default">现在注册</a> </p>
                        </div>
                        <div role="tabpanel" class="tab-pane contact" id="contact">
                            <h2>Email:<br />
                                <a href="mailto:2512624184@qq.com" data-toggle="tooltip" data-placement="bottom" title="2512624184@qq.com">2512624184@qq.com</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'RightMenu.php' ?>
        </aside>
    </section>
    <script type="text/javascript">
        var page_num = <?php echo $page_num ?>;
    </script>
    <?php include 'footer.php';
    include 'modal.php' ?>
</body>

</html>