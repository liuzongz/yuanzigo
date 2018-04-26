<?php
namespace app\admin\controller;
use app\common\model\Activity as Mactivity;
use app\common\model\ActivityFormat;
use app\common\model\Hot;
use app\common\model\Shop;
use app\common\model\Tags;
use app\common\model\TagsActivity;
use think\Controller;
use think\Model;

class Activity extends Base {
	public function test() {
		$activity = new \app\common\model\Activity();
		$format = new \app\common\model\ActivityFormat();
		$list = $activity->all();
		for ($i = 0; $i < count($list); $i++) {
			$info = $format->get(['activity_id' => $list[$i]['id']]);
			if (!$info) {
				echo $list[$i]['title'] . '数据不完整，没有完善规格，请补充，快速前往》》<a href="' . url('activity/add', ['id' => $list[$i]['id']]) . '">go</a><br>';
			}
		}
	}

	public function index() {
		$activity = new Mactivity();
		$map = ['element' => 0];
		$tags = input('tags', 0, 'intval');
		$this->assign('tags_on', $tags);
		$type = input('shop', 0, 'intval');
		$this->assign('type_on', $type);
		$keyword = input('keyword', 0);
		if ($tags) {
			if ($keyword) {
				if ($type) {
					$list = $activity::hasWhere('tags', ['tags_id' => $tags])
						->where(['shop_id' => $type, 'title' => ['like', '%' . $keyword . '%']])
						->whereTime('end_time', '>', time())
						->order('hot desc, id desc')
						->paginate(10);
				} else {
					$list = $activity::hasWhere('tags', ['tags_id' => $tags])
						->where(['element' => 0, 'title' => ['like', '%' . $keyword . '%']])
						->whereTime('end_time', '>', time())
						->order('hot desc,id desc')
						->paginate(10);
				}
			} else {
				if ($type) {
					$list = $activity::hasWhere('tags', ['tags_id' => $tags])
						->where(['shop_id' => $type])
						->whereTime('end_time', '>', time())
						->order('hot desc, id desc')
						->paginate(10);
				} else {
					$list = $activity::hasWhere('tags', ['tags_id' => $tags])
						->where(['element' => 0])
						->whereTime('end_time', '>', time())
						->order('hot desc,id desc')
						->paginate(10);
				}

			}
		} else {
			if ($keyword) {
				if ($type) {
					$list = $activity
						->where(['shop_id' => $type, 'title' => ['like', '%' . $keyword . '%']])
						->whereTime('end_time', '>', time())
						->order('hot desc,id desc')
						->paginate(10);
				} else {
					$list = $activity
						->where(['element' => 0, 'title' => ['like', '%' . $keyword . '%']])
						->whereTime('end_time', '>', time())
						->order('hot desc,id desc')
						->paginate(10);
				}
			} else {
				if ($type) {
					$list = $activity
						->where(['shop_id' => $type])
						->whereTime('end_time', '>', time())
						->order('hot desc, update_time desc')
						->paginate(10);
				} else {
					$list = $activity
						->where($map)
						->whereTime('end_time', '>', time())
						->order('hot desc,id desc')
						->paginate(10);
				}
			}
		}

		for ($i = 0; $i < count($list); $i++) {
			$check = db('hot')->where(['activity_id' => $list[$i]['id']])->select();
			$n = 0;
			foreach ($check as $v) {
				if ($v['tags_id'] == $tags && $v['status'] == 1) {
					$n++;
				}
			}
			if ($n > 0) {
				$list[$i]['type'] = 1;
			} else {
				$list[$i]['type'] = 0;
			}
			if ($list[$i]['headimg']) {
				$img = $list[$i]['headimg'][0];
				$list[$i]['headimgs'] = $img;
			} else {
				$list[$i]['headimgs'] = '';
			}
		}

		$shop = new Shop();
		$shopList = $shop->all();
		// $slist = db('shop')->where(['shopname' => ['like', '%推荐资源']])->select();
		$slist = db('shop')->where('tel', null)->select();

		$tags = new \app\common\model\Tags();
		$tagsList = $tags->all();
		$assign = array(
			'list' => $list,
			'slist' => $slist,
			'shoplist' => $shopList,
			'tags' => $tagsList,
		);
		$this->assign($assign);
		return view();
	}

