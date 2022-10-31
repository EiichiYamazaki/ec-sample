<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Http\Request;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class NotFoundException extends RuntimeException
{
    public function __construct(
        string $message,
        int $code = Response::HTTP_NOT_FOUND,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * 例外排出時の表示内容
     */
    public function render(Request $request): Response
    {
        return response()->view('admin.error.404', ['message' => $this->message], 404);
    }
}
