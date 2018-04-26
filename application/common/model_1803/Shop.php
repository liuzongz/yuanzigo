<?php
namespace app\common\model;
use think\Model;
use traits\model\SoftDelete;
class Shop extends Model{
    use SoftDelete;
	protected $table = 'aman_shop';
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
	public function getQrAttr($value,$data){
	    $img=getQrCode('http://www.xiaomange.com/wx1801/index.html?shopid='.$data['id'],$data['id'],'qrcode/shop/');
	    return $img;
	}
	public function getMurlAttr($value,$data){
	    return 'http://www.xiaomange.com/wx1801/index.html?shopid='.$data['id'];
	}
	
		
	protected function setUpdateTimeAttr(){
		return time();
	}
}