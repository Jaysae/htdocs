/*
 * @Author: Siner
 * @Date: 2018-12-10 10:16:44
 * @Last Modified by: Siner
 * @Last Modified time: 2018-12-18 16:36:02
 */
var V_left_num = 0;
var V_Loop = 0;
function B_S(left_num) {
    var box = document.getElementById("BlockC_Show");
    if (left_num == 0)
        box.style.cssText = "left: 0;"
    else
        box.style.cssText = "left: " + left_num + "px;"
    V_left_num = left_num;
    V_Loop = 2;
}
function B_S_Q(T_or_F) {
    var box = document.getElementById("BlockC_Show");
    if (T_or_F == 1) {
        if (V_left_num == 0) {
            box.style.cssText = "left: 0;"
            return;
        }
        else
            V_left_num += 700;
    } else {
        if (V_left_num == -3500) {
            box.style.cssText = "left: -3500px;"
            return;
        }
        else
            V_left_num -= 700;
    }
    V_Loop = 2;
    box.style.cssText = "left: " + V_left_num + "px;"
}
function B_S_Loop() {
    var box = document.getElementById("BlockC_Show");
    if (V_Loop != 2) {
        if (V_left_num == -3500) {
            V_Loop = 1;
            V_left_num += 700;
            box.style.cssText = "left: " + V_left_num + "px;"
        } else if (V_left_num == 0) {
            V_Loop = 0;
            V_left_num -= 700;
            box.style.cssText = "left: " + V_left_num + "px;"
        } else if (V_Loop == 1) {
            V_left_num += 700;
            box.style.cssText = "left: " + V_left_num + "px;"
        } else if (V_Loop == 0) {
            V_left_num -= 700;
            box.style.cssText = "left: " + V_left_num + "px;"
        }
    }
}
var V_Loop_Task = window.setInterval(B_S_Loop, 3000);
function B_S_Out() {
    V_Loop = 0;
}

var V_ss = new Date();
var V_Year = V_ss.getFullYear();
var V_Month = V_ss.getMonth() + 1;
var V_Day = V_ss.getDate();
var V_All_Day = 0;
function clearAll() {
    var V_Date_Row = document.getElementById("BlockC_Left_Day");
    var V_Child = document.getElementsByClassName("BlockC_Left_Everyday");
    var V_Length = V_Child.length;
    for (var i = 7; i < V_Length; i++) {
        V_Date_Row.removeChild(V_Child[7]);
    }
}
function Month_Day() {
    document.getElementById("BlockC_Left_Month").innerHTML =
        "<span>·</span>" + V_YearToChinese(V_Year.toString()) + "年&nbsp;" + V_MonthToChinese(V_Month.toString()) + "月" + "<span>·</span>";
}

function Month() {
    if (V_Month !== 2) {
        if (V_Month === 4 || V_Month === 6 || V_Month === 9 || V_Month === 11)
            V_All_Day = 30;
        else
            V_All_Day = 31;
    }
    else {
        if (V_Year % 4 === 0 && V_Year % 100 !== 0 || V_Year % 400 === 0)
            V_All_Day = 29;
        else
            V_All_Day = 28;
    }
}
function Day() {
    Month_Day();
    Month();
    var V_First_Day = new Date(V_Year, V_Month - 1, 1);
    var V_Week = V_First_Day.getDay();
    var V_Date_Row = document.getElementById("BlockC_Left_Day");
    if (V_Week !== 0) {
        for (var i = 0; i < V_Week; i++) {
            var V_DayElement = document.createElement("div");
            V_DayElement.className = "BlockC_Left_Everyday";
            V_DayElement.innerHTML = "";
            V_Date_Row.appendChild(V_DayElement);
        }
    }
    for (var j = 1; j <= V_All_Day; j++) {
        var V_DayElement = document.createElement("div");
        V_DayElement.className = "BlockC_Left_Everyday";
        V_DayElement.innerHTML = j;
        if (V_Day === j)
            V_DayElement.style.cssText = "background: #0066FF;border-radius: 50%;"
        V_Date_Row.appendChild(V_DayElement);
    }
    var R = 4
    var V_Text = ["哼！给老娘滚", "喔唷宝宝的小心脏哟", "狗子都是人类最好的朋友", "狗：算了算了，消消气"];
    var R = Math.floor(Math.random() * R);
    document.getElementById("V_Gif_Font").innerText = V_Text[R];
    R++;
    document.getElementById("V_Gif").src = "./img/gif" + R + ".gif";
}

/**
 * 将阿拉伯数字年转为汉字
 * @param {*} Num 数字字符串
 * @returns 汉字字符串
 */
