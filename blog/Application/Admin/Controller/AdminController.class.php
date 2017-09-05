<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController{
	public function lst(){
		$admin = D("Admin");
		$list = $admin -> select();
		$this -> assign("list",$list);
		$this -> display();
	}

	public function add(){
		$admin = D("Admin");
		$data['username'] = I('username');
		$data['password'] = md5(I('password'));
		if(IS_POST){
			if(!$admin->create($data)){
				$this -> error($admin->getError());
			}else{
				if($admin->add()){
					$this -> success("管理员添加成功！",U("Admin/Admin/lst"));
				}else{
					$this -> error("管理员添加失败！");
				}
				return;
			}
		}
		$this -> display();
	}

	public function edi(){
		$admin = D("Admin");
		if(IS_POST){
			$admins = $admin -> find(I('id'));
			if(I('password')==''){
				$data['password'] = $admins['password'];
			}else{
				$data['password'] = md5(I('password'));
			}
			$data["id"] = I("id");
			$data["username"] = I("username");
			if($admin->create($data)){
				if($admin->save()){
					$this -> success("修改成功",U("Admin/Admin/lst"));
				}else{
					$this -> error("修改失败");
				}
			}else{
				$this->error($admin->getError());
			}
			return;
		}
		$data = $admin -> find(I("adminid"));
		$this -> assign(data,$data);
		$this -> display();
	}

	public function del(){
		$admin = D("Admin");
		$data = $admin -> find(I('adminid'));
		if($data['username']!='supadmin'){
			$result = $admin -> delete(I("adminid"));
			if($result){
				$this -> success("删除成功",U("Admin/Admin/lst"));
			}else{
				$this -> error("删除失败");
			}
		}else{
			$this -> error("最高管理员不能删除！");
		}
	}

	public function plDel(){
        $admin = D('Admin');
        if(IS_POST){
            $ids = I('id');
            $idstr = implode(',',$ids);
        	$where['id'] = array('in',$idstr);
        	$admins = $admin -> where($where) -> select();
            foreach($admins as $k => $v){
            	if($v['username'] == 'supadmin'){
            		$data['msg'] = '包含超级管理员，不能删除！';
            		$this -> ajaxReturn($data);
            	}
            }
            $result = $admin -> delete($idstr);
            if($result){
                $data['msg'] = "删除成功！";
            }else{
                $data['msg'] = "删除失败！";
            }

            $this -> ajaxReturn($data);
        }
        return;
    }

}