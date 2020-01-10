<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController{
        public function index(){
       	 	$this->display();
	    }
	    public function index_right(){
	    	$admin=M('admin')->select();
	    	$this->assign('admin',$admin);
	        $this->display();
	    }
}