	public function endtime() {
		$activity = new Mactivity();
		$map = ['element' => 0];
		$tags = input('tags', 0, 'intval');
		$this->assign('tags_on', $tags);
		$type = input('shop', 0, 'intval');
		$this->assign('type_on', $type);
		$keyword = input('keyword', 0);
		if ($tags) {
			if ($keyword) {
				if ($type) {
					$list = $activity::hasWhere('tags', ['tags_id' => $tags])
						->where(['shop_id' => $type, 'title' => ['like', '%' . $keyword . '%']])
						->whereTime('end_time', '<', time())
						->order('hot desc, id desc')
						->paginate(10);
				} else {
					$list = $activity::hasWhere('tags', ['tags_id' => $tags])
						->where(['element' => 0, 'title' => ['like', '%' . $keyword . '%']])
						->whereTime('end_time', '<', time())
						->order('hot desc,id desc')
						->paginate(10);
				}
			} else {
				if ($type) {
					$list = $activity::hasWhere('tags', ['tags_id' => $tags])
						->where(['shop_id' => $type])
						->whereTime('end_time', '<', time())
						->order('hot desc, id desc')
						->paginate(10);
				} else {
					$list = $activity::hasWhere('tags', ['tags_id' => $tags])
						->where(['element' => 0])
						->whereTime('end_time', '<', time())
						->order('hot desc,id desc')
						->paginate(10);
				}

			}
		} else {
			if ($keyword) {
				if ($type) {
					$list = $activity
						->where(['shop_id' => $type, 'title' => ['like', '%' . $keyword . '%']])
						->whereTime('end_time', '<', time())
						->order('hot desc,id desc')
						->paginate(10);
				} else {
					$list = $activity
						->where(['element' => 0, 'title' => ['like', '%' . $keyword . '%']])
						->whereTime('end_time', '<', time())
						->order('hot desc,id desc')
						->paginate(10);
				}
			} else {
				if ($type) {
					$list = $activity
						->where(['shop_id' => $type])
						->whereTime('end_time', '<', time())
						->order('hot desc, update_time desc')
						->paginate(10);
				} else {
					$list = $activity
						->where($map)
						->whereTime('end_time', '<', time())
						->order('hot desc,id desc')
						->paginate(10);
				}
			}
		}

		//$list=$activity->where($map)->order('update_time desc')->paginate(10);

		for ($i = 0; $i < count($list); $i++) {
			$check = db('hot')->where(['activity_id' => $list[$i]['id']])->select();
			$n = 0;
			foreach ($check as $v) {
				if ($v['tags_id'] == $tags && $v['status'] == 1) {
					$n++;
				}
			}
			if ($n > 0) {
				$list[$i]['type'] = 1;
			} else {
				$list[$i]['type'] = 0;
			}
			if ($list[$i]['headimg']) {
				$img = $list[$i]['headimg'][0];
				$list[$i]['headimgs'] = $img;
			} else {
				$list[$i]['headimgs'] = '';
			}
		}

		$shop = new Shop();
		$shopList = $shop->all();
		// $slist = db('shop')->where(['shopname' => ['like', '%推荐资源']])->select();
		$slist = db('shop')->where('tel', null)->select();

		$tags = new \app\common\model\Tags();
		$tagsList = $tags->all();
		$assign = array(
			'list' => $list,
			'slist' => $slist,
			'shoplist' => $shopList,
			'tags' => $tagsList,
		);
		$this->assign($assign);
		return view('index');
	}

