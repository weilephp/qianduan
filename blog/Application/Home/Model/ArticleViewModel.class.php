<?php
namespace Home\Model;
use Think\Model\ViewModel;
class ArticleViewModel extends ViewModel{

	public $viewFields = array(
		'Article' => array('id','title','descr','pic','time','cateid','recommend','_type'=>'LEFT'),
		'Cate' => array('catename','_on'=>'Article.cateid=Cate.id'),
	);
}