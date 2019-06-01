    <!--查看评论模态框-->
    <div class="modal fade" id="seeComment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">查看评论</h4>
                </div>
                <div class="modal-body">
                    <table class="table" style="margin-bottom:0px;">
                        <thead>
                            <tr> </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td wdith="20%">评论ID:</td>
                                <td width="80%" class="see-comment-id"></td>
                            </tr>
                            <tr>
                                <td wdith="20%">评论页面:</td>
                                <td width="80%" class="see-comment-page"></td>
                            </tr>
                            <tr>
                                <td wdith="20%">评论内容:</td>
                                <td width="80%" class="see-comment-content"></td>
                            </tr>
                            <tr>
                                <td wdith="20%">IP:</td>
                                <td width="80%" class="see-comment-ip"></td>
                            </tr>
                            <tr>
                                <td wdith="20%">所在地:</td>
                                <td width="80%" class="see-comment-address"></td>
                            </tr>
                            <tr>
                                <td wdith="20%">系统:</td>
                                <td width="80%" class="see-comment-system"></td>
                            </tr>
                            <tr>
                                <td wdith="20%">浏览器:</td>
                                <td width="80%" class="see-comment-browser"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr></tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">朕已阅</button>
                </div>
            </div>
        </div>
    </div>
    <!--增加用户模态框-->
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel">
        <div class="modal-dialog" role="document" style="max-width:450px;">
            <form action="/User/add" method="post" autocomplete="off" draggable="false">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">增加用户</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table" style="margin-bottom:0px;">
                            <thead>
                                <tr> </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td wdith="20%">姓名:</td>
                                    <td width="80%"><input type="text" value="" class="form-control" name="truename" maxlength="10" autocomplete="off" /></td>
                                </tr>
                                <tr>
                                    <td wdith="20%">用户名:</td>
                                    <td width="80%"><input type="text" value="" class="form-control" name="username" maxlength="10" autocomplete="off" /></td>
                                </tr>
                                <tr>
                                    <td wdith="20%">电话:</td>
                                    <td width="80%"><input type="text" value="" class="form-control" name="usertel" maxlength="13" autocomplete="off" /></td>
                                </tr>
                                <tr>
                                    <td wdith="20%">新密码:</td>
                                    <td width="80%"><input type="password" class="form-control" name="password" maxlength="18" autocomplete="off" /></td>
                                </tr>
                                <tr>
                                    <td wdith="20%">确认密码:</td>
                                    <td width="80%"><input type="password" class="form-control" name="new_password" maxlength="18" autocomplete="off" /></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr></tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--用户信息模态框-->
    <div class="modal fade" id="seeUser" tabindex="-1" role="dialog" aria-labelledby="seeUserModalLabel">
        <div class="modal-dialog" role="document" style="max-width:450px;">
            <form action="/User/update" method="post" autocomplete="off" draggable="false">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">修改用户</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table" style="margin-bottom:0px;">
                            <thead>
                                <tr> </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td wdith="20%">姓名:</td>
                                    <td width="80%"><input type="text" value="" class="form-control" id="truename" name="truename" maxlength="10" autocomplete="off" /></td>
                                </tr>
                                <tr>
                                    <td wdith="20%">用户名:</td>
                                    <td width="80%"><input type="text" value="" class="form-control" id="username" name="username" maxlength="10" autocomplete="off" /></td>
                                </tr>
                                <tr>
                                    <td wdith="20%">电话:</td>
                                    <td width="80%"><input type="text" value="" class="form-control" id="usertel" name="usertel" maxlength="13" autocomplete="off" /></td>
                                </tr>
                                <tr>
                                    <td wdith="20%">旧密码:</td>
                                    <td width="80%"><input type="password" class="form-control" name="old_password" maxlength="18" autocomplete="off" /></td>
                                </tr>
                                <tr>
                                    <td wdith="20%">新密码:</td>
                                    <td width="80%"><input type="password" class="form-control" name="password" maxlength="18" autocomplete="off" /></td>
                                </tr>
                                <tr>
                                    <td wdith="20%">确认密码:</td>
                                    <td width="80%"><input type="password" class="form-control" name="new_password" maxlength="18" autocomplete="off" /></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr></tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="userid" value="" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--个人信息模态框-->
    <div class="modal fade" id="seeUserInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">个人信息</h4>
                </div>
                <div class="modal-body">
                    <table class="table" style="margin-bottom:0px;">
                        <thead>
                            <tr> </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td wdith="20%">用户名:</td>
                                <td width="80%"><input type="text" value="<?php echo $username ?>" class="form-control" name="username" maxlength="10" autocomplete="off" /></td>
                            </tr>
                            <tr>
                                <td wdith="20%">旧密码:</td>
                                <td width="80%"><input type="password" class="form-control" name="old_password" maxlength="18" autocomplete="off" /></td>
                            </tr>
                            <tr>
                                <td wdith="20%">新密码:</td>
                                <td width="80%"><input type="password" class="form-control" name="password" maxlength="18" autocomplete="off" /></td>
                            </tr>
                            <tr>
                                <td wdith="20%">确认密码:</td>
                                <td width="80%"><input type="password" class="form-control" name="new_password" maxlength="18" autocomplete="off" /></td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="InfoTips" style="text-align: right;display: none"> <i class=" fa fa-spin fa-circle-o-notch"></i> 警告：提交成功后，您将会被强制退出！</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary" id="UserInfoButton">提交</button>
                </div>
            </div>
        </div>
    </div>
    <!--个人登录记录模态框-->
    <div class="modal fade" id="seeUserLoginlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">登录记录</h4>
                </div>
                <div class="modal-body">
                    <table class="table" style="margin-bottom:0px;">
                        <thead>
                            <tr>
                                <th>登录IP</th>
                                <th>登录时间</th>
                                <th>状态</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>::1:55570</td>
                                <td>2016-01-08 15:50:28</td>
                                <td>成功</td>
                            </tr>
                            <tr>
                                <td>::1:64377</td>
                                <td>2016-01-08 10:27:44</td>
                                <td>成功</td>
                            </tr>
                            <tr>
                                <td>::1:64027</td>
                                <td>2016-01-08 10:19:25</td>
                                <td>成功</td>
                            </tr>
                            <tr>
                                <td>::1:57081</td>
                                <td>2016-01-06 10:35:12</td>
                                <td>成功</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">朕已阅</button>
                </div>
            </div>
        </div>
    </div>
    <!--微信二维码模态框-->
    <div class="modal fade user-select" id="WeChat" tabindex="-1" role="dialog" aria-labelledby="WeChatModalLabel">
        <div class="modal-dialog" role="document" style="margin-top:120px;max-width:280px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="WeChatModalLabel" style="cursor:default;">扫一扫</h4>
                </div>
                <div class="modal-body" style="text-align:center"> <img src="/images/weixin.png" width="200" height="200" style="cursor:pointer" /> </div>
            </div>
        </div>
    </div>
    <!--提示模态框-->
    <div class="modal fade user-select" id="areDeveloping" tabindex="-1" role="dialog" aria-labelledby="areDevelopingModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="areDevelopingModalLabel" style="cursor:default;">该功能正在日以继夜的开发中…</h4>
                </div>
                <div class="modal-body"> <img src="images/baoman/baoman_01.gif" alt="深思熟虑" />
                    <p style="padding:15px 15px 15px 100px; position:absolute; top:15px; cursor:default;">很抱歉，程序猿正在日以继夜的开发此功能，本程序将会在以后的版本中持续完善！</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">朕已阅</button>
                </div>
            </div>
        </div>
    </div>
    <!--注销提示模态框-->
    <div class="modal fade user-select" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="logoutModalLabel" style="cursor:default;">提示</h4>
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

    <!--删除提示模态框-->
    <div class="modal fade user-select" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="deleteModalLabel" style="cursor:default;">提示</h4>
                </div>
                <div class="modal-body">
                    <p style="padding:15px; cursor:default;" id="deleteModalContent">此操作不可逆，是否确认？</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary" id="deleteButton">确认</button>
                </div>
            </div>
        </div>
    </div>

    <!--公告模态框-->
    <div class="modal fade user-select" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="noticeModalLabel">
        <div class="modal-dialog" role="document" style="max-width:450px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="noticeModalLabel" style="cursor:default;">公告</h4>
                </div>
                <div class="modal-body">
                    <table class="table" style="margin-bottom:0px;">
                        <thead>
                            <tr> </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td wdith="20%">ID:</td>
                                <td width="80%"><input type="text" value="1" disabled="disabled" class="form-control" name="noticeID" autocomplete="off" /></td>
                            </tr>
                            <tr>
                                <td wdith="20%">内容:</td>
                                <td width="80%">
                                    <textarea type="text" class="form-control" name="noticeContent" autocomplete="off" maxlength="20"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td wdith="20%">日期:</td>
                                <td width="80%"><input type="text" value="<?php echo date("Y-m-d") ?>" disabled="disabled" class="form-control" name="noticeDate" autocomplete="off" /></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr></tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary" id="noticeButton">确认</button>
                </div>
            </div>
        </div>
    </div>
    <!--栏目模态框-->
    <div class="modal fade user-select" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel">
        <div class="modal-dialog" role="document" style="max-width:450px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="categoryModalLabel" style="cursor:default;">栏目</h4>
                </div>
                <div class="modal-body">
                    <table class="table" style="margin-bottom:0px;">
                        <thead>
                            <tr> </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td wdith="20%">ID:</td>
                                <td width="80%"><input type="text" value="1" disabled="disabled" class="form-control" name="categoryID" autocomplete="off" /></td>
                            </tr>
                            <tr>
                                <td wdith="20%">名称:</td>
                                <td width="80%">
                                    <input type="text" class="form-control" name="categoryName" autocomplete="off" maxlength="6" />
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr></tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary" id="categoryButton">确认</button>
                </div>
            </div>
        </div>
    </div>
    <!--右键菜单列表-->
    <div id="rightClickMenu">
        <ul class="list-group rightClickMenuList">
            <li class="list-group-item disabled">欢迎访问异清轩博客</li>
            <li class="list-group-item"><span>IP：</span>172.16.10.129</li>
            <li class="list-group-item"><span>地址：</span>河南省郑州市</li>
            <li class="list-group-item"><span>系统：</span>Windows10 </li>
            <li class="list-group-item"><span>浏览器：</span>Chrome47</li>
        </ul>
    </div>
    <script src="/js/bootstrap.min.js"></script>
    <script src="js/admin-scripts.js"></script>
    <script src="/js/iziToast.min.js"></script>
    <div class="iziToast-wrapper iziToast-wrapper-bottomLeft"></div>
    <div class="iziToast-wrapper iziToast-wrapper-bottomRight"></div>
    <div class="iziToast-wrapper iziToast-wrapper-topLeft"></div>
    <div class="iziToast-wrapper iziToast-wrapper-topRight"></div>
    <div class="iziToast-wrapper iziToast-wrapper-bottomCenter"></div>
    <div class="iziToast-wrapper iziToast-wrapper-topCenter"></div>
    <?php
    function showLoginToast()
    {
        if (isset($_SESSION['showAdminToast']) && isset($_SESSION['login']) && $_SESSION['showAdminToast'] && $_SESSION['login']) {
            $_SESSION['showToast'] = false;
            $_SESSION['showAdminToast'] = false;
            return "1";
        } else return "0";
    }
    ?>
    <script type="text/javascript">
        Date.prototype.Format = function(fmt) {
            var o = {
                "M+": this.getMonth() + 1,
                "d+": this.getDate(),
                "h+": this.getHours(),
                "m+": this.getMinutes(),
                "s+": this.getSeconds(),
                "q+": Math.floor((this.getMonth() + 3) / 3),
                "S": this.getMilliseconds()
            };
            if (/(y+)/.test(fmt))
                fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
            for (var k in o)
                if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
            return fmt;
        }
        $('.disabled a,nav .active a').click(function(event) {
            event.preventDefault();
        });
        $(function() {
            if (<?php echo showLoginToast() ?>) {
                $("#Login").autotype();
                iziToast.success({
                    title: '<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "" ?>',
                    message: '尊敬的管理员，欢迎回来！',
                    position: 'bottomRight',
                    transitionIn: 'bounceInLeft',
                    zindex: 1100,
                    pauseOnHover: false,
                });
            }
            if ("<?php echo $Toast ?>" == "NewTitle") {
                $("#Login").autotype();
                var mes = "<?php echo $title ?>";
                if (mes.length > 10) {
                    mes = mes.substring(0, 10) + "...";
                }
                iziToast.success({
                    title: '成功',
                    message: '文章 ' + mes + ' 已成功添加',
                    position: 'bottomRight',
                    transitionIn: 'bounceInLeft',
                    zindex: 1100,
                    pauseOnHover: false,
                });
                <?php $title = "" ?>
            }
        });
        $.fn.autotype = function() {
            var $text = $(this);
            var str = $text.html();
            var index = 0;
            var x = $text.html('');
            var timer = setInterval(function() {
                var current = str.substr(index, 1);
                if (current == '<')
                    index = str.indexOf('>', index) + 1;
                else
                    index++;
                $text.html(str.substring(0, index) + (index & 1 ? '' : '_'));
                index > $text.html().length + 10 && (index = 0);
                if (index >= str.length) {
                    clearInterval(timer);
                }
            }, 100);
        };
        $('#UserInfoButton').click(function() {
            var btn = $(this);
            btn.attr("disabled", true);
            btn.text("3");
            $('#InfoTips').fadeIn();
            setTimeout(function() {
                btn.text("2");
            }, 1000);
            setTimeout(function() {
                btn.text("1");
            }, 2000);
            setTimeout(function() {
                btn.text("再次确认");
                btn.attr("disabled", false);
                btn.unbind("click");
                btn.click(function() {

                })
            }, 3000);
        });
        $('#seeUserInfo').on('hidden.bs.modal', function() {
            $('#InfoTips').fadeOut();
            $('#UserInfoButton').text("提交");
            $('#UserInfoButton').unbind("click");
        })
        $('#deleteModal').on('hidden.bs.modal', function() {
            $('#deleteButton').unbind("click");
        });
        $('#noticeModal').on('hidden.bs.modal', function() {
            $('#noticeButton').unbind("click");
        })
    </script>