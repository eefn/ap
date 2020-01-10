
<!--

var Customer = {
		PostUrl:"/WebApi/Customer/", //接口地址
		PostCountsUrl:"/WebApi/CustomerCounts/", //报名人数
		PostListsUrl:"/WebApi/CustomerLists/", //报名列表
		Estate:"", //搂盘名称
		RealName:"", //客户姓名
		Sex:"", //客户性别
		Telephone:"", //客户电话
		Styles:"", //装修风格
		Areas:"", //房屋面积
		Huxing:"", //户型
		Budget:"", //预算
		SourceTitle:"", //来源页面标题
		SourceUrl:"", //来源页面地址
		SourceChannel:"", //来源渠道
		WebType:"", //网站类型
		CustomerCounts: 5600, //报名人数
		CustomerLimits:900, //报名限制	
		DateType:""
};


function apply_ajax(objform,SourceTitle)
{	

	
	
	Customer.Estate=$(objform).find("input[name=Estate]").val();
	Customer.RealName=$(objform).find("input[name=RealName]").val();
	Customer.Sex=$(objform).find("input[name=Sex]").val();
	Customer.Telephone=$(objform).find("input[name=Telephone]").val();	
	Customer.Styles=$(objform).find("select[name=Styles]").find("option:selected").val();
	Customer.Areas=$(objform).find("input[name=Areas]").val();
	Customer.Huxing=$(objform).find("select[name=Huxing]").find("option:selected").val();
	Customer.Budget=$(objform).find("input[name=Budget]").val();
	Customer.SourceTitle=SourceTitle;
	Customer.WebType="电脑端";
	
	
	if (Customer.RealName<=0 || Customer.RealName==null || Customer.RealName=="") {
		alert("请填写你的姓名");
		return false;
	}
	if (Customer.Telephone<=0 || Customer.Telephone==null || Customer.Telephone=="") {
		alert("请填写您的电话");
		return false;
	}
	else
	{
		if (!/(^1[0-9]{10}|0[0-9]{2,3}[\-|\\]?[0-9]{7,8}$)/i.test(Customer.Telephone)) {
			alert("请填正确的电话");
			return false;
        }
		
	}

		

	$.ajax({
		cache: false,
		type: "POST",
		url:Customer.PostUrl,
		data:Customer,
		async: false,
		error: function(request) {
			alert("服务器离家出走了，您再试一次说不定它回家了。");			
		},
		
		success: function (res, status) {
			if (status == 'success') {
				  switch (res.errcode) {
					  case -1:
						  alert(res.errmsg);
						  break;
					  case 1:
						  //alert(res.errmsg);
						  
						  	var html = "";
							html = html + "<div class=\"bm_success_layer\"></div>";
							html = html + "<div class=\"bm_success_container\">";
							html = html + "    <div class=\"bm_success_one\">";
							html = html + "        <a href=\"javascript:bm_success_two();\">我知道了</a>";
							html = html + "    </div>";
							html = html + "    <div class=\"bm_success_two\">";
							html = html + "        <a href=\"javascript:bm_success_close();\">关闭</a>";
							html = html + "    </div>";
							html = html + "</div>";
						
							$("body").append(html);
						  
						  
						  $(objform).find("input[type='text'],input[type='tel'],textarea").each(function(i) {	
							  $(this).val("");
						  });
						  break;
					  default:
						  alert(res.errmsg);
						  break;
				  }
				  
		  
			  }
			  else {
				  alert("服务器离家出走。");
			  }
				
				
			}	
	});
}


function apply_ajax_close(objform,SourceTitle,objclose)
{	

	
	
	Customer.Estate=$(objform).find("input[name=Estate]").val();
	Customer.RealName=$(objform).find("input[name=RealName]").val();
	Customer.Sex=$(objform).find("input[name=Sex]").val();
	Customer.Telephone=$(objform).find("input[name=Telephone]").val();	
	Customer.Styles=$(objform).find("select[name=Styles]").find("option:selected").val();
	Customer.Areas=$(objform).find("input[name=Areas]").val();
	Customer.Huxing=$(objform).find("select[name=Huxing]").find("option:selected").val();
	Customer.Budget=$(objform).find("input[name=Budget]").val();
	Customer.SourceTitle=SourceTitle;
	Customer.WebType="电脑端";
	
	
	if (Customer.RealName<=0 || Customer.RealName==null || Customer.RealName=="") {
		alert("请填写你的姓名");
		return false;
	}
	if (Customer.Telephone<=0 || Customer.Telephone==null || Customer.Telephone=="") {
		alert("请填写您的电话");
		return false;
	}
	else
	{
		if (!/(^1[0-9]{10}|0[0-9]{2,3}[\-|\\]?[0-9]{7,8}$)/i.test(Customer.Telephone)) {
			alert("请填正确的电话");
			return false;
        }
		
	}

		

	$.ajax({
		cache: false,
		type: "POST",
		url:Customer.PostUrl,
		data:Customer,
		async: false,
		error: function(request) {
			alert("服务器离家出走了，您再试一次说不定它回家了。");			
		},
		
		success: function (res, status) {
			if (status == 'success') {
				  switch (res.errcode) {
					  case -1:
						  alert(res.errmsg);
						  break;
					  case 1:
					  	  $(objclose).hide();
						  //alert(res.errmsg);
						  
						  var html = "";
							html = html + "<div class=\"bm_success_layer\"></div>";
							html = html + "<div class=\"bm_success_container\">";
							html = html + "    <div class=\"bm_success_one\">";
							html = html + "        <a href=\"javascript:bm_success_two();\">我知道了</a>";
							html = html + "    </div>";
							html = html + "    <div class=\"bm_success_two\">";
							html = html + "        <a href=\"javascript:bm_success_close();\">关闭</a>";
							html = html + "    </div>";
							html = html + "</div>";
						
							$("body").append(html);
						  
						  $(objform).find("input[type='text'],input[type='tel'],textarea").each(function(i) {	
							  $(this).val("");
						  });
						  break;
					  default:
						  alert(res.errmsg);
						  break;
				  }
				  
		  
			  }
			  else {
				  alert("服务器离家出走。");
			  }
				
				
			}	
	});
}

