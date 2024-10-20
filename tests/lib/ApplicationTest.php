<?php

namespace Test\ICanBoogie\Binding\CLDR;

use ICanBoogie\Binding\CLDR\CurrentLocale;
use ICanBoogie\CLDR\Repository;
use PHPUnit\Framework\TestCase;

use function ICanBoogie\app;

final class ApplicationTest extends TestCase
{
    public function test_service_for_repository(): void
    {
        $actual = app()->service_for_class(Repository::class);

        $this->assertInstanceOf(Repository::class, $actual);
    }

    public function test_format_number(): void
    {
        $actual = app()
            ->service_for_class(Repository::class)
            ->locale_for('fr')
            ->format_number("1234567.89");

        $this->assertEquals("1 234 567,89", $actual);
        $this->assertFileExists(CACHE . "numbers--fr--numbers.php");
    }

    public function test_current_locale(): void
    {
        $current_locale = app()->service_for_class(CurrentLocale::class);
        $actual = $current_locale->get();
        $this->assertEquals(CurrentLocale::DEFAULT_LOCALE_ID, $actual->id->value);

        $current_locale->set("fr");
        $actual = $current_locale->get();
        $this->assertEquals("fr", $actual->id->value);
    }
}
