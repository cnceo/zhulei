<div class="app-design clearfix">
    <div class="app-preview">
        <div class="app-header"></div>
        <div class="app-entry">
            <div class="app-config js-config-region">
                <div class="app-field clearfix editing">
					<h1 class="page-title"><span></span></h1>
					<div class="control-group">
						<div class="custom-title text-left">
							<h2 class="title"></h2>
						</div>
					</div>
					<div class="control-group">
						<ul class="sc-goods-list clearfix size-2 card pic"></ul>
					</div>
					<div class="actions">
						<div class="actions-wrap"><span class="action edit">编辑</span><span class="action add">加内容</span></div>
					</div>
				</div>
            </div>
			<div class="app-fields js-fields-region"><div class="app-fields ui-sortable"></div></div>
		</div>
    </div>
    <div class="app-sidebars">
		<div class="app-sidebar" style="margin-top:71px;">
			<div class="arrow"></div>
			<div class="app-sidebar-inner js-sidebar-region"></div>
		</div>
    </div>
    <div class="app-actions" style="display:block;bottom:0px;">
        <div class="form-actions text-center">
            <input class="btn btn-primary btn-save" type="submit" value="保存" data-loading-text="保存..."/>
        </div>
    </div>
</div>
<div style="display:none;" id="edit_data" cat-name="<?php echo $now_group['group_name'];?>" cat-id="<?php echo $now_group['group_id'];?>" show-tag-title="<?php echo $now_group['is_show_name'];?>" first-sort="<?php echo $now_group['first_sort'];?>" second-sort="<?php echo $now_group['second_sort'];?>" size="<?php echo $now_group['list_style_size'];?>" size-type="<?php echo $now_group['list_style_type'];?>" price="<?php echo $now_group['is_show_price'];?>" show-title="<?php echo $now_group['is_show_product_name'];?>" buy-btn="<?php echo $now_group['is_show_buy_button'];?>" buy-btn-type="<?php echo $now_group['buy_button_style'];?>"><?php echo $now_group['group_label'];?></div>
<div style="display:none;" id="edit_custom" custom-field='<?php echo $customField;?>'></div>