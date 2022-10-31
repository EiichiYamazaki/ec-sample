<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Support\Facades\Log;

class NoItemException extends NotFoundException
{
    public function __construct(
        private readonly int $itemId,
        string $message
    ) {
        parent::__construct($message);
    }

    /**
     * ログの出力
     */
    public function report(): bool
    {
        Log::info(sprintf('%s item id : %s', $this->message, $this->itemId));

        return true;
    }
}