	public function share() {
		$activity = new Mactivity();
		$tags = input('tags', 0, 'intval');
		$this->assign('tags_on', $tags);
		$type = input('shop', 0, 'intval');
		$this->assign('type_on', $type);
		$keyword = input('keyword', 0);
		if ($tags) {
			if ($keyword) {
				if ($type) {
					$list = $activity::hasWhere('tags', ['tags_id' => $tags])->where(['shop_id' => $type])->where(['title' => ['like', '%' . $keyword . '%']])->order('hot desc,id desc')->paginate(10);
				} else {
					$list = $activity::hasWhere('tags', ['tags_id' => $tags])->where('element', '>', 0)->where(['title' => ['like', '%' . $keyword . '%']])->order('hot desc,id desc')->paginate(10);
				}

			} else {
				if ($type) {
					$list = $activity::hasWhere('tags', ['tags_id' => $tags])->where(['shop_id' => $type])->order('hot desc,id desc')->paginate(10);
				} else {
					$list = $activity::hasWhere('tags', ['tags_id' => $tags])->where('element', '>', 0)->order('hot desc,id desc')->paginate(10);
				}
			}
		} else {
			if ($keyword) {
				if ($type) {
					$list = $activity->where(['shop_id' => $type])->where(['title' => ['like', '%' . $keyword . '%']])->order('hot desc,id desc')->paginate(10);
				} else {
					$list = $activity->where('element', '>', 0)->where(['title' => ['like', '%' . $keyword . '%']])->order('hot desc,id desc')->paginate(10);
				}
			} else {
				if ($type) {
					$list = $activity->where(['shop_id' => $type])->order('hot desc,id desc')->paginate(10);
				} else {
					$list = $activity->where('element', '>', 0)->order('hot desc,id desc')->paginate(10);
				}
			}
		}

		for ($i = 0; $i < count($list); $i++) {
			if ($list[$i]['headimg']) {
				$img = $list[$i]['headimg'][0];
				$list[$i]['headimgs'] = $img;
			} else {
				$list[$i]['headimgs'] = '';
			}
		}

		$shop = new Shop();
		$shopList = $shop->all();
		$slist = db('shop')->where('tel', '<>', '')->select();
		$tags = new \app\common\model\Tags();
		$tagsList = $tags->all();
		$assign = array(
			'list' => $list,
			'slist' => $slist,
			'shoplist' => $shopList,
			'tags' => $tagsList,
		);
		$this->assign($assign);
		return view();
	}

	public function add() {
		$id = input('id', 0, 'intval');
		$tags = new Tags();
		$alltags = $tags->all();
		$shop = new Shop();
		$shopList = $shop->all(['shop_type' => 1]);
		if ($id) {
			$activity = new Mactivity();
			$format = new ActivityFormat();
			$formatList = $format->all(function ($query) use ($id) {
				$query->where('activity_id', $id)->order('id', 'asc');
			});

			$theTags = db('tags_activity')->where(['activity_id' => $id])->select();
			$tagsAy = [];
			for ($i = 0; $i < count($theTags); $i++) {
				$tagsAy[$i] = $theTags[$i]['tags_id'];
			}
			if (!$tagsAy) {
				$tagsAy = implode(',', $tagsAy);
			}
			$info = $activity->get($id);
			$info['period'] = $info['period'];
			$assign = array(
				'info' => $info,
				'format' => $formatList,
				'id' => $id,
				'shoplist' => $shopList,
				'alltags' => $alltags,
				'thetags' => $tagsAy,
			);
			$this->assign($assign);
		} else {
			$assign = array(
				'id' => $id,
				'shoplist' => $shopList,
				'alltags' => $alltags,
			);
			$this->assign($assign);
		}
		return view();
	}

