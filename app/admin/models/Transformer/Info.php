
<?php

class Transformer_InfoModel extends \League\Fractal\TransformerAbstract
{
    public function transform($data)
    {
        return $data;
//        $info = new InfoModel();
//        return [
//            'name'=>$data['name'],
//            'age'=>$data['age'],
//            'job'=>$data['job'],
//        ];
    }
}
