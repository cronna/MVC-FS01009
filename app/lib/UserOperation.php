<?php

namespace app\lib;

class UserOperation
{
    const RoleGuest = "guest";
    const RoleAdmin = "admin";
    const RoleUser = "user";

    public static function getRoleUser()
    {
        $result = self::RoleGuest;
        if (isset($_SESSION['user']['id']) && $_SESSION['user']['is_admin']) {
            $result = self::RoleAdmin;
        } elseif (isset($_SESSION['user']['id'])) {
            $result = self::RoleUser;
        }
        return $result;
    }

    public static function getMenuLink()
    {
        $role = self::getRoleUser();
        $list[] = [
            'title' => "главная",
            'link' => "/user/profile"
        ];
        $list[] = [
            'title' => "сеансы",
            'link' => "/news/list"
        ];
        $list[] = [
            'title' => 'новости',
            'link' => '/user/chanels'
        ];
        $list[] = [
            'title' => 'о нас',
            'link' => '/main/about'
        ];


        if ($role === self::RoleAdmin) {
            $list[] = [
                'title' => "Пользователи",
                'link' => "/user/users"
            ];
        }

        return $list;
    }
}