<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017/11/27
 * Time: 下午11:53
 */

namespace Mco\Base;

use Inhere\Event\EventManager;
use Inhere\Library\DI\Container;
use Inhere\Library\DI\ServiceProviderInterface;

/**
 * Class CommonServiceProvider
 * @package Mco\Base
 */
class CommonServiceProvider implements ServiceProviderInterface
{
    /**
     * 注册一项服务(可能含有多个服务)提供者到容器中
     * @param Container $di
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function register(Container $di)
    {
        if (!isset($di['eventManager'])) {
            $di->set('eventManager', function () {
                return new EventManager();
            });
        }
    }
}
