<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{

    public function safheasli(){


        $result=DB::select("SELECT * FROM message LEFT OUTER JOIN users ON message.msgFrom=users.user_id WHERE message.msgTo=?",[$_SESSION['id']]);

        $totalresult=array();
        $total=array();
        for($i=0;$i<count($result);$i++){
            if (!in_array($result[$i]->msgFrom,$totalresult)){
                $totalresult[]=$result[$i]->msgFrom;
                $total[]=$result[$i];
            }
        }

        if ($total == array() && $_SESSION['access']=='user'){

            $json='{"user_id":11,"name":"poshtiban"}';
            //$data['lists'][]=json_decode($json);
            $data['lists']=json_decode($json);
        }else{
            $data['lists']=$total;
        }

        DB::update("UPDATE `message` SET`status`=1 WHERE `msgTo`=? AND status=0",array($_SESSION['id']));

        return view('ajax.chatlist',$data);
    }

    public function chat(){
        return view('ajax.chat');
    }

    public function getMessages(){
        DB::update("UPDATE `message` SET`status`=1 WHERE `msgTo`=? AND status=0",array($_SESSION['id']));

        $userId=$_SESSION['id'];
        $msgTo=$_POST['msgto'];
        $data['messages']=DB::select("SELECT * FROM `message` WHERE (`msgFrom`=? AND `msgTo`=?) or (`msgFrom`=? AND `msgTo`=?)",[$msgTo,$userId,$userId,$msgTo]);

        return view('ajax.messages',$data);
    }

    public function sendmessge(){
        $val=$_POST['valuee'];
        $msgto=$_POST['msgto'];
        $sender=$_SESSION['id'];

        DB::insert('INSERT INTO `message`(`msg`, `msgFrom`, `msgTo`) VALUES (?,?,?)',array($val,$sender,$msgto));
    }

    public function msgCount(){

        if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
            $total=DB::select("SELECT COUNT(*) AS total FROM `message` WHERE status=0 AND `msgTo`=?",array($_SESSION['id']));
            $data['tt']=$total[0]->total;
            echo json_encode($data);
        }else{
            $data['tt']=0;
            echo json_encode($data);
        }




    }
}
