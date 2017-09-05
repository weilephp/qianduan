<?php
namespace Home\Controller;
use Think\Controller;
class CateController extends CommonController {
    public function index(){
    	$cateid = I('cid');
		$this -> assign('cateid',$cateid);
		$this -> lst($cateid);
  		$this -> display();
    }

    public function lst($cid){
        $num = 3;
    	$article = D('ArticleView');
    	$count = $article -> where(array("cateid" => $cid)) -> count();
    	$page = new \Think\Page($count,$num);
    	$page -> setConfig("prev","上一页");
    	$page -> setConfig("next","下一页");
        $page -> setConfig("first","首页");
        $page->lastSuffix=false;
        $page -> setConfig('last','尾页');
        $page -> rollPage = 2;
    	$show = $page -> show();
    	$list = $article -> order('time desc') -> where(array("cateid" => $cid)) -> limit($page->firstRow.",".$page->listRows) -> select();
        $total_page = ceil($count/$num);
    	$this -> assign("show",$show);
    	$this -> assign("list",$list);
        $this -> assign('total_page',$total_page);
    }

    public function page(){
        if(IS_POST){
            $cid = I('cateid');
            $p = I('p');
            redirect('/blog/Home/Cate/index/cid/'.$cid.'/p/'.$p.'.html');
        }
    }

    public function articleDateLst(){
        $year = I('y');
        $mon = I('m');
        $dateMon = $year.'-'.$mon;
        $num = 5;
        $article = D();
        $sqlCount = "select count('id') count from blog_article a,blog_cate c where date_format(time,'%Y-%m') = '{$dateMon}' and a.cateid = c.id;";
        $resultCount = $article -> query($sqlCount);
        $count = $resultCount[0]['count'];
        $page = new \Think\Page($count,$num);
        $page -> setConfig("prev","上一页");
        $page -> setConfig("next","下一页");
        $page -> setConfig("first","首页");
        $page->lastSuffix=false;
        $page -> setConfig('last','尾页');
        $page -> rollPage = 5;
        $show = $page -> show();
        $sqlContent = "select a.*,c.catename from blog_article a,blog_cate c where date_format(time,'%Y-%m') = '{$dateMon}' and a.cateid = c.id limit {$page->firstRow},{$page->listRows};";
        $list = $article -> query($sqlContent);
        $total_page = ceil($count/$num);
        $this -> assign("show",$show);
        $this -> assign("list",$list);
        $this -> assign('total_page',$total_page);
        $this -> assign('dateMon',$dateMon);
        $this -> display();
    }

    public function articleDateLstSolve(){
        if(IS_POST){
            $dateMon = I('dateMon');
            $dateArr = explode('-',$dateMon);
            $year = $dateArr[0];
            $mon = $dateArr[1];
            $data['url'] = '/blog/Home/Cate/articleDateLst/y/'.$year.'/m/'.$mon;
            $this -> ajaxReturn($data);
        }
    }

    public function datePage(){
        if(IS_POST){
            $Ym = I('Ym');
            $year = explode('-',$Ym)[0];
            $mon = explode('-',$Ym)[1];
            $p = I('p');
            redirect('/blog/Home/Cate/articleDateLst/y/'.$year.'/m/'.$mon.'/p/'.$p.'.html');
        }
    }

    public function searchLst(){
        $keyword = I('keyWord');
        $article = D('ArticleView');
        $cate = D('Cate');
        $where['title'] = array('like','%'.$keyword.'%');
        $where['catename'] = array('like','%'.$keyword.'%');
        $where['descr'] = array('like','%'.$keyword.'%');
        $where['time'] = array('like','%'.$keyword.'%');
        $where['_logic'] = 'OR';
        $count = $article -> where($where) -> count();
        $page = new \Think\Page($count,5);
        $page -> rollPage = 5;
        $page -> setConfig('prev','上一页');
        $page -> setConfig('next','下一页');
        $show = $page -> show();
        $list = $article -> order('id') -> where($where) -> limit($page->firstRow,$page->listRows) -> select();
        $this -> assign('list',$list);
        $this -> assign('page',$show);
        $this -> display();
    }

}