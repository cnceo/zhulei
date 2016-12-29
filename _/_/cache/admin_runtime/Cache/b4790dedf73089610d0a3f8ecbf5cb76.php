<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html"><head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php echo C('DEFAULT_CHARSET');?>" />
		<title>网站后台管理 Powered by pigcms.com</title>
		<script type="text/javascript">
			<!--if(self==top){window.top.location.href="<?php echo U('Index/index');?>";}-->
			var kind_editor=null,static_public="<?php echo ($static_public); ?>",static_path="<?php echo ($static_path); ?>",system_index="<?php echo U('Index/index');?>",choose_province="<?php echo U('Area/ajax_province');?>",choose_city="<?php echo U('Area/ajax_city');?>",choose_area="<?php echo U('Area/ajax_area');?>",choose_circle="<?php echo U('Area/ajax_circle');?>",choose_map="<?php echo U('Map/frame_map');?>",get_firstword="<?php echo U('Words/get_firstword');?>",frame_show=<?php if($_GET['frame_show']): ?>true<?php else: ?>false<?php endif; ?>;
		</script>
		<link rel="stylesheet" type="text/css" href="<?php echo ($static_path); ?>css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo ($static_path); ?>css/jquery.ui.css" />
		<script type="text/javascript" src="<?php echo C('JQUERY_FILE');?>"></script>
		<script type="text/javascript" src="<?php echo ($static_path); ?>js/plugin/jquery-ui.js"></script>
		<script type="text/javascript" src="<?php echo ($static_path); ?>js/plugin/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="<?php echo ($static_public); ?>js/jquery.form.js"></script>
		<script type="text/javascript" src="<?php echo ($static_public); ?>js/jquery.validate.js"></script>
		<script type="text/javascript" src="/static/js/date/WdatePicker.js"></script>
		<script type="text/javascript" src="<?php echo ($static_public); ?>js/jquery.colorpicker.js"></script>
		<script type="text/javascript" src="<?php echo ($static_path); ?>js/common.js"></script>
		<script type="text/javascript" src="<?php echo ($static_path); ?>js/date.js"></script>
			<?php if($withdrawal_count > 0): ?><script type="text/javascript">
					$(function(){
						$('#nav_4 > dd > #leftmenu_Order_withdraw', parent.document).html('提现记录 <label style="color:red">(' + <?php echo ($withdrawal_count); ?> + ')</label>')
					})
				</script><?php endif; ?>
			<?php if($unprocessed > 0): ?><script type="text/javascript">
					$(function(){
						if ($('#leftmenu_Credit_returnRecord', parent.document).length > 0) {
							var menu_html = $('#leftmenu_Credit_returnRecord', parent.document).html();
							menu_html = menu_html.split('(')[0];
							menu_html += ' <label style="color:red">(<?php echo ($unprocessed); ?>)</label>';
							$('#leftmenu_Credit_returnRecord', parent.document).html(menu_html);
						}
					})
				</script><?php endif; ?>
		</head>
		<body width="100%" 
		<?php if($bg_color): ?>style="background:<?php echo ($bg_color); ?>;"<?php endif; ?>
> 		<div class="mainbox">			<div id="nav" class="mainnav_title">				<ul>					<a href="<?php echo U('Slider/index');?>" class="on">导航分类列表</a>|					<a href="javascript:void(0);" onclick="window.top.artiframe('<?php echo U('Slider/cat_add');?>','添加导航分类',400,180,true,false,false,addbtn,'add',true);">添加导航分类</a>				</ul>			</div>			<form name="myform" id="myform" action="" method="post">				<div class="table-list">					<table width="100%" cellspacing="0">						<colgroup><col> <col> <col><col>  <col width="180" align="center"> </colgroup>						<thead>							<tr>								<th>编号</th>								<th>名称</th>								<th>标识</th>								<th>导航列表</th>								<th class="textcenter">操作</th>							</tr>						</thead>						<tbody>							<?php if(is_array($category_list)): if(is_array($category_list)): $i = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>										<td><?php echo ($vo["cat_id"]); ?></td>										<td><?php echo ($vo["cat_name"]); ?></td>										<td><?php echo ($vo["cat_key"]); ?></td>										<td><a href="<?php echo U('Slider/slider_list',array('cat_id'=>$vo['cat_id']));?>">导航列表</a></td>										<td class="textcenter"><a href="javascript:void(0);" onclick="window.top.artiframe('<?php echo U('Slider/cat_edit',array('cat_id'=>$vo['cat_id'],'frame_show'=>true));?>','查看导航分类',400,180,true,false,false,false,'add',true);">查看</a> | <a href="javascript:void(0);" onclick="window.top.artiframe('<?php echo U('Slider/cat_edit',array('cat_id'=>$vo['cat_id']));?>','编辑导航分类',400,180,true,false,false,editbtn,'add',true);">编辑</a> | <a href="javascript:void(0);" class="delete_row" parameter="cat_id=<?php echo ($vo["cat_id"]); ?>" url="<?php echo U('Slider/cat_del');?>">删除</a></td>									</tr><?php endforeach; endif; else: echo "" ;endif; ?>							<?php else: ?>								<tr><td class="textcenter red" colspan="8">列表为空！</td></tr><?php endif; ?>						</tbody>					</table>				</div>			</form>		</div>	</body>
</html>