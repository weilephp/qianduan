$(document).ready(function(){
	selectCate('/blog/Admin/Article/cateArticleLstSolve');
	plDel('/blog/Admin/Article/plDel');
})

function selectCate(url){
	$('#search_select').change(function(){
		var cateid = $(this).val();
		var data = {'cateid':cateid};
		var method = 'post';
		reqAjax(url,method,data,function(result){
			window.location.href = result.url;
		});
	})
}