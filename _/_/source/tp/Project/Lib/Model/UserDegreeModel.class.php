<?php

/**
 * Created by PhpStorm.
 * User: pigcms_21
 * Date: 2015/11/20
 * Time: 13:45
 */
class UserDegreeModel extends Model
{
    /*
     * ��ȡһ���� �� ĳ�����̵Ļ�Ա�ȼ�
     */
    public function getUserDegree($uid,$store_id) {

        //��ȡ�û��ڵ��̻�����Ϣ
        $user_point_info = D('StoreUserData')->getpoints_by_storeid($uid,$store_id);
        if($user_point_info['point']) {
            $return = $this->where("store_id='" . $store_id . "' and points_limit <= '" . $user_point_info['point'] . "' ")->order("points_limit desc")->limit(1)->find();
        }
        $return = $return ? $return : array('name' => 'δ�еȼ�');
        return $return;
    }
}