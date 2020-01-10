<?php 
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
	//登录
	public function login(){
		if(I('post.')){
			if(!$this->check_verify(I('post.verify'))){
				$this->error('验证码错误');
			}
			$data=array(
				'name'=>I('post.name'),
				'pwd'=>md5(I('post.pwd')),
				);
			$res=M('admin')->where($data)->find();
			if($res){
				session('admin_name',$res['name']);
				$this->success('登录成功',U('Admin/Index/index'));
				exit();
			}else{
				$this->error('用户名或者密码输入错误');
				exit();
			}
		}
		$this->display();
	}

	//退出登录
	public function log_out(){
		session(null);
		$this->success('退出成功',U('Admin/Login/login'));
		exit();
	}

	//验证码
	public function verify(){
		$config=array(
			'useImgBg'=>false,
			'useCurve'=>false,
			'useNoice'=>true,
			'fontSize'=>25,
			'length'=>4,
			'codeSet'=>'1234567890',
			);
		$verify=new \Think\Verify($config);
		$verify->entry();
	}

	//检查验证码
	private function check_verify($code,$id=''){
		$verify=new \Think\Verify();
		return $verify->check($code,$id);
	}
}