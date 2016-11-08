<?php
    //1.定义命名空间
    namespace Admin\Controller;
    //2.引入好像类
    use Think\Controller;
    //3.定义类
    class CommonController extends Controller{
        //1.检查session 定义一个改造方法
        public function _initialize(){
            //检查是否存在session
            $value = session('admin');
            if(empty($value)){ //session不存在
                 $this->error('您还没有登录',U('Admin/Login/login'));
            }
        }

    }