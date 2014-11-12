<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
  <script type="text/javascript">
function fitImageSize(obj, href, maxWidth, maxHeight) {
	var image = new Image();

	image.onload = function(){
		
		maxWidth = $("#div2").width();
		maxHeight = $("#div2").height();
		var width = image.width;
		var height = image.height;
		
		var scalex = maxWidth / width;
		var scaley = maxHeight / height;
		
		var scale = (scalex < scaley) ? scalex : scaley;
		if (scale > 1) 
			scale = 1;
		
		obj.width = scale * width;
		obj.height = scale * height;
		
		obj.style.display = "";
	}
	image.src = href;
}
</script>
 </head>
 <body>
원본 이미지 <br />
<img src='../images/jobimg_1.jpg'> <br />
썸네일 이미지 <br />
<img src="../images/jobimg_1.jpg" onload="javascript:fitImageSize(this, '../images/jobimg_1.jpg', 60, 60);" style="display:none" >
 </body>
</html>