<?php /* -- enphp : https://github.com/djunny/enphp */
  namespace  app\index\controller;error_reporting(E_ALL^E_NOTICE);define('O0', 'O');$GLOBALS[O0] = explode('|&|/| ', 'users|&|/| userid|&|/| token|&|/| error|&|/| token错误|&|/| Unauthorized|&|/| id|&|/| 未输入token或id|&|/| code|&|/| msg|&|/| time|&|/| Z|&|/| data|&|/| X_End_Time|&|/| .|&|/| /[0]*/|&|/| |&|/| 1.2.|&|/| Authorization:YnVmZW5nQDIwMThidWZlbmc=|&|/| Content-Type: application/json|&|/| Content-Length: |&|/| Y-m-d h:i:s|&|/| 0|&|/| post.userid|&|/| post.token|&|/| /^[a-z\\d]*$/i|&|/| remarks|&|/| token格式错误|&|/| /^[1-9][0-9]*$/|&|/| remark|&|/| orderid参数格式错误|&|/| token或id未输入|&|/| PRC|&|/| message|&|/| args_format_error|&|/| token format error|&|/| userid format error|&|/| missing_args|&|/| token or userid is empty|&|/| errorcode|&|/| need_permission|&|/| Authentication failure|&|/| del|&|/| Users are prohibited from accessing|&|/| Y-m-d H:i:s');
use  think\Controller;
use  think\Request;
use  think\Response;



 class Base  extends   Controller
{

     
     protected   function token($OO,$O00,$O0O,$OO0='token'){
         $OOO=$OO.$O00.$O0O.$OO0;

         $OOO = md5(uniqid(md5(microtime($OOO)),!0));
           $OOO = sha1($OOO);
           return $OOO;


     }

     

     protected   function checktoken($O000,$O00O){$OO00=&$GLOBALS{O0};
         $O0O0=db($OO00[0])->where($OO00{1},$O00O)->where($OO00[2],$O000)->find();

         if(empty($O0O0)){
             $O0OO[$OO00{3}]=$OO00[4];
             $this->response($OO00{5}, 401,$O0OO);
             exit();
         }
     }
     public   function checktokenheader()
     {$O000O=&$GLOBALS{O0};
         $OO0O = Request::instance()->header($O000O[6]);

         $OOO0 = Request::instance()->header($O000O[2]);

         if(empty($OO0O) && empty($OOO0)) {
             $OOOO[$O000O{3}] = $O000O{7};
             $this->response($O000O{3}, 404, $OOOO);
             exit();
         }
         $O0000 = db($O000O[0])->where($O000O{1}, $OO0O)->where($O000O[2], $OOO0)->find();
         if (empty($O0000)) {
             $OOOO[$O000O{3}] = $O000O[4];
             $this->response($O000O{5}, 401, $OOOO);
             exit();
         }
     }
     
     protected  function response($O00O0, $O00OO = 200, $O0O00 = '', $O0O0O = null, $O0OO0 = 'json')
     {$OO00O=&$GLOBALS{O0};
         $O0O0O === null && $O0O0O = $O00OO;

         $O0OOO                               = [
             $OO00O[8] => $O0O0O,
             $OO00O{9} => $O00O0,
             $OO00O[10] =>time()-date($OO00O{11}),
             $OO00O[12] =>$O0O00,

         ];

         $this->setHeader($OO00O{13}, $this->request->time());

         $OO000 = Response::create($O0OOO, $O0OO0)->code(200)->header($this->header);

         throw new \think\exception\HttpResponseException($OO000);

     }
     protected  function setHeader($OO0O0, $OO0OO)
     {
         if (is_array($OO0O0)) {
             $this->header = array_merge($this->header, $OO0O0);
         } else {
             $this->header[$OO0O0] = $OO0OO;
         }
         return $this;
     }
     
     protected  function ordernum($OOO00){$O00000=&$GLOBALS{O0};

         $OOO0O=explode($O00000[14], $OOO00);

         $OOOO0 = $O00000{15};

         $OOOOO = preg_replace($OOOO0, $O00000[16], $OOO0O[1], 1);

         $OOOOO=$O00000{17}.$OOOOO;

         return $OOOOO;


     }
     
     protected  function posttrans($O0000O,$O000O0){

         $O000OO = curl_init ();
           $O00O00[] = $GLOBALS{O0}[18];

                  curl_setopt ( $O000OO, CURLOPT_URL, $O000O0 );

         curl_setopt ( $O000OO, CURLOPT_POST, 1 );
           curl_setopt($O000OO,CURLOPT_HTTPHEADER,$O00O00);

                  curl_setopt ( $O000OO, CURLOPT_RETURNTRANSFER, 1 );

         curl_setopt ( $O000OO, CURLOPT_POSTFIELDS, $O0000O);
           curl_setopt ( $O000OO, CURLOPT_FOLLOWLOCATION, !0);
           $O00O0O = curl_exec ( $O000OO );
 
         curl_close ( $O000OO );
           return json_decode($O00O0O);

         

     }
     
