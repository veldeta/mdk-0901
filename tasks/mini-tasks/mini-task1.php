<?php

class User 
{
    public $name;
    public $login;
    public $password;

    public function __construct($name, $login, $password)
    {
        $this->login = $login;
        $this->name = $name;
        $this->password = $password;
    }

    public function showInfo()
    {
        $res = "Логин: " . $this->login;
        $res .= "Имя: " . $this->name;
        $res .= "Пароль: " . $this->password;

        return $res;
    }
}

Class SuperUser extends User 
{
    public $fio;
    public $age;
    public $email;
    public $sex;

    public function __construct($fio, $email, $sex)
    {
        $this->fio = $fio;
        $this->email = $email;
        $this->sex = $sex;
    }

    public function showInfo()
    {
        $res = "ФИО: {$this->fio} <br />";
        $res .= "email: {$this->email} <br />";
        $res .= "Ваш пол: {$this->checkSex()} <br />";

        return $res;
    }

    public function checkSex()
    {
        if ($this->sex == 'Мужской') {
            return $this->sex;
        } elseif ($this->sex == 'Женский') {
            return $this->sex;
        } else {
            return "Пол указан неверно!";
        }
    }

    public function showAge($age)
    {
        if ($age < 18) {
            return "Вы несовершеннолетний!";
        } else {
            return "Вы совершеннолетний!";
        }
    }
}

$user = new SuperUser("Сергадеев Алексей Львович", "aaaaa123@mail.ru", "Мужской");
echo $user->showInfo();
echo $user->showAge(19);