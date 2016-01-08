<?php

namespace site\model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Link extends Eloquent {

    protected $table = 'links';
    protected $fillable = ['url', 'code'];

}
