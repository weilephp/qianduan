<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController {
    public function lst(){
        $article = D('ArticleView');
        $cate = D('Cate');
        $count = $article -> count();
        $page = new \Think\Page($count,5);
        $page -> rollPage = 5;
        $page -> setConfig('prev','上一页');
        $page -> setConfig('next','下一页');
        $show = $page -> show();
        $list = $article -> order('id') -> limit($page->firstRow,$page->listRows) -> select();
        $catelist = $cate -> select();
        $this -> assign('catelist',$catelist);
        $this -> assign('list',$list);
        $this -> assign('page',$show);
        $this -> display();
    }

    public function add(){
    	$article = D('Article');
    	if(IS_POST){
   			$data["title"] = I("title");
			$data["content"] = I("content");
			$data["descr"] = I("descr");
			$data["cateid"] = I("cateid");
            $data['recommend'] = I('recommend');
			$data["time"] = date('Y-m-d H:i:s');
    		if($_FILES['pic']['tmp_name']!=""){
    			$upload = new \Think\Upload;
				$upload -> maxSize = 3145728;
				$upload -> exts = array("jpg","gif","jpeg","png");
				$upload -> rootPath = "./";
				$upload -> savePath = "Public/upLoad/";
				$info = $upload -> upload();
				if(!$info){
					$this -> error($upload -> getError());
				}else{
					$data['pic'] = $info['pic']['savepath'].$info['pic']['savename'];
				}
    		}
    		if(!$article -> create($data)){
    			$this -> error($article -> getError());
    		}else{
    			if($article -> add()){
    				$this -> success('文章添加成功！',U('lst'));
    			}else{
    				$this -> error('文章添加失败！');
    			}
    		}

    		return;
    	}
        $cate = D('Cate');
        $catedata = $cate -> select();
        $this -> assign('catedata',$catedata);
    	$this -> display();
    }

    public function cateArticleLst(){
        $cateid = I('cid');
        $article = D('ArticleView');
        $cate = D('Cate');
        $count = $article -> where(array('cateid' => $cateid)) -> count();
        $page = new \Think\Page($count,5);
        $page -> rollPage = 5;
        $page -> setConfig('prev','上一页');
        $page -> setConfig('next','下一页');
        $show = $page -> show();
        $list = $article -> order('id') -> where(array('cateid' => $cateid)) -> limit($page->firstRow,$page->listRows) -> select();
        $catelist = $cate -> select();
        $this -> assign('catelist',$catelist);
        $this -> assign('list',$list);
        $this -> assign('page',$show);
        $this -> display();
    }

    public function cateArticleLstSolve(){
        if(IS_POST){
            $cateid = I('cateid');
            if($cateid != '全部'){
                $data['url'] = '/blog/Admin/Article/cateArticleLst/cid/'.$cateid;
            }else{
                $data['url'] = '/blog/Admin/Article/lst/';
            }
            $this -> ajaxReturn($data);
        }
    }

    public function searchLst(){
        $keyword = I('keyWord');
        $article = D('ArticleView');
        $cate = D('Cate');
        $where['id'] = array('like','%'.$keyword.'%');
        $where['title'] = array('like','%'.$keyword.'%');
        $where['catename'] = array('like','%'.$keyword.'%');
        $where['descr'] = array('like','%'.$keyword.'%');
        //$data_like['time'] = array('like','%'.time($keyword).'%');
        $where['_logic'] = 'OR';
        $count = $article -> where($where) -> count();
        $page = new \Think\Page($count,5);
        $page -> rollPage = 5;
        $page -> setConfig('prev','上一页');
        $page -> setConfig('next','下一页');
        $show = $page -> show();
        $list = $article -> order('id') -> where($where) -> limit($page->firstRow,$page->listRows) -> select();
        $catelist = $cate -> select();
        $this -> assign('catelist',$catelist);
        $this -> assign('list',$list);
        $this -> assign('page',$show);
        $this -> display();

    }

    public function edi(){
        $article = D("Article");
        if(IS_POST){
            $data["id"] = I("id");
            $data["title"] = I("title");
            $data["content"] = I("content");
            $data["descr"] = I("descr");
            $data["cateid"] = I("cateid");
            $data['recommend'] = I('recommend');
            $data["time"] = date('Y-m-d H:i:s');
            if($_FILES['pic']['tmp_name']!=""){
                $upload = new \Think\Upload;
                $upload -> maxSize = 3145728;
                $upload -> exts = array("jpg","gif","jpeg","png",);
                $upload -> rootPath = "./";
                $upload -> savePath = "Public/upLoad/";
                $info = $upload -> upload();
                if(!$info){
                    $this -> error($upload->getError());
                }else{
                    $data['pic'] = $info['pic']['savepath'].$info['pic']['savename'];
                }
            }
            if($article->create($data)){
                if($article->save()){
                    $this -> success("修改成功",U("Admin/article/lst"));
                }else{
                    $this -> error("修改失败");
                }
            }else{
                $this->error($article->getError());
            }
            return;
        }
        $data = $article -> find(I("aid"));
        $this -> assign(data,$data);
        $cate = D("Cate");
        $catedata = $cate -> field("catename,id") -> select();
        $this -> assign("catedata",$catedata);
        $this -> display();
    }

    public function del($aid){
        $article = D('Article');
        $result = $article -> delete($aid);
        if($result){
            $this -> success("删除成功",U('lst'));
        }else{
            $this -> error("删除失败");
        }
    }

    public function plDel(){
        $article = D('Article');
        if(IS_POST){
            $ids = I('id');
            $idstr = implode(',',$ids);
            $result = $article -> delete($idstr);
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