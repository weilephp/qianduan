<?php
namespace Home\Controller;
use Think\Controller;
class AboutmeController extends CommonController {
	public function index(){
		$aboutme = D('Aboutme');
		$result = $aboutme -> find('1');
		$this -> assign('result',$result);
		$this -> display();
	}
}