	public function add_do() {
		$aman = input('aman', 1, 'intval');
		if ($_POST || $aman == 1) {
			$dataType = input('t', 1, 'intval');
			$id = input('id', 0, 'intval');
			switch ($dataType) {
			case 1:
				$model = new Mactivity();
				if ($id) {
					$data = array(
						'shop_id' => input('shop_id', 1, 'intval'),
						'title' => input('title'),
						'subtitle' => input('subtitle'),
						'sale_num' => input('sale_num', 0, 'intval'),
						'destination' => input('destination'),
						'start_time' => strtotime(input('start_time')),
						'end_time' => strtotime(input('end_time')),
					);
					$res = $model->save($data, ['id' => $id]);
					if ($res) {
						return result(1, $id);
					} else {
						return result(0, '保存失败');
					}
				} else {
					$data = array(
						'shop_id' => input('shop_id', 1, 'intval'),
						'title' => input('title'),
						'subtitle' => input('subtitle'),
						'sale_num' => input('sale_num', 0, 'intval'),
						'destination' => input('destination'),
						'start_time' => strtotime(input('start_time')),
						'end_time' => strtotime(input('end_time')),
					);

					// $data=$this->request->instance()->except('id,t,aman');
					$res = $model->data($data)->save();
					if ($res) {
						return result(1, $model->id);
					} else {
						return result(0, '保存失败');
					}
				}
				break;
			case 2:
				$model = new ActivityFormat();
				if ($id) {
					//检查该活动是否已经有存在规格数据，如果有，直接删除，然后重写
					$formats = $_POST['formats'];
					$data = array();
					for ($i = 0; $i < count($formats); $i++) {
						$data[$i] = array(
							'activity_id' => $id,
							'name' => $formats[$i][0],
							'price' => $formats[$i][1],
							'stock' => $formats[$i][2],
							'intro' => $formats[$i][3],
							'cost' => $formats[$i][4],
							'xu' => $formats[$i][5],
						);
					}
					if ($data) {
						$model->where(['activity_id' => $id])->delete();
						$res = $model->saveAll($data);
						if ($res) {
							return result(1, '保存成功');
						} else {
							return result(0, '保存失败');
						}
					} else {
						return result(0, '数据为空');
					}
				} else {
					return result(0, '参数不正确');
				}
				break;
			case 3:
				$model = new Mactivity();
				if ($id) {
					$imgs = input('imgs');
					$imgsAy = explode('|', $imgs);
					$res = $model->save(['features' => $imgsAy], ['id' => $id]);
					if ($res) {
						return result(1, '保存成功');
					} else {
						return result(0, '保存失败');
					}
				} else {
					return result(0, '参数不正确');
				}
				break;
			case 4:
				$model = new Mactivity();
				if ($id) {
					$imgs = input('imgs');
					$imgsAy = explode('|', $imgs);
					$res = $model->save(['notice' => $imgsAy], ['id' => $id]);
					if ($res) {
						return result(1, '保存成功');
					} else {
						return result(0, '保存失败');
					}
				} else {
					return result(0, '参数不正确');
				}
				break;
			case 5:
				$model = new Mactivity();
				if ($id) {
					$imgs = input('imgs');
					$imgsAy = explode('|', $imgs);
					$res = $model->save(['intro' => $imgsAy], ['id' => $id]);
					if ($res) {
						return result(1, '保存成功');
					} else {
						return result(0, '保存失败');
					}
				} else {
					return result(0, '参数不正确');
				}
				break;
			case 6:
				//插入活动标签
				$tags = input('tags');
				if (!$tags) {
					return json(['data' => ['code' => 0, 'msg' => '请至少选择一个关注的领域']]);
				}
				$tags = explode(',', $tags);

				$mTags = new TagsActivity();
				for ($i = 0; $i < count($tags); $i++) {
					$tagsData[$i] = array(
						'tags_id' => $tags[$i],
						'activity_id' => $id,
					);
				}
				//先删除之前的标签
				$res = db('tags_activity')->where(['activity_id' => $id])->delete();
				$res = $mTags->saveAll($tagsData);
				if (!$res) {
					return result(0, '保存标签失败');
				}
				return result(1, '保存成功');
			case 7:
				$model = new Mactivity();
				if ($id) {
					$imgs = input('imgs');
					$imgsAy = explode('|', $imgs);
					$res = $model->save(['headimg' => $imgsAy], ['id' => $id]);
					if ($res) {
						return result(1, '保存成功');
					} else {
						return result(0, '保存失败');
					}
				} else {
					return result(0, '参数不正确');
				}
				break;
			case 8:
				$model = new \app\common\model\ActivityPeriod();
				if ($id) {
					$periodName = input('period_name');
					$periodId = input('period_id', 0, 'intval');
					$xu = input('xu', 0, 'intval');
					if ($periodId) {
						$res = $model->save(['name' => $periodName, 'xu' => $xu], ['id' => $periodId]);
					} else {
						$perData = array(
							'activity_id' => $id,
							'name' => $periodName,
							'xu' => $xu,
						);
						$res = $model->save($perData);
					}

					if ($res) {
						return result(1, '保存成功');
					} else {
						return result(0, '保存失败');
					}
				} else {
					return result(0, '参数不正确');
				}
				break;
			}
		} else {
			return result(0, '保存失败');
		}
	}

