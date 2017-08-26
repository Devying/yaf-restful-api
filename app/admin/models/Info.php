<?php
class InfoModel {

    public $name;
    public $age;
    public $job;

    public function __construct() {

    }

    public function getInfo(){
        return [
            ['name'=>'huangby','age'=>28,'job'=>'developer'],
            ['name'=>'yangmy','age'=>35,'job'=>'developer'],
            ['name'=>'zhoujy','age'=>26,'job'=>'developer'],
            ['name'=>'pengbq','age'=>26,'job'=>'developer'],
        ];
    }
}
