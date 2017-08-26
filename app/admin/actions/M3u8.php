<?php
use League\Fractal\Resource\Item;
class M3u8Action extends Base_Action{
    public function execute() {
        //throw new Exception("i am imooc exception");
        $book = new BookModel();
        $resource = new Item($book, function(BookModel $book) {
            return [
                'id'      => (int) $book->id,
                'title'   => $book->title,
                'year'    => (int) $book->yr,
                'links'   => [
                    'self' => '/books/'.$book->id,
                ]
            ];
        });
        $this->withStatus(202)->item($resource);
    }
}
