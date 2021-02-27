<?php

/*
 * This file is part of the biblys/isbn package.
 *
 * (c) Clément Bourgoin
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

use Biblys\Isbn\ISBN;
use PHPUnit\Framework\TestCase;

class testConvertToIsbn10 extends TestCase
{
    public function testFormatIsbn10()
    {
        $isbn10 = ISBN::convertToIsbn10("9783464603529");
        $this->assertEquals(
            "3-464-60352-0",
            $isbn10,
            "It should convert to ISBN-10"
        );
    }

    public function testFormatIsbn10WithX()
    {
        $isbn10 = ISBN::convertToIsbn10("978-80-7203-717-9");
        $this->assertEquals(
            "80-7203-717-X",
            $isbn10,
            "It should convert to ISBN-10 with X as a checksum character"
        );
    }

    public function testFormatIsbn10InvalidIsbn()
    {
        $this->expectException("Biblys\Isbn\IsbnParsingException");
        // FIXME: Improve message: Input contains invalid characters "ABC"
        $this->expectExceptionMessage("Invalid characters in the code");

        ISBN::convertToIsbn10("ABC-80-7203-7");
    }
}
