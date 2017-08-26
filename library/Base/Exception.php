<?php

class Base_Exception extends Yaf_Exception {
    public static function responseException(Exception $e){
        $responseMessage=[];
        $responseMessage['message']=$e->getMessage();
        $responseMessage['status_code']=500;
        $debug = [];
        $debug['line'] = $e->getLine();
        $debug['file'] = $e->getFile();
//        $debug['class'] = $e->getCode();
        $debug['traceArray'] = explode(PHP_EOL,$e->getTraceAsString());
        $debug['trace'] = $e->getTrace();
        $responseMessage['debug']=$debug;
        echo json_encode($responseMessage);
        $serverProtocol = isset( $_SERVER[ 'SERVER_PROTOCOL' ] ) ? $_SERVER[ 'SERVER_PROTOCOL' ] : "HTTP/1.1";
        $headerResponse = sprintf ( "%s %d %s", $serverProtocol, 500, 'Internal Server Error' );
        header ( $headerResponse );die;
    }
}