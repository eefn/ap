<?php 
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function _initialize(){
		$admin_name=session('admin_name');
		if(!$admin_name){
			$this->redirect('Admin/Login/login');
			exit();
		}
		$admin_img=M('admin')->field('image')->where("name ='$admin_name'")->find();
		$this->assign('admin_name',$admin_name);
		$this->assign('admin_img',$admin_img['image']);
	}

	public function _empty(){
		$this->error('你的操作有误,返回主页',U('Admin/Index/index_right'));
		exit();
	}
}