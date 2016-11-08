<?php
/**
 * 文章模型类
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/1
 * Time: 22:07
 */
    //1.定义命名空间
    namespace Admin\Model;

    //2.引入核心模型
    use Think\Model;

    //3.定义核心模型类
    class ArticleModel extends Model {
        //1.定义主键
        protected $pk = 'id';

        //2. 自动验证
        protected $_validate = array(
            array('title','require','标题不能为空'),
            array('pid','number','所属类别不合法'),
            array('keyword','require','关键字不能为空'),
            array('isrecommend','number','推荐不合法'),
            array('author','require','作者不能为空'),
            array('content','require','文章内容不能为空'),
            array('orders','number','排序不合法')
        );


    }
