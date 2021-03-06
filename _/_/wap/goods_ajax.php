<?php
/**
 * 产品异步加载
 */
require_once dirname(__FILE__) . '/global.php';

//指定调用特有方法
$action = isset($_GET['action']) ? $_GET['action']:'';

switch($action) {
	//获取商品详情页 评论列表
	case 'buy_list':
		$page = max(1, $_GET['page'] + 0);
		$product_id = $_GET['product_id'];
			
		if (empty($product_id)) {
			echo json_encode(array('status' => false, 'msg' => '参数错误'));
			exit;
		}
			
		$Order_product_model = M('Order_product');
		$count = $Order_product_model->getProductBuyCount($product_id);
		
			
		$order_product_list = array();
		$pages = '';
		$limit = 5;
		$total_page = ceil($count / $limit);
		if ($count > 0) {
			$page = min($page, ceil($count / $limit));
			$offset = ($page - 1) * $limit;
			$order_product_list = $Order_product_model->getProductBuyList($product_id, $limit, $offset, true);
		}
			
		$user_list = array();
		if ($order_product_list['user_list']) {
			foreach ($order_product_list['user_list'] as $key => $user) {
				$tmp = array();
				$tmp['nickname'] = anonymous($user['nickname']);
				$tmp['avatar'] = $user['avatar'];
				
				$user_list[$key] = $tmp;
			}
		}
		
		// debug用户
		$user_list[0] = array('nickname' => '匿名', 'avatar' => getAttachmentUrl('images/touxiang.png', false));
		
		$json_return['list'] = $order_product_list['order_product_list'];
		$json_return['userlist'] = $user_list;
		$json_return['count'] = $count;
		$json_return['maxpage'] = ceil($count / $limit);
			
		$json_return['noNextPage'] = false;
		if(count($json_return['list']) < $limit || $total_page <= $page){
			$json_return['noNextPage'] = true;
		}
			
		json_return(0, $json_return);
		break;

	case 'comment_by_order':
		//订单id
		$order_no = $_GET['order_no'];
		$order_id = $_GET['oid'];
		if(!$order_no || !$order_id)    pigcms_tips('抱歉，操作异常！');
		$order_model = D('Order');

		$order_model->where(array('order_no'=>$order_no))->find();
		$order_product = M('Order_product')->orderProduct($order_id,true);
		foreach($order_product as $k=>$v) {
			$order_product_id[] = $v['product_id'];
			$products_categoryid_arr[] = $v['category_id'];
		}
		$storeid = $_GET['id'];

		//订单商品的评论
		$where = array(
				'type'=> 'PRODUCT',
				'uid' => $_SESSION['wap_user']['uid'],
				'order_id' => $order_id,
				'relation_id'=>array('in',$order_product_id)
		);
		$product_comment = M('Comment')->getList($where, $order_by = '', $limit = 0 , $offset = 0, true);
		$order_product_comment = $product_comment;
		$order_product_comment['comment_list'] = array();
		foreach($product_comment['comment_list'] as $k=>$v) {
			$order_product_comment['comment_list'][$v['relation_id']] = $v;
		}

		// 查找系统评论TAG

		//获取系统标签
		if($products_categoryid_arr) $tag_slist = M('System_tag')->getNameListByPid($products_categoryid_arr);


		/*
		 $product_category = M('Product_category')->getCategory($product['category_id']);
		 if (!empty($product_category['tag_str'])) {
			$where = array();
			$where['id'] = array('in', explode(',', $product_category['tag_str']));
			$tag_list = M('System_tag')->geNameList($where);
			}
		*/

		//dump($order_product_comment);

		//dump($order_product);
		//dump($tag_slist);
		include display('comment_by_order');
		break;

}