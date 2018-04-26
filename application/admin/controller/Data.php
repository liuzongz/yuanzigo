<?php
namespace app\admin\controller;
use think\Controller;
use think\Model;

class Data extends Base {
	public function shop() {
		$shop = new \app\common\model\Shop();
		$day1 = nDay(1);
		$day2 = nDay(2);
		$shopSum = $shop->where('create_time', 'between', [$day2['beginTime'], $day2['endTime']])->count();
		$reg = array(
			'day1' => $shop->where('create_time', 'between', [nday(1)['beginTime'], nday(1)['endTime']])->count(),
			'day2' => $shop->where('create_time', 'between', [nday(2)['beginTime'], nday(2)['endTime']])->count(),
			'day7' => $shop->where('create_time', 'between', [nday(4)['beginTime'], nday(4)['endTime']])->count(),
			'day14' => $shop->where('create_time', 'between', [nday(5)['beginTime'], nday(5)['endTime']])->count(),
			'day30' => $shop->where('create_time', 'between', [nday(6)['beginTime'], nday(6)['endTime']])->count(),
			'day60' => $shop->where('create_time', 'between', [nday(11)['beginTime'], nday(11)['endTime']])->count(),
		);
		$member = new \app\common\model\Member();
		$login = array(
			'day1' => $member->where('create_time', 'between', [nday(1)['beginTime'], nday(1)['endTime']])->where('shop_id', '>', 0)->count(),
			'day2' => $member->where('create_time', 'between', [nday(2)['beginTime'], nday(2)['endTime']])->where('shop_id', '>', 0)->count(),
			'day7' => $member->where('create_time', 'between', [nday(4)['beginTime'], nday(4)['endTime']])->where('shop_id', '>', 0)->count(),
			'day14' => $member->where('create_time', 'between', [nday(5)['beginTime'], nday(5)['endTime']])->where('shop_id', '>', 0)->count(),
			'day30' => $member->where('create_time', 'between', [nday(6)['beginTime'], nday(6)['endTime']])->where('shop_id', '>', 0)->count(),
			'day60' => $member->where('create_time', 'between', [nday(11)['beginTime'], nday(11)['endTime']])->where('shop_id', '>', 0)->count(),
		);

		$this->assign(['reg' => $reg, 'login' => $login]);
		return view();
	}

