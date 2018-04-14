<?php

namespace App;
class huonghuong{
static function createToken(){
    $string = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
    $length = strlen($string);
    $token = '';
    for($i=0; $i<30;$i++){
        $token .= substr($string,rand(0,$length),1);
    }
    return $token;
}
function stripUnicode($str){
        if(!$str) return false;
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Á|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd' => 'đ',
            'D' => 'Đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        foreach($unicode as $khongdau=>$codau){
            $arr = explode("|", $codau);
            $str = str_replace($arr,$khongdau,$str);
        }
        return $str;
    }
function changeTitle($str){
        $str = trim($str);
        if($str=="") return "";
        $str = str_replace('"', '', $str);
        $str = str_replace("'", '', $str);
        $str = $this->stripUnicode($str);
        $str = mb_convert_case($str, MB_CASE_LOWER,'utf-8');
        $str = str_replace(' ', '-', $str);
        return $str;
    }
//echo createToken();
}
//TrEvL0EX6F8urOzAw44Gg6bPllR1Dj
?>