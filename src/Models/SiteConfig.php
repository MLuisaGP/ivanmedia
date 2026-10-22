<?php
declare(strict_types=1);

namespace App\Models;

/**
 * Class SiteConfig
 * Value object holding immutable site identity and contact links.
 */
final class SiteConfig
{
    public function __construct(
        public readonly string $name = 'Ivan Media',
        public readonly string $eyebrow = 'Estudio creativo · Foto · Video · Contenido',
        public readonly string $whatsapp = 'https://wa.me/526621234567',
        public readonly string $email = 'hola@ivanmedia.com',
        public readonly string $instagram = 'https://instagram.com/',
        public readonly string $location = 'Hermosillo, Sonora',
        public readonly string $description = 'Ivan Media: fotografía, video y contenido visual para marcas que quieren destacar.'
    ) {}

    /**
     * Default application configuration factory.
     */
    public static function load(): self
    {
        return new self();
    }
}
