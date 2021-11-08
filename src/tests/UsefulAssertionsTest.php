<?php

use PHPUnit\Framework\TestCase;

class UsefulAssertionsTest extends TestCase
{
  public function testAssertSame()
  {
    $expected = 'test';

    $result = 'test';

    $this->assertSame($expected, $result);
  }

  public function testAssertEquals()
  {
    $expected = 2;

    $result = 2;

    $this->assertEquals($expected, $result);
  }

  public function testAssertEmpty()
  {
    $this->assertEmpty([]);
  }

  public function testAssertNull()
  {
    $this->assertNull(null);
  }

  public function testAssertGreaterThan()
  {
    $expected = 1;

    $actual = 2;

    $this->assertGreaterThan($expected, $actual);
  }

  public function testAssertFalse()
  {
    $this->assertFalse(false);
  }

  public function testAssertTrue()
  {
    $this->assertTrue(true);
  }

  public function testAssertCount()
  {
    $this->assertCount(3, [1, 2, 1]);
  }

  public function testAssertContains()
  {
    $this->assertContains(3, [1, 2, 3]);
  }

  public function testAssertStringContainsString()
  {
    $search = 'aaa';

    $string = 'aaaasdasaada';

    $this->assertStringContainsString($search, $string);
  }

  public function testAssertInstanceOf()
  {
    $this->assertInstanceOf(RuntimeException::class, new RuntimeException());
  }

  public function testAssertArrayHasKey()
  {
    $this->assertArrayHasKey('key1', ['key1' => 'aa']);
  }

  public function testAssertDirectoryIsWritable()
  {
    $this->assertDirectoryIsNotWritable('notWritable');
  }

  public function testAssertFileIsWritable()
  {
    $this->assertFileIsWritable('writableFile');
  }
}
