<include file="Public:header"/>
<script type="text/javascript" src="static/js/layer/layer/layer.js"></script>
<script type="text/javascript">
var xhr;
function createXMLHttpRequest(){
    if(window.ActiveXObject){
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }else if(window.XMLHttpRequest){
        xhr = new XMLHttpRequest();
    }
}
function UpladFile(){
    var fileObj = document.getElementById("upload_file").files[0];
    var FileController = "zc.php?c=index&a=ajax_uploadImg";
    var form = new FormData();
    form.append("myfile", fileObj);
    createXMLHttpRequest();
    xhr.onreadystatechange = handleStateChange;
    xhr.open("post", FileController, true);
    xhr.send(form);
}
function handleStateChange(){
    if(xhr.readyState == 4){
        if (xhr.status == 200 || xhr.status == 0){
            var result = xhr.responseText;
            var json = eval("(" + result + ")");
            if(json.code==200){
            	$("#imgcc").attr("src",json.path);
            	$("#imgcc").show();
                $("#addImg").val(json.path);
                layer.msg("图片上传成功");
            }else{
                layer.msg(json.msg);
            }
        }
    }
}
function layerClose(){
	var index = parent.layer.getFrameIndex(window.name);
	parent.layer.close(index);
}
</script>



	<form  method="post" action="{pigcms{:U('News/catModify')}" frame="true" refresh="true" enctype="multipart/form-data">
		<table cellpadding="0" cellspacing="0" class="frame_form" width="100%">
			<tr>
				<th width="80">分类名称</th>
				<td><input type="text" class="input fl" name="cat_name" size="60" placeholder="请输入名称" validate="maxlength:20,required:true"/></td>
			</tr>
			<tr>
				<th width="80">分类标识</th>
				<td><input type="text" class="input fl" name="cat_key" size="60" placeholder="分类标识如：index_top" validate="maxlength:20,required:true" tips="一旦填写则不可以修改"/></td>
			</tr>
                        <tr>
                                <th width="80">分类图片</th>
                                <td>
                                    <input type="text" style="width: 280px;" class="input-text"  name="icon" value="{pigcms{$info.url}" id="addImg" /><input type="file" style="width: 170px;border:none;" value="" id="upload_file" onchange="UpladFile();" />&nbsp;&nbsp;
                                </td>
                        </tr>
                                        
			<tr>
				<th width="80">排序</th>
				<td><input type="text" class="input fl" name="sort" size="10" value="" validate="number:true,maxlength:6" tips="数值越大，排序越前"/></td>
			</tr>
			<tr>
				<th width="80">是否显示</th>
				<td class="radio_box">
					<span class="cb-enable"><label class="cb-enable selected"><span>显示</span><input type="radio" selected="selected" name="cat_state"value="1"/>
						</label></span>
					<span class="cb-disable"><label class="cb-disable"><span>隐藏</span><input type="radio" name="cat_state" value="0" /></label></span>
				</td>
			</tr>
			<tr>
				<th width="80">备注</th>
				<td>
					<textarea name="desc" style="width: 380px;" id="desc" ></textarea>
				</td>
			</tr>
		</table>
		<div class="btn hidden">
			<input type="submit" name="dosubmit" id="dosubmit" value="提交" class="button" />
			<input type="reset" value="取消" class="button" />
		</div>
	</form>
<include file="Public:footer"/>