<?php

abstract class Base_Action extends Yaf_Action_Abstract{

    public function withStatus($statusCode=200)
    {
        $message = isset(Base_HttpException::$messages[$statusCode])?Base_HttpException::$messages[$statusCode]:"";
        $this->getController()->getResponse()->setHeader($this->getController()->getRequest()->getServer('SERVER_PROTOCOL'), sprintf('%s %s', $statusCode, $message));
        return $this;
    }

    public function withHeader($name, $value)
    {
        $this->getController()->getResponse()->setHeader($name, $value);
        return $this;
    }

    public function withBody($body)
    {
        $this->getController()->getResponse()->setBody($body);
        return $this;
    }

    public function removeBody()
    {
        @ob_clean();
        //$this->response->clearBody();
    }

    public function assign( $key, $val ) {
        $this->getView()-> assign( $key, $val );
    }
    public function item($data){
        $fractal = new \League\Fractal\Manager();
        $json =  $fractal->createData($data)->toJson();
        $this->withBody($json);
        return $this;
    }
    public function Many($data){
        $fractal = new \League\Fractal\Manager();
        $json =  $fractal->createData($data)->toJson();
        $this->withBody($json);
        return $this;
    }

}