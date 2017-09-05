<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
    	$article = D('ArticleView');
    	$list = $article -> order('time desc') -> limit(4) -> select();
    	$this -> assign('list',$list);
        $this -> display();
    }
}