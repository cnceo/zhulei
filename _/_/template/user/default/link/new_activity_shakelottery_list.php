<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>功能库选择</title>
    <meta http-equiv="MSThemeCompatible" content="Yes" />
    <script type="text/javascript" src="<?php echo STATIC_URL;?>js/jquery.min.js"></script>
    <script src="<?php echo STATIC_URL;?>js/layer/layer.min.js" type="text/javascript"></script>
    <link href="<?php echo TPL_URL;?>css/link_style_2_common.css?BPm" rel="stylesheet" type="text/css" />
    <link href="<?php echo TPL_URL;?>css/link_style.css" rel="stylesheet" type="text/css" />
    <style>
        body{line-height:180%;}
        ul.modules li{padding:4px 10px;margin:4px;background:#efefef;float:left;width:27%;}
        ul.modules li div.mleft{float:left;width:40%}
        ul.modules li div.mright{float:right;width:55%;text-align:right;}
    </style>
</head>
<body style="background:#fff;padding:20px 20px;">
<div style="background:#fefbe4;border:1px solid #f3ecb9;color:#993300;padding:10px;margin-bottom:5px;">使用方法：点击对应内容后面的“选中”即可。<a href="?c=link&a=new_activity">点击这里返回模块选择</a></div>
<h4>摇一摇抽奖活动列表</h4>
<table class="ListProduct" border="0" cellSpacing="0" cellPadding="0" width="100%">
    <thead>
    <tr>
        <th>标题</th>
        <th style="width: 100px;">操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($list as $k=>$v){ ?>
    <tr>
        <td><?php echo $v['action_name'];?></td>
        <td><a href="javascript:void(0)" onclick="returnHomepage('<?php echo option("config.wap_site_url")."/shakelottery.php?id=".$v['id']; ?>')" style="margin-left:14px;">选中</a></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
<div class="footactions" style="padding-left:10px">
    <div class="pages"><?php echo $pages;?></div>
</div>
<script>
    function returnHomepage(url){
        $('.js-link-placeholder', parent.document).val(url).keyup();
        parent.layer.close(parent.layer.getFrameIndex(window.name));
    }
    // 分页
    $(".pages a").live("click", function () {
        var p = $(this).data("page-num");
        // console.log(p);
        location.href="<?php echo option("config.site_url")."/user.php?c=link&a=new_activity_list&module=shakelottery&store_id=".$_REQUEST['store_id']."&p=";?>"+p;
    })
</script>
</body>
</html>