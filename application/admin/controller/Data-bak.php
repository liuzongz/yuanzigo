<?php
namespace app\admin\controller;
use think\Model;
use think\helper\Time;
use think\Controller;
use PHPExcel_IOFactory;
use PHPExcel;

class Data extends Base{
    public function shop(){
        $shop=new \app\common\model\Shop();
        $day1=nDay(1);
        $day2=nDay(2);        
        $shopSum=$shop->where('create_time','between',[$day2['beginTime'],$day2['endTime']])->count();
        $reg=array(
            'day1'=>$shop->where('create_time','between',[nday(1)['beginTime'],nday(1)['endTime']])->count(),
            'day2'=>$shop->where('create_time','between',[nday(2)['beginTime'],nday(2)['endTime']])->count(),
            'day7'=>$shop->where('create_time','between',[nday(4)['beginTime'],nday(4)['endTime']])->count(),
            'day14'=>$shop->where('create_time','between',[nday(5)['beginTime'],nday(5)['endTime']])->count(),
            'day30'=>$shop->where('create_time','between',[nday(6)['beginTime'],nday(6)['endTime']])->count(),
            'day60'=>$shop->where('create_time','between',[nday(11)['beginTime'],nday(11)['endTime']])->count(),
        );
        $member=new \app\common\model\Member();
        $login=array(
            'day1'=>$member->where('create_time','between',[nday(1)['beginTime'],nday(1)['endTime']])->where('shop_id','>',0)->count(),
            'day2'=>$member->where('create_time','between',[nday(2)['beginTime'],nday(2)['endTime']])->where('shop_id','>',0)->count(),
            'day7'=>$member->where('create_time','between',[nday(4)['beginTime'],nday(4)['endTime']])->where('shop_id','>',0)->count(),
            'day14'=>$member->where('create_time','between',[nday(5)['beginTime'],nday(5)['endTime']])->where('shop_id','>',0)->count(),
            'day30'=>$member->where('create_time','between',[nday(6)['beginTime'],nday(6)['endTime']])->where('shop_id','>',0)->count(),
            'day60'=>$member->where('create_time','between',[nday(11)['beginTime'],nday(11)['endTime']])->where('shop_id','>',0)->count(),
        );
        
        $this->assign(['reg'=>$reg,'login'=>$login]);
        return view();
    }
}