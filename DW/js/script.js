/*
 * @Author: Siner (陈清/1706060203)
 * @Date: 2018-12-25 11:27:06 
 * @Last Modified by:   Siner 
 * @Last Modified time: 2018-12-25 11:27:06 
 */
(function () {
    function a(a, d) { var e = document.getElementsByTagName("head")[0], b = document.createElement("script"); b.type = "text/javascript"; b.src = a; b.onload = b.onreadystatechange = function () { this.readyState && "loaded" !== this.readyState && "complete" !== this.readyState || (d && d(), b.onload = b.onreadystatechange = null, e && b.parentNode && e.removeChild(b)) }; e.insertBefore(b, e.firstChild) } window.BMap = window.BMap || {}; BMap.Convertor = {}; BMap.Convertor.translate = function (f, d, e) {
        var b = "cbk_" + Math.round(1E4 * Math.random()); a("http://api.map.baidu.com/ag/coord/convert?from=" +
            d + "&to=4&x=" + f.lng + "&y=" + f.lat + "&callback=BMap.Convertor." + b); BMap.Convertor[b] = function (a) { delete BMap.Convertor[b]; a = new BMap.Point(a.x, a.y); e && e(a) }
    }
})(); var c = document.getElementById("V_Canvas"), ctx = c.getContext("2d"); ctx.font = "30px Verdana"; var gradient = ctx.createLinearGradient(0, 0, c.width, 0); gradient.addColorStop("0", "#337ab7"); gradient.addColorStop("0.5", "#303030"); gradient.addColorStop("1.0", "#337ab7"); ctx.fillStyle = gradient; ctx.fillText("\u5b9e/\u6218/\u63a8/\u8350", 20, 40);
var map = new BMap.Map("allmap"), longitude, latitude, x = document.getElementById("Map");
navigator.geolocation ? navigator.geolocation.getCurrentPosition(function (a) { longitude = a.coords.longitude; latitude = a.coords.latitude; setTimeout(function () { var a = new BMap.Point(longitude, latitude); BMap.Convertor.translate(a, 0, function (a) { (new BMap.Geocoder).getLocation(a, function (a) { a = a.addressComponents; x.innerText = "\u60a8\u5f53\u524d\u6240\u5728\u4f4d\u7f6e\uff1a" + a.province + " " + a.city + " " + a.district + " " + a.street + " " + a.streetNumber }) }) }, 2E3) }, showError) : x.innerText = "\u60a8\u6240\u4f7f\u7528\u7684\u6d4f\u89c8\u5668\u4e0d\u652f\u6301\u5b9a\u4f4d\u3002";
function showError(a) {
    switch (a.code) {
        case a.PERMISSION_DENIED: x.innerHTML = "\u60a8\u62d2\u7edd\u4e86\u5b9a\u4f4d\u8bf7\u6c42\u3002\u65e0\u6cd5\u83b7\u53d6\u60a8\u7684\u5730\u7406\u4f4d\u7f6e\u4fe1\u606f"; break; case a.POSITION_UNAVAILABLE: x.innerHTML = "\u60a8\u6240\u4f7f\u7528\u7684\u8bbe\u5907\u4e2d\uff0c\u4f4d\u7f6e\u4fe1\u606f\u670d\u52a1\u4e0d\u53ef\u7528"; break; case a.TIMEOUT: x.innerHTML = "\u83b7\u53d6\u60a8\u7684\u5730\u7406\u4f4d\u7f6e\u4fe1\u606f\u65f6\u8d85\u65f6"; break; case a.UNKNOWN_ERROR: x.innerHTML =
            "\u5728\u83b7\u53d6\u60a8\u7684\u5730\u5740\u4f4d\u7f6e\u4fe1\u606f\u65f6\u53d1\u751f\u4e86\u4e00\u4e2a\u672a\u77e5\u9519\u8bef"
    }
} var v_style = 'background-image: url("./images/pic1.jpg")';
setInterval(function () { var a = document.getElementById("background_img"); if (a.style.cssText != v_style) { var f = document.getElementsByClassName("carousel-indicators")[0].getElementsByTagName("li"), d; for (d = 0; d < f.length; d++)if ("active" == f[d].className) { var e = d + 1; v_style = 'background-image: url("./images/pic' + e + '.jpg")'; a.style.cssText = v_style; console.log("A") } } }, 500);
/*
 * @代码混淆：
 * @Author: Siner (陈清/1706060203)
 * @Last Modified time: 2018-12-25 11:27:06
 */