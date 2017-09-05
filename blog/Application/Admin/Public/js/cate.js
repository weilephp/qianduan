$(document).ready(function(){
	updateSort('/blog/Admin/Cate/sort');
	plDel('/blog/Admin/Cate/plDel');
})

function updateSort(url){
	$('#sort').click(function(event){
		event.preventDefault();
		var oSort = $('input[name="ord"]');
		var oSortId = $('input[name="pl_opera"]');
		var sortLen = oSort.length;
		var sortValue = [],id = [];
		for(var i=0;i<oSort.length;i++){
			sortValue.push(oSort.eq(i).val());
			id.push(oSortId.eq(i).val());
		}
		var method = 'post';
		var data = {'id':id,'sortValue':sortValue};
		reqAjax(url,method,data,function(result){
			alert(result.msg);
			window.location.reload();
		});

	});
}