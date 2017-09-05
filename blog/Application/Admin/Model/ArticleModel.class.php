<?php
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model{
	protected $_validate = array(
		array('title','require','文章名称必须！',1,'regex'),
		array('cateid','require','文章分类必须！',1,'regex'),
		array('content','require','文章内容必须!',0,'regex'),
	);

}