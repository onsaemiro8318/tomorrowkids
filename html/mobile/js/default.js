function txt_focus(t)
{	
	t.style.border="1px solid #ffa800";
	t.style.paddingRight="0px";
	t.style.paddingTop="0px";
	t.style.paddingBottom="0px";
	
}

function txt_warn(t)
{	
	t.style.border="1px solid #fb0000";
	t.style.paddingRight="0px";
	t.style.paddingTop="0px";
	t.style.paddingBottom="0px";
	
}


function txt_blur(t)
{
	t.style.border="1px solid #cccccc";
	t.style.paddingRight="0px";
	t.style.paddingTop="0px";
	t.style.paddingBottom="0px";

}

/* 디바이스별 viewport */

	//target-densitydpi=device-dpi, medium-dpi , high-dpi;
	var agent = navigator.userAgent;
	
	if (agent.match(/iPhone/) != null || agent.match(/iPod/) != null) {
		document.write('<meta name="viewport" content="width=device-width, initial-scale=0.4, minimum-scale=0.4, maximum-scale=4.0, user-scalable=no" />');
	}else if(agent.match(/Windows CE/) != null || agent.match(/Windows Phone/) != null) {
		document.write('<meta name="viewport" content="width=device-width, initial-scale=0.75, minimum-scale=0.75, maximum-scale=3.0, user-scalable=no" />');
	}else if (agent.match(/Android/) != null ) {
		if( navigator.userAgent.match('IM-A800S')){
		//스카이 베가 LTE
			document.write('<meta name="viewport" content="width=device-width, initial-scale=0.87, minimum-scale=0.87, maximum-scale=3.0, user-scalable=no, target-densitydpi=device-dpi" />');
		}else if( navigator.userAgent.match('LG-F240K')){
		//LG 옵티머스K 프로
			document.write('<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=3.0, user-scalable=no, target-densitydpi=medium-dpi" />');
		}else if( navigator.userAgent.match('LG-F320')){
		//LG G2
			document.write('<meta name="viewport" content="width=640,initial-scale=0.5, minimum-scale=0.5, maximum-scale=3.0, user-scalable=no, target-densitydpi=device-dpi" />');
		}else if( navigator.userAgent.match('SHV-E170')){
		//갤럭시 R
			document.write('<meta name="viewport" content="width=device-width, initial-scale=0.85, minimum-scale=0.85, maximum-scale=3.0, user-scalable=no, target-densitydpi=device-dpi" />');
		}else if( navigator.userAgent.match('SHW-M250')){
		//갤럭시S2
			document.write('<meta name="viewport" content="width=640, initial-scale=0.75, minimum-scale=0.75, maximum-scale=3.0, user-scalable=no, target-densitydpi=device-dpi" />');
		}else if( navigator.userAgent.match('SHV-E210') || navigator.userAgent.match('SHW-M440')){
		//갤럭시S3
			document.write('<meta name="viewport" content="width=720, initial-scale=1.10, minimum-scale=1.10, maximum-scale=3.0, user-scalable=no, target-densitydpi=device-dpi" />');
		}else if( navigator.userAgent.match('SHV-E300')){
		//갤럭시S4
			document.write('<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=3.0, user-scalable=no, target-densitydpi=high-dpi" />');
		}else if( navigator.userAgent.match('SM-G906')){
		//갤럭시S5
			document.write('<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=3.0, user-scalable=no, target-densitydpi=device-dpi" />');
		}else if( navigator.userAgent.match('SM-G900')){
		//갤럭시S5
			document.write('<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5, user-scalable=no, target-densitydpi=high-dpi" />');
		}else if( navigator.userAgent.match('SM-G900S')){
		//갤럭시S5
			document.write('<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, maximum-scale=0.5, user-scalable=no, target-densitydpi=high-dpi" />');
		}else if( navigator.userAgent.match('SHV-E160')){
		//갤럭시 노트1
			document.write('<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=3.0, user-scalable=no, target-densitydpi=device-dpi" />');
		}else if(navigator.userAgent.match('SHV-E250')){
		//갤럭시 노트2
			document.write('<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=3.0, user-scalable=no, target-densitydpi=device-dpi" />');
			//document.write('<meta name="viewport" content="width=640, initial-scale=0.75, minimum-scale=0.75, maximum-scale=0.75, user-scalable=no, target-densitydpi=device-dpi" />');
		}else if(navigator.userAgent.match('SM-N900')){
		//갤럭시 노트3
			document.write('<meta name="viewport" content="width=device-width, initial-scale=1.5, minimum-scale=1.5, maximum-scale=3.0, user-scalable=no, target-densitydpi=device-dpi" />');
			//alert(navigator.userAgent);
		}else if( navigator.userAgent.match('D1-730HD')){
		//Nexus 7
			document.write('<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, target-densitydpi=high-dpi" />');
		}else{
			document.write('<meta name="viewport" content="width=device-width, initial-scale=0.75, minimum-scale=0.75, maximum-scale=3.0, user-scalable=no, target-densitydpi=device-dpi" />');
		}

	}else {
		document.write('<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.75, maximum-scale=3.0, user-scalable=no" />');
	}
	
	//alert(screen.height);
	viewPortStr = "'user-scalable=no, initial-scale=0.5, maximum-scale=3.0, minimum-scale=0.5, width="+screen.width+", height="+screen.height+"'";
	//$('#viewport').attr('content', viewPortStr ); 



