<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //查询文章
        $article = D('Article');

        $sql = "select a.id,a.pid,a.title,a.thumb,a.introduce,a.addtime,a.author,b.cate_name from blogag_article a left join blogag_cate b on a.pid = b.cate_id where a.is_del = 0 and a.isrecommend = 1 order by addtime desc limit 6;";
        $data = $article->query($sql);
        $this->assign('data',$data);

        //显示最新文章
            $sql = "select id,title from blogag_article where is_del = 0 order by id desc limit 5";
            $new_article = $article->query($sql);
            $this->assign('new_article',$new_article);

        //显示热门文章
            $sql = "select id,title,hits from blogag_article where is_del = 0 order by hits desc limit 5";
            $hits_article = $article->query($sql);
            $this->assign("hits_article",$hits_article);
        /*显示标签云*/
            $cate = M('cate');
            $cateData = $cate->field('cate_id,cate_name')->where('cate_pid <>0')->select();
            //dump($cateData);exit;
            $this->assign('cateData',$cateData);

        $this->display();
    }
}