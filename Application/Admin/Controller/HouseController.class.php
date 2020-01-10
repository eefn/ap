<?php
namespace Admin\Controller;
use Think\Controller;
class HouseController extends BaseController{
	//房屋列表
	public function house_list(){
		$this->display();
	}
	//房屋列表ajax
	public function ajaxHouse(){
		$search=isset($_GET['search'])?I('get.search'):NULL;
		$count=M('house')->where("house_name LIKE '%$search%'")->count();
		$Page=new \Think\Page3($count,5);
		$show=$Page->show();
		$house=M('house')
			  ->alias('h')
			  ->field("h.*,s.style_name,t.type_name,d.designer_name")
			  ->join("left join ap_house_style as s on h.style_id=s.id")
			  ->join("left join ap_house_type as t on h.type_id=t.id")
			  ->join("left join ap_designer as d on h.designer_id=d.id")
			  ->where("h.house_name LIKE '%$search%'")
			  ->order("h.addtime desc")
			  ->limit($Page->firstRow.','.$Page->listRows)
			  ->select();
		$this->assign('house',$house);
		$this->assign('show',$show);
		$this->assign('a',$Page->firstRow+1);
		$this->display();		
	}
	//房屋添加
	public function house_add(){
		if(I('post.')){
			$data=array(
				"house_name"=>I('post.house_name'),
				"style_id"=>I('post.style_id'),
				"type_id"=>I('post.type_id'),
				"budget_id"=>I('post.budget_id'),
				"designer_id"=>I('post.designer_id'),
				"main_price"=>I('post.main_price'),
				"auxiliary_price"=>I('post.auxiliary_price'),
				"engineering"=>I('post.engineering'),
				"vitrolite_brand"=>I('post.vitrolite_brand'),
				"floor_brand"=>I('post.floor_brand'),
				"cupboard_brand"=>I('post.cupboard_brand'),
				"door_brand"=>I('post.door_brand'),
				"hardware_brand"=>I('post.hardware_brand'),
				"clean_brand"=>I('post.clean_brand'),
				"top_brand"=>I('post.top_brand'),
				"all_price"=>I('post.all_price'),
				"buy"=>I('post.buy'),
				"size"=>I('post.size'),
				"ord"=>I('post.ord'),
				"description"=>I('post.description'),
				"content"=>I('post.content'),
				"addtime"=>time(),
			);
			$upload=new \Think\Upload();
			$upload->maxSize=3145728;
			$upload->exts=array('jpg','gif','png','jpeg');
			$upload->rootPath='./Public/';//文件上传的根目录
			$upload->savePath='Upload/House/';//保存路径
			$info=$upload->upload();
			if($info){
				foreach($info as $value){
					$data['image']=$value['savepath'].$value['savename'];
				}
				$image=new \Think\Image();
				foreach($info as $value){
					$img_path='./Public/'.$value['savepath'].$value['savename'];
					$thumb_path='./Public/Thumb/'.$value['savepath'].$value['savename'];
					if(!is_dir('./Public/Thumb/'.$value['savepath'])){
						mkdir('./Public/Thumb/'.$value['savepath'],0777,true);
					}
					$image->open($img_path);//打开图片文件
					$image->thumb(290,216)->save($thumb_path);
				}
			}
			$res=M('house')->add($data);
			if($res){
				$this->success("添加成功",U('Admin/House/house_list'));
				exit();
			}else{
				$this->error("数据输入有误,请重新添加");
				exit();
			}
		}
		$style=M('house_style')->select();
		$type=M('house_type')->select();
		$budget=M('house_budget')->select();
		$designer=M('designer')->select();
		$this->assign('style',$style);
		$this->assign('type',$type);
		$this->assign('budget',$budget);
		$this->assign('designer',$designer);
		$this->display();
	}
	//房屋列表
	public function house_edit(){
		if(I('post.')){
			$id=I('post.id');
			$old_name=I('post.old_name');
			$rules=array(
				array('house_name','','房屋名称已经存在！',0,'unique',2),
			);
			if(!M('house')->validate($rules)->create()){
                $this->error(M('house')->getError());
                exit();
            }
            $data=array(
				"house_name"=>I('post.house_name'),
				"style_id"=>I('post.style_id'),
				"type_id"=>I('post.type_id'),
				"budget_id"=>I('post.budget_id'),
				"designer_id"=>I('post.designer_id'),
				"main_price"=>I('post.main_price'),
				"auxiliary_price"=>I('post.auxiliary_price'),
				"engineering"=>I('post.engineering'),
				"vitrolite_brand"=>I('post.vitrolite_brand'),
				"floor_brand"=>I('post.floor_brand'),
				"cupboard_brand"=>I('post.cupboard_brand'),
				"door_brand"=>I('post.door_brand'),
				"hardware_brand"=>I('post.hardware_brand'),
				"clean_brand"=>I('post.clean_brand'),
				"top_brand"=>I('post.top_brand'),
				"all_price"=>I('post.all_price'),
				"buy"=>I('post.buy'),
				"size"=>I('post.size'),
				"ord"=>I('post.ord'),
				"description"=>I('post.description'),
				"content"=>I('post.content'),
				"addtime"=>time(),
			);
			$img=M('house')
				  ->where("id=$id")
				  ->find();
			if($_FILES['image']['size']>0){
				$upload = new \Think\Upload();// 实例化上传类    
	    		$upload->maxSize=3145728 ;// 设置附件上传大小    
	    		$upload->exts=array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
	    		$upload->rootPath='./Public/';
	    		$upload->savePath='Upload/House/'; // 设置附件上传目录    // 上传文件     
	    		$info=$upload->upload();
    			if($info){
		    		foreach($info as $value){
		    		 		$data['image']=$value['savepath'].$value['savename'];
		    		 		unlink("./Public/".$img['image']);
		    		}
		    		//缩略图
		    		$image = new \Think\Image();
		    		foreach($info as $value){
		    			$img_path='./Public/'.$value['savepath'].$value['savename'];
		    			$thumb_path='./Public/Thumb/'.$value['savepath'].$value['savename'];
		    			if(!is_dir('./Public/Thumb/'.$value['savepath'])){
		    				mkdir('./Public/Thumb/'.$value['savepath'],0777,true);
		    			}
		    			$image->open($img_path);
		    			$image->thumb(290,216)->save($thumb_path);
		    			unlink("./Public/Thumb/".$img['image']);
		    		}
	    		}else{
	    		 	$this->error($upload->getError());
                    exit();
	    		}
			}
			$res=M('house')->where("id=$id")->save($data);
			if($res){
    	 		$this->success("编辑成功",U('Admin/House/house_list'));
    	 		exit();
    	 	}else{
    	 		$this->error("数据输入有误，请重新输入");
    	 		exit();
    	 	}
		}else{
			$id=I('get.id');
			$house=M('house')
				  ->alias('h')
				  ->field("h.*,s.style_name,t.type_name,d.designer_name")
				  ->join("left join ap_house_style as s on h.style_id=s.id")
				  ->join("left join ap_house_type as t on h.type_id=t.id")
				  ->join("left join ap_designer as d on h.designer_id=d.id")
				  ->where("h.id=$id")
				  ->order("h.addtime desc")
				  ->find();
			$style=M('house_style')->select();
			$type=M('house_type')->select();
			$budget=M('house_budget')->select();
			$designer=M('designer')->select();
			$this->assign('style',$style);
			$this->assign('type',$type);
			$this->assign('budget',$budget);
			$this->assign('designer',$designer);
			$this->assign('house',$house);
			$this->display();
		}
	}
	//房屋删除
	public function house_del(){
		$del_id=I('post.del_id');
		$img=M('house')
			->where("id=$del_id")
			->find();
		$res=M('house')
			->where("id=$del_id")
			->delete();
		if($res){
			unlink("./Public/".$img['image']);
            unlink("./Public/Thumb/".$img['image']);
			echo 1;exit();
		}else{
			echo 0;exit();
		}
	}

