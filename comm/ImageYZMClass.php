<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageYZMClass
 *
 * @author PVer
 */
class ImageYZMClass {

    //put your code here
    private $code;

    public function __construct() {
        $this->code = '';
    }

    function getYZM($num = 4) {
        //设置验证码字符集合
        $str = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVW";
        //保存获取的验证码
        $code = '';

        //随机选取字符
        for ($i = 0; $i < $num; $i++) {
            $code .= $str[mt_rand(0, strlen($str) - 1)];
        }
        return $code;
    }

    function getImg() {
        return 'iVBORw0KGgoAAAANSUhEUgAAABgAAAAWCAYAAADafVyIAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyFpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTQyIDc5LjE2MDkyNCwgMjAxNy8wNy8xMy0wMTowNjozOSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDozQTE0MTYzMjI2QTQxMUU4OERBMEQ1MjM2ODhEODc1QyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDozQTE0MTYzMzI2QTQxMUU4OERBMEQ1MjM2ODhEODc1QyI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjNBMTQxNjMwMjZBNDExRTg4REEwRDUyMzY4OEQ4NzVDIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjNBMTQxNjMxMjZBNDExRTg4REEwRDUyMzY4OEQ4NzVDIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+GWezGQAAArFJREFUeNpi/P//PwM2cObMGY2rV6+m/PjxQ+zv378cDEQAQUHBc97e3l18fHz/YGKM2Cx4/vw5R2Ji4negwQykAh0dnff9/f1CMD4TNkUrVqzYRI7hIHDnzh1BZD6GBdevX5fctm2bKwOZQF1d/RUynwVdwbt376SQ+SUlJT7u7u5b8Rm6Y8cO397e3k0gtpWVVR1eHxw/frwHmW9hYbGDkKtPnz7dAmNbWlouBNHp6enfMXwAitx9+/Y5IIuFhIT8ITZ4FBQUfklKSv44cuSI6b179zgePXrEi2JBZ2fn89+/f8P5/Pz8DLy8vHgteP/+PcvXr19hrp8NCwVWVlYGOTm5zygWvH79mh/G5uLiYli4cCETNzf3f3wWtLS0nD948KABNPybQfSJEyfsDA0NH6AEEdBLAq9evWKE8b99+8YQFRX1j5GREafhoKQMzIiwTMagoaHx8sqVKzKfPn0C+aYCxYJVq1ZtRzcAZAmxAGjgbhB97NixZih/HTwVPXz4kG/v3r0WDBQAYPAUQS2IVVNT+yosLPwbbgEwtjUpMZyDg4PB3Nz8CijVPH36lBno+n6UfHD48OEplFhgbGx8Her6DGjw9MEtePnyJTswFZhQYgHQwFJo8qwWExP7r6ys/B5uwaxZs079+/ePbMOZmJjAuf3Dhw/MwHKMH2jZRhR5YO5VocT1ZmZmd4EZ8i/Q9b6goh+WPOGFHTAncpFjMAsLC4OiouK31NRUQ2jwdIEyJzA+bqKo+/LlC4Otre2Vuro6XUp8cvbsWVWg6y9gBCEweV24fPmyzrVr16TINXzZsmXVv379AuWFYnQ5RlAqys/P//HmzRtKPMAgKyv7Z968eawYFoAiBljJsCxdunQtsJJ3+/nzJwspBgNLzb+ampqHEhISvIDlEUbJCxBgACZgIIwoaC7zAAAAAElFTkSuQmCC';
    }

    function vCode($code = '1234', $num = 4, $size = 20, $width = 0, $height = 0) {

        !$width && $width = $num * $size * 4 / 5 + 15;
        !$height && $height = $size + 10;
        //创建验证码画布
        $im = imagecreatetruecolor($width, $height);

        //背景色
        $back_color = imagecolorallocate($im, mt_rand(0, 100), mt_rand(0, 100), mt_rand(0, 100));

        //文本色
        $text_color = imagecolorallocate($im, mt_rand(100, 255), mt_rand(100, 255), mt_rand(100, 255));

        imagefilledrectangle($im, 0, 0, $width, $height, $back_color);


        // 画干扰线
        for ($i = 0; $i < 5; $i++) {
            $font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
            imagearc($im, mt_rand(- $width, $width), mt_rand(- $height, $height), mt_rand(30, $width * 2), mt_rand(20, $height * 2), mt_rand(0, 360), mt_rand(0, 360), $font_color);
        }

        // 画干扰点
        for ($i = 0; $i < 50; $i++) {
            $font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
            imagesetpixel($im, mt_rand(0, $width), mt_rand(0, $height), $font_color);
        }

        //随机旋转角度数组
        $array = array(5, 4, 3, 2, 1, 0, -1, -2, -3, -4, -5);

        // 输出验证码
        // imagefttext(image, size, angle, x, y, color, fontfile, text)
        @imagefttext($im, $size, array_rand($array), 12, $size + 6, $text_color, 'c:\WINDOWS\Fonts\simsun.ttc', $code);
        $_SESSION["VerifyCode"] = $code;
        //no-cache在每次请求时都会访问服务器
        //max-age在请求1s后再次请求会再次访问服务器，must-revalidate则第一发送请求会访问服务器，之后不会再访问服务器
        // header("Cache-Control: max-age=1, s-maxage=1, no-cache, must-revalidate");
//        header("Cache-Control: no-cache");
//        header("Content-type: image/png;charset=gb2312");
        //将图片转化为png格式
        ob_start();
        imagepng($im);
        $data = ob_get_contents();
        ob_end_clean();
        // Check for gd errors / buffer errors
        if (!empty($data)) {

            $data = base64_encode($data);

            // Check for base64 errors
            if ($data !== false) {

                // Success
                // return $data;
                return "<img src='data:image/png;base64,$data'>";
            }
        }
        return '<img>';
        //return $data;
    }

    /**
     * 获取图片的Base64编码(不支持url)
     * @date 2017-02-20 19:41:22
     *
     * @param $img_file 传入本地图片地址
     *
     * @return string
     */
    function imgToBase64($img_file) {

        $img_base64 = '';
        if (file_exists($img_file)) {
            $app_img_file = $img_file; // 图片路径
            $img_info = getimagesize($app_img_file); // 取得图片的大小，类型等
            //echo '<pre>' . print_r($img_info, true) . '</pre><br>';
            $fp = fopen($app_img_file, "r"); // 图片是否可读权限

            if ($fp) {
                $filesize = filesize($app_img_file);
                $content = fread($fp, $filesize);
                $file_content = chunk_split(base64_encode($content)); // base64编码
                switch ($img_info[2]) {           //判读图片类型
                    case 1: $img_type = "gif";
                        break;
                    case 2: $img_type = "jpg";
                        break;
                    case 3: $img_type = "png";
                        break;
                }

                $img_base64 = 'data:image/' . $img_type . ';base64,' . $file_content; //合成图片的base64编码
            }
            fclose($fp);
        }

        return $img_base64; //返回图片的base64
    }

    function getCode() {
        return $this->code;
    }

    function setCode($code) {
        $this->code = $code;
        return $this;
    }

}
