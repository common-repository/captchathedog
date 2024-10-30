<?php

/*
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


$DNCa = $_GET['DNCuse'];
$DNCb = $_GET['DNCsession'];
$DNCc = $_GET['DNCsel'];
$DNCrot = $_GET['DNCrot'];
$DNCd = $_GET['DNCversion'];

$CTDurl = "http://www.captchathedog.com/cgi-bin/captchathepage?DNCuse=$DNCa&DNCsession=$DNCb&DNCsel=$DNCc&DNCrot=$DNCrot&DNCversion=$DNCd&DNCdomain=7.0";

$CTDline = "";
if ($CTDf = fopen($CTDurl, 'r')) {
$CTDcontent = '';
while ($CTDline = fread($CTDf, 1024)) {
$CTDcontent .= $CTDline;
}
fclose($CTDf);
} else  {
die("<br><br><b><font size=4>There is an error with this install.</font><br>Add these two lines to your server's php.ini file:<br>allow_url_include = On<br>allow_url_fopen = On<br> <br>Most hosting places allow modification. <br>For MediaTemple.com the path to file is:<br> /home/[userID]/etc/php.ini <br>");
}

echo $CTDcontent;

?>
