<?php


namespace App\Helpers;

use Illuminate\Contracts\Support\Jsonable;

class JsonUtil implements Jsonable
{

    private $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function decode(){
        return json_decode($this->content);
    }

    public function toJson($options = 0)
    {
        return json_encode($this->content);
    }
}
