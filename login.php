<?php
require'./config.php';		//引入公共文件开启session功能

if($_POST){
	$link=mysqli_connect($host,$user,$password,$dbname);
	if(!$link){
		display('数据库连接失败。'.mysqli_connect_error());	
	}
	mysqli_set_charset($link,'utf8');
	//接收用户名和密码
	$name=isset($_POST['name'])? $_POST['name']:'';
	$password=isset($_POST['password'])? $_POST['password']:'';
	
	$name=mysqli_real_escape_string($link,$name);
	$password=mysqli_real_escape_string($link,$password);
	$result=mysqli_query($link,"SELECT 1 FROM `user` WHERE `name` ='$name' AND `password`='$password'");
	if(!$result){
		display('数据库操作失败：'.mysqli_error($link));	
	}
	if(mysqli_num_rows($result)){
		$_SESSION['user']=$name;
		header('Location:index.php');
		exit;
	}else{
		display('登录失败，用户名或密码有误。');
	}
}
display();
function display($message=false){
	require'./html/login.html';
	exit;
}
