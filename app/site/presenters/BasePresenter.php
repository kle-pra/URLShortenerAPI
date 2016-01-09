<?php

namespace site\presenters;

class BasePresenter
{
    
    public function encodeOutput($input){
        return json_encode($input);
    }
    
}
