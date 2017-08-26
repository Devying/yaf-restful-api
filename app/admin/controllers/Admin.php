<?php
class AdminController extends Base_Control{
    public $actions=array(
        "info"=>"actions/Info.php",
        "m3u8"=>"actions/M3u8.php",
    );

    public function init()
    {
        parent::init();

    }

    public function helloAction(){
        echo __METHOD__;
    }
}