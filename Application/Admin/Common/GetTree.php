
<?php 
	//无限级分类的类
	/**
	 * [$pid description]
	 *  参数1 传递的数据库的二维数组
	 *  参数2 传递的数据库的pid信息,这里是cont_sort
	 *  参数3 定义的参数$level，主要作用是显示分类级别
	 */


	function getTrees($row,$pid=0,$level=0){
			//1.定义一个数组来接收数据
			static $treeArr =  array();
			//2.遍历数据库中的数据
			foreach($row as $value){
				//3.  为 0 是主类别
				if($value['cate_pid'] == $pid ){
					//给value新加一个元素
					$value['level'] = $level;
					$treeArr[] = $value;
					//4. 不为0时 递归
					getTrees($row,$value['cate_id'],$level+1);
				}
			}
			return $treeArr;		
	}




?>
