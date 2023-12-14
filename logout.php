<?php
require'./config.php';	
unset($_SESSION['user']);		//用户退出功能
header('Location:index.php');	//跳转页面