<?php

use site\model\Link;
use site\presenters\ErrorPresenter;

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

        return $app->response->write(json_encode([
                    'url' => $payload->url,
                    'generated' => [
                        'url' => $app->config['baseUrl'] . "/" . $link->code,
                        'code' => $link->code,
                    ]
                        ])
        );
    }

    //Create new link record   
    $newLink = Link::create([
                'url' => $payload->url
    ]);

    $newLink->update([
        'code' => base_convert($newLink->id, 10, 36)
    ]);

    return $app->response->write(json_encode([
                'url' => $payload->url,
                'generated' => [
                    'url' => $app->config['baseUrl'] . "/" . $newLink->code,
                    'code' => $newLink->code,
                ]
                    ])
    );
});
