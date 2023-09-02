<?php
include_once "DB.php";

class Admin extends DB{

public $header='管理者';
protected $add_header='新增管理員';

public function __construct()
{
    parent::__construct('admin');
}

public function add_form(){
    $this->modal("<tr>
    <td>帳號：</td>
    <td><input type='text' name='acc'></td>
</tr>
<tr>
    <td>密碼：</td>
    <td><input type='password' name='pw'></td>
</tr>
<tr>
    <td>確認密碼：</td>
    <td><input type='password' name='pw2'></td>
</tr>","./api/add.php");
}

public function list(){
    $this->view("./view/admin.php");
}   

}