function apply_ajax_no(objform,SourceTitle)
{	

	
	
	Customer.Estate=$(objform).find("input[name=Estate]").val();
	Customer.RealName=$(objform).find("input[name=RealName]").val();
	Customer.Sex=$(objform).find("input[name=Sex]").val();
	Customer.Telephone=$(objform).find("input[name=Telephone]").val();	
	Customer.Styles=$(objform).find("select[name=Styles]").find("option:selected").val();
	Customer.Areas=$(objform).find("input[name=Areas]").val();
	Customer.Huxing=$(objform).find("select[name=Huxing]").find("option:selected").val();
	Customer.Budget=$(objform).find("input[name=Budget]").val();
	Customer.SourceTitle=SourceTitle;
	Customer.WebType="电脑端";
	
	
	if (Customer.RealName<=0 || Customer.RealName==null || Customer.RealName=="") {
		alert("请填写你的姓名");
		return false;
	}
	if (Customer.Telephone<=0 || Customer.Telephone==null || Customer.Telephone=="") {
		alert("请填写您的电话");
		return false;
	}
	else
	{
		if (!/(^1[0-9]{10}|0[0-9]{2,3}[\-|\\]?[0-9]{7,8}$)/i.test(Customer.Telephone)) {
			alert("请填正确的电话");
			return false;
        }
		
	}

		

	$.ajax({
		cache: false,
		type: "POST",
		url:Customer.PostUrl,
		data:Customer,
		async: false,
		error: function(request) {
			alert("服务器离家出走了，您再试一次说不定它回家了。");			
		},
		
		success: function (res, status) {
			if (status == 'success') {
				  switch (res.errcode) {
					  case -1:
						  alert(res.errmsg);
						  break;
					  case 1:
						  //alert(res.errmsg);
						  
						  	
						  
						  
						  //$(objform).find("input[type='text'],input[type='tel'],textarea").each(function(i) {	
							  //$(this).val("");
						  //});
						  break;
					  default:
						  alert(res.errmsg);
						  break;
				  }
				  
		  
			  }
			  else {
				  alert("服务器离家出走。");
			  }
				
				
			}	
	});
}

