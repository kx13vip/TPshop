<?php
namespace Admin\Controller;
use Component\AdminController;
header("content-type:text/html;charset=utf-8");
/**
 * 2016-09-19开始thinkphp学习!Come On Go!
 * @authors Your Name (you@example.org)
 * @date    2016-10-01 17:58:31
 * @version $Id$
 */
//后台商品控制器

class GoodsController extends AdminController{

	//商品展示
	function showlist1(){
		//使用数据Model模型
		//实例化Model对象
		//$goods = new \Model\GoodsModel();//tp3.2之后就这样实例化，有实名空间object(Model\GoodsModel)
		//$goods = D('goods');//object(Think\Model)
		//$goods = D();//object(Think\Model)
		//$goods = M();//object(Think\Model)
		//$goods = M('goods');
		show_bug($goods);
		//$Qq = new \Model\QqModel();
		//show_bug($Qq);
		$this -> display();
	}

	function showlist2(){
		$goods = D('Goods');
		//$info = $goods -> select();//获得数据信息
		//show_bug($info);
		//foreach ($info as $k => $v){
			//echo $v['goods_name'] . '<br />';
		//}
		//取出价格大于1000的商品
		//where(内部$this，return $this)
		//$info = $goods -> where("goods_price > 1000 and goods_name like '索%'") -> select();
		//查询指定字段
		//$info = $goods -> field('goods_id,goods_name') -> select ();
		//限制条数
		//$info = $goods -> limit(5) -> select();
		//查询当前商品一共的分组信息
		/*
			通过分组设置可以查询每个分组的商品信息
			如：每个分组下边有多少商品信息
			select category_id,count(*) from table group by category_id;
			每个分组下边有多少商品信息
			select category_id,sum(price) from table group by category_id;
		 */
		//$info = $goods -> field('goods_category_id') -> select();//查询出结果有重复的
		//$info = $goods -> field('goods_category_id') -> group('goods_category_id') -> select();
		//show_bug($info);
		//排序显示结果order by goods_price desc
		//$info = $goods -> order('goods_price desc') -> select();
		/*
		//$obj -> table(数据表);   设置具体操作数据表
			$goods = D();//未指定在goods表，而是在父类表
			$info = $goods ->select();//空
			$info = $goods -> table('sw_goods') -> select();
		*/
		//把数据assign到模板
		$this -> assign('info' , $info);


		$this -> display();
	}

	function showlist(){
		$goods = D('Goods');

		//查询主键值等于30的记录信息
		//$info = $goods -> select(30);//返回一个二维数组
		//$info = $goods -> select('2,3,4,6');
		//$info = $goods -> find(30);//返回一个一维数组
		//$info = $goods -> having('goods_price > 1000') -> select();
		//$info = $goods -> where('goods_price > 1000') -> count();
		//show_bug($info);
		//echo $goods -> count();
		//echo $goods -> max('goods_price');

		//1.获得当前记录总条数
		$total = $goods -> count();
		$per = 7;
		//2.实例化分页类对象
		$page = new \Component\Page($total,$per);//autoload
		//3.拼装sql语句获得每页信息
		$sql = 'select * from sw_goods ' . $page -> limit;
		$info = $goods -> query($sql);
		//4.获得页码列表
		$pagelist = $page -> fpage();
		//$info = $goods -> select();
		$this -> assign('info' , $info);
		$this -> assign('pagelist' , $pagelist);
		$this -> display();
	}

	//添加商品
	function add1(){
	 	//利用数组方式实现数据添加
	 	$goods = D('Goods');
	 	/*
	 	$arr = array(
	 			'goods_name' => 'iphone5s',
	 			'goods_price' => 4999,
	 			'goods_number' => 53,
	 		);
	 	$rst = $goods -> add($arr);
	 	*/
	 
		//利用AR实现数据添加
		$goods -> goods_name = 'htc_one';
		$goods -> goods_price = 3000;
		$rst = $goods -> add();

	 	if ($rst > 0) {
	 		echo 'success';
	 	}else{
	 		echo 'failure';
	 	}
		$this -> display();
	}

