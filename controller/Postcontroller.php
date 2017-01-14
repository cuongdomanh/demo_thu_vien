<?php
include"model/Post_m.php";
class Postcontroller extends PRoute {
    public function index(){
        $post=new Post_m();
        $kt=0;
        if(isset($_GET['submit'])){
            if(!empty($_GET['content'])) {
                $search=trim($_GET['content']);
                if ($listpost=$post->search('content',$search)) {
                    $this->variable=" thanh cong ";
                }
                else{
                    $kt=1;
                    $this->variable=" khong co ";
                }
            }
            else{
                $kt=1;
                $this->variable=" chua co du lieu de search ";
            }
        }
        else{
           $kt=1;
        }
        if($kt==1){
            $a=array("order by"=>"desc","limit"=>array("0","10"));
            $listpost=$post->getAll($a);
        }
        include("view/post/index.php");
    }
    public function add(){
        $post=new Post_m();
        if(isset($this->variable)){
            $id=$this->variable;
            intval($id);
            $p=$post->find($id);
        }
        if(isset($_POST['submit'])){
            if(!empty($_POST['content'])) {
                $array = array(
                    'content' => $_POST['content']
                );
                if (isset($p)?$post->insert($array,$id):$post->insert($array)) {
                    $messager = "thanh cong ";
                    // chuyen huong file
                    $this->move("controller/Postcontroller", $messager);
                } else {
                    $messager =" them khong thanh cong  ";
                }
            }
            else{
                $messager=" them khong thanh cong  ";
            }
        }
        include("view/post/add.php");
    }
    public function delete(){
        $post=new Post_m();
        if(isset($this->variable)){
            $id=$this->variable;
            if($post->delete($id)){
                $messager=" xoa thanh cong ";
                $this->move("controller/Postcontroller",$messager);
            }
            else{
                $messager=" xoa khong   thanh cong ";
                $this->move("controller/Postcontroller",$messager);
            }
        }
    }

}
?>