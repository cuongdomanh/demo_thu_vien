<?php
include "config/database.php";
include"controller/Route.php";
$url=$Route->url($_SERVER['PHP_SELF']);
if(strtolower($url[3])=="controller") {
    if(!empty($url[4])){
        $ft="controller/". ucwords(strtolower($url[4])).".php";
        require($ft) ;
        // $object= new Post();
        $ob = "$"."object"." = new ". ucwords(strtolower($url[4])) .";";
        eval($ob);
        if(!empty($url[5])&& $url[5]!='index'){
            if(isset($url[6])) {
                $variable = hex2bin($url[6]);
                $object->variable=$variable;
            }
            $method="$"."object -> ".strtolower($url[5])."();";
            eval($method);
        }
        else{
            if(isset($url[6])) {
                $variable = hex2bin($url[6]);
                $object->variable=$variable;
            }
            $object->index();
        }
    }
    else{
         require"controller/Home.php";
    }
}
else if(strtolower($url[3])==""){
    include("controller/Home.php");
}
else{
    $Route->move();
}
?>