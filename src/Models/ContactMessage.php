<?php
declare(strict_types=1);

namespace App\Models;

use DateTimeImmutable;

/**
 * Class ContactMessage
 * Represents an inbound lead or contact message.
 */
final class ContactMessage
{
    public readonly string $id;
    public readonly DateTimeImmutable $createdAt;

    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $phone,
        public readonly string $service,
        public readonly string $message,
        public readonly string $ipAddress = ''
    ) {
        $this->id = bin2hex(random_bytes(8));
        $this->createdAt = new DateTimeImmutable();
    }

    /**
     * Convert message to associative array for JSON serialization / logging.
     *
     * @return array<string, string>
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'service' => $this->service,
            'message' => $this->message,
            'ip' => $this->ipAddress,
            'created_at' => $this->createdAt->format('Y-m-d H:i:s'),
        ];
    }
}
