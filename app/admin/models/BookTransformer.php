
<?php

class Transformer_Info extends \League\Fractal\TransformerAbstract
{
    public function transform(InfoModel $info)
    {
        return $info->getInfo();
    }
}
