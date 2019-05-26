<!doctype html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>喵窝 - | 首页 | 我的个人博客 | Powered By Siner |</title>
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
    <!--[if lt IE 9]>
  <script>window.location.href='upgrade-browser.html';</script>
<![endif]-->
</head>

<body class="user-select">
    <?php
    include 'header.php'
    ?>
    <section class="container">
        <div class="content-wrap">
            <div class="content">
                <div class="jumbotron">
                    <h1>欢迎访问异清轩博客</h1>
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
                    <h2><span class="red">【今日推荐】</span><a href="" title="">从下载看我们该如何做事</a></h2>
                    <p class="note">一次我下载几部电影，发现如果同时下载多部要等上几个小时，然后我把最想看的做个先后排序，去设置同时只能下载一部，结果是不到一杯茶功夫我就能看到最想看的电影。 这就像我们一段时间内想干成很多事情，是同时干还是有选择有顺序的干，结果很不一样。同时...</p>
                </article>
                <div class="title">
                    <h3>最新发布</h3>
                    <div class="more"><a href="">PHP</a><a href="">JavaScript</a><a href="">EmpireCMS</a><a href="">Apache</a><a href="">MySQL</a></div>
                </div>

                <?php
                for ($i = 10; $i < 20; $i++) {

                    ?>
                    <article class="excerpt excerpt-1"><a class="focus" href="article.html" title=""><img class="thumb" data-original="images/excerpt.jpg" src="images/excerpt.jpg" alt=""></a>
                        <header><a class="cat" href="program">后端程序
                                <?php echo $i; ?><i></i></a>
                            <h2><a href="article.html" title="">php如何判断一个日期的格式是否正确</a></h2>
                        </header>
                        <p class="meta">
                            <time class="time"><i class="glyphicon glyphicon-time"></i> 2016-1-4 10:29:39</time>
                            <span class="views"><i class="glyphicon glyphicon-eye-open"></i> 共120人围观</span> <a class="comment" href="article.html#comment"><i class="glyphicon glyphicon-comment"></i> 0个不明物体</a></p>
                        <p class="note">可以用strtotime()把日期（$date）转成时间戳，再用date()按需要验证的格式转成一个日期，来跟$date比较是否相同来验证这个日期的格式是否是正确的。所以要验证日期格式 ... </p>
                    </article>
                <?php
            }
            ?>
                <nav class="pagination" style="display: none;">
                    <ul>
                        <li class="prev-page"></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="?page=2">2</a></li>
                        <li class="next-page"><a href="?page=2">下一页</a></li>
                        <li><span>共 2 页</span></li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <?php
    include 'footer.php';
    include 'modal.php';
    ?>
</body>

</html>