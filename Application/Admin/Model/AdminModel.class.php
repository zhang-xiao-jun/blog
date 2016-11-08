<?php
    namespace Admin\Model;
    //引入核心类
    use Think\Model;
    //定义模型
    class AdminModel extends Model{
        //1.定义主键
        protected $pk = 'id';
        //2.自动验证
        protected $_validate = array(
            array('admin_name','require','用户名不能为空'),
            array('password','require','密码不能为空'),
            array('verify','require','验证码不能为空'),
            array('verify','check_verify','验证码不正确',1,'callback')
        );

        //3.定义检测验证码是否正确的方法
        protected function check_verify($code, $id = ''){
            $verify = new \Think\Verify();
            return $verify->check($code, $id);
        }

    }
?>