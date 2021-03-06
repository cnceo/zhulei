<?php if(!defined('PIGCMS_PATH')) exit('deny access!');?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/> 
		<title>活动订单 - <?php echo $store_session['name'];?> | <?php if (empty($_SESSION['sync_store'])) { ?><?php echo $config['site_name'];?><?php } else { ?>微店系统<?php } ?></title>
		<meta name="copyright" content="<?php echo $config['site_url'];?>"/>
		<link href="<?php echo TPL_URL;?>css/base.css" type="text/css" rel="stylesheet"/>
		<link href="<?php echo STATIC_URL;?>css/jquery.ui.css" type="text/css" rel="stylesheet" />
		<link href="<?php echo TPL_URL;?>css/order.css" type="text/css" rel="stylesheet"/>
		<link href="<?php echo TPL_URL;?>css/order_detail.css" type="text/css" rel="stylesheet"/>
		<script type="text/javascript" src="<?php echo STATIC_URL;?>js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo STATIC_URL;?>js/layer/layer.min.js"></script>
		<script type="text/javascript" src="<?php echo STATIC_URL;?>js/area/area.min.js"></script>
		<script type="text/javascript" src="<?php echo STATIC_URL;?>js/plugin/jquery-ui.js"></script>
		<script type="text/javascript" src="<?php echo STATIC_URL;?>js/plugin/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="<?php echo TPL_URL;?>js/base.js"></script>
		<script type="text/javascript">
		var load_url="<?php dourl('load');?>", save_bak_url = "<?php dourl('save_bak'); ?>", image_path = "<?php echo TPL_URL; ?>", add_star_url = "<?php dourl('add_star'); ?>", cancel_status_url = "<?php dourl('cancel_status'); ?>", complate_status_url = "<?php dourl('complate_status'); ?>", detail_json_url = "<?php dourl('detail_json'); ?>", float_amount_url = "<?php dourl('float_amount'); ?>", page_content = "activity_content", package_product_url = "<?php dourl('package_product'); ?>", create_package_url = "<?php dourl('create_package'); ?>", package_assign_url = "<?php dourl('package_product_physical'); ?>", package_assign_save_url = "<?php dourl('product_physical_save'); ?>", order_checkout_url="<?php dourl('order_checkout_csv');?>", order_print_huifu="<?php dourl('order_print_getback');?>" , order_download_url="<?php dourl('order_download_csv');?>";
		var receive_time_url = "<?php dourl('receive_time') ?>";
		var create_package_friend_url = "<?php dourl('create_package_friend') ?>";
		</script>
		<script type="text/javascript" src="<?php echo TPL_URL;?>js/order_common.js"></script>
		<script type="text/javascript" src="<?php echo TPL_URL;?>js/jquery_base64.js"></script>
		<script type="text/javascript" src="<?php echo TPL_URL;?>js/order_print_checkout.js"></script>
        <script type="text/javascript" src="<?php echo TPL_URL;?>js/order_all.js"></script>
        <script>layer.use('extend/layer.ext.js'); </script>
        <style>
			.xubox_layer .xubox_tab_main {text-align:center}
			.ico_all_print2_ul{width:500px;display:block;}
			.ico_all_print2_ul li{float:left;width:33%;text-align:center;padding:15px 0px;}
			.input_button{border-radius:5px; background: #369 none repeat scroll 0 0;border: 2px solid #efefef;color: #fff; cursor: pointer; font-size: 14px;font-weight: 700;height: 35px;line-height: 30px;text-align: center;width: 80px;}
			.ui-nav .ico_all_f li.active a{font-size:12px;}
		</style>
	</head>
	<body class="font14 usercenter">
		<?php include display('public:header');?>
		<div class="wrap_1000 clearfix container">
			<?php include display('sidebar');?>
			<div class="app">
				<div class="app-inner clearfix">
					<div class="app-init-container">
						<div class="nav-wrapper--app"></div>
						<div class="app__content"></div>
					</div>
				</div>
			</div>
		</div>
		<?php include display('public:footer');?>
		<div id="nprogress"><div class="bar" role="bar"><div class="peg"></div></div><div class="spinner" role="spinner"><div class="spinner-icon"></div></div></div>
	</body>
</html>