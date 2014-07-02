<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=0.5, user-scalable=0">

<link rel="stylesheet" href="style.css"  />

<title>UDEP TV</title>


<script type="text/javascript" language="javascript"> 
            video_count = 1; 
            function run() { 
                video_count++; 
                var videoPlayer = document.getElementById("homevideo"); 
                if (video_count == 18) 
                    video_count = 1; 
                var nextVideo = "video/video" + video_count + ".mp4"; 
                videoPlayer.src = nextVideo; 
                videoPlayer.load(); 
                videoPlayer.play();        
            }; 
</script> 

<script src="jquery-1.4.2.min.js"></script>

<script>
$(window).load(function(){
		var pages = $('#news li'), current=0;
		var currentPage,nextPage;
		var timeoutID;
		var buttonClicked=0;

		var handler1=function(){
			buttonClicked=1;
			$('#news .button').unbind('click');
			currentPage= pages.eq(current);
			if($(this).hasClass('prevButton'))
			{
				if (current <= 0)
					current=pages.length-1;
				else
					current=current-1;
				nextPage = pages.eq(current);	

				nextPage.css("marginTop",-480);
				nextPage.show();
				nextPage.animate({ marginTop: 0 }, 25000,function(){
					currentPage.hide();
				});
				currentPage.animate({ marginTop: 480 }, 25000,function(){
					$('#news .button').bind('click',handler1);
				});
			}
			else
			{

				if (current >= pages.length-1)
					current=0;
				else
					current=current+1;
				nextPage = pages.eq(current);	

				nextPage.css("marginTop",480);
				nextPage.show();
				nextPage.animate({ marginTop: 0 }, 25000,function(){
				});
				currentPage.animate({ marginTop: -480 }, 25000,function(){
					currentPage.hide();
					$('#news .button').bind('click',handler1);
				});
			}		
		}

		var handler2=function(){
			if (buttonClicked==0)
			{
			$('#news .button').unbind('click');
			currentPage= pages.eq(current);
			if (current >= pages.length-1)
				current=0;
			else
				current=current+1;
			nextPage = pages.eq(current);	
			nextPage.css("marginTop",480);
			nextPage.show();
			nextPage.animate({ marginTop: 0 }, 700,function(){
			});
			currentPage.animate({ marginTop: -480 }, 700,function(){
				currentPage.hide();
				$('#news .button').bind('click',handler1);
			});
			timeoutID=setTimeout(function(){
				handler2();	
			}, 25000);
			}
		}

		$('#news .button').click(function(){
			clearTimeout(timeoutID);
			handler1();
		});

		timeoutID=setTimeout(function(){
			handler2();	
			}, 25000);

});


</script>
        
</head>
<body id="promo">
<header>
	<div class="logo"></div>
    <div class="tagline">Mejores personas. Mejores profesionales.</div>
</header>
<section>
	<article id="udephoy">
		<?php 
			$file = file_get_contents ('udephoy-tv.php'); 
			Echo $file; 
		?> 
	</article>
    
	<video id="homevideo" width="100%" controls="controls" onended="run()"> 
            <source src="video/video1.mp4" type='video/mp4'/>
	</video> 
     
    
</section>
<footer>
	<marquee><a href="#">
		<?php 
			$file = file_get_contents ('marquee-tv.php'); 
			Echo $file; 
		?> 
    </a></marquee>
</footer>



</body>
</html>