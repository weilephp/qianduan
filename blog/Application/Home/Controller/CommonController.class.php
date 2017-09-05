<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller{
	public function _initialize(){
		$this -> catelst();
		$this -> articlelst();
		$this -> linklst();
		$this -> recommendlst();
		$this -> articleAll();
	}

	public function catelst(){
		$cate = D('Cate');
		$cateres = $cate -> order("sort") -> select();
		$this -> assign("cateres",$cateres);
	}

	public function articlelst(){
		$article = D('Article');
		$articleres = $article ->order("time desc") ->limit(6) -> select();
		$this -> assign('articleres',$articleres);
	}

	public function linklst(){
		$link = D("Link");
		$linkres = $link -> select();
		$this -> assign("linkres",$linkres);
	}

	public function recommendlst(){
		$recoArticle = D('ArticleView');
		$where['recommend'] = array('eq','是');
		$recoArtres = $recoArticle -> where($where) -> order('time desc') -> limit(3) -> select();
		$this -> assign('recoArtres',$recoArtres);
	}

	public function articleAll(){
		$article = D('Article');
		$sql = 'select DATE_FORMAT(time,"%Y-%m") as date_mon,count(*) as count from blog_article group by DATE_FORMAT(time,"%Y-%m")';
		$articles = $article -> query($sql);
		$this -> assign('articles',$articles);
	}

}