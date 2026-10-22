<?php
declare(strict_types=1);

namespace App\Models;

/**
 * Class Niche
 * Represents a specialized commercial niche/sector.
 */
class Niche
{
    /**
     * @param string $id Unique slug identifier
     * @param string $name Full formal niche name
     * @param string $badge Short badge text (e.g. Gastronomía)
     * @param string $tagline One-sentence niche pitch
     * @param string $description Detailed intro of tailored services
     * @param string $coverImage Representative cover image path
     * @param array<string> $services List of tailored services for this niche
     * @param array<array{type: string, src: string, title?: string, caption?: string}> $gallery
     * @param string|null $video Optional featured video path
     * @param int $order Display order
     * @param string|null $heroImage Optional featured circular image for the hero section
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $badge,
        public readonly string $tagline,
        public readonly string $description,
        public readonly string $coverImage,
        public readonly array $services,
        public readonly array $gallery,
        public readonly ?string $video = null,
        public readonly int $order = 1,
        public readonly ?string $heroImage = null
    ) {}

    /**
     * Get two-digit formatted order number.
     */
    public function formattedOrder(): string
    {
        return str_pad((string)$this->order, 2, '0', STR_PAD_LEFT);
    }

    /**
     * Get URL for this niche detail page.
     */
    public function url(): string
    {
        return '/nicho/' . urlencode($this->id);
    }
}
