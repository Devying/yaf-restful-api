<?php
header ( "Content-Type:text/json charset=utf-8" );
define ( 'ROOT_PATH', dirname ( __FILE__ ) . DIRECTORY_SEPARATOR );
require_once ROOT_PATH . '/vendor/autoload.php';
#设置全局访问类库的位置
ini_set ( 'yaf.library', ROOT_PATH . "/library" );
ini_set ( 'yaf.use_namespace', 1 );
#取到模块名称 随时设置MODULE为模块当前访问模块名称

$uri = $_SERVER[ 'REQUEST_URI' ];
$ary = explode ( '/', $uri );
if ( count ( $ary ) > 1 && strlen ( $ary[ 1 ] ) > 0 ) {
    //这里也可以直接include模块的index.php入口文件
    $module = $ary[ 1 ];
} else {
    $module = 'index';
}
$modules = array ( 'admin', 'home', 'user' );
if ( !in_array ( $module, $modules ) ) {
    $module = 'index';
}
define ( "MODULE", $module );
Yaf_Registry::set ( 'module', $module );

$application = new Yaf_Application( ROOT_PATH . "conf/application.ini" );
try {
    $application->bootstrap ()->run ();
}catch (\Symfony\Component\HttpKernel\Exception\HttpException $exception){
    Base_HttpException::responseHttpException($exception);
}catch ( Exception $exception) {
//    $message = $ex->getMessage();
//    $message .= '<br>'. nl2br($ex->getTraceAsString());
//    echo $message;die;
//    $resource = new League\Fractal\Resource\Item( $ex, function ( Exception $ex ) {
//        return [
//            'message'     => $ex->getMessage (),
//            'status_code' => 500,
//            'debug'       => $ex->getTrace(),
//        ];
//    } );
//    $fractal  = new League\Fractal\Manager();
//    echo $fractal->createData ( $resource )->toJson ();
//    echo json_encode( [
//        'message'     => $ex->getMessage (),
//        'status_code' => 500,
//        'debug'       => $ex->getTrace(),
//    ]);

    Base_Exception::responseException($exception);
}
