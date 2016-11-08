<?php
    namespace Home\Controller;
    use Think\Controller;
    class ArticleListController extends BaseController{
        public function lst(){
            if(IS_GET){
                //intval获取变量的整数值
                $cate_id = I('get.id','','intval');

                /*分页*/
                $count = M('article')->where("pid = $cate_id")->order("addtime desc")->count();
                $Page  = new \Think\Page($count,10);//param2 每页显示的条数
                //设置样式
                $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
                $Page->setConfig('prev', '上一页');
                $Page->setConfig('next', '下一页');
                $Page->setConfig('last', '末页');
                $Page->setConfig('first', '首页');
                $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
                $Page->lastSuffix = false;//最后一页不显示为总页数

                $show = $Page->show();
                $this->assign("page",$show);
                //dump($articleData);exit;

                /*显示*/
                $articleData = M('article')->field('title,id,pid,author,introduce,addtime,hits')->where("pid = $cate_id")->order("addtime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
                $this->assign('articleData',$articleData);

                $cateDatas = M('cate')->field('cate_name')->where("cate_id = $cate_id")->find();
                $this->assign('cateDatas',$cateDatas);
                //dump($cateData);exit;

                $otherCataData = M('cate')->field('cate_id,cate_name')->where("cate_id <> $cate_id and cate_pid <> 0")->select();
                $this->assign('otherCataData',$otherCataData);

                $this->nowAndHot();

                $this->display();
            }
        }
    }
?>