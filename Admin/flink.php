<!doctype html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>友情链接 - 异清轩博客管理系统</title>
  <?php include '../tool.php'; ?>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="user-select">
  <section class="container-fluid">
    <?php include 'header.php' ?>
    <div class="row">
      <?php include 'aside.php' ?>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
        <form action="/Flink/checkAll" method="post">
          <h1 class="page-header">操作</h1>
          <ol class="breadcrumb">
            <li><a href="add-flink.html">增加友情链接</a></li>
          </ol>
          <h1 class="page-header">管理 <span class="badge">1</span></h1>
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">选择</span></th>
                  <th><span class="glyphicon glyphicon-bookmark"></span> <span class="visible-lg">名称</span></th>
                  <th><span class="glyphicon glyphicon-link"></span> <span class="visible-lg">URL</span></th>
                  <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="checkbox" class="input-control" name="checkbox[]" value="" /></td>
                  <td class="article-title">异清轩</td>
                  <td>http://www.ylsat.com</td>
                  <td><a href="update-flink.html">修改</a> <a rel="6">删除</a></td>
                </tr>
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
              <ul class="pagination pagenav">
                <li class="disabled"><a aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>
                <li class="active"><a>1</a></li>
                <li class="disabled"><a aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
              </ul>
            </nav>
          </footer>
        </form>
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
        if (event.srcElement.outerText == "删除") {
          if (window.confirm("此操作不可逆，是否确认？")) {
            $.ajax({
              type: "POST",
              url: "/Flink/delete",
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