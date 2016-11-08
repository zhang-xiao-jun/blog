<?php
/**
 * index的控制页面
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/28
 * Time: 17:57
 */
    //1.设置命名空间
    namespace Admin\Controller;

    //2.引入核心类
    use Think\Controller;

    //3.定义index类
    class IndexController extends CommonController{
        //1.定义显示index界面
        public function index(){
            //读取session
            $admin_name = session('admin')['admin_name'];
            $this->assign('admin_name',$admin_name);

            //查询信息，来显示登陆次数与上次登录时间
            $admin = D('Admin');
            $data = $admin->field('num,prev_login')->where("admin_name = '$admin_name'")->find();

            $this->assign("data",$data);

            $this->display();
        }
    }