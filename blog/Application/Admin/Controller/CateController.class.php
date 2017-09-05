<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends CommonController {
    public function lst(){
        $cate = D('Cate');
        $count = $cate -> count('id');
        $page = new \Think\Page($count,6);
        $page -> rollPage = 2;
        $page -> setConfig('prev','上一页');
        $page -> setConfig('next','下一页');
        $show = $page -> show();
        $list = $cate -> order('sort') -> limit($page->firstRow,$page->listRows) -> select();
        $this -> assign('list',$list);
        $this -> assign('page',$show);
        $this -> display();
    }

    public function add(){
    	$cate = D('Cate');
        if(IS_POST){
            if(!$cate -> create()){
                $this -> error($cate -> getError());
            }else{
                if($cate -> add()){
                    $this -> success('栏目添加成功！',U('lst'));
                }else{
                    $this -> error('栏目添加失败！');
                }
            }
            return;
        }
    	$this -> display();
    }

    public function edi(){
        $cate = D('Cate');
        if(IS_POST){
            $data['id'] = I('cateid');
            $data['catename'] = I('catename');
            $data['sort'] = I('sort');
            if(!$cate -> create($data)){
                $this -> error($cate -> getError());
            }else{
                if(($cate -> save())!==false){
                    $this -> success('栏目修改成功！',U('lst'));
                }else{
                    $this -> error('栏目修改失败！');
                }
            }

            return;
        }
        $cateid = I('cateid');
        $catedata = $cate -> where(array('id' => $cateid)) -> find();
        $this -> assign('catedata',$catedata);
        $this -> display();
    }

    public function del($cateid){
        $cate = D('Cate');
        $article = D('Article');
        $result = $cate -> delete($cateid);
        $article -> where(array('cateid' => $cateid)) -> delete();
        if($result){
            $this -> success("删除成功",U('lst'));
        }else{
            $this -> error("删除失败");
        }
    }

    public function plDel(){
        $cate = D('Cate');
        $article = D('Article');
        if(IS_POST){
            $ids = I('id');
            $idstr = implode(',',$ids);
            $result = $cate -> delete($idstr);
            $article -> where(array('cateid' => $idstr)) -> delete();
            if($result){
                $data['msg'] = "删除成功！";
            }else{
                $data['msg'] = "删除失败！";
            }

            $this -> ajaxReturn($data);
        }
        return;
    }

    public function sort(){
        $cate = D('Cate');
        $ids = I()['id'];
        $sortValues = I()['sortValue'];
        for($i=0;$i<count($ids);$i++){
            $result[] = $cate -> where(array("id"=>$ids[$i])) -> setField("sort",$sortValues[$i]);
        }
        if(in_array(1,$result)){
            $data['msg'] = '更新排序成功！';
        }else{
            $data['msg'] = '更新排序失败！';
        }

        $this -> ajaxReturn($data);
    }
}