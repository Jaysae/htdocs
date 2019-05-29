<footer class="footer">
  <div class="container">
    <p>&copy; 2019 <a href="">scmanga.cn</a> &nbsp;
      <!-- <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">豫ICP备20151109-1</a> &nbsp; -->
      <!-- <a href="sitemap.xml" target="_blank" class="sitemap">网站地图</a> -->
    </p>
  </div>
  <div id="gotop"><a class="gotop"></a></div>
</footer>
<!--微信二维码模态框-->
<div class="modal fade user-select" id="WeChat" tabindex="-1" role="dialog" aria-labelledby="WeChatModalLabel">
  <div class="modal-dialog" role="document" style="margin-top:120px;max-width:280px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="WeChatModalLabel" style="cursor:default;">微信扫一扫</h4>
      </div>
      <div class="modal-body" style="text-align:center;cursor:pointer"> <img src="/images/weixin.png" alt="" width="200px" height="200" /> </div>
    </div>
  </div>
</div>
<!--该功能正在日以继夜的开发中-->
<div class="modal fade user-select" id="areDeveloping" tabindex="-1" role="dialog" aria-labelledby="areDevelopingModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="areDevelopingModalLabel" style="cursor:default;">该功能正在日以继夜的开发中…</h4>
      </div>
      <div class="modal-body"> <img src="/images/baoman/baoman_01.gif" alt="深思熟虑" />
        <p style="padding:15px 15px 15px 100px; position:absolute; top:15px; cursor:default;">很抱歉，程序猿正在日以继夜的开发此功能，本程序将会在以后的版本中持续完善！</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">朕已阅</button>
      </div>
    </div>
  </div>
</div>
<!--公告模态框-->
<div class="modal fade user-select" id="noticePopups" tabindex="-1" role="dialog" aria-labelledby="noticePopupsModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="noticePopupsModalLabel" style="cursor:default;">该公告于2019年5月27日发布。</h4>
      </div>
      <div class="modal-body">
        <p style="padding:15px; cursor:default;" id="noticePopupsModalContent">欢迎访问喵窝博客</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="noticePopupsOff">朕已阅</button>
      </div>
    </div>
  </div>
</div>
<!--注销模态框-->
<div class="modal fade user-select" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="logoutModalLabel" style="cursor:default;">警告</h4>
      </div>
      <div class="modal-body">
        <p style="padding:15px; cursor:default;" id="logoutModalContent">是否退出登录？</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="submit" class="btn btn-primary" id="logoutButton">退出</button>
      </div>
    </div>
  </div>
</div>
<!--登录模态框-->
<div class="modal fade user-select" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- <form action="/" method="post" onsubmit="return check();"> -->
      <form action="/" method="post" id="loginModalForm">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="loginModalLabel">登录</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="loginModalUserName">用户名</label>
            <input type="text" class="form-control" id="loginModalUserName" placeholder="请输入用户名" autofocus maxlength="15" autocomplete="off" required oninvalid="setCustomValidity('请输入用户名')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group">
            <label for="loginModalUserPwd">密码</label>
            <input type="password" class="form-control" id="loginModalUserPwd" placeholder="请输入密码" maxlength="18" autocomplete="off" required oninvalid="setCustomValidity('请输入密码')" oninput="setCustomValidity('')">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="submit" class="btn btn-primary">登录</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--注册模态框-->
<div class="modal fade user-select" id="regModal" tabindex="-1" role="dialog" aria-labelledby="regModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- <form action="/" method="post" onsubmit="return check();"> -->
      <form action="/" method="post" id="regModalForm">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="regModalLabel">注册</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="regModalUserName">用户名</label>
            <input type="text" class="form-control" id="regModalUserName" placeholder="请输入用户名" autofocus maxlength="16" autocomplete="off" required oninvalid="setCustomValidity('请输入用户名')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group">
            <label for="regModalUserPwd">密码</label>
            <input type="password" class="form-control" id="regModalUserPwd" placeholder="请输入密码" maxlength="16" autocomplete="off" required oninvalid="setCustomValidity('请输入密码')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group">
            <label for="regModalUserPwdAgain">确认密码</label>
            <input type="password" class="form-control" id="regModalUserPwdAgain" placeholder="再次输入密码" maxlength="16" autocomplete="off" required oninvalid="setCustomValidity('请输入密码')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group">
            <input type="checkbox" id="regModalProtocol" autocomplete="off" checked>
            <span>我同意 <strong title="总之，您必须勾选“同意用户协议才能成功注册。"><u>用户协议</u></strong></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="submit" class="btn btn-primary" id="reg_btn">注册</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--右键菜单列表-->
<div id="rightClickMenu">
  <ul class="list-group rightClickMenuList">
    <li class="list-group-item disabled">喵窝博客</li>
    <li class="list-group-item"><span>IP：</span>172.16.10.129</li>
    <li class="list-group-item"><span>地址：</span>河南省郑州市</li>
    <li class="list-group-item"><span>系统：</span>Windows10 </li>
    <li class="list-group-item"><span>浏览器：</span>Chrome47</li>
  </ul>
</div>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.ias.js"></script>
<script src="/js/iziToast.min.js"></script>
<script src="/js/scripts.js"></script>
<div class="iziToast-wrapper iziToast-wrapper-bottomLeft"></div>
<div class="iziToast-wrapper iziToast-wrapper-bottomRight"></div>
<div class="iziToast-wrapper iziToast-wrapper-topLeft"></div>
<div class="iziToast-wrapper iziToast-wrapper-topRight"></div>
<div class="iziToast-wrapper iziToast-wrapper-bottomCenter"></div>
<div class="iziToast-wrapper iziToast-wrapper-topCenter"></div>
<?php
function showLoginToast()
{
  if (isset($_SESSION['showToast']) && isset($_SESSION['login']) && $_SESSION['showToast'] && $_SESSION['login']) {
    $_SESSION['showToast'] = false;
    return "1";
  } else return "0";
}
function showLogoutToast()
{
  if (isset($_SESSION['showToast']) && isset($_SESSION['login']) && $_SESSION['showToast'] && !$_SESSION['login']) {
    $_SESSION['showToast'] = false;
    return "1";
  } else return "0";
}
?>
<script type="text/javascript">
  $(function() {
    if (<?php echo showLoginToast() ?>) {
      iziToast.success({
        title: '<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "" ?>',
        message: '欢迎回来喵窝博客~',
        position: 'bottomRight',
        transitionIn: 'bounceInLeft',
        zindex: 1100,
        pauseOnHover: false,
      });
    }
    if (<?php echo showLogoutToast() ?>) {
      iziToast.error({
        title: 'Oh no!',
        message: '您从用户中心断开了连接...',
        position: 'bottomRight',
        transitionIn: 'bounceInLeft',
        zindex: 1100,
        pauseOnHover: false,
      });
    }
  });
</script>