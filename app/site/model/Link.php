<?php

namespace site\model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Link extends Eloquent {

    protected $table = 'links';
    protected $fillable = ['url', 'code'];
    
    public function generateShortCode(){
        return base_convert($this->id + 100000, 10, 36);
    }

}
