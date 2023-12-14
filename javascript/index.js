window.onload=function(){
	//保存当前焦点元素的索引
	var current_index=0;
	var timer=window.setInterval(autoChange,5000);
	//获取所有轮播按钮
	var button_li=document.getElementById("button").getElementsByTagName("li");
	var pic_div=document.getElementById("banner_pic").getElementsByTagName("div");
	for(var i=0;i<button_li.length;i++){
		button_li[i].onmouseover=function(){
			if(timer){
				clearInterval(timer);	
			}
			for(var j=0;j<pic_div.length;j++){
				if(button_li[j]==this){
					current_index=j;
					button_li[j].className="current";
					pic_div[j].className="current";
				}else{
					pic_div[j].className="pic";
					button_li[j].className="but";
				}
			}
		}
		button_li[i].onmouseout=function(){
			timer=setInterval(autoChange,5000);
		}
	}
	function autoChange(){
		++current_index;
		if(current_index==button_li.length){
			current_index=0;
		}
		for(var i=0;i<button_li.length;i++){
			if(i==current_index){
				button_li[i].className="current";
				pic_div[i].className="current";
			}else{
				button_li[i].className="but";
				pic_div[i].className="pic";
			}
		}
	}
	var m_essage_li=document.getElementById("message").getElementsByTagName("li");
	var message_con_dl=document.getElementById("message_con").getElementsByTagName("dl");
	for(var c=0;c<m_essage_li.length;c++){
		m_essage_li[c].onmouseover=function(){
			for(var b=0;b<message_con_dl.length;b++){
				if(m_essage_li[b]==this){
					m_essage_li[b].className="current";
					message_con_dl[b].className="current";
				}else{
					m_essage_li[b].className="";
					message_con_dl[b].className="";
				}
			}
		}
	}
}