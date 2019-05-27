<?php
include 'tool.php';
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM user_center WHERE username_t LIKE '$username'";
    $result = $conn->query($sql);
    $result->num_rows > 0;
    $row = $result->fetch_assoc();
}
function Active($var, $id)
{
    $a = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    if ($id) {
        $a = $a . '?' . $_SERVER['QUERY_STRING'];
    }
    echo basename($a) == $var ? "class=\"active\"" : "";
}
?>
<header class="header">
    <nav class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="header-topbar hidden-xs link-border">
                <ul class="site-nav topmenu">
                    <li><a href="tags.php">标签云</a></li>
                    <li><a href="readers.php" rel="nofollow">读者墙</a></li>
                    <li><a href="links.php" rel="nofollow">友情链接</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" rel="nofollow">关注本站 <span class="caret"></span></a>
                        <ul class="dropdown-menu header-topbar-dropdown-menu">
                            <li><a data-toggle="modal" data-target="#WeChat" rel="nofollow"><i class="fa fa-weixin"></i> 微信</a></li>
                            <li><a data-toggle="modal" data-target="#areDeveloping" rel="nofollow"><i class="fa fa-weibo"></i> 微博</a></li>
                            <li><a data-toggle="modal" data-target="#areDeveloping" rel="nofollow"><i class="fa fa-rss"></i> RSS</a></li>
                        </ul>
                    </li>
                </ul>
                <?php
                if (isset($username)) { ?>
                    <a href="#"><?php echo $username ?>，欢迎回来喵窝！</a>
                <?php
            } else {
                ?>
                    <a data-toggle="modal" data-target="#loginModal" class="login" rel="nofollow">Hi,请登录</a>&nbsp;&nbsp;
                    <a href="javascript:;" class="register" rel="nofollow">我要注册</a>&nbsp;&nbsp;
                <?php
            }
            ?>
                <!-- <a href="" rel="nofollow">找回密码</a> -->
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <h1 class="logo hvr-bounce-in"><a href="/" title=""><img src="images/MiaoWo.png" alt=""></a></h1>
            </div>
            <div class="collapse navbar-collapse" id="header-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li <?php Active("index.php", false); ?>><a data-cont="首页" href="/">首页</a></li>
                    <?php
                    $sql = "SELECT * FROM classify";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <li <?php Active("category.php?id=" . $row['id'], true); ?>><a href="category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
                        <?php
                    }
                }
                ?>
                    <li><a href="/Admin">管理系统</a></li>
                </ul>
                <form class="navbar-form visible-xs" action="/Search" method="post">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" placeholder="请输入关键字" maxlength="20" autocomplete="off">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
                        </span> </div>
                </form>
            </div>
        </div>
    </nav>
</header>