$(document).ready(function(){

	clickSlide()
	tableChangeBgColor();
	isDel();
	selectAll();	

});

function clickSlide(){
	$(".top-menu").click(function(){
		$(this).next().slideToggle(300);
	});
}

function tableChangeBgColor(){
	$("#result_table tr").has("td").hover(
		function(){
			$(this).addClass("gaoliang");
		},
		function(){
			$(this).removeClass("gaoliang");
		}
	);
}

function isDel(){
	$(".del").click(function(){
		return confirm('确定要删除吗?');
	});
}

function selectAll(){
	$("#checkboxAll").click(function(){
		$('input[name="pl_opera"]').prop('checked',this.checked);
	});

	var subbox = $('input[name="pl_opera"]');

	subbox.click(function(){
		var flag = subbox.length == 
			$('input[name="pl_opera"]:checked').length ? true : false;
		$('#checkboxAll').prop('checked',flag);
	});
}

function plDel(url){
	$('#pl_del').click(function(event){
		var flag = confirm('确定要删除所选条目吗？');
		if(!flag){
			return;
		}
		event.preventDefault();
		var subboxCheck = $('input[name="pl_opera"]:checked');
		var len = subboxCheck.length;
		var id = new Array();
		for(var i=0;i<len;i++){
			id.push(subboxCheck.eq(i).attr('value'));
		}
		var method = 'post';
		var data = {'id':id};
		reqAjax(url,method,data,function(result){
			alert(result.msg);
			window.location.reload();
		});
	})
}

function reqAjax(url,method,data,func){
	$.ajax({
		url:url,
		method:method,
		dataType:'json',
		data:data,
		success:func
	});
}