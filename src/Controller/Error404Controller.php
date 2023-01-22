<?php

declare(strict_types=1);

namespace WKaba\ProductPage\Controller;

class Error404Controller implements Controller
{
    public function run()
    {
        http_response_code(404);
    }
}
