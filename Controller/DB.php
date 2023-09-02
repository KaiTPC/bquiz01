<?php 
 // 此時只是初次建立db,尚未建表




class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db13";
    protected $table;
    protected $user="root";
    protected $pw="";
    protected $pdo;

    function __construct($table)
    {
        $this->pdo=new PDO($this->dsn,$this->user,$this->pw);
        $this->table=$table;
    }

// 功能方法
// 這邊需加上 sql+pdo fetchall 
    function all(...$arg){
        $sql="select * from $this->table ";
        $sql=$this->sql($sql,...$arg);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH)


        if(!empty($arg)){
            if(is_array($arg[0])){

                foreach($arg[0] as $key => $value){
                    $tmp[]="`$key`='$value'";
                }
   // 構件數組
              
                $sql = $sql . " where " . join(" && ", $tmp);

            }else{
                $sql=$sql . $arg[0];
            }

            if(isset($arg[1])){
                $sql=$sql . $arg[1];
            }
        }


        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function find($arg){
        $sql="select * from $this->table ";

            if(is_array($arg)){
                //要改成a2s

                if(is_array($arg)){
                    $tmp=$this->a2s($arg);
                    $sql=$sql . " where " . join(" && " ,$tmp);
                }
                
            }else{

                $sql=$sql . " where `id`='$arg'";
            }
                // foreach($arg as $key => $value){
                //     $tmp[]="`$key`='$value'";
                // }
// find 函式只要獲得一組資料，所以使用 fetch
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function save($arg){
        if(isset($arg['id'])){
            //update
            foreach($arg as $key => $value){
                $tmp[]="`$key`='$value'";
            }

            $sql="update $this->table set ".join(',',$tmp)." where `id`='{$arg['id']}'";
        }else{
            //insert

            $cols=array_keys($arg);

            $sql="insert into  $this->table (`".join("`,`",$cols)."`) 
                                      values('".join("','",$arg)."')";
        }

        return $this->pdo->exec($sql);
    }
    function del($arg){
        $sql="delete from $this->table ";

            if(is_array($arg)){

                foreach($arg as  $key => $value){
                    $tmp[]="`$key`='$value'";
                }

                $sql=$sql . " where " . join(" && " ,$tmp);
            }else{
                $sql=$sql . $arg;
            }

        return $this->pdo->exec($sql);
    }


    // 計算欄位 
    function count(...$arg){
        $sql="select count(*)from $this->table";
        $sql=$this->sql($sql,...$arg);
        // 可以在查詢結果集的下一行中獲取指定列的值
        return $this->pdo->query($sql)->fetchColumn()
        // $result=$this->all(...$arg);
        // return count($result);
    }

    function sum($col,...$arg){
        return $this->math('sum',$col,...$arg);
    }
    function max($col,...$arg){
        return $this->math('max',$col,...$arg);
    }
    function min($col,...$arg){
        return $this->math('min',$col,...$arg);
    }

    // 少用
    function avg($col,...$arg){
        return $this->math('avg',$col,...$arg);
    }

    function math($math,$col,...$arg){
        $sql="select $math($col) from $this->table ";

        if(!empty($arg)){
            if(is_array($arg[0])){

                foreach($arg[0] as $key => $value){
                    $tmp[]="`$key`='$value'";
                }

                $sql=$sql . " where " . join(" && " ,$tmp);
            }else{
                $sql=$sql . $arg[0];
            }

            if(isset($arg[1])){
                $sql=$sql . $arg[1];
            }
        }

        return $this->pdo->query($sql)->fetchColumn();
    }

}
// 少用

// 畫面資料**尚未認領



function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}



// 畫面資料**尚未認領 view & pignate (分頁)

function view($path,$arg){
    extract($arg);
    include($path);

}

function paginate ($num,$arg=[]){

}




//dd($total->find(['id'=>1]));
// echo $total->min('id');

function to($url){
    header("location:".$url);
   }

// 使用 fun Q來做
function q($sql){
    $pdo=new PDO("mysql:host=localhost;charset=utf8;dbname=db77");
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
// 顯示分頁數據的依據
function links(){

}

// **工具型方法，不提供給外部使用**

// a2s
// 暫存陣列，tmp 回傳出去
// 之後再加入 protected 在a2s & sql前面
function a2s($array){

    foreach($array as $key=>$value){
        if($key!='id'){
            $tmp[]="'$key='$value'";
        }
    }
return $tmp;
}
// 初步了解: 組成關聯數組字串使用 ，html的數值供使用
// 先初始化 $key=$value
//先全部打完再回來處理 this object 問題

$tmp=array();

// 以下容易出錯處 join("&&",$tmp); 要加上 ,
function sql($sql,...$arg){
    if(!empty($arg)){
        if(is_array($arg[0])){
            $tmp=$this->a2s($arg[0]);
            $sql=$sql." where " . join("&&",$tmp);
        }else{
            $sql=$sql .$arg[0];
        }

    }


}


// $total=new DB('total'); 
// $Bottom=new DB("bottom");
// $Title=new DB("title");
