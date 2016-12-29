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
> 
	<script type="text/javascript" src="<?php echo ($static_path); ?>js/jquery.fancybox-1.3.1.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo ($static_path); ?>css/fancybox.css" />
	<style type="text/css">
		a {
			color:blue;
		}
		a, a:hover {
			text-decoration: none;
		}
		.platform-tag {
			display: inline-block;
			vertical-align: middle;
			padding: 3px 7px 3px 7px;
			background-color: #f60;
			color: #fff;
			font-size: 12px;
			line-height: 14px;
			border-radius: 2px;
		}
	</style>
	<script type="text/javascript">
		$(function() {


			//商品评价审核操作
			$('.status-enable-hot > .cb-enable').click(function(){
				if (!$(this).hasClass('selected')) {
					var comment_id = $(this).data('id');
					$.post("<?php echo U('Store/comment_status'); ?>",{'status': 1, 'id': comment_id}, function(data){})
				}
			})
			$('.status-disable-hot > .cb-disable').click(function(){
				if (!$(this).hasClass('selected')) {
					var comment_id = $(this).data('id');
					if (!$(this).hasClass('selected')) {
						$.post("<?php echo U('Store/comment_status'); ?>", {'status': 0, 'id': comment_id}, function (data) {})
					}
				}
			})	





			$(".show_more_img").each(function () {
				if ($(this).find("a").size() == 0) {
					return;
				}
				var rel = $(this).find("a").attr("rel");
				$("a[rel=" + rel + "]").fancybox({
					'titlePosition' : 'over',
					'cyclic'        : false,
					'titleFormat'	: function(title, currentArray, currentIndex, currentOpts) {
						return '<span id="fancybox-title-over">' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
					}
				});
			});


		})
		
	</script>

		<div class="mainbox">
			<div id="nav" class="mainnav_title">
				<ul>
					<a href="<?php echo U('Store/comment');?>" class="on">店铺评论列表</a>
				</ul>
			</div>
			<table class="search_table" width="100%">
				<tr>
					<td>
						<form action="<?php echo U('Store/comment');?>" method="get">
							<input type="hidden" name="c" value="Store"/>
							<input type="hidden" name="a" value="comment"/>

							&nbsp;&nbsp;评论属性：
							<select name="isdelete">
								<option value="">全部</option>
								<option value="0" <?php if($isdelete == '0'): ?>selected<?php endif; ?> > 未删除的</option>
								<option value="1" <?php if($isdelete == '1'): ?>selected<?php endif; ?>  >  已删除的</option>
							</select>

							<input type="submit" value="查询" class="button"/>
						</form>
					</td>
				</tr>
			</table>
			<form name="myform" id="myform" action="" method="post">
				<div class="table-list">
					<style>
					.table-list td{line-height:22px;padding-top:5px;padding-bottom:5px;}
					.tables ul li{float:left;margin-left:10px;}
					.tables thead th{text-align:center}
					.tables tbody td{text-align:center}
					</style>
					<table class="tables" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th width="4%">删除</th>	
								<th width="12%">店铺信息</th>
								<th width="12%" class="textcenter">评论人信息</th>
								<th width="12%">评论的标签</th>
								<th width="20%">评论内容</th>
								<th width="10%">评论图片</th>
								<!--th>分组</th-->
								<th width="10%">当前审核状态</th>
								<th width="10%">评论时间</th>
								<th class="textcenter" width="10%">审核操作</th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($comments)): if(is_array($comments[comment_list])): $k = 0; $__LIST__ = $comments[comment_list];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($k % 2 );++$k;?><tr>
										<?php if($comment[delete_flg] == 1): ?><td class="first_td">
												已删除
											</td>	
										<?php else: ?> 
										 <td class="first_td">
										 	<a url="<?php echo U('Store/comment_del', array('comment_id' => $comment['id'],'delete'=>1)); ?>"  class="delete_row"><img src="<?php echo ($static_path); ?>images/icon_delete.png" width="18" title="删除" alt="删除" /></a> 
										 </td><?php endif; ?> 
										<td>
											店铺id:<?php echo $comment['relation_id']; ?><br/>
											店铺名称:<a href="javascript:void(0)"><?php echo $store_arr[$comment['relation_id']]['name']?></a>
										</td>
										<td class="textcenter">
										<img src="<?php echo $comments['user_list'][$comment['uid']]['avatar'] ?>" width="60"/>
										 昵称： <?php echo $comments['user_list'][$comment['uid']]['nickname'] ?>(ID:<?php echo $comments['user_list'][$comment['uid']]['uid'] ?>)
					
										
										
										</td>
										<td>
										<ul>
											<?php if(is_array($comments['comment_tag_list'][$comment['id']])) {?>
												<?php foreach($comments['comment_tag_list'][$comment['id']] as $ks =>$v){ ?>
													<li> <?php echo $v['name'];?> </li>
												<?php }?>
											<?php }?>	
										</ul>
							
										</td>
										<td><?php echo $comment['content'] ?></td>
										<td class="show_more_img">
											<?php if(count($comment['attachment_list'])>0) {?>
												<?php if(is_array($comment['attachment_list'])): if(is_array($comment['attachment_list'])): $i = 0; $__LIST__ = $comment['attachment_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$attachment): $mod = ($i % 2 );++$i;?><a  rel="group<?php echo ($k); ?>" href="<?php echo $attachment['file'];?>" title="展示">
														 
														 <img   href="<?php echo $attachment['file'];?>" title="展示" src="<?php echo $attachment['file'];?>" style="width:25px;height:25px;">&nbsp;
														 
														 </a><?php endforeach; endif; else: echo "" ;endif; endif; ?>
											<?php }else {?>
												暂无图片
											<?php }?>
										</td>
										
										<!--td><?php echo ($product["group"]); ?></td-->
										<td>
									
											<?php if($comment['status'] == 1) {?>
												通过审核
											<?php } else {?>
												未通过审核
											<?php }?>
									
										
										
										</td>
										<td><?php echo date('Y-m-d', $comment['dateline']); ?></td>

										<td class="textcenter">
									
											<center style="display:inline-block;text-align:center;margin:auto;padding:auto">
												<span class="cb-enable status-enable-hot"><label class="cb-enable <?php if($comment['status'] == 1): ?>selected<?php endif; ?>" data-id="<?php echo $comment['id']; ?>"><span>通过</span><input type="radio" name="status" value="1" <?php if($comment['status'] == 1): ?>checked="checked"<?php endif; ?> /></label></span>
												<span class="cb-disable status-disable-hot"><label class="cb-disable <?php if($comment['status'] == 0): ?>selected<?php endif; ?>" data-id="<?php echo $comment['id']; ?>"><span>不通过</span><input type="radio" name="status" value="0" <?php if($comment['status'] == 0): ?>checked="checked"<?php endif; ?>/></label></span>
											</center>
									
										</td>

									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
								<tr><td class="textcenter pagebar" colspan="11"><?php echo ($page); ?></td></tr>
							<?php else: ?>
								<tr><td class="textcenter red" colspan="11">列表为空！</td></tr><?php endif; ?>
						</tbody>
					</table>
				</div>
			</form>
		</div>
	</body>
</html>