<?php

namespace ICanBoogie\Binding\CLDR;

use ICanBoogie\CLDR\Core\Locale;
use ICanBoogie\CLDR\Core\LocaleId;
use ICanBoogie\CLDR\Repository;

/**
 * The locale currently used by the application.
 */
class CurrentLocale
{
    public const DEFAULT_LOCALE_ID = 'en';

    private LocaleId $id;

    public function __construct(
        private readonly Repository $repository,
        string|LocaleId $id = self::DEFAULT_LOCALE_ID
    ) {
        $this->set($id);
    }

    public function set(string|LocaleId $id): void
    {
        $this->id = $id instanceof LocaleId ? $id : LocaleId::of($id);
    }

    public function get(): Locale
    {
        return $this->repository->locale_for($this->id);
    }
}
