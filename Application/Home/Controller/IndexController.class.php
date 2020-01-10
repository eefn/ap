<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        //轮播图
    	$banner=M('banner')->order('addtime desc,ord asc')->limit(0,4)->select();
        //服务
    	$service=M('service')->order('ord asc')->select();
        //新闻
    	$cat_sj=M('news_cat')->where("id=8")->find();
    	$news_sj=M('news')->where('cat_id=8')->order('addtime desc')->limit(0,4)->select();
    	$cat_fs=M('news_cat')->where("id=9")->find();
    	$news_fs=M('news')->where('cat_id=9')->order('addtime desc')->limit(0,4)->select();
    	$cat_rj=M('news_cat')->where("id=10")->find();
    	$news_rj=M('news')->where('cat_id=10')->order('addtime desc')->limit(0,4)->select();
        //设计
        $house_lg=M('house')->order("buy desc")->find();
        $house_lt=M('house')->order("addtime desc")->limit(0,4)->select();
        //设计师
        $designer_king=M('designer')->alias('d')->field('d.*,l.name as l_name,h.id as h_id,h.house_name as h_name,h.image as h_image,h.description as h_description')->join("left join ap_designer_lv as l on d.lv_id=l.id left join ap_house as h on d.id=h.designer_id")->where("is_king=1")->find();
        $designer=M('designer')->where("is_king=0")->order("click desc")->limit(0,4)->select();
        $this->assign('designer_king',$designer_king);
        $this->assign('designer',$designer);
        $this->assign('house_lg',$house_lg);
        $this->assign('house_lt',$house_lt);
    	$this->assign('banner',$banner);
    	$this->assign('service',$service);
    	$this->assign('cat_sj',$cat_sj);
    	$this->assign('cat_fs',$cat_fs);
    	$this->assign('cat_rj',$cat_rj);
    	$this->assign('news_sj',$news_sj);
    	$this->assign('news_fs',$news_fs);
    	$this->assign('news_rj',$news_rj);
        $this->display();
    }
}