	public function del() {
		$id = input('id', 0, 'intval');
		if ($_POST) {
			$activity = new Mactivity();
			$res = $activity->destroy($id);
			if ($res) {
				return result(1, '删除成功');
			} else {
				return result(0, '删除失败');
			}
		} else {
			return result(0, '非法操作');
		}
	}

	public function hot() {
		$id = input('id', 0, 'intval'); //产品ID
		$tags = input('tags', 0, 'intval'); //标签

		if ($_POST) {
			$activity = new Mactivity();
			$activityInfo = $activity->get($id);
			$model = new \app\common\model\Hot();

			$status = $_POST['status'];
			//取消爆款
			if ($status == 0) {
				//取消hot下该产品爆款状态
				$jian = $model->save(['status' => 0], ['status' => 1, 'tags_id' => $tags, 'activity_id' => $id]);
				if ($jian) {
					//其他标签下该产品是否是爆款
					$check = db('hot')->where('tags_id', '<>', $tags)->where(['status' => 1, 'activity_id' => $id])->count();
					if ($check == 0) {
						$res = $activity->save(['hot' => 0], ['id' => $id]);
					} else {
						return result(1, '设置成功');
					}
				} else {
					return result(0, '设置失败');
				}
			} else if ($status == 1) {
				//在对应标签下添加爆款
				//先插入新加的
				$hot = $model->save(['tags_id' => $tags, 'activity_id' => $id, 'status' => 1]);
				if ($hot) {
					$res = $activity->save(['hot' => 1], ['id' => $id]);
					//查找该类型下有几个爆款
					$num = db('hot')->where(['tags_id' => $tags, 'status' => 1])->count();
					if ($num > 3) {
						//查找当前为爆款且最早设为爆款的那个，将其状态改为0
						$old = db('hot')->where(['tags_id' => $tags, 'status' => 1])->order('update_time asc')->limit(1)->find();
						$jian = $model->save(['status' => 0], ['id' => $old['id']]); //将最早的爆款的状态改为0

						//其他标签下该取消爆款的产品是否是爆款
						$check = db('hot')->where('tags_id', '<>', $tags)->where(['status' => 1, 'activity_id' => $old['activity_id']])->count();
						if ($check == 0) {
							$res = $activity->save(['hot' => 0], ['id' => $old['activity_id']]);
						}
					}
				} else {
					return result(0, '设置失败');
				}
			}
			if ($res) {
				return result(1, '设置成功');
			} else {
				return result(0, '设置失败');
			}
		} else {
			return result(0, '非法操作');
		}
	}

	public function addnotice() {
		$id = input('id', 0, 'intval');
		if ($_POST && $id) {
			$notice = input('post.notice');
			$activity = new Mactivity();
			$res = $activity->save(['notice' => $notice], ['id' => $id]);
			if ($res) {
				return result(1, '保存成功');
			} else {
				return result(0, '保存失败');
			}
		} else {
			return result(0, '非法操作');
		}
	}

