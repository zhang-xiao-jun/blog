<?php
    namespace Home\Model;
    use Think\Model;
    class RegisterModel extends Model{
        protected $pk = 'id';
        /*定义验证规则*/
        protected $_validate = array(
            array('username','require','用户名不能为空!'),
            array('password','require','密码不能为空!'),
            array('password','5,18','密码必须是5-18位!',1,'length')
        );


    }
