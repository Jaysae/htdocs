<!doctype html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>写文章 - 异清轩博客管理系统</title>
  <?php include '../tool.php'; ?>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="user-select">
  <section class="container-fluid">
    <?php include 'header.php' ?>
    <div class="row">
      <?php include 'aside.php' ?>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
        <div class="row">
          <form action="/Article/add" method="post" class="add-article-form">
            <div class="col-md-9">
              <h1 class="page-header">撰写新文章</h1>
              <div class="form-group">
                <label for="article-title" class="sr-only">标题</label>
                <input type="text" id="article-title" name="title" class="form-control" placeholder="在此处输入标题" required autofocus autocomplete="off">
              </div>
              <div class="form-group">
                <label for="article-content" class="sr-only">内容</label>
                <script id="article-content" name="content" type="text/plain"></script>
              </div>
              <div class="add-article-box">
                <h2 class="add-article-box-title"><span>描述</span></h2>
                <div class="add-article-box-content">
                  <textarea class="form-control" name="describe" autocomplete="off"></textarea>
                  <span class="prompt-text">描述是可选的手工创建的内容总结，并可以在网页描述中使用</span>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <h1 class="page-header">操作</h1>
              <div class="add-article-box">
                <h2 class="add-article-box-title"><span>栏目</span></h2>
                <div class="add-article-box-content">
                  <ul class="category-list">
                    <?php
                    $sql = "SELECT * FROM classify";
                    $result = $conn->query($sql);
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                      $i++;
                      ?>
                      <li>
                        <label>
                          <input name="category" type="radio" value="1" <?php echo $i == 1 ? "checked" : "" ?>>
                          <?php echo $row['name'] ?> <em class="hidden-md">( 栏目ID: <span><?php echo $row['id'] ?></span> )</em></label>
                      </li>
                    <?php
                  }
                  ?>
                  </ul>
                </div>
              </div>
              <div class="add-article-box">
                <h2 class="add-article-box-title"><span>关键字</span></h2>
                <div class="add-article-box-content">
                  <input type="text" class="form-control" placeholder="请输入关键字" name="keywords" autocomplete="off">
                  <span class="prompt-text">多个标签请用英文逗号,隔开。</span>
                </div>
              </div>
              <div class="add-article-box">
                <h2 class="add-article-box-title"><span>标签</span></h2>
                <div class="add-article-box-content">
                  <input type="text" class="form-control" placeholder="输入新标签" name="tags" autocomplete="off">
                  <span class="prompt-text">多个标签请用英文逗号,隔开</span> </div>
              </div>
              <div class="add-article-box">
                <h2 class="add-article-box-title"><span>标题图片</span></h2>
                <div class="add-article-box-content">
                  <input type="text" class="form-control" placeholder="点击按钮选择图片" id="pictureUpload" name="titlepic" autocomplete="off">
                </div>
                <div class="add-article-box-footer">
                  <button class="btn btn-default" type="button" ID="upImage">选择</button>
                </div>
              </div>
              <div class="add-article-box">
                <h2 class="add-article-box-title"><span>发布</span></h2>
                <div class="add-article-box-content">
                  <p><label>状态：</label><span class="article-status-display">未发布</span></p>
                  <p><label>发布于：</label><span class="article-time-display"><input style="border: none;" type="datetime" name="time" value="2016-01-09 17:29:37" /></span></p>
                </div>
                <div class="add-article-box-footer">
                  <button class="btn btn-primary" type="submit" name="submit">发布</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <?php include 'modal.php';
  include 'UEditor.php'; ?>
</body>

</html>