<?php
abstract class User extends Table
{
    public $user_id = 0;
    public $lastname = '';
    public $firstname = '';
    public $patronymic = '';
    public $login = '';
    public $pass = '';
    public $birthday = date;
    public $role_id = 0;
    public $active = 1;
    function validate()
    {
        return false;
    }

}