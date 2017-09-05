<?php
namespace Admin\Controller;
use Think\Controller;
class LinkController extends CommonController {
    public function lst(){
        $link = D('Link');
        $count = $link -> count('id');
        $page = new \Think\Page($count,6);
        $page -> rollPage = 5;
        $page -> setConfig('prev','上一页');
        $page -> setConfig('next','下一页');
        $show = $page -> show();
        $list = $link -> order('id') -> limit($page->firstRow,$page->listRows) -> select();
        $this -> assign('list',$list);
        $this -> assign('page',$show);
        $this -> display();
    }

    public function add(){
        $link = D('Link');
        if(IS_POST){
            $data['title'] = I('title');
            $data['url'] = I('url');
            $data['descr'] = I('descr');
            if(!$link->create($data)){
                $this -> error($link->getError());
            }else{
                if($link->add()){
                    $this -> success("链接添加成功！",U("Admin/link/lst"));
                }else{
                    $this -> error("链接添加失败！");
                }
            }
            return;
        }
        $this -> display();
    }

    public function edi(){
        $link = D("Link");
        if(IS_POST){
            $data["id"] = I("id");
            $data["title"] = I("title");
            $data["url"] = I("url");
            $data["descr"] = I("descr");
            if($link->create($data)){
                if($link->save()){
                    $this -> success("修改成功",U("Admin/link/lst"));
                }else{
                    $this -> error("修改失败");
                }
            }else{
                $this->error($link->getError());
            }
            return;
        }
        $data = $link -> find(I("linkid"));
        $this -> assign(data,$data);
        $this -> display();
    }

    public function del($linkid){
        $link = D('Link');
        $result = $link -> delete($linkid);
        if($result){
            $this -> success("删除成功",U('lst'));
        }else{
            $this -> error("删除失败");
        }
    }

    public function plDel(){
        $link = D('Link');
        if(IS_POST){
            $ids = I('id');
            $idstr = implode(',',$ids);
            $result = $link -> delete($idstr);
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