<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use RuntimeException;
use Throwable;

class NotFoundException extends RuntimeException
{
    public function __construct(
        string $message,
        int $code = Response::HTTP_NOT_FOUND,
        ?Throwable $previous = null
    )
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * 例外排出時の表示内容
     *
     * @param Request $request
     * @return Response
     */
    public function render(Request $request): Response
    {
        return response()->view('admin.error.404', ['message' => $this->message], 404);
    }
}