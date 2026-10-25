<?php
declare(strict_types=1);

namespace App\Models;

/**
 * Class SiteConfig
 * Value object holding immutable site identity, business hours and contact configuration loaded from .env.
 */
final class SiteConfig
{
    public readonly string $name;
    public readonly string $eyebrow;
    public readonly string $email;
    public readonly string $phone;
    public readonly string $phoneFormatted;
    public readonly string $phoneTelUrl;
    public readonly string $whatsapp;
    public readonly string $whatsappNumber;
    public readonly string $instagram;
    public readonly string $instagramHandle;
    public readonly string $facebook;
    public readonly string $x;
    public readonly string $linkedin;
    public readonly string $location;
    public readonly string $schedule;
    public readonly string $description;

    public function __construct(
        ?string $name = null,
        ?string $eyebrow = null,
        ?string $email = null,
        ?string $phone = null,
        ?string $phoneFormatted = null,
        ?string $whatsapp = null,
        ?string $instagram = null,
        ?string $facebook = null,
        ?string $x = null,
        ?string $linkedin = null,
        ?string $location = null,
        ?string $schedule = null,
        ?string $description = null
    ) {
        $this->name = $name ?? (string)env('APP_NAME', env('SITE_NAME', 'Ivan Media'));
        $this->eyebrow = $eyebrow ?? (string)env('SITE_EYEBROW', 'Estudio creativo · Foto · Video · Contenido');
        $this->email = $email ?? (string)env('CONTACT_EMAIL', env('EMAIL', 'ivanmolina@ivanmedia.com.mx'));

        // Phone normalization
        $rawPhone = $phone ?? (string)env('CONTACT_PHONE', env('TELEFONO', '6623422103'));
        $cleanPhone = preg_replace('/[^\d]/', '', $rawPhone) ?: '6623422103';
        $this->phone = $cleanPhone;
        $this->phoneFormatted = $phoneFormatted ?? (string)env('CONTACT_PHONE_FORMATTED', self::formatPhoneNumber($cleanPhone));
        $this->phoneTelUrl = 'tel:+' . (str_starts_with($cleanPhone, '52') ? $cleanPhone : '52' . $cleanPhone);

        // WhatsApp normalization (supports raw digits or full URL)
        $rawWhatsapp = $whatsapp ?? (string)env('CONTACT_WHATSAPP', env('WHATSAPP', env('Whatsapp', '526623422103')));
        if (str_starts_with($rawWhatsapp, 'http://') || str_starts_with($rawWhatsapp, 'https://')) {
            $this->whatsapp = $rawWhatsapp;
            $this->whatsappNumber = preg_replace('/[^\d]/', '', parse_url($rawWhatsapp, PHP_URL_PATH) ?? '') ?: '526623422103';
        } else {
            $cleanWa = preg_replace('/[^\d]/', '', $rawWhatsapp) ?: '526623422103';
            if (strlen($cleanWa) === 10) {
                $cleanWa = '52' . $cleanWa;
            }
            $this->whatsappNumber = $cleanWa;
            $this->whatsapp = "https://wa.me/{$cleanWa}";
        }

        // Instagram normalization (supports handle with/without @ or full URL)
        $rawInstagram = $instagram ?? (string)env('CONTACT_INSTAGRAM', env('INSTAGRAM', '_ivan.media'));
        if (str_starts_with($rawInstagram, 'http://') || str_starts_with($rawInstagram, 'https://')) {
            $this->instagram = $rawInstagram;
            $this->instagramHandle = trim((string)parse_url($rawInstagram, PHP_URL_PATH), '/');
        } else {
            $cleanIg = ltrim(trim($rawInstagram), '@');
            $this->instagramHandle = $cleanIg;
            $this->instagram = $cleanIg !== '' ? "https://instagram.com/{$cleanIg}" : '';
        }

        // Social networks
        $rawFb = $facebook ?? (string)env('CONTACT_FACEBOOK', env('FACEBOOK', ''));
        $this->facebook = self::normalizeSocialUrl($rawFb, 'https://facebook.com/');

        $rawX = $x ?? (string)env('CONTACT_X', env('X', ''));
        $this->x = self::normalizeSocialUrl($rawX, 'https://x.com/');

        $rawLi = $linkedin ?? (string)env('CONTACT_LINKEDIN', env('LINKEDIN', ''));
        $this->linkedin = self::normalizeSocialUrl($rawLi, 'https://linkedin.com/in/');

        // Location, business hours & site description
        $this->location = $location ?? (string)env('CONTACT_LOCATION', env('LOCATION', 'Hermosillo, Sonora, México'));
        $this->schedule = $schedule ?? (string)env('CONTACT_SCHEDULE', env('SCHEDULE', 'Lunes a Sábado · 9:00 AM – 7:00 PM'));
        $this->description = $description ?? (string)env('SITE_DESCRIPTION', 'Ivan Media: fotografía, video y contenido visual para marcas que quieren destacar.');
    }

    /**
     * Factory instance loader.
     */
    public static function load(): self
    {
        return new self();
    }

    /**
     * Build a WhatsApp URL with an optional pre-filled message.
     *
     * @param string|null $message Optional pre-filled text.
     * @return string Complete WhatsApp URL.
     */
    public function whatsappUrl(?string $message = null): string
    {
        if (empty($message)) {
            return $this->whatsapp;
        }

        $separator = str_contains($this->whatsapp, '?') ? '&' : '?';
        return $this->whatsapp . $separator . 'text=' . rawurlencode($message);
    }

    /**
     * Format a 10 or 12 digit phone number into a friendly international string.
     * Example: 6623422103 -> +52 (662) 342-2103
     */
    private static function formatPhoneNumber(string $digits): string
    {
        $clean = preg_replace('/[^\d]/', '', $digits);
        if (strlen($clean) === 12 && str_starts_with($clean, '52')) {
            $clean = substr($clean, 2);
        }

        if (strlen($clean) === 10) {
            return sprintf('+52 (%s) %s-%s', substr($clean, 0, 3), substr($clean, 3, 3), substr($clean, 6, 4));
        }

        return $digits;
    }

    /**
     * Normalize social profile links.
     */
    private static function normalizeSocialUrl(string $value, string $baseUrl): string
    {
        $value = trim($value);
        if ($value === '') {
            return '';
        }

        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
            return $value;
        }

        return rtrim($baseUrl, '/') . '/' . ltrim($value, '@/');
    }
}
