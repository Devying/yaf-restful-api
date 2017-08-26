<?php
/**
 * @name SamplePlugin
 * @desc Yaf定义了如下的6个Hook,插件之间的执行顺序是先进先Call
 * @see http://www.php.net/manual/en/class.yaf-plugin-abstract.php
 * @author root
 */
class Base_Plugins extends Yaf_Plugin_Abstract {
    public function routerStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
//        $request->setBaseUri('/'.MODULE);
    }

    public function routerShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
        #修改控制器为Index 修改 模块/控制器/操作  为  模块/操作

//        echo "<br>uri:".$request->getBaseUri();
//
//        echo '<br>module:'.$request->getModuleName();
//        echo "<br>uri:".$request->getBaseUri();
//        echo "<br>control:".$request->getControllerName();
//        echo "<br>action:".$request->getActionName();

        #$request->setModuleName(MODULE);
        #$request->setControllerName ( ucfirst(MODULE) );

    }
    public function dispatchLoopStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {

    }
    public function preDispatch(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {

    }
    public function postDispatch(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
        #先给结果再给$request
    }
    public function dispatchLoopShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
        #先给结果再给$request

    }
}
