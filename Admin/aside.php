<aside class="col-sm-3 col-md-2 col-lg-2 sidebar">
    <?php $php_self = substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1); ?>
    <ul class="nav nav-sidebar">
        <li <?php echo $php_self == "index.php" ? "class='active'" : ""; ?>><a href="index.php">报告</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li <?php echo $php_self == "article.php" || $php_self == "add-article.php" ? "class='active'" : ""; ?>><a href="article.php">文章</a></li>
        <li <?php echo $php_self == "notice.php" ? "class='active'" : ""; ?>><a href="notice.php">公告</a></li>
        <li <?php echo $php_self == "comment.php" ? "class='active'" : ""; ?>><a href="comment.php">评论</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li <?php echo $php_self == "category.php" ? "class='active'" : ""; ?>><a href="category.php">栏目</a></li>
        <li <?php echo $php_self == "fLink.php" || $php_self == "add-fLink.php" ? "class='active'" : ""; ?>><a href="fLink.php">友链</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li <?php echo $php_self == "manage-user.php" || $php_self == "loginLog.php" ? "class='active'" : ""; ?>>
            <a class="dropdown-toggle" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">用户</a>
            <ul class="dropdown-menu" aria-labelledby="userMenu">
                <li><a data-toggle="modal" data-target="#areDeveloping">管理用户组</a></li>
                <li><a href="manage-user.php">管理用户</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="loginLog.php">管理登录日志</a></li>
            </ul>
        </li>
        <li <?php echo $php_self == "setting.php" || $php_self == "readSet.php" ? "class='active'" : ""; ?>>
            <a class="dropdown-toggle" id="settingMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">设置</a>
            <ul class="dropdown-menu" aria-labelledby="settingMenu">
                <li><a href="setting.php">基本设置</a></li>
                <li><a href="readSet.php">阅读设置</a></li>
                <li role="separator" class="divider"></li>
                <li><a data-toggle="modal" data-target="#areDeveloping">安全配置</a></li>
                <li role="separator" class="divider"></li>
                <li class="disabled"><a>扩展设置</a></li>
            </ul>
        </li>
    </ul>
</aside>