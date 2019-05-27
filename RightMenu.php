<div class="widget widget_search">
    <form class="navbar-form" action="search.php" method="post">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off" required oninvalid="setCustomValidity('请输入搜索内容')" oninput="setCustomValidity('')">
            <span class="input-group-btn">
                <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
            </span> </div>
    </form>
</div>
<div class="widget widget_sentence">
    <h3>「ONE · 一个」</h3>
    <div class="widget-sentence-content">
        <h4 id="Today">2019年</h4>
        <p id="ONE_word"></p>
    </div>
</div>
<div class="widget widget_hot">
    <h3>热门文章</h3>
    <ul>
        <?php
        $sql = "SELECT * FROM `article` ORDER BY `article`.`view` DESC LIMIT 0,5";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <li><a href=""><span class="thumbnail"><img class="thumb" data-original="<?php echo $row['image'] ?>" src="<?php echo $row['image'] ?>" alt=""></span><span class="text"><?php echo $row['title'] ?></span><span class="muted"><i class="glyphicon glyphicon-time"></i><?php echo $row['date'] ?></span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i><?php echo $row['view'] ?></span></a></li>
            <?php
        }
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
                $("#ONE_word").attr("title", result.Body.word_from);
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