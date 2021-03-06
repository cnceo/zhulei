<div class="widget-list">
    <div class="js-list-filter-region clearfix ui-box" style="position: relative;">
        <div class="widget-list-filter">
            <div class="js-list-filter-region clearfix">
                <form class="form-horizontal ui-box list-filter-form" onsubmit="return false;">
                    <div class="control-group">
                        <label class="control-label">
                            起止时间：
                        </label>
                        <div class="controls">
                            <input type="text" name="stime" class="js-stime" id="js-stime" />
                            <span>&nbsp;&nbsp;至&nbsp;&nbsp;</span>
                            <input type="text" name="etime" class="js-etime" id="js-etime" />
                            <span class="date-quick-pick" data-days="7">最近7天</span>
                            <span class="date-quick-pick" data-days="30">最近30天</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">
                            提现状态：
                        </label>
                        <div class="controls">
                            <select name="status" class="js-status-select">
                                <option value="0" selected="">全部</option>
                                <option value="1">申请中</option>
                                <option value="2">银行处理中</option>
                                <option value="3">提现成功</option>
                                <option value="4">提现失败</option>
                            </select>
                            <a href="javascript:;" class="ui-btn ui-btn-primary js-filter" data-loading-text="正在查询...">查询</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
     $status = array(
         '1' => '申请中',
         '2' => '银行处理中',
         '3' => '提现成功',
         '4' => '提现失败'
     );
    ?>
    <div class="ui-box">
        <?php if (!empty($withdrawals)) { ?>
            <table class="ui-table ui-table-list" style="padding: 0px;">
                <thead class="js-list-header-region tableFloatingHeaderOriginal">
                <tr class="widget-list-header">
                    <th class="cell-10">申请时间</th>
                    <th class="cell-22">提现银行 | 编号</th>
                    <th class="cell-12 text-right">提现金额(元)</th>
                    <th class="cell-12">处理完成时间</th>
                    <th class="cell-12">状态</th>
                    <th class="cell-15">申请人</th>
                    <th class="cell-15" style="width: 100px;">备注</th>
                    <th class="cell-15" style="width: 132px;">操作</th>
                </tr>
                </thead>
                <tbody class="js-list-body-region">
                <?php foreach ($withdrawals as $withdrawal) { ?>
                    <tr class="widget-list-item">
                        <td width="90"><?php echo date('Y-m-d H:i:s', $withdrawal['add_time'])?></td>
                        <td width="195"><?php if ($withdrawal['withdrawal_type']) { ?>公司账户<?php } else { ?>个人账户<?php } ?> |
                            <span class="js-bank-detail" style="cursor: pointer;"><?php echo mb_substr($withdrawal['bank'], 0, 4, 'UTF-8'); ?>...<?php echo substr($withdrawal['bank_card'], -4); ?><b class="caret" data-bank="<?php echo $withdrawal['bank']; ?>" data-opening-bank="<?php echo $withdrawal['opening_bank']; ?>" data-bank-card="<?php echo $withdrawal['bank_card']; ?>" data-bank-account="<?php echo $withdrawal['bank_card_user']; ?>"></b></span>
                            <br>
                            <span class="c-gray"><?php echo $withdrawal['trade_no']; ?></span>
                        </td>
                        <td class="text-right ui-money-outlay"><?php echo $withdrawal['amount']; ?></td>
                        <td><?php if (!empty($withdrawal['complate_time'])) { ?><?php echo date('Y-m-d H:i:s', $withdrawal['complate_time']); ?><?php } ?></td>
                        <td class=""><?php echo $status[$withdrawal['status']]; ?></td>
                        <td>
                            <?php echo !empty($withdrawal['nickname']) ? $withdrawal['nickname'] : $withdrawal['store']; ?>
                            <br>
                            <span class="c-gray"><?php echo $withdrawal['tel']; ?></span>
                        </td>
                        <td>
                            <span class="bak-content"><?php echo $withdrawal['bak']; ?></span><br/>
                            <a href="javascript:void(0);" class="add-bak" data-id="<?php echo $withdrawal['pigcms_id'];?>">添加备注</a>
                        </td>
                        <td class="status">
                            <select <?php if (in_array($withdrawal['status'], array(3,4))) { ?>disabled="true"<?php } ?> style="width: 100px;" data-status="<?php echo $withdrawal['status']; ?>" name="icome-status-<?php echo $withdrawal['pigcms_id'];?>" data-id="<?php echo $withdrawal['pigcms_id'];?>" class="js-status-select">
                                <?php  foreach($status as $key => $value) {?>
                                    <?php if ($key < $withdrawal['status']) { continue; } ?>
                                    <option value="<?php echo $key;?>" <?php if ($key == $withdrawal['status']) { ?>selected="true"<?php } ?>><?php echo $value;?></option>
                                <?php }?>
                            </select>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
        <div class="js-list-empty-region">
            <?php if (empty($withdrawals)) { ?>
                <div>
                    <div class="no-result widget-list-empty">还没有相关数据。</div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="js-list-footer-region ui-box">
        <div class="widget-list-footer">
            <div class="pagenavi"><?php echo $page; ?></div>
        </div>
    </div>
</div>