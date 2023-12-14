window.onload=function(){
	var form=document.getElementById('form');
	form.onsubmit=function(){
		var password=document.getElementById('password');
		if(password.value===''){
			alert('密码不能为空');
			return false;	
		}
		var username=document.getElementById('username');
		if(username.value===''){
			alert('用户名不能为空');
			return false;	
		}
		var password2=document.getElementById('password2');
		if(password.value!==password2.value){
			alert('两次输入密码不一致！');
			return false;	
		}
	}
}