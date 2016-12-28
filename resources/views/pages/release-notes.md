
 [TOC]

# work record

# proxy_pool
##  2016.12.18 check_proxy.php && run.php
- add check_proxy.php && run.php && flow graph
- until now I understand ORM a little , class -- abstract -- ORM -- frame
```
such as :
    class common        { function check()}  //common part

    // class source_proxy and good_proxy both to want to use check(), just a little diff , so extract common part to class common , than to invoke common

    class source_proxy  { function check() { common-->check() } }
    class good_proxy    { function check() { common-->check() } }
```
##  2016.12.17 php rewrite proxy ip
- get_proxy
    - curl
    - php
    - html-parser
- some feel :
     -[last repository](https://github.com/NominationP/py_proxy) , I use python , but now i'm work for PHP, I have to use PHP to work as soon as know more about PHP . Full day , I use PHP to complete one class(get_proxy) from curl , simple-html-dom , PHP syn ... I fount that's too complicated than python (include ";","$","{}"... or not have beautifulsoup !!! ....)
## **2016.12.14 17:38 flow graph && step one

- flow graph http://www.processon.com/diagraming/585100afe4b0160bc4f2277b
- create class --> Mysql , && other file could use this class function
    - class
    - init
    - self
    - function
- feel:
    - feel know a lot , main ---> init and self ---> class
    - **each file ---> want to connect ----> import -----> use other function just a function not inital and ... ----> create a class -----> class has init(construct) ----> import class ---> when init a class -----> aut to use intial function -----> could use function from other method perfectly**


# carder
 ## 2016.12.07 some bug

- register E-mail verification
- price discounted http://yhd.shanghai.com.cn/flow.php
- no comment http://jd.shanghai.com.cn/goods.php?id=63550
- lading so slow !
- purchase model (click - > check -> click -> no change)
-




## 2016.11.19 08:40
- mysql invitation
>https://zhuanlan.zhihu.com/p/23713529


----------


# onlinejudge apart

## 2016.10.25   02:08 get user_id  and during_time from  users_status

- test success yet fomat
- detail : php basic :
```
array  key value foreach
foreach ($array as $key => $value){}
array_push($array, $add)
array_key_exists($key, $array)
print_r($array)
```
- test code
- tip : judgeTest1
>https://app.yinxiang.com/shard/s47/nl/9967386/c0d91fdb-0094-4a03-9e66-111317a238b0?title=test%20code
```
<?php
  $a = array("zhang"=>"1","li"=>"2","wang"=>"3");
  $user_id_array=array("zhang","li");
  $user_id_date = array("zhang"=>array("10"));


foreach ($a as $keyd => $vard) {
  # code...

            foreach ($user_id_array as $key) {


                if( $keyd == $key)
                {

                    if(array_key_exists($key, $user_id_date))
                    {

                        array_push($user_id_date[$key],$vard);

                    }else{
                        $user_id_date += [$key => array($vard)];
                    }
                }
            }

          }

          print_r($user_id_date) ;



?>
```

##  2016.10.25 11:00 API (meself)(not format)
- tip:  API (meself)(not format)
- online judge API
- most half
- left some problime ---> page url , and group detail API ...
>https://app.yinxiang.com/shard/s47/nl/9967386/fbc86653-f7a4-4f7d-b6ec-760936dfe6b9?title=API%20(meself)(not%20format)



## 2016.10.25 22:36 get user_id  and during_time from  users_status DONE
>https://app.yinxiang.com/shard/s47/nl/9967386/c0d91fdb-0094-4a03-9e66-111317a238b0?title=test%20code
- some little little problem take 2 or more days
- it's not easy to test in sublime



## 2016.10.26 12:19 invitation code  DONE
- process : view choose group_id , type(1 or 2) , num( limit time)  ---> generate -----generate code -----> save dataBase
- local :
> public function action_generate()

- difficult :
```
    - url rule  get url's id(not one)
        url('InvitationCode/generate/?group=stju&type=2&limit=5')

    -  how to generate code
        $incode = hash("md5",$date);

    -  how to save to database
        $code = new Model_InvitationCode;

        $code->group_id = $group;
        $code->invited_code = $incode;
        $code->type = $type;
        $code->num = $limit;

        $code->save();
```


## 2016.10.27 13:52 get data from users and solution to save to users_status

 -  get data
 -  to save
 -  php array save to mysql

- question:
###  not to save (database save show key all relation)
```
///application/classes/Model/Situation.php

/** !!!!!!!!!!!!!  when change "ddd"(not same of $cols), it's could save new data, but change the same , it's not to save new , but could show list , and this function not use show list , so just soso */

//use 'user_id' could show correct during_time

            static $primary_key = 'date';
```


- save the array(serialize) and wrong when get from database (DONE)
    - could use json_encode and json_decode
        ```
         <td class="ptitle"><?php $arr = (json_decode($problem->during_time));

        for($i=0; $i<count($arr); $i++)
            echo $arr[$i]."  ";?>

        </td>
        ```

## 2016.10.27 19:12 implement toggle grouping (root) (set aside)

- process : root login ->
- this problem side away


## 2016.10.31 10:20  kohana schedule task  && invitation code && ...

- invation code (format 6 digit)  **13.17 DONE**


## 2016.11.2 15:47 schedule DONE

- crontab index of kohana-cron

## 2016.11.3 08:31 group_config function  DONE

- by database and API doc to implement
- key: type text save get json ...


## 2016.11.4 09:22 random generate problem && SSL

## 2016.11.6 23:06 up
- look up current user_id and group config --> look up if has generate current stage problem ---> not : random generate ---> yes : show this
- random generate : get current level problem ---> random number(problem_id) by pass_num


- introduce:
    - **group config :  use follow format as post  , give me left value , and i will give you same**
    ```
    $stagelevel = array(1=>"1",2=>"2",3=>"3",4=>"4",5=>"5");
    $levelnum = array(1=>"18",2=>"20",3=>"30",4=>"40",5=>"2");
    $levelscore = array(1=>"1",2=>"5",3=>"10",4=>"20",5=>"30");
    ```








