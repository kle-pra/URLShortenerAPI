<?php

use site\model\Link;

$app->post('/api/generate', function() use ($app) {
    $payload = json_decode($app->request->getBody());

    //check if url is present in json
    if (empty($payload) || empty($payload->url)) {
        $app->response->setStatus(400);

        return $app->response->write(
                        json_encode([
                    'error' => [
                        'code' => 1000,
                        'message' => 'A URL is required'
                    ]
                        ])
        );
    }

    //check if url is valid
    if (!filter_var($payload->url, FILTER_VALIDATE_URL)) {
        $app->response->setStatus(400);

        return $app->response->write(
                        json_encode([
                    'error' => [
                        'code' => 1000,
                        'message' => 'A valid URL is required'
                    ]
                        ])
        );
    }

    //see if url already exists in DB and send existing code
    $link = Link::where('url', $payload->url)->first();

    if ($link) {
        $app->response->setStatus(201);

        return $app->response->write(
                        json_encode([
                    'url' => $payload->url,
                    'generated' => [
                        'url' => $app->config['baseUrl'] . "/" . $link->code,
                        'code' => $link->code,
                    ]
                        ])
        );
    }
});
