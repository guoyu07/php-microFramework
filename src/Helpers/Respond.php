<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/5
 * Time: 16:49
 */

namespace Mco\Helpers;

/**
 * Class Respond
 * @package Mco\Helpers
 */
final class Respond
{
    /**
     * @var string
     */
    public static $defaultMsg = 'successful';

    /**
     * @param mixed  $data
     * @param int    $code
     * @param string $msg
     * @param array  $msgArgs
     *
     * @return string
     */
    public static function json($data, int $code = ResCode::OK, string $msg = null, array $msgArgs = [])
    {
        return self::fmtJson($data, $code, $msg, $msgArgs);
    }

    /**
     * @param mixed  $data
     * @param int    $code
     * @param string $msg
     * @param array  $msgArgs
     *
     * @return string
     */
    public static function errJson(int $code = ResCode::OK, string $msg = null, array $msgArgs = [], $data = null)
    {
        return self::fmtJson($data, $code, $msg, $msgArgs);
    }

    /**
     * @param mixed $data
     *
     * @return string
     */
    public static function rawJson($data)
    {
        return json_encode($data);
    }

    /**
     * @param mixed  $data
     * @param int    $code
     * @param string $msg
     * @param array  $msgArgs
     *
     * @return string
     */
    public static function fmtJson($data, int $code = ResCode::OK, string $msg = null, array $msgArgs = [])
    {
        return json_encode([
            'code' => $code,
            'msg'  => $msg ?: self::getMsgByCode($code, $msgArgs),
            'time' => microtime(true),
            'data' => $data,
        ]);
    }

    /**
     * @param int   $code
     * @param array $msgArgs
     *
     * @return mixed
     */
    public static function getMsgByCode($code, array $msgArgs = [])
    {
        if ($lang = \Mco::$di->getIfExist('lang')) {
            return $lang->tl('response.'.$code, $msgArgs, self::$defaultMsg);
        }

        return self::$defaultMsg;
    }
}