<?php
class Post_m extends database{
    public function __construct()
    {
        parent::__construct();
        $this->table="post";
    }
}
?>