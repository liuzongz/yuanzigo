<?php
namespace app\common\model;
use think\Model;
use traits\model\SoftDelete;
use think\Controller;
class Leftmenu extends Model{    
	use SoftDelete;
	protected $table = 'aman_leftmenu';
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
	
	protected function setCreateTimeAttr(){
		return time();
	}
	
	protected function setUpdateTimeAttr(){
		return time();
	}
	public function getSonAttr($value,$data){
	    $model=new Leftmenu();
	    return $model->all(function($query) use ($data) {
                    $query->where(['fid'=>$data['id']])->order('order');
                });
	}
	public function getRuletxtAttr($value,$data){
	    $ay=['1'=>'管理员','2'=>'企业','5'=>'供应商','4'=>'外部人员','3'=>'内部员工'];
	    return $ay[$data['rule']];
	}
}