     protected  function posttranss($O00OO0,$O00OOO){$O0O0O0=&$GLOBALS{O0};

         $O00OO0=json_encode($O00OO0);

         $O0O000 = curl_init ();
  
         curl_setopt ( $O0O000, CURLOPT_URL, $O00OOO );

         curl_setopt ( $O0O000, CURLOPT_POST, 1 );
           curl_setopt ( $O0O000, CURLOPT_HEADER, 0 );

         curl_setopt ( $O0O000, CURLOPT_RETURNTRANSFER, 1 );

         curl_setopt ( $O0O000, CURLOPT_POSTFIELDS, $O00OO0);
           curl_setopt($O0O000, CURLOPT_HTTPHEADER, array($O0O0O0{19}, $O0O0O0[20] . strlen($O00OO0)));

         curl_setopt ( $O0O000, CURLOPT_FOLLOWLOCATION, !0);
           $O0O00O = curl_exec ( $O0O000 );
 
         curl_close ( $O0O000 );
           return json_decode($O0O00O,!0);

         

     }
     protected  function create_guid() {
         $O0O0OO = strtolower(md5(uniqid(mt_rand(), !0)));

                  $O0OO00 =
             substr($O0O0OO, 0, 8)
             .substr($O0O0OO, 8, 4)
             .substr($O0O0OO,12, 4)
             .substr($O0O0OO,16, 4)
             .substr($O0O0OO,20,12);

                  return $O0OO00;

     }
     protected  function formaltime($O0OO0O){
         return date($GLOBALS{O0}{21},$O0OO0O);

     }
     protected  function charge_address_Transformation($O0OOO0,$O0OOOO,$OO0000){$OO0O00=&$GLOBALS{O0};
         $OO000O=strlen(str_replace($OO0O00{17},$OO0O00[16],$OO0000));

         $OO00O0=$O0OOOO-$OO000O;

         $OO00OO=$O0OOO0.$OO0O00[14].str_repeat($OO0O00[22],$OO00O0).str_replace($OO0O00{17},$OO0O00[16],$OO0000);

         return $OO00OO;

     }

     public  function auth(){$OOOO00=&$GLOBALS{O0};
         $OO0O0O=input($OOOO00{23});

         $OO0OO0=input($OOOO00[24]);

         if(!empty($OO0OO0) && !empty($OO0O0O))
         {
             $OO0OOO = $OOOO00{25};
             if(preg_match($OO0OOO,$OO0OO0)==!1 || strlen($OO0OO0)!=40){
                 $OOO000[$OOOO00[26]] = $OOOO00{27};
                 $this->response($OOOO00[26], 400, $OOO000);
             }
             $OOO00O = $OOOO00[28];
             if (preg_match($OOO00O, $OO0O0O)==!1){
                 $OOO0O0[$OOOO00{29}]=$OOOO00[30];
                 $this->response($OOOO00{3},400,$OOO0O0);
             }
             $this->checktoken($OO0OO0,$OO0O0O);
         }

         else{
             $OOO0OO[$OOOO00{3}]=$OOOO00{31};

             $this->response($OOOO00{5}, 400,$OOO0OO);

             exit();

         }
     }
    protected  function utctime(){$OOOOO0=&$GLOBALS{O0};
        date_default_timezone_set($OOOOO0[32]);

         $OOOO0O=time()-date($OOOOO0{11});


         return $OOOO0O;

    }
    public  function authentication(){$O000O00=&$GLOBALS{O0};
        $OOOOOO = Request::instance()->header($O000O00[2]);

        $O000000=Request::instance()->header($O000O00{1});

        if(!empty($OOOOOO) && !empty($O000000))
        {
            $O00000O = $O000O00{25};
            if(preg_match($O00000O,$OOOOOO)==!1 || strlen($OOOOOO)!=40){
                $O0000O0[$O000O00[8]]=1002;
                $O0000O0[$O000O00{33}]=$O000O00[34];
                $O0000O0[$O000O00[26]] = $O000O00{35};

                $this->response($O000O00[26], 400, $O0000O0);
            }
            $O0000OO = $O000O00[28];
            if (preg_match($O0000OO, $O000000)==!1){
                $O0000O0[$O000O00[8]]=1002;
                $O0000O0[$O000O00{33}]=$O000O00[34];
                $O0000O0[$O000O00[26]] = $O000O00[36];

                $this->response($O000O00{3},400,$O0000O0);
            }
            $this->checkauth($OOOOOO,$O000000);
        }

        else{
            $O0000O0[$O000O00[8]]=1001;

            $O0000O0[$O000O00{33}]=$O000O00{37};

            $O0000O0[$O000O00[26]] = $O000O00[38];


            $this->response($O000O00{3}, 400,$O0000O0);


        }
    }
     protected   function checkauth($O000O0O,$O000OO0){$O00O00O=&$GLOBALS{O0};
         $O000OOO=db($O00O00O[0])->where($O00O00O{1},$O000OO0)->where($O00O00O[2],$O000O0O)->find();

         if(empty($O000OOO)){
             $O00O000[$O00O00O{39}]=1003;
             $O00O000[$O00O00O{33}]=$O00O00O[40];
             $O00O000[$O00O00O[26]]=$O00O00O{41};
             $this->response($O00O00O{3}, 401,$O00O000);

         }
         if($O000OOO[$O00O00O[42]]==1){
             $O00O000[$O00O00O{39}]=1003;
             $O00O000[$O00O00O{33}]=$O00O00O[40];
             $O00O000[$O00O00O[26]]=$O00O00O{43};
             $this->response($O00O00O{3}, 401,$O00O000);
         }
     }
     public  function test(){

        echo date($GLOBALS{O0}[44],time());



    }

 }
