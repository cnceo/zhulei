<?php if(!defined('PIGCMS_PATH')) exit('deny access!');?>
<!DOCTYPE html>
<html class="no-js" lang="zh-CN">
	<head>
		<meta charset="utf-8"/>
		<meta name="keywords" content="<?php echo $config['seo_keywords'];?>" />
		<meta name="description" content="<?php echo $config['seo_description'];?>" />
		<meta name="HandheldFriendly" content="true"/>
		<meta name="MobileOptimized" content="320"/>
		<meta name="format-detection" content="telephone=no"/>
		<meta http-equiv="cleartype" content="on"/>
		<link rel="icon" href="<?php echo $config['site_url'];?>/favicon.ico" />
		<title>夺宝支付信息</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo TPL_URL;?>css/base.css"/>
		<link rel="stylesheet" href="<?php echo TPL_URL;?>css/cashier.css"/>
		<script src="<?php echo STATIC_URL;?>js/jquery.min.js"></script>
		<script src="<?php echo TPL_URL;?>js/base.js"></script>
		<script src="<?php echo TPL_URL;?>js/order_paid.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="paid-status success">
					<?php if ($nowOrder['paid'] == 1) { ?>
						<div class="header center">
							<h2><i class="success-icon"></i>订单支付成功</h2>
						</div>
						<div class="body block block-list">
							<div class="block-item">
								<h3>你的支付信息</h3>
							</div>
							<div class="block-item">
								<ul class="block block-form block-border-none">
									<li class="block-item">
										<label>付款金额：</label>
										<span class="price">￥<?php echo $nowOrder['price']?></span>
									</li>
									<li class="block-item">
										<label>流水单号：</label>
										<span><?php echo $nowOrder['trade_no']?></span>
									</li>
									<li class="block-item">
										<label>支付方式：</label>
										<span><?php echo $nowOrder['paytype']?></span>
									</li>
								</ul>
							</div>
						</div>
						<?php if ($isMyOrder == 1) { ?>
						<div class="action-container">
							<a class="btn btn-block " href="<?php echo $order_url; ?>">查看订单</a>
						</div>
						<?php } ?>
					<?php } else { ?>
						<div class="header center">
							<h2><i class="warn-icon"></i>订单还未支付</h2>
						</div>
						<?php if ($isMyOrder == 1) { ?>
						<div class="action-container">
							<a class="btn btn-block btn-green" href="<?php echo $send_url; ?>">前往付款</a>
						</div>
						<?php } ?>
					<?php } ?>
				</div>
				<div class="center action-tip">支付完成后，如需退换货请及时联系卖家</div>
			</div>
			<?php $noFooterLinks=true;include display('footer');?>
		</div>
	</body>
</html>