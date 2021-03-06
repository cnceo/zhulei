<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>分销店铺推广配置 - <?php echo $config['site_name'];?>分销平台 | <?php if (empty($_SESSION['sync_store'])) { ?><?php echo $config['site_name'];?><?php } else { ?>微店系统<?php } ?></title>
    <meta name="copyright" content="<?php echo $config['site_url'];?>"/>
    <link href="<?php echo TPL_URL;?>css/base.css" type="text/css" rel="stylesheet"/>
    <script src="<?php echo TPL_URL;?>js/pigcms.js" type="text/javascript"></script>
    <script    type="text/javascript" src="<?php echo STATIC_URL;?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo TPL_URL;?>js/base.js"></script>
    <script type="text/javascript">var load_url="<?php dourl('load');?>", save_url = "<?php dourl('shop_promotion_add'); ?>";</script>

    <link href="<?php echo TPL_URL;?>css/icomoon/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo TPL_URL;?>css/extension/css/jquery-ui-1.9.1.custom.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo TPL_URL;?>css/extension/css/jquery.bigcolorpicker.css" />
    <link rel="stylesheet" href="<?php echo TPL_URL;?>css/extension/css/hbconfig.css">
    <link rel="stylesheet" href="<?php echo TPL_URL;?>css/extension/upload.css"/>
    <script>
        var _staticPath='<?php echo TPL_URL;?>css/extension/';
        var _uploadUrl='<?php echo dourl('uploadFile')?>';
        var promotional_url = '<?php echo dourl('index')?>';
    </script>
   <!-- <script type="text/javascript" src="<?php /*echo STATIC_URL;*/?>js/layer/layer.min.js"></script>
    <script type="text/javascript" src="<?php /*echo STATIC_URL;*/?>js/area/area.min.js"></script>-->
    <script type="text/javascript" src="<?php echo STATIC_URL;?>js/layer/layer.min.js"></script>
    <script src="<?php echo TPL_URL;?>css/laydate/laydate.js"></script>
    <script src="<?php echo TPL_URL;?>css/smart/smart.js"></script>
    <script src="<?php echo TPL_URL;?>css/artDialog/jquery.artDialog.js?skin=default"></script>
    <script src="<?php echo TPL_URL;?>css/artDialog/plugins/iframeTools.js"></script>
    <!--引入web uploader JS-->
    <script type="text/javascript" src="<?php echo TPL_URL;?>css/spin.min.js"></script>
    <script type="text/javascript" src="<?php echo TPL_URL;?>css/webuploader/webuploader.nolog.min.js"></script>
    <script type="text/javascript" src="<?php echo TPL_URL;?>css/extension/upload.js"></script>
</head>
<style>
    .filter-box {
        border-bottom: 1px solid #ddd;
        margin-bottom: 40px;
    }
    .filter-box {
        background: #f8f8f8;
        padding: 10px;
    }
    .ui-btn-primary {
        color: #fff;
        background: #07d;
        border-color: #006cc9;
    }
    .ui-btn {
        display: inline-block;
        border-radius: 2px;
        height: 26px;
        line-height: 26px;
        padding: 0 12px;
        cursor: pointer;
        color: #333;
        background: #f8f8f8;
        border: 1px solid #ddd;
        text-align: center;
        font-size: 12px;
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
    }

     .ui-btn{
         background-image: none !important;
         border: none !important;
         text-shadow: none !important;
         margin-left: 5px;
         padding: 2px 8px !important;
         cursor: pointer !important;
         display: inline-block !important;
         overflow: visible !important;
         border-radius: 2px !important;
         -moz-border-radius: 2px !important;
         -webkit-border-radius: 2px !important;
         background-color: #44b549 !important;
         color: #fff !important;
         font-size: 14px !important;
     }

