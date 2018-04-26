<?php
namespace app\common\model;
use think\Model;
use traits\model\SoftDelete;
use app\common\model\ActivityFormat;
use app\common\model\ShoppingList;
use app\common\model\OrderTraveler;
use app\common\model\Shop;
class Orderinfo extends Model{
    use SoftDelete;
	protected $table = 'aman_orderinfo';
    protected $connection = [
        // 数据库类型
        'type'        => 'mysql',
        // 服务器地址
        'hostname'    => '127.0.0.1',
        // 数据库名
        'database'    => 'yuanzi1803',
        // 数据库用户名
        'username'    => 'root',
        // 数据库密码
        'password'    => 'Dd@200412',
        // 数据库编码默认采用utf8
        'charset'     => 'utf8',
        // 数据库表前缀
        'prefix'      => 'aman_',
        // 数据库调试模式
        'debug'       => false,
    ];
    protected $deleteTime = 'delete_time';
	protected $auto = [];
	protected $insert = ['create_time','update_time'];
	protected $update = ['update_time'];
	protected $createTime = 'create_time';
	protected $updateTime = 'update_time';
	protected $autoWriteTimestamp = true;
	protected $type = [
			'create_time'    =>'timestamp:Y-m-d H:i:s',
			'update_time'     =>'timestamp:Y-m-d H:i:s',
	        'shopping_list'=>'array'   
	];
	
	
	protected function setCreateTimeAttr($value){
	    if($value){
	        return $value;
	    }else{
	        return time();
	    }
	}
		
	protected function setUpdateTimeAttr(){
		return time();
	}   
    public function activity(){
        return $this->hasOne('activity','id','activity_id');
    }
	public function format(){
	    return $this->hasMany('activity_format','id','activity_id');
	}
	
	public function itinerary(){
	    return $this->hasMany('activity_itinerary','id','activity_id');
	}	
	public function getMylistAttr($value,$data){
	    $shoppinglist=new ShoppingList();
	    $list=$shoppinglist->all(['orderinfo_id'=>$data['id']]);
	    return $list;	    
	}
	public function shoppinglist(){
	    return $this->hasMany('shopping_list','id','orderinfo_id');
	}
	
	public function getShopinfoAttr($value,$data){
	    $shop=new Shop();
	    return $shop->get($data['shop_id']);
	}
	
	public function userinfo(){
	    return $this->hasOne('user','id','user_id');
	}
	public function getstatustxtAttr($value,$data){
	    $ay=['9'=>'待支付','1'=>'已付款','2'=>'已完成','3'=>'订单取消','0'=>'无效订单'];
	    $lasttime=$data['create_time']+1800;
	    if($data['pay_status']==9){
	        if(time()>$lasttime){
	            return '已过期';
	        }else{
	            return '待支付';
	        }
	    }else{
	        return $ay[$data['pay_status']];
	    }	    
	    
	}
	
	public function getOvertimeAttr($value,$data){
	    $ct=$data['create_time'];
	    $ot=$ct+1800;
	    $nt=time();
	    if($nt>$ot){
	        return 0;
	    }else{
	        return $ot-$nt;
	    }
	}
	
	public function getMytravelerAttr($value,$data){
	    $traveler=new OrderTraveler();
	    $list=$traveler->all(['orderinfo_id'=>$data['id']]);
	    return $list;
	}
	
}