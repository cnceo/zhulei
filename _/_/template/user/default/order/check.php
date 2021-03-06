<?php if(!defined('PIGCMS_PATH')) exit('deny access!');?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/> 
		<title>对账详情 - <?php echo $store_session['name'];?> | <?php if (empty($_SESSION['sync_store'])) { ?><?php echo $config['site_name'];?><?php } else { ?>微店系统<?php } ?></title>
        <meta name="description" content="<?php echo $config['seo_description'];?>">
        <meta name="copyright" content="<?php echo $config['site_url'];?>"/>
        <meta name="renderer" content="webkit">
        <meta name="referrer" content="always">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <!-- ▼ Base CSS -->
		<link href="<?php echo TPL_URL;?>css/base.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo STATIC_URL;?>css/jquery.ui.css" type="text/css" rel="stylesheet" />
        <!-- ▲ Base CSS -->
        <!-- ▼ Order CSS -->
		<link href="<?php echo TPL_URL;?>css/order.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo TPL_URL;?>css/order_detail.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo TPL_URL;?>css/check_common.css" type="text/css" rel="stylesheet"/>
        <!-- ▲ Order CSS -->
        <!-- ▼ Constant JS -->
		<script type="text/javascript">
			var load_url="<?php dourl('load');?>";
			var page_content = "check_content";

			var page_coupon_edit = "coupon_edit";
			var disabled_url = "<?php dourl('disabled') ?>";
			var delete_url = "<?php dourl('delete') ?>";
			
			save_bak_url = "<?php dourl('save_bak'); ?>", cancel_status_url = "<?php dourl('cancel_status'); ?>", image_path = "<?php echo TPL_URL; ?>", add_star_url = "<?php dourl('add_star'); ?>"
		</script>
        <!-- ▲ Constant JS -->
        <!-- ▼ Base JS -->
		<script type="text/javascript" src="<?php echo STATIC_URL;?>js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo STATIC_URL;?>js/layer/layer.min.js"></script>
		<script type="text/javascript" src="<?php echo STATIC_URL;?>js/area/area.min.js"></script>
        <script type="text/javascript" src="<?php echo STATIC_URL;?>js/plugin/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo STATIC_URL;?>js/plugin/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="<?php echo TPL_URL;?>js/base.js"></script>
        <!-- ▲ Base JS -->
        <!-- ▼ Order JS -->
		<script type="text/javascript" src="<?php echo TPL_URL;?>js/check_common.js"></script>
		<script type="text/javascript" src="<?php echo TPL_URL;?>js/check.js"></script>
        <!-- ▲ Order JS -->
	</head>
	<body class="font14 usercenter">
		<?php include display('public:first_sidebar');?>
		<?php include display('trade:sidebar');?>
		<!-- ▼ Container-->
		<div id="container" class="clearfix container right-sidebar">
			<div id="container-left">
				<!-- ▼ Third Header -->
				<div id="third-header">
				    <ul class="third-header-inner">
				        <li class="active">
				            <a href="javascript:;">对账详情</a>
				        </li>
				    </ul>
				</div>
				<!-- ▲ Third Header -->
				<!-- ▼ Container App -->
				<div class="container-app">
					<div class="app-inner clearfix">
						<div class="app-init-container">
							<div class="nav-wrapper--app"></div>
							<div class="app__content"></div>
						</div>
					</div>
				</div>
				<!-- ▲ Container App -->
			</div>
		</div>
		<!-- ▲ Container -->
		<?php include display('public:footer');?>
		<div id="nprogress"><div class="bar" role="bar"><div class="peg"></div></div><div class="spinner" role="spinner"><div class="spinner-icon"></div></div></div>
	</body>
</html>