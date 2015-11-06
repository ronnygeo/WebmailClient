<?php header("Content-type: text/css; charset: UTF-8"); ?>  

body {
	font-family: Verdana,Helvetica, Arial,  sans-serif;
	font-size: 11px;
    
	<!--/* [disabled]color: #333; "Lucida Grande", 
		background: url(../images/mailbg1.jpg) repeat #d1d5d8;*/ -->
		<?php 
		$v=1;
	if (isset($_COOKIE['theme']))
	$v=$_COOKIE['theme'];
	?>
	background-image: url(../images/mailbg<?php echo $v;?>.jpg) repeat #d1d5d8;
	margin: 0;
	
}

#sitelogo:hover{
background-image:url(../images/shakirologo.png) no-repeat;
margin:auto;

}

body.noscroll {
	/* also avoids bounce effect in Chrome and Safari */
	overflow: hidden;
}

a {
	color: #0069a6;
}

a:visited {
	color: #0186ba;
}

img {
  border: 0;
}

input[type="text"],
input[type="password"],
textarea {
	margin: 0; /* Safari by default adds a margin */
	padding: 4px;
	border: 1px solid #b2b2b2;
	border-radius: 4px;
	box-shadow: inset 0 0 2px 1px rgba(0,0,0, 0.1);
	-moz-box-shadow: inset 0 0 2px 1px rgba(0,0,0, 0.1);
	-webkit-box-shadow: inset 0 0 2px 1px rgba(0,0,0, 0.1);
	-o-box-shadow: inset 0 0 2px 1px rgba(0,0,0, 0.1);
}

input[type="text"]:focus,
input[type="password"]:focus,
input.button:focus,
textarea:focus {
	border-color: #4787b1;
	box-shadow: 0 0 5px 2px rgba(71,135,177, 0.9);
	-moz-box-shadow: 0 0 5px 2px rgba(71,135,177, 0.9);
	-webkit-box-shadow: 0 0 5px 2px rgba(71,135,177, 0.9);
	-o-box-shadow: 0 0 5px 2px rgba(71,135,177, 0.9);
	outline: none;
}

input.placeholder,
textarea.placeholder {
	color: #aaa;
}

.bold {
	font-weight: bold;
}

/*** buttons ***/