	public function copyActivity() {
		$id = input('id', 0, 'intval');
		$shop_id = input('shop_id', 0, 'intval');
		if ($id && $shop_id) {
			$newInfo = db('activity')
				->where(['id' => $id])
				->field('title,subtitle,headimg,destination,execution_time,intro,features,notice,tags,create_time')
				->find();
			$newInfo['shop_id'] = $shop_id;
			$newActivityId = db('activity')->insertGetId($newInfo);

			$newFormatInfo = db('activity_format')
				->where(['activity_id' => $id])
				->field('name,price,cost,stock,intro')
				->select();
			for ($i = 0; $i < count($newFormatInfo); $i++) {
				$newFormatInfo[$i]['activity_id'] = $newActivityId;
			}
			$format = new ActivityFormat();
			$res = $format->saveAll($newFormatInfo);
			if ($res) {
				return result(1, '保存成功');
			} else {
				return resutl(0, '保存失败');
			}
		} else {
			return result(0, '参数不齐');
		}
	}

	public function periodDel() {
		$id = input('id', 0, 'intval');
		$model = new \app\common\model\ActivityPeriod();
		$res = $model->destroy($id);
		if ($res) {
			return result(1, '删除成功');
		} else {
			return result(0, '删除失败');
		}
	}

	public function send() {
		return view();
	}