</style>
<body class="font14 usercenter">
<?php include display('public:header');?>
<div class="wrap_1000 clearfix container">
    <?php include display('fx:sidebar');?>
    <div class="app">
        <div class="app-inner clearfix">
            <div class="app-init-container">
                <div class="nav-wrapper--app"></div>
                <div class="app__content">
                    <div class="content">
                        <div class="filter-box">
                            <div class="js-list-search">
                                <span style="font-size:15px;">推广店铺页面自定义</span>
                            </div>
                        </div>
                        <!--游戏设置模块-->
                        <div class="gameConfig">
                            <style type="text/css">
                                #ieBrowser{text-align: center;margin-top: 50px}
                                #ieBrowser h2{font-weight: normal;padding: 15px 0}
                                #ieBrowser h3{font-weight: normal;padding: 20px 0}
                                #ieBrowser h4{font-weight: normal;padding: 20px 0}
                                #ieBrowser .browserBtn{text-align: center;margin-top: 20px}
                                #ieBrowser .browserBtn a{text-align: center;padding: 15px 40px;background: #3caf59;font-size: 16px;color: #fff}

                            </style>
                            <div id="ieBrowser" class="hide">
                                <h2>小猪CMS温馨提示：<strong>您的浏览器需要更新才能访问哦 ^_^</strong></h2>
                                <h3>请使用 <strong>Chrome</strong>、<strong>Safari</strong>、<strong>firefox</strong>、<strong>opera</strong> 浏览器访问~</h3>

                                <h4>请下载或者升级时下最高级的浏览器，享受新应用的最佳体验。</h4>

                                <div class="browserBtn">
                                    <a id="browserBtn" href="javascript:;">
                                        仍然要访问
                                    </a>
                                </div>
                            </div>
                            <div id="itemCtrlBox">
                                <!--游戏设置主体-->
                                <div class="gBd clearfix">
                                    <!--左侧手机游戏界面-->
                                    <div class="leftPhonewrap">
                                        <div class="loadBgBox">
                                            <div id="itemContent">
                                                <div class="itemList">
                                                    <div class="row normalStyle style1">
                                                        <div class="hd">
                                                            <div class="opacityHd">

                                                            </div>
                                                            <img src="<?php echo STATIC_URL.'images/pigcms.png';?>" class="avatar" alt="avatar"/>
                                                            <p class="minText me">我是<em>[用户昵称]</em></p>
                                                            <p class="minText for"><s>我为</s><em>[店铺昵称]</em><s>代言</s></p>
                                                            <!--<p class="descDate">推广时间：<em class="start"><?php /*echo date('Y-m-d',time());*/?></em>至<em class="end"><?php /*echo date('Y-m-d', strtotime("+1 months"))*/?></em></p>-->
                                                        </div>
                                                        <div class="bd">

                                                            <div  class="descText">
                                                                <p>[海报描述]</p>
                                                            </div>
                                                            <img class="descCode" src="<?php echo STATIC_URL.'images/rcode.png';?>" alt="code"/>
                                                            <p class="descTip">长按此图，识别图中的二维码</p>
                                                        </div>
                                                        <div class="moduleLayerBox"><div class="moduleLayer"><div class="item"><a class="item hdTool tool" href="javascript:;">编辑样式</a></div></div><div class="moduleLayer"><div class="item"><a class="item bgTool tool" href="javascript:;">编辑背景</a></div></div></div>
                                                    </div>
                                                    <div class="row normalStyle style2">
                                                        <div class="hd">
                                                            <div class="opacityHd">

                                                            </div>
                                                            <img src="<?php echo STATIC_URL.'images/pigcms.png';?>" class="avatar" alt="avatar"/>
                                                            <p class="minText me">我是<em>[用户昵称]</em></p>
                                                            <p class="minText for"><s>我为</s><em>[店铺昵称]</em><s>代言</s></p>
                                                        </div>
                                                        <div class="bd">
                                                            <div  class="descText">
                                                                <p>[海报描述]</p>
                                                            </div>
                                                            <img class="descCode" src="<?php echo STATIC_URL.'images/rcode.png';?>" alt="code"/>
                                                            <p class="descTip">长按此图，识别图中的二维码</p>
                                                            <!--<p class="descDate" style="display: none;">推广时间：<em class="start"><?php /*echo date('Y-m-d',time());*/?></em>至<em class="end"><?php /*echo date('Y-m-d', strtotime("+1 months"))*/?></em></p>-->
                                                        </div>
                                                        <div class="moduleLayerBox"><div class="moduleLayer"><div class="item"><a class="item hdTool tool" href="javascript:;">编辑样式</a></div></div><div class="moduleLayer"><div class="item"><a class="item bgTool tool" href="javascript:;">编辑背景</a></div></div></div>
                                                    </div>
                                                    <div class="row normalStyle style3">
                                                        <div class="hd">
                                                            <div class="opacityHd">

                                                            </div>
                                                            <img src="<?php echo STATIC_URL.'images/pigcms.png';?>" class="avatar" alt="avatar"/>
                                                            <p class="minText me">我是<em>[用户昵称]</em></p>
                                                            <p class="minText for"><s>我为</s><em>[店铺昵称]</em><s>代言</s></p>
                                                        </div>
                                                        <div class="bd">
                                                            <div  class="descText">
                                                                <p>[海报描述]</p>
                                                            </div>
                                                            <img class="descCode" src="<?php echo STATIC_URL.'images/rcode.png';?>" alt="code"/>
                                                            <p class="descTip">长按此图，识别图中的二维码</p>
                                                            <!--<p class="descDate" style="display: none;">推广时间：<em class="start"><?php /*echo date('Y-m-d',time());*/?></em>至<em class="end"><?php /*echo date('Y-m-d', strtotime("+1 months"))*/?></em></p>-->
                                                        </div>
                                                        <div class="moduleLayerBox"><div class="moduleLayer"><div class="item"><a class="item hdTool tool" href="javascript:;">编辑样式</a></div></div><div class="moduleLayer"><div class="item"><a class="item bgTool tool" href="javascript:;">编辑背景</a></div></div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="phoneBtn">
                                            <a href="javascript:;" class="prev"></a>
                                            <a href="javascript:;" class="next"></a>
                                        </div>
                                        <input type="hidden" id="hbModStyle" name="banner_config" value='<?php echo $promote['banner_config'];?>'/>
                                    </div>
                                    <!--左侧手机游戏界面-->

                                    <!--右侧设置表单-->
                                    <div class="rightForm">
                                        <!--表单切换主体-->
                                        <div class="bd">
                                            <div class="row">
                                                <div class="formRow modStyle">
                                                    <span class="rowTitle">海报类型：</span>
                                                    <div class="putWrap cssRadio">
                                                        <input type="radio"  checked="checked" id="modStyle1">
                                                        <label class="radioLabel modLabel" for="modStyle1" data="style1" data-module="1">横式模板</label>
                                                        <input type="radio" id="modStyle2">
                                                        <label class="radioLabel modLabel" for="modStyle2" data="style2" data-module="2">竖式模板</label>
                                                        <input type="radio" id="modStyle3">
                                                        <label class="radioLabel modLabel" for="modStyle3" data="style3" data-module="3">正方形模板</label><br/>
                                                        （提交后，不可修改）
                                                    </div>
                                                </div>
                                                <div class="formRow" id="actNamePut">
                                                    <span class="rowTitle"><i>*</i>海报名称：</span>
                                                    <div class="putWrap">
                                                        <input style="width:240px;"  placeholder="" type="text" name="name" value="<?php echo $promote['name'];?>"/>
                                                    </div>
                                                </div>
                                                <div class="formRow" id="corpNamePut">
                                                    <span class="rowTitle">店铺昵称：</span>
                                                    <div class="putWrap">
                                                        <input style="width:240px;" placeholder="默认供货商店铺" type="text" name="store_name" value="<?php echo $promote['store_nickname'] ;?>" />
                                                    </div>
                                                </div>
                                                <div class="formRow" id="promotion" style="display: none;">
                                                    <span class="rowTitle">推广时间：</span>
                                                    <div class="putWrap shortPut">
                                                        <input style="width:100px;" name="start_time" id="start_time" value="<?php echo empty($promote['start_time']) ? date('Y-m-d', time()) : date('Y-m-d', $promote['start_time']);?>" class="start " placeholder="开始时间" type="text" readonly/> 至 <input style="width:100px;" name="end_time" id="end_time" value="<?php echo empty($promote['end_time']) ? date('Y-m-d', strtotime("+1 months")) : date('Y-m-d', $promote['end_time']);?>" class="end" placeholder="结束时间" type="text" readonly/>
                                                        <div style="margin-top: 5px;" class="cssRadio time_switcher">
                                                            <input type="radio" id="start_time_show" name="start_time_display" value="1">
                                                            <label class="radioLabel" for="start_time_show">显示</label>
                                                            <input type="radio" id="start_time_hidden" name="start_time_display" value="0">
                                                            <label class="radioLabel" for="start_time_hidden">不显示</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="formRow" id="tip">
                                                    <span class="rowTitle">提示文本：</span>
                                                    <div class="putWrap shortPut cssRadio">
                                                        <input type="radio" id="tip_show" name="tip_display" value="1">
                                                        <label class="radioLabel" for="tip_show">显示</label>
                                                        <input type="radio" id="tip_hidden" name="tip_display" value="0">
                                                        <label class="radioLabel" for="tip_hidden">不显示</label>
                                                        (长按此图，识别图中的二维码)
                                                    </div>
                                                </div>

                                                <div class="formRow" id="descTextPut">
                                                    <span class="rowTitle">海报描述：</span>
                                                    <div class="putWrap">
                                                        <textarea style="width:240px;" rows="5" cols="20" class="" name="descr"><?php echo $promote['descr'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="formRow">
                                                    <span class="rowTitle "></span>
                                                    <div class="putWrap">
                                                        <input type="hidden" value="<?php echo $promote['pigcms_id'];?>" class="promote-id">
                                                        <div class="ui-btn ui-btn-primary btnGreen" ajax="post" ajax-before="beforeHandler2" >保存</div>
                                                        <script>
                                                            //提交之前序列化海报设计数据
                                                            function  beforeHandler2() {

                                                                var name = $("input[name='name']").val();
                                                                var store_name = $("input[name='store_name']").val();
                                                                var start_time = $("input[name='start_time']").val();
                                                                var end_time = $("input[name='end_time']").val();
                                                                var descr = $("textarea[name='descr']").val();
                                                                var pigcms_id = $(".promote-id").val();
                                                                var poster_type = $('.putWrap .checkOn').data('module');

                                                                if(name.length == 0){
                                                                    layer_tips(1, '海报名称不能为空');
                                                                    $("input[name='store_name']").focus();
                                                                    return false;
                                                                }
                                                              /*  if(store_name.length == 0){
                                                                    layer_tips(1, '店铺不能为空');
                                                                    $("input[name='store_name']").focus();
                                                                    return false;
                                                                }*/
                                                                if(start_time.length == 0){
                                                                    layer_tips(1, '开始时间不能为空');
                                                                    $("input[name='start_time']").focus();
                                                                    return false;
                                                                }
                                                                if(end_time.length == 0){
                                                                    layer_tips(1, '结束时间不能为空');
                                                                    $("input[name='end_time']").focus();
                                                                    return false;
                                                                }
                                                                if(descr.length == 0){
                                                                    layer_tips(1, '描述不能为空');
                                                                    $("input[name='descr']").focus();
                                                                    return false;
                                                                }
                                                                $.post(save_url, {
                                                                    'name' : name,
                                                                    'store_name': store_name,
                                                                    'start_time': start_time,
                                                                    'end_time': end_time,
                                                                    'descr': descr,
                                                                    'pigcms_id' : pigcms_id,
                                                                    'poster_type' : poster_type,
                                                                    'banner_config': JSON.stringify(ctrlJson)
                                                                }, function (result) {
                                                                    if(result.err_code == 0){
                                                                        $('.notifications').html('<div class="alert in fade alert-success">'+result.err_msg+'</div>');
                                                                        setTimeout('location.replace("'+ promotional_url +'")',1000);//延时1秒
                                                                       //location.href = promotional_url;
                                                                    }
                                                                });
                                                            }
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--表单切换主体-->
                                    </div>
                                    <!--右侧设置表单-->

                                </div>
                                <!--游戏设置主体-->
                            </div>
                        </div>
                        <!--游戏设置模块-->
                    </div>
                    <!--图片上传弹窗-->
                    <div id="uploadImg" class="setWindow windowBg hidden" style="background: rgba(0, 0, 0, 0.298039);">
                        <div  class=" uploadBox">
                            <div class="updTopBar">
                                <div class="updTopBarTit"> <span class="uploadBoxTitle">编辑图片</span>
                                    <div  class="right editPicClose"></div>
                                </div>
                            </div>
                            <div class="uploadInfoBox">
                                <div class="uploadLine">
                                    <div class="itemTitle item">背景图片：</div>
                                    <div class="imgBox item bgimg_view" style="position: relative;width: 80px;height: 80px;">
                                        <img  class="img" src="" width="80" height="80">
                                        <div style="position: absolute;left: 0px;top: 0px;width: 80px;height: 80px;" class="imgLoding_bg" imgLoding="">
                                            <img src="" alt="">
                                        </div>
                                    </div>
                                    <div class="btnBox item">
                                        <div id="uploader_pick" class="selectbtn">
                                            <a href="javascript:;" class="add-goods js-add-picture">上传替换</a>
                                        </div>
                                        <div class="recoveryBtn btn">恢复默认</div>
                                        <p class="t2">图片尺寸建议为<span class="uploadStyleTip"></span>，大小在2MB以内，格式为jpg/png/gif</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--图片上传弹窗-->

                    <!--样式设置弹窗-->
                    <div id="headerStyle" class="windowBg setWindow hidden" style="background: rgba(0, 0, 0, 0.298039);">
                        <div  class=" uploadBox">
                            <div class="updTopBar">
                                <div class="updTopBarTit"> <span class="uploadBoxTitle">样式设置</span>
                                    <div  class="right editPicClose"></div>
                                </div>
                            </div>
                            <div class="uploadInfoBox">
                                <div class="setStyle">
                                    <div class="formRow clearfix" id="opacityStyle">
                                        <span class="rowTitle">头部样式：</span>
                                        <div class="putWrap">
                                            <div class="cssRadio">
                                                <input type="radio" id="hdDefault" checked name="hdText">
                                                <label for="hdDefault" class="radioLabel checkOn">默认</label>
                                                <input type="radio" id="hdCustom" name="hdText">
                                                <label for="hdCustom" class="radioLabel">自定义</label>
                                            </div>
                                            <div class="blockCell">
                                                <div class="minCell cssRadio">
                                                    背景颜色： <input type="radio" id="hdColorDefault" checked name="hdColor">
                                                    <label for="hdColorDefault" class="radioLabel checkOn">默认</label>
                                                    <input type="radio" id="hdColorCustom" name="hdColor">
                                                    <label for="hdColorCustom" class="radioLabel">自定义</label><a href="javascript:;" class="colorPicker"  id="hdColor"></a>
                                                </div>

                                                <div class="minCell">
                                                    透明度：
                                                    <span class="slider-range slider-range-5"></span><em class="amount userSizeTip">12%</em>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--样式设置弹窗-->

                    <!--样式设置弹窗-->
                    <div id="TextStyle" class="windowBg setWindow hidden" style="background: rgba(0, 0, 0, 0.298039);">
                        <div  class=" uploadBox">
                            <div class="updTopBar">
                                <div class="updTopBarTit"> <span class="uploadBoxTitle">样式设置</span>
                                    <div  class="right editPicClose"></div>
                                </div>
                            </div>
                            <div class="uploadInfoBox" style="height:420px">
                                <div class="setStyle">
                                    <div class="formRow clearfix" id="userStyle">
                                        <span class="rowTitle">用户名称：</span>
                                        <div class="putWrap">
                                            <div class="cssRadio">
                                                <input type="radio" id="userTextDefault" checked name="userText">
                                                <label for="userTextDefault" class="radioLabel checkOn">默认</label>
                                                <input type="radio" id="userTextCustom" name="userText">
                                                <label for="userTextCustom" class="radioLabel">自定义</label>
                                            </div>
                                            <div class="blockCell">
                                                <div class="minCell">
                                                    字号大小：
                                                    <span class="slider-range slider-range-0"></span><em class="amount userSizeTip">12px</em>
                                                </div>
                                                <div class="minCell cssRadio">
                                                    文字颜色： <input type="radio" id="userColorDefault" checked name="regularColor">
                                                    <label for="userColorDefault" class="radioLabel checkOn">默认</label>
                                                    <input type="radio" id="userColorCustom" name="regularColor">
                                                    <label for="userColorCustom" class="radioLabel">自定义</label><a href="javascript:;" class="colorPicker"  id="userColor"></a>
                                                </div>
                                                <div class="minCell cssRadio">
                                                    名字颜色： <input type="radio" id="userNameColorDefault" checked name="regularColor">
                                                    <label for="userNameColorDefault" class="radioLabel checkOn">默认</label>
                                                    <input type="radio" id="userNameColorCustom" name="regularColor">
                                                    <label for="userNameColorCustom" class="radioLabel">自定义</label><a href="javascript:;" class="colorPicker"  id="userNameColor"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formRow clearfix" id="corpStyle">
                                        <span class="rowTitle">企业名称：</span>
                                        <div class="putWrap">
                                            <div class="cssRadio">
                                                <input type="radio" id="corpTextDefault" checked name="corpText">
                                                <label for="corpTextDefault" class="radioLabel checkOn">默认</label>
                                                <input type="radio" id="corpTextCustom" name="corpText">
                                                <label for="corpTextCustom" class="radioLabel">自定义</label>
                                            </div>
                                            <div class="blockCell">
                                                <div class="minCell">
                                                    字号大小：
                                                    <span class="slider-range slider-range-1"></span><em class="amount userSizeTip">12px</em>
                                                </div>
                                                <div class="minCell cssRadio">
                                                    文字颜色： <input type="radio" id="corpColorDefault" checked name="corpregularColor">
                                                    <label for="corpColorDefault" class="radioLabel checkOn">默认</label>
                                                    <input type="radio" id="corpColorCustom" name="corpregularColor">
                                                    <label for="corpColorCustom" class="radioLabel">自定义</label><a href="javascript:;" class="colorPicker"  id="corpColor"></a>
                                                </div>
                                                <div class="minCell cssRadio">
                                                    名字颜色： <input type="radio" id="corpNameColorDefault" checked name="regularColor">
                                                    <label for="corpNameColorDefault" class="radioLabel checkOn">默认</label>
                                                    <input type="radio" id="corpNameColorCustom" name="regularColor">
                                                    <label for="corpNameColorCustom" class="radioLabel">自定义</label><a href="javascript:;" class="colorPicker"  id="corpNameColor"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formRow clearfix" id="descStyle">
                                        <span class="rowTitle">描述文字：</span>
                                        <div class="putWrap">
                                            <div class="cssRadio">
                                                <input type="radio" id="descTextDefault" checked name="descText">
                                                <label for="descTextDefault" class="radioLabel checkOn">默认</label>
                                                <input type="radio" id="descTextCustom" name="descText">
                                                <label for="descTextCustom" class="radioLabel">自定义</label>
                                            </div>
                                            <div class="blockCell">
                                                <div class="minCell">
                                                    字号大小：
                                                    <span class="slider-range slider-range-2"></span><em class="amount userSizeTip">12px</em>
                                                </div>
                                                <div class="minCell cssRadio">
                                                    文字颜色： <input type="radio" id="descColorDefault" checked name="descregularColor">
                                                    <label for="descColorDefault" class="radioLabel checkOn">默认</label>
                                                    <input type="radio" id="descColorCustom" name="descregularColor">
                                                    <label for="descColorCustom" class="radioLabel">自定义</label><a href="javascript:;" class="colorPicker"  id="descColor"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formRow clearfix" id="descTipStyle">
                                        <span class="rowTitle">长按此图：</span>
                                        <div class="putWrap">
                                            <div class="cssRadio">
                                                <input type="radio" id="descTipTextDefault" checked name="descTipText">
                                                <label for="descTipTextDefault" class="radioLabel checkOn">默认</label>
                                                <input type="radio" id="descTipTextCustom" name="descTipText">
                                                <label for="descTipTextCustom" class="radioLabel">自定义</label>
                                            </div>
                                            <div class="blockCell">
                                                <div class="minCell">
                                                    字号大小：
                                                    <span class="slider-range slider-range-3"></span><em class="amount userSizeTip">12px</em>
                                                </div>
                                                <div class="minCell cssRadio">
                                                    文字颜色： <input type="radio" id="descTipColorDefault" checked name="descTipregularColor">
                                                    <label for="descTipColorDefault" class="radioLabel checkOn">默认</label>
                                                    <input type="radio" id="descTipColorCustom" name="descTipregularColor">
                                                    <label for="descTipColorCustom" class="radioLabel">自定义</label><a href="javascript:;" class="colorPicker"  id="descTipColor"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formRow clearfix" id="descDateStyle">
                                        <span class="rowTitle">推广时间：</span>
                                        <div class="putWrap">
                                            <div class="cssRadio">
                                                <input type="radio" id="descDateTextDefault" checked name="descDateText">
                                                <label for="descDateTextDefault" class="radioLabel checkOn">默认</label>
                                                <input type="radio" id="descDateTextCustom" name="descDateText">
                                                <label for="descDateTextCustom" class="radioLabel">自定义</label>
                                            </div>
                                            <div class="blockCell">
                                                <div class="minCell">
                                                    字号大小：
                                                    <span class="slider-range slider-range-4"></span><em class="amount userSizeTip">12px</em>
                                                </div>
                                                <div class="minCell cssRadio">
                                                    文字颜色： <input type="radio" id="descDateColorDefault" checked name="descDateregularColor">
                                                    <label for="descDateColorDefault" class="radioLabel checkOn">默认</label>
                                                    <input type="radio" id="descDateColorCustom" name="descDateregularColor">
                                                    <label for="descDateColorCustom" class="radioLabel">自定义</label><a href="javascript:;" class="colorPicker"  id="descDateColor"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--样式设置弹窗-->

                    <script type="text/javascript">
                        //如果编辑内容存在，则根据数据重新添加样式
                        $(function(){
                            var getHbStyle=$("#hbModStyle").val();
                            if(getHbStyle==''){
                                return false;
                            }else{
                                var newStyle=JSON.parse(getHbStyle);
                                var styleNow;

                                $(".rightForm .bd .formRow label.modLabel").hide();
                                if(newStyle.height==256){
                                    styleNow='.style1';
                                    $(".rightForm .bd .formRow label.modLabel[data='style1']").show();
                                }else if(newStyle.height==500){
                                    styleNow='.style2';
                                    $(".rightForm .bd .formRow label.modLabel[data='style2']").show();
                                }else{
                                    styleNow='.style3';
                                    $(".rightForm .bd .formRow label.modLabel[data='style3']").show();
                                }

                                var pStyleNow= $(styleNow);
                                var avartar_Now=pStyleNow.find(".avatar");
                                var spanMe_Now=pStyleNow.find("p.me");
                                var spanFor_Now=pStyleNow.find("p.for");
                                var descText_Now=pStyleNow.find(".descText");
                                var descCode_Now=pStyleNow.find(".descCode");
                                var descTip_Now=pStyleNow.find(".descTip");
                                var descDate_Now=pStyleNow.find(".descDate");
                                var opacityHd_Now=pStyleNow.find(".opacityHd");

                                pStyleNow.css('background-image','url('+newStyle.bg.image.src+')');
                                avartar_Now.css({
                                    top:newStyle.element[0].y+'px',left:newStyle.element[0].x+'px'
                                });
                                spanMe_Now.css({
                                    top:newStyle.element[1].y+'px',left:newStyle.element[1].x+'px',color:newStyle.element[1].color,'font-size':newStyle.element[1].size+'px'
                                });

                                spanMe_Now.find('em').css({
                                    color:newStyle.element[1].content[1].color
                                });

                                spanFor_Now.css({
                                    top:newStyle.element[2].y+'px',left:newStyle.element[2].x+'px',color:newStyle.element[2].color,'font-size':newStyle.element[2].size+'px'
                                });

                                if($("#corpNamePut input").val()!=''){
                                    spanFor_Now.find('em').text($("#corpNamePut input").val());
                                }else{
                                    spanFor_Now.find('em').text("[企业名称]");
                                }

                                spanFor_Now.find('em').css({
                                    color:newStyle.element[2].content[1].color
                                });


                                descText_Now.find("p").text($("#descTextPut textarea").val());
                                descText_Now.css({
                                    top:newStyle.element[5].y+'px',left:newStyle.element[5].x+'px',color:newStyle.element[5].color,'font-size':newStyle.element[5].size+'px',height:newStyle.element[5].height+'px',width:newStyle.element[5].width+'px'
                                });
                                descCode_Now.css({
                                    top:newStyle.element[4].y+'px',left:newStyle.element[4].x+'px',height:newStyle.element[4].height+'px',width:newStyle.element[4].width+'px'
                                });

                                descTip_Now.css({
                                    top:newStyle.element[6].y+'px',left:newStyle.element[6].x+'px',color:newStyle.element[6].color,'font-size':newStyle.element[6].size+'px'
                                });

                                var oStartTime=$("#promotion .start");
                                if(oStartTime.val()!=''){
                                    var startTimeText=oStartTime.val().substring(0,10);
                                    descDate_Now.find(".start").text(startTimeText);
                                }else{
                                    descDate_Now.find(".start").text("[开始时间]");
                                }
                                var oEndTime=$("#promotion .end");
                                if(oEndTime.val()!=''){
                                    var endTimeText=oEndTime.val().substring(0,10);
                                    descDate_Now.find(".end").text(endTimeText);
                                }else{
                                    descDate_Now.find(".end").text("[结束时间]");
                                }
                                descDate_Now.css({
                                    top:newStyle.element[3].y+'px',left:newStyle.element[3].x+'px',color:newStyle.element[3].color,'font-size':newStyle.element[3].size+'px'
                                });

                                opacityHd_Now.css({
                                    'background-color':newStyle.bg.head.color,'opacity':newStyle.bg.head.alpha
                                });
                            }
                        });
                    </script>
                    <script type="text/javascript" src="<?php echo TPL_URL;?>css/extension/js/jquery-ui-1.9.1.custom.min.js"></script>
                    <script type="text/javascript" src="<?php echo TPL_URL;?>css/extension/js/jquery.bigcolorpicker.min.js"></script>
                    <script type="text/javascript" src="<?php echo TPL_URL;?>css/extension/js/hbconfig.js"></script>
                    <script type="text/javascript">
                        $(function(){
                            var getHbStyle=$("#hbModStyle").val();
                            if(getHbStyle==''){
                                return false;
                            }else{
                                var newStyle=JSON.parse(getHbStyle);
                                var i;
                                if(newStyle.height==256){
                                    i=0;
                                }else if(newStyle.height==500){
                                    i=1;
                                }else{
                                    i=2;
                                }
                                $(".modStyle label").eq(i).click();
                            }
                        });
                    </script>
                    <script src="<?php echo TPL_URL;?>css/upyun.js"></script>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include display('public:footer');?>
<div id="nprogress"><div class="bar" role="bar"><div class="peg"></div></div><div class="spinner" role="spinner"><div class="spinner-icon"></div></div></div>
</body>
</html>