<!doctype html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include 'tool.php';
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  } else {
    $id = 1;
  }
  $sql = "SELECT * FROM article WHERE id = '$id'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
    $row_A = $result->fetch_assoc();
  ?>
  <title><?php echo $row_A['title'] ?> - | 喵窝 | 我的个人博客 | Powered By Siner</title>
</head>

<body class="user-select single">
  <?php include 'header.php' ?>
  <section class="container">
    <div class="content-wrap">
      <div class="content">
        <header class="article-header">
          <h1 class="article-title"><a href=""><?php echo $row_A['title'] ?></a></h1>
          <div class="article-meta">
            <span class="item article-meta-time">
              <time class="time" data-toggle="tooltip" data-placement="bottom" title="时间：<?php echo $row_A['date'] ?>">
                <i class="glyphicon glyphicon-time"></i> <?php echo $row_A['date'] ?>
              </time>
            </span>
            <span class="item article-meta-source" data-toggle="tooltip" data-placement="bottom" title="作者：<?php echo $row_A['author'] ?>">
              <i class="glyphicon glyphicon-globe"></i> <?php echo $row_A['author'] ?>
            </span>
            <span class="item article-meta-category" data-toggle="tooltip" data-placement="bottom" title="栏目：<?php echo $row_A['classify'] ?>">
              <i class="glyphicon glyphicon-list"></i>
              <a href="search.php?keyword=<?php echo $row_A['classify'] ?>" title=""><?php echo $row_A['classify'] ?></a>
            </span>
            <span class="item article-meta-views" data-toggle="tooltip" data-placement="bottom" title="查看：<?php echo $row_A['view'] ?>">
              <i class="glyphicon glyphicon-eye-open"></i> 共<?php echo $row_A['view'] ?>人围观
            </span>
            <span class="item article-meta-comment" data-toggle="tooltip" data-placement="bottom" title="评论：0">
              <i class="glyphicon glyphicon-comment"></i> 0个不明物体
            </span>
          </div>
        </header>
        <article class="article-content">
          <p class="foreword">
            <?php echo $row_A['foreword'] ?>
            <br>
            <span>------导读</span>
          </p>
          <p><img data-original="<?php echo $row_A['image'] ?>" src="<?php echo $row_A['image'] ?>" alt="" /></p>
          <div><?php echo $row_A['content'] ?></div>
          <p class="article-copyright hidden-xs">未经允许不得转载：
            <a href="">异清轩博客</a> » <a href="article.html">php如何判断一个日期的格式是否正确</a>
          </p>
        </article>
        <div class="article-tags">标签：<a href="" rel="tag">PHP</a></div>
        <div class="relates">
          <div class="title">
            <h3>栏目热门推荐</h3>
          </div>
          <ul>
            <?php
            $sql = "SELECT * FROM article WHERE classify LIKE '" . $row_A['classify'] . "' ORDER BY article.view DESC LIMIT 0,7";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                ?>
                <li><a href="article.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></li>
              <?php
            }
          }
          ?>
          </ul>
        </div>
        <div class="title" id="comment">
          <h3>评论
            <?php if ($row_A['comment_off'] == null) { ?>
              <small>抢沙发</small></h3>
          <?php } ?>
        </div>
        <div id="respond" <?php if ($row_A['comment_off'] == null && isset($_SESSION['username'])) echo "style='display:none;'" ?>>
          <div class="comment-signarea">
            <?php if (!isset($_SESSION['username'])) { ?>
              <h3 class="text-muted">评论前必须登录！</h3>
              <p>
                <a data-toggle="modal" data-target="#loginModal" class="btn btn-primary login" rel="nofollow">立即登录</a> &nbsp;
                <a data-toggle="modal" data-target="#regModal" class="btn btn-default register" rel="nofollow">注册</a>
              </p>
            <?php } ?>
            <?php if ($row_A['comment_off'] != null) { ?>
              <h3 class="text-muted">当前文章禁止评论</h3>
            <?php } ?>
          </div>
        </div>
        <div id="respond" <?php if ($row_A['comment_off'] != null || !isset($_SESSION['username'])) echo "style='display:none;'" ?>>
          <form action="" method="post" id="comment-form">
            <div class="comment">
              <?php
              if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $sql = "SELECT * FROM user_center WHERE username_t LIKE '$username'";
                $result = $conn->query($sql);
                $result->num_rows > 0;
                $row = $result->fetch_assoc();
              }
              ?>
              <div class="comment-title"><img class="avatar" src="<?php if (isset($_SESSION['username'])) echo $row['avatar']; ?>" alt="" /></div>
              <div class="comment-box">
                <textarea placeholder="您的评论可以一针见血" name="comment" id="comment-textarea" cols="100%" rows="3" tabindex="1" maxlength="300"></textarea>
                <div class="comment-ctrl">
                  <span class="emotion" style='display:none;'>
                    <img src="images/face/5.png" width="20" height="20" alt="" />表情
                  </span>
                  <div class="comment-prompt">
                    <i class="fa fa-spin fa-circle-o-notch"></i>
                    <span class="comment-prompt-text"></span>
                  </div>
                  <input type="hidden" value="<?php echo $row_A['id'] ?>" class="articleId" />
                  <input type="hidden" value="<?php echo $row['id'] ?>" class="userId" />
                  <button type="submit" name="comment-submit" id="comment-submit" tabindex="5">评论</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div id="postcomments">
          <ol class="commentList">
            <?php
            $id_a = $row_A['id'];
            $sql = "SELECT comment.id,comment.content,comment.date,user_center.username_t,user_center.avatar,user_center.login_city 
            FROM comment INNER JOIN user_center ON comment.user_id = user_center.id
            WHERE comment.article_id = '$id_a' ORDER BY comment.date ASC";
            $result = $conn->query($sql);
            $page_num  = $result->num_rows;
            if ($page_num / 5 > (int)($page_num / 5))
              $page_num =  (int)($page_num / 5) + 1;
            else
              $page_num = (int)$page_num / 5;
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $sql = "SELECT comment.id,comment.content,comment.date,user_center.username_t,user_center.avatar,user_center.login_city 
            FROM comment INNER JOIN user_center ON comment.user_id = user_center.id
            WHERE comment.article_id = '$id_a' ORDER BY comment.date ASC LIMIT " . ($page - 1) * 5 . ",5";
            $result = $conn->query($sql);
            $i = 1;
            function City($str)
            {
              $len = strlen($str) - 6;
              return substr($str, 0, $len);
            }
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                ?>
                <li class="comment-content"><span class="comment-f">#<?php echo ($page - 1) * 5 + $i ?></span>
                  <div class="comment-avatar">
                    <?php if ($row['avatar'] != "") { ?>
                      <img class="avatar" src="<?php echo $row['avatar'] ?>" alt="" />
                    <?php } else { ?>
                      <svg data-jdenticon-value="<?php echo $row['username_t'] ?>"></svg>
                    <?php } ?>
                  </div>
                  <div class="comment-main">
                    <p>
                      来自<span class="address"><?php echo City($row['login_city']) ?></span>的
                      <?php echo $row['username_t'] ?>
                      <span class="time">(<?php echo $row['date'] ?>)</span><br />
                      <?php echo $row['content'] ?>
                    </p>
                  </div>
                </li>
                <?php $i++;
              }
            } ?>
          </ol>
          <div class="quotes">
            <?php
            quotes($row_A, $page, $page_num);
            function quotes($row_A, $page, $page_num)
            {
              $echo = $page == 1 ? "<a class='disabled'" : "<a class='canClick'";
              echo $echo . "href='article.php?id=" . $row_A['id'] . "&page=1'>" . "首页" . "</a>";
              $temp = $page - 1 == 0 ? "1" : $page - 1;
              echo $echo . "href='article.php?id=" . $row_A['id'] . "&page=" . $temp . "'>" . "上一页" . "</a>";
              for ($i = 0; $i < $page_num; $i++) { ?>
                <a <?php echo $page == (1 + $i) ? "class=\"current\"" : "class=\"canClick\"" ?> href="article.php?id=<?php echo $row_A['id'] ?>&page=<?php echo (1 + $i) ?>">
                  <?php echo (1 + $i) ?>
                </a>
              <?php }
            $echo = $page == $page_num ? "<a class='disabled'" : "<a class='canClick'";
            $temp = $page + 1 > $page_num ? $page_num : $page + 1;
            echo $echo . "href='article.php?id=" . $row_A['id'] . "&page=" . $temp . "'>" . "下一页" . "</a>";
            echo $echo . "href='article.php?id=" . $row_A['id'] . "&page=" . $page_num . "'>" . "尾页" . "</a>";
          } ?>
          </div>
        </div>
      </div>
    </div>
    <aside class="sidebar">
      <?php include 'RightMenu.php' ?>
    </aside>
  </section>
  <?php include 'footer.php';
  include 'modal.php' ?>
  <script src="js/jquery.qqFace.js"></script>
  <script type="text/javascript">
    function CanClick(str) {
      $.ajax({
        url: str,
        context: $('commentList'),
        success: function(data) {
          commentList = $(data).find('.commentList').html();
          quotes = $(data).find('.quotes').html();
          $(".commentList,.quotes").animate({
            opacity: "0"
          }, 100);
          $(".commentList").animate({
            height: "375px"
          }, 100);
          setTimeout(function() {
            $(".commentList").html(commentList);
            $(".quotes").html(quotes);
            jdenticon();
            $('.disabled').click(function(event) {
              event.preventDefault();
            });
            $('.current').click(function(event) {
              event.preventDefault();
            });
            $('.canClick').click(function(event) {
              str = $(this).attr('href');
              CanClick(str);
              event.preventDefault();
            });
            temp = $(".comment-content").length * 75;
            $(".commentList").animate({
              height: (temp + "px")
            }, 200);
            $(".commentList,.quotes").animate({
              opacity: "1"
            }, 500);
          }, 500);
        }
      });
    }
    $(function() {
      $('.emotion').qqFace({
        id: 'facebox',
        assign: 'comment-textarea',
        path: '/images/arclist/' //表情存放的路径
      });
      $('.disabled').click(function(event) {
        event.preventDefault();
      });
      $('.current').click(function(event) {
        event.preventDefault();
      });
      $('.canClick').click(function(event) {
        str = $(this).attr('href');
        CanClick(str);
        event.preventDefault();
      });
    });
  </script>
</body>

</html>