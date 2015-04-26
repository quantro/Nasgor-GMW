<?php 
require("myFunc.php");
//=====List Komponen
logWrite('info','start ','log/%s.log');

checkFile(array('config.php','header.php','main.php','footer.php','icon.php','menu.php'),true,'php');
require("config.php");
require("header.php");
require("top.php");
	require("main.php");
	require("icon.php");
require("footer.php");