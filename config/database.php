<?php
include"config/configdatabase.php";
class database extends configdatabase{
    var $table=null;
    var $conn=null;
    public function __construct()
    {
        parent::__construct();

        $this->conn=mysql_connect("localhost","root","");
        if(!$this->conn){
            die(' ban chua ke noi duoc voi database');
        }
        $conn=mysql_select_db($this->database,$this->conn);
    }
    public function getAll($array=null){
        if(!$array) {
            $query = "select*from " . $this->table;
        }
        else{
            // orderby  va lay limit
            $a=array_keys($array);
            if(trim(strtolower($a[0]))=="order by" && trim(strtolower($a[1]))=="limit") {
                $query = "select*from " . $this->table . " " . trim(strtolower($a[0])) . " id " . trim(strtolower($array[$a[0]])) . " " . trim(strtolower($a[1])) . " " . trim(strtolower($array[$a[1]][0])) . "," . trim(strtolower($array[$a[1]][1]));

            }
            else if(trim(strtolower($a[0]))=="order by"){
                $query = "select*from " . $this->table ." ".trim(strtolower($a[0])) ." id ".trim(strtolower($array[$a[0]])) ;
            }
            else if(trim(strtolower($a[0]))=="limit"){
                $query = "select*from " . $this->table ." ".trim(strtolower($a[0])) ." ".trim(strtolower($array[$a[0]][0])).",".trim(strtolower($array[$a[0]][1])) ;
            }

        }
        $rs=mysql_query($query,$this->conn);
        while($row=mysql_fetch_array($rs)) {
            $result[] = $row;
        }
        return $result;
    }
    // insert va update
    public function insert($array,$id=null){
        if($id){
            if($this->find_id($id)) {
                $query = "update " . $this->table . " set " . $this->getArray($array) . " where id=" . $id;
                $rs=mysql_query($query);
            }
            else{
                return false;
            }
        }
        else{
            $a=$this->stringarray($array);
            $query="insert into " .$this->table. "(".$a[0].") values (".$a[1].")" ;
            $rs=mysql_query($query);
        }
        if($rs){
           return true;
        }
        else{
            return false;
        }
    }
    // lay gia tri o mang de cho vao update=insert($id.);

    public function getArray($array){
        $string="";
        $x=1;
        foreach ($array as $key=>$item){
            if($x==count($array)) {
                $string = $string . $key . " = " . "'" . $item . "'";
            }
            else{
                $string = $string . $key . " = " . "'" . $item . "',";
            }
            $x++;
        }
        return $string;
    }
    // chuyen mang thanh 2 phan
    public function stringarray($array){
        $string1="";
        $string2="";
        $x=1;
        foreach ($array as $key=>$item){
            if($x==count($array)){
                $string1 =$string1 . $key;
                $string2 =$string2 ."'".$item ."'";
            }
            else {
                $string1 = $string1 . $key . ",";
                $string2 = $string2 . "'" . $item . "',";
                $x++;
            }
        }
        $luu=[$string1,$string2];
        return $luu;
    }

    //tim kiem theo id ;
    public function find($id){
        $query= "select * from  " . $this->table ." where id=" .$id ;
        $rs=mysql_query($query,$this->conn);
        $result = null;
        if($rs) {
            $number = mysql_num_rows($rs);

            if ($number > 0) {
                while ($rs1 = mysql_fetch_array($rs)) {
                    $result = $rs1;
                }
            }
            return $result;
        }

    }
    //tim kiem tra ve true flase ;
    public function find_id($id){
        if($this->find($id)){
            return true;
        }
        else{
            return false;
        }
    }
    public function delete($id)
    {
        $query = "delete from  " . $this->table . " where id=" . $id;
        $rs=mysql_query($query,$this->conn);
        if($this->find_id($id)) {
            if ($rs) {
                return true;
            } else {
                return false;
            }
        }
        else{
            return false;
        }
    }
    public function search($fields,$search){
        $query="select * from  ".$this->table."  where  ".$fields ." like "."'%".$search."%'";
        $rs=mysql_query($query,$this->conn);
        $number=mysql_num_rows($rs);
        $result=null;
        if($number>0){
            while($ar=mysql_fetch_array($rs)){
                $result[]=$ar;
            }
        }
        return $result;
    }
}
?>