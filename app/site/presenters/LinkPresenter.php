<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace site\presenters;

use site\model\Link;
use Slim\Slim;

/**
 * Description of LinkPresenter
 *
 * @author klemen
 */
class LinkPresenter extends BasePresenter {

    protected $link;

    public function __construct(Link $link) {
        $this->link = $link;
    }

    public function __toString() {
        return $this->encodeOutput([
                    'url' => $this->link->url,
                    'generated' => [
                        'url' => Slim::getInstance()->config('baseUrl') . '/' . $this->link->code,
                        'code' => $this->link->code,
                    ]
        ]);
    }

}
