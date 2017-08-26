<?php

/**
 * @name Bootstrap
 * @author root
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * 其实这个类如果是空的话也不影响
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Base_Bootstrap extends Yaf_Bootstrap_Abstract {

    public function _initConfig () {
        //把配置保存起来
        $config = Yaf_Application::app ()->getConfig ();
        Yaf_Registry::set ( 'config', $config );
    }

    public function _initPlugin ( Yaf_Dispatcher $dispatcher ) {
        //注册一个插件
        $objSamplePlugin = new Base_Plugins();
        $dispatcher->registerPlugin ( $objSamplePlugin );
    }

    public function _initRoute ( Yaf_Dispatcher $dispatcher ) {
//		//在这里注册自己的路由协议,默认使用简单路由
//        $router = $dispatcher->getRouter();
//        $router->addConfig(Yaf_Registry::get("config")->routes);

//        $routeArr = new Yaf_Route_Supervar('r');
//        $dispatcher->getRouter()->addRoute("name",$routeArr);

//        $route = new Yaf_Route_Rewrite('user/:uid',array('module'=>'User','controller' => 'User','action' => 'show'));
//        $dispatcher->getRouter()->addRoute('user', $route);

    }

    public function _initView ( Yaf_Dispatcher $dispatcher ) {
        //在这里注册自己的view控制器，例如smarty,firekylin
        ini_set('yaf.use_spl_autoload',0 );
        Yaf_Dispatcher::getInstance ()->disableView ();
        //echo "_initView<br/>";
    }

    public function _initDefaultName ( Yaf_Dispatcher $dispatcher ) {
        //$dispatcher->setDefaultModule("Index")->setDefaultController("Index")->setDefaultAction("index");
    }
    public function _initLocalName () {
        Yaf_Loader::getInstance()->registerLocalNamespace("Transformer");
    }
}
