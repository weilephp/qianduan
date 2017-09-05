<?php
namespace Admin\Model;
use Think\Model;
class LinkModel extends Model{
	protected $_validate = array(
		array('title','require','链接名称必须！',1,'regex'),
		array('url','require','链接地址必须！',1,'regex'),
	);

}