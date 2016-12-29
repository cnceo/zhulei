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
>     <style type="text/css">        .date-quick-pick {            display: inline-block;            color: #07d;            cursor: pointer;            padding: 2px 4px;            border: 1px solid transparent;            margin-left: 12px;            border-radius: 4px;            line-height: normal;        }        .date-quick-pick.current {            background: #fff;            border-color: #07d!important;        }        .date-quick-pick:hover{border-color:#ccc;text-decoration:none}    </style>		<div class="mainbox">			<div id="nav" class="mainnav_title">				<ul>					<a href="<?php echo U('Order/payagent');?>" class="on" id="url_for_checkout" >订单列表</a>				</ul>			</div>            <table class="search_table" width="100%">                <tr>                    <td>                        <form action="<?php echo U('Order/payagent');?>" method="get">                            <input type="hidden" name="c" value="Order" />                            <input type="hidden" name="a" value="payagent" />                            筛选: <input type="text" name="keyword" class="input-text" value="<?php echo ($_GET['keyword']); ?>" />                            <select name="type">                                <option value="order_no" <?php if($_GET['type'] == 'order_no'): ?>selected="selected"<?php endif; ?>>订单号</option>                                <option value="merchant" <?php if($_GET['type'] == 'merchant'): ?>selected="selected"<?php endif; ?>>商家名称</option>                                <option value="name" <?php if($_GET['type'] == 'name'): ?>selected="selected"<?php endif; ?>>店铺名称</option>                            </select>                            &nbsp;&nbsp;状态：                            <select name="status">                                <option value="">订单状态</option>                                <?php if(is_array($status)): $i = 0; $__LIST__ = $status;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if($_GET['status'] == $key && isset($_GET['status']) && $_GET['status'] != ''): ?>selected="selected"<?php endif; ?>><?php echo ($value); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>                            </select>                            &nbsp;&nbsp;下单时间：                            <input type="text" name="start_time" id="js-start-time" class="input-text Wdate" style="width: 150px" value="<?php echo ($_GET['start_time']); ?>" />- <input type="text" name="end_time" id="js-end-time" style="width: 150px" class="input-text Wdate" value="<?php echo ($_GET['end_time']); ?>" />                            <span class="date-quick-pick" data-days="7">最近7天</span>                            <span class="date-quick-pick" data-days="30">最近30天</span>                            <input type="submit" value="查询" class="button"/>                            <input type="button" value="导出" class="button search_checkout" />                        </form>                    </td>                </tr>            </table>			<form name="myform" id="myform" action="" method="post">				<div class="table-list">					<table width="100%" cellspacing="0">						<colgroup>							<col/>							<col/>							<col/>							<col/>							<col/>							<col width="180" align="center"/>						</colgroup>						<thead>							<tr>								<th width="150">订单号</th>								<th>商家名称</th>								<th>店铺名称</th>								<th>收货人</th>								<th>电话</th>								<th>下单时间</th>								<th>总价</th>								<th>状态</th>                                <th>备注</th>								<th class="textcenter">操作</th>							</tr>						</thead>						<tbody>							<?php if(is_array($orders)): if(is_array($orders)): $i = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order): $mod = ($i % 2 );++$i;?><tr>										<td><?php echo ($order["order_no"]); ?></td>										<td><?php echo ($order["linkman"]); ?></td>										<td><?php echo ($order["store"]); ?></td>										<td><?php echo ($order["address_user"]); ?></td>										<td><?php echo ($order["address_tel"]); ?></td>										<td><?php echo (date("Y-m-d H:i:s",$order["add_time"])); ?></td>										<td>￥<?php echo ($order["total"]); ?></td>										<td><?php echo ($status[$order['status']]); ?></td>                                        <td><?php echo ($order["bak"]); ?></td>										<td class="textcenter">                                            <a href="javascript:void(0);" onclick="window.top.artiframe('<?php echo U('Order/detail',array('id' => $order['order_id'], 'frame_show' => true));?>','订单详情 #<?php echo ($order["order_no"]); ?>',750,700,true,false,false,false,'detail',true);">查看</a>									  	</td>									</tr><?php endforeach; endif; else: echo "" ;endif; ?>                                <tr>                                    <td class="textcenter pagebar" colspan="10"><?php echo ($page); ?></td>                                </tr>							<?php else: ?>								<tr><td class="textcenter red" colspan="10">列表为空！</td></tr><?php endif; ?>						</tbody>					</table>				</div>			</form>		</div><script type="text/javascript" src="<?php echo ($static_public); ?>js/layer/layer.min.js"></script>

<script type="text/javascript">
    $(function() {
        
        if($('.url_for_checkout').hasClass('on')){
            var checkout_url = $('.url_for_checkout').filter('.on').attr('href');
        }else{
             var checkout_url = $('#url_for_checkout').attr('href');
        }


       $(".search_checkout").click(function(){
  
            var loadi =layer.load('正在导出', 10000000000000);

            var searchcontent = encodeURIComponent(window.location.search.substr(1));

            $.post(
                    checkout_url,
                    {"searchcontent":searchcontent},
                    function(obj) {
                        layer.close(loadi);
                        if(obj.msg>0) {
                            layer.confirm('该条件下有记录  '+obj.msg+' 条，确认导出？',function(index){
                               layer.close(index);
                               location.href=checkout_url+"&searchcontent="+searchcontent+"&download=1";
                            });
                        } else {
                            layer.alert('该搜索条件下没有数据，无需导出！', 8); 
                        }
                        
                    },
                    'json'
            )

        })

    })
</script>	</body>
</html>