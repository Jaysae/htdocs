<!doctype html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo "搜索内容" ?> - | 喵窝 | 我的个人博客 | Powered By Siner</title>
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
  <?php
  include 'header.php'
  ?>
  <section class="container">
    <div class="fixed">
      <div class="widget widget_search">
        <form class="navbar-form" action="/Search" method="post">
          <div class="input-group">
            <input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off">
            <span class="input-group-btn">
              <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
            </span> </div>
        </form>
      </div>
      <div class="content-wrap">
        <div class="content" style="margin-right: 0px;">
          <?php
          for ($i = 0; $i < 10; $i++) {
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