<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Clearbox : &lt;default&gt;</title>
<script type='text/javascript' src='js/clearbox.js'></script>
<style type="text/css">
.container {
			width: 700px;
			height: 100px;
			margin-right:auto;
			margin-left:auto;
			margin-top:20px;
			margin-bottom:5px;
			font-size:11px;
		}
	

.item a img {
float:left;
	padding:3px;
	background-color: #ffffff;
	margin: 5px;
	border:1px solid #cccccc;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
-khtml-border-radius: 3px;
border-radius: 3px;
-moz-box-shadow:0 0 5px rgba(0,0,0,0.45),0px 1px 2px rgba(0,0,0,0.2);
			-webkit-box-shadow:0 0 5px rgba(0,0,0,0.45),0px 1px 2px rgba(0,0,0,0.2);
			box-shadow:0 0 5px rgba(0,0,0,0.45),0px 1px 2px rgba(0,0,0,0.2);	

	filter:alpha(opacity=80);
	-moz-opacity:0.80;
	-khtml-opacity: 0.80;
	opacity: 0.80;
}

.item a:hover img, .item a:active img {
padding:3px;
border:1px solid #cccccc;
filter:alpha(opacity=99);
-moz-opacity:0.99;
-khtml-opacity: 0.99;
opacity: 0.99;
}
		
		.clearfix:after{
		clear:both;
		}
		#inline{
		visibility: hidden;
		color:#444;
		}
</style>
</head>

<body>
<script type="text/javascript">
/*
// 	ClearBox Config File (JavaScript)
*/

var

// CB layout:

	CB_MinWidth=300,				// minimum (only at images) or initial width of CB window
	CB_MinHeight=300,				// initial heigth of CB window
	CB_WinPadd=15,					// padding of the CB window from sides of the browser 
	CB_ImgBorder=3,					// border size around the picture in CB window
	CB_ImgBorderColor='#ffffff',			// border color around the picture in CB window
	CB_Padd=4,					// padding around inside the CB window

	CB_BodyMarginLeft=0,				//
	CB_BodyMarginRight=0,				// if you set margin to <body>,
	CB_BodyMarginTop=0,				// please change these settings!
	CB_BodyMarginBottom=0,				//

	CB_ShowThumbnails='auto',			// it tells CB how to show the thumbnails ('auto', 'always' or 'off') thumbnails are only in picture-mode!
	CB_ThumbsBGColor='#000',			// color of the thumbnail layer
	CB_ThumbsBGOpacity=.35,				// opacity of the thumbnail layer
	CB_ActThumbOpacity=.65,				// thumbnail opacity of the current viewed image

	CB_SlideShowBarColor='#fff',			// color of the slideshow bar
	CB_SlideShowBarOpacity=.6,			// opacity of the slideshow bar
	CB_SlideShowBarPadd=17,				// padding of the slideshow bar (left and right)
	CB_SlideShowBarTop=2,				// position of the slideshow bar from the top of the picture

	CB_SimpleDesign='off',				// if it's 'on', CB doesn't show the frame but only the content - really nice ;)

	CB_CloseBtnTop=-10,				// vertical position of the close button in picture mode
	CB_CloseBtnRight=-14,				// horizontal position of the close button in picture mode
	CB_CloseBtn2Top=-20,				// vertical position of the close button in content mode
	CB_CloseBtn2Right=-30,				// horizontal position of the close button in content mode

	CB_OSD='off',					// turns on OSD
	CB_OSDShowReady='off',				// when clearbox is loaded and ready, it shows an OSD message

// CB font, text and navigation (at the bottom of CB window) settings:

	CB_FontT='helvetica, arial, sans-serif',				//
	CB_FontSizeT=13,				// these variables are referring to the title or caption line
	CB_FontColorT='#777',				// 
	CB_FontWeightT='normal',			//

	CB_FontC='helvetica, arial, sans-serif',				//
	CB_FontSizeC=11,				// these variables are referring to
	CB_FontColorC='#999',				// comment lines under the title
	CB_FontWeightC='normal',			//
	CB_TextAlignC='justify',			//
	CB_txtHCMax=120,				// maximum height of the comment box in pixels

	CB_FontG='helvetica, arial, sans-serif',				//
	CB_FontSizeG=11,				// these variables are referring to the gallery name
	CB_FontColorG='#aaa',				//
	CB_FontWeightG='normal',			//

	CB_PadT=10,					// space in pixels between the content and the title or caption line

	CB_OuterNavigation='off',			// turns outer navigation panel on

	CB_ShowURL='off',				// it shows the url of the content if no title or caption is given
	CB_ItemNum='on',				// it shows the ordinal number of the content in galleries
	CB_ItemNumBracket='()',				// whatever you want ;)

	CB_ShowGalName='on',				// it shows gallery name
	CB_TextNav='on',				// it shows previous and next navigation
	CB_NavTextImgPrvNxt='on',			// it shows previous and next buttons instead of text
	CB_ShowDL='on',					// it shows download controls
	CB_NavTextImgDL='on',				// it shows download buttons instead of text

	CB_ImgRotation='on',				// it shows the image rotation controls
	CB_NavTextImgRot='on',				// it shows the image rotation buttons instead of text

// Settings of the document-hiding layer:

	CB_HideColor='#000000',				// color of the layer
	CB_HideOpacity=.8,				// opacity (0 is invisible, 1 is 100% color) of the layer
	CB_HideOpacitySpeed=400,			// speed of fading
	CB_CloseOnH='on',				// CB will close, if you click on background

