<?php
namespace Admin\Controller;
use Think\Controller;
class AboutmeController extends CommonController {
    public function index(){
        $aboutme = D('Aboutme');
        if(IS_POST){
            $data['id'] = I('id');
            $data['content'] = I('content');
            if($aboutme -> create($data)){
                if($aboutme -> save()){
                    $this -> success('修改成功！',U('index'));
                }else{
                    $this -> error('修改失败！');
                }
            }else{
                $this -> error($aboutme -> getError());
            }
            return;
        }
        $list = $aboutme -> select();
        $this -> assign('list',$list);
        $this -> display();
    }   
}