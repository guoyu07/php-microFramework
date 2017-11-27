<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-10-19
 * Time: 18:06
 */

namespace Mco\Base;

use SimpleAR\LiteRecordModel;

/**
 * Class DbModel
 * @package Mco\Base
 */
abstract class DbModel extends LiteRecordModel
{
    public static function getDb()
    {
        return \Mco::get('db');
    }
}