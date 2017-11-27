<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/5
 * Time: 16:50
 */

namespace Mco\Helpers;

/**
 * Class ResCode
 * @package Mco\Helpers
 */
class ResCode
{
    // basic
    const OK = 0;
    const ERR = 1;
    const FAIL = 2;
    const EXP = 3;

    // category: user(100 ~ 299)
    const NEED_LOGIN = 100;
    const NEED_AUTH = 101;
    const AUTH_FAIL = 102;
    const LOGIN_FAIL = 103;

    // category: request(300 ~ 399)
    const MISS_PARAM = 300;
    const PARAM_ERROR = 301;
}