function V_YearToChinese(Num) {
    var Re = "";
    var Chinese = ["〇", "一", "二", "三", "四", "五", "六", "七", "八", "九"]
    for (var i = 0; i < Num.length; i++) {
        for (var j = 0; j <= 9; j++) {
            if (Num[i] == j) {
                Re = Re + Chinese[j];
            }
        }
    }
    return Re;
}

/**
 * 将阿拉伯数字月转为汉字
 * @param {*} Num 数字字符串
 * @returns 汉字字符串
 */
function V_MonthToChinese(Num) {
    if (Num.length == 1)
        return V_YearToChinese(Num);
    else if (Num == "10")
        return "十";
    else if (Num == "11")
        return "十一";
    else
        return "十二";
}
var V_Box_Num = 16;
var V_Box_text = [
    "我没有双手，但是我还有嘴巴，我可以用嘴写字，用嘴唱歌……”说这些话的是被称为“独臂哥”的赵亚全。",
    "韩国华川举行华川鳟鱼庆典盛大开幕，游客凿冰捞鱼。一个小男孩下水抓到鱼后难掩兴奋，一口咬住大鱼，高举双臂，以示胜利。",
    "2018秋冬米兰时装周Gucci 品牌秀场在“手术室”举行，一名模特走秀时，手里拿1:1还原头部，画面紧张又诡异。",
    "日本茨城，Yoichi Suzuki 用索尼 AIBO 机器狗陪伴卧床的母亲。在日本，很多养老院的居民更喜欢机器人，许多疗养院会采用多种不同功能的机器人进行老人看护工作。",
    "在玻利维亚拉巴斯郊区的哈瓦那酒店，一名“Cholita”女选手在摔跤课上以绝对的优势压制住对手。“Cholita”是对一些安第斯地区原住民后代女性的称呼。",
    "俄罗斯克拉斯诺亚尔斯克，一只英国蓝猫被一间公寓的水族箱折射的光线照亮，秒变“彩虹猫”。",
    "英国伍德布里奇公园，首席试飞员兼科技创业公司“重力工业”（Gravity Industries）首席执行官理查德·布朗宁身着喷气服，进行演示飞行，如空中走“凌波微步”。",
    "西班牙格索举办的国际摄影展，印有美国总统特朗普脑袋的充气装置深受看展观众的青睐，民众光着脚在上面跳跃玩耍。",
    "美国纽约的挑战者阿什丽塔·福尔曼用肚子当菜板，挑战一分钟内在肚子上切西瓜，以数量取胜，最终拿下属于他的吉尼斯世界纪录。",
    "在英国格拉斯哥举办的2018年欧洲游泳锦标赛上，德国选手珍妮·曼辛（Jenny Mensing）热身时将咖啡杯稳稳地顶在额头上。",
    "俄罗斯克拉斯诺雅茨克的斑马线，在左边画上了斑马的尾部，又在右边画上了斑马的头部，这才是名副其实的“斑马”线。",
    "英国古德伍德老式赛车会举行，孩子们参加脚踏汽车比赛。",
    "沙特阿拉伯的养蜂人 Zuhair Fatani挑战用身体吸引100公斤蜜蜂，希望打破身体上最重的蜜蜂“外套”纪录。最后，因蜂王的飞走导致大量雄峰无法被吸引过来而以失败告终。",
    "法国兰斯，退役短跑运动员博尔特在一架经过特殊改装的飞机上体验零重力空间，他还俏皮地摆了个“奔跑”的pose。",
    "英国彭布罗克郡，一只大西洋海豹幼崽躺在海边礁石上，将爪子遮脸，上演“没脸看”。",
    "瑞士埃斯塔瓦耶，瑞士一家名为青蛙博物馆举行奇特的展览，108只青蛙标本惟妙惟肖地模仿人们日常生活场景。",
    "在山东省青岛市西部的海岸线上，有一座白色的半球形建筑，名叫“海上皇宫”，它毗邻青岛火车站和著名的栈桥景区，是青岛最著名的的标志性景观之一。这里曾是青岛的高级娱乐场所，是一座海面上的餐饮娱乐总汇，曾盛极一时，前去消费的多是高收入者。然而，就是这座青岛的地标建筑，却已经“荒废”了16年。日前，青岛市城乡建设委员会透露，海上皇宫文旅综合体项目装修工程于近日办理了施工许可手续。"
]

function V_Box_img() {
    var V_img_Num = 0;
    for (var i = 0; i <= V_Box_Num; i++) {
        V_img_Num = i + 1;
        document.getElementById("BlockD").innerHTML += "<div class=\"BlockD_item\"> <img src=\"./img/box/" +
            V_img_Num
            + ".jpg\" /><p>" +
            V_Box_text[i]
            + "</p></div>"
    }
}