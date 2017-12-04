<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017/11/27
 * Time: 下午10:50
 */

if (!defined('BASE_PATH')) {
    throw new \LogicException('Must be defined the constant BASE_PATH - the project root path');
}

use Inhere\Library\DI\Container;
use Inhere\Library\Traits\PathAliasTrait;
use Inhere\Library\Traits\LogShortTrait;

/**
 * Class Mco
 */
class Mco
{
    use PathAliasTrait, LogShortTrait;

    /**
     * defined path aliases
     * @var array
     */
    protected static $aliases = [
        '@root' => BASE_PATH,
        '@app' => BASE_PATH . '/app',
        '@bin' => BASE_PATH . '/bin',
        '@src' => BASE_PATH . '/src',
        '@res' => BASE_PATH . '/res',
        '@conf' => BASE_PATH . '/conf',
        '@tmp' => BASE_PATH . '/tmp',
        '@mco' => __DIR__,
    ];

    /**
     * @var \Mco\Base\AppInterface
     */
    public static $app;

    /**
     * @var Container
     */
    public static $di;

    /**
     * @return \Mco\Base\AppInterface
     */
    public static function app()
    {
        return self::$app;
    }

    /**
     * @param null|string $id
     * @return Container
     */
    public static function di($id = null)
    {
        if ($id) {
            return self::$di->get($id);
        }

        return self::$di;
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function get($id)
    {
        return self::$di->get($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getIfExist($id)
    {
        return self::$di->getIfExist($id);
    }

    /**
     * @param string $key
     * @param array $args
     * @param null $lang
     * @return array|string
     */
    public static function tl($key, array $args = [], $lang = null)
    {
        return self::$di->get('lang')->tl($key, $args, $lang);
    }

    /**
     * @see ExtraLogger::log()
     * {@inheritDoc}
     */
    public static function log($level, $message, array $context = [])
    {
        self::$di->get('logger')->log($level, $message, $context);
    }
}