	function add(){
		//两个逻辑1.展现表单。2.接收表单数据
		$goods = D('goods');
		if (!empty($_POST)) {

			//判断附件是否上传
			//如果有则实例化Upload,把附件上传到服务器指定位置
			//然后把附件路径名获得到，存入$_POST
			if (!empty($_FILES)) {
				$config = array(
				'rootPath'      =>  './public/', //保存根路径,这个'./'相当于入口文件走的；而模板文件中的'./'是相当于控件器走的
				'savePath'      =>  'upload/', //保存路径
					);
				//附件被上传到：根目录/保存路径/创建日期目录
				$upload = new \Think\Upload($config);
				//show_bug($upload);
				//uploadOne会返回已经上传的附件信息
				$z = $upload -> uploadOne($_FILES['goods_img']);
				if (!$z) {
					show_bug($upload -> getError());//获得上传附件产生的错误信息
				}else{
					//拼装图片的路径名
					$bigimg = $z['savepath'] . $z['savename'];
					//show_bug($bigimg);
					$_POST['goods_big_img'] = $bigimg;


					//把已经上传的图片制作缩略图Image.class.php
					$image = new \Think\Image();
					//open();//打开图像资源，通过路径名找到图像
					$srcimg = $upload -> rootPath.$bigimg;//$upload -> rootPath;是无法直接访问的，通过魔术方法__get()方法来访问
					$image -> open($srcimg);
					$image -> thumb(40,40);//按照比例缩小
					$smallimg = $z['savepath'] . 'small_' . $z['savename'];
					//保存时要绝对路径
					$image -> save($upload -> rootPath . $smallimg);
					$_POST['goods_small_img'] = $smallimg;
				}
			}



			//print_r($_POST);
			/*数组加入模式：
			$arr = $_POST;
			$rst = $goods -> add($arr);
			*/
		
			/*AR模式写入模式
			$goods -> goods_name = $_POST['goods_name'];
			$goods -> goods_price = $_POST['goods_price'];
			$goods -> goods_number = $_POST['goods_number'];
			$goods -> goods_weight = $_POST['goods_weight'];
			$goods -> goods_introduce = $_POST['goods_introduce'];
			*/
			$goods -> create();//收集post表单数据，但不保存，且会自动过滤非法字段
			$rst = $goods -> add();
			if ($rst) {
				//展现一个提示页并做跳转，success('提示信息' ，url路由地址)
				$this -> success('添加商品成功' , U('Goods/showlist'));
				//echo 'success';
			}else{
				$this -> error('添加商品失败' , U('Goods/showlist'));
				//echo 'error';
			}
		}else{
		$this -> display();
		}

	}

	//修改商品
	function update1(){
		$goods = D('Goods');
		$arr = array(
				//'goods_id' => 60,
				'goods_name' => '黑莓手机',
				'goods_price' => 2300
			);
		//$rst = $goods -> where('goods_id>60 and goods_id < 65') -> save($arr);
		//show_bug($rst);
		$this -> display();
	}

	function update($goods_id){
		//echo $_GET['goods_id'];//这样太明显不建议使用，使用参数方式
		//查询商品被修改信息并传递给模板展示
		$goods = D('Goods');
		//两个逻辑1.展示表单。2.收集表单
		if (!empty($_POST)) {
			//print_r($_POST);
			$goods -> create();//收集表单信息
			//$rst = $goods -> where('goods_id = $goods_id') -> save();//这种方法就不用做隐藏域了
			$rst = $goods -> save();//未写where条件语句，不能执行；但在表单中有good_id传递过来，可以执行
				if ($rst) {
					echo 'success';
				}else{
					echo 'failure';
				}
		}else{
			$info = $goods -> find($goods_id);//一维数组
			$this -> assign('info' , $info);
			$this -> display();
		}
	}

	//删除数据
	function del(){
		$goods = D('Goods');
		//$rst = $goods -> delete(63);
		//$rst = $goods -> delete('62,64,65');
		$rst = $goods -> where('goods_id > 58') -> delete();
		show_bug($rst);
	}

	//跨控制器调用实验
	function getMoney(){
		return '1000现金';
	}

    //设置缓存
    function s1(){
        S('name','tom',10);
        S('age',25);
        S('addr','北京');//默认的时间是永久
        S('hobby',array('篮球','排球','棒球'));
        echo "success";
    }
    
    //读取缓存数据
    function s2(){
        echo S('name'),"<br />";
        echo S('age'),"<br />";
        echo S('addr'),"<br />";
        print_r(S('hobby'));echo "<br />";
    }
    
    function s3(){
        //S('age',null);
        echo "delete";
    }

    function y1(){
        //外部用户访问的方法
        show_bug($this -> y2());
    }
    function y2(){
        //被其他方法调用的方法，获得指定信息
        //第一次从数据库获得，后续在有效期从缓存里边获得
        $info = S('goods_info');
        if($info){
            return $info;
        } else {
            //没有缓存信息，就从数据库获得数据，再把数据缓存起来
            //连接数据库
            $dt = "apple5s".time();
            S('goods_info',$dt,10);
            return $dt;
        }
    }



}

?>