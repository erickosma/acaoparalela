<?php
/**
 * Created by PhpStorm.
 * User: zoy
 * Date: 07/08/16
 * Time: 16:46
 */

namespace App\Models\Util;


class UtilController
{


    /**
     * Return  controller name
     *
     * @return string
     */
    public static function getName()
    {
        $controller = self::getNameControlerAndAction();
        list($controller, $action) = explode('@', $controller);
        return $controller;
    }

    /**
     * Return controller and action name
     *
     * @return string
     */
    public static function getNameControlerAndAction()
    {
        $action = app('request')->route()->getAction();

        $controller = class_basename($action['controller']);
        return $controller;
    }

    /**
     * Return action nae
     *
     * @return mixed
     */
    public static function getActionName()
    {
        $controller = self::getNameControlerAndAction();
        list($controller, $action) = explode('@', $controller);
        return $action;
    }
}