<?php 
namespace Admin\Controller;
use Think\Controller;
class DesignerController extends BaseController{
	//设计师列表
	public function designer_list(){
		$this->display();
	}

	//设计师ajax
	public function ajaxDesigner(){
		$search=isset($_GET['search'])?I('get.search'):NULL;
		$count=M('designer')->where("designer_name like '%$search%'")->count();
		$page=new \Think\Page($count,4);
		$show=$page->show();
		$designer=M('designer')->alias('d')					
					->field('d.*,l.name as l_name')
					->join("left join ap_designer_lv as l on d.lv_id=l.id")
					->where("designer_name like '%$search%'")
					->order('addtime desc')
					->limit($page->firstRow.','.$page->listRows)
					->select();
		$this->assign('offset',$page->firstRow);
		$this->assign('show',$show);
		$this->assign('designer',$designer);
        $this->display();
     }

	//设计师添加
	public function designer_add(){
		if(I('post.')){
			$jointime=I('jointime')?strtotime(I('jointime')):time();
			$data=array(
				'designerdesigner__name'=>I('post.designerdesigner__name'),
				'description'=>I('post.description'),
				'lv_id'=>I('post.lv_id'),
				'click'=>I('post.click'),
				'price'=>I('post.price'),
				'hobby'=>I('post.hobby'),
				'store'=>I('post.store'),
				'service_center'=>I('post.service_center'),
				'school'=>I('post.school'),
				'is_king'=>I('post.is_king'),
				'ord'=>I('post.ord'),
				'jointime'=>$jointime,
			);
			$upload=new \Think\Upload();
			$upload->maxSize=3145728;
			$upload->rootPath='./Public/';
			$upload->savePath='Upload/Designer/';
			$upload->exts=array('jpg', 'gif', 'png', 'jpeg');
			$info=$upload->upload();
			if($info){
				foreach($info as $v){
					$data['image']=$v['savepath'].$v['savename'];
				}
				$image=new \Think\Image();
				foreach($info as $v){
					$img_path='./Public/'.$v['savepath'].$v['savename'];
					$thumb_path='./Public/Thumb/'.$v['savepath'].$v['savename'];
					if(!is_dir('./Public/Thumb/'.$v['savepath'])){
						mkdir('./Public/Thumb/'.$v['savepath'],0777,true);
					}
					$image->open($img_path);
					$image->thumb(192,192)->save($thumb_path);
				}
			}else{
				$this->error($upload->getError());
				exit();
			}
			$res=M('designer')->add($data);
			if($res){
				$this->success('添加成功',U('Admin/Designer/designer_list'));
				exit();
			}else{
				$this->error('数据输入有误，请重新输入');
				exit();
			}
		}else{			
			$designer_lv=M('designer_lv')->select();
			$this->assign('designer_lv',$designer_lv);
			$this->display();
		}
	}

	//设计师编辑
	public function designer_edit(){
		if(I('post.')){
			$id=I('post.id');
			$jointime=I('jointime')?strtotime(I('jointime')):time();
			$data=array(
				'designer_name'=>I('post.designer_name'),
				'description'=>I('post.description'),
				'lv_id'=>I('post.lv_id'),
				'click'=>I('post.click'),
				'price'=>I('post.price'),
				'hobby'=>I('post.hobby'),
				'store'=>I('post.store'),
				'service_center'=>I('post.service_center'),
				'school'=>I('post.school'),
				'is_king'=>I('post.is_king'),
				'ord'=>I('post.ord'),
				'jointime'=>$jointime,
			);
			if(is_uploaded_file($_FILES['image']['tmp_name'])){
				$upload=new \Think\Upload();
				$upload->maxSize=3145728;
				$upload->rootPath='./Public/';
				$upload->savePath='Upload/Designer/';
				$upload->exts=array('jpg', 'gif', 'png', 'jpeg');
				$info=$upload->upload();
				if($info){
					$old_img=M('house')->field('image')->where("id =$id")->find();
					$img='./Public/'.$old_img['image'];
					$thumb='./Public/'.$old_img['image'];
					if(file_exists($img)){
						unlink($img);
					}
					if(file_exists($thumb)){
						unlink($thumb);
					}
					foreach($info as $v){
						$data['image']=$v['savepath'].$v['savename'];
					}
					$image=new \Think\Image();
					foreach($info as $v){
						$img_path='./Public/'.$v['savepath'].$v['savename'];
						$thumb_path='./Public/Thumb/'.$v['savepath'].$v['savename'];
						if(!is_dir('./Public/Thumb/'.$v['savepath'])){
							mkdir('./Public/Thumb/'.$v['savepath'],0777,true);
						}
						$image->open($img_path);
						$image->thumb(192,192)->save($thumb_path);
					}
				}else{
					$this->error($upload->getError());
					exit();
				}
			}
			$res=M('designer')->where("id =$id")->save($data);
			if($res){
				$this->success('编辑成功',U('Admin/Designer/designer_list'));
				exit();
			}else{
				$this->error('数据输入有误，请重新输入');
				exit();
			}
		}else{	
			$id=I('get.id');
			$designer=M('designer')->where("id =$id")->find();
			$designer_lv=M('designer_lv')->select();;
			$this->assign('designer',$designer);
			$this->assign('designer_lv',$designer_lv);
			$this->display();
		}
	}

