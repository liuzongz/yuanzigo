<?php
namespace app\common\model;
use think\Model;
use app\common\model\UserRules;
use traits\model\SoftDelete;
class User extends Model{
    use SoftDelete;
	protected $table = 'aman_user';
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
	protected $insert = ['create_time','update_time','last_login_ip','last_login_time','last_location'];
	protected $update = ['update_time','last_login_ip','last_login_time','last_location'];
	protected $createTime = 'create_time';
	protected $updateTime = 'update_time';
	protected $autoWriteTimestamp = true;
	protected $type = [
			'create_time'    =>'timestamp:Y-m-d H:i:s',
			'update_time'     =>'timestamp:Y-m-d',
            'last_login_time'=>'timestamp:Y-m-d',
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
		
	public function setLastLoginIpAttr(){
		return request()->ip();
	}
	
	public function setLastLoginTimeAttr(){
	    return time();
	}
	
	public function setLastLocationAttr(){
	    $ip=request()->ip();
	    $ipinfo=ip_info_taobao($ip);
	    return $ipinfo['prov'].$ipinfo['city'];	    
	}
	
	public function getRuletxtAttr($value,$data){
	    $rule=new UserRules();
	    $ruleInfo=$rule->get(['id'=>$data['rule']])->toArray();
	    return $ruleInfo['name'];
	}
	
	public function getMemberAttr($value,$data){
	    return db('member')->where('id',$data['rule_id'])->find();
	}
	
	function shop(){
	    return $this->hasOne('Shop','id','rule_id');
	}
    
    
}