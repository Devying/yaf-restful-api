<?php

class Base_Control extends Yaf_Controller_Abstract
{

    protected $uri;
    protected $request;
    protected $response;
    protected $method;
    protected $protocol;
    protected $body;
    private $methodAllow = array(
        "/admin/m3u8"=>array('PUT','GET'),
        "/admin/info"=>array('GET')
    );
    public function init()
    {
        $this->request = $this->getRequest();
        $this->response = $this->getResponse();
        $this->response->setHeader('Content-Type', 'text/json; charset=utf-8');
        $this->method = $this->request->getMethod();
        $this->protocol = $this->request->getServer('SERVER_PROTOCOL');
        $this->body = ob_get_contents() . $this->response->getBody();
        $this->uri = $this->request->getRequestUri();
        $this->checkRequest();
    }
    private function checkRequest()
    {
        if (!isset($this->methodAllow[$this->uri])) {
            throw new \Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException();
        }
        if (!in_array($this->method, $this->methodAllow[$this->uri])) {
            throw new \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException($this->methodAllow[$this->uri]);
        }
    }
//
//    public function withStatus($statusCode=200)
//    {
//        $message = isset(Base_HttpException::$messages[$statusCode])?Base_HttpException::$messages[$statusCode]:"";
//        $this->response->setHeader($this->protocol, sprintf('%s %s', $statusCode, $message));
//        return $this;
//    }
//
//    public function withHeader($name, $value)
//    {
//        $this->response->setHeader($name, $value);
//        return $this;
//    }
//
//    public function withBody($body)
//    {
//        $this->response->setBody($body);
//        return $this;
//    }
//
//    public function removeBody()
//    {
//        @ob_clean();
//        //$this->response->clearBody();
//    }

}