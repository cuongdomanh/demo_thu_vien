<?php
include"model/Admin_m.php";
class Admincontroller extends PRoute {
    public function index(){
        $post=new Admin_m();
        $kt=0;
        if(isset($_GET['submit'])){
            if(!empty($_GET['name']) ) {
                $search=trim($_GET['name']);
                $fields=$_GET['fields'];
                if ($listpost=$post->search($fields,$search)) {
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
        include("view/admin/index.php");
    }
    public function add(){
        $post=new Admin_m();
        if(isset($this->variable)){
            $id=$this->variable;
            intval($id);
            $p=$post->find($id);
        }
        if(isset($_POST['submit'])){
            if(!empty($_POST['name'])&&isset($_POST['pass'])) {
                $array = array(
                    'name' => $_POST['name'],
                    'pass' => $_POST['pass'],
                    'address'=>$_POST['address'],
                    'phone'=>$_POST['phone']
                );
                if (isset($p)?$post->insert($array,$id):$post->insert($array)) {
                    $messager = "thanh cong ";
                    // chuyen huong file
                    $this->move("controller/Admincontroller", $messager);
                } else {
                    $messager =" them khong thanh cong  ";
                }
            }
            else{
                $messager=" them khong thanh cong  ";
            }
        }
        include("view/admin/add.php");
    }
    public function delete(){
        $post=new Admin_m();
        if(isset($this->variable)){
            $id=$this->variable;
            if($post->delete($id)){
                $messager=" xoa thanh cong ";
                $this->move("controller/Admincontroller",$messager);
            }
            else{
                $messager=" xoa khong   thanh cong ";
                $this->move("controller/Admincontroller",$messager);
            }
        }
    }

}
?>