	public function daily() {
		$activity = new \app\common\model\Activity();
		$order = new \app\common\model\Orderinfo();
		$user = new \app\common\model\User();

		$num = array(
			'day1' => array(
				'youpin' => $activity->where('update_time', 'between', [nday(1)['beginTime'], nday(1)['endTime']])->where('element', '=', 0)->count(),
				'zaishou' => $activity->where('update_time', 'between', [nday(1)['beginTime'], nday(1)['endTime']])->where('element', '>', 0)->count(),
				'ekehu' => $user->where('create_time', 'between', [nday(1)['beginTime'], nday(1)['endTime']])->where(['name' => ['like', '%资源推荐']])->count(),
				'zkehu' => $user->where('create_time', 'between', [nday(1)['beginTime'], nday(1)['endTime']])->where('rule', '=', 2)->count(),
				'sale' => $order->where('create_time', 'between', [nday(1)['beginTime'], nday(1)['endTime']])->where('pay_status', '=', 1)->sum('pay_price'),
			),
			'day2' => array(
				'youpin' => $activity->where('update_time', 'between', [nday(2)['beginTime'], nday(2)['endTime']])->where('element', '=', 0)->count(),
				'zaishou' => $activity->where('update_time', 'between', [nday(2)['beginTime'], nday(2)['endTime']])->where('element', '>', 0)->count(),
				'ekehu' => $user->where('create_time', 'between', [nday(2)['beginTime'], nday(2)['endTime']])->where(['name' => ['like', '%资源推荐']])->count(),
				'zkehu' => $user->where('create_time', 'between', [nday(2)['beginTime'], nday(2)['endTime']])->where('rule', '=', 2)->count(),
				'sale' => $order->where('create_time', 'between', [nday(2)['beginTime'], nday(2)['endTime']])->where('pay_status', '=', 1)->sum('pay_price'),
			),
			'day7' => array(
				'youpin' => $activity->where('update_time', 'between', [nday(4)['beginTime'], nday(4)['endTime']])->where('element', '=', 0)->count(),
				'zaishou' => $activity->where('update_time', 'between', [nday(4)['beginTime'], nday(4)['endTime']])->where('element', '>', 0)->count(),
				'ekehu' => $user->where('create_time', 'between', [nday(4)['beginTime'], nday(4)['endTime']])->where(['name' => ['like', '%资源推荐']])->count(),
				'zkehu' => $user->where('create_time', 'between', [nday(4)['beginTime'], nday(4)['endTime']])->where('rule', '=', 2)->count(),
				'sale' => $order->where('create_time', 'between', [nday(4)['beginTime'], nday(4)['endTime']])->where('pay_status', '=', 1)->sum('pay_price'),
			),
			'day14' => array(
				'youpin' => $activity->where('update_time', 'between', [nday(5)['beginTime'], nday(5)['endTime']])->where('element', '=', 0)->count(),
				'zaishou' => $activity->where('update_time', 'between', [nday(5)['beginTime'], nday(5)['endTime']])->where('element', '>', 0)->count(),
				'ekehu' => $user->where('create_time', 'between', [nday(5)['beginTime'], nday(5)['endTime']])->where(['name' => ['like', '%资源推荐']])->count(),
				'zkehu' => $user->where('create_time', 'between', [nday(5)['beginTime'], nday(5)['endTime']])->where('rule', '=', 2)->count(),
				'sale' => $order->where('create_time', 'between', [nday(5)['beginTime'], nday(5)['endTime']])->where('pay_status', '=', 1)->sum('pay_price'),
			),
			'day30' => array(
				'youpin' => $activity->where('update_time', 'between', [nday(6)['beginTime'], nday(6)['endTime']])->where('element', '=', 0)->count(),
				'zaishou' => $activity->where('update_time', 'between', [nday(6)['beginTime'], nday(6)['endTime']])->where('element', '>', 0)->count(),
				'ekehu' => $user->where('create_time', 'between', [nday(6)['beginTime'], nday(6)['endTime']])->where(['name' => ['like', '%资源推荐']])->count(),
				'zkehu' => $user->where('create_time', 'between', [nday(6)['beginTime'], nday(6)['endTime']])->where('rule', '=', 2)->count(),
				'sale' => $order->where('create_time', 'between', [nday(6)['beginTime'], nday(6)['endTime']])->where('pay_status', '=', 1)->sum('pay_price'),
			),
			'day60' => array(
				'youpin' => $activity->where('update_time', 'between', [nday(11)['beginTime'], nday(11)['endTime']])->where('element', '=', 0)->count(),
				'zaishou' => $activity->where('update_time', 'between', [nday(11)['beginTime'], nday(11)['endTime']])->where('element', '>', 0)->count(),
				'ekehu' => $user->where('create_time', 'between', [nday(11)['beginTime'], nday(11)['endTime']])->where(['name' => ['like', '%资源推荐']])->count(),
				'zkehu' => $user->where('create_time', 'between', [nday(11)['beginTime'], nday(11)['endTime']])->where('rule', '=', 2)->count(),
				'sale' => $order->where('create_time', 'between', [nday(11)['beginTime'], nday(11)['endTime']])->where('pay_status', '=', 1)->sum('pay_price'),
			),
			'all' => array(
				'youpin' => $activity->where('element', '=', 0)->count(),
				'zaishou' => $activity->where('element', '>', 0)->count(),
				'ekehu' => $user->where(['name' => ['like', '%资源推荐']])->count(),
				'zkehu' => $user->where('rule', '=', 2)->count(),
				'sale' => $order->where('pay_status', '=', 1)->sum('pay_price'),
			),
		);

		$this->assign('num', $num);
		return view();
	}
}