//버튼롤오버
$(function() {

    $(".userArea a img").mouseenter(function() {

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_on.png");

    }).mouseleave(function(){

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_off.png");

    });

    $(".lecBtn a img").mouseenter(function() {

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_on.png");

    }).mouseleave(function(){

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_off.png");

    });

    $(".applyBtn a img").mouseenter(function() {

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_on.png");

    }).mouseleave(function(){

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_off.png");

    });

    $(".lecSubject a img").mouseenter(function() {

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_on.png");

    }).mouseleave(function(){

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_off.png");

    });

    $("#lecBtnArea li a img").mouseenter(function() {

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_on.png");

    }).mouseleave(function(){

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_off.png");

    });

    $(".recList li a img").mouseenter(function() {

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_on.png");

    }).mouseleave(function(){

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_off.png");

    });

    $(".btnSetrecord li a img").mouseenter(function() {

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_on.png");

    }).mouseleave(function(){

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_off.png");

    });

    $(".stBtnArea a img").mouseenter(function() {

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_on.png");

    }).mouseleave(function(){

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_off.png");

    });

    $(".corrSec a img").mouseenter(function() {

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_on.png");

    }).mouseleave(function(){

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_off.png");

    });

    $(".endingArea a img").mouseenter(function() {

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_on.png");

    }).mouseleave(function(){

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_off.png");

    });

    $(".voiceBtn a img").mouseenter(function() {

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_on.png");

    }).mouseleave(function(){

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_off.png");

    });

    $(".btnCancelArea a img").mouseenter(function() {

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_on.png");

    }).mouseleave(function(){

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_off.png");

    });

    $(".startBtn a img").mouseenter(function() {

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_on.png");

    }).mouseleave(function(){

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_off.png");

    });

    $(".selSec a img").mouseenter(function() {

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_on.png");

    }).mouseleave(function(){

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_off.png");

    });

    $(".btnLoginArea a img").mouseenter(function() {

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_on.png");

    }).mouseleave(function(){

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_off.png");

    });

    $(".btnFindArea a img").mouseenter(function() {

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_on.png");

    }).mouseleave(function(){

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_off.png");

    });

    $(".registBtnArea a img").mouseenter(function() {

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_on.png");

    }).mouseleave(function(){

        $(this).attr("src", "images/btn/"+$(this).attr("name")+"_off.png");

    });

});


/* 슬라이드 */

 jQuery(document).ready(function ($) {
            //Reference http://www.jssor.com/development/slider-with-caption.html
            //Reference http://www.jssor.com/development/reference-ui-definition.html#captiondefinition
            //Reference http://www.jssor.com/development/tool-caption-transition-viewer.html

            var _CaptionTransitions = [
				];

            var options = {
                $AutoPlay: false,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
                    $Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
                    $CaptionTransitions: _CaptionTransitions,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
                    $PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
                    $PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
                },

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 0,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 10,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 10,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                },

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                }
            };
            var jssor_slider1 = new $JssorSlider$("slider1_container", options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$SetScaleWidth(Math.min(parentWidth, 449));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }

			var jssor_slider2 = new $JssorSlider$("slider1_container", options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider2.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider2.$SetScaleWidth(Math.min(parentWidth, 508));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }


            //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
            //    $(window).bind("orientationchange", ScaleSlider);
            //}
            //responsive code end
        });