<?php
namespace Admin\Model;
use Think\Model;
class CateModel extends Model{

	protected $_validate = array(
		array('catename','require','栏目名称必须！',1,'regex'),
		array('catename','','栏目名称不得重复！',0,'unique',3),
		array('sort','require','栏目排序必须！',1,'regex')
	);
}