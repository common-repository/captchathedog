<?php
/*
Plugin Name: Captcha The Dog
Plugin URI: http://www.CaptchaTheDog.com/wp/
Description: Photo Captcha with user defined images to reduce the spambot prize/payload to one website at a time. Creating a new captcha puzzle one new image at a time. Building a new spambot for each website with unique user defined images does not make financial sense for the spammer. A captcha with "Which one of these things is not like the other?" puzzle.
Author: Team CaptchaTheDog
Version: 7.4
Author URI: http://www.CaptchaTheDog.com/wp/

Copyright 2009  Daniel McMullan (email : http://www.CaptchaTheDog.com/contact.html) 
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; version 3 (GPLv3) of the License, or 
(at your option) any later version.
This program is distributed in the hope that it will be useful, 
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/





function ctd_f() {

?>
<br><br><center>
<link type="text/css" rel="stylesheet" href="http://www.captchathedog.com/noRobots/dnc3.css" />
<script type="text/javascript" src="http://www.captchathedog.com/noRobots/jquery-1.2.6.pack.js"></script>
<script type=text/javascript src=http://www.captchathedog.com/noRobots/dnc3.js></script>
<div id=dognowcat class=dognowcat>
</div>
</center>
<?

}




function ctd_h() {

?>
<body onload='getDogNowCat(0,0,0,0,0);'>
<?

}





function ctd_a($DNCsession,$DNCuse) {

$CTDurl = "http://www.captchathedog.com/cgi-bin/catnowdog?DNCuse=$DNCuse&DNCsession=$DNCsession&DNCsel=$DNCsel&DNCversion=$DNCversion&DNC6=$DNC6&DNC7=$DNC7";

if ($CTDf = fopen($CTDurl, 'r')) {
$CTDcontent = '';
while ($CTDline = fread($CTDf, 1024)) {
$CTDcontent .= $CTDline;
}
fclose($CTDf);
}

return $CTDcontent;

}




function ctd_p($comment) {

$DNCsession = $_POST[DNCSession];
$DNCuse = $_POST[DNCID];
$DNCsuggest = $_POST[DNCsuggest];

$CTDcontent = ctd_a($DNCsession,$DNCuse);

if(!session_id())

if ($CTDcontent == "1") {
$dogNOWcat = 1;
} else {
$dogNOWcat = 0;
}

$rr = $dogNOWcat;

if ($rr == 1)  {
return($comment);
}	

else wp_die( __("Error: <font color=red>WARNING! Your Information was <b>NOT</b> sent </font><br>Please try again by clicking your browser's \"Back\" button and solve the CAPTCHA THE DOG puzzle."));		

}



add_action('comment_form', 'ctd_f');
add_action('wp_head', 'ctd_h');
add_action('preprocess_comment', 'ctd_p');

?>
