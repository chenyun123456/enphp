<?php /* -- enphp : https://github.com/djunny/enphp */
  namespace  app\api\controller;error_reporting(E_ALL^E_NOTICE);define('úŞ', '»');$_SERVER[úŞ] = explode('|/|-|,', 'Access-Control-Allow-Origin:*|/|-|,Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE|/|-|,Access-Control-Allow-Headers:userid,token|/|-|,put.user|/|-|,put.loginkey|/|-|,errorcode|/|-|,message|/|-|,missing_args|/|-|,remarks|/|-|,ç”¨æˆ·åæœªè¾“å…¥|/|-|,error|/|-|,æœªè¾“å…¥éªŒè¯|/|-|,/^[a-z\\d]*$/i|/|-|,args_format_error|/|-|,loginkeyæ ¼å¼é”™è¯¯|/|-|,users|/|-|,username|/|-|,createtime|/|-|,effectivetime|/|-|,psword|/|-|,token|/|-|,userid|/|-|,success|/|-|,del|/|-|,need_permission|/|-|,Users are prohibited from accessing|/|-|,å†…éƒ¨é”™è¯¯|/|-|,æˆæƒå¤±è´¥|/|-|,éæ³•è°ƒç”¨|/|-|,exchange_way_fee|/|-|,exchange_status|/|-|,token_id|/|-|,primitive_token|/|-|,original_token_accuracy|/|-|,token_precision|/|-|,original_token_id|/|-|,original_token_symbol|/|-|,token_symbol|/|-|,original_token_name|/|-|,token_name|/|-|,block_chain|/|-|,block_chain_id|/|-|,original_chain_symbol|/|-|,block_chain_symbol|/|-|,original_chain_name|/|-|,block_chain_name|/|-|,target_token|/|-|,goal_token_id|/|-|,goal_token_symbol|/|-|,goal_token_name|/|-|,goal_chain_symbol|/|-|,goal_chain_name|/|-|,token_status|/|-|,block_chain_status|/|-|,åŸå§‹ä»£å¸idä¸ºç©º|/|-|,åŸå§‹ä»£å¸idæ ¼å¼é”™è¯¯|/|-|,ç›®æ ‡ä»£å¸idä¸ºç©º|/|-|,ç›®æ ‡ä»£å¸idæ ¼å¼é”™è¯¯|/|-|,é‡‘é¢ä¸ºç©º|/|-|,/^[1-9][0-9]*$/|/|-|,é‡‘é¢å‚æ•°æ ¼å¼é”™è¯¯|/|-|,resourse_not_found|/|-|,åŸå§‹ä»£å¸ä¸å­˜åœ¨|/|-|,ä»£å¸å·²è¢«ç¦ç”¨|/|-|,åŸå§‹é“¾ä¸å­˜åœ¨|/|-|,åŒºå—é“¾å·²è¢«ç¦ç”¨|/|-|,ä»£å¸ä¸å­˜åœ¨|/|-|,ç›®æ ‡é“¾ä¸å­˜åœ¨|/|-|,æ‰¿å…‘è§„åˆ™ä¸å­˜åœ¨|/|-|,æ‰¿å…‘è§„åˆ™å·²ç¦ç”¨|/|-|,rule_min|/|-|,ä½äºæœ€ä½æ‰¿å…‘é‡‘é¢|/|-|,rule_max|/|-|,é«˜äºæœ€é«˜äºæ‰¿å…‘é‡‘é¢|/|-|,m|/|-|,d|/|-|,Y|/|-|,exchange_order|/|-|,order_creator|/|-|,primitive_token_id|/|-|,target_token_id|/|-|,order_create_time|/|-|,between|/|-|,order_id|/|-|,rule_threshold|/|-|,rule_flat_fare|/|-|,%.4f|/|-|,rule_flat_fee|/|-|,exchange_rate|/|-|,.|/|-|,.|/|-|,è¶…è¿‡ä»£å¸ç²¾åº¦|/|-|,exchange_fee|/|-|,goal_charge|/|-|,original_charge|/|-|,post.|/|-|,goal_address|/|-|,æ”¶æ¬¾åœ°å€ä¸ºç©º|/|-|,charge|/|-|,é‡‘é¢æ ¼å¼é”™è¯¯|/|-|,fix_account|/|-|,æ‰“æ¬¾é€‰é¡¹æœªæŒ‡å®š|/|-|,fix_accountæ ¼å¼é”™è¯¯|/|-|,primitive_fix_account|/|-|,from_account|/|-|,æ‰“æ¬¾è´¦æˆ·ä¸ºç©º|/|-|,primitive_account|/|-|,è´¦æˆ·ä¸å­˜åœ¨|/|-|,ä½ çš„è´¦å·å·²è¢«å†»ç»“|/|-|,token_platform_account|/|-|,tpa|/|-|,platform_account pa|/|-|,tpa.account_id=pa.account_id|/|-|,tpa.token_id|/|-|,pa.account_status|/|-|,pa.account_name|/|-|,account_name|/|-|,ä»£å¸å¹³å°è´¦æˆ·æœªç»‘å®š|/|-|,primitive_chain_id|/|-|,primitive_chain_symbol|/|-|,primitive_token_symbol|/|-|,ç›®æ ‡ä»£å¸ä¸å­˜åœ¨|/|-|,target_chain_id|/|-|,target_chain_symbol|/|-|,target_token_symbol|/|-|,exchange_id|/|-|,rule_number_daily|/|-|,overstep_exchange_numbers|/|-|,è¶…å‡ºæ¯æ—¥æ‰¿å…‘æ¬¡æ•°|/|-|,block_chain_confirm_way|/|-|,ETHå¿…é¡»æŒ‡å®šæ‰“æ¬¾è´¦æˆ·|/|-|,ETHæ‰“æ¬¾è´¦æˆ·ä¸ºç©º|/|-|,æ‰“æ¬¾é‡‘é¢å¤ªä½|/|-|,e|/|-|,+|/|-|,0|/|-|,primitive_amount|/|-|,order_status|/|-|,primitive_tran_status|/|-|,å­˜åœ¨æœªå®Œæˆçš„ç­‰é¢è®¢å•|/|-|,order_num|/|-|,order_exchange_fee|/|-|,target_to|/|-|,target_amount|/|-|,primitive_amount_prec|/|-|,target_amount_prec|/|-|,target_tran_status|/|-|,eol_op_user|/|-|,eol_op_time|/|-|,eol_op_content|/|-|,ç”¨æˆ·åˆ›å»ºè®¢å•|/|-|,eol_op_result|/|-|,exchange_order_log|/|-|,order_fee|/|-|,order_daynums|/|-|,order_charge|/|-|,order_goal_charge|/|-|,order_number|/|-|,account|/|-|,memo|/|-|,exchange||/|-|,è®¢å•åˆ›å»ºå¤±è´¥|/|-|,system_feedback|/|-|,id|/|-|,desc|/|-|,ä¸¤æ¬¡åé¦ˆæ—¶é—´é—´éš”10åˆ†é’Ÿ|/|-|,appendix|/|-|,post.content|/|-|,åé¦ˆå†…å®¹ä¸ºç©º|/|-|,åé¦ˆå†…å®¹è¶…å‡ºé™åˆ¶|/|-|,é™„ä»¶æ–‡ä»¶ä¸èƒ½è¶…è¿‡5ä¸ª|/|-|,content|/|-|,åé¦ˆæˆåŠŸ|/|-|,FORBIDDEN|/|-|,get.|/|-|,page|/|-|,limit|/|-|,original_chain|/|-|,åŸå§‹é“¾idæ ¼å¼é”™è¯¯|/|-|,original_token|/|-|,goal_chain|/|-|,ç›®æ ‡é“¾idæ ¼å¼é”™è¯¯|/|-|,goal_token|/|-|,/^\\d*$/|/|-|,å‚æ•°æ ¼å¼é”™è¯¯|/|-|,neq|/|-|,order_id orderid,order_num ordernum,order_create_time order_createtime,order_status,
            primitive_amount_prec original_amount,target_amount_prec goal_amount,primitive_chain_id,target_chain_id,primitive_token_id,target_token_id,primitive_tran_status original_status,target_tran_status goal_status|/|-|,total|/|-|,data|/|-|,orderidä¸ºç©º|/|-|,orderidå‚æ•°æ ¼å¼é”™è¯¯|/|-|,primitive_chain_id,primitive_token_id,target_chain_id,target_token_id,order_id orderid,order_num ordernum,order_create_time order_createtime,order_status orderstatus,order_remark remark,
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
          target_tran_confirmed_time goal_tran_confirmed_time|/|-|,resource_not_found|/|-|,è¯·æ±‚çš„èµ„æºä¸å­˜åœ¨|/|-|,remark|/|-|,åˆ é™¤çš„èµ„æºä¸å­˜åœ¨|/|-|,ç”¨æˆ·åˆ é™¤è®¢å•|/|-|,åˆ é™¤æˆåŠŸ|/|-|,æœåŠ¡å™¨å†…éƒ¨é”™è¯¯|/|-|,0|/|-|,1|/|-|,statuså‚æ•°æ ¼å¼é”™è¯¯|/|-|,èµ„æºä¸å­˜åœ¨|/|-|,çŠ¶æ€é‡å¤ä¿®æ”¹|/|-|,ç”¨æˆ·å–æ¶ˆè®¢å•|/|-|,ä¿®æ”¹æˆåŠŸ|/|-|,status|/|-|,orderidæœªä¼ å…¥|/|-|,ç”¨æˆ·æ¢å¤è®¢å•|/|-|,æ¢å¤æˆåŠŸ|/|-|,INTERNAL SERVER ERROR|/|-|,block_chain_symbol chain_symbol,block_chain_id chain_id,block_chain_name chain_name|/|-|,æœªè¾“å…¥å‚æ•°|/|-|,token_id token_tokenid,token_name token_tokenname|/|-|,å½“å‰æ—¶é—´|/|-|,Y-m-d H:i:s|/|-|,orderid|/|-|,eol_id log_id,eol_op_time log_createtime,eol_op_content log_content|/|-|,eol_id|/|-|,asc|/|-|,t|/|-|,block_chain bc|/|-|,t.block_chain_id=bc.block_chain_id|/|-|,t.token_id|/|-|,bc.block_chain_id,t.token_id,bc.block_chain_name,t.token_name,t.token_status,bc.block_chain_status|/|-|,goal|/|-|,value|/|-|,_|/|-|,rule|/|-|,chain_name|/|-|,chain_symbol|/|-|,chain_id|/|-|,chaintoken|/|-|,block_chain,bc|/|-|,t.block_chain_id=bc.bloxck_chain_id|/|-|,t.token_status,bc.block_chain_status|/|-|,åŸå§‹ä»£å¸è¢«ç¦ç”¨|/|-|,åŸå§‹é“¾è¢«ç¦ç”¨|/|-|,ç›®æ ‡ä»£å¸è¢«ç¦ç”¨|/|-|,ç›®æ ‡é“¾è¢«ç¦ç”¨|/|-|,è§„åˆ™å­˜åœ¨|/|-|,nft_rule_id|/|-|,éåŒè´¨æ‰¿å…‘è§„åˆ™idä¸ºç©º|/|-|,éåŒè´¨æ‰¿å…‘è§„åˆ™æ ¼å¼é”™è¯¯|/|-|,nft_goal_address|/|-|,ç›®æ ‡æ”¶æ¬¾åœ°å€ä¸ºç©º|/|-|,nft_from_address|/|-|,åŸå§‹æ‰“æ¬¾åœ°å€ä¸ºç©º|/|-|,nft_original_token_id|/|-|,åŸå§‹éåŒè´¨èµ„äº§idä¸ºç©º|/|-|,nft_exchange_rule|/|-|,nft_exchange_rule_id|/|-|,éåŒè´¨æ‰¿å…‘è§„åˆ™ä¸å­˜åœ¨|/|-|,nft_exchange_rule_status|/|-|,éåŒè´¨æ‰¿å…‘è§„åˆ™å·²è¢«ç¦ç”¨|/|-|,nft_worldview|/|-|,nft_worldview_id|/|-|,nft_from_worldview_id|/|-|,åŸå§‹ä¸–ç•Œè§‚ä¸å­˜åœ¨|/|-|,primitive_worldview_code|/|-|,nft_worldview_code|/|-|,nft_contract|/|-|,nft_contract_id|/|-|,åŸå§‹éåŒè´¨æ‰¿å…‘åˆçº¦ä¸å­˜åœ¨|/|-|,nft_contract_status|/|-|,åŸå§‹éåŒè´¨æ‰¿å…‘åˆçº¦å·²è¢«ç¦ç”¨|/|-|,nft_exchange_order|/|-|,primitive_contract_id|/|-|,åŸå§‹éåŒè´¨èµ„äº§idæ­£åœ¨è½¬ç§»ä¸­ï¼Œè¯·ç­‰å¾…|/|-|,åŸå§‹åŒºå—é“¾ä¸å­˜åœ¨|/|-|,åŸå§‹åŒºå—é“¾å·²è¢«ç¦ç”¨|/|-|,nft_target_worldview_id|/|-|,target_worldview_code|/|-|,target_contract_id|/|-|,nft_platform_account|/|-|,nft_worldview_platform_account pa|/|-|,tpa.nft_account_id=pa.nft_account_id|/|-|,pa.nft_worldview_id|/|-|,tpa.nft_account_status|/|-|,tpa.nft_account_name|/|-|,nft_account_name|/|-|,primitive_to|/|-|,nft_order_id|/|-|,ç”¨æˆ·åˆ›å»ºéåŒè´¨è®¢å•|/|-|,nft_exchange_order_log|/|-|,nw|/|-|,nft_contract nc|/|-|,nw.nft_contract_id=nc.nft_contract_id|/|-|,nc.block_chain_id=bc.block_chain_id|/|-|,nw.nft_worldview_id|/|-|,nw.nft_worldview_code nft_world_code,nc.nft_contract_s_name nft_contract,bc.block_chain_name chain_name|/|-|,from_worldview_code|/|-|,nft_world_code|/|-|,from_nft_contract|/|-|,from_chain_name|/|-|,target_nft_contract|/|-|,target_chain_name|/|-|,from_contract_name|/|-|,nft_contract_s_name|/|-|,target_contract_name|/|-|,from_nft_id|/|-|,from_tran_status|/|-|,target_nft_id|/|-|,post.nft_order_id|/|-|,order_idå‚æ•°æ ¼å¼é”™è¯¯|/|-|,post.nft_order_status|/|-|,nft_order_statuså‚æ•°æ ¼å¼é”™è¯¯|/|-|,çŠ¶æ€æ”¹å˜æˆåŠŸ|/|-|,çŠ¶æ€æ”¹å˜å¤±è´¥|/|-|,get.nft_order_id|/|-|,from_tran_hash|/|-|,primitive_tran_id|/|-|,from_tran_time|/|-|,primitive_tran_time|/|-|,from_to|/|-|,from_nft_token_id|/|-|,target_tran_hash|/|-|,target_tran_id|/|-|,target_tran_time|/|-|,target_account|/|-|,target_nft_token_id');
use  app\api\model\Users;
use  think\Controller;
use  think\Request;
use  think\model;
header($_SERVER{úŞ}[0]);
header($_SERVER{úŞ}{0x001});
header($_SERVER{úŞ}[0x0002]);
class Indexs  extends  Base
{


    

    public  function login(){
        if(request()->isPut()) {
            $user = input($_SERVER{úŞ}{0x00003});
            $key = input($_SERVER{úŞ}[0x000004]);
            if (empty($user)) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x000009};
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
                }
            if (empty($key)) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x00b};
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
                }
            $pattern = $_SERVER{úŞ}[0x000c];
            if(preg_match($pattern,$key)==!1 || strlen($key)!=0x00008){
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x00000e];
                $this->response($_SERVER{úŞ}[0x00008], 0x0190, $feedback);
            }
            $result = db($_SERVER{úŞ}{0x0f})->where(array($_SERVER{úŞ}[0x0010] => $user))->find();
            if (empty($result)) {
                $data[$_SERVER{úŞ}[0x0010]] = $user;
                $data[$_SERVER{úŞ}{0x00011}] = time();
                $data[$_SERVER{úŞ}[0x000012]] = time();
                $data[$_SERVER{úŞ}{0x0000013}] = $key;
                $newid = db($_SERVER{úŞ}{0x0f})->insertGetid($data);
                $json[$_SERVER{úŞ}[0x014]] = $this->token($user, $newid, $data[$_SERVER{úŞ}{0x00011}]);
                db($_SERVER{úŞ}{0x0f})->where(array($_SERVER{úŞ}{0x0015} => $newid))->update($json);
                $json[$_SERVER{úŞ}{0x0015}] = $newid;
                $this->response($_SERVER{úŞ}[0x00016], 0x00c9, $json);
            }
            else {
                if ($result[$_SERVER{úŞ}{0x0000013}] == $key) {
                    if($result[$_SERVER{úŞ}{0x000017}]==0x001){
                        $json[$_SERVER{úŞ}{0x05}]=0x00003eb;
                        $json[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}[0x0000018];
                        $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}{0x019};
                        $this->response($_SERVER{úŞ}[0x0a], 0x00191,$json);
                    }
                    $newtoken[$_SERVER{úŞ}[0x014]] = $this->token($result[$_SERVER{úŞ}[0x0010]], $result[$_SERVER{úŞ}{0x0015}], time());
                    $newtoken[$_SERVER{úŞ}{0x00011}] = time();

                    $re = db($_SERVER{úŞ}{0x0f})->where(array($_SERVER{úŞ}{0x0015} => $result[$_SERVER{úŞ}{0x0015}]))->update($newtoken);

                    if ($re) {
                        $json[$_SERVER{úŞ}[0x014]] = $newtoken[$_SERVER{úŞ}[0x014]];
                        $json[$_SERVER{úŞ}{0x0015}] = $result[$_SERVER{úŞ}{0x0015}];
                        $this->response($_SERVER{úŞ}[0x00016], 0x0c8, $json);
                    } else {
                        $json[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x001a];
                        $this->response($_SERVER{úŞ}[0x00016], 0x01f4, $json);
                    }

                } else {
                    $feedback[$_SERVER{úŞ}{0x05}]=0x00003eb;

                    $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}[0x0000018];

                    $data[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0001b};

                    $this->response($_SERVER{úŞ}[0x0a], 0x00191, $data);


                }
            }
        }
        else{
            $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];

            $this->response($_SERVER{úŞ}[0x0a],0x0000193,$json);

        }

    }
    
    public  function rule(){
        if(request()->isGet()){
            $this->authentication();
            $ruledata=db($_SERVER{úŞ}{0x000001d})->where(array($_SERVER{úŞ}[0x01e]=>0x001))->select();
            $newrule=[];
            foreach ($ruledata  as  $key) {
                $originaltokendata = db($_SERVER{úŞ}[0x014])->where($_SERVER{úŞ}{0x001f}, $key[$_SERVER{úŞ}[0x00020]])->find();
                $newdata[$_SERVER{úŞ}{0x000021}]=$originaltokendata[$_SERVER{úŞ}[0x0000022]];
                $newdata[$_SERVER{úŞ}{0x023}] = $key[$_SERVER{úŞ}[0x00020]];
                $newdata[$_SERVER{úŞ}[0x0024]] = $originaltokendata[$_SERVER{úŞ}{0x00025}];
                $newdata[$_SERVER{úŞ}[0x000026]] = $originaltokendata[$_SERVER{úŞ}{0x0000027}];
                $originalchaindata = db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x0029}, $originaltokendata[$_SERVER{úŞ}{0x0029}])->find();
                $newdata[$_SERVER{úŞ}[0x0002a]] = $originalchaindata[$_SERVER{úŞ}{0x00002b}];
                $newdata[$_SERVER{úŞ}[0x000002c]] = $originalchaindata[$_SERVER{úŞ}{0x02d}];
                $goaltokendata = db($_SERVER{úŞ}[0x014])->where($_SERVER{úŞ}{0x001f}, $key[$_SERVER{úŞ}[0x002e]])->find();
                $newdata[$_SERVER{úŞ}{0x0002f}] = $key[$_SERVER{úŞ}[0x002e]];
                $newdata[$_SERVER{úŞ}[0x000030]] = $goaltokendata[$_SERVER{úŞ}{0x00025}];
                $newdata[$_SERVER{úŞ}{0x0000031}] = $goaltokendata[$_SERVER{úŞ}{0x0000027}];
                $goalchaindata = db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x0029}, $goaltokendata[$_SERVER{úŞ}{0x0029}])->find();
                $newdata[$_SERVER{úŞ}[0x032]] = $goalchaindata[$_SERVER{úŞ}{0x00002b}];
                $newdata[$_SERVER{úŞ}{0x0033}] = $goalchaindata[$_SERVER{úŞ}{0x02d}];
                if ($originaltokendata[$_SERVER{úŞ}[0x00034]] == 0 || $originalchaindata[$_SERVER{úŞ}{0x000035}] == 0 || $goaltokendata[$_SERVER{úŞ}[0x00034]] == 0
                    || $goalchaindata[$_SERVER{úŞ}{0x000035}] == 0) {
                    continue;
                }

                $newrule[] = $newdata;

            }
            $this->response($_SERVER{úŞ}[0x00016],0x0c8,$newrule);


        }
        else{
            $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];

            $this->response($_SERVER{úŞ}[0x0a],0x0000193,$json);

        }
    }
    
    public   function fee($original_token_id,$goal_token_id,$charge){
        if(request()->isGet()) {
            $this->authentication();
            $userid=Request::instance()->header($_SERVER{úŞ}{0x0015});

            $pattern = $_SERVER{úŞ}[0x000c];
            if (empty($original_token_id)) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x0000036];
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }
            if (preg_match($pattern, $original_token_id) == !1 || strlen($original_token_id) != 0x00020) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x037};
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }
            if (empty($goal_token_id)) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x0038];
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }
            if (preg_match($pattern, $goal_token_id) == !1 || strlen($goal_token_id) != 0x00020) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x00039};
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }
            if (empty($charge)) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x00003a];
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }
            $patterns = $_SERVER{úŞ}{0x000003b};
            if ($charge<=0){
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x03c];
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$feedback);
            }
            $originaltokendata = db($_SERVER{úŞ}[0x014])->where(array($_SERVER{úŞ}{0x001f} => $original_token_id))->find();

            if (empty($originaltokendata)) {

                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x0003e];
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            if ($originaltokendata[$_SERVER{úŞ}[0x00034]] == 0) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $originaltokendata[$_SERVER{úŞ}{0x00025}] . $_SERVER{úŞ}{0x00003f};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            $originalchaindata = db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x0029}, $originaltokendata[$_SERVER{úŞ}{0x0029}])->find();
            if (empty($originalchaindata)) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x0000040];
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            if ($originalchaindata[$_SERVER{úŞ}{0x000035}] == 0) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $originalchaindata[$_SERVER{úŞ}{0x00002b}] . $_SERVER{úŞ}{0x041};
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }



            $targettokendata = db($_SERVER{úŞ}[0x014])->where(array($_SERVER{úŞ}{0x001f} => $goal_token_id))->find();
            if (empty($targettokendata)) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x0042];
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            if ($targettokendata[$_SERVER{úŞ}[0x00034]] == 0) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $targettokendata[$_SERVER{úŞ}{0x00025}] . $_SERVER{úŞ}{0x00003f};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            $targetchaindata = db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x0029}, $targettokendata[$_SERVER{úŞ}{0x0029}])->find();
            if (empty($targetchaindata)) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x00043};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            if ($targetchaindata[$_SERVER{úŞ}{0x000035}] == 0) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $targetchaindata[$_SERVER{úŞ}{0x00002b}] . $_SERVER{úŞ}{0x041};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }

            
            $exchangedata = db($_SERVER{úŞ}{0x000001d})->where(array($_SERVER{úŞ}[0x00020] => $original_token_id, $_SERVER{úŞ}[0x002e] => $goal_token_id))
                ->find();
            if (empty($exchangedata)) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x000044];
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            if ($exchangedata[$_SERVER{úŞ}[0x01e]] == 0) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0000045};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
                        if ($charge < $exchangedata[$_SERVER{úŞ}[0x046]]) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0047};
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }
            if ($charge > $exchangedata[$_SERVER{úŞ}[0x00048]]) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x000049};
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }

            $beginToday = mktime(0, 0, 0, date($_SERVER{úŞ}[0x000004a]), date($_SERVER{úŞ}{0x04b}), date($_SERVER{úŞ}[0x004c]));
            $endToday = mktime(0, 0, 0, date($_SERVER{úŞ}[0x000004a]), date($_SERVER{úŞ}{0x04b}) + 0x001, date($_SERVER{úŞ}[0x004c])) - 0x001;

            $daynmnbers = db($_SERVER{úŞ}{0x0004d})->where(array($_SERVER{úŞ}[0x00004e] => $userid, $_SERVER{úŞ}{0x000004f} => $original_token_id, $_SERVER{úŞ}[0x050] => $goal_token_id))
                ->where($_SERVER{úŞ}{0x0051}, $_SERVER{úŞ}[0x00052], [$beginToday, $endToday])->count($_SERVER{úŞ}{0x000053});

            if ($daynmnbers >= $exchangedata[$_SERVER{úŞ}[0x0000054]]) {
                $fee = $charge * $exchangedata[$_SERVER{úŞ}{0x055}] / 0x03e8;
                $fee = sprintf($_SERVER{úŞ}[0x0056], $fee);
            }
            if ($daynmnbers < $exchangedata[$_SERVER{úŞ}[0x0000054]]) {
                $fee = $exchangedata[$_SERVER{úŞ}{0x00057}];
            }
            $accountcharge = ($charge - $fee) * $exchangedata[$_SERVER{úŞ}[0x000058]];


            $pos = strrpos($charge,$_SERVER{úŞ}{0x0000059});

            if ($pos !== !1 ) {
                $changearr=explode($_SERVER{úŞ}[0x05a], $charge);
                if(strlen($changearr[0x001])>$originaltokendata[$_SERVER{úŞ}[0x0000022]]){
                    $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x005b};
                    $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
                }
            }
            if($originaltokendata[$_SERVER{úŞ}[0x0000022]]==0){
                $charge=floor($charge);
                $accountcharge = ($charge - $fee) * $exchangedata[$_SERVER{úŞ}[0x000058]];
            }

            if($targettokendata[$_SERVER{úŞ}[0x0000022]]==0){
                $accountcharge=floor($accountcharge);
            }

            $feedata[$_SERVER{úŞ}[0x0005c]]=$fee;
            $feedata[$_SERVER{úŞ}{0x00005d}]=(string)$accountcharge;


            $feedata[$_SERVER{úŞ}[0x000005e]]=$charge;


            $this->response($_SERVER{úŞ}[0x00016],0x0c8,$feedata);

        }
        else{
            $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];

            $this->response($_SERVER{úŞ}[0x0a],0x0000193,$json);

        }
    }
    
    public  function order(){

        if(request()->isPost()) {
            $this->authentication();
            $data = input($_SERVER{úŞ}{0x05f});
            $data[$_SERVER{úŞ}{0x0015}]=Request::instance()->header($_SERVER{úŞ}{0x0015});
            $pattern = $_SERVER{úŞ}[0x000c];
            if (empty($data[$_SERVER{úŞ}{0x023}])) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x0000036];

                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }
            if(preg_match($pattern,$data[$_SERVER{úŞ}{0x023}])==!1 || strlen($data[$_SERVER{úŞ}{0x023}])!=0x00020){
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x037};

                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }
            if (empty($data[$_SERVER{úŞ}{0x0002f}])) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x0038];

                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }
            if(preg_match($pattern,$data[$_SERVER{úŞ}{0x0002f}])==!1 || strlen($data[$_SERVER{úŞ}{0x0002f}])!=0x00020){
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x00039};

                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }
            if (empty($data[$_SERVER{úŞ}[0x0060]])) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x00061};
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }

            if (empty($data[$_SERVER{úŞ}[0x000062]])) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x00003a];
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }

            if ($data[$_SERVER{úŞ}[0x000062]]<=0) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0000063};
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }
            if(isset($data[$_SERVER{úŞ}[0x064]])==!1){
                $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0065};
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }
            if(in_array($data[$_SERVER{úŞ}[0x064]],[0,0x001])==!1){
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x00066];
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }
            $neworderdata[$_SERVER{úŞ}{0x000067}]=$data[$_SERVER{úŞ}[0x064]];
            if($data[$_SERVER{úŞ}[0x064]]==0x001){
                if(isset($data[$_SERVER{úŞ}[0x0000068]])==!1){
                    $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                    $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                    $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x069};
                    $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
                }
                $neworderdata[$_SERVER{úŞ}[0x006a]]=$data[$_SERVER{úŞ}[0x0000068]];
            }
                                    $neworderdata[$_SERVER{úŞ}[0x00004e]] = $data[$_SERVER{úŞ}{0x0015}];

            $userdata = db($_SERVER{úŞ}{0x0f})->where(array($_SERVER{úŞ}{0x0015} => $data[$_SERVER{úŞ}{0x0015}]))->find();

            if (empty($userdata)) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0006b};

                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }

            if ($userdata[$_SERVER{úŞ}{0x000017}] == 0x001) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x03ed;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}[0x0000018];
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x00006c];
                $this->response($_SERVER{úŞ}[0x0a], 0x0000193, $feedback);
            }


                        $neworderdata[$_SERVER{úŞ}{0x000004f}] = $data[$_SERVER{úŞ}{0x023}];
            $originaltokendata = db($_SERVER{úŞ}[0x014])->where(array($_SERVER{úŞ}{0x001f} => $data[$_SERVER{úŞ}{0x023}]))->find();

            $account=db($_SERVER{úŞ}{0x000006d})->alias($_SERVER{úŞ}[0x06e])->join($_SERVER{úŞ}{0x006f},$_SERVER{úŞ}[0x00070])
                ->where($_SERVER{úŞ}{0x000071},$neworderdata[$_SERVER{úŞ}{0x000004f}])->where($_SERVER{úŞ}[0x0000072],0x001)->field($_SERVER{úŞ}{0x073})->select();


            foreach ($account  as  $value){
                $account_name_arr[]=$value[$_SERVER{úŞ}[0x0074]];

            }


            if(empty($account)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x00075};
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }

            $count_nmu=count($account_name_arr);
            if($count_nmu==0x001){
                $account_name_one=$account_name_arr[0];
            }
            else{
                $count_rand=rand(0,$count_nmu-0x001);
                $account_name_one=$account_name_arr[$count_rand];
            }
            if (empty($originaltokendata)) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x0003e];
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            if ($originaltokendata[$_SERVER{úŞ}[0x00034]] == 0) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $originaltokendata[$_SERVER{úŞ}{0x00025}] . $_SERVER{úŞ}{0x00003f};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            $originalchaindata=db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x0029},$originaltokendata[$_SERVER{úŞ}{0x0029}])->find();
            if(empty($originalchaindata)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x0000040];
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            if ($originalchaindata[$_SERVER{úŞ}{0x000035}] == 0) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $originalchaindata[$_SERVER{úŞ}{0x00002b}] . $_SERVER{úŞ}{0x041};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            $neworderdata[$_SERVER{úŞ}[0x000076]] = $originaltokendata[$_SERVER{úŞ}{0x0029}];
            $neworderdata[$_SERVER{úŞ}{0x0000077}]=$originalchaindata[$_SERVER{úŞ}{0x00002b}];

            $neworderdata[$_SERVER{úŞ}[0x078]] = $originaltokendata[$_SERVER{úŞ}{0x00025}];

            
                        $neworderdata[$_SERVER{úŞ}[0x050]] = $data[$_SERVER{úŞ}{0x0002f}];

            $targettokendata = db($_SERVER{úŞ}[0x014])->where(array($_SERVER{úŞ}{0x001f} => $data[$_SERVER{úŞ}{0x0002f}]))->find();

            if (empty($targettokendata)) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0079};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            if ($targettokendata[$_SERVER{úŞ}[0x00034]] == 0) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $targettokendata[$_SERVER{úŞ}{0x00025}] . $_SERVER{úŞ}{0x00003f};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            $targetchaindata=db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x0029},$targettokendata[$_SERVER{úŞ}{0x0029}])->find();
            if(empty($targetchaindata)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x00043};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            if ($targetchaindata[$_SERVER{úŞ}{0x000035}] == 0) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $targetchaindata[$_SERVER{úŞ}{0x00002b}] . $_SERVER{úŞ}{0x041};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            $neworderdata[$_SERVER{úŞ}[0x0007a]] = $targetchaindata[$_SERVER{úŞ}{0x0029}];
            $neworderdata[$_SERVER{úŞ}{0x00007b}]=$targetchaindata[$_SERVER{úŞ}{0x00002b}];


            $neworderdata[$_SERVER{úŞ}[0x000007c]] = $targettokendata[$_SERVER{úŞ}{0x00025}];

            
            $exchangedata = db($_SERVER{úŞ}{0x000001d})->where(array($_SERVER{úŞ}[0x00020] => $data[$_SERVER{úŞ}{0x023}], $_SERVER{úŞ}[0x002e] => $data[$_SERVER{úŞ}{0x0002f}]))
                ->find();

            if (empty($exchangedata)) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x000044];
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            if ($exchangedata[$_SERVER{úŞ}[0x01e]] == 0) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0000045};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            $neworderdata[$_SERVER{úŞ}{0x07d}]=$exchangedata[$_SERVER{úŞ}{0x07d}];
            $charge = $data[$_SERVER{úŞ}[0x000062]];

            if ($exchangedata[$_SERVER{úŞ}[0x01e]] == 0x001) {

                if ($charge < $exchangedata[$_SERVER{úŞ}[0x046]]) {
                    $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                    $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                    $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0047};
                    $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
                }
                if ($charge > $exchangedata[$_SERVER{úŞ}[0x00048]]) {
                    $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                    $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                    $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x000049};
                    $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
                }

                $beginToday = mktime(0, 0, 0, date($_SERVER{úŞ}[0x000004a]), date($_SERVER{úŞ}{0x04b}), date($_SERVER{úŞ}[0x004c]));
                $endToday = mktime(0, 0, 0, date($_SERVER{úŞ}[0x000004a]), date($_SERVER{úŞ}{0x04b}) + 0x001, date($_SERVER{úŞ}[0x004c])) - 0x001;

                $daynmnbers = db($_SERVER{úŞ}{0x0004d})->where(array($_SERVER{úŞ}[0x00004e] => $data[$_SERVER{úŞ}{0x0015}], $_SERVER{úŞ}{0x000004f} => $data[$_SERVER{úŞ}{0x023}], $_SERVER{úŞ}[0x050] => $data[$_SERVER{úŞ}{0x0002f}]))
                    ->where($_SERVER{úŞ}{0x0051}, $_SERVER{úŞ}[0x00052], [$beginToday, $endToday])->count($_SERVER{úŞ}{0x000053});


                if ($daynmnbers >= $exchangedata[$_SERVER{úŞ}[0x007e]]) {
                    $feedback[$_SERVER{úŞ}{0x05}]=0x003ee;
                    $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007f};
                    $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x000080];
                    $this->response($_SERVER{úŞ}[0x0a], 0x0000193, $feedback);
                }
                if ($daynmnbers >= $exchangedata[$_SERVER{úŞ}[0x0000054]]) {
                    $fee = $charge * $exchangedata[$_SERVER{úŞ}{0x055}] / 0x03e8;
                    $fee = sprintf($_SERVER{úŞ}[0x0056], $fee);
                }
                if ($daynmnbers < $exchangedata[$_SERVER{úŞ}[0x0000054]]) {
                    $fee = $exchangedata[$_SERVER{úŞ}{0x00057}];
                }
                $feeback=$fee;
                if ($originalchaindata[$_SERVER{úŞ}{0x0000081}] == 0x001) {
                    if($data[$_SERVER{úŞ}[0x064]]==0){
                        $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                        $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                        $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x082];
                        $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
                    }
                    if(empty($data[$_SERVER{úŞ}[0x0000068]])){
                        $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                        $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                        $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0083};
                        $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
                    }

                }


                $pos = strrpos($charge,$_SERVER{úŞ}{0x0000059});

                if ($pos !== !1 ) {
                    $changearr=explode($_SERVER{úŞ}[0x05a], $charge);
                    if(strlen($changearr[0x001])>$originaltokendata[$_SERVER{úŞ}[0x0000022]]){
                        $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x005b};
                        $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
                    }
                }

                $accountcharge = ($charge - $fee) * $exchangedata[$_SERVER{úŞ}[0x000058]];

                $poss = strpos($accountcharge,$_SERVER{úŞ}{0x0000059});

                if ($poss !== !1 ) {
                    $accountchangearr=explode($_SERVER{úŞ}[0x05a], $accountcharge);
                    if(strlen($accountchangearr[0x001])>$targettokendata[$_SERVER{úŞ}[0x0000022]]){
                        if($targettokendata[$_SERVER{úŞ}[0x0000022]]==0){
                            $accountcharge=floor($accountcharge);
                        }
                        else{
                            $accountchangearr[0x001]=substr($accountchangearr[0x001],0,$targettokendata[$_SERVER{úŞ}[0x0000022]]);
                                                        $accountcharge = implode($_SERVER{úŞ}[0x05a], $accountchangearr);
                        }

                    }
                }
                $charge_original=$charge;

                $accountcharge_goal=$accountcharge;

                if($accountcharge<=0){
                    $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x00084];
                    $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
                }
                function sctonum($num, $double = 0){
                    if(!1 !== stripos($num, $_SERVER{úŞ}{0x000085})){
                        $a = explode($_SERVER{úŞ}{0x000085},strtolower($num));
                        return bcmul($a[0], bcpow(0x0a, $a[0x001], $double), $double);
                    }
                }


                $charge_precision=$charge*pow(0x0a,$originaltokendata[$_SERVER{úŞ}[0x0000022]]);

                $accountcharge_precision=$accountcharge*pow(0x0a,$targettokendata[$_SERVER{úŞ}[0x0000022]]);

                $cha = strpos($charge_precision,$_SERVER{úŞ}[0x0000086]);

                if ($cha !== !1 ) {

                    $charge_precision=sctonum($charge_precision);
                }
                $acc = strpos($accountcharge_precision,$_SERVER{úŞ}[0x0000086]);
                if ($acc !== !1 ) {
                                        $accountcharge_precision=sctonum($accountcharge_precision);
                }

                if($originaltokendata[$_SERVER{úŞ}[0x0000022]]>0){

                    $pos = strpos($charge,$_SERVER{úŞ}{0x0000059});
                    if ($pos === !1) {
                        $charge=$charge.$_SERVER{úŞ}{0x0000059};
                    }
                    $chargelength=$originaltokendata[$_SERVER{úŞ}[0x0000022]];
                    $charge_prec=dispRepair($charge,$chargelength,$_SERVER{úŞ}{0x087},0);

                }
                if($originaltokendata[$_SERVER{úŞ}[0x0000022]]==0){
                    $charge_prec=$charge;
                }
                if($targettokendata[$_SERVER{úŞ}[0x0000022]]>0){

                    $poss = strpos($accountcharge,$_SERVER{úŞ}{0x0000059});
                    if ($poss === !1) {
                        $accountcharge=$accountcharge.$_SERVER{úŞ}{0x0000059};
                    }

                    $accountchargelength=$targettokendata[$_SERVER{úŞ}[0x0000022]];

                    $accountcharge_prec=dispRepair($accountcharge,$accountchargelength,$_SERVER{úŞ}{0x087},0);

                }
                if($targettokendata[$_SERVER{úŞ}[0x0000022]]==0){
                    $accountcharge_prec=$accountcharge;
                }
                if ($originalchaindata[$_SERVER{úŞ}{0x0000081}] == 0x001) {
                    $ordercommondata = db($_SERVER{úŞ}{0x0004d})->where(array($_SERVER{úŞ}[0x006a] => $data[$_SERVER{úŞ}[0x0000068]], $_SERVER{úŞ}[0x0088] => $charge_precision))->where($_SERVER{úŞ}{0x00089},0x001)
                        ->where($_SERVER{úŞ}[0x00008a],$_SERVER{úŞ}[0x00052],[0,0x001])
                        ->find();

                    if ($ordercommondata) {

                        $feedback[$_SERVER{úŞ}{0x05}] = 0x0003ea;

                        $feedback[$_SERVER{úŞ}[0x006]] = $_SERVER{úŞ}{0x0000d};

                        $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x000008b};

                        $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);

                    }
                }



            }

            $neworderdata[$_SERVER{úŞ}[0x08c]] = ordernum();

            $neworderdata[$_SERVER{úŞ}[0x00004e]] = $data[$_SERVER{úŞ}{0x0015}];

            $neworderdata[$_SERVER{úŞ}{0x0051}] = time();

            $neworderdata[$_SERVER{úŞ}{0x00089}] = 0;

            $neworderdata[$_SERVER{úŞ}[0x0088]] = $charge_precision;

            $neworderdata[$_SERVER{úŞ}{0x008d}] = $fee;

            $neworderdata[$_SERVER{úŞ}[0x0008e]] = $data[$_SERVER{úŞ}[0x0060]];

            $neworderdata[$_SERVER{úŞ}{0x00089}] = 0x001;

            $neworderdata[$_SERVER{úŞ}{0x00008f}] = $accountcharge_precision;

            $neworderdata[$_SERVER{úŞ}[0x0000090]] = $charge_prec;

            $neworderdata[$_SERVER{úŞ}{0x091}] = $accountcharge_prec;

            $neworderdata[$_SERVER{úŞ}[0x0092]]=0;

            $neworderdata[$_SERVER{úŞ}[0x00008a]]=0;


            $result = db($_SERVER{úŞ}{0x0004d})->insertGetId($neworderdata);


            if ($result) {
                $neworderdatalog[$_SERVER{úŞ}{0x000053}] = $result;
                $neworderdatalog[$_SERVER{úŞ}{0x00093}] = $data[$_SERVER{úŞ}{0x0015}];
                $neworderdatalog[$_SERVER{úŞ}[0x000094]] = time();
                $neworderdatalog[$_SERVER{úŞ}{0x0000095}] = $_SERVER{úŞ}[0x096];
                $neworderdatalog[$_SERVER{úŞ}{0x0097}] = 0x001;
                db($_SERVER{úŞ}[0x00098])->insert($neworderdatalog);
                $feedback[$_SERVER{úŞ}{0x000053}] = $result;
                $feedback[$_SERVER{úŞ}{0x000099}] = $feeback;
                $feedback[$_SERVER{úŞ}[0x000009a]] = $daynmnbers + 0x001;
                $feedback[$_SERVER{úŞ}{0x09b}] = $charge_original;
                $feedback[$_SERVER{úŞ}[0x009c]] = $accountcharge_goal;
                $feedback[$_SERVER{úŞ}{0x0009d}] = $neworderdata[$_SERVER{úŞ}[0x08c]];
                $feedback[$_SERVER{úŞ}[0x00009e]]=$account_name_one;
                if ($originalchaindata[$_SERVER{úŞ}{0x0000081}] == 0) {
                    $feedback[$_SERVER{úŞ}{0x000009f}] = $_SERVER{úŞ}[0x0a0].$neworderdata[$_SERVER{úŞ}[0x08c]];
                }

                $this->response($_SERVER{úŞ}[0x00016], 0x0c8, $feedback);
            } else {
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x00a1};

                $this->response($_SERVER{úŞ}[0x0a], 0x01f4, $feedback);

            }
        }
        else{
            $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];

            $this->response($_SERVER{úŞ}[0x0a],0x0000193,$json);

        }


    }

    
    public  function systemfeedback(){
        if(request()->isPost()) {
            $this->authentication();
            $data = input($_SERVER{úŞ}{0x05f});
            $data[$_SERVER{úŞ}{0x0015}]=Request::instance()->header($_SERVER{úŞ}{0x0015});
            $feedback=db($_SERVER{úŞ}[0x000a2])->where($_SERVER{úŞ}{0x0015},$data[$_SERVER{úŞ}{0x0015}])->order($_SERVER{úŞ}{0x0000a3},$_SERVER{úŞ}[0x00000a4])->find();
            if($feedback){
                if(time()-$feedback[$_SERVER{úŞ}{0x00011}]<0x0258){
                    $json[$_SERVER{úŞ}{0x05}]=0x03ed;
                    $json[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}[0x0000018];
                    $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}{0x0a5};
                    $this->response($_SERVER{úŞ}[0x0a],0x0000193,$json);
                }
            }
            $appendix=$data[$_SERVER{úŞ}[0x00a6]];

            $content=input($_SERVER{úŞ}{0x000a7});

            if(empty($content)){
                $json[$_SERVER{úŞ}{0x05}]=0x003e9;
                $json[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x0000a8];
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$json);
            }
            if(strlen($content)>0x064){
                $json[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $json[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}{0x00000a9};
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$json);
            }
            if(count($appendix)>0x05){
                $json[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $json[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x0aa];
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$json);
            }
            foreach ($appendix  as  $key=>$val){
                $newfeedback[$_SERVER{úŞ}[0x00a6].$key]=saveBase64Image($val);
            }
            $newfeedback[$_SERVER{úŞ}{0x00ab}]=$content;
            $newfeedback[$_SERVER{úŞ}{0x00011}]=time();

            $newfeedback[$_SERVER{úŞ}{0x0015}]=$data[$_SERVER{úŞ}{0x0015}];

            $re=db($_SERVER{úŞ}[0x000a2])->insert($newfeedback);

            if($re){
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x000ac];
                $this->response($_SERVER{úŞ}[0x00016],0x0c8,$json);
            }
            else{
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x001a];
                $this->response($_SERVER{úŞ}[0x0a],0x01f4,$json);
            }
        }
        else{
            $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];

            $this->response($_SERVER{úŞ}{0x0000ad},0x0000193,$json);

        }
    }
    

    
    public  function orderlist(){
        if(request()->isGet()) {
            $this->authentication();
            $data=input($_SERVER{úŞ}[0x00000ae]);
            $page=$data[$_SERVER{úŞ}{0x0af}];
            $pagenum=$data[$_SERVER{úŞ}[0x00b0]];
            $id=Request::instance()->header($_SERVER{úŞ}{0x0015});
            $where=[];
            $pattern = $_SERVER{úŞ}[0x000c];
            if(!empty($data[$_SERVER{úŞ}{0x000b1}])){
                if(preg_match($pattern,$data[$_SERVER{úŞ}{0x000b1}])==!1 || strlen($data[$_SERVER{úŞ}{0x000b1}])!=0x00020){
                    $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                    $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                    $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x0000b2];
                    $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
                }
                $where[$_SERVER{úŞ}[0x000076]]=$data[$_SERVER{úŞ}{0x000b1}];
            }
            if(!empty($data[$_SERVER{úŞ}{0x00000b3}])){
                if(preg_match($pattern,$data[$_SERVER{úŞ}{0x00000b3}])==!1 || strlen($data[$_SERVER{úŞ}{0x00000b3}])!=0x00020){
                    $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                    $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                    $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x037};
                    $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
                }
                $where[$_SERVER{úŞ}{0x000004f}]=$data[$_SERVER{úŞ}{0x00000b3}];
            }
            if(!empty($data[$_SERVER{úŞ}[0x0b4]])){
                if(preg_match($pattern,$data[$_SERVER{úŞ}[0x0b4]])==!1 || strlen($data[$_SERVER{úŞ}[0x0b4]])!=0x00020){
                    $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                    $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                    $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x00b5};
                    $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
                }
                $where[$_SERVER{úŞ}[0x0007a]]=$data[$_SERVER{úŞ}[0x0b4]];
            }
            if(!empty($data[$_SERVER{úŞ}[0x000b6]])){
                if(preg_match($pattern,$data[$_SERVER{úŞ}[0x000b6]])==!1 || strlen($data[$_SERVER{úŞ}[0x000b6]])!=0x00020){
                    $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                    $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                    $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x00039};
                    $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
                }
                $where[$_SERVER{úŞ}[0x050]]=$data[$_SERVER{úŞ}[0x000b6]];
            }


            $pattern = $_SERVER{úŞ}{0x0000b7};

            if (preg_match($pattern, $page)==!1 || preg_match($pattern, $pagenum)==!1){
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00000b8];
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$json);
            }
            $arr=[];
            $offset=($page-0x001)*$pagenum;

            $total=db($_SERVER{úŞ}{0x0004d})->where($where)->where(array($_SERVER{úŞ}[0x00004e]=>$id))->where($_SERVER{úŞ}{0x00089},$_SERVER{úŞ}{0x0b9},-0x001)->count($_SERVER{úŞ}{0x000053});

            $orderdata=db($_SERVER{úŞ}{0x0004d})->where($where)->where(array($_SERVER{úŞ}[0x00004e]=>$id))->where($_SERVER{úŞ}{0x00089},$_SERVER{úŞ}{0x0b9},-0x001)-> field($_SERVER{úŞ}[0x00ba])->order($_SERVER{úŞ}{0x0051},$_SERVER{úŞ}[0x00000a4])->limit($offset,$pagenum)->select();

            foreach ($orderdata  as  $val){
                $originalchain=db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x0029},$val[$_SERVER{úŞ}[0x000076]])->find();

                $goalchain=db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x0029},$val[$_SERVER{úŞ}[0x0007a]])->find();

                $originaltoken=db($_SERVER{úŞ}[0x014])->where($_SERVER{úŞ}{0x001f},$val[$_SERVER{úŞ}{0x000004f}])->find();

                $goaltoken=db($_SERVER{úŞ}[0x014])->where($_SERVER{úŞ}{0x001f},$val[$_SERVER{úŞ}[0x050]])->find();

                $val[$_SERVER{úŞ}[0x000002c]]=$originalchain[$_SERVER{úŞ}{0x02d}];

                $val[$_SERVER{úŞ}{0x0033}]=$goalchain[$_SERVER{úŞ}{0x02d}];

                $val[$_SERVER{úŞ}[0x000026]]=$originaltoken[$_SERVER{úŞ}{0x0000027}];

                $val[$_SERVER{úŞ}{0x0000031}]=$goaltoken[$_SERVER{úŞ}{0x0000027}];

                unset($val[$_SERVER{úŞ}[0x000076]]);

                unset($val[$_SERVER{úŞ}[0x0007a]]);

                unset($val[$_SERVER{úŞ}{0x000004f}]);

                unset($val[$_SERVER{úŞ}[0x050]]);

                $arr[]=$val;


            }
            $json[$_SERVER{úŞ}{0x000bb}]=$total;

            $json[$_SERVER{úŞ}[0x0000bc]]=$arr;

            $this->response($_SERVER{úŞ}[0x00016],0x0c8,$json);

        }
        else{
            $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];

            $this->response($_SERVER{úŞ}[0x0a],0x0000193,$json);

        }

    }
    
    public  function orderdetails($orderid){
        if(request()->isGet()) {

            if(empty($orderid)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}{0x00000bd};
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$json);
            }
            $pattern = $_SERVER{úŞ}{0x000003b};
            if (preg_match($pattern, $orderid)==!1){
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x0be];
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$json);
            }
            $userid=Request::instance()->header($_SERVER{úŞ}{0x0015});
            $order=db($_SERVER{úŞ}{0x0004d})->where(array($_SERVER{úŞ}[0x00004e]=>$userid,$_SERVER{úŞ}{0x000053}=>$orderid))->where($_SERVER{úŞ}{0x00089},$_SERVER{úŞ}{0x0b9},-0x001)
                ->field($_SERVER{úŞ}{0x00bf})
                ->find();

            if(empty($order)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}[0x000c0];
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}{0x0000c1};
                $this->response($_SERVER{úŞ}[0x0a],0x00000194,$json);
            }
            $originalchain=db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x0029},$order[$_SERVER{úŞ}[0x000076]])->find();
            $goalchain=db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x0029},$order[$_SERVER{úŞ}[0x0007a]])->find();

            $originaltoken=db($_SERVER{úŞ}[0x014])->where($_SERVER{úŞ}{0x001f},$order[$_SERVER{úŞ}{0x000004f}])->find();

            $goaltoken=db($_SERVER{úŞ}[0x014])->where($_SERVER{úŞ}{0x001f},$order[$_SERVER{úŞ}[0x050]])->find();

            $order[$_SERVER{úŞ}[0x000002c]]=$originalchain[$_SERVER{úŞ}{0x02d}];

            $order[$_SERVER{úŞ}{0x0033}]=$goalchain[$_SERVER{úŞ}{0x02d}];

            $order[$_SERVER{úŞ}[0x000026]]=$originaltoken[$_SERVER{úŞ}{0x0000027}];

            $order[$_SERVER{úŞ}{0x0000031}]=$goaltoken[$_SERVER{úŞ}{0x0000027}];

            unset($order[$_SERVER{úŞ}[0x050]]);
