<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{
	public function _initialize(){
		if(!session('id')){
			$this -> error("请先登录",U("Login/index"));
		}
	}
}