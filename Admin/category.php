<!doctype html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>栏目 - 异清轩博客管理系统</title>
  <?php include '../tool.php';
  $page_num = $conn->query("SELECT COUNT(*) FROM classify")->fetch_assoc()['COUNT(*)'];
  $classify_num = $page_num;
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
      $sql = "SELECT * FROM classify LIMIT " . ($page - 1) * $amount . "," . $amount . "";
      $result = $conn->query($sql);
      ?>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
        <div class="row">
          <div class="col-md-7">
            <h1 class="page-header">管理 <span class="badge"><?php echo $classify_num ?></span></h1>
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th><span class="glyphicon glyphicon-paperclip"></span> <span class="visible-lg">ID</span></th>
                    <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">名称</span></th>
                    <th><span class="glyphicon glyphicon-pushpin"></span> <span class="visible-lg">总数</span></th>
                    <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
                  </tr>
                </thead>
                <tbody class="commentList">
                  <?php
                  while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                      <td><?php echo $row['id'] ?></td>
                      <td><?php echo $row['name'] ?></td>
                      <td><?php echo $conn->query("SELECT COUNT(*) FROM article WHERE classify LIKE '" . $row['name'] . "'")->fetch_assoc()['COUNT(*)'] ?> 篇</td>
                      <td><a href="update-category.php?id=<?php echo $row['id'] ?>">修改</a>
                        <a rel="<?php echo $row['id'] ?>">删除</a>
                      </td>
                    </tr>
                  <?php
                }
                ?>
                </tbody>
              </table>
              <span class="prompt-text"><strong>注：</strong>删除一个栏目也会删除栏目下的文章和子栏目,请谨慎删除!</span>
            </div>
          </div>
          <div class="col-md-5">
            <h1 class="page-header">添加</h1>
            <form action="" method="post" autocomplete="off">
              <div class="form-group">
                <label for="category-name">栏目名称</label>
                <input type="text" id="category-name" name="name" class="form-control" placeholder="在此处输入栏目名称" required autocomplete="off" maxlength="8" oninvalid="setCustomValidity('请输入栏目名称')" oninput="setCustomValidity('')>
                <span class=" prompt-text">这将是它在站点上显示的名字。</span> </div>
              <button class="btn btn-primary" type="submit" name="submit">添加新栏目</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include 'modal.php' ?>
  <script type="text/javascript">
    $(function() {
      $("#main table tbody tr td a").click(function() {
        var name = $(this);
        Delete(name);
      });

      function Delete(name) {
        var id = name.attr("rel"); //对应id  
        if (event.srcElement.outerText == "删除") {
          if (window.confirm("此操作不可逆，是否确认？（将删除该栏目下所有文章！）")) {
            $.ajax({
              type: "POST",
              url: "/ajax.php",
              data: "function=Delete&age=" + id + ",classify",
              cache: false, //不缓存此页面   
              success: function(data) {
                if (data == "true") {
                  CanClick("/Admin/category.php");
                  iziToast.success({
                    title: '成功',
                    message: '您所选择的栏目及其所有文章已经成功删除',
                    position: 'bottomRight',
                    transitionIn: 'bounceInLeft',
                    zindex: 1100,
                    pauseOnHover: false,
                  });
                }
              }
            });
          };
        };
      };
    });
  </script>
</body>

</html>