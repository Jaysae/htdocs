<div class="widget widget_search">
    <form class="navbar-form" action="search.php" method="post">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off">
            <span class="input-group-btn">
                <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
            </span> </div>
    </form>
</div>
<div class="widget widget_sentence">
    <h3>「ONE · 一个」</h3>
    <div class="widget-sentence-content">
        <h4 id="Today">2016年01月05日星期二</h4>
        <p id="ONE_word"></p>
    </div>
</div>
<div class="widget widget_hot">
    <h3>热门文章</h3>
    <ul>
        <?php
        for ($i = 0; $i < 10; $i++) {
            ?>
            <li><a href=""><span class="thumbnail"><img class="thumb" data-original="images/excerpt.jpg" src="images/excerpt.jpg" alt=""></span><span class="text">php如何判断一个日期的格式是否正确</span><span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i> <?php echo $i; ?></span></a></li>
        <?php
    }
    ?>
    </ul>
</div>
<script type="text/javascript">
    $(function() {
        var date = new Date;
        var year = date.getFullYear() + "年";
        var month = date.getMonth() + 1;
        month = (month < 10 ? "0" + month : month);
        var Week = ['日', '一', '二', '三', '四', '五', '六'];
        $("#Today").text((year + month + "月" + date.getDate() + "日 星期" + Week[date.getDay()]));
        $("#Today").autotype();
        $.ajax({
            type: "POST",
            url: 'https://api.hibai.cn/api/index/index',
            dataType: 'json',
            data: {
                "TransCode": "030111",
                "OpenId": "123456789",
                "Body": ""
            },
            success: function(result) {
                $("#ONE_word").html(result.Body.word);
                $("#ONE_word").autotype();
                return false;
            }
        });
    });

    $.fn.autotype = function() {
        var $text = $(this);

        var str = $text.html();
        var index = 0;
        var x = $text.html('');

        var timer = setInterval(function() {
            var current = str.substr(index, 1);

            if (current == '<') {
                index = str.indexOf('>', index) + 1;
            } else {
                index++;
            }
            $text.html(str.substring(0, index) + (index & 1 ? '' : '_'));
            index > $text.html().length + 10 && (index = 0);
            if (index >= str.length) {
                clearInterval(timer);
            }
        }, 100);
    };
</script>