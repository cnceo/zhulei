<include file="Public:header"/>

<script src="{pigcms{$static_public}js/layer/layer.min.js"></script>
		<div class="mainbox">
			<div id="nav" class="mainnav_title">
				<ul>
					<volist name="group_list" id="vo">
						<a href="{pigcms{:U('Config/index',array('gid'=>$vo['gid']))}" <if condition="$gid eq $vo['gid']">class="on"</if>>{pigcms{$vo.gname}</a>|
					</volist>
				</ul>
			</div>
			<form id="myform" datas="my_{pigcms{$gid}" method="post" action="{pigcms{:U('Config/amend')}" refresh="true">
				{pigcms{$config_tab_html}
				{pigcms{$config_html}
				<div class="btn" style="margin-top:20px;">
					<input TYPE="button"  name="dosubmit" value="提交" class="button" />
					<input type="reset"  value="取消" class="button" />
					<input type="button"  value="获取及时聊天的key" class="button" id="im_key"/>
					<input type="button"  value="微信API接口填写信息" class="button" onclick="window.top.artiframe('{pigcms{:U('Config/show',array('id'=>$vo['id']))}','API接口信息',560,100,true,false,false,'','add',true);"/>
				</div>
			</form>
		</div>
		
		<script>
		$(function(){
			$("input[name='dosubmit']").click(function(){
				var gids = $("#myform").attr("datas");
				if(gids == 'my_8') {
					var layer_js = "{pigcms{$static_public}js/layer/layer.min.js";

					var appid = $("input[name='wechat_appid']").val();
					var appsecret = $("input[name='wechat_appsecret']").val();



					 //检测店铺名称是否已存在
					$.ajax({
						url: "{pigcms{:U('Config/check_wechat')}",
						data: {"wechat_appid":appid,"wechat_appsecret":appsecret},
						dataType:"json",
						async: false,
						cache: false,
						type: 'POST',
						success: function (res) {
							if(res.status=='0') {
								$("#myform").submit();
							} else {
								$.layer({
									shade: [0],
									area: ['auto','auto'],
									dialog: {
										msg: 'appid 和  appsecret 与 库中不匹配，修改后，可能会造成老用户无法登录，确定更换么？',
										btns: 2,
										type: 4,
										btn: ['确定更换','打死不换'],
										yes: function(){
											$("#myform").submit();
										}, no: function(){
										
										}
									}
								});
							}

							
						},
						error:function(){
							layer.alert("操作异常")
						}
					})

					
				} else{
					$("#myform").submit();
				}
			})
		})
		</script>
		
        <script type="text/javascript">
            $(function() {
                $('.table_form:eq(0)').show();

                $('.tab_ul li a').click(function(){
                    $(this).closest('li').addClass('active').siblings('li').removeClass('active');
                    $($(this).attr('href')).show().siblings('.table_form').hide();
                });
		$('#im_key').click(function(){
			$.get("{pigcms{:U('Config/im')}",function(data){
				alert(data.msg)					
			},'json');
		});
	    });	
	</script>
        <if condition="$has_salt_btn">
		<script type="text/javascript">
			$(function(){
                $('.generate-salt').live('click', function() {
                    $.post("{pigcms{:U('Config/ajax_generate_salt')}", "", function(data){
                        $('#config_weidian_key').val(data);
                    })
                })
			});
		</script>
        </if>
		<if condition="$has_image_btn">
			<script type="text/javascript" src="{pigcms{$static_public}js/webuploader/webuploader.js"></script>
			<script>
				$(function(){
					var upload_image_btn = null;
					if(!WebUploader.Uploader.support()){
						alert( '您的浏览器不支持上传功能！如果你使用的是IE浏览器，请尝试升级 flash 播放器');
						$('.widget-image,.modal-backdrop').remove();
					}				
					var uploader = WebUploader.create({
						auto: true,
						swf: '{pigcms{$static_public}js/Uploader.swf',
						server: "{pigcms{:U('Config/ajax_upload_pic')}",
						pick: {
							id: '.config_upload_image_btn',
							multiple:false
						},
						fileNumLimit: 1, 
						accept: {
							title: 'Images',
							extensions: 'gif,jpg,jpeg,png',
							mimeTypes: 'image/*'
						},
						fileSingleSizeLimit: 3 * 1024 * 1024,
						duplicate:true
					});
					uploader.on('uploadSuccess',function(file,response){
						if(response['result'].error_code == '0'){
							upload_image_btn.siblings('.input-image').val(response['result'].url);
							alert('上传成功');
						}else{
							alert(response['result'].err_msg);
						}
					});

					uploader.on('uploadError', function(file,reason){
						alert('上传失败！请重试。');
					});
					$('.config_upload_image_btn').click(function(){
						upload_image_btn = $(this);
					});
				});			
			</script>
		</if>
		<if condition="$has_page_btn">
			<script>
				var widget_link_save_box = {};
				$('.config_select_page_btn').click(function(){
					var randNum = getRandNumber();
					widget_link_save_box[randNum] = $(this).closest('td').find('.input-widget-page');
					window.top.artiframe('/user.php?c=systemwidget&a=page&rand='+randNum,'选择微页面',650,470,true,false,false,'','widget-page',true);
				});
				function widget_page_after(randNum,id,title,href){
					window.top.closeiframe();
					widget_link_save_box[randNum].val(id);
					
				}
				function getRandNumber(){
					var myDate=new Date();
					return myDate.getTime() + '' + Math.floor(Math.random()*10000);
				}
			</script>
		</if>
		<link rel="stylesheet" href="{pigcms{$static_public}kindeditor/themes/default/default.css">
		<script src="{pigcms{$static_public}kindeditor/kindeditor.js"></script>
		<script src="{pigcms{$static_public}kindeditor/lang/zh_CN.js"></script>
		<script type="text/javascript">
			KindEditor.ready(function(K){
				var site_url = "{pigcms{$config.site_url}";
				var editor = K.editor({
					allowFileManager : true
				});
				$('.config_upload_image_btn').click(function(){
					var upload_file_btn = $(this);
					editor.uploadJson = "{pigcms{:U('Config/ajax_upload_pic')}";
					editor.loadPlugin('image', function(){
						editor.plugin.imageDialog({
							showRemote : false,
							clickFn : function(url, title, width, height, border, align) {
								upload_file_btn.siblings('.input-image').val(site_url+url);
								editor.hideDialog();
							}
						});
					});
				});
				$('.config_upload_file_btn').click(function(){
					var upload_file_btn = $(this);
					editor.uploadJson = "{pigcms{:U('Config/ajax_upload_file')}&name="+upload_file_btn.siblings('.input-file').attr('name');
					editor.loadPlugin('insertfile', function(){
						editor.plugin.fileDialog({
							showRemote : false,
							clickFn : function(url, title, width, height, border, align) {
								upload_file_btn.siblings('.input-file').val(url);
								editor.hideDialog();
							}
						});
					});
				});
			});

			//测试短信发送
			var issign = true; 
			$('.test_msg').click(function test_send_sms() {
				var myDialog = window.top.art.dialog({id: 'N3690',width: '30em',  height: 75,title: "测试短信发送操作",color:"#ff0000"});
				var sms_topmain = $("#config_sms_topdomain").val();
				var sms_key = $("#config_sms_key").val();
				var sms_price = $("#config_sms_price").val();
				var sms_sign = $("#config_sms_sign").val();
				var sms_mobile = $("#config_sms_test_mobile").val();
				

				if(!sms_topmain || !sms_key || !sms_price || !sms_sign || !sms_mobile) {
					myDialog.content("短信配置不全，无法发送短信，请正确填写配置再重试！");
					myDialog.time("5");
					return;
				}
				
				if (!/^1[0-9]{10}$/.test(sms_mobile)) {
					myDialog.content("手机号填写不正确！");
					myDialog.time("5");
					return;
				}
				if(sms_sign.length>=6) {
					myDialog.content("短信签名建议不要超过5个字！");
					myDialog.time("5");
					return;
				}

				//关闭:myDialog.close();

				

				if(issign) {
					issign = false;
					jQuery.ajax({
						url:"{pigcms{:U('Config/sendmsg')}",
						dataType:"json",
						type:"POST",
						data:{'mobile':sms_mobile,'topmain':sms_topmain,'skey':sms_key,'sprice':sms_price,'ssign':sms_sign},
						success: function (data) {
							issign = true;
							if(data.error=="0") {
								//myDialog.content("测试短信发送成功，请留意手机！");// 填充对话框内容
								myDialog.content(data.message);// 填充对话框内容
								myDialog.time("7");
							} else {
								myDialog.content(data.message);// 填充对话框内容
								myDialog.time("7");
							}	
						}
					}); 
				}
				
			});

			
		</script>
		<style>
			.table_form{border:1px solid #ddd;}
			.table_form td a{color:#ff0000;margin:auto 4px;}
			.tab_ul{margin-top:10px;border-color:#C5D0DC;margin-bottom:0!important;margin-left:0;position:relative;top:1px;border-bottom:1px solid #ddd;padding-left:0;list-style:none;}
			.tab_ul>li{position:relative;display:block;float:left;margin-bottom:-1px;}
			.tab_ul>li>a {
				position: relative;
				display: block;
				padding: 10px 15px;
				margin-right: 2px;
				line-height: 1.42857143;
				border: 1px solid transparent;
				border-radius: 4px 4px 0 0;
				padding: 7px 12px 8px;
				min-width: 100px;
				text-align: center;
				}
				.tab_ul>li>a, .tab_ul>li>a:focus {
				border-radius: 0!important;
				border-color: #c5d0dc;
				background-color: #F9F9F9;
				color: #999;
				margin-right: -1px;
				line-height: 18px;
				position: relative;
				}
				.tab_ul>li>a:focus, .tab_ul>li>a:hover {
				text-decoration: none;
				background-color: #eee;
				}
				.tab_ul>li>a:hover {
				border-color: #eee #eee #ddd;
				}
				.tab_ul>li.active>a, .tab_ul>li.active>a:focus, .tab_ul>li.active>a:hover {
				color: #555;
				background-color: #fff;
				border: 1px solid #ddd;
				border-bottom-color: transparent;
				cursor: default;
				}
				.tab_ul>li>a:hover {
				background-color: #FFF;
				color: #4c8fbd;
				border-color: #c5d0dc;
				}
				.tab_ul>li:first-child>a {
				margin-left: 0;
				}
				.tab_ul>li.active>a, .tab_ul>li.active>a:focus, .tab_ul>li.active>a:hover {
				color: #576373;
				border-color: #c5d0dc #c5d0dc transparent;
				border-top: 2px solid #4c8fbd;
				background-color: #FFF;
				z-index: 1;
				line-height: 18px;
				margin-top: -1px;
				box-shadow: 0 -2px 3px 0 rgba(0,0,0,.15);
				}
				.tab_ul>li.active>a, .tab_ul>li.active>a:focus, .tab_ul>li.active>a:hover {
				color: #555;
				background-color: #fff;
				border: 1px solid #ddd;
				border-bottom-color: transparent;
				cursor: default;
				}
				.tab_ul>li.active>a, .tab_ul>li.active>a:focus, .tab_ul>li.active>a:hover {
				color: #576373;
				border-color: #c5d0dc #c5d0dc transparent;
				border-top: 2px solid #4c8fbd;
				background-color: #FFF;
				z-index: 1;
				line-height: 18px;
				margin-top: -1px;
				box-shadow: 0 -2px 3px 0 rgba(0,0,0,.15);
				}
				.tab_ul:before,.tab_ul:after{
				content: " ";
				display: table;
				}
				.tab_ul:after{
				clear: both;
				}
			</style>
<include file="Public:footer"/>









