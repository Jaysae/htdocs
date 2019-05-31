<!doctype html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>文章 - 异清轩博客管理系统</title>
  <?php include '../tool.php';
  $page_num = $conn->query("SELECT COUNT(*) FROM article")->fetch_assoc()['COUNT(*)'];
  $article_num = $page_num;
  $amount = 15;
  if ($page_num / $amount > (int)($page_num / $amount))
    $page_num =  (int)($page_num / $amount) + 1;
  else
    $page_num = (int)$page_num / $amount;
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  ?>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="user-select">
  <section class="container-fluid">
    <?php include 'header.php' ?>
    <div class="row">
      <?php include 'aside.php';
      $sql = "SELECT * FROM article LIMIT " . ($page - 1) * $amount . "," . $amount . "";
      $result = $conn->query($sql);
      ?>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
        <form action="" method="post" id="DeleteAll">
          <h1 class="page-header">操作</h1>
          <ol class="breadcrumb">
            <li><a href="add-article.php">增加文章</a></li>
          </ol>
          <h1 class="page-header">管理 <span class="badge"><?php echo $article_num ?></span></h1>
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">选择</span></th>
                  <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">标题</span></th>
                  <th><span class="glyphicon glyphicon-list"></span> <span class="visible-lg">栏目</span></th>
                  <th class="hidden-sm"><span class="glyphicon glyphicon-tag"></span> <span class="visible-lg">标签</span></th>
                  <th class="hidden-sm"><span class="glyphicon glyphicon-comment"></span> <span class="visible-lg">评论</span></th>
                  <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">日期</span></th>
                  <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
                </tr>
              </thead>
              <tbody class="commentList">
                <?php
                while ($row = $result->fetch_assoc()) {
                  ?>
                  <tr>
                    <td><input type="checkbox" class="input-control" name="checkbox[]" value="<?php echo $row['id'] ?>" /></td>
                    <td class="article-title"><?php echo $row['title'] ?></td>
                    <td><?php echo $row['classify'] ?></td>
                    <td class="hidden-sm"><?php echo $row['label'] ?></td>
                    <td class="hidden-sm"><?php echo $conn->query("SELECT COUNT(*) FROM comment WHERE article_id = " . $row['id'])->fetch_assoc()['COUNT(*)'] ?></td>
                    <td><?php echo $row['date'] ?></td>
                    <td><a href="update-article.php?id=<?php echo $row['id'] ?>">修改</a> <a rel="<?php echo $row['id'] ?>">删除</a></td>
                  </tr>
                <?php
              }
              ?>
              </tbody>
            </table>
          </div>
          <footer class="message_footer">
            <nav>
              <div class="btn-toolbar operation" role="toolbar">
                <div class="btn-group" role="group"> <a class="btn btn-default" onClick="select()">全选</a> <a class="btn btn-default" onClick="reverse()">反选</a> <a class="btn btn-default" onClick="noselect()">不选</a> </div>
                <div class="btn-group" role="group">
                  <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="删除全部选中" name="checkbox_delete">删除</button>
                </div>
              </div>
              <ul class="pagination pagenav quotes">
                <li <?php echo $page == 1 ? "class=\"disabled\"" : "class=\"canClick\"" ?>>
                  <a href="/Admin/article.php?page=1" aria-label="Previous">
                    &laquo;
                  </a>
                </li>
                <?php
                for ($i = 0; $i < $page_num; $i++) {
                  ?>
                  <li <?php echo $page == (1 + $i) ? "class=\"active\"" : "class=\"canClick\"" ?>>
                    <a href="/Admin/article.php?page=<?php echo (1 + $i) ?>">
                      <?php echo (1 + $i) ?>
                    </a>
                  </li>
                <?php
              }
              ?>
                <li <?php echo $page == $page_num ? "class=\"disabled\"" : "class=\"canClick\"" ?>>
                  <a href="/Admin/article.php?page=<?php echo $page_num ?>" aria-label="Next">
                    &raquo;
                  </a>
                </li>
              </ul>
            </nav>
          </footer>
        </form>
      </div>
    </div>
  </section>
  <script>
    $(function() {
      $('.canClick a').click(function(event) {
        str = $(this).attr('href');
        CanClick(str);
        event.preventDefault();
      });
      $("#main table tbody tr td a").click(function() {
        var name = $(this);
        Delete(name);
      });

      function Delete(name) {
        var id = name.attr("rel"); //对应id  
        if (event.srcElement.outerText == "删除") {
          if (window.confirm("此操作不可逆，是否确认？")) {
            $.ajax({
              type: "POST",
              url: "/ajax.php",
              data: "function=Delete&age=" + id + ",article",
              cache: false, //不缓存此页面   
              success: function(data) {
                if (data == "true") {
                  iziToast.success({
                    title: '成功',
                    message: '您所选择的文章已经成功删除',
                    position: 'bottomRight',
                    transitionIn: 'bounceInLeft',
                    zindex: 1100,
                    pauseOnHover: false,
                  });
                  CanClick("/Admin/article.php?page=<?php echo $page ?>");
                }
              }
            });
          };
        };
      };

      $("#DeleteAll").submit(function(event) {
        event.preventDefault();
        var arr = new Array();
        $("input:checkbox:checked").each(function(i) {
          arr[i] = $(this).val();
        });
        var values = arr.join("/");
        if (values == "") {
          iziToast.warning({
            title: '提示',
            message: '您未选中任何一条想要删除的文章',
            position: 'bottomRight',
            transitionIn: 'bounceInLeft',
            zindex: 1100,
            pauseOnHover: false,
          });
        } else {
          $.ajax({
            type: "POST",
            url: "/ajax.php",
            data: "function=DeleteAll&age=" + values + ",article",
            cache: false, //不缓存此页面  
            success: function(data) {
              if (data == "true") {
                if (arr.length == <?php echo $result->num_rows ?>) {
                  CanClick("/Admin/article.php?page=<?php echo $page - 1 ?>");
                } else {
                  CanClick("/Admin/article.php?page=<?php echo $page ?>");
                }
                iziToast.success({
                  title: '成功',
                  message: '您所选择的' + arr.length + '条文章已经成功删除',
                  position: 'bottomRight',
                  transitionIn: 'bounceInLeft',
                  zindex: 1100,
                  pauseOnHover: false,
                });
              }
            }
          });
        }
      })
    });
  </script>
  <?php include 'modal.php' ?>
</body>

</html>