input.button {
	display: inline-block;
	margin: 0 2px;
	padding: 2px 5px;
	color: #525252;
	text-shadow: 0px 1px 1px #fff;
	border: 1px solid #c0c0c0;
	border-radius: 4px;
	background: #f7f7f7;
	background: -moz-linear-gradient(top, #f9f9f9 0%, #e6e6e6 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f9f9f9), color-stop(100%,#e6e6e6));
	background: -o-linear-gradient(top, #f9f9f9 0%, #e6e6e6 100%);
	background: -ms-linear-gradient(top, #f9f9f9 0%, #e6e6e6 100%);
	background: linear-gradient(top, #f9f9f9 0%, #e6e6e6 100%);
	box-shadow: 0 1px 1px 0 rgba(140, 140, 140, 0.3);
	-o-box-shadow: 0 1px 1px 0 rgba(140, 140, 140, 0.3);
	-webkit-box-shadow: 0 1px 1px 0 rgba(140, 140, 140, 0.3);
	-moz-box-shadow: 0 1px 1px 0 rgba(140, 140, 140, 0.3);
	text-decoration: none;
	outline: none;
}

.formbuttons input.button {
	color: #ddd;
	font-size: 110%;
	text-shadow: 0px 1px 1px #333;
	padding: 4px 12px;
	border-color: #465864;
	border-radius: 5px;
	background: #7a7b7d;
	background: -moz-linear-gradient(top, #7b7b7b 0%, #606060 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#7b7b7b), color-stop(100%,#606060)); /* Chrome,Safari4+ */
	background: -o-linear-gradient(top, #7b7b7b 0%, #606060 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, #7b7b7b 0%, #606060 100%); /* IE10+ */
	background: linear-gradient(top, #7b7b7b 0%, #606060 100%); /* W3C */
	box-shadow: 0 1px 1px 0 #ccc, inset 0 1px 0 0 #888;
	-o-box-shadow: 0 1px 1px 0 #ccc, inset 0 1px 0 0 #888;
	-webkit-box-shadow: 0 1px 1px 0 #ccc, inset 0 1px 0 0 #888;
	-moz-box-shadow: 0 1px 1px 0 #ccc, inset 0 1px 0 0 #888;
}

#hoverbox{
	/*float:right;
	margin-right:-120px;*/
	position:absolute;
	margin-left:84%;
	display:none;
	
	margin-top:42px;
	background-color:#FFF;
	opacity:.95;
	width:90px;
	height: 25px;
	padding:10px 10px;
	border-radius: 5px;
	z-index:500 !important;
	box-shadow: 0 1px 1px 0 #ccc, inset 0 1px 0 0 #888;
	-o-box-shadow: 0 1px 1px 0 #ccc, inset 0 1px 0 0 #888;
	-webkit-box-shadow: 0 1px 1px 0 #ccc, inset 0 1px 0 0 #888;
	-moz-box-shadow: 0 1px 1px 0 #ccc, inset 0 1px 0 0 #888;
	}
	
.formbuttons input.button:hover,
.formbuttons input.button:focus,
input.button.mainaction:hover,
input.button.mainaction:focus {
	color: #f2f2f2;
	border-color: #465864;
	box-shadow: 0 0 5px 2px rgba(71,135,177, 0.6), inset 0 1px 0 0 #888;
	-moz-box-shadow: 0 0 5px 2px rgba(71,135,177, 0.6), inset 0 1px 0 0 #888;
	-webkit-box-shadow: 0 0 5px 2px rgba(71,135,177, 0.6), inset 0 1px 0 0 #888;
	-o-box-shadow: 0 0 5px 2px rgba(71,135,177, 0.6), inset 0 1px 0 0 #888;
}

.formbuttons input.button:active {
	color: #fff;
	background: -moz-linear-gradient(top, #5c5c5c 0%, #7b7b7b 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#5c5c5c), color-stop(100%,#7b7b7b));
	background: -o-linear-gradient(top, #5c5c5c 0%, #7b7b7b 100%);
	background: -ms-linear-gradient(top, #5c5c5c 0%, #7b7b7b 100%);
	background: linear-gradient(top, #5c5c5c 0%, #7b7b7b 100%);
}

input.button.mainaction {
	color: #ededed;
	text-shadow: 0px 1px 1px #333;
	border-color: #1f262c;
	background: #505050;
	background: -moz-linear-gradient(top, #505050 0%, #2a2e31 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#505050), color-stop(100%,#2a2e31));
	background: -o-linear-gradient(top, #505050 0%, #2a2e31 100%);
	background: -ms-linear-gradient(top, #505050 0%, #2a2e31 100%);
	background: linear-gradient(top, #505050 0%, #2a2e31 100%);
	box-shadow: inset 0 1px 0 0 #777;
	-moz-box-shadow: inset 0 1px 0 0 #777;
	-webkit-box-shadow: inset 0 1px 0 0 #777;
	-o-box-shadow: inset 0 1px 0 0 #777;
}

input.button.mainaction:active {
	color: #fff;
	background: #515151;
	background: -moz-linear-gradient(top, #2a2e31 0%, #505050 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#2a2e31), color-stop(100%,#505050));
	background: -o-linear-gradient(top, #2a2e31 0%, #505050 100%);
	background: -ms-linear-gradient(top, #2a2e31 0%, #505050 100%);
	background: linear-gradient(top, #2a2e31 0%, #505050 100%);
}

input.button[disabled],
input.button[disabled]:hover,
input.button.mainaction[disabled] {
	color: #aaa !important;
}

input.mainaction {
	font-weight: bold;
}

/** link buttons **/

a.button {
	display: inline-block;
	margin: 0 2px;
	padding: 2px 5px;
	color: #525252;
	text-shadow: 0px 1px 1px #fff;
	border: 1px solid #c6c6c6;
	border-radius: 4px;
	background: #f7f7f7;
	background: -moz-linear-gradient(top, #f9f9f9 0%, #e6e6e6 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f9f9f9), color-stop(100%,#e6e6e6));
	background: -o-linear-gradient(top, #f9f9f9 0%, #e6e6e6 100%);
	background: -ms-linear-gradient(top, #f9f9f9 0%, #e6e6e6 100%);
	background: linear-gradient(top, #f9f9f9 0%, #e6e6e6 100%);
	box-shadow: 0 1px 1px 0 rgba(140, 140, 140, 0.3);
	-o-box-shadow: 0 1px 1px 0 rgba(140, 140, 140, 0.3);
	-webkit-box-shadow: 0 1px 1px 0 rgba(140, 140, 140, 0.3);
	-moz-box-shadow: 0 1px 1px 0 rgba(140, 140, 140, 0.3);
	text-decoration: none;
}

a.button:focus,
input.button:focus {
	border-color: #4fadd5;
	box-shadow: 0 0 2px 1px rgba(71,135,177, 0.6);
	-moz-box-shadow: 0 0 2px 1px rgba(71,135,177, 0.6);
	-webkit-box-shadow: 0 0 2px 1px rgba(71,135,177, 0.6);
	-o-box-shadow: 0 0 2px 1px rgba(71,135,177, 0.6);
	outline: none;
}

label.disabled,
a.button.disabled {
	color: #999;
}

a.button.disabled,
input.button.disabled,
input.button[disabled],
a.button.disabled:hover,
input.button.disabled:hover,
input.button[disabled]:hover {
	border-color: #c6c6c6;
	box-shadow: 0 1px 1px 0 rgba(160, 160, 160, 0.4);
	-o-box-shadow: 0 1px 1px 0 rgba(160, 160, 160, 0.4);
	-webkit-box-shadow: 0 1px 1px 0 rgba(160, 160, 160, 0.4);
	-moz-box-shadow: 0 1px 1px 0 rgba(160, 160, 160, 0.4);
}

a.button.disabled span.inner {
	opacity: 0.4;
	filter: alpha(opacity=40);
}

a.button.pressed,
a.button:active,
input.button:active {
	background: #e6e6e6;
	background: -moz-linear-gradient(top, #e6e6e6 0%, #f9f9f9 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e6e6e6), color-stop(100%,#f9f9f9));
	background: -o-linear-gradient(top, #e6e6e6 0%, #f9f9f9 100%);
	background: -ms-linear-gradient(top, #e6e6e6 0%, #f9f9f9 100%);
	background: linear-gradient(top, #e6e6e6 0%, #f9f9f9 100%);
}

.pagenav.dark a.button {
	font-weight: bold;
	border-color: #e6e6e6;
	background: #d8d8d8;
	background: -moz-linear-gradient(top, #d8d8d8 0%, #bababa 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#d8d8d8), color-stop(100%,#bababa));
	background: -o-linear-gradient(top, #d8d8d8 0%, #bababa 100%);
	background: -ms-linear-gradient(top, #d8d8d8 0%, #bababa 100%);
	background: linear-gradient(top, #d8d8d8 0%, #bababa 100%);
	box-shadow: 0 1px 1px 0 #999;
	-o-box-shadow: 0 1px 1px 0 #999;
	-webkit-box-shadow: 0 1px 1px 0 #999;
	-moz-box-shadow: 0 1px 1px 0 #999;
}

.pagenav.dark a.button.pressed {
	background: #bababa;
	background: -moz-linear-gradient(top, #bababa 0%, #d8d8d8 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#bababa), color-stop(100%,#d8d8d8));
	background: -o-linear-gradient(top, #bababa 0%, #d8d8d8 100%);
	background: -ms-linear-gradient(top, #bababa 0%, #d8d8d8 100%);
	background: linear-gradient(top, #bababa 0%, #d8d8d8 100%);
}

.pagenav a.button {
	padding: 1px 3px;
	height: 16px;
	vertical-align: middle;
	margin-bottom: 1px;
}

.pagenav a.button span.inner {
	display: inline-block;
	width: 16px;
	height: 13px;
	text-indent: 1000px;
	overflow: hidden;
	background: url(images/buttons.png) -6px -211px no-repeat;
}

.pagenav a.prevpage span.inner {
	background-position: -7px -226px;
}

.pagenav a.nextpage span.inner {
	background-position: -28px -226px;
}

.pagenav a.lastpage span.inner {
	background-position: -28px -211px;
}

.pagenav a.pageup span.inner {
	background-position: -7px -241px;
}

.pagenav a.pagedown span.inner {
	background-position: -29px -241px;
}

.pagenav a.reply span.inner {
	background-position: -7px -256px;
}

.pagenav a.forward span.inner {
	background-position: -29px -256px;
}

.pagenav a.replyall span.inner {
	background-position: -7px -271px;
}

.pagenav a.extwin span.inner {
	background-position: -29px -271px;
}

.pagenav .countdisplay {
	display: inline-block;
	padding: 3px 1em 0 1em;
	text-shadow: 0px 1px 1px #fff;
	min-width: 16em;
}

.pagenavbuttons {
	position: relative;
	top: -2px;
}


/*** message bar ***/

#message div.loading,
#message div.warning,
#message div.error,
#message div.notice,
#message div.confirmation,
#message-objects div.notice {
	color: #555;
	font-weight: bold;
	padding: 6px 30px 6px 25px;
	display: inline-block;
	white-space: nowrap;
	background: url(images/messages.png) 0 5px no-repeat;
	cursor: default;
}

#message div.warning {
	color: #960;
	background-position: 0 -86px;
}

#message div.error {
	color: #cf2734;
	background-position: 0 -55px;
}

#message div.confirmation {
	color: #093;
	background-position: 0 -25px;
}

#message div.loading {
	background: url(images/ajaxloader.gif) 2px 6px no-repeat;
}

#message div a,
#message div span {
	padding-right: 0.5em;
	text-decoration: none;
}

#message div a:hover {
	text-decoration: underline;
	cursor: pointer;
}

#message.statusbar {
	position: absolute;
	bottom: 0;
	left: 0;
	right: 0;
	height: 27px;
	padding-left: 8px;
	border-top: 1px solid #ddd;
	border-radius: 0 0 4px 4px;
	background: #eaeaea;
	background: -moz-linear-gradient(top, #eaeaea 0%, #c8c8c8 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#eaeaea), color-stop(100%,#c8c8c8));
	background: -o-linear-gradient(top, #eaeaea 0%, #c8c8c8 100%);
	background: -ms-linear-gradient(top, #eaeaea 0%, #c8c8c8 100%);
	background: linear-gradient(top, #eaeaea 0%, #c8c8c8 100%);
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}

.ui-dialog.error .ui-dialog-title,
.ui-dialog.warning .ui-dialog-title,
.ui-dialog.confirmation .ui-dialog-title {
	padding-left: 25px;
	background: url(images/messages.png) 0 5px no-repeat;
	text-shadow: 0 1px 1px #fff;
}

.ui-dialog.warning .ui-dialog-title {
	color: #960;
	background-position: 0 -90px;
}

.ui-dialog.error .ui-dialog-title {
	color: #cf2734;
	background-position: 0 -60px;
}

.ui-dialog.confirmation .ui-dialog-title {
	color: #093;
	background-position: 0 -30px;
}

.ui-dialog.popupmessage .ui-dialog-titlebar {
	padding: 8px 1em 4px 1em;
	background: #e3e3e3;
	background: -moz-linear-gradient(top, #e3e3e3 0%, #cfcfcf 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e3e3e3), color-stop(100%,#cfcfcf));
	background: -o-linear-gradient(top, #e3e3e3 0%, #cfcfcf 100%);
	background: -ms-linear-gradient(top, #e3e3e3 0%, #cfcfcf 100%);
	background: linear-gradient(top, #e3e3e3 0%, #cfcfcf 100%);
}

.ui-dialog.popupmessage .ui-widget-content {
	font-size: 12px;
	background: #eee;
	background: -moz-linear-gradient(top, #eee 0%, #dcdcdc 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#eee), color-stop(100%,#dcdcdc));
	background: -o-linear-gradient(top, #eee 0%, #dcdcdc 100%);
	background: -ms-linear-gradient(top, #eee 0%, #dcdcdc 100%);
	background: linear-gradient(top, #eee 0%, #dcdcdc 100%);
}


/*** basic page layout ***/

#topline {
	height: 18px;
	background: /*url(images/linen.jpg) */ url(images/linen_login.jpg) repeat #666;
	opacity:.75;
	border-bottom: 1px solid #4f4f4f;
	padding: 2px 0 2px 10px;
	color: #aaa;
}

#topnav {
	position: relative;
	height: 46px;
	margin-bottom: 10px;
	padding: 0 0 0 10px;
	background: #111;
	background: -moz-linear-gradient(top, #404040 0%, #060606 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#404040), color-stop(100%,#060606));
	background: -o-linear-gradient(top, #404040 0%, #060606 100%);
	background: -ms-linear-gradient(top, #404040 0%, #060606 100%);
	background: linear-gradient(top, #404040 0%, #060606 100%);
}

#topline a,
#topnav a {
	color: #FFF;
	text-decoration: none;
}

#topline a:hover {
	text-decoration: underline;
}

#toplogo {
	padding-top: 2px;
}

.topleft {
	float: left;
}

.topright {
	float: right;
}

.closelink {
	display: inline-block;
	padding: 2px 10px 2px 20px;
}

#topline span.username {
	padding-right: 1em;
	color: #FFF;
}

#topline .topleft a {
	display: inline-block;
	padding: 2px 0.8em 0 0;
	color: #aaa;
}

#topline a.button-logout {
	display: inline-block;
	padding: 2px 10px 2px 20px;
	background: url(images/buttons.png) -6px -193px no-repeat;
	/*color: #fff;*/
	color: #FFF;
}

#topline a.button-logout:hover{
color: #0F0;
	font-size:13px;
	text-decoration:blink;
    background: url(images/buttons2.png) -6px -193px no-repeat;
}


/*** taskbar ***/

#taskbar a {
	display: inline-block;
	height: 34px;
	padding: 12px 10px 0 6px;
}

#taskbar a span.button-inner {
	display: inline-block;
	font-size: 110%;
	font-weight: normal;
	text-shadow: 0px 1px 1px black;
	padding: 5px 0 0 34px;
	height: 19px;
	background: url(images/buttons.png) -1000px 0 no-repeat;
}

#taskbar a.button-selected {
	color: #3cf;
	background-color: #2c2c2c;
}

#taskbar a.button-settings span.button-inner {
	background-position: 0 -96px;
}

#taskbar a.button-settings:hover span.button-inner,
#taskbar a.button-settings.button-selected span.button-inner {
	background-position: 0 -120px;
}

#taskbar a.button-calendar span.button-inner {
	background-position: 0 -144px;
}


#mainscreen {
	position: absolute;
	top: 88px;
	left: 10px;
	right: 10px;
	bottom: 20px;
}

#mainscreen.offset {
	top: 130px;
}

#mainscreen .offset {
	margin-top: 42px;
}

.uibox {
	border: 1px solid #a3a3a3;
	border-radius: 4px;
	overflow: hidden;
	box-shadow: 0 0 2px #999;
	-o-box-shadow: 0 0 2px #999;
	-webkit-box-shadow: 0 0 2px #999;
	-moz-box-shadow: 0 0 2px #999;
	background: #fff;
	opacity:.85;
}

.minwidth {
	position: absolute;
	top: 0;
	left: 0;
	bottom: 0;
	width: 100%;
	min-width: 1150px;
}

.scroller {
	overflow: auto;
}

.readtext {
	width: 42em;
	padding: 12px;
	font-size: 12px;
}

.readtext > h1,
.readtext > h2,
.readtext > h3 {
	margin-top: 0;
}

.watermark {
	background-image: url(images/shakiro.jpg);
	background-position: center;
	background-repeat: no-repeat;
}

/*** lists ***/

.listbox
{
	background-color: #CCC; /*background: #d9ecf4;*/
	overflow: hidden;
}

.listbox .scroller {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	bottom: 0;
	overflow-x: hidden;
	overflow-y: auto;
}

.listbox .scroller.withfooter {
	bottom: 42px;
}

.listbox .boxtitle + .scroller {
	top: 34px;
}

.boxtitle,
.uibox .listing thead td {
	font-size: 12px;
	font-weight: bold;
	padding: 10px 8px 3px 8px;
	height: 20px;  /* doesn't affect table-cells in FF */
	margin: 0;
	text-shadow: 0px 1px 1px #fff;
	border-bottom: 1px solid #bbd3da;
	white-space: nowrap;
}

.uibox .listing thead td {
	padding-bottom: 8px;
	height: auto;
}

.uibox .boxtitle,
.uibox .listing thead td {
	background: #b0ccd7;
	color: #004458;
	border-radius: 4px 4px 0 0;
}

.listbox .listitem,
.listbox .tablink,
.listing tbody td,
.listing li {
	display: block;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #bbd3da;
	cursor: default;
	font-weight: normal;
}

.listbox .listitem a,
.listbox .tablink a,
.listing tbody td,
.listing li a {
	display: block;
	color: #FFF;
	text-shadow: 0px 1px 1px #000;
	text-decoration:none;
	font-size:12px;
	font-family:Verdana, Geneva, sans-serif;
	cursor: default;
	padding: 6px 8px 2px 8px;
	height: 17px; /* doesn't affect table-cells in FF */
	white-space: nowrap;
}

.listing tbody td {
	display: table-cell;
	padding-bottom: 5px;
	height: auto;
	min-height: 14px;
}

.webkit .listing tbody td {
	height: 14px;
}




.listbox .listitem.selected,
.listbox .tablink.selected,
.listbox .listitem.selected > a,
.listbox .tablink.selected > a,
.listing tbody tr.unfocused td,
.listing tbody tr.selected td,
.listing li.selected,
.listing li.selected > a {
	color: #FFF;
	font-weight: bold;
	background-color:#777;/*#c7e3ef;*/
}

ul.listing {
	display: block;
	list-style: none;
	margin: 0;
	padding: 0;
}

ul.listing li {
	background-color:#CCC;/*#d9ecf4*/
	opacity:.8;
}

ul.listing li:hover{
background-color:#555;
}

ul.listing li.droptarget,
table.listing tr.droptarget td {
	background-color: #e8e798;
}

table.listing,
table.layout {
	border: 0;
	width: 100%;
	border-spacing: 0;
}

table.layout td {
	vertical-align: top;
}

.listbox .boxfooter {
	position: absolute;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 42px;
	border-top: 1px solid #ccdde4;
	background: #E3CEDB; /*background: #d9ecf4;*/ /*#d9ecf4*/
	-webkit-box-shadow: inset 0 1px 0 0 #fff;
	-moz-box-shadow: inset 0 1px 0 0 #fff;
	box-shadow: inset 0 1px 0 0 #fff;
	white-space: nowrap;
	overflow: hidden;
}

.uibox .boxfooter {
	border-radius: 0 0 4px 4px;
}

.boxfooter .listbutton {
	display: inline-block;
	text-decoration: none;
	width: 48px;
	border-right: 1px solid #fff;
	background: #c7e3ef;
	padding: 3px 0;
	margin-top: 1px;
}

.uibox .boxfooter .listbutton:first-child {
	border-radius: 0 0 0 4px;
}

.boxfooter .listbutton .inner {
	display: inline-block;
	width: 48px;
	height: 35px;
	text-indent: -5000px;
	background: url(images/buttons.png) -1000px 0 no-repeat;
}

.boxfooter .listbutton.add .inner {
	background-position: 10px -1301px;
}

.boxfooter .listbutton.delete .inner {
	background-position: 10px -1342px;
}

.boxfooter .listbutton.groupactions .inner {
	background-position: 5px -1382px;
}

.boxfooter .listbutton.addto .inner {
	background-position: 5px -1422px;
}

.boxfooter .listbutton.addcc .inner {
	background-position: 5px -1462px;
}

.boxfooter .listbutton.addbcc {
	width: 54px;
}

.boxfooter .listbutton.addbcc .inner {
	width: 54px;
	background-position: 2px -1502px;
}

.boxfooter .listbutton.removegroup .inner {
	background-position: 5px -1540px;
}

.boxfooter .listbutton.disabled .inner {
	opacity: 0.4;
	filter: alpha(opacity=40);
}

.boxfooter .countdisplay {
	display: inline-block;
	position: relative;
	top: 10px;
	color: #69929e;
	padding: 3px 6px;
}

.boxpagenav {
	position: absolute;
	top: 10px;
	right: 6px;
	width: auto;
}

.boxpagenav a.icon {
	display: inline-block;
	padding: 1px 3px;
	height: 13px;
	width: 14px;
	text-indent: 1000px;
	vertical-align: bottom;
	overflow: hidden;
	background: url(images/buttons.png) -4px -286px no-repeat;
}

.boxpagenav a.icon.prevpage {
	background-position: -4px -301px;
}

.boxpagenav a.icon.nextpage {
	background-position: -28px -301px;
}

.boxpagenav a.icon.lastpage {
	background-position: -28px -286px;
}

.boxpagenav a.icon.disabled {
	opacity: 0.4;
	filter: alpha(opacity=40);
}

.centerbox {
	width: 40em;
	margin: 16px auto;
}

.errorbox {
	width: 40em;
	padding: 20px;
}

.errorbox h3 {
	font-size: 16px;
	margin-top: 0;
}


/*** Records table ***/

table.records-table {
	display: table;
	width: 100%;
	table-layout: fixed;
	border-collapse: collapse;
	border-spacing: 0;
	border: 1px solid #bbd3da;
}

.boxlistcontent .records-table {
	border: 0;
}

.records-table thead td {
	color: #69939e;
	font-size: 11px;
	font-weight: bold;
	background: #333;

	
	
	border-left: 1px solid #bbd3da;
	padding: 8px 7px;
	overflow: hidden;
	text-overflow: ellipsis;
}

.records-table.sortheader thead td {
	padding: 0;
}

.records-table thead td a,
.records-table thead td span {
	display: block;
	padding: 7px 7px;
	color: #FFF;
	text-decoration: none;
	overflow: hidden;
	text-overflow: ellipsis;
}

.records-table tbody td {
	padding: 2px 7px;
	border-bottom: 1px solid #ddd;
	border-left: 1px dotted #bbd3da;
	white-space: nowrap;
	cursor: default;
	overflow: hidden;
	text-overflow: ellipsis;
	background-image:url(images/linen.jpg) repeat #FFF;
}

.records-table thead tr td:first-child,
.records-table tbody tr td:first-child {
	border-left: 0;
}

.records-table tr.selected td {
	color: #fff !important;
	background: #019bc6;
	background: -moz-linear-gradient(top, #019bc6 0%, #017cb4 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#019bc6), color-stop(100%,#017cb4));
	background: -o-linear-gradient(top, #019bc6 0%, #017cb4 100%);
	background: -ms-linear-gradient(top, #019bc6 0%, #017cb4 100%);
	background: linear-gradient(top, #019bc6 0%, #017cb4 100%);
}

.records-table tr.selected td a,
.records-table tr.selected td span {
	color: #fff !important;
}

.records-table tr.unfocused td {
	color: #fff !important;
	background: #4db0d2 !important;
}

.records-table tr.unfocused td a,
.records-table tr.unfocused td span {
	color: #fff !important;
}

.records-table tr.deleted td,
.records-table tr.deleted td a {
	color: #ccc !important;
}


/*** iFrames ***/

#aboutframe {
	width: 97%;
	height: 100%;
	border: 0;
	padding: 0;
}

body.iframe {
	background: #fff;
	margin: 38px 0 10px 0;
}

body.iframe.floatingbuttons {
	margin-bottom: 40px;
}

body.iframe.fullheight {
	margin: 0;
}

.contentbox .boxtitle,
body.iframe .boxtitle {
	color: #777;
	background: #eee;
	background: -moz-linear-gradient(top, #eee 0%, #dfdfdf 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#eee), color-stop(100%,#dfdfdf));
	background: -o-linear-gradient(top, #eee 0%, #dfdfdf 100%);
	background: -ms-linear-gradient(top, #eee 0%, #dfdfdf 100%);
	background: linear-gradient(top, #eee 0%, #dfdfdf 100%);
	border-bottom: 1px solid #ccc;
}

body.iframe .boxtitle {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	z-index: 100;
}

body.iframe .footerleft.floating {
	position: fixed;
	left: 0;
	bottom: 0;
	width: 100%;
	z-index: 110;
	background: #fff;
	padding-top: 8px;
	padding-bottom: 12px;
}

body.iframe .footerleft.floating:before {
	content: " ";
	position: absolute;
	top: -6px;
	left: 0;
	width: 100%;
	height: 6px;
	background: url(images/overflowshadow.png) top center no-repeat;
}

.boxcontent {
	padding: 10px;
}

.contentbox .scroller {
	position: absolute;
	top: 34px;
	left: 0;
	right: 0;
	bottom: 28px;
	overflow: auto;
}

.iframebox {
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 28px;
}

.footerleft {
	padding: 0 12px 4px 12px;
}

.propform fieldset {
	margin-bottom: 20px;
	border: 0;
	padding: 0;
}

.propform fieldset legend {
	display: block;
	font-size: 14px;
	font-weight: bold;
	padding-bottom: 10px;
	margin-bottom: 0;
}

.propform fieldset fieldset legend {
	color: #666;
	font-size: 12px;
}

fieldset.floating {
	float: left;
	margin-right: 10px;
	margin-bottom: 10px;
}

table.propform {
	width: 100%;
	border-spacing: 0;
	border-collapse: collapse;
}

ul.proplist li,
table.propform td {
	width: 80%;
	padding: 4px 10px;
	background: #eee;
	border-bottom: 2px solid #fff;
}

table.propform td.title {
	width: 20%;
	color: #333;
	padding-right: 20px;
	white-space: nowrap;
}

table.propform .mceLayout td {
	padding: 0;
	border-bottom: 0;
}

ul.proplist {
	list-style: none;
	margin: 0;
	padding: 0;
}

ul.proplist li {
	width: auto;
}

#pluginbody {
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
}


/*** Login form ***/

#login-form {
	position: relative;
	width: 580px;
	margin: 20ex auto 2ex auto;
	color:#CCC;
}

#login-form .box-inner {
	width: 430px;
	/*background: url(images/linen_login.jpg) top left no-repeat #5c5c5c;*/
	background-color:#333;
	opacity: .9;
	margin: 0 50px;
	padding: 10px 24px 24px 24px;
	border: 1px solid #333;
	border-radius: 5px;
	box-shadow: inset 0 0 1px #ccc;
	-o-box-shadow: inset 0 0 1px #ccc;
	-webkit-box-shadow: inset 0 0 1px #ccc;
	-moz-box-shadow: inset 0 0 1px #ccc;
}
/*
#login-form .box-bottom {
	background: url(images/login_shadow.png) top center no-repeat;
	margin-top: -3px;
	padding-top: 10px;
}

#login-form td.input {
	width: 90%;
	padding: 8px;
}
*/
#login-form input[type="text"],
#login-form input[type="password"] {
	width: 95%;
	border-color: #666;
}

#login-form input.button {
	color: #444;
	text-shadow: 0px 1px 1px #fff;
	border-color: #f9f9f9;
	background: #f9f9f9;
	background: -moz-linear-gradient(top, #f9f9f9 0%, #e2e2e2 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f9f9f9), color-stop(100%,#e2e2e2));
	background: -o-linear-gradient(top, #f9f9f9 0%, #e2e2e2 100%);
	background: -ms-linear-gradient(top, #f9f9f9 0%, #e2e2e2 100%);
	background: linear-gradient(top, #f9f9f9 0%, #e2e2e2 100%);
	box-shadow: inset 0 1px 0 0 #fff;
	-moz-box-shadow: inset 0 1px 0 0 #fff;
	-webkit-box-shadow: inset 0 1px 0 0 #fff;
	-o-box-shadow: inset 0 1px 0 0 #fff;
}

#login-form input.button:hover,
#login-form input.button:focus {
	box-shadow: 0 0 5px 2px rgba(71,135,177, 0.9), inset 0 1px 0 0 #fff;
	-moz-box-shadow: 0 0 5px 2px rgba(71,135,177, 0.9), inset 0 1px 0 0 #fff;
	-webkit-box-shadow: 0 0 5px 2px rgba(71,135,177, 0.9), inset 0 1px 0 0 #fff;
	-o-box-shadow: 0 0 5px 2px rgba(71,135,177, 0.9), inset 0 1px 0 0 #fff;
}
#login-form span {
	 padding-Bottom: 10px;
	 font-weight:bold;    
	}

/*** quicksearch **/

#quicksearchbar {
	position: absolute;
	right: 1px;
	top: 0;
	width: 240px;
}

#quicksearchbar input {
	width: 176px;
	margin: 0;
	margin-top: 7px;
	padding: 3px 30px 3px 34px;
	height: 18px;
	background: #f1f1f1;
	border-color: #ababab;
	font-weight: bold;
	font-size: 11px;
}

#quicksearchbar #searchmenulink {
	position: absolute;
	top: 12px;
	left: 6px;
}

#quicksearchbar #searchreset {
	position: absolute;
	top: 11px;
	right: 1px;
}


/*** toolbar ***/

.toolbar .spacer {
	display: inline-block;
	width: 24px;
	height: 40px;
	padding: 0;
}

.toolbar a.button {
	text-align: center;
	font-size: 10px;
	color:#DDD;
	min-width: 50px;
	max-width: 75px;
	height: 13px;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
	padding: 28px 2px 0 2px;
	text-shadow: 0px 1px 1px #000;
	box-shadow: none;
	-moz-box-shadow: none;
	-webkit-box-shadow: n-one;
	-o-box-shadow: none;
	background: url(images/buttons3.png) -100px 0 no-repeat;
	border: 0;
}

.toolbar a.button:hover{
background: url(images/buttons.png) -100px 0 no-repeat;
}
.toolbar a.button.disabled {
	opacity: 0.4;
	filter: alpha(opacity=40);
}

/*.dropbutton {
	display: inline-block;
	position: relative;
}

.dropbutton .dropbuttontip {
	display: block;
	position: absolute;
	right: 0;
	top: 0;
	height: 42px;
	width: 18px;
	background: url(images/buttons.png) 0 -1255px no-repeat;
	cursor: pointer;
}

.dropbutton .dropbuttontip:hover {
	background-position: -26px -1255px;
}

.dropbutton a.button.disabled + .dropbuttontip {
	opacity: 0.5;
	filter: alpha(opacity=50);
}

.dropbutton a.button.disabled + .dropbuttontip:hover {
	background-position: 0 -1255px;
}

.dropbutton a.button {
    margin-left: 0;
    padding-left: 0;
    margin-right: 0;
    padding-right: 0;
}
*/
.toolbar a.button.back {
	background-position: 0 -1216px;
}

.toolbar a.button.close {
background-position: 0 -1745px;
}

.toolbar a.button.send {
background-position: center -1660px;
}

.toolbar a.button.checkmail {
	background-position: center -1176px;
}

.toolbar a.button.compose {
	background-position: center -530px;
}

.toolbar a.button.reply {
	background-position: center -570px;
}

.toolbar a.button.reply-all {
	/*min-width: 54px;*/
	background-position: left -610px;
	text-align :center;
}

.toolbar a.button.forward {
	min-width: 54px;
	background-position: left -650px;
}

.toolbar a.button.delete {
	background-position: center -690px;
}
/*
.toolbar a.button.archive {
	background-position: center -730px;
}

.toolbar a.button.junk {
	background-position: center -770px;
}
*/
.toolbar a.button.print {
	background-position: center -810px;
}
/*
.toolbar a.button.markmessage {
	background-position: center -1094px;
}

.toolbar a.button.more {
	background-position: center -850px;
}
*/
.toolbar a.button.attach {
	background-position: center -890px;
}

.toolbar a.button.search {
	background-position: center -970px;
}

html.opera select.decorated {
	opacity: 1;
}

select.decorated option {
	color: #fff;
	background: #444;
	border: 0;
	border-top: 1px solid #5a5a5a;
	border-bottom: 1px solid #333;
	text-shadow: 0px 1px 1px #333;
	padding: 4px 6px;
	outline: none;
}



/*** popup menus ***/

.popupmenu,
#rcmKSearchpane {
	display: none;
	position: absolute;
	top: 32px;
	left: 90px;
	width: auto;
	background: #444;
	border: 1px solid #999;
	z-index: 240;
	border-radius: 4px;
	box-shadow: 0 2px 6px 0 #333;
	-moz-box-shadow: 0 2px 6px 0 #333;
	-webkit-box-shadow: 0 2px 6px 0 #333;
	-o-box-shadow: 0 2px 6px 0 #333;
}

.popupmenu.dropdown {
	border-radius: 0 0 4px 4px;
	border-top: 0;
}

ul.toolbarmenu,
#rcmKSearchpane ul {
	margin: 0;
	padding: 0;
	list-style: none;
}

/*.googie_list td,*/
ul.toolbarmenu li,
#rcmKSearchpane ul li {
	color: #fff;
	white-space: nowrap;
	min-width: 130px;
	margin: 0;
	border-top: 1px solid #5a5a5a;
	border-bottom: 1px solid #333;
}

ul.toolbarmenu li a.active:hover,
#rcmKSearchpane ul li.selected,
select.decorated option:hover,
select.decorated option[selected='selected'] {
	background-color: #00aad6;
	background: -moz-linear-gradient(top, #00aad6 0%, #008fc9 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#00aad6), color-stop(100%,#008fc9));
	background: -o-linear-gradient(top, #00aad6 0%, #008fc9 100%);
	background: -ms-linear-gradient(top, #00aad6 0%, #008fc9 100%);
	background: linear-gradient(top, #00aad6 0%, #008fc9 100%);
}

ul.toolbarmenu.iconized li a,
ul.toolbarmenu.selectable li a {
	padding-left: 30px;
}

ul.toolbarmenu.selectable li a.selected {
	background: url(images/messages.png) 4px -27px no-repeat;
}

ul.toolbarmenu li label {
	display: block;
	color: #000;
	padding: 4px 8px;
	text-shadow: 0px 1px 1px #333;
}

ul.toolbarmenu li a.icon {
	color: #000;
	padding: 2px 6px;
}

ul.toolbarmenu li span.icon {
	display: block;
	min-height: 14px;
	padding: 4px 4px 1px 24px;
	height: 17px;
	background-image: url(images/listicons.png);
	background-position: -100px 0;
	background-repeat: no-repeat;
	opacity: 0.2;
	filter: alpha(opacity=20);
}

ul.toolbarmenu li a.active span.icon {
	opacity: 0.99;
	filter: alpha(opacity=100);
}

ul.toolbarmenu li span.read {
	background-position: 0 -1220px;
}

ul.toolbarmenu li span.unread {
	background-position: 0 -1196px;
}

ul.toolbarmenu li span.flagged {
	background-position: 0 -1244px;
}

ul.toolbarmenu li span.unflagged {
	background-position: 0 -1268px;
}

ul.toolbarmenu li span.mail {
	background-position: 0 -1293px;
}

ul.toolbarmenu li span.list {
	background-position: 0 -1317px;
}

ul.toolbarmenu li span.invert {
	background-position: 0 -1340px;
}

ul.toolbarmenu li span.cross {
	background-position: 0 -1365px;
}

ul.toolbarmenu li span.print {
	background-position: 0 -1436px;
}

#rcmKSearchpane {
	border-radius: 0 0 4px 4px;
	border-top: 0;
}

#rcmKSearchpane ul li {
	text-shadow: 0px 1px 1px #333;
	text-decoration: none;
	min-height: 14px;
	padding: 6px 10px 6px 10px;
	border: 0;
	cursor: default;
}

.popupdialog {
	display: none;
	padding: 10px;
}

.popupdialog .formbuttons {
	margin: 20px 0 4px 0;
}

.ui-dialog .prompt input {
	display: block;
	margin: 8px 0;
}

.hint {
	margin: 4px 0;
	color: #999;
	text-shadow: 0px 1px 1px #fff;
}