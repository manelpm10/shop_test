<?php

namespace Module\Shared\Tests\Stub;

use Faker\Factory;

/**
 * Class AbstractStubCreator.
 */
abstract class AbstractStubCreator
{
    /**
     * @var Faker
     */
    private static $faker;

    /**
     * @return \Faker\Generator
     */
    public static function faker()
    {
        return self::$faker = self::$faker ?: Factory::create();
    }
}
