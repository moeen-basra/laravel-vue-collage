<?php
/**
 * Created by PhpStorm.
 * User: moeen
 * Date: 12/13/16
 * Time: 7:58 PM
 */

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use InvalidArgumentException;

trait RestExceptionHandlerTrait
{

    /**
     * Creates a new JSON response based on exception type.
     *
     * @param Request $request
     * @param Exception $e
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getJsonResponseForException(Request $request, Exception $exception)
    {
        switch(true) {
            case $this->isModelNotFoundException($exception):
                $e = $this->badRequest("Not Found", 404);
                break;
            case $this->isAuthenticationException($exception):
                $e = $this->badRequest("Unauthorized", 401);
                break;
            case $this->isMethodNotAllowedHttpException($exception):
                $e = $this->badRequest("Method Not Allowed", 405);
                break;
            case $this->isInvalidArgumentException($exception):
                $e = $this->badRequest("Invalid Argument", 422);
                break;
            case $this->isValidationException($exception):
                $e = parent::render($request, $exception);
                break;
            default:
                echo get_class($exception) . '<br>';
                print_r($exception->getMessage());
                exit;
//                $e = $this->badRequest();
        }
        return $e;
    }

    /**
     * Returns json response for generic bad request.
     *
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function badRequest($message='Bad Request', $statusCode=400)
    {
        return $this->jsonResponse(['error' => $message], $statusCode);
    }

    /**
     * Returns json response.
     *
     * @param array|null $payload
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonResponse(array $payload=null, $statusCode=404)
    {
        $payload = $payload ?: [];

        return response()->json($payload, $statusCode);
    }

    /**
     * Determines if the given exception is a validation exception.
     *
     * @param Exception $e
     * @return bool
     */
    protected function isValidationException(Exception $e)
    {
        return $e instanceof ValidationException;
    }

    /**
     * Determines if the given exception is an Eloquent model not found.
     *
     * @param Exception $e
     * @return bool
     */
    protected function isModelNotFoundException(Exception $e)
    {
        return $e instanceof ModelNotFoundException;
    }

    /**
     * Determines if the given exception is an Un Authorised Api Token.
     *
     * @param Exception $e
     * @return bool
     */
    protected function isAuthenticationException(Exception $e)
    {
        return $e instanceof AuthenticationException;
    }

    /**
     * Determines if the given exception is an In valid route call.
     *
     * @param Exception $e
     * @return bool
     */
    protected function isMethodNotAllowedHttpException(Exception $e)
    {
        return $e instanceof ModelNotFoundException;
    }

    /**
     * Determines if the given exception is an In valid argument.
     *
     * @param Exception $e
     * @return bool
     */
    protected function isInvalidArgumentException(Exception $e)
    {
        return $e instanceof InvalidArgumentException;
    }

}
