<?php
/**
 * 文章控制器
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/1
 * Time: 22:05
 */
    //1.定义命名空间
    namespace Admin\Controller;

    //2.引人核心控制器
    use Think\Controller;

    //3.定义文章类
    class ArticleController extends CommonController{

        //1.显示添加界面
        public function add(){
            if(IS_POST){ //执行添加操作
                $article = D('Article');
                $data = $article->field('title,pid,keyword,isrecommend,author,images,introduce,content,orders')->create();
                if(!$data){ //自动验证失败
                    $this->error($article->getError());
                } else {
                     //设置添加时间
                     $data['addtime'] = time();

                     //上传图片和生成缩略图
                    $upload = new \Think\Upload();
                     //设置参数
                    $upload->maxSize =  2097152;//2m
                    $upload->exts = array('jpg','png','jpeg','gif','bmp');
                    $upload->rootPath = "./Public/Uploads/Article/";//上传路径
                     //上传文件  单文件上传
                    $info = $upload->uploadOne($_FILES['images']);
                    if(!$info){ //文件上传失败
                         $this->error($upload->getError());
                    }  else {
                        //存储路径
                        /*dump($info);exit;*/
                        $images_path = $info['savepath'].$info['savename'];
                        $data['images'] = $images_path;

                        //生成缩略图
                        $image = new \Think\Image();
                        $image->open("./Public/Uploads/Article/".$images_path);

                        $thumb_path = $info['savepath']."thumb_".$info['savename'];
                        $image->thumb(180,130,2)->save("./Public/Uploads/Article/".$thumb_path);

                        $data['thumb'] = $thumb_path;
                    }

                    //执行添加操作
                    if(!$article->add($data)){
                        $this->error("添加失败");
                    } else {
                        $this->success("添加成功",U('lst'));
                    }


                }

            } else {   //显示添加界面

                //显示所属类别
                $cate = D('cate');
                $list = $cate->select();

                //引入无限级分类
                load("@/GetTree");
                $data = getTrees($list);

                $this->assign('data',$data);

                $this->display();
            }

        }

        //2.显示列表界面
        public function lst(){
         //从artilce表中读取出数据
            $article = D('Article');

         //显示分页
             $count = $article->where("is_del = 0")->count();
             $Page  = new \Think\Page($count,1);//param2 每页显示的条数
            //设置样式
            $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
            $Page->setConfig('prev', '上一页');
            $Page->setConfig('next', '下一页');
            $Page->setConfig('last', '末页');
            $Page->setConfig('first', '首页');
            $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
            $Page->lastSuffix = false;//最后一页不显示为总页数

            $show = $Page->show();
            $this->assign("pageStr",$show);

            $offset = $Page->firstRow;
            $pageSize = $Page->listRows;
            

         //查询数据
            $sql = "select b.cate_name,a.id,a.title,a.pid,a.keyword,a.isrecommend,a.author,a.introduce,a.hits,a.comments from blogag_article a left join blogag_cate b on a.pid = b.cate_id where a.is_del = 0 order by a.addtime desc limit $offset,$pageSize ";

            $data = $article->query($sql);

            $this->assign('offset',$offset);
            $this->assign('data',$data);


            $this->display();
        }

        //3.推荐的ajax处理程序
        public function change_recom(){
            if(IS_AJAX){
                $id    = I('get.id');
                $value = I('get.value');
                $field = I('get.field');

                $values = 0;
                if($value == "0"){   //原本为no.gif 不推荐 要变为推荐
                    $values = 1;
                } else {
                    $values = 0;
                }

                $article = D('article');
                //执行修改操作
                $res = $article->where("id = $id")->setField($field,$values);
                if($res){ //修改成功
                      echo 0;
                } else {
                    echo 1;
                }

            }  else {
                $this->error("参数错误");
            }
        }

        //4.执行删除操作，实际上将数据放入回收站
        public function del(){
           if(IS_GET){
               $id = I('get.id');  //得到一个字符串把其转为数组
               $arr_id = explode(",",$id);


               $article = D('Article');
               foreach($arr_id as $v){
                   $aff = $article->where("id = $v")->setField('is_del',1);
               }
               if($aff !== false){
                   $this->success("删除成功",U('Admin/Article/lst'));
               }  else {
                   $this->error("删除失败");
               }
           } else {
               $this->error("参数错误");
           }
        }

        //5.执行修改操作
        public function edit(){

            if(IS_POST){  //修改操作
                //要修改的id   转化为整形
                $id = (int)I('post.id');

                $article = D('Article');
                $data = $article->create();
                if(!$data){
                    $this->error($article->getError());
                } else {
                    $data['addtime'] = time();

                    //判断图像是否重新上传了
                    if($_FILES['images']['size'] == 0){  //图像未重新上传
                         $data['images'] = I('post.old_images');
                         $data['thumb'] = I('post.old_thumb');
                    } else {                            //图像已经重新上传
                      //1.删除原来的图像和缩略图
                        $images_thumb = $article->field('images,thumb')->where("id =$id")->find();

                        foreach($images_thumb as $v){   //unlink删除原来的图像
                              unlink("./Public/Uploads/Article/".$v);
                        }
                      //2.生成新的图像和缩略图
                        $upload = new \Think\Upload();
                        //设置参数
                        $upload->maxSize =  2097152;//2m
                        $upload->exts = array('jpg','png','jpeg','gif','bmp');
                        $upload->rootPath = "./Public/Uploads/Article/";//上传路径
                        //上传文件  单文件上传
                        $info = $upload->uploadOne($_FILES['images']);
                        if(!$info){ //文件上传失败
                            $this->error($upload->getError());
                        }  else {
                            //存储路径
                            /*dump($info);exit;*/
                            $images_path = $info['savepath'].$info['savename'];
                            $data['images'] = $images_path;

                            //生成缩略图
                            $image = new \Think\Image();
                            $image->open("./Public/Uploads/Article/".$images_path);

                            $thumb_path = $info['savepath']."thumb_".$info['savename'];
                            $image->thumb(150,150,2)->save("./Public/Uploads/Article/".$thumb_path);

                            $data['thumb'] = $thumb_path;
                        }
                    }

                    //执行修改操作
                    $aff = $article->where("id = $id")->save($data);
                    if($aff !== false){
                        $this->success("修改成功",U('lst'));
                    } else {
                        $this->error("修改失败");
                    }
                }


            } else {  //显示

                //显示修改的界面
                $id = I('get.id');
                //从数据库里面读出数据
                $article = D('Article');
                $data = $article->field('id,title,pid,keyword,isrecommend,author,images,thumb,introduce,content,orders')->where("id = $id")->find();

                //将content内容进行反转义
                $data['content'] = htmlspecialchars_decode($data['content']);                     $this->assign('data',$data);


                //从分类表中读取分类信息
                $cate = D('cate');
                $list = $cate->select();
                //引入无限级分类
                load("@/GetTree");
                $datas = getTrees($list);
                $this->assign('datas',$datas);

                $this->display();
            }



        }

        //6.显示回收站
        public function recycle(){
            $article = D('Article');

            //显示分页
            $count = $article->where("is_del = 1")->count();
            $Page  = new \Think\Page($count,1);//param2 每页显示的条数
            //设置样式
            $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
            $Page->setConfig('prev', '上一页');
            $Page->setConfig('next', '下一页');
            $Page->setConfig('last', '末页');
            $Page->setConfig('first', '首页');
            $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
            $Page->lastSuffix = false;//最后一页不显示为总页数

            $show = $Page->show();
            $this->assign("pageStr",$show);

            $offset = $Page->firstRow;
            $pageSize = $Page->listRows;


            $sql = "select b.cate_name,a.id,a.title,a.pid,a.keyword,a.isrecommend,a.author,a.introduce,a.hits,a.comments from blogag_article a left join blogag_cate b on a.pid = b.cate_id where a.is_del = 1 order by a.addtime desc";

            $data = $article->query($sql);

            $this->assign('offset',$offset);
            $this->assign('data',$data);

            $this->display();
        }



 }