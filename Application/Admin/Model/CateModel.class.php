<?php
/**
 * 分类模型类
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/28
 * Time: 20:30
 */
    //1.定义命名空间
    namespace Admin\Model;

    //2.引人核心模型
    use Think\Model;

    //3.定义cate类
    class CateModel extends Model{
         //1.定义主键
        protected $pk = 'cate_id';

        //2.定义字段
        protected $fields = array('cate_id','cate_name','cate_pid','cate_remark','cate_order','cate_addtime');

        //3.自动验证
        protected $_validate = array(
                array('cate_name','require','分类名不能为空!'),
                array('cate_pid','require','分类不能为空!'),
                array('cate_pid','number','分类不合法'),
                array('cate_remark','require','分类介绍不能为空!'),
                array('cate_order','require','分类名排序不能为空!'),
                array('cate_order','number','分类排序不合法'),
        );

    }