/*
 * @Author: Siner
 * @Date: 2018-12-10 10:16:44
 * @Last Modified by: Siner
 * @Last Modified time: 2018-12-12 14:49:33
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