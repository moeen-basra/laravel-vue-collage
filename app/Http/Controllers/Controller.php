<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Request as RequestFacade;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param $message
     * @param bool $success
     * @param int $code
     * @param array $data
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    protected function sendResponse($message, $success = true, $code = 200, $data = [])
    {

        $response = [
            'success' => $success,
            'message' => $message
        ];

        if (!empty($data)) {
            $response['data'] = $data;
        }

        if (RequestFacade::expectsJson()) {
            return response()
                ->json($response, $code);
        }

        return response($response, $code);
    }
}
