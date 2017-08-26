<?php
use League\Fractal\Resource\Collection;
class InfoAction extends Base_Action{
    public function execute(){
        $info = new InfoModel();
//        $infoResult = $info->transform();
//        $resource = new Collection($infoResult, function(array $item) {
//            return $item;
//        });

        $resource = new Collection($info->getInfo(), new Transformer_InfoModel());
        $this->withStatus(200)->Many($resource);
    }
}
