<?php
    //1.
    namespace Admin\Controller;
    //2. 引入核心类
    use Think\Controller;
    //3. 定义类
    class LoginController extends Controller{
        //1.显示登录界面
        public function login(){
            if(IS_POST){  //检查登录情况
                $admin = D('Admin');
                $data = $admin->field('admin_name,password,verify')->create();
               if(!$data){  //自动验证失败
                   $this->error($admin->getError());
               } else {    //自动验证成功
                    //接受用户名和密码判断是否正确
                   $admin_name = I('post.admin_name');
                   $password = I('post.password');
                   $salt = "qwerdf";//密码密钥
                   //从数据库中查询数据
                   $res = $admin->where("admin_name = '$admin_name'")->find();
                   if($res['password'] == md5(md5($password).$salt)){
                       session('admin',$res);//保持session信息

                       //上一次的登录时间
                       $prev_login = $res['addtime'];
                       $admin->where("admin_name = '$admin_name'")->setField('prev_login',$prev_login);

                       //将登录次数num加1，记录登录时间
                       //setInc 将num加1
                       $admin->where("admin_name = '$admin_name'")->setInc('num');

                       //更新这次登录时间
                       $addtime = time();
                       $admin->where("admin_name = '$admin_name'")->setField('addtime',$addtime);

                       $this->success("登录成功",U('Admin/Index/index'));
                   }   else {
                       $this->error("用户名或密码不正确");
                   }
               }

            }  else { //显示登陆界面
                $this->display();
            }
        }
        //2.生成验证码
        public function passcode(){
            //设置验证码的参数
            $config = array(
                'fontSize' => 30,  //验证码字体大小
                'length'   => 4,   //验证码位数
                'useCurve' =>false,//不显示混淆线
            );
            //1.实例化验证码类   设置了参数要传递参数
            $Verify = new \Think\Verify($config);
            //2.调用生成验证码的方法
            $Verify->entry();
        }

        //3.退出登录
        public function logout(){
            //销毁session
            session('admin',null);
            $this->success("退出成功",U('Admin/Login/login'));
        }

    }