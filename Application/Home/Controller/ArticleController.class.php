<?php
    namespace Home\Controller;
    use Think\Controller;
    //定义文章详细界面
    class ArticleController extends Controller{
        //显示文章界面
        public function lst(){
            //1.显示文章详细界面
                $id = $_GET['id']+0;
                $article = M('Article');
                $data = $article->where("id = $id")->find();
                //对文章内容的反转义
                $data['content'] = htmlspecialchars_decode($data['content']);
                $this->assign('data',$data);

            //2.显示最新文章
                $sql = "select id,title from blogag_article where is_del = 0 order by id desc limit 5";
                $new_article = $article->query($sql);
                $this->assign('new_article',$new_article);

            //3.显示热门文章
                $sql = "select id,title,hits from blogag_article where is_del = 0 order by hits desc limit 5";
                $hits_article = $article->query($sql);
                $this->assign("hits_article",$hits_article);

            //4.显示分类
                $sql = "select b.cate_name from blogag_article as a left join blogag_cate as b on a.pid = b.cate_id where a.id = $id";
                $sort = $article->query($sql);
                $sort = $sort[0]['cate_name'];
                $this->assign('sort',$sort);

            //5.查询分类
                $cate_pid = M('cate')->field('cate_pid')->where("cate_name = '$sort'")->find();
                $cate_pid = $cate_pid['cate_pid'];
                $cate_sort = M('cate')->field('cate_name')->where("cate_id = $cate_pid")->find();
                $cate_sort = $cate_sort['cate_name'];
                $this->assign('cate_sort',$cate_sort);

            //6.相关文章
                $sql = "select a.title,a.id from blogag_article as a left join blogag_cate as b on a.pid = b.cate_id where b.cate_name = '$sort' and a.id <> $id ";
                $connect_data = $article->query($sql);
                $this->assign('connect_data',$connect_data);

            //7.上一篇和下一篇
                $prev = $article->field('title,id')->where("id < $id")->limit(1)->find();
                $next = $article->field('title,id')->where("id > $id")->limit(1)->find();
                $this->assign('prev',$prev);
                $this->assign('next',$next);


            $this->display();
        }
    }
?>