<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends CommonController {
	private $article;
    public function index(){
    	$this -> article = D('Article');
    	$id = I('aid');
    	$artidata = $this -> article -> find($id);
    	$this -> assign("artidata",$artidata);
    	$this -> catename($artidata['cateid']);
    	$this -> other($id,$artidata['cateid']);
      	$this -> display();
    }

    public function catename($id){
    	$cate = D('Cate')->find($id);
    	$this -> assign("cate",$cate);
    }

    public function other($id,$cateid){
    	$where['cateid'] = array("eq",$cateid);
    	$where['id'] = array("lt",$id);
    	$data['id'] = array("gt",$id);
    	$data['cateid'] = array("eq",$cateid);
    	$prev = $this -> article -> where($where) -> order("id desc") ->find();
    	$next = $this -> article -> where($data) -> order("id asc") ->find();
    	$this -> assign("prev",$prev);
    	$this -> assign("next",$next);
    }
}