	//消息模板推送每日资源
	public function sendMsg() {
		//爆款产品ID
		$data = db('activity')->where(['hot' => 1])->field('id')->select();
		foreach ($data as $d) {
			$hot[] = $d['id'];
		}
		//所有标签
		$tags = db('tags')->where("name!=''")->field('id')->select();

		//查找每个标签下的爆款
		$arr = [];
		foreach ($tags as $v) {
			//查找对应标签下的产品
			$check = db('hot')->where(['tags_id' => $v['id'], 'status' => 1])->field('id,activity_id,tags_id')->select();
			foreach ($check as $s) {
				if (in_array($s['activity_id'], $hot)) {
					$arr[$v['id']][] = $s['activity_id'];
				}
			}
		}

		//所有店铺
		$shop = db('shop')->field('id,uid')->select();
		foreach ($shop as $v) {
			$stores[] = $v['id'];
		}

		//每个人店铺下的标签
		$arr3 = [];
		foreach ($shop as $v) {
			$check = db('tags_shop')->where(['shop_id' => $v['id']])->field('id,shop_id,tags_id')->select();
			$arr1['uid'] = $v['uid'];
			$arr2 = [];
			foreach ($check as $s) {
				if (in_array($s['shop_id'], $stores)) {
					$arr2['tags'][] = $s['tags_id'];
				}
			}
			if ($arr2) {
				$arr3[] = array_merge($arr1, $arr2);
			}
		}

		//发送模板消息
		foreach ($arr3 as $v) {
			$length = count($v['tags']); //该店铺下标签个数
			if ($length == 1) {
				$tag = $arr[$v['tags'][0]];
				$id1 = $tag[0];
				$id2 = $tag[1];
				$id3 = $tag[2];
			} else if ($length == 2) {
				$id1 = $arr[$v['tags'][0]][array_rand($arr[$v['tags'][0]], 1)];
				$id2 = $arr[$v['tags'][1]][array_rand($arr[$v['tags'][1]], 1)];
				//防止重复
				if ($id2 == $id1) {
					for ($i = 0; $i < 100; $i++) {
						$id2 = $arr[$v['tags'][1]][array_rand($arr[$v['tags'][1]], 1)];
						if ($id2 != $id1) {
							break;
						}
					}
				}
				$tag = array_merge($arr[$v['tags'][0]], $arr[$v['tags'][1]]);
				$tag = array_unique($tag);
				$id3 = $tag[array_rand($tag, 1)];
				if ($id3 == $id1 || $id3 == $id2) {
					for ($i = 0; $i < 10; $i++) {
						$id3 = $tag[array_rand($tag, 1)];
						if ($id3 != $id1 && $id3 != $id2) {
							break;
						}
					}
				}
			} else if ($length == 3) {
				$id1 = $arr[$v['tags'][0]][array_rand($arr[$v['tags'][0]], 1)];
				$id2 = $arr[$v['tags'][1]][array_rand($arr[$v['tags'][1]], 1)];
				$id3 = $arr[$v['tags'][2]][array_rand($arr[$v['tags'][2]], 1)];
				if ($id2 == $id1) {
					for ($i = 0; $i < 100; $i++) {
						$id2 = $arr[$v['tags'][1]][array_rand($arr[$v['tags'][1]], 1)];
						if ($id2 != $id1) {
							break;
						}
					}
				}
				if ($id3 == $id1 || $id3 == $id2) {
					for ($i = 0; $i < 10; $i++) {
						$id3 = $arr[$v['tags'][2]][array_rand($arr[$v['tags'][2]], 1)];
						if ($id3 != $id1 && $id3 != $id2) {
							break;
						}
					}
				}
			} else if ($length > 3) {
				$shai = array_rand($v['tags'], 4);
				// var_dump($shai);
				//标签没有0，所以取四个随机数的后三个，第一个有可能为0
				$id1 = $arr[$shai[1]][array_rand($arr[$shai[1]], 1)];
				$id2 = $arr[$shai[2]][array_rand($arr[$shai[2]], 1)];
				$id3 = $arr[$shai[3]][array_rand($arr[$shai[3]], 1)];
				if ($id2 == $id1) {
					for ($i = 0; $i < 100; $i++) {
						$id2 = $arr[$shai[1]][array_rand($arr[$shai[1]], 1)];
						if ($id2 != $id1) {
							break;
						}
					}
				}
				if ($id3 == $id1 || $id3 == $id2) {
					for ($i = 0; $i < 10; $i++) {
						$id3 = $arr[$shai[2]][array_rand($arr[$shai[2]], 1)];
						if ($id3 != $id1 && $id3 != $id2) {
							break;
						}
					}
				}
			} else {
				$shai = array_rand($hot, 3); //三个标签下标
				$id1 = $hot[$shai[0]];
				$id2 = $hot[$shai[1]];
				$id3 = $hot[$shai[2]];
			}
			$url = 'http://' . $_SERVER['SERVER_NAME'] . '/mobile/activity/recommend/id1/' . $id1 . '/id2/' . $id2 . '/id3/' . $id3;

			$user = db('user')->where(['id' => $v['uid']])->field('name,create_time,openid')->find();
			$first = '@' . $user['name'] . '，小原子的安利时间到了！';
			$content = '我们精心为您挑选了三款组团出游产品，非常适合您的客户群体，利润丰厚，快来浏览一下吧！';
			$remark = '点击详情！开启一键生成您的专属定制活动之旅吧～欢迎联系小原子服务工程师，随时为你解决问题！';
			$good = '今日精品推荐';
			$name = '小原子Adam（15226161289）';
			$openid = $user['openid'];
			// $openid = 'omP8NwsPvUUuSfgeEPme3JeIvabk';
			$tempId = 'cb1DUAOqW6jFSOgyFwt9v-TU5KqPGUK0iIfkL_k90iI';
			$receive = &load_wechat('Receive');
			$tempData = array(
				'touser' => $openid,
				'template_id' => $tempId,
				'url' => $url,
				'topcolor' => '#FF0000',
			);
			$tempNote = array(
				'first' => array('value' => $first),
				'Content1' => array('value' => $content),
				'Good' => array('value' => $good),
				'name' => array('value' => $name),
				'remark' => array('value' => $remark),
			);
			$tempData['data'] = $tempNote;
			$res = $receive->sendTemplateMessage($tempData);
		}
		if ($res) {
			echo json_encode(array('reg' => 1));
		} else {
			echo json_encode(array('reg' => 2));
		}
	}
}