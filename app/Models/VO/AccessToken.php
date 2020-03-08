<?php


namespace App\Models\VO;


class AccessToken
{

    public $access_token;
    public $token_type;
    public $expires_in;

    public function accessToken(){
        return  $this->access_token;
    }

    public function token(){
        return ucfirst($this->token_type) . ' ' .  $this->access_token;
    }

    public function type(){
        return $this->token_type;
    }

    public function expires(){
        return $this->expires_in;
    }
}
