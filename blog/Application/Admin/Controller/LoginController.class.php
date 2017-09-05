<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
	public function index(){
		if(session('id')){
			$this -> error("你已经登录，无须重新登录！");
		}else{
			$this -> display('login');
		}
	}

	public function login(){
		$admin = D('Admin');
		$data['username'] = I('username');
		$data['password'] = I('password');
		$data['verify'] = I('verify');
		if($admin->create($data,4)){
			$where['username'] = array('eq',$data['username']);
			$info = $admin -> where($where) -> find();
			if(!$info){
				$this -> error('用户名不存在');
			}else{
				if($info['password']!=md5($data['password'])){
					$this -> error("密码不正确");
				}
				session('username',$info['username']);
				session('id',$info['id']);
				$this -> success("登录成功！",U('Index/index'));
			}
		}else{
			$this -> error($admin->getError());
		}
	}

	public function verify(){
		$verify = new \Think\Verify();
		$verify -> fontSize = 60;
		$verify -> length = 4;
		$verify -> useNoise = true;
		$verify -> entry();
	}

	public function logout(){
		if(session('username')){
			session(null);
			$this -> error("登出成功",U("Login/index"));
		}
	}
}