<?php if(!defined('PIGCMS_PATH')) exit('deny access!');?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>摇一摇抽奖 - <?php echo $store_session['name']; ?> | <?php if (empty($_SESSION['sync_store'])) { ?><?php echo $config['site_name'];?><?php } else { ?>微店系统<?php } ?></title>
		<meta name="copyright" content="<?php echo $config['site_url'];?>"/>
		<link href="<?php echo TPL_URL;?>css/base.css" type="text/css" rel="stylesheet"/>
		<link href="<?php echo TPL_URL;?>css/appmarket.css" type="text/css" rel="stylesheet"/>
		<link href="<?php echo TPL_URL;?>css/wx_sidebar.css" type="text/css" rel="stylesheet"/>
		<link rel="stylesheet" type="text/css" href="./static/css/jquery.ui.css" />
		<script type="text/javascript" src="./static/js/jquery.min.js"></script>
		<script type="text/javascript" src="./static/js/layer/layer.min.js"></script>
		<script type="text/javascript" src="./static/js/date/WdatePicker.js"></script>
		<script type="text/javascript" src="./static/js/plugin/jquery-ui.js"></script>
		<script type="text/javascript" src="./static/js/jquery.validate.js"></script>
		<script type="text/javascript" src="./static/js/date/WdatePicker.js"></script>
		<script type="text/javascript" src="./static/js/plugin/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="<?php echo TPL_URL;?>js/base.js"></script>
        	<script type="text/javascript" charset="utf-8" src="./static/js/ueditor/ueditor.config.js"></script>
        	<script type="text/javascript" charset="utf-8" src="./static/js/ueditor/ueditor.all.min.js"></script>
		<script type="text/javascript" src="<?php echo TPL_URL;?>js/shakelottery.js"></script>
		<script type="text/javascript">
			var index_url = "<?php dourl('shakelottery:lottery_index') ?>";
			var load_url = "<?php dourl('load');?>";
			var pro_update_url = "<?php dourl('shakelottery:doupdate') ?>";
			var set_product_url = "<?php dourl('shakelottery:setproduct'); ?>";
			var good_del_url = "<?php dourl('shakelottery:delproduct'); ?>";
			var wap_url = "<?php echo option('config.site_url').'/wap/shakelottery.php'; ?>";
		</script>
	</head>
	<body class="font14 usercenter">
		<?php include display('public:header');?>
		<div class="wrap_1000 clearfix container">

			<?php include display('public:yx_sidebar');?>

			<div class="app">
				<div class="app-inner clearfix">
					<div class="app-init-container">
						<div class="clearfix"></div>
						<!-- ▼ Main container -->
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