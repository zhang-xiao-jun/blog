<?php
/**
 * 分类管理类
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/28
 * Time: 18:25
 */
    //1.设置命名空间
    namespace Admin\Controller;

    //2.引入核心类
    use Think\Controller;

    //3.定义类
    class CateController extends CommonController{
        //1.显示分类添加界面
        public function add(){
            //查询数据显示
            $cate = D('Cate');
            $list = $cate->field('cate_id,cate_name,cate_pid')->select();

            //载入无限级分类的函数
             load('@/GetTree');
             $data = getTrees($list);

            $this->assign('data',$data);
            $this->display();
        }

        //2.添加操作
        public function addok(){
             //1实例化自定义模型类
            $cate = D('Cate');
            //2.判断
            /**
             * 1.判断post请求是否接收成功
             * 2.调用自动完成方法
             * 3.判断自动完成方法是否成功
             */
            if(IS_POST){
                    $data = $cate->field('cate_name,cate_pid,cate_remark,cate_order')->create();
                    //添加一个添加时间的数据
                    $data['cate_addtime'] = time();
                    //判断添加是否成功
                    if($cate->add($data)){
                        $this->success('添加成功','index',1);
                    }   else {
                        $this->error('添加失败');
                    }

            }   else {
                $this->error('参数接收失败');
            }

        }

        //3.添加成功的列表显示
        public function index(){
            //实例化自定义模型
            $cate = D('Cate');
            //从数据表中查询数据
            /*$list = $cate->order('cate_addtime desc')->select();*/
            $sql = "select c.*,a.cate_name as name from blogag_cate as c left join blogag_cate  as a on c.cate_pid = a.cate_id;";
            $list = $cate->query($sql);

            //引入无限级分类的函数
            load('@/GetTree');
            $data = getTrees($list);

            //分配变量
            $this->assign('data',$data);
            $this->display();
        }

        //4.删除一条处理方法
        public function delOne($id){
            if(IS_GET){
                //删除数据
                $cate = D('Cate');
                $affected = $cate->delete($id);
                if($affected > 0){
                    $this->success('删除成功',"/index.php/Admin/Cate/index",1);
                }  else {
                    $this->error("删除失败");
                }
            }   else {
                $this->error("参数错误");
            }
        }

        //5.删除多条记录
        public function delAll($id){
            if(IS_GET){
                //删除多条数据
                $cate = D('cate');
                $affected = $cate->delete($id);
                if($affected > 0){
                    $this->success('删除成功',"/index.php/Admin/Cate/index",1);
                }  else {
                    $this->error("删除失败");
                }

            }   else {
                $this->error("参数错误");
            }
        }

        //6.编辑数据
        public function edit($id){
             if(IS_GET){
               //修改数据
                 $cate = D ('cate');
                 $data = $cate->find($id);

                 //查询所有分类
                 $list=$cate->select();
                 //引入无线级分类
                 load("@/GetTree");
                 $datas = getTrees($list);

                 $this->assign('datas',$datas);
                 //分配变量
                 $this->assign('data',$data);
                 $this->display();
             }   else {
                 $this->error("参数接收失败");
             }
        }

        //7.修改数据
        public function editok(){
            if(IS_POST){
                //
                $cate = D("Cate");
                //自动完成
                $data = $cate->create();
                $id = I("post.id");

                //修改
                $affected = $cate->where("cate_id = $id")->save($data);
                if($affected > 0 ){
                    $this->success("修改成功","index");
                }  else {
                    $this->error("修改失败");
                }

            }   else {
                $this->error("参数错误");
            }
        }

    }