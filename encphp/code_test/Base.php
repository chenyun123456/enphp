<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 2018/9/11
 * Time: 14:15
 */

namespace app\api\controller;
use app\api\model\Users;
use think\Controller;
use think\Request;
use think\model;
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE');
header('Access-Control-Allow-Headers:userid,token');
class Indexs extends Base
{


    /*
    登陆和注册
     */

    public function login(){
        if(request()->isPut()) {
            $user = input('put.user');
            $key = input('put.loginkey');
            if (empty($user)) {
                $feedback['errorcode']=1001;
                $feedback['message']='missing_args';
                $feedback['remarks'] = '用户名未输入';
                $this->response('error', 400, $feedback);
                }
            if (empty($key)) {
                $feedback['errorcode']=1001;
                $feedback['message']='missing_args';
                $feedback['remarks'] = '未输入验证';
                $this->response('error', 400, $feedback);
                }
            $pattern = "/^[a-z\d]*$/i";
            if(preg_match($pattern,$key)==false || strlen($key)!=8){
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks'] = "loginkey格式错误";
                $this->response('remarks', 400, $feedback);
            }
            $result = db('users')->where(array('username' => $user))->find();
            if (empty($result)) {
                $data['username'] = $user;
                $data['createtime'] = time();
                $data['effectivetime'] = time();
                $data['psword'] = $key;
                $newid = db('users')->insertGetid($data);
                $json['token'] = $this->token($user, $newid, $data['createtime']);
                db('users')->where(array('userid' => $newid))->update($json);
                $json['userid'] = $newid;
                $this->response('success', 201, $json);
            }
            else {
                if ($result['psword'] == $key) {
                    if($result['del']==1){
                        $json['errorcode']=1003;
                        $json['message']='need_permission';
                        $json['remarks']='Users are prohibited from accessing';
                        $this->response('error', 401,$json);
                    }
                    $newtoken['token'] = $this->token($result['username'], $result['userid'], time());
                    $newtoken['createtime'] = time();
                    $re = db('users')->where(array('userid' => $result['userid']))->update($newtoken);
                    if ($re) {
                        $json['token'] = $newtoken['token'];
                        $json['userid'] = $result['userid'];
                        $this->response('success', 200, $json);
                    } else {
                        $json['remarks'] = '内部错误';
                        $this->response('success', 500, $json);
                    }

                } else {
                    $feedback['errorcode']=1003;
                    $feedback['message']='need_permission';
                    $data['remarks'] = '授权失败';
                    $this->response('error', 401, $data);

                }
            }
        }
        else{
            $json['remarks']='非法调用';
            $this->response('error',403,$json);
        }

    }
    /*
     * 承兑规则
     */
    public function rule(){
        if(request()->isGet()){
            $this->authentication();
            $ruledata=db('exchange_way_fee')->where(array('exchange_status'=>1))->select();
            $newrule=[];
            foreach ($ruledata as $key) {
                $originaltokendata = db('token')->where('token_id', $key['primitive_token'])->find();
                $newdata['original_token_accuracy']=$originaltokendata['token_precision'];
                $newdata['original_token_id'] = $key['primitive_token'];
                $newdata['original_token_symbol'] = $originaltokendata['token_symbol'];
                $newdata['original_token_name'] = $originaltokendata['token_name'];
                $originalchaindata = db('block_chain')->where('block_chain_id', $originaltokendata['block_chain_id'])->find();
                $newdata['original_chain_symbol'] = $originalchaindata['block_chain_symbol'];
                $newdata['original_chain_name'] = $originalchaindata['block_chain_name'];
                $goaltokendata = db('token')->where('token_id', $key['target_token'])->find();
                $newdata['goal_token_id'] = $key['target_token'];
                $newdata['goal_token_symbol'] = $goaltokendata['token_symbol'];
                $newdata['goal_token_name'] = $goaltokendata['token_name'];
                $goalchaindata = db('block_chain')->where('block_chain_id', $goaltokendata['block_chain_id'])->find();
                $newdata['goal_chain_symbol'] = $goalchaindata['block_chain_symbol'];
                $newdata['goal_chain_name'] = $goalchaindata['block_chain_name'];
                if ($originaltokendata['token_status'] == 0 || $originalchaindata['block_chain_status'] == 0 || $goaltokendata['token_status'] == 0
                    || $goalchaindata['block_chain_status'] == 0) {
                    continue;
                }

                $newrule[] = $newdata;

            }
            $this->response('success',200,$newrule);

        }
        else{
            $json['remarks']='非法调用';
            $this->response('error',403,$json);
        }
    }
    /*
     * 手续费计算
     */
    public  function fee($original_token_id,$goal_token_id,$charge){
        if(request()->isGet()) {
            $this->authentication();
            $userid=Request::instance()->header('userid');

            $pattern = "/^[a-z\d]*$/i";
            if (empty($original_token_id)) {
                $feedback['errorcode']=1001;
                $feedback['message']='missing_args';
                $feedback['remarks'] = "原始代币id为空";
                $this->response('error', 400, $feedback);
            }
            if (preg_match($pattern, $original_token_id) == false || strlen($original_token_id) != 32) {
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks'] = "原始代币id格式错误";
                $this->response('error', 400, $feedback);
            }
            if (empty($goal_token_id)) {
                $feedback['errorcode']=1001;
                $feedback['message']='missing_args';
                $feedback['remarks'] = "目标代币id为空";
                $this->response('error', 400, $feedback);
            }
            if (preg_match($pattern, $goal_token_id) == false || strlen($goal_token_id) != 32) {
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks'] = "目标代币id格式错误";
                $this->response('error', 400, $feedback);
            }
            if (empty($charge)) {
                $feedback['errorcode']=1001;
                $feedback['message']='missing_args';
                $feedback['remarks'] = "金额为空";
                $this->response('error', 400, $feedback);
            }
            $patterns = '/^[1-9][0-9]*$/';
            if ($charge<=0){
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks']='金额参数格式错误';
                $this->response('error',400,$feedback);
            }
            $originaltokendata = db('token')->where(array('token_id' => $original_token_id))->find();

            if (empty($originaltokendata)) {

                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "原始代币不存在";
                $this->response('error', 404, $feedback);
            }
            if ($originaltokendata['token_status'] == 0) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = $originaltokendata['token_symbol'] . '代币已被禁用';
                $this->response('error', 404, $feedback);
            }
            $originalchaindata = db('block_chain')->where('block_chain_id', $originaltokendata['block_chain_id'])->find();
            if (empty($originalchaindata)) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "原始链不存在";
                $this->response('error', 404, $feedback);
            }
            if ($originalchaindata['block_chain_status'] == 0) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = $originalchaindata['block_chain_symbol'] . '区块链已被禁用';
                $this->response('error', 400, $feedback);
            }



            $targettokendata = db('token')->where(array('token_id' => $goal_token_id))->find();
            if (empty($targettokendata)) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "代币不存在";
                $this->response('error', 404, $feedback);
            }
            if ($targettokendata['token_status'] == 0) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = $targettokendata['token_symbol'] . '代币已被禁用';
                $this->response('error', 404, $feedback);
            }
            $targetchaindata = db('block_chain')->where('block_chain_id', $targettokendata['block_chain_id'])->find();
            if (empty($targetchaindata)) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "目标链不存在";
                $this->response('error', 404, $feedback);
            }
            if ($targetchaindata['block_chain_status'] == 0) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = $targetchaindata['block_chain_symbol'] . '区块链已被禁用';
                $this->response('error', 404, $feedback);
            }

            //承兑规则判断

            $exchangedata = db('exchange_way_fee')->where(array('primitive_token' => $original_token_id, 'target_token' => $goal_token_id))
                ->find();
            if (empty($exchangedata)) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = '承兑规则不存在';
                $this->response('error', 404, $feedback);
            }
            if ($exchangedata['exchange_status'] == 0) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = '承兑规则已禁用';
                $this->response('error', 404, $feedback);
            }
            //$charge = $data['charge'];
            if ($charge < $exchangedata['rule_min']) {
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks'] = '低于最低承兑金额';
                $this->response('error', 400, $feedback);
            }
            if ($charge > $exchangedata['rule_max']) {
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks'] = '高于最高于承兑金额';
                $this->response('error', 400, $feedback);
            }

            $beginToday = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            $endToday = mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')) - 1;
            $daynmnbers = db('exchange_order')->where(array('order_creator' => $userid, 'primitive_token_id' => $original_token_id, 'target_token_id' => $goal_token_id))
                ->where('order_create_time', 'between', [$beginToday, $endToday])->count('order_id');
            if ($daynmnbers >= $exchangedata['rule_threshold']) {
                $fee = $charge * $exchangedata['rule_flat_fare'] / 1000;
                $fee = sprintf("%.4f", $fee);
            }
            if ($daynmnbers < $exchangedata['rule_threshold']) {
                $fee = $exchangedata['rule_flat_fee'];
            }
            $accountcharge = ($charge - $fee) * $exchangedata['exchange_rate'];


            $pos = strrpos($charge,'.');
            if ($pos !== false ) {
                $changearr=explode(".", $charge);
                if(strlen($changearr[1])>$originaltokendata['token_precision']){
                    $feedback['remarks'] = '超过代币精度';
                    $this->response('error', 400, $feedback);
                }
            }
            if($originaltokendata['token_precision']==0){
                $charge=floor($charge);
                $accountcharge = ($charge - $fee) * $exchangedata['exchange_rate'];
            }

            if($targettokendata['token_precision']==0){
                $accountcharge=floor($accountcharge);
            }

            $feedata['exchange_fee']=$fee;
            $feedata['goal_charge']=(string)$accountcharge;

            $feedata['original_charge']=$charge;

            $this->response('success',200,$feedata);
        }
        else{
            $json['remarks']='非法调用';
            $this->response('error',403,$json);
        }
    }
    /*
     * 订单创建
     */
    public function order(){

        if(request()->isPost()) {
            $this->authentication();
            $data = input('post.');
            $data['userid']=Request::instance()->header('userid');
            $pattern = "/^[a-z\d]*$/i";
            if (empty($data['original_token_id'])) {
                $feedback['errorcode']=1001;
                $feedback['message']='missing_args';
                $feedback['remarks'] = "原始代币id为空";

                $this->response('error', 400, $feedback);
            }
            if(preg_match($pattern,$data['original_token_id'])==false || strlen($data['original_token_id'])!=32){
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks'] = "原始代币id格式错误";

                $this->response('error', 400, $feedback);
            }
            if (empty($data['goal_token_id'])) {
                $feedback['errorcode']=1001;
                $feedback['message']='missing_args';
                $feedback['remarks'] = "目标代币id为空";

                $this->response('error', 400, $feedback);
            }
            if(preg_match($pattern,$data['goal_token_id'])==false || strlen($data['goal_token_id'])!=32){
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks'] = "目标代币id格式错误";

                $this->response('error', 400, $feedback);
            }
            if (empty($data['goal_address'])) {
                $feedback['errorcode']=1001;
                $feedback['message']='missing_args';
                $feedback['remarks'] = "收款地址为空";
                $this->response('error', 400, $feedback);
            }

            if (empty($data['charge'])) {
                $feedback['errorcode']=1001;
                $feedback['message']='missing_args';
                $feedback['remarks'] = "金额为空";
                $this->response('error', 400, $feedback);
            }

            if ($data['charge']<=0) {
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks'] = "金额格式错误";
                $this->response('error', 400, $feedback);
            }
            if(isset($data['fix_account'])==false){
                $feedback['errorcode']=1001;
                $feedback['message']='missing_args';
                $feedback['remarks'] = "打款选项未指定";
                $this->response('error', 400, $feedback);
            }
            if(in_array($data['fix_account'],[0,1])==false){
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks'] = "fix_account格式错误";
                $this->response('error', 400, $feedback);
            }
            $neworderdata['primitive_fix_account']=$data['fix_account'];
            if($data['fix_account']==1){
                if(isset($data['from_account'])==false){
                    $feedback['errorcode']=1001;
                    $feedback['message']='missing_args';
                    $feedback['remarks'] = "打款账户为空";
                    $this->response('error', 400, $feedback);
                }
                $neworderdata['primitive_account']=$data['from_account'];
            }
//        if(empty($data['goal_chain_id'])){
//            $feedback['remarks']="目标链id为空";
//            $this->response('error',400,$feedback);
//        }
            //平台开启判断
            //账户判断
            $neworderdata['order_creator'] = $data['userid'];
            $userdata = db('users')->where(array('userid' => $data['userid']))->find();
            if (empty($userdata)) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "账户不存在";

                $this->response('error', 404, $feedback);
            }

            if ($userdata['del'] == 1) {
                $feedback['errorcode']=1005;
                $feedback['message']='need_permission';
                $feedback['remarks'] = "你的账号已被冻结";
                $this->response('error', 403, $feedback);
            }


            //原始代币
            $neworderdata['primitive_token_id'] = $data['original_token_id'];
            $originaltokendata = db('token')->where(array('token_id' => $data['original_token_id']))->find();
            $account=db('token_platform_account')->alias('tpa')->join('platform_account pa','tpa.account_id=pa.account_id')
                ->where('tpa.token_id',$neworderdata['primitive_token_id'])->where('pa.account_status',1)->field('pa.account_name')->select();

            foreach ($account as $value){
                $account_name_arr[]=$value['account_name'];
            }


            if(empty($account)){
                $feedback['errorcode']=1001;
                $feedback['message']='missing_args';
                $feedback['remarks'] = "代币平台账户未绑定";
                $this->response('error', 400, $feedback);
            }

            $count_nmu=count($account_name_arr);
            if($count_nmu==1){
                $account_name_one=$account_name_arr[0];
            }
            else{
                $count_rand=rand(0,$count_nmu-1);
                $account_name_one=$account_name_arr[$count_rand];
            }
            if (empty($originaltokendata)) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "原始代币不存在";
                $this->response('error', 404, $feedback);
            }
            if ($originaltokendata['token_status'] == 0) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = $originaltokendata['token_symbol'] . '代币已被禁用';
                $this->response('error', 404, $feedback);
            }
            $originalchaindata=db('block_chain')->where('block_chain_id',$originaltokendata['block_chain_id'])->find();
            if(empty($originalchaindata)){
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "原始链不存在";
                $this->response('error', 404, $feedback);
            }
            if ($originalchaindata['block_chain_status'] == 0) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = $originalchaindata['block_chain_symbol'] . '区块链已被禁用';
                $this->response('error', 404, $feedback);
            }
            $neworderdata['primitive_chain_id'] = $originaltokendata['block_chain_id'];
            $neworderdata['primitive_chain_symbol']=$originalchaindata['block_chain_symbol'];
            $neworderdata['primitive_token_symbol'] = $originaltokendata['token_symbol'];
            //目标链判断

            //目标链代币
            $neworderdata['target_token_id'] = $data['goal_token_id'];
            $targettokendata = db('token')->where(array('token_id' => $data['goal_token_id']))->find();
            if (empty($targettokendata)) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "目标代币不存在";
                $this->response('error', 404, $feedback);
            }
            if ($targettokendata['token_status'] == 0) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = $targettokendata['token_symbol'] . '代币已被禁用';
                $this->response('error', 404, $feedback);
            }
            $targetchaindata=db('block_chain')->where('block_chain_id',$targettokendata['block_chain_id'])->find();
            if(empty($targetchaindata)){
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "目标链不存在";
                $this->response('error', 404, $feedback);
            }
            if ($targetchaindata['block_chain_status'] == 0) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = $targetchaindata['block_chain_symbol'] . '区块链已被禁用';
                $this->response('error', 404, $feedback);
            }
            $neworderdata['target_chain_id'] = $targetchaindata['block_chain_id'];
            $neworderdata['target_chain_symbol']=$targetchaindata['block_chain_symbol'];

            $neworderdata['target_token_symbol'] = $targettokendata['token_symbol'];
            //承兑规则判断

            $exchangedata = db('exchange_way_fee')->where(array('primitive_token' => $data['original_token_id'], 'target_token' => $data['goal_token_id']))
                ->find();
            if (empty($exchangedata)) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = '承兑规则不存在';
                $this->response('error', 404, $feedback);
            }
            if ($exchangedata['exchange_status'] == 0) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = '承兑规则已禁用';
                $this->response('error', 404, $feedback);
            }
            $neworderdata['exchange_id']=$exchangedata['exchange_id'];
            $charge = $data['charge'];
            if ($exchangedata['exchange_status'] == 1) {

                if ($charge < $exchangedata['rule_min']) {
                    $feedback['errorcode']=1002;
                    $feedback['message']='args_format_error';
                    $feedback['remarks'] = '低于最低承兑金额';
                    $this->response('error', 400, $feedback);
                }
                if ($charge > $exchangedata['rule_max']) {
                    $feedback['errorcode']=1002;
                    $feedback['message']='args_format_error';
                    $feedback['remarks'] = '高于最高于承兑金额';
                    $this->response('error', 400, $feedback);
                }

                $beginToday = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                $endToday = mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')) - 1;
                $daynmnbers = db('exchange_order')->where(array('order_creator' => $data['userid'], 'primitive_token_id' => $data['original_token_id'], 'target_token_id' => $data['goal_token_id']))
                    ->where('order_create_time', 'between', [$beginToday, $endToday])->count('order_id');

                if ($daynmnbers >= $exchangedata['rule_number_daily']) {
                    $feedback['errorcode']=1006;
                    $feedback['message']='overstep_exchange_numbers';
                    $feedback['remarks'] = '超出每日承兑次数';
                    $this->response('error', 403, $feedback);
                }
                if ($daynmnbers >= $exchangedata['rule_threshold']) {
                    $fee = $charge * $exchangedata['rule_flat_fare'] / 1000;
                    $fee = sprintf("%.4f", $fee);
                }
                if ($daynmnbers < $exchangedata['rule_threshold']) {
                    $fee = $exchangedata['rule_flat_fee'];
                }
                $feeback=$fee;
                if ($originalchaindata['block_chain_confirm_way'] == 1) {
                    if($data['fix_account']==0){
                        $feedback['errorcode']=1001;
                        $feedback['message']='missing_args';
                        $feedback['remarks'] = 'ETH必须指定打款账户';
                        $this->response('error', 400, $feedback);
                    }
                    if(empty($data['from_account'])){
                        $feedback['errorcode']=1001;
                        $feedback['message']='missing_args';
                        $feedback['remarks'] = 'ETH打款账户为空';
                        $this->response('error', 400, $feedback);
                    }

                }


                $pos = strrpos($charge,'.');
                if ($pos !== false ) {
                    $changearr=explode(".", $charge);
                    if(strlen($changearr[1])>$originaltokendata['token_precision']){
                        $feedback['remarks'] = '超过代币精度';
                        $this->response('error', 400, $feedback);
                    }
                }

                $accountcharge = ($charge - $fee) * $exchangedata['exchange_rate'];
                $poss = strpos($accountcharge,'.');
                if ($poss !== false ) {
                    $accountchangearr=explode(".", $accountcharge);
                    if(strlen($accountchangearr[1])>$targettokendata['token_precision']){
                        if($targettokendata['token_precision']==0){
                            $accountcharge=floor($accountcharge);
                        }
                        else{
                            $accountchangearr[1]=substr($accountchangearr[1],0,$targettokendata['token_precision']);
                            //$accountcharge=sprintf("%.".$targettokendata['token_precision']."f", $accountcharge);
                            $accountcharge = implode(".", $accountchangearr);
                        }

                    }
                }
                $charge_original=$charge;
                $accountcharge_goal=$accountcharge;
                if($accountcharge<=0){
                    $feedback['remarks'] = '打款金额太低';
                    $this->response('error', 400, $feedback);
                }
                function sctonum($num, $double = 0){
                    if(false !== stripos($num, "e")){
                        $a = explode("e",strtolower($num));
                        return bcmul($a[0], bcpow(10, $a[1], $double), $double);
                    }
                }


                $charge_precision=$charge*pow(10,$originaltokendata['token_precision']);
                $accountcharge_precision=$accountcharge*pow(10,$targettokendata['token_precision']);
                $cha = strpos($charge_precision,'+');
                if ($cha !== false ) {

                    $charge_precision=sctonum($charge_precision);
                }
                $acc = strpos($accountcharge_precision,'+');
                if ($acc !== false ) {
                    // return 1;
                    $accountcharge_precision=sctonum($accountcharge_precision);
                }

                if($originaltokendata['token_precision']>0){

                    $pos = strpos($charge,'.');
                    if ($pos === false) {
                        $charge=$charge.'.';
                    }
                    $chargelength=$originaltokendata['token_precision'];
                    $charge_prec=dispRepair($charge,$chargelength,'0',0);
                }
                if($originaltokendata['token_precision']==0){
                    $charge_prec=$charge;
                }
                if($targettokendata['token_precision']>0){

                    $poss = strpos($accountcharge,'.');
                    if ($poss === false) {
                        $accountcharge=$accountcharge.'.';
                    }

                    $accountchargelength=$targettokendata['token_precision'];

                    $accountcharge_prec=dispRepair($accountcharge,$accountchargelength,'0',0);
                }
                if($targettokendata['token_precision']==0){
                    $accountcharge_prec=$accountcharge;
                }
                if ($originalchaindata['block_chain_confirm_way'] == 1) {
                    $ordercommondata = db('exchange_order')->where(array('primitive_account' => $data['from_account'], 'primitive_amount' => $charge_precision))->where('order_status',1)
                        ->where('primitive_tran_status','between',[0,1])
                        ->find();

                    if ($ordercommondata) {

                        $feedback['errorcode'] = 1002;

                        $feedback['message'] = 'args_format_error';

                        $feedback['remarks'] = '存在未完成的等额订单';

                        $this->response('error', 400, $feedback);

                    }
                }



            }

            $neworderdata['order_num'] = ordernum();
            $neworderdata['order_creator'] = $data['userid'];
            $neworderdata['order_create_time'] = time();
            $neworderdata['order_status'] = 0;
            $neworderdata['primitive_amount'] = $charge_precision;
            $neworderdata['order_exchange_fee'] = $fee;
            $neworderdata['target_to'] = $data['goal_address'];
            $neworderdata['order_status'] = 1;
            $neworderdata['target_amount'] = $accountcharge_precision;
            $neworderdata['primitive_amount_prec'] = $charge_prec;
            $neworderdata['target_amount_prec'] = $accountcharge_prec;
            $neworderdata['target_tran_status']=0;
            $neworderdata['primitive_tran_status']=0;

            $result = db('exchange_order')->insertGetId($neworderdata);

            if ($result) {
                $neworderdatalog['order_id'] = $result;
                $neworderdatalog['eol_op_user'] = $data['userid'];
                $neworderdatalog['eol_op_time'] = time();
                $neworderdatalog['eol_op_content'] = '用户创建订单';
                $neworderdatalog['eol_op_result'] = 1;
                db('exchange_order_log')->insert($neworderdatalog);
                $feedback['order_id'] = $result;
                $feedback['order_fee'] = $feeback;
                $feedback['order_daynums'] = $daynmnbers + 1;
                $feedback['order_charge'] = $charge_original;
                $feedback['order_goal_charge'] = $accountcharge_goal;
                $feedback['order_number'] = $neworderdata['order_num'];
                $feedback['account']=$account_name_one;
                if ($originalchaindata['block_chain_confirm_way'] == 0) {
                    $feedback['memo'] = 'exchange|'.$neworderdata['order_num'];
                }

                $this->response('success', 200, $feedback);
            } else {
                $feedback['remarks'] = '订单创建失败';
                $this->response('error', 500, $feedback);
            }
        }
        else{
            $json['remarks']='非法调用';
            $this->response('error',403,$json);
        }


    }

    /*
     * 系统反馈
     */
    public function systemfeedback(){
        if(request()->isPost()) {
            $this->authentication();
            $data = input('post.');
            $data['userid']=Request::instance()->header('userid');
            $feedback=db('system_feedback')->where('userid',$data['userid'])->order('id','desc')->find();
            if($feedback){
                if(time()-$feedback['createtime']<600){
                    $json['errorcode']=1005;
                    $json['message']='need_permission';
                    $json['remarks']='两次反馈时间间隔10分钟';
                    $this->response('error',403,$json);
                }
            }
            $appendix=$data['appendix'];
            $content=input('post.content');
            if(empty($content)){
                $json['errorcode']=1001;
                $json['message']='missing_args';
                $json['remarks']='反馈内容为空';
                $this->response('error',400,$json);
            }
            if(strlen($content)>100){
                $json['errorcode']=1002;
                $json['message']='args_format_error';
                $json['remarks']='反馈内容超出限制';
                $this->response('error',400,$json);
            }
            if(count($appendix)>5){
                $json['errorcode']=1002;
                $json['message']='args_format_error';
                $json['remarks']='附件文件不能超过5个';
                $this->response('error',400,$json);
            }
            foreach ($appendix as $key=>$val){
                $newfeedback['appendix'.$key]=saveBase64Image($val);
            }
            $newfeedback['content']=$content;
            $newfeedback['createtime']=time();
            $newfeedback['userid']=$data['userid'];
            $re=db('system_feedback')->insert($newfeedback);
            if($re){
                $json['remarks']='反馈成功';
                $this->response('success',200,$json);
            }
            else{
                $json['remarks']='内部错误';
                $this->response('error',500,$json);
            }
        }
        else{
            $json['remarks']='非法调用';
            $this->response('FORBIDDEN',403,$json);
        }
    }
    /*
     * 订单反馈
     */

    /*

     * 订单列表
     */
    public function orderlist(){
        if(request()->isGet()) {
            $this->authentication();
            $data=input('get.');
            $page=$data['page'];
            $pagenum=$data['limit'];
            $id=Request::instance()->header('userid');
            $where=[];
            $pattern = "/^[a-z\d]*$/i";
            if(!empty($data['original_chain'])){
                if(preg_match($pattern,$data['original_chain'])==false || strlen($data['original_chain'])!=32){
                    $feedback['errorcode']=1002;
                    $feedback['message']='args_format_error';
                    $feedback['remarks'] = "原始链id格式错误";
                    $this->response('error', 400, $feedback);
                }
                $where['primitive_chain_id']=$data['original_chain'];
            }
            if(!empty($data['original_token'])){
                if(preg_match($pattern,$data['original_token'])==false || strlen($data['original_token'])!=32){
                    $feedback['errorcode']=1002;
                    $feedback['message']='args_format_error';
                    $feedback['remarks'] = "原始代币id格式错误";
                    $this->response('error', 400, $feedback);
                }
                $where['primitive_token_id']=$data['original_token'];
            }
            if(!empty($data['goal_chain'])){
                if(preg_match($pattern,$data['goal_chain'])==false || strlen($data['goal_chain'])!=32){
                    $feedback['errorcode']=1002;
                    $feedback['message']='args_format_error';
                    $feedback['remarks'] = "目标链id格式错误";
                    $this->response('error', 400, $feedback);
                }
                $where['target_chain_id']=$data['goal_chain'];
            }
            if(!empty($data['goal_token'])){
                if(preg_match($pattern,$data['goal_token'])==false || strlen($data['goal_token'])!=32){
                    $feedback['errorcode']=1002;
                    $feedback['message']='args_format_error';
                    $feedback['remarks'] = "目标代币id格式错误";
                    $this->response('error', 400, $feedback);
                }
                $where['target_token_id']=$data['goal_token'];
            }


            $pattern = "/^\d*$/";
            if (preg_match($pattern, $page)==false || preg_match($pattern, $pagenum)==false){
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $json['remarks']='参数格式错误';
                $this->response('error',400,$json);
            }
            $arr=[];
            $offset=($page-1)*$pagenum;
            $total=db('exchange_order')->where($where)->where(array('order_creator'=>$id))->where('order_status','neq',-1)->count('order_id');
            $orderdata=db('exchange_order')->where($where)->where(array('order_creator'=>$id))->where('order_status','neq',-1)->
            field('order_id orderid,order_num ordernum,order_create_time order_createtime,order_status,
            primitive_amount_prec original_amount,target_amount_prec goal_amount,primitive_chain_id,target_chain_id,primitive_token_id,target_token_id,primitive_tran_status original_status,target_tran_status goal_status')->order('order_create_time','desc')->limit($offset,$pagenum)->select();
            foreach ($orderdata as $val){
                $originalchain=db('block_chain')->where('block_chain_id',$val['primitive_chain_id'])->find();
                $goalchain=db('block_chain')->where('block_chain_id',$val['target_chain_id'])->find();
                $originaltoken=db('token')->where('token_id',$val['primitive_token_id'])->find();
                $goaltoken=db('token')->where('token_id',$val['target_token_id'])->find();
                $val['original_chain_name']=$originalchain['block_chain_name'];
                $val['goal_chain_name']=$goalchain['block_chain_name'];
                $val['original_token_name']=$originaltoken['token_name'];
                $val['goal_token_name']=$goaltoken['token_name'];
                unset($val['primitive_chain_id']);
                unset($val['target_chain_id']);
                unset($val['primitive_token_id']);
                unset($val['target_token_id']);
                $arr[]=$val;

            }
            $json['total']=$total;
            $json['data']=$arr;
            $this->response('success',200,$json);
        }
        else{
            $json['remarks']='非法调用';
            $this->response('error',403,$json);
        }

    }
    /*
     * 查看订单详情
     */
    public function orderdetails($orderid){
        if(request()->isGet()) {

            if(empty($orderid)){
                $feedback['errorcode']=1001;
                $feedback['message']='missing_args';
                $json['remarks']='orderid为空';
                $this->response('error',400,$json);
            }
            $pattern = '/^[1-9][0-9]*$/';
            if (preg_match($pattern, $orderid)==false){
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $json['remarks']='orderid参数格式错误';
                $this->response('error',400,$json);
            }
            $userid=Request::instance()->header('userid');
            $order=db('exchange_order')->where(array('order_creator'=>$userid,'order_id'=>$orderid))->where('order_status','neq',-1)
                ->field('primitive_chain_id,primitive_token_id,target_chain_id,target_token_id,order_id orderid,order_num ordernum,order_create_time order_createtime,order_status orderstatus,order_remark remark,
                primitive_tran_id original_hash,primitive_tran_status original_status,primitive_tran_time original_tran_time,primitive_tran_confirmed_time original_tran_confirmed_time,order_exchange_fee exchange_fee,
                primitive_account original_account,primitive_to original_to,
                 primitive_amount_prec original_amount,
          primitive_tran_status original_status,
              target_tran_time goal_tran_time,
         
         
          target_account goal_account,
          target_to goal_to,
          target_tran_id goal_hash,
          target_amount_prec goal_amount,
          target_tran_status goal_status,
          target_tran_confirmed_time goal_tran_confirmed_time')
                ->find();
            if(empty($order)){
                $feedback['errorcode']=1004;
                $feedback['message']='resource_not_found';
                $json['remarks']='请求的资源不存在';
                $this->response('error',404,$json);
            }
            $originalchain=db('block_chain')->where('block_chain_id',$order['primitive_chain_id'])->find();
            $goalchain=db('block_chain')->where('block_chain_id',$order['target_chain_id'])->find();
            $originaltoken=db('token')->where('token_id',$order['primitive_token_id'])->find();
            $goaltoken=db('token')->where('token_id',$order['target_token_id'])->find();
            $order['original_chain_name']=$originalchain['block_chain_name'];
            $order['goal_chain_name']=$goalchain['block_chain_name'];
            $order['original_token_name']=$originaltoken['token_name'];
            $order['goal_token_name']=$goaltoken['token_name'];
            unset($order['target_token_id']);unset($order['primitive_chain_id']);unset($order['target_chain_id']);unset($order['primitive_token_id']);

            $this->response('success',200,$order);
        }
        else{
            $json['remarks']='非法调用';
            $this->response('error',403,$json);
        }

    }
    /*
     * 订单删除
     *  userid  orderid
     */
    public function orderdel($orderid){
        if(request()->isDelete()) {
            $this->authentication();

            $pattern = '/^[1-9][0-9]*$/';
            if (preg_match($pattern, $orderid)==false){
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remark']='orderid参数格式错误';
                $this->response('error',400,$feedback);
            }

            $userid=Request::instance()->header('userid');
            $res=db('exchange_order')->where(array('order_creator'=>$userid,'order_id'=>$orderid))->where('order_status','neq',-1)->find();
            if(empty($res)){
                $feedback['errorcode']=1004;
                $feedback['message']='resource_not_found';
                $feedback['remarks']='删除的资源不存在';
                $this->response('error',404,$feedback);
            }
            $re=db('exchange_order')->where(array('order_creator'=>$userid,'order_id'=>$orderid))
                ->update(['order_status'=>-1]);
            if($re){
                $neworderdatalog['order_id'] = $orderid;
                $neworderdatalog['eol_op_user'] = $userid;
                $neworderdatalog['eol_op_time'] = time();
                $neworderdatalog['eol_op_content'] = '用户删除订单';
                $neworderdatalog['eol_op_result'] = 1;
                db('exchange_order_log')->insert($neworderdatalog);
                $json['remarks']='删除成功';
                $this->response('success',200,$json);
            }
            else{
                $json['remarks']='服务器内部错误';
                $this->response('error',500,$json);
            }
        }
        else{
            $json['remarks']='非法调用';
            $this->response('error',403,$json);
        }
    }
    /*
     * 手动确认
     */
    public function ordercancel($orderid,$status){
        if(request()->isPut()) {

            $this->authentication();
            $pattern = '/^[1-9][0-9]*$/';
            if (preg_match($pattern,$orderid)==false){
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks']='orderid参数格式错误';
                $this->response('error',400,$feedback);
            }

            if($status!="0" && $status!="1"){
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks']='status参数格式错误';
                $this->response('error',400,$feedback);
            }
            $userid=Request::instance()->header('userid');
            $res=db('exchange_order')->where(array('order_creator'=>$userid,'order_id'=>$orderid))
                ->where('order_status','neq',-1)->find();
            if(empty($res)){
                $feedback['errorcode']=1004;
                $feedback['message']='resource_not_found';
                $feedback['remarks']='资源不存在';
                $this->response('error',404,$feedback);
            }
            if($res['order_status']==$status){
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks']='状态重复修改';
                $this->response('error',400,$feedback);
            }
            $re=db('exchange_order')->where(array('order_creator'=>$userid,'order_id'=>$orderid))
                ->update(['order_status'=>$status]);
            if($re){
                $neworderdatalog['order_id'] = $orderid;
                $neworderdatalog['eol_op_user'] = $userid;
                $neworderdatalog['eol_op_time'] = time();
                $neworderdatalog['eol_op_content'] = '用户取消订单';
                $neworderdatalog['eol_op_result'] = 1;
                db('exchange_order_log')->insert($neworderdatalog);
                $json['remarks']='修改成功';
                $json['status']=$status;
                $this->response('success',200,$json);
            }
            else{
                $json['remarks']='内部错误';
                $this->response('error',500,$json);
            }
        }
        else{
            $json['remarks']='非法调用';
            $this->response('FORBIDDEN',403,$json);
        }
    }

    /*
     * 恢复
     */
    public function orderrecovery($orderid){
        if(request()->isPut()) {

            if(empty($orderid)){
                $json['remark']='orderid未传入';
                $this->response('error',400,$json);
            }
            $pattern = '/^[1-9][0-9]*$/';
            if (preg_match($pattern, $orderid)==false){
                $json['remark']='orderid参数格式错误';
                $this->response('error',400,$json);
            }

            $userid=Request::instance()->header('userid');
            $res=db('exchange_order')->where(array('order_creator'=>$userid,'order_id'=>$orderid,'order_status'=>1))->find();
            if(empty($res)){
                $feedback['errorcode']=1004;
                $feedback['message']='resource_not_found';
                $json['remarks']='资源不存在';
                $this->response('error',404,$json);
            }
            $re=db('exchange_order')->where(array('order_creator'=>$userid,'order_id'=>$orderid,'order_status'=>0))
                ->update(['order_status'=>1]);
            if($re){
                $neworderdatalog['order_id'] = $orderid;
                $neworderdatalog['eol_op_user'] = $userid;
                $neworderdatalog['eol_op_time'] = time();
                $neworderdatalog['eol_op_content'] = '用户恢复订单';
                $neworderdatalog['eol_op_result'] = 1;
                db('exchange_order_log')->insert($neworderdatalog);
                $json['remark']='恢复成功';
                $this->response('success',200,$json);
            }
            else{
                $json['remarks']='内部错误';
                $this->response('INTERNAL SERVER ERROR',500,$json);
            }
        }
        else{
            $json['remarks']='非法调用';
            $this->response('FORBIDDEN',403,$json);

        }
    }




    /*
     * 区块链列表
     */
    public function chainlist(){
        if(request()->isGet()) {
            $this->authentication();
            $chaindata = db('block_chain')->where(array('block_chain_status' => 1))
                ->field('block_chain_symbol chain_symbol,block_chain_id chain_id,block_chain_name chain_name')->select();
//            $onoff = db('setting')->find();
//            $chaindata['on-off'] = $onoff['switch'];

            $this->response('success', 200, $chaindata);
        }
        else{
            $json['remarks']='非法调用';
            $this->response('error',400,$json);
        }
    }
    /*
     * 区块链下的代币列表
     * chain_id
     */
    public function chaintokenlist($chainid){
        if(request()->isGet()){
            $this->authentication();
            //$chainid=input('post.chain_id');
            if(empty($chainid)){
                $feedback['errorcode']=1001;
                $feedback['message']='missing_args';
                $feedback['remarks']='未输入参数';
                $this->response('error',400,$feedback);
            }
            $pattern = "/^[a-z\d]*$/i";
            if (preg_match($pattern, $chainid)==false){
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks']='参数格式错误';
                $this->response('error',400,$feedback);
            }
            if(strlen($chainid)!=32){
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks']='参数格式错误';
                $this->response('error',400,$feedback);
            }
            $chaintoken=db('token')->where(array('block_chain_id'=>$chainid,'token_status'=>1))
                ->field('token_id token_tokenid,token_name token_tokenname')->select();
            $this->response('success',200,$chaintoken);
        }
        else{
            $feedback['remarks']='非法调用';
            $this->response('error',403,$feedback);
        }
    }
    public function ordernums(){

        dump(time());
        dump('当前时间'.date("Y-m-d H:i:s",time()));

    }

    /*
     * 手续费计算
     */

    /*
     * 订单流程接口
     */
    public function exchangeProcess($orderid){
        if(request()->isGet()) {
            $this->authentication();
            $data['userid']=Request::instance()->header('userid');
            $data['orderid']=$orderid;
            $pattern = '/^[1-9][0-9]*$/';
            if (preg_match($pattern, $data['orderid'])==false){
                $json['errorcode']=1002;
                $json['message']='args_format_error';
                $json['remark']='orderid参数格式错误';
                $this->response('error',400,$json);
            }
            $myorder=db('exchange_order')->where(array('order_creator'=>$data['userid'],'order_id'=>$data['orderid']))->find();
            if(empty($myorder)){
                $feedback['errorcode']=1004;
                $feedback['message']='resource_not_found';
                $json['remarks']='资源不存在';
                $this->response('error',404,$json);
            }
            $order=db('exchange_order_log')->where(array('order_id'=>$data['orderid']))
                ->field('eol_id log_id,eol_op_time log_createtime,eol_op_content log_content')->order('eol_id','asc')->select();
            $this->response('success',200,$order);
        }
        else{
            $json['remarks']='非法调用';
            $this->response('FORBIDDEN',403,$json);
        }
    }
    public function rule1()
    {
        $arr=[];
        $token = db('exchange_way_fee')->where('exchange_status', 1)->Distinct(true)->field('primitive_token')->select();
        //dump($token);
        foreach ($token as $v) {

            $original_chain = db('token')->alias('t')->join('block_chain bc', 't.block_chain_id=bc.block_chain_id')
                ->where('t.token_id', $v['primitive_token'])->field('bc.block_chain_id,t.token_id,bc.block_chain_name,t.token_name,t.token_status,bc.block_chain_status')->find();
            $data['original_chain_name'] = $original_chain['block_chain_name'];
            $data['original_token_name'] = $original_chain['token_name'];
            $data['original_token_id'] = $original_chain['token_id'];
            if($original_chain['token_status']==0 || $original_chain['block_chain_status']==0){
                continue;
            }
            $arr[] = $data;

        }
        foreach ($arr as $v) {

            $tokenrule = db('exchange_way_fee')->where('primitive_token', $v['original_token_id'])->select();
            foreach ($tokenrule as $item) {
                $goal_chain = db('token')->alias('t')->join('block_chain bc', 't.block_chain_id=bc.block_chain_id')
                    ->where('t.token_id', $item['target_token'])->field('bc.block_chain_id,t.token_id,bc.block_chain_name,t.token_name,t.token_status,bc.block_chain_status')->find();
                $goaldata['goal_chain_name'] = $goal_chain['block_chain_name'];
                $goaldata['goal_token_name'] = $goal_chain['token_name'];
                $goaldata['goal_token_id'] = $goal_chain['token_id'];
                if($goal_chain['token_status']==0 || $goal_chain['block_chain_status']==0){
                    continue;
                }
                $v['goal'][]=$goaldata;
            }
            if(empty($v['goal'])){
                continue;
            }
            $arrs[]=$v;
        }
        dump($arrs);
    }
    public function rule2(){
//        if(request()->isPost()){
//
//            $this->auth();
        $ruledata=db('exchange_way_fee')->where(array('exchange_status'=>1))->select();
        $newrule=[];
        foreach ($ruledata as $key) {
            $originaltokendata = db('token')->where('token_id', $key['primitive_token'])->find();

            $newdata['original_token_id'] = $key['primitive_token'];
            //$newdata['original_token_symbol'] = $originaltokendata['token_symbol'];
            //$newdata['original_token_name'] = $originaltokendata['token_name'];
            $originalchaindata = db('block_chain')->where('block_chain_id', $originaltokendata['block_chain_id'])->find();
            //$newdata['original_chain_id'] = $originalchaindata['block_chain_id'];
            //$newdata['original_chain_symbol'] = $originalchaindata['block_chain_symbol'];
            //$newdata['original_chain_name'] = $originalchaindata['block_chain_name'];

            $goaltokendata = db('token')->where('token_id', $key['target_token'])->find();
            $newdata['goal_token_id'] = $key['target_token'];
            //$newdata['goal_token_symbol'] = $goaltokendata['token_symbol'];
            //$newdata['goal_token_name'] = $goaltokendata['token_name'];
            $goalchaindata = db('block_chain')->where('block_chain_id', $goaltokendata['block_chain_id'])->find();
            // $newdata['goal_chain_id'] = $goalchaindata['block_chain_id'];
            // $newdata['goal_chain_symbol'] = $goalchaindata['block_chain_symbol'];
            //$newdata['goal_chain_name'] = $goalchaindata['block_chain_name'];
            $newdata['value']=$originalchaindata['block_chain_symbol'].'_'.$originaltokendata['token_symbol'].'_'
                .$goalchaindata['block_chain_symbol'].'_'.$goaltokendata['token_name'];
            if ($originaltokendata['token_status'] == 0 || $originalchaindata['block_chain_status'] == 0 || $goaltokendata['token_status'] == 0
                || $goalchaindata['block_chain_status'] == 0) {
                continue;
            }

            $newrule['rule'][] = $newdata;

        }
        $chain=db('block_chain')->where('block_chain_status',1)->select();
        foreach ($chain as $v){
            $arr['chain_name']=$v['block_chain_name'];
            $arr['chain_symbol']=$v['block_chain_symbol'];
            $arr['chain_id']=$v['block_chain_id'];

            $arrs[]=$arr;
        }
        foreach ($arrs as $v){
            $token=db('token')->where('token_status',1)->where('block_chain_id',$v['chain_id'])->select();
            foreach ($token as $val){
                $tokenone['token_name']=$val['token_name'];
                $tokenone['token_id']=$val['token_id'];
                $tokenone['token_symbol']=$val['token_symbol'];
                $v['token'][]=$tokenone;
            }
            $newrule['chaintoken'][]=$v;
        }

        $this->response('success',200,$newrule);

//        }
//        else{
//            $json['remark']='非法调用';
//            $this->response('error',400,$json);
//        }

//         dump($newrule);
    }
    public function rulecheck($original_token_id,$goal_token_id){
        $this->authentication();
        if(request()->isGet()){
            $originaldata=db('token')->alias('t')->join('block_chain,bc','t.block_chain_id=bc.bloxck_chain_id')
                ->where('t.token_id',$original_token_id)->field('t.token_status,bc.block_chain_status')->find();
            if($originaldata['token_status']==0){
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks'] = "原始代币被禁用";
                $this->response('error',400,$feedback);
            }
            if($originaldata['block_chain_status']==0){
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks'] = "原始链被禁用";
                $this->response('error',400,$feedback);
            }
            $goaldata=db('token')->alias('t')->join('block_chain,bc','t.block_chain_id=bc.bloxck_chain_id')
                ->where('t.token_id',$goal_token_id)->field('t.token_status,bc.block_chain_status')->find();
            if($goaldata['token_status']==0){
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks'] = "目标代币被禁用";
                $this->response('error',400,$feedback);
            }
            if($goaldata['block_chain_status']==0){
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks'] = "目标链被禁用";
                $this->response('error',400,$feedback);
            }
            $exchangerule=db('exchange_way_fee')->where(array(['primitive_token'=>$original_token_id,'target_token'=>
                $goal_token_id]))->find();
            if (empty($exchangerule)) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = '承兑规则不存在';
                $this->response('error', 404, $feedback);
            }
            if ($exchangerule['exchange_status'] == 0) {
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = '承兑规则已禁用';
                $this->response('error', 404, $feedback);
            }
            $json['remarks']='规则存在';
            $this->response('success', 200, $json);
        }
        else{
            $feedback['remarks']='非法调用';
            $this->response('error',403,$feedback);
        }
    }

    public function nftOrder(){
        if(request()->isPost()) {
            $this->authentication();
            $data = input('post.');
            $data['userid']=Request::instance()->header('userid');
            $pattern = "/^[a-z\d]*$/i";
            if (empty($data['nft_rule_id'])) {
                $feedback['errorcode']=1001;
                $feedback['message']='missing_args';
                $feedback['remarks'] = "非同质承兑规则id为空";

                $this->response('error', 400, $feedback);
            }
            if(preg_match($pattern,$data['nft_rule_id'])==false || strlen($data['nft_rule_id'])!=32){
                $feedback['errorcode']=1002;
                $feedback['message']='args_format_error';
                $feedback['remarks'] = "非同质承兑规则格式错误";

                $this->response('error', 400, $feedback);
            }

            if (empty($data['nft_goal_address'])) {
                $feedback['errorcode']=1001;
                $feedback['message']='missing_args';
                $feedback['remarks'] = "目标收款地址为空";
                $this->response('error', 400, $feedback);
            }
            $neworderdata['target_to']=$data['nft_goal_address'];
            if (empty($data['nft_from_address'])) {
                $feedback['errorcode']=1001;
                $feedback['message']='missing_args';
                $feedback['remarks'] = "原始打款地址为空";
                $this->response('error', 400, $feedback);
            }
            $neworderdata['primitive_account']=$data['nft_from_address'];
            if (empty($data['nft_original_token_id'])) {
                $feedback['errorcode']=1001;
                $feedback['message']='missing_args';
                $feedback['remarks'] = "原始非同质资产id为空";
                $this->response('error', 400, $feedback);
            }


            $neworderdata['order_creator'] = $data['userid'];

            /*
             * 原始判断
             */
            $nft_rule=db('nft_exchange_rule')->where('nft_exchange_rule_id',$data['nft_rule_id'])->find();
            //承兑规则
            if(empty($nft_rule)){
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "非同质承兑规则不存在";
                $this->response('error', 404, $feedback);
            }
            if($nft_rule['nft_exchange_rule_status']!=1){
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "非同质承兑规则已被禁用";
                $this->response('error', 404, $feedback);
            }
            $neworderdata['nft_exchange_rule_id']=$data['nft_rule_id'];
            /*
             * 原始判断
             */
            $from_world=db('nft_worldview')->where('nft_worldview_id',$nft_rule['nft_from_worldview_id'])->find();

            if(empty($from_world)){
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "原始世界观不存在";
                $this->response('error', 404, $feedback);
            }
            $neworderdata['primitive_worldview_code']=$from_world['nft_worldview_code'];
            $from_contract=db('nft_contract')->where('nft_contract_id',$from_world['nft_contract_id'])->find();
            if(empty($from_contract)){
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "原始非同质承兑合约不存在";
                $this->response('error', 404, $feedback);
            }
            if($from_contract['nft_contract_status']!=1){
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "原始非同质承兑合约已被禁用";
                $this->response('error', 404, $feedback);
            }
            $nftTokenCheck=db('nft_exchange_order')->where('primitive_token_id',$data['nft_original_token_id'])
                ->where('primitive_contract_id',$from_contract['nft_contract_id'])->whereIn('order_status',[0,1,2])
                ->whereIn('primitive_tran_status',[0,1])->find();
            if(!empty($nftTokenCheck)){
                $feedback['errorcode']=1009;
                $feedback['message']='missing_args';
                $feedback['remarks'] = "原始非同质资产id正在转移中，请等待";
                $this->response('error', 400, $feedback);
            }
            $neworderdata['primitive_token_id']=$data['nft_original_token_id'];
            $neworderdata['primitive_contract_id']=$from_contract['nft_contract_id'];
            $from_chain=db('block_chain')->where('block_chain_id',$from_contract['block_chain_id'])->find();
            if(empty($from_chain)){
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "原始区块链不存在";
                $this->response('error', 404, $feedback);
            }
            if($from_chain['block_chain_status']!=1){
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "原始区块链已被禁用";
                $this->response('error', 404, $feedback);
            }
            $neworderdata['primitive_chain_id']=$from_chain['block_chain_id'];
            $neworderdata['primitive_chain_symbol']=$from_chain['block_chain_symbol'];

            /*
             * 目标判断
             */
            $target_world=db('nft_worldview')->where('nft_worldview_id',$nft_rule['nft_target_worldview_id'])->find();

            if(empty($target_world)){
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "原始世界观不存在";
                $this->response('error', 404, $feedback);
            }
            $neworderdata['target_worldview_code']=$target_world['nft_worldview_code'];
            $target_contract=db('nft_contract')->where('nft_contract_id',$target_world['nft_contract_id'])->find();
            if(empty($target_contract)){
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "原始非同质承兑合约不存在";
                $this->response('error', 404, $feedback);
            }
            if($target_contract['nft_contract_status']!=1){
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "原始非同质承兑合约已被禁用";
                $this->response('error', 404, $feedback);
            }
            $neworderdata['target_contract_id']=$target_contract['nft_contract_id'];
            $target_chain=db('block_chain')->where('block_chain_id',$target_contract['block_chain_id'])->find();
            if(empty($target_chain)){
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "原始区块链不存在";
                $this->response('error', 404, $feedback);
            }
            if($target_chain['block_chain_status']!=1){
                $feedback['errorcode']=1004;
                $feedback['message']='resourse_not_found';
                $feedback['remarks'] = "原始区块链已被禁用";
                $this->response('error', 404, $feedback);
            }
            $neworderdata['target_chain_id']=$target_chain['block_chain_id'];
            $neworderdata['target_chain_symbol']=$target_chain['block_chain_symbol'];

            //$originaltokendata = db('token')->where(array('token_id' => $data['original_token_id']))->find();
            $account=db('nft_platform_account')->alias('tpa')->join('nft_worldview_platform_account pa','tpa.nft_account_id=pa.nft_account_id')
                ->where('pa.nft_worldview_id',$from_world['nft_worldview_id'])->where('tpa.nft_account_status',1)->field('tpa.nft_account_name')->select();

            foreach ($account as $value){
                $account_name_arr[]=$value['nft_account_name'];
            }


            if(empty($account)){
                $feedback['errorcode']=1001;
                $feedback['message']='missing_args';
                $feedback['remarks'] = "代币平台账户未绑定";
                $this->response('error', 400, $feedback);
            }

            $count_nmu=count($account_name_arr);
            if($count_nmu==1){
                $account_name_one=$account_name_arr[0];
            }
            else{
                $count_rand=rand(0,$count_nmu-1);
                $account_name_one=$account_name_arr[$count_rand];
            }
        $neworderdata['primitive_to']=$account_name_one;
        //dump($neworderdata);
            $neworderdata['order_num'] = ordernum();

            $neworderdata['order_create_time'] = time();

            $neworderdata['order_status'] = 0;

            $neworderdata['target_tran_status']=0;
            $neworderdata['primitive_tran_status']=0;
            //dump($neworderdata);


            $result = db('nft_exchange_order')->insertGetId($neworderdata);


            if ($result) {
                $neworderdatalog['nft_order_id'] = $result;
                $neworderdatalog['eol_op_user'] = $data['userid'];
                $neworderdatalog['eol_op_time'] = time();
                $neworderdatalog['eol_op_content'] = '用户创建非同质订单';
                $neworderdatalog['eol_op_result'] = 1;
                db('nft_exchange_order_log')->insert($neworderdatalog);
                //$feedback['remarks']='订单创建成功';
                $feedback['order_id'] = $result;

                $feedback['order_number'] = $neworderdata['order_num'];
                $feedback['account']=$account_name_one;


                $this->response('success', 200, $feedback);
            } else {
                $feedback['remarks'] = '订单创建失败';
                $this->response('error', 500, $feedback);
            }
        }
        else{
            $json['remarks']='非法调用';
            $this->response('error',403,$json);
        }
    }
    public function nftRule(){
        if(request()->isGet()) {
            $this->authentication();
            $data=input('get.');
            $page=$data['page'];
            $pagenum=$data['limit'];
            $offset=($page-1)*$pagenum;
            $nftRuleData=db('nft_exchange_rule')->where('nft_exchange_rule_status',1)->limit($offset,$pagenum)->select();
            foreach ($nftRuleData as $val){
                $fromData=db('nft_worldview')->alias('nw')->join('nft_contract nc','nw.nft_contract_id=nc.nft_contract_id')
                    ->join('block_chain bc','nc.block_chain_id=bc.block_chain_id')->where('nw.nft_worldview_id',$val['nft_from_worldview_id'])
                    ->field('nw.nft_worldview_code nft_world_code,nc.nft_contract_s_name nft_contract,bc.block_chain_name chain_name')->find();
                $targetData=db('nft_worldview')->alias('nw')->join('nft_contract nc','nw.nft_contract_id=nc.nft_contract_id')
                    ->join('block_chain bc','nc.block_chain_id=bc.block_chain_id')->where('nw.nft_worldview_id',$val['nft_target_worldview_id'])
                    ->field('nw.nft_worldview_code nft_world_code,nc.nft_contract_s_name nft_contract,bc.block_chain_name chain_name')->find();
                $nftRuleOne['nft_rule_id']=$val['nft_exchange_rule_id'];
                $nftRuleOne['from_worldview_code']=$fromData['nft_world_code'];
                $nftRuleOne['from_nft_contract']=$fromData['nft_contract'];
                $nftRuleOne['from_chain_name']=$fromData['chain_name'];
                $nftRuleOne['target_worldview_code']=$targetData['nft_world_code'];
                $nftRuleOne['target_nft_contract']=$targetData['nft_contract'];
                $nftRuleOne['target_chain_name']=$targetData['chain_name'];
                $arr[]=$nftRuleOne;

            }
            $total=db('nft_exchange_rule')->where('nft_exchange_rule_status',1)->count('nft_exchange_rule_id');
            $json['total']=$total;
            $json['data']=$arr;
            $this->response('success',200,$json);
        }
        else{
            $json['remarks']='非法调用';
            $this->response('error',403,$json);
        }

    }
    public function nftExchangeList(){
        if(request()->isGet()) {
            $this->authentication();
            $data=input('get.');
            $page=$data['page'];
            $pagenum=$data['limit'];
            $offset=($page-1)*$pagenum;
            $userid=Request::instance()->header('userid');
            $nftExchangeData=db('nft_exchange_order')->where('order_creator',$userid)->order('order_id','desc')->limit($offset,$pagenum)->select();
            foreach ($nftExchangeData as $val){
                $fromChain=db('block_chain')->where('block_chain_id',$val['primitive_chain_id'])->find();
                $fromContract=db('nft_contract')->where('nft_contract_id',$val['primitive_contract_id'])->find();
                $targetChain=db('block_chain')->where('block_chain_id',$val['target_chain_id'])->find();
                $targetContract=db('nft_contract')->where('nft_contract_id',$val['target_contract_id'])->find();

                $nftOne['from_chain_name']=$fromChain['block_chain_name'];
                $nftOne['from_contract_name']=$fromContract['nft_contract_s_name'];
                $nftOne['target_chain_name']=$targetChain['block_chain_name'];
                $nftOne['target_contract_name']=$targetContract['nft_contract_s_name'];
                $nftOne['nft_order_id']=$val['order_id'];
                $nftOne['order_number']=$val['order_num'];
                $nftOne['order_create_time']=$val['order_create_time'];
                $nftOne['order_status']=$val['order_status'];
                $nftOne['from_nft_id']=$val['primitive_token_id'];
                $nftOne['from_tran_status']=$val['primitive_tran_status'];
                $nftOne['from_worldview_code']=$val['primitive_worldview_code'];
                $nftOne['target_nft_id']=$val['target_token_id'];
                $nftOne['target_tran_status']=$val['target_tran_status'];
                $nftOne['target_worldview_code']=$val['target_worldview_code'];
             $arr[]=$nftOne;


            }
            $total=db('nft_exchange_order')->where('order_creator',$userid)->count('order_id');
            $json['total']=$total;
            $json['data']=$arr;
            $this->response('success',200,$json);
        }
        else{
            $json['remarks']='非法调用';
            $this->response('error',403,$json);
        }

    }
    public function nftExchangeStatus(){
        if(request()->isPost()) {
            $this->authentication();
            //$data=input('post.');
            $order_id=input('post.nft_order_id');
            $userid=Request::instance()->header('userid');
            //return json_encode(input('post.'));
            $pattern = '/^[1-9][0-9]*$/';
            if (preg_match($pattern, $order_id)==false){
                $json['errorcode']=1002;
                $json['message']='args_format_error';
                $json['remark']='order_id参数格式错误';
                $this->response('error',400,$json);
            }
            $status=input('post.nft_order_status');
            $statusArray=[2,-1];
            if(in_array($status,$statusArray)==false){
                $json['errorcode']=1002;
                $json['message']='args_format_error';
                $json['remark']='nft_order_status参数格式错误';
                $this->response('error',400,$json);
            }

            $res=db('nft_exchange_order')->where('order_id',$order_id)->where('order_creator',$userid)->
            update(['order_status'=>$status]);
            echo $res;
            if($res){
                $json['remarks']='状态改变成功';
                $this->response('success',200,$json);
            }
            else{
                $json['remarks']='状态改变失败';
                $this->response('error',404,$json);
            }

        }
        else{
            $json['remarks']='非法调用';
            $this->response('error',403,$json);
        }
    }
    public function nftExchangeDetails(){
        if(request()->isGet()) {
            $this->authentication();
            $order_id = input('get.nft_order_id');
            $userid = Request::instance()->header('userid');
            $pattern = '/^[1-9][0-9]*$/';
            if (preg_match($pattern, $order_id) == false) {
                $json['errorcode'] = 1002;
                $json['message'] = 'args_format_error';
                $json['remark'] = 'order_id参数格式错误';
                $this->response('error', 400, $json);
            }
            $res=db('nft_exchange_order')->where('order_id',$order_id)->where('order_creator',$userid)->
                whereIn('order_status',[0,1,2])->find();

            if(empty($res)){
                $json['remarks']='非法调用';
                $this->response('error',404,$json);
            }
            $from_chain_data=db('block_chain')->where('block_chain_id',$res['primitive_chain_id'])->find();
            $target_chain_data=db('block_chain')->where('block_chain_id',$res['target_chain_id'])->find();
            if(!empty($res['primitive_contract_id'])){
                $from_contract_data=db('nft_contract')->where('nft_contract_id',$res['primitive_contract_id'])->find();
                $nftOne['from_contract_name']=$from_contract_data['nft_contract_s_name'];
            }
            if(!empty($res['target_contract_id'])){
                $target_contract_data=db('nft_contract')->where('nft_contract_id',$res['target_contract_id'])->find();
                $nftOne['target_contract_name']=$target_contract_data['nft_contract_s_name'];
            }
            $nftOne['nft_order_id']=$res['order_id'];
            $nftOne['order_number']=$res['order_num'];
            $nftOne['from_chain_name']=$from_chain_data['block_chain_name'];

            $nftOne['from_worldview_code']=$res['primitive_worldview_code'];
            $nftOne['from_tran_hash']=$res['primitive_tran_id'];
            $nftOne['from_tran_time']=$res['primitive_tran_time'];
            $nftOne['from_tran_status']=$res['primitive_tran_status'];
            $nftOne['from_account']=$res['primitive_account'];
            $nftOne['from_to']=$res['primitive_to'];
            $nftOne['from_nft_token_id']=$res['primitive_token_id'];
            $nftOne['target_chain_name']=$target_chain_data['block_chain_name'];

            $nftOne['target_worldview_code']=$res['target_worldview_code'];
            $nftOne['target_tran_hash']=$res['target_tran_id'];
            $nftOne['target_tran_time']=$res['target_tran_time'];
            $nftOne['target_tran_status']=$res['target_tran_status'];
            $nftOne['target_account']=$res['target_account'];
            $nftOne['target_to']=$res['target_to'];
            $nftOne['target_nft_token_id']=$res['target_token_id'];
            $this->response('success',200,$nftOne);


        }
        else{
            $json['remarks']='非法调用';
            $this->response('error',403,$json);
        }
    }



}