unset($order[$_SERVER{úŞ}[0x000076]]);
unset($order[$_SERVER{úŞ}[0x0007a]]);
unset($order[$_SERVER{úŞ}{0x000004f}]);


            $this->response($_SERVER{úŞ}[0x00016],0x0c8,$order);

        }
        else{
            $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];

            $this->response($_SERVER{úŞ}[0x0a],0x0000193,$json);

        }

    }
    
    public  function orderdel($orderid){
        if(request()->isDelete()) {
            $this->authentication();

            $pattern = $_SERVER{úŞ}{0x000003b};
            if (preg_match($pattern, $orderid)==!1){
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00000c2]]=$_SERVER{úŞ}[0x0be];
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$feedback);
            }

            $userid=Request::instance()->header($_SERVER{úŞ}{0x0015});
            $res=db($_SERVER{úŞ}{0x0004d})->where(array($_SERVER{úŞ}[0x00004e]=>$userid,$_SERVER{úŞ}{0x000053}=>$orderid))->where($_SERVER{úŞ}{0x00089},$_SERVER{úŞ}{0x0b9},-0x001)->find();

            if(empty($res)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}[0x000c0];
                $feedback[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}{0x0c3};
                $this->response($_SERVER{úŞ}[0x0a],0x00000194,$feedback);
            }
            $re=db($_SERVER{úŞ}{0x0004d})->where(array($_SERVER{úŞ}[0x00004e]=>$userid,$_SERVER{úŞ}{0x000053}=>$orderid))
                ->update([$_SERVER{úŞ}{0x00089}=>-0x001]);
            if($re){
                $neworderdatalog[$_SERVER{úŞ}{0x000053}] = $orderid;
                $neworderdatalog[$_SERVER{úŞ}{0x00093}] = $userid;
                $neworderdatalog[$_SERVER{úŞ}[0x000094]] = time();
                $neworderdatalog[$_SERVER{úŞ}{0x0000095}] = $_SERVER{úŞ}[0x00c4];
                $neworderdatalog[$_SERVER{úŞ}{0x0097}] = 0x001;
                db($_SERVER{úŞ}[0x00098])->insert($neworderdatalog);
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}{0x000c5};
                $this->response($_SERVER{úŞ}[0x00016],0x0c8,$json);
            }
            else{
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x0000c6];
                $this->response($_SERVER{úŞ}[0x0a],0x01f4,$json);
            }
        }
        else{
            $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];

            $this->response($_SERVER{úŞ}[0x0a],0x0000193,$json);

        }
    }
    
    public  function ordercancel($orderid,$status){
        if(request()->isPut()) {

            $this->authentication();
            $pattern = $_SERVER{úŞ}{0x000003b};
            if (preg_match($pattern,$orderid)==!1){
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x0be];
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$feedback);
            }

            if($status!=$_SERVER{úŞ}{0x00000c7} && $status!=$_SERVER{úŞ}[0x0c8]){
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}{0x00c9};
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$feedback);
            }
            $userid=Request::instance()->header($_SERVER{úŞ}{0x0015});
            $res=db($_SERVER{úŞ}{0x0004d})->where(array($_SERVER{úŞ}[0x00004e]=>$userid,$_SERVER{úŞ}{0x000053}=>$orderid))
                ->where($_SERVER{úŞ}{0x00089},$_SERVER{úŞ}{0x0b9},-0x001)->find();

            if(empty($res)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}[0x000c0];
                $feedback[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x000ca];
                $this->response($_SERVER{úŞ}[0x0a],0x00000194,$feedback);
            }
            if($res[$_SERVER{úŞ}{0x00089}]==$status){
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}{0x0000cb};
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$feedback);
            }
            $re=db($_SERVER{úŞ}{0x0004d})->where(array($_SERVER{úŞ}[0x00004e]=>$userid,$_SERVER{úŞ}{0x000053}=>$orderid))
                ->update([$_SERVER{úŞ}{0x00089}=>$status]);
            if($re){
                $neworderdatalog[$_SERVER{úŞ}{0x000053}] = $orderid;
                $neworderdatalog[$_SERVER{úŞ}{0x00093}] = $userid;
                $neworderdatalog[$_SERVER{úŞ}[0x000094]] = time();
                $neworderdatalog[$_SERVER{úŞ}{0x0000095}] = $_SERVER{úŞ}[0x00000cc];
                $neworderdatalog[$_SERVER{úŞ}{0x0097}] = 0x001;
                db($_SERVER{úŞ}[0x00098])->insert($neworderdatalog);
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}{0x0cd};
                $json[$_SERVER{úŞ}[0x00ce]]=$status;
                $this->response($_SERVER{úŞ}[0x00016],0x0c8,$json);
            }
            else{
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x001a];
                $this->response($_SERVER{úŞ}[0x0a],0x01f4,$json);
            }
        }
        else{
            $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];

            $this->response($_SERVER{úŞ}{0x0000ad},0x0000193,$json);

        }
    }

    
    public  function orderrecovery($orderid){
        if(request()->isPut()) {

            if(empty($orderid)){
                $json[$_SERVER{úŞ}[0x00000c2]]=$_SERVER{úŞ}{0x000cf};
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$json);
            }
            $pattern = $_SERVER{úŞ}{0x000003b};
            if (preg_match($pattern, $orderid)==!1){
                $json[$_SERVER{úŞ}[0x00000c2]]=$_SERVER{úŞ}[0x0be];
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$json);
            }

            $userid=Request::instance()->header($_SERVER{úŞ}{0x0015});
            $res=db($_SERVER{úŞ}{0x0004d})->where(array($_SERVER{úŞ}[0x00004e]=>$userid,$_SERVER{úŞ}{0x000053}=>$orderid,$_SERVER{úŞ}{0x00089}=>0x001))->find();

            if(empty($res)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}[0x000c0];
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x000ca];
                $this->response($_SERVER{úŞ}[0x0a],0x00000194,$json);
            }
            $re=db($_SERVER{úŞ}{0x0004d})->where(array($_SERVER{úŞ}[0x00004e]=>$userid,$_SERVER{úŞ}{0x000053}=>$orderid,$_SERVER{úŞ}{0x00089}=>0))
                ->update([$_SERVER{úŞ}{0x00089}=>0x001]);
            if($re){
                $neworderdatalog[$_SERVER{úŞ}{0x000053}] = $orderid;
                $neworderdatalog[$_SERVER{úŞ}{0x00093}] = $userid;
                $neworderdatalog[$_SERVER{úŞ}[0x000094]] = time();
                $neworderdatalog[$_SERVER{úŞ}{0x0000095}] = $_SERVER{úŞ}[0x0000d0];
                $neworderdatalog[$_SERVER{úŞ}{0x0097}] = 0x001;
                db($_SERVER{úŞ}[0x00098])->insert($neworderdatalog);
                $json[$_SERVER{úŞ}[0x00000c2]]=$_SERVER{úŞ}{0x00000d1};
                $this->response($_SERVER{úŞ}[0x00016],0x0c8,$json);
            }
            else{
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x001a];
                $this->response($_SERVER{úŞ}[0x0d2],0x01f4,$json);
            }
        }
        else{
            $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];

            $this->response($_SERVER{úŞ}{0x0000ad},0x0000193,$json);


        }
    }




    
    public  function chainlist(){
        if(request()->isGet()) {
            $this->authentication();
            $chaindata = db($_SERVER{úŞ}[0x028])->where(array($_SERVER{úŞ}{0x000035} => 0x001))
                ->field($_SERVER{úŞ}{0x00d3})->select();

            $this->response($_SERVER{úŞ}[0x00016], 0x0c8, $chaindata);
        }
        else{
            $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];
            $this->response($_SERVER{úŞ}[0x0a],0x0190,$json);
        }
    }
    
    public  function chaintokenlist($chainid){
        if(request()->isGet()){
            $this->authentication();
                        if(empty($chainid)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $feedback[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x000d4];
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$feedback);
            }
            $pattern = $_SERVER{úŞ}[0x000c];
            if (preg_match($pattern, $chainid)==!1){
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00000b8];
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$feedback);
            }
            if(strlen($chainid)!=0x00020){
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00000b8];
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$feedback);
            }
            $chaintoken=db($_SERVER{úŞ}[0x014])->where(array($_SERVER{úŞ}{0x0029}=>$chainid,$_SERVER{úŞ}[0x00034]=>0x001))
                ->field($_SERVER{úŞ}{0x0000d5})->select();
            $this->response($_SERVER{úŞ}[0x00016],0x0c8,$chaintoken);

        }
        else{
            $feedback[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];

            $this->response($_SERVER{úŞ}[0x0a],0x0000193,$feedback);

        }
    }
    public  function ordernums(){

        dump(time());

        dump($_SERVER{úŞ}[0x00000d6].date($_SERVER{úŞ}{0x0d7},time()));


    }

    

    
    public  function exchangeProcess($orderid){
        if(request()->isGet()) {
            $this->authentication();
            $data[$_SERVER{úŞ}{0x0015}]=Request::instance()->header($_SERVER{úŞ}{0x0015});
            $data[$_SERVER{úŞ}[0x00d8]]=$orderid;
            $pattern = $_SERVER{úŞ}{0x000003b};
            if (preg_match($pattern, $data[$_SERVER{úŞ}[0x00d8]])==!1){
                $json[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $json[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $json[$_SERVER{úŞ}[0x00000c2]]=$_SERVER{úŞ}[0x0be];
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$json);
            }
            $myorder=db($_SERVER{úŞ}{0x0004d})->where(array($_SERVER{úŞ}[0x00004e]=>$data[$_SERVER{úŞ}{0x0015}],$_SERVER{úŞ}{0x000053}=>$data[$_SERVER{úŞ}[0x00d8]]))->find();
            if(empty($myorder)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}[0x000c0];
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x000ca];
                $this->response($_SERVER{úŞ}[0x0a],0x00000194,$json);
            }
            $order=db($_SERVER{úŞ}[0x00098])->where(array($_SERVER{úŞ}{0x000053}=>$data[$_SERVER{úŞ}[0x00d8]]))
                ->field($_SERVER{úŞ}{0x000d9})->order($_SERVER{úŞ}[0x0000da],$_SERVER{úŞ}{0x00000db})->select();
            $this->response($_SERVER{úŞ}[0x00016],0x0c8,$order);

        }
        else{
            $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];

            $this->response($_SERVER{úŞ}{0x0000ad},0x0000193,$json);

        }
    }
    public  function rule1()
    {
        $arr=[];

        $token = db($_SERVER{úŞ}{0x000001d})->where($_SERVER{úŞ}[0x01e], 0x001)->Distinct(!0)->field($_SERVER{úŞ}[0x00020])->select();

                foreach ($token  as  $v) {

            $original_chain = db($_SERVER{úŞ}[0x014])->alias($_SERVER{úŞ}[0x0dc])->join($_SERVER{úŞ}{0x00dd}, $_SERVER{úŞ}[0x000de])
                ->where($_SERVER{úŞ}{0x0000df}, $v[$_SERVER{úŞ}[0x00020]])->field($_SERVER{úŞ}[0x00000e0])->find();

            $data[$_SERVER{úŞ}[0x000002c]] = $original_chain[$_SERVER{úŞ}{0x02d}];

            $data[$_SERVER{úŞ}[0x000026]] = $original_chain[$_SERVER{úŞ}{0x0000027}];

            $data[$_SERVER{úŞ}{0x023}] = $original_chain[$_SERVER{úŞ}{0x001f}];

            if($original_chain[$_SERVER{úŞ}[0x00034]]==0 || $original_chain[$_SERVER{úŞ}{0x000035}]==0){
                continue;
            }
            $arr[] = $data;

        }
        foreach ($arr  as  $v) {

            $tokenrule = db($_SERVER{úŞ}{0x000001d})->where($_SERVER{úŞ}[0x00020], $v[$_SERVER{úŞ}{0x023}])->select();

            foreach ($tokenrule  as  $item) {
                $goal_chain = db($_SERVER{úŞ}[0x014])->alias($_SERVER{úŞ}[0x0dc])->join($_SERVER{úŞ}{0x00dd}, $_SERVER{úŞ}[0x000de])
                    ->where($_SERVER{úŞ}{0x0000df}, $item[$_SERVER{úŞ}[0x002e]])->field($_SERVER{úŞ}[0x00000e0])->find();

                $goaldata[$_SERVER{úŞ}{0x0033}] = $goal_chain[$_SERVER{úŞ}{0x02d}];

                $goaldata[$_SERVER{úŞ}{0x0000031}] = $goal_chain[$_SERVER{úŞ}{0x0000027}];

                $goaldata[$_SERVER{úŞ}{0x0002f}] = $goal_chain[$_SERVER{úŞ}{0x001f}];

                if($goal_chain[$_SERVER{úŞ}[0x00034]]==0 || $goal_chain[$_SERVER{úŞ}{0x000035}]==0){
                    continue;
                }
                $v[$_SERVER{úŞ}{0x0e1}][]=$goaldata;
            }
            if(empty($v[$_SERVER{úŞ}{0x0e1}])){
                continue;
            }
            $arrs[]=$v;
        }
        dump($arrs);

    }
    public  function rule2(){
        $ruledata=db($_SERVER{úŞ}{0x000001d})->where(array($_SERVER{úŞ}[0x01e]=>0x001))->select();

        $newrule=[];

        foreach ($ruledata  as  $key) {
            $originaltokendata = db($_SERVER{úŞ}[0x014])->where($_SERVER{úŞ}{0x001f}, $key[$_SERVER{úŞ}[0x00020]])->find();


            $newdata[$_SERVER{úŞ}{0x023}] = $key[$_SERVER{úŞ}[0x00020]];

                                    $originalchaindata = db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x0029}, $originaltokendata[$_SERVER{úŞ}{0x0029}])->find();

                                    
            $goaltokendata = db($_SERVER{úŞ}[0x014])->where($_SERVER{úŞ}{0x001f}, $key[$_SERVER{úŞ}[0x002e]])->find();

            $newdata[$_SERVER{úŞ}{0x0002f}] = $key[$_SERVER{úŞ}[0x002e]];

                                    $goalchaindata = db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x0029}, $goaltokendata[$_SERVER{úŞ}{0x0029}])->find();

                                                $newdata[$_SERVER{úŞ}[0x00e2]]=$originalchaindata[$_SERVER{úŞ}{0x00002b}].$_SERVER{úŞ}{0x000e3}.$originaltokendata[$_SERVER{úŞ}{0x00025}].$_SERVER{úŞ}{0x000e3} .$goalchaindata[$_SERVER{úŞ}{0x00002b}].$_SERVER{úŞ}{0x000e3}.$goaltokendata[$_SERVER{úŞ}{0x0000027}];

            if ($originaltokendata[$_SERVER{úŞ}[0x00034]] == 0 || $originalchaindata[$_SERVER{úŞ}{0x000035}] == 0 || $goaltokendata[$_SERVER{úŞ}[0x00034]] == 0
                || $goalchaindata[$_SERVER{úŞ}{0x000035}] == 0) {
                continue;
            }

            $newrule[$_SERVER{úŞ}[0x0000e4]][] = $newdata;

        }
        $chain=db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x000035},0x001)->select();

        foreach ($chain  as  $v){
            $arr[$_SERVER{úŞ}{0x00000e5}]=$v[$_SERVER{úŞ}{0x02d}];

            $arr[$_SERVER{úŞ}[0x0e6]]=$v[$_SERVER{úŞ}{0x00002b}];

            $arr[$_SERVER{úŞ}{0x00e7}]=$v[$_SERVER{úŞ}{0x0029}];


            $arrs[]=$arr;

        }
        foreach ($arrs  as  $v){
            $token=db($_SERVER{úŞ}[0x014])->where($_SERVER{úŞ}[0x00034],0x001)->where($_SERVER{úŞ}{0x0029},$v[$_SERVER{úŞ}{0x00e7}])->select();

            foreach ($token  as  $val){
                $tokenone[$_SERVER{úŞ}{0x0000027}]=$val[$_SERVER{úŞ}{0x0000027}];

                $tokenone[$_SERVER{úŞ}{0x001f}]=$val[$_SERVER{úŞ}{0x001f}];

                $tokenone[$_SERVER{úŞ}{0x00025}]=$val[$_SERVER{úŞ}{0x00025}];

                $v[$_SERVER{úŞ}[0x014]][]=$tokenone;

            }
            $newrule[$_SERVER{úŞ}[0x000e8]][]=$v;

        }

        $this->response($_SERVER{úŞ}[0x00016],0x0c8,$newrule);



    }
    public  function rulecheck($original_token_id,$goal_token_id){
        $this->authentication();

        if(request()->isGet()){
            $originaldata=db($_SERVER{úŞ}[0x014])->alias($_SERVER{úŞ}[0x0dc])->join($_SERVER{úŞ}{0x0000e9},$_SERVER{úŞ}[0x00000ea])
                ->where($_SERVER{úŞ}{0x0000df},$original_token_id)->field($_SERVER{úŞ}{0x0eb})->find();
            if($originaldata[$_SERVER{úŞ}[0x00034]]==0){
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x00ec];
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$feedback);
            }
            if($originaldata[$_SERVER{úŞ}{0x000035}]==0){
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x000ed};
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$feedback);
            }
            $goaldata=db($_SERVER{úŞ}[0x014])->alias($_SERVER{úŞ}[0x0dc])->join($_SERVER{úŞ}{0x0000e9},$_SERVER{úŞ}[0x00000ea])
                ->where($_SERVER{úŞ}{0x0000df},$goal_token_id)->field($_SERVER{úŞ}{0x0eb})->find();
            if($goaldata[$_SERVER{úŞ}[0x00034]]==0){
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x0000ee];
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$feedback);
            }
            if($goaldata[$_SERVER{úŞ}{0x000035}]==0){
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x00000ef};
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$feedback);
            }
            $exchangerule=db($_SERVER{úŞ}{0x000001d})->where(array([$_SERVER{úŞ}[0x00020]=>$original_token_id,$_SERVER{úŞ}[0x002e]=> $goal_token_id]))->find();
            if (empty($exchangerule)) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x000044];
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            if ($exchangerule[$_SERVER{úŞ}[0x01e]] == 0) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0000045};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x0f0];
            $this->response($_SERVER{úŞ}[0x00016], 0x0c8, $json);

        }
        else{
            $feedback[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];

            $this->response($_SERVER{úŞ}[0x0a],0x0000193,$feedback);

        }
    }

    public  function nftOrder(){
        if(request()->isPost()) {
            $this->authentication();
            $data = input($_SERVER{úŞ}{0x05f});
            $data[$_SERVER{úŞ}{0x0015}]=Request::instance()->header($_SERVER{úŞ}{0x0015});
            $pattern = $_SERVER{úŞ}[0x000c];
            if (empty($data[$_SERVER{úŞ}{0x00f1}])) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x000f2];

                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }
            if(preg_match($pattern,$data[$_SERVER{úŞ}{0x00f1}])==!1 || strlen($data[$_SERVER{úŞ}{0x00f1}])!=0x00020){
                $feedback[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0000f3};

                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }

            if (empty($data[$_SERVER{úŞ}[0x00000f4]])) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0f5};
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }
            $neworderdata[$_SERVER{úŞ}[0x0008e]]=$data[$_SERVER{úŞ}[0x00000f4]];
            if (empty($data[$_SERVER{úŞ}[0x00f6]])) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x000f7};
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }
            $neworderdata[$_SERVER{úŞ}[0x006a]]=$data[$_SERVER{úŞ}[0x00f6]];
            if (empty($data[$_SERVER{úŞ}[0x0000f8]])) {
                $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x00000f9};
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }


            $neworderdata[$_SERVER{úŞ}[0x00004e]] = $data[$_SERVER{úŞ}{0x0015}];

            
            $nft_rule=db($_SERVER{úŞ}[0x0fa])->where($_SERVER{úŞ}{0x00fb},$data[$_SERVER{úŞ}{0x00f1}])->find();

                        if(empty($nft_rule)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x000fc];
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            if($nft_rule[$_SERVER{úŞ}{0x0000fd}]!=0x001){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x00000fe];
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            $neworderdata[$_SERVER{úŞ}{0x00fb}]=$data[$_SERVER{úŞ}{0x00f1}];
            
            $from_world=db($_SERVER{úŞ}{0x0ff})->where($_SERVER{úŞ}[0x00100],$nft_rule[$_SERVER{úŞ}{0x000101}])->find();


            if(empty($from_world)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x0000102];
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            $neworderdata[$_SERVER{úŞ}{0x00000103}]=$from_world[$_SERVER{úŞ}[0x0104]];
            $from_contract=db($_SERVER{úŞ}{0x00105})->where($_SERVER{úŞ}[0x000106],$from_world[$_SERVER{úŞ}[0x000106]])->find();

            if(empty($from_contract)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0000107};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            if($from_contract[$_SERVER{úŞ}[0x00000108]]!=0x001){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0109};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            $nftTokenCheck=db($_SERVER{úŞ}[0x0010a])->where($_SERVER{úŞ}{0x000004f},$data[$_SERVER{úŞ}[0x0000f8]])
                ->where($_SERVER{úŞ}{0x00010b},$from_contract[$_SERVER{úŞ}[0x000106]])->whereIn($_SERVER{úŞ}{0x00089},[0,0x001,0x0002])
                ->whereIn($_SERVER{úŞ}[0x00008a],[0,0x001])->find();
            if(!empty($nftTokenCheck)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003f1;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x000010c];
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }
            $neworderdata[$_SERVER{úŞ}{0x000004f}]=$data[$_SERVER{úŞ}[0x0000f8]];
            $neworderdata[$_SERVER{úŞ}{0x00010b}]=$from_contract[$_SERVER{úŞ}[0x000106]];

            $from_chain=db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x0029},$from_contract[$_SERVER{úŞ}{0x0029}])->find();

            if(empty($from_chain)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0000010d};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            if($from_chain[$_SERVER{úŞ}{0x000035}]!=0x001){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x010e];
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            $neworderdata[$_SERVER{úŞ}[0x000076]]=$from_chain[$_SERVER{úŞ}{0x0029}];
            $neworderdata[$_SERVER{úŞ}{0x0000077}]=$from_chain[$_SERVER{úŞ}{0x00002b}];


            
            $target_world=db($_SERVER{úŞ}{0x0ff})->where($_SERVER{úŞ}[0x00100],$nft_rule[$_SERVER{úŞ}{0x0010f}])->find();


            if(empty($target_world)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x0000102];
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            $neworderdata[$_SERVER{úŞ}[0x000110]]=$target_world[$_SERVER{úŞ}[0x0104]];
            $target_contract=db($_SERVER{úŞ}{0x00105})->where($_SERVER{úŞ}[0x000106],$target_world[$_SERVER{úŞ}[0x000106]])->find();

            if(empty($target_contract)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0000107};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            if($target_contract[$_SERVER{úŞ}[0x00000108]]!=0x001){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0109};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            $neworderdata[$_SERVER{úŞ}{0x0000111}]=$target_contract[$_SERVER{úŞ}[0x000106]];
            $target_chain=db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x0029},$target_contract[$_SERVER{úŞ}{0x0029}])->find();

            if(empty($target_chain)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x0000010d};
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            if($target_chain[$_SERVER{úŞ}{0x000035}]!=0x001){
                $feedback[$_SERVER{úŞ}{0x05}]=0x000003ec;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x003d};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}[0x010e];
                $this->response($_SERVER{úŞ}[0x0a], 0x00000194, $feedback);
            }
            $neworderdata[$_SERVER{úŞ}[0x0007a]]=$target_chain[$_SERVER{úŞ}{0x0029}];
            $neworderdata[$_SERVER{úŞ}{0x00007b}]=$target_chain[$_SERVER{úŞ}{0x00002b}];


                        $account=db($_SERVER{úŞ}[0x00000112])->alias($_SERVER{úŞ}[0x06e])->join($_SERVER{úŞ}{0x0113},$_SERVER{úŞ}[0x00114])
                ->where($_SERVER{úŞ}{0x000115},$from_world[$_SERVER{úŞ}[0x00100]])->where($_SERVER{úŞ}[0x0000116],0x001)->field($_SERVER{úŞ}{0x00000117})->select();


            foreach ($account  as  $value){
                $account_name_arr[]=$value[$_SERVER{úŞ}[0x0118]];

            }


            if(empty($account)){
                $feedback[$_SERVER{úŞ}{0x05}]=0x003e9;
                $feedback[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0007};
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x00075};
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $feedback);
            }

            $count_nmu=count($account_name_arr);
            if($count_nmu==0x001){
                $account_name_one=$account_name_arr[0];
            }
            else{
                $count_rand=rand(0,$count_nmu-0x001);
                $account_name_one=$account_name_arr[$count_rand];
            }
        $neworderdata[$_SERVER{úŞ}{0x00119}]=$account_name_one;
                    $neworderdata[$_SERVER{úŞ}[0x08c]] = ordernum();


            $neworderdata[$_SERVER{úŞ}{0x0051}] = time();


            $neworderdata[$_SERVER{úŞ}{0x00089}] = 0;


            $neworderdata[$_SERVER{úŞ}[0x0092]]=0;

            $neworderdata[$_SERVER{úŞ}[0x00008a]]=0;

            

            $result = db($_SERVER{úŞ}[0x0010a])->insertGetId($neworderdata);



            if ($result) {
                $neworderdatalog[$_SERVER{úŞ}[0x00011a]] = $result;
                $neworderdatalog[$_SERVER{úŞ}{0x00093}] = $data[$_SERVER{úŞ}{0x0015}];
                $neworderdatalog[$_SERVER{úŞ}[0x000094]] = time();
                $neworderdatalog[$_SERVER{úŞ}{0x0000095}] = $_SERVER{úŞ}{0x000011b};
                $neworderdatalog[$_SERVER{úŞ}{0x0097}] = 0x001;
                db($_SERVER{úŞ}[0x0000011c])->insert($neworderdatalog);
                                $feedback[$_SERVER{úŞ}{0x000053}] = $result;

                $feedback[$_SERVER{úŞ}{0x0009d}] = $neworderdata[$_SERVER{úŞ}[0x08c]];
                $feedback[$_SERVER{úŞ}[0x00009e]]=$account_name_one;


                $this->response($_SERVER{úŞ}[0x00016], 0x0c8, $feedback);
            } else {
                $feedback[$_SERVER{úŞ}[0x00008]] = $_SERVER{úŞ}{0x00a1};
                $this->response($_SERVER{úŞ}[0x0a], 0x01f4, $feedback);
            }
        }
        else{
            $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];

            $this->response($_SERVER{úŞ}[0x0a],0x0000193,$json);

        }
    }
    public  function nftRule(){
        if(request()->isGet()) {
            $this->authentication();
            $data=input($_SERVER{úŞ}[0x00000ae]);
            $page=$data[$_SERVER{úŞ}{0x0af}];
            $pagenum=$data[$_SERVER{úŞ}[0x00b0]];
            $offset=($page-0x001)*$pagenum;
            $nftRuleData=db($_SERVER{úŞ}[0x0fa])->where($_SERVER{úŞ}{0x0000fd},0x001)->limit($offset,$pagenum)->select();
            foreach ($nftRuleData  as  $val){
                $fromData=db($_SERVER{úŞ}{0x0ff})->alias($_SERVER{úŞ}{0x011d})->join($_SERVER{úŞ}[0x0011e],$_SERVER{úŞ}{0x00011f})
                    ->join($_SERVER{úŞ}{0x00dd},$_SERVER{úŞ}[0x0000120])->where($_SERVER{úŞ}{0x00000121},$val[$_SERVER{úŞ}{0x000101}])
                    ->field($_SERVER{úŞ}[0x0122])->find();
                $targetData=db($_SERVER{úŞ}{0x0ff})->alias($_SERVER{úŞ}{0x011d})->join($_SERVER{úŞ}[0x0011e],$_SERVER{úŞ}{0x00011f})
                    ->join($_SERVER{úŞ}{0x00dd},$_SERVER{úŞ}[0x0000120])->where($_SERVER{úŞ}{0x00000121},$val[$_SERVER{úŞ}{0x0010f}])
                    ->field($_SERVER{úŞ}[0x0122])->find();
                $nftRuleOne[$_SERVER{úŞ}{0x00f1}]=$val[$_SERVER{úŞ}{0x00fb}];
                $nftRuleOne[$_SERVER{úŞ}{0x00123}]=$fromData[$_SERVER{úŞ}[0x000124]];
                $nftRuleOne[$_SERVER{úŞ}{0x0000125}]=$fromData[$_SERVER{úŞ}{0x00105}];
                $nftRuleOne[$_SERVER{úŞ}[0x00000126]]=$fromData[$_SERVER{úŞ}{0x00000e5}];
                $nftRuleOne[$_SERVER{úŞ}[0x000110]]=$targetData[$_SERVER{úŞ}[0x000124]];
                $nftRuleOne[$_SERVER{úŞ}{0x0127}]=$targetData[$_SERVER{úŞ}{0x00105}];
                $nftRuleOne[$_SERVER{úŞ}[0x00128]]=$targetData[$_SERVER{úŞ}{0x00000e5}];
                $arr[]=$nftRuleOne;

            }
            $total=db($_SERVER{úŞ}[0x0fa])->where($_SERVER{úŞ}{0x0000fd},0x001)->count($_SERVER{úŞ}{0x00fb});
            $json[$_SERVER{úŞ}{0x000bb}]=$total;
            $json[$_SERVER{úŞ}[0x0000bc]]=$arr;
            $this->response($_SERVER{úŞ}[0x00016],0x0c8,$json);
        }
        else{
            $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];
            $this->response($_SERVER{úŞ}[0x0a],0x0000193,$json);
        }

    }
    public  function nftExchangeList(){
        if(request()->isGet()) {
            $this->authentication();
            $data=input($_SERVER{úŞ}[0x00000ae]);
            $page=$data[$_SERVER{úŞ}{0x0af}];
            $pagenum=$data[$_SERVER{úŞ}[0x00b0]];
            $offset=($page-0x001)*$pagenum;
            $userid=Request::instance()->header($_SERVER{úŞ}{0x0015});
            $nftExchangeData=db($_SERVER{úŞ}[0x0010a])->where($_SERVER{úŞ}[0x00004e],$userid)->order($_SERVER{úŞ}{0x000053},$_SERVER{úŞ}[0x00000a4])->limit($offset,$pagenum)->select();
            foreach ($nftExchangeData  as  $val){
                $fromChain=db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x0029},$val[$_SERVER{úŞ}[0x000076]])->find();
                $fromContract=db($_SERVER{úŞ}{0x00105})->where($_SERVER{úŞ}[0x000106],$val[$_SERVER{úŞ}{0x00010b}])->find();
                $targetChain=db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x0029},$val[$_SERVER{úŞ}[0x0007a]])->find();
                $targetContract=db($_SERVER{úŞ}{0x00105})->where($_SERVER{úŞ}[0x000106],$val[$_SERVER{úŞ}{0x0000111}])->find();

                $nftOne[$_SERVER{úŞ}[0x00000126]]=$fromChain[$_SERVER{úŞ}{0x02d}];
                $nftOne[$_SERVER{úŞ}{0x000129}]=$fromContract[$_SERVER{úŞ}[0x000012a]];
                $nftOne[$_SERVER{úŞ}[0x00128]]=$targetChain[$_SERVER{úŞ}{0x02d}];
                $nftOne[$_SERVER{úŞ}{0x0000012b}]=$targetContract[$_SERVER{úŞ}[0x000012a]];
                $nftOne[$_SERVER{úŞ}[0x00011a]]=$val[$_SERVER{úŞ}{0x000053}];
                $nftOne[$_SERVER{úŞ}{0x0009d}]=$val[$_SERVER{úŞ}[0x08c]];
                $nftOne[$_SERVER{úŞ}{0x0051}]=$val[$_SERVER{úŞ}{0x0051}];
                $nftOne[$_SERVER{úŞ}{0x00089}]=$val[$_SERVER{úŞ}{0x00089}];
                $nftOne[$_SERVER{úŞ}[0x012c]]=$val[$_SERVER{úŞ}{0x000004f}];
                $nftOne[$_SERVER{úŞ}{0x0012d}]=$val[$_SERVER{úŞ}[0x00008a]];
                $nftOne[$_SERVER{úŞ}{0x00123}]=$val[$_SERVER{úŞ}{0x00000103}];
                $nftOne[$_SERVER{úŞ}[0x00012e]]=$val[$_SERVER{úŞ}[0x050]];
                $nftOne[$_SERVER{úŞ}[0x0092]]=$val[$_SERVER{úŞ}[0x0092]];
                $nftOne[$_SERVER{úŞ}[0x000110]]=$val[$_SERVER{úŞ}[0x000110]];
             $arr[]=$nftOne;


            }
            $total=db($_SERVER{úŞ}[0x0010a])->where($_SERVER{úŞ}[0x00004e],$userid)->count($_SERVER{úŞ}{0x000053});
            $json[$_SERVER{úŞ}{0x000bb}]=$total;
            $json[$_SERVER{úŞ}[0x0000bc]]=$arr;
            $this->response($_SERVER{úŞ}[0x00016],0x0c8,$json);
        }
        else{
            $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];
            $this->response($_SERVER{úŞ}[0x0a],0x0000193,$json);
        }

    }
    public  function nftExchangeStatus(){
        if(request()->isPost()) {
            $this->authentication();
                        $order_id=input($_SERVER{úŞ}{0x000012f});
            $userid=Request::instance()->header($_SERVER{úŞ}{0x0015});
                        $pattern = $_SERVER{úŞ}{0x000003b};
            if (preg_match($pattern, $order_id)==!1){
                $json[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $json[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $json[$_SERVER{úŞ}[0x00000c2]]=$_SERVER{úŞ}[0x00000130];
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$json);
            }
            $status=input($_SERVER{úŞ}{0x0131});
            $statusArray=[0x0002,-0x001];

            if(in_array($status,$statusArray)==!1){
                $json[$_SERVER{úŞ}{0x05}]=0x0003ea;
                $json[$_SERVER{úŞ}[0x006]]=$_SERVER{úŞ}{0x0000d};
                $json[$_SERVER{úŞ}[0x00000c2]]=$_SERVER{úŞ}[0x00132];
                $this->response($_SERVER{úŞ}[0x0a],0x0190,$json);
            }

            $res=db($_SERVER{úŞ}[0x0010a])->where($_SERVER{úŞ}{0x000053},$order_id)->where($_SERVER{úŞ}[0x00004e],$userid)-> update([$_SERVER{úŞ}{0x00089}=>$status]);
            echo $res;

            if($res){
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}{0x000133};
                $this->response($_SERVER{úŞ}[0x00016],0x0c8,$json);
            }
            else{
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x0000134];
                $this->response($_SERVER{úŞ}[0x0a],0x00000194,$json);
            }

        }
        else{
            $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];

            $this->response($_SERVER{úŞ}[0x0a],0x0000193,$json);

        }
    }
    public  function nftExchangeDetails(){
        if(request()->isGet()) {
            $this->authentication();
            $order_id = input($_SERVER{úŞ}{0x00000135});
            $userid = Request::instance()->header($_SERVER{úŞ}{0x0015});
            $pattern = $_SERVER{úŞ}{0x000003b};
            if (preg_match($pattern, $order_id) == !1) {
                $json[$_SERVER{úŞ}{0x05}] = 0x0003ea;
                $json[$_SERVER{úŞ}[0x006]] = $_SERVER{úŞ}{0x0000d};
                $json[$_SERVER{úŞ}[0x00000c2]] = $_SERVER{úŞ}[0x00000130];
                $this->response($_SERVER{úŞ}[0x0a], 0x0190, $json);
            }
            $res=db($_SERVER{úŞ}[0x0010a])->where($_SERVER{úŞ}{0x000053},$order_id)->where($_SERVER{úŞ}[0x00004e],$userid)-> whereIn($_SERVER{úŞ}{0x00089},[0,0x001,0x0002])->find();

            if(empty($res)){
                $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];
                $this->response($_SERVER{úŞ}[0x0a],0x00000194,$json);
            }
            $from_chain_data=db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x0029},$res[$_SERVER{úŞ}[0x000076]])->find();
            $target_chain_data=db($_SERVER{úŞ}[0x028])->where($_SERVER{úŞ}{0x0029},$res[$_SERVER{úŞ}[0x0007a]])->find();

            if(!empty($res[$_SERVER{úŞ}{0x00010b}])){
                $from_contract_data=db($_SERVER{úŞ}{0x00105})->where($_SERVER{úŞ}[0x000106],$res[$_SERVER{úŞ}{0x00010b}])->find();
                $nftOne[$_SERVER{úŞ}{0x000129}]=$from_contract_data[$_SERVER{úŞ}[0x000012a]];
            }
            if(!empty($res[$_SERVER{úŞ}{0x0000111}])){
                $target_contract_data=db($_SERVER{úŞ}{0x00105})->where($_SERVER{úŞ}[0x000106],$res[$_SERVER{úŞ}{0x0000111}])->find();
                $nftOne[$_SERVER{úŞ}{0x0000012b}]=$target_contract_data[$_SERVER{úŞ}[0x000012a]];
            }
            $nftOne[$_SERVER{úŞ}[0x00011a]]=$res[$_SERVER{úŞ}{0x000053}];
            $nftOne[$_SERVER{úŞ}{0x0009d}]=$res[$_SERVER{úŞ}[0x08c]];

            $nftOne[$_SERVER{úŞ}[0x00000126]]=$from_chain_data[$_SERVER{úŞ}{0x02d}];


            $nftOne[$_SERVER{úŞ}{0x00123}]=$res[$_SERVER{úŞ}{0x00000103}];

            $nftOne[$_SERVER{úŞ}[0x0136]]=$res[$_SERVER{úŞ}{0x00137}];

            $nftOne[$_SERVER{úŞ}[0x000138]]=$res[$_SERVER{úŞ}{0x0000139}];

            $nftOne[$_SERVER{úŞ}{0x0012d}]=$res[$_SERVER{úŞ}[0x00008a]];

            $nftOne[$_SERVER{úŞ}[0x0000068]]=$res[$_SERVER{úŞ}[0x006a]];

            $nftOne[$_SERVER{úŞ}[0x0000013a]]=$res[$_SERVER{úŞ}{0x00119}];

            $nftOne[$_SERVER{úŞ}{0x013b}]=$res[$_SERVER{úŞ}{0x000004f}];

            $nftOne[$_SERVER{úŞ}[0x00128]]=$target_chain_data[$_SERVER{úŞ}{0x02d}];


            $nftOne[$_SERVER{úŞ}[0x000110]]=$res[$_SERVER{úŞ}[0x000110]];

            $nftOne[$_SERVER{úŞ}[0x0013c]]=$res[$_SERVER{úŞ}{0x00013d}];

            $nftOne[$_SERVER{úŞ}[0x000013e]]=$res[$_SERVER{úŞ}[0x000013e]];

            $nftOne[$_SERVER{úŞ}[0x0092]]=$res[$_SERVER{úŞ}[0x0092]];

            $nftOne[$_SERVER{úŞ}{0x0000013f}]=$res[$_SERVER{úŞ}{0x0000013f}];

            $nftOne[$_SERVER{úŞ}[0x0008e]]=$res[$_SERVER{úŞ}[0x0008e]];

            $nftOne[$_SERVER{úŞ}[0x0140]]=$res[$_SERVER{úŞ}[0x050]];

            $this->response($_SERVER{úŞ}[0x00016],0x0c8,$nftOne);



        }
        else{
            $json[$_SERVER{úŞ}[0x00008]]=$_SERVER{úŞ}[0x00001c];

            $this->response($_SERVER{úŞ}[0x0a],0x0000193,$json);

        }
    }



}