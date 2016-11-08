<?php
    namespace Home\Controller;
    use Think\Controller;
    class BaseController extends Controller{
        public function nowAndHot(){
            //显示最新文章
            $sql = "select id,title from blogag_article where is_del = 0 order by id desc limit 5";
            $new_article = M('article')->query($sql);
            $this->assign('new_article',$new_article);

            //显示热门文章
            $sql = "select id,title,hits from blogag_article where is_del = 0 order by hits desc limit 5";
            $hits_article = M('article')->query($sql);
            $this->assign("hits_article",$hits_article);
            /*显示标签云*/
            $cate = M('cate');
            $sql = "select count(*) as num,a.cate_id,a.cate_name from blogag_cate as a left join blogag_article as b on a.cate_id = b.pid where a.cate_pid <>0 group by b.pid order by num desc";
            $cateData = $cate->query($sql);
            $this->assign('cateData',$cateData);
        }
    }

?>