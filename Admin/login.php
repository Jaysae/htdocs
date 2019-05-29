<!doctype html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>异清轩博客管理系统</title>
  <?php include '../tool.php'; ?>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body class="user-select">
  <div class="container">
    <div class="siteIcon"><img src="/images/icon.png" alt="" data-toggle="tooltip" data-placement="top" title="欢迎使用喵窝博客管理系统" draggable="false" /></div>
    <form action="index.html" method="post" autocomplete="off" class="form-signin">
      <h2 class="form-signin-heading">管理员登录</h2>
      <label for="userName" class="sr-only">用户名</label>
      <input type="text" id="userName" name="username" class="form-control" placeholder="请输入用户名" required autofocus autocomplete="off" maxlength="15" oninvalid="setCustomValidity('请输入用户名')" oninput="setCustomValidity('')">
      <label for="userPwd" class="sr-only">密码</label>
      <input type="password" id="userPwd" name="userpwd" class="form-control" placeholder="请输入密码" required autocomplete="off" maxlength="18" oninvalid="setCustomValidity('请输入密码')" oninput="setCustomValidity('')">
      <a href="main.html"><button class="btn btn-lg btn-primary btn-block" type="submit" id="signinSubmit">登录</button></a>
    </form>
    <div class="footer">
      <p>不知道自己在哪？<a href="/index.php" data-toggle="tooltip" data-placement="left" title="">回到首页 →</a></p>
    </div>
  </div>
  <script src="/js/bootstrap.min.js"></script>
</body>

</html>