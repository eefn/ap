<?php 
namespace Home\Controller;
use Think\Controller;
class AboutController extends CommonController{
	//案例
	public function page(){
		$fabout=M('about')->order('ord asc')->find();
		$fid=$fabout['id'];
		$id=isset($_GET['id'])?I('get.id'):$fid;
		$fabout=M('about')->where("id ='$id'")->find();
		$about=M('about')->order('ord asc')->select();
		$this->assign('fabout',$fabout);
		$this->assign('about',$about);
		$this->display();
	}
}