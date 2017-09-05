<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{
	protected $_validate = array(
		array('username','require','管理员名称必须！',1,'regex',1),
		array('username','','管理员名称不得重复！',1,'unique',1),
		array('username','require','管理员名称必须！',1,'regex',2),
		array('username','','管理员名称不得重复！',1,'unique',2),
		array('password','checkPassword','管理员密码必须！',1,'callback',1),
		array('username','require','用户名不得为空！',1,'regex',4),
		array('password','require','密码不得为空！',1,'regex',4),
		array('verify','check_verify','验证码不正确！',1,'callback',4),
	);

	public function checkPassword($password){
		if($password == md5('')){
			return false;
		}else{
			return true;
		}
	}

	public function check_verify($code,$id=''){
		$verify = new \Think\Verify();
		return $verify -> check($code,$id);
	}
}