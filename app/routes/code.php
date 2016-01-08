<?php
use site\model\Link;

$app->get('/:code', function($code) use ($app){
    $link = Link::where('code',$code)->first();
    
    if(!$link){
        $app->notFound();
    }else{
        $app->response->redirect($link->url);
        
    }
    
});