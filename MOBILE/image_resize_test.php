<?php

//이미지 처리 함수 인클루드
//include_once 'lib/image_proc.function.php';

//특정 이미지파일(gif, jpg, png 만 지원)의 경로로 부터 이미지 리소스를 받아온다. 리턴값은 성공시에는 이미지리소스와 이미지 정보가 담긴 배열을 반환, 실패시에는 빈 배열을 반환
function get_image_resource_from_file ($path_file){ 

  if (!is_file($path_file)) {//파일이 아니라면

    $GLOBALS['errormsg'] = $path_file . '은 파일이 아닙니다.';

    return Array();
  }
   
  $size = @getimagesize($path_file);
  if (empty($size[2])) {//이미지 타입이 없다면

    $GLOBALS['errormsg'] = $path_file . '은 이미지 파일이 아닙니다.';

    return Array();
  }

  if ($size[2] != 1 && $size[2] != 2 && $size[2] != 3) {//지원하는 이미지 타입이 아니라면

    $GLOBALS['errormsg'] = $path_file . '은 gif 나 jpg, png 파일이 아닙니다.';

    return Array();
  }

  switch($size[2]){

    case 1 : //gif

      $im = @imagecreatefromgif($path_file);

      break;  

    case 2 : //jpg

      $im = @imagecreatefromjpeg($path_file);

      break;  

    case 3 : //png

      $im = @imagecreatefrompng($path_file);

      break;
  }

  if ($im === false) {//이미지 리소스를 가져오기에 실패하였다면

    $GLOBALS['errormsg'] = $path_file . ' 에서 이미지 리소스를 가져오는 것에 실패하였습니다.';

    return Array();
  }
  else {//이미지 리소스를 가져오기에 성공하였다면

    $return = $size;
    $return[0] = $im;
    $return[1] = $size[0];//너비
    $return[2] = $size[1];//높이
    $return[3] = $size[2];//이미지타입
    $return[4] = $size[3];//이미지 attr

    return $return;
  }
}

$path_file = '../images/jobimg_1.jpg';//원본파일
$path_resizefile = 'sample_image/test_resize.jpg';//리사이즈되어 저장될 파일 경로
$dst_w = 200;//만들어질 이미지의 너비 지정, 픽셀단위의 0이상의 정수를 지정

//이미지 리소스를 받아온다.
list($src, $src_w, $src_h) = get_image_resource_from_file ($path_file);
if (empty($src)) die($GLOBALS['errormsg'] . "<br />\n");

//만들어질 이미지의 높이를 결정한다.
$resize_rule = $dst_w / $src_w;
$dst_h = ceil($resize_rule * $src_h);//소숫점이 나올것을 대비하여 무조건 올림을 한다.

$dst = @imagecreatetruecolor ($dst_w , $dst_h);//만드어질 $dst_w , $dst_h 크기의 이미지 리소스를 생성한다.
if ($dst === false) die("$dst_w , $dst_h 크기의 썸네일 이미지의 리소스를 생성하지 못했습니다.<br />\n");

$result_resize = imagecopyresampled ($dst , $src , 0 , 0 , 0 , 0 , $dst_w , $dst_h , $src_w , $src_h );
if ($result_resize === false) die("리사이즈에 실패하였습니다.<br />\n");

$result_save = save_image_from_resource ($dst, $path_resizefile);//저장
if ($result_save === false) die($GLOBALS['errormsg'] . "<br />\n");

@imagedestroy($src);
@imagedestroy($dst);

//성공하였다면 이미지 출력

?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 <body>
원본 이미지 <br />
<img src='<?=$path_file?>'> <br />
썸네일 이미지 <br />
<img src='<?=$path_resizefile?>'> <br />
 </body>
</html>