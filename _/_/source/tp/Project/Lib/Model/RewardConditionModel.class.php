<?php

/**
 * Created by PhpStorm.
 * User: pigcms_21
 * Date: 2015/11/20
 * Time: 14:05
 */
class RewardConditionModel extends Model
{
    /**
     * ��������������/�������б�
     * ��limit��offset��Ϊ0ʱ����ʾ��������
     */
    public function getList($where, $limit = 0, $offset = 0, $order = 'id asc') {
        $this->where($where);
        $this->order($order);

        if (!empty($limit)) {
            $this->limit($offset . ',' . $limit);
        }

        $reward_condition_list = $this->select();

        return $reward_condition_list;
    }
}