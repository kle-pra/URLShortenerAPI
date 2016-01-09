<?php

use site\model\Link;
use site\presenters\ErrorPresenter;
use site\presenters\LinkPresenter;

$app->post('/api/generate', function() use ($app) {
    $payload = json_decode($app->request->getBody());

    //check if url is present in json
    if (empty($payload) || empty($payload->url)) {
        $app->response->setStatus(400);

        return $app->response->write(new ErrorPresenter(1001, 'A URL is required.'));
    }

    //check if url is valid
    if (!filter_var($payload->url, FILTER_VALIDATE_URL)) {
        $app->response->setStatus(400);

        return $app->response->write(new ErrorPresenter(1002, 'A valid URL is required.'));
    }

    //see if url already exists in DB and send existing code
    $link = Link::where('url', $payload->url)->first();

    if ($link) {
        $app->response->setStatus(201);

        return $app->response->write(new LinkPresenter($link));
    }

    //Create new link record   
    $newLink = Link::create([
                'url' => $payload->url
    ]);

    $newLink->update([
        'code' => base_convert($newLink->id, 10, 36)
    ]);

    $app->response->setStatus(201);

    return $app->response->write(new LinkPresenter($newLink));
});