	//设计师删除
	public function designer_del(){
		$del_id=I('post.del_id');
		$old_img=M('designer')->field('image')->where("id =$del_id")->find();
		$res=M('designer')->where("id =$del_id")->delete();
		if($res){
			$img='./Public/'.$old_img['image'];
			$thumb='./Public/Thumb/'.$old_img['image'];
			if(file_exists($img)){
				unlink($img);
			}
			if(file_exists($thumb)){
				unlink($thumb);
			}
			echo 1;
			exit();
		}else{
			echo 0;
			exit();
		}
	}

	//等级列表
	public function designer_lv_list(){
		$this->display();
	}

	//等级列表ajax
	public function ajaxDesigner_lv(){
		$search=isset($_GET['search'])?I('get.search'):NULL;
		$count=M('designer_lv')->where("name like '%$search%'")->count();
		$page=new \Think\Page($count,5);
		$show=$page->show();
		$designer_lv=M('designer_lv')->where("name like '%$search%'")->order('addtime desc,ord asc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('offset',$page->firstRow);
		$this->assign('show',$show);
		$this->assign('designer_lv',$designer_lv);
        $this->display();
     }

	//等级添加
	public function designer_lv_add(){
		if(I('post.')){
			$addtime=I('post.addtime')?strtotime(I('post.addtime')):time();
			$data=array(
				'name'=>I('post.name'),
				'ord'=>I('post.ord'),
				'addtime'=>$addtime,
			);
			$res=M('designer_lv')->add($data);
			if($res){
				$this->success('添加成功',U('Admin/Designer/designer_lv_list'));
				exit();
			}else{
				$this->error('数据输入有误,请重新输入');
				exit();
			}
		}
		$this->display();
	}

	//等级编辑
	public function designer_lv_edit(){
		if(I('post.')){
			$id=I('post.id');
			$addtime=I('post.addtime')?strtotime(I('post.addtime')):time();
			$data=array(
				'name'=>I('post.name'),
				'ord'=>I('post.ord'),
				'addtime'=>$addtime,
			);
			$res=M('designer_lv')->where("id =$id")->save($data);
			if($res){
				$this->success('编辑成功',U('Admin/Designer/designer_lv_list'));
				exit();
			}else{
				$this->error('数据输入有误,请重新输入');
				exit();
			}
		}else{
			$id=I('get.id');
			$designer_lv=M('designer_lv')->where("id =$id")->find();
			$this->assign('designer_lv',$designer_lv);
			$this->display();
		}
	}

	//等级删除
	public function designer_lv_del(){
		$del_id=I('post.del_id');
		$result=M('Designer')->where("lv_id =$del_id")->find();
		if($result){
			echo '存在该等级案列,无法删除此等级';
			exit();
		}
		$res=M('designer_lv')->where("id =$del_id")->delete();
		if($res){
			echo 1;
			exit();
		}else{
			echo 0;
			exit();
		}
	}

	//设计师风格列表
	public function designer_style_list(){
		
		$this->display();
	}

	//等级风格ajax
	public function ajaxDesigner_style(){
		$search=isset($_GET['search'])?I('get.search'):NULL;
		$count=M('designer_common')
					->alias('c')
					->field('c.*,d.designer_name as d_name,s.style_name as s_name')
					->join("left join ap_designer as d on c.designer_id=d.id left join ap_house_style as s on c.style_id=s.id")
					->where("style_name like '%$search%'")
					->limit($page->firstRow.','.$page->listRows)
					->count();
		$page=new \Think\Page($count,5);
		$show=$page->show();
		$designer_style=M('designer_common')
					->alias('c')
					->field('c.*,d.designer_name as d_name,s.style_name as s_name')
					->join("left join ap_designer as d on c.designer_id=d.id left join ap_house_style as s on c.style_id=s.id")
					->where("style_name like '%$search%'")
					->limit($page->firstRow.','.$page->listRows)
					->select();
		$this->assign('offset',$page->firstRow);
		$this->assign('show',$show);
		$this->assign('designer_style',$designer_style);
        $this->display();
     }

	//设计师风格添加
	public function designer_style_add(){
		if(I('post.')){
			$result=array(
				'designer_id'=>I('post.designer_id'),
				'style_id'=>I('post.style_id'),
			);
			$res=M('designer_common')->where($result)->find();
			if($res){
				$this->error('已存在该风格，无需添加');
			}
			$data=array(
				'designer_id'=>I('post.designer_id'),
				'style_id'=>I('post.style_id'),
				'is_show'=>I('post.is_show')
			);
			$r=M('designer_common')->add($data);
			if($r){
				$this->success('添加成功',U('Admin/Designer/designer_style_list'));
				exit();
			}else{
				$this->error('数据输入有误,请重新输入');
				exit();
			}
		}else{
			$designer=M('designer')->select();
			$designer_style=M('house_style')->select();
			$this->assign('designer',$designer);
			$this->assign('designer_style',$designer_style);
			$this->display();
		}
	}

	//设计师风格编辑
	public function designer_style_edit(){
		if(I('post.')){			
			$id=I('post.id');
			$result=array(
				'designer_id'=>I('post.designer_id'),
				'style_id'=>I('post.style_id'),
				'id'=>array('neq',$id),
			);
			$res=M('designer_common')->where($result)->find();
			if($res){
				$this->error('已存在该风格，无需添加');
			}
			$data=array(
				'designer_id'=>I('post.designer_id'),
				'style_id'=>I('post.style_id'),
				'is_show'=>I('post.is_show')
			);
			$r=M('designer_common')->where("id =$id")->save($data);
			if($r){
				$this->success('编辑成功',U('Admin/Designer/designer_style_list'));
				exit();
			}else{
				$this->error('数据输入有误,请重新输入');
				exit();
			}
		}else{
			$id=I('get.id');
			$designer_common=M('designer_common')->where("id =$id")->find();
			$designer=M('designer')->select();
			$designer_style=M('house_style')->select();
			$this->assign('designer_common',$designer_common);
			$this->assign('designer',$designer);
			$this->assign('designer_style',$designer_style);
			$this->display();
		}
	}

	public function designer_style_del(){
		$del_id=I('post.del_id');
		$res=M('designer_common')->where("id =$del_id")->delete();
		if($res){
			echo 1;
			exit();
		}else{
			echo 0;
			exit();
		}

	}

	//是否显示更换
	public function click(){
        $click=isset($_GET['click'])?I('get.click'):NULL;
        $is_show=isset($_GET['is_show'])?I('get.is_show'):NULL;
        if($click){
          if($is_show==0){
            $data=array(
                  'is_show'=>1,
                  );
          }else if($is_show==1){
              $data=array(
                  'is_show'=>0,
                  );
          }
          
          $res=M('designer_common')->where("id = $click")->save($data);
          $is_show=M('designer_common')->where("id = $click")->find();
          echo $is_show['is_show'];
          exit();

        }
    }
}