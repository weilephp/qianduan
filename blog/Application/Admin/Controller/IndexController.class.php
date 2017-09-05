<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
    	$article = D('Article');
    	$cate = D('Cate');
    	$admin = D('Admin');
    	$articleNum = $article -> count('id');
    	$cateNum = $article -> count('id');
    	$adminNum = $admin -> count('id');
    	$this -> assign('articleNum',$articleNum);
    	$this -> assign('cateNum',$cateNum);
    	$this -> assign('adminNum',$adminNum);
        $this -> display();
    }
}