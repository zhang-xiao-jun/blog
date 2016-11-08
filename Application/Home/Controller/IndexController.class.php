<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
        //查询文章
        $article = D('Article');

        $sql = "select a.id,a.pid,a.title,a.thumb,a.introduce,a.addtime,a.author,b.cate_name from blogag_article a left join blogag_cate b on a.pid = b.cate_id where a.is_del = 0 and a.isrecommend = 1 order by addtime desc limit 6;";
        $data = $article->query($sql);
        $this->assign('data',$data);

        $this->nowAndHot();

        $this->display();
    }
}