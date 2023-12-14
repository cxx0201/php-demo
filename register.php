<?php
require'./config.php';		//引入公共文件开启session功能
// require'./html/register.html';	//调用内容模板

if($_POST){
	$link=mysqli_connect($host,$user,$password,$dbname);
	if(!$link){
		display('数据库连接失败。'.mysqli_connect_error());	
	}
	mysqli_set_charset($link,'utf8');
	$fields= array('name', 'password', 'sex', 'email', 'course', 'channel', 'message') ;
	//$fields= ['name', 'password', 'sex', 'email', 'course', 'channel', 'message'] ;
	//$data[];
	$data=array();
	foreach($fields as $v){
		$data[$v]=isset($_POST[$v])?$_POST[$v]:'';	
	}
	
	if(is_array($data['channel'])){
		$data['channel']==implode('，', $data['channel']);
	}
	foreach($data as $k=>$v){
		$data[$k]=mysqli_real_escape_string($link,$v);	
	}
	$result=mysqli_query($link,"SELECT 1 FROM `user` WHERE `name` ='{$data['name']}'");
	if(!$result){
		display('数据库操作失败：'.mysqli_error($link));	
	}
	if(mysqli_num_rows($result)){
		display('该用户名已被注册！');
	}
	$sql_values=implode("','",$data);
	$sql_fields=implode("`,`",$fields);
	
	//执行SQL语句
	$result=mysqli_query($link,"INSERT INTO user (`$sql_fields`) VALUES ('$sql_values')");
	
	if($result){
		header('Location:login.php');
		exit;	
	}else{
		display('数据库操作失败：'.mysqli_error($link));	
	}
}
display();
function display($message=false){
	require'./html/register.html';
	exit;
}