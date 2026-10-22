<?php
declare(strict_types=1);

namespace App\Models;

/**
 * Class Project
 * Represents a portfolio project entity.
 */
final class Project
{
    public function __construct(
        public readonly string $id,
        public readonly string $title,
        public readonly string $category,
        public readonly string $tag,
        public readonly string $image,
        public readonly string $description,
        public readonly int $order
    ) {}

    /**
     * Get two-digit formatted display index (e.g. 01, 02).
     */
    public function formattedNumber(): string
    {
        return str_pad((string)$this->order, 2, '0', STR_PAD_LEFT);
    }
}
