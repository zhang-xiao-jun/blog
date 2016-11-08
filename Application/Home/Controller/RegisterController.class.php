<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller{

    /*显示注册界面*/
    public function lst(){
        $this->display();
    }

    /*执行注册操作*/
    public function doRegister(){
        if(IS_POST){
            $register = D('register');
            $data = $register->create();
            if(!$data){
                //验证没有通过
                $this->error($register->getError());
            } else {
                //验证通过
                foreach($data as $v){
                    //去掉用户名和密码的首尾空格
                    $data['username'] = trim($data['username']);
                    $data['password'] = trim($data['password']);
                }
                //验证用户名是否已经被注册
                $username = $data['username'];
                $result = $register->where("username = '$username'")->find();
                if($result){
                    $this->error("用户名已经存在！");
                    exit;
                }
                $repassword = I('post.repassword','','trim');
                if($data['password'] !== $repassword){
                    $this->error('两次输入的密码不一致!');
                    exit;
                }
                //截取unqid的后6位作为密钥
                $salt = substr(uniqid(),-6);
                $data['salt'] = $salt;
                //对密码加密加密方式:md5(md5(password)+$salt)
                $data['password'] = md5(md5($data['password']+$salt));
                $data['create_time'] = time();
                $data['update_time'] = time();
                //dump($data);
                //获取上传的文件
                $image = $_FILES['img'];
                if($image['size'] == 0){ //没有上传图像时，设置一个默认的头像
                    $data['img'] = './Public/Home/images/ku.jpg';
                    $data['thumb'] = $this->createThumb($data['img']);
                    $data['thumb'] = '/Public/Home/images/thumb_ku.jpg';
                } else {
                    $info = $this->upload($image);
                    $data['img'] = './Public/Uploads/Register/'.$info['savepath'].$info['savename'];
                    //生成缩略图
                    $data['thumb'] =  $this->createThumb($data['img'],$info['savepath'],$info['savename']);
                    $data['thumb'] = './Public/Uploads/Register/'.$data['thumb'];
                }
                $register = D('Register');
                $result = $register->data($data)->add();
                if(!$result){
                    $this->error('注册失败!');
                }else{
                    $this->success('恭喜你,注册成功!');
                }
            }

        } else {
            $this->error('参数错误!');
        }
    }

    /*文件上传方法*/
    public function upload($uploads){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath  =      './Public/Uploads/Register/';
        $info   =   $upload->uploadOne($uploads);
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());    }
        else{// 上传成功
            return $info;
        }
    }

    /*生成缩略图*/
    public function createThumb($path,$savepath='',$savename=''){
        $image = new \Think\Image();
        $image->open($path);
        $save = $savepath.'thumb_'.$savename;
        $image->thumb(100, 100,2)->save($save);
        return $save;
    }

    /*检测用户名是否已经存在*/
    public function chkUsername(){
        if(IS_AJAX){
            $username = I('post.username');
            $register = D('register');
            $data = $register->where("username = '$username'")->find();
            if($data){
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $this->error("参数错误");
        }
    }
}