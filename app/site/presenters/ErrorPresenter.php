<?php

namespace site\presenters;

/**
 * Description of ErrorPresenter
 *
 * @author klemen
 */
class ErrorPresenter extends BasePresenter {

    protected $code;
    protected $message;

    function __construct($code, $message) {

        $this->code = $code;
        $this->message = $message;
    }

    public function __toString() {
        return $this->encodeOutput([
                    'error' => [
                        'code' => $this->code,
                        'message' => $this->message
                    ]
        ]);
    }

}
