<?php
class Admin_m extends database{
    public function __construct()
    {
        parent::__construct();
        $this->table="admin";
    }
}
?>