	//风格列表
	public function house_style_list(){
		
		$this->display();
	}

	//风格列表ajax
	public function ajaxHouse_style(){
        $search=isset($_GET['search'])?I('get.search'):NULL;
        $count=M('house_style')->where("style_name like '%$search%'")->count();
		$page=new \Think\Page($count,5);
		$show=$page->show();
		$house_style=M('house_style')->where("style_name like '%$search%'")->order('addtime desc,ord asc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('offset',$page->firstRow);
		$this->assign('show',$show);
		$this->assign('house_style',$house_style);
        $this->display();
     }

	//风格添加
	public function house_style_add(){
		if(I('post.')){
			$addtime=I('post.addtime')?strtotime(I('post.addtime')):time();
			$data=array(
				'style_name'=>I('post.style_name'),
				'ord'=>I('post.ord'),
				'addtime'=>$addtime,
			);
			$res=M('house_style')->add($data);
			if($res){
				$this->success('添加成功',U('Admin/House/house_style_list'));
				exit();
			}else{
				$this->error('数据输入有误,请重新输入');
				exit();
			}
		}
		$this->display();
	}

	//风格编辑
	public function house_style_edit(){
		if(I('post.')){
			$id=I('post.id');
			$addtime=I('post.addtime')?strtotime(I('post.addtime')):time();
			$data=array(
				'style_name'=>I('post.style_name'),
				'ord'=>I('post.ord'),
				'addtime'=>$addtime,
			);
			$res=M('house_style')->where("id =$id")->save($data);
			if($res){
				$this->success('编辑成功',U('Admin/House/house_style_list'));
				exit();
			}else{
				$this->error('数据输入有误,请重新输入');
				exit();
			}
		}else{
			$id=I('get.id');
			$house_style=M('house_style')->where("id =$id")->find();
			$this->assign('house_style',$house_style);
			$this->display();
		}
	}

	//风格删除
	public function house_style_del(){
		$del_id=I('post.del_id');
		$result=M('house')->where("style_id =$del_id")->find();
		if($result){
			echo '存在该风格案列,无法删除此风格';
			exit();
		}
		$res=M('house_style')->where("id =$del_id")->delete();
		if($res){
			echo 1;
			exit();
		}else{
			echo 0;
			exit();
		}
	}

	//预算列表
	public function house_budget_list(){
		
		$this->display();
	}

	//预算列表ajax
	public function ajaxHouse_budget(){
        $search=isset($_GET['search'])?I('get.search'):NULL;
        $count=M('house_budget')->where("budget_name like '%$search%'")->count();
		$page=new \Think\Page($count,5);
		$show=$page->show();
		$house_budget=M('house_budget')->where("budget_name like '%$search%'")->order('ord asc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('offset',$page->firstRow);
		$this->assign('show',$show);
		$this->assign('house_budget',$house_budget);
        $this->display();
     }

	//预算添加
	public function house_budget_add(){
		if(I('post.')){
			$data=array(
				'budget_name'=>I('post.budget_name'),
				'ord'=>I('post.ord'),
			);
			$res=M('house_budget')->add($data);
			if($res){
				$this->success('添加成功',U('Admin/House/house_budget_list'));
				exit();
			}else{
				$this->error('数据输入有误,请重新输入');
				exit();
			}
		}
		$this->display();
	}

	//预算编辑
	public function house_budget_edit(){
		if(I('post.')){
			$id=I('post.id');
			$data=array(
				'budget_name'=>I('post.budget_name'),
				'ord'=>I('post.ord'),
			);
			$res=M('house_budget')->where("id =$id")->save($data);
			if($res){
				$this->success('编辑成功',U('Admin/House/house_budget_list'));
				exit();
			}else{
				$this->error('数据输入有误,请重新输入');
				exit();
			}
		}else{
			$id=I('get.id');
			$house_budget=M('house_budget')->where("id =$id")->find();
			$this->assign('house_budget',$house_budget);
			$this->display();
		}
	}

	//预算删除
	public function house_budget_del(){
		$del_id=I('post.del_id');
		$result=M('house')->where("budget_id =$del_id")->find();
		if($result){
			echo '存在该预算案列,无法删除此预算';
			exit();
		}
		$res=M('house_budget')->where("id =$del_id")->delete();
		if($res){
			echo 1;
			exit();
		}else{
			echo 0;
			exit();
		}
	}

	//户型列表
	public function house_type_list(){
		
		$this->display();
	}

	//户型列表ajax
	public function ajaxHouse_type(){
        $search=isset($_GET['search'])?I('get.search'):NULL;
        $count=M('house_type')->where("type_name like '%$search%'")->count();
		$page=new \Think\Page($count,5);
		$show=$page->show();
		$house_type=M('house_type')->where("type_name like '%$search%'")->order('addtime desc,ord asc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('offset',$page->firstRow);
		$this->assign('show',$show);
		$this->assign('house_type',$house_type);
        $this->display();
     }

	//户型添加
	public function house_type_add(){
		if(I('post.')){
			$addtime=I('post.addtime')?strtotime(I('post.addtime')):time();
			$data=array(
				'type_name'=>I('post.type_name'),
				'ord'=>I('post.ord'),
				'addtime'=>$addtime,
			);
			$res=M('house_type')->add($data);
			if($res){
				$this->success('添加成功',U('Admin/House/house_type_list'));
				exit();
			}else{
				$this->error('数据输入有误,请重新输入');
				exit();
			}
		}
		$this->display();
	}

	//户型编辑
	public function house_type_edit(){
		if(I('post.')){
			$id=I('post.id');
			$addtime=I('post.addtime')?strtotime(I('post.addtime')):time();
			$data=array(
				'type_name'=>I('post.type_name'),
				'ord'=>I('post.ord'),
				'addtime'=>$addtime,
			);
			$res=M('house_type')->where("id =$id")->save($data);
			if($res){
				$this->success('编辑成功',U('Admin/House/house_type_list'));
				exit();
			}else{
				$this->error('数据输入有误,请重新输入');
				exit();
			}
		}else{
			$id=I('get.id');
			$house_type=M('house_type')->where("id =$id")->find();
			$this->assign('house_type',$house_type);
			$this->display();
		}
	}

	//户型删除
	public function house_type_del(){
		$del_id=I('post.del_id');
		$result=M('house')->where("type_id =$del_id")->find();
		if($result){
			echo '存在该户型案列,无法删除此户型';
			exit();
		}
		$res=M('house_type')->where("id =$del_id")->delete();
		if($res){
			echo 1;
			exit();
		}else{
			echo 0;
			exit();
		}
	}

}