// CB animation settings:
	CB_Animation='double',				// 'double', 'normal', 'off', 'grow', 'growinout' or 'warp' (high cpu usage)
	CB_ImgOpacitySpeed=300,				// speed of content fading (in ms)
	CB_TextOpacitySpeed=300,			// speed of text fading under the picture (in ms)
	CB_AnimSpeed=300,				// speed of the resizing animation of CB window (in ms)
	CB_ImgTextFade='on',				// turns on or off the fading of content and text
	CB_FlashHide='off',				// it hides flash animations on the page before CB starts
	CB_SelectsHide='on',				// it hides select boxes on the page before CB starts
	CB_SlShowTime=3000,				// default speed of the slideshow (in sec)
	CB_Preload='on',				// preload neighbour pictures in galleries
	CB_ShowLoading='on'				// 



;
</script>
<div class="container clearfix">

<div class="item"><a rel="clearbox[gallery=Gallery]" href="example/slides/Dancers.jpg" title="Great Wall">
<img class="border" src="example/thumbs/Dancers.jpg" alt="" /></a>
</div>

	<div class="item">
    	<a rel="clearbox[gallery=Gallery]" href="example/slides/Blue Boat.jpg" title="Forbidden City Detail"><img class="border" src="example/thumbs/Blue Boat.jpg" alt="" /></a>
    </div>
	
    <div class="item">
    	<a rel="clearbox[gallery=Gallery]" href="example/slides/Drop.jpg" title="Forbidden City"><img class="border" src="example/thumbs/Drop.jpg" alt="" /></a>
    </div>
	
    <div class="item">
    	<a rel="clearbox[gallery=Gallery]" href="example/slides/Yosemite.jpg" title="Tibetan Prayer Wheels"><img class="border" src="example/thumbs/Yosemite.jpg" alt="" /></a>
    </div>
    
	<div class="item"><a rel="clearbox[gallery=Gallery]" href="example/slides/Yosemite 2.jpg" title="Chinese Stone Carving"><img class="border" src="example/thumbs/Yosemite 2.jpg" alt="" /></a>
    </div>
    
	<div class="item">
      <a rel="clearbox[gallery=Gallery]" href="example/slides/Yosemite 3.jpg" title="Great Wall"><img class="border" src="example/thumbs/Yosemite 3.jpg" alt="" /></a>
      </div>
	
	
</div>



<p>
		<div class="container clearfix">
			
            <a rel="clearbox[gallery=Gallery]" href="example/include-short.html" title="Ajax" >
        	<img  src="example/no_iframe.gif" alt="Ajax" />
        	</a>
             
             <a rel="clearbox[gallery=Gallery,,width=600,,height=400]" href="http://www.idscrm.com" title="Iframe">
             <img  src="example/no_iframe.gif" alt="Iframe" />
             </a>
             
             <a href="htmlcontent" rel="clearbox[gallery=Gallery,,width=400,,height=200,,html=&lt;br /&gt;&lt;strong&gt;&lt;font size=&quot;4&quot; color=&quot;#ff7700&quot;&gt;Hi! I am a html formatted text!&lt;/font&gt;&lt;br /&gt;&lt;br /&gt;You can use most of html codes. For more information, please check the 'Professional usage' on www.clearbox.hu!&lt;/strong&gt;,,title=HTML content]">
             <img  src="example/no_html.gif" alt="html content" />
             </a>
             
             <a href="inner#inline" rel="clearbox[gallery=Gallery,,width=400,,height=300,,title=Inner content,,comment=Alike, but not similar to the previous example!]">
             <img src="example/no_inner.gif" alt="inner content" />
             </a>
             
             <a href="example/Flash.swf" rel="clearbox[gallery=Gallery,,width=600,,height=400,,title=Flash content]">
             <img class="fakepic" src="example/no_flash.gif" alt="flash content" />
             </a>
             
             <a href="http://www.youtube.com/v/OtQN-iDfprU" rel="clearbox[gallery=Gallery,,width=700,,height=490,,title=A clearbox 3 preview movie on YouTube,,comment=I uploaded some movies to YouTube from clearbox 3...]">
             <img src="example/no_youtube.gif" alt="youtube movie" />
             </a>
             
             <a href="http://handras.hu/insight/media/insight_960.mov" rel="clearbox[gallery=Gallery,,title=iNSIGHT (http://handras.hu/insight),,comment=This video is a demo shot entirely with Canon's 5D MarkII DSLR camera. It is a six minute three-section video demonstration of a photoshoot and digital image composition process. The video is mainly intended to demonstrate the capabilities of the camera and to share our joy of creation through behind-the-scenes pictures.&lt;br /&gt;&lt;font color=&quot;#ff7700&quot;&gt;QuickTime plugin required!&lt;/font&gt;,,width=960,,height=540]"><img src="example/no_quicktime.gif" alt="quicktime movie" /></a>
             
             <a href="example/test.mp3" rel="clearbox[gallery=Gallery,,tnhrf=nopreview,,width=500,,height=150,,title=MP3 music,,comment=Windows Media Player plugin is required!]"><img src="example/no_winmediamp3.gif" alt="music" /></a>
               
			</div>
		
        <p>
        	<p>
			<a href="http://www.clearbox.hu/index_en.html" title="Clearbox Info" rel="clearbox[height=1000,,width=700]"><img src="example/clearbox.png" alt="Clearbox Info" /></a>
	
    	<div id="inline">
			<h3>Lorem ipsum</h3>
			hell muthafucking yeah
		</div>
        
	</body>
</html>