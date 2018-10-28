<?php
/**
 * Created by PhpStorm.
 * User: mur
 * Date: 27.10.18
 * Time: 23:50
 */

class Helper
{
    public static function generateSalt()
    {
        $salt = '';
        $saltLength = 8; //длина соли
        for ($i = 0; $i < $saltLength; $i++) {
            $salt .= chr(mt_rand(33, 126)); //символ из ASCII-table
        }
        return $salt;
    }

    public static function checkCocie()
    {
        if (!empty($_COOKIE['surname']) and !empty($_COOKIE['key'])) {
            $surname = $_COOKIE['surname'];
            $key = $_COOKIE['key']; //ключ из кук (аналог пароля, в базе поле cookie)
//            $_SESSION['test']='Hello world!';
            $db = Db::getConnection();

            $result = $db->query('SELECT*FROM reg WHERE surname="' . $surname . '" AND salt="' . $key . '"');
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();
            if (!empty($row)) {
                //Стартуем сессию:
//                session_start();

                //Пишем в сессию информацию о том, что мы авторизовались:
//                $_SESSION['auth'] = true;


            }
        }

    }

    public static function checkAuth()
    {
        if (!empty($_COOKIE['surname']) and !empty($_COOKIE['key'])) {
            $_SESSION['auth'] = true;
        } else {
            $_SESSION['auth'] = false;
        }
    }
}