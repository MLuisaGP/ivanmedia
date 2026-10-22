<?php
declare(strict_types=1);

namespace App\Core;

use Valitron\Validator as ValitronValidator;

/**
 * Class Validator
 * Wrapper around Valitron with localized messages and labels.
 */
final class Validator
{
    private ValitronValidator $validator;

    public function __construct(array $data)
    {
        ValitronValidator::lang('es');
        $this->validator = new ValitronValidator($data);
    }

    /**
     * Add a validation rule.
     */
    public function rule(string $rule, string|array $fields, mixed ...$params): self
    {
        $this->validator->rule($rule, $fields, ...$params);
        return $this;
    }

    /**
     * Set user-friendly field labels in Spanish.
     */
    public function labels(array $labels): self
    {
        $this->validator->labels($labels);
        return $this;
    }

    /**
     * Run validation.
     */
    public function validate(): bool
    {
        return $this->validator->validate();
    }

    /**
     * Retrieve all error messages indexed by field.
     *
     * @return array<string, array<string>>
     */
    public function errors(): array
    {
        return $this->validator->errors();
    }

    /**
     * Get the first error message as a single string for display.
     */
    public function firstError(): ?string
    {
        $errors = $this->errors();
        if (empty($errors)) {
            return null;
        }

        $firstField = reset($errors);
        return is_array($firstField) ? reset($firstField) : (string)$firstField;
    }
}
