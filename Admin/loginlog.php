<?php include '../config.php' ?>
<!doctype html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>登录记录 - <?php echo WebSite_Title ?>博客管理系统</title>
  <?php include '../tool.php'; ?>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="user-select">
  <section class="container-fluid">
    <?php include 'header.php';
    $sql = "SELECT * FROM login_log ORDER BY `login_log`.`time` DESC";
    $result = $conn->query($sql); ?>
    <div class="row">
      <?php include 'aside.php' ?>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
        <h1 class="page-header">操作</h1>
        <ol class="breadcrumb">
          <li><a href="/Loginlog/delete/action/all">清除所有登录记录</a></li>
          <li><a href="/Loginlog/delete/action/current">清除本人登录记录</a></li>
        </ol>
        <h1 class="page-header">管理 <span class="badge">9</span></h1>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">日志ID</span></th>
                <th><span class="glyphicon glyphicon-user"></span> <span class="visible-lg">用户</span></th>
                <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">时间</span></th>
                <th><span class="glyphicon glyphicon-adjust"></span> <span class="visible-lg">IP</span></th>
                <th><span class="glyphicon glyphicon-remove"></span> <span class="visible-lg">删除</span></th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $result->fetch_assoc()) {
                $row_U = $conn->query("SELECT username_t,login_ip FROM user_center WHERE `id` = " . $row['user_id'])->fetch_assoc();
                ?>
                <tr>
                  <td><?php echo $row['id'] ?></td>
                  <td class="article-title">
                    <?php echo  $row_U['username_t'] ?>
                  </td>
                  <td><?php echo $row['time'] ?></td>
                  <td><?php echo $row_U['login_ip'] ?></td>
                  <td><a rel="1">删除</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <footer class="message_footer">
          <nav>
            <ul class="pagination pagenav">
              <li class="disabled"><a aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>
              <li class="active"><a>1</a></li>
              <li class="disabled"><a aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
            </ul>
          </nav>
        </footer>
      </div>
    </div>
  </section>
  <?php include 'modal.php' ?>
  <script>
    //是否确认删除
    $(function() {
      $("#main table tbody tr td a").click(function() {
        var name = $(this);
        var id = name.attr("rel"); //对应id  
        if (event.srcElement.outerText === "删除") {
          if (window.confirm("此操作不可逆，是否确认？")) {
            $.ajax({
              type: "POST",
              url: "/Loginlog/delete/action/one",
              data: "id=" + id,
              cache: false, //不缓存此页面   
              success: function(data) {
                window.location.reload();
              }
            });
          };
        };
      });
    });
  </script>
</body>

</html>