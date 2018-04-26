<?php
namespace app\common\model;
use think\Model;
use traits\model\SoftDelete;
use app\common\model\WeixinMenu;
use Wechat\WechatMenu;
class WeixinMenu extends Model{
    use SoftDelete;
	protected $table = 'aman_weixin_menu';
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
			'create_time'    =>'timestamp:Y-m-d',
			'update_time'     =>'timestamp:Y-m-d',
	];
	
	protected function setCreateTimeAttr($value){
	    if($value){
	        return $value;
	    }else{
	        return time();
	    }
	}
	
	public function getSonAttr($value,$data){
	    $menu=new WeixinMenu();
	    $list=$menu->all(['pid'=>$data['id']]);
	    return $list;
	}
		
	protected function setUpdateTimeAttr(){
		return time();
	}   
    
	public function format(){
	    return $this->hasMany('activity_format','activity_id','id');
	}
	
	public function itinerary(){
	    return $this->hasMany('activity_itinerary','activity_id','id');
	}
	public function shop(){
	    return $this->hasOne('shop','id','shop_id');
	}
}