function designers_baoming(DesignersId, DesignersName, GraduationTime, PicUrl, Specialty)
{

	var html = "";
	html = html + "<div class=\"designer_popup\">";
	html = html + "    <div class=\"designer_popup_top\">";
	html = html + "        <img src=\"/Content/web/images/inside/qiu_close.png\" alt=\"\">";
	html = html + "    </div>";
	html = html + "    <div class=\"designer_popup_center\">";
	html = html + "        <div class=\"designer_popup_center_l\">";
	html = html + "            <a href=\"/Designers/Details/" + DesignersId + "\"><img src=\"" + PicUrl + "\" alt=\"\"></a>";
	html = html + "            <h3><i>预约设计师</i>-" + DesignersName + "</h3>";
	html = html + "            <span>designer</span>";
	html = html + "            <b></b>";
	html = html + "            <p><strong>入行时间：</strong>" + GraduationTime + "</p>";
	html = html + "            <p><strong>擅长：</strong>" + Specialty + "</p>";
	html = html + "        </div>";
	html = html + "        <div class=\"designer_popup_center_r\">";
	html = html + "            <h4>填写您的信息</h4>";
	html = html + "            <form id=\"designers_baoming\">";
	html = html + "                <ul>";
	html = html + "                    <li>";
	html = html + "                        <input name=\"RealName\" type=\"text\" maxlength=\"20\" placeholder=\"您的姓名\">";
	html = html + "                    </li>";
	html = html + "                    <li>";
	html = html + "                        <input name=\"Telephone\" type=\"tel\" maxlength=\"11\" placeholder=\"您的电话\">";
	html = html + "                    </li>";
	html = html + "                    <li>";
	html = html + "                        <input name=\"\" type=\"text\" maxlength=\"20\" placeholder=\"房屋面积\">";
	html = html + "                        <span>m&sup2</span>";
	html = html + "                    </li>";
	html = html + "                    <li>";
	html = html + "                        <select name=\"Areas\">";
	html = html + "                            <option value=\"\">==户型==</option>";
	html = html + "                            <option value=\"两居\">两居</option>";
	html = html + "                            <option value=\"三居\">三居</option>";
	html = html + "                            <option value=\"四居\">四居</option>";
	html = html + "                            <option value=\"五居\">五居</option>";
	html = html + "                            <option value=\"别墅\">别墅</option>";
	html = html + "                            <option value=\"复式\">复式</option>";
	html = html + "                            <option value=\"公寓\">公寓</option>";
	html = html + "                        </select>";
	html = html + "                    </li>";
	html = html + "                    <li>";
	html = html + "                        <select name=\"Styles\">";
	html = html + "                            <option value=\"\">==风络==</option>";
	html = html + "                            <option value=\"日式\">日式</option>";
	html = html + "                            <option value=\"简约\">简约</option>";
	html = html + "                            <option value=\"韩式\">韩式</option>";
	html = html + "                            <option value=\"东南亚\">东南亚</option>";
	html = html + "                            <option value=\"中式\">中式</option>";
	html = html + "                            <option value=\"混搭\">混搭</option>";
	html = html + "                            <option value=\"田园\">田园</option>";
	html = html + "                            <option value=\"地中海\">地中海</option>";
	html = html + "                            <option value=\"现代\">现代</option>";
	html = html + "                            <option value=\"欧式\">欧式</option>";
	html = html + "                            <option value=\"美式\">美式</option>";
	html = html + "                            <option value=\"古典\">古典</option>";
	html = html + "                        </select>";
	html = html + "                    </li>";
	html = html + "                    <li>";
	html = html + "                        <button type=\"button\" onClick=\"apply_ajax_close('#designers_baoming', '弹窗_预约设计师_" + DesignersName + "','.designer_popup');\" class=\"qiu_submit\">立即预约"+DesignersName+"</button>";
	html = html + "                    </li>";
	html = html + "                </ul>";
	html = html + "            </form>";
	html = html + "            <p>*为了您的权益，您的隐私将严格保密</p>";
	html = html + "        </div>";
	html = html + "    </div>";
	html = html + "</div>";

	$("body").append(html);

  
	$('.designer_popup_top img').click(function ()
	{
		$('.designer_popup').remove();
	});


}

//
function bm_success_two() {
	$(".bm_success_one").remove();
	$(".bm_success_two").fadeIn(200);
}



function bm_success_close() {
	$(".bm_success_layer").remove();
	$(".bm_success_container").remove();
}

//滚动
function autoScroll(obj,height) {
	$(obj).find("dl").animate({
		marginTop: "-"+height+"px"
	}, 500, function () {
		$(this).css({ marginTop: "0px" }).find("dd:first").appendTo(this);
	})
}


$(function(){
	
	$.ajax({
		cache: false,
		type: "POST",
		data:{"DateType":Customer.DateType},
		url:Customer.PostCountsUrl,
		//data:{DateType:Customer.DateType},
		async: false,
		error: function(request) {
			//alert("服务器离家出走了，您再试一次说不定它回家了。");			
		},
		
		success: function (res, status) {
			if (status == 'success') {
				  switch (res.errcode) {
					  case -1:
						  //alert(res.errmsg);
						  break;
					  case 1:
						  //alert(res.errmsg);
						  Customer.CustomerCounts=res.errmsg;
						  Customer.CustomerLimits=res.redirecturl;
						  break;
					  default:
						  //alert(res.errmsg);
						  break;
				  }
				  
		  
			  }
			  else {
				  //alert("服务器离家出走。");
			  }
				
				
			}	
	});
    
	$(".customerdounts").html(Customer.CustomerCounts);
	$(".customerlimits").html(Customer.CustomerLimits);
	if ($(".apple_places").find("label").length > 0) {
		if(Customer.CustomerLimits>=100)
		{
				
			$(".apple_places").find("label").eq(0).html(Customer.CustomerLimits.substr(0,1));
			$(".apple_places").find("label").eq(1).html(Customer.CustomerLimits.substr(1,1));
			$(".apple_places").find("label").eq(2).html(Customer.CustomerLimits.substr(2,1));
			
		}
		else if(Customer.CustomerLimits>=10)
		{
			$(".apple_places").find("label").eq(0).html("0");
			$(".apple_places").find("label").eq(1).html(Customer.CustomerLimits.substr(0,1));
			$(".apple_places").find("label").eq(2).html(Customer.CustomerLimits.substr(1,1));
			
		}
		else
		{
			$(".apple_places").find("label").eq(0).html("0");
			$(".apple_places").find("label").eq(1).html("0");
			$(".apple_places").find("label").eq(2).html(Customer.CustomerLimits.substr(0,1));
			
		}
	}
	
	 
});






//-->
