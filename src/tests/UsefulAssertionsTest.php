<?php

use PHPUnit\Framework\TestCase;

class UsefulAssertionsTest extends TestCase
{
  public function testAssertSame()
  {
    $expected = 'test';

    $result = 'TEST';

    $this->assertSame($expected, $result);
  }

  public function testAssertEquals()
  {
    $expected = 1;

    $result = 2;

    $this->assertEquals($expected, $result);
  }

  public function testAssertEmpty()
  {
    $this->assertEmpty(['test']);
  }

  public function testAssertNull()
  {
    $this->assertNull('test');
  }

  public function testAssertGreaterThan()
  {
    $expected = 1;

    $actual = 2;

    $this->assertGreaterThan($expected, $actual);
  }

  public function testAssertFalse()
  {
    $this->assertFalse(true);
  }

  public function testAssertTrue()
  {
    $this->assertTrue(false);
  }

  public function testAssertCount()
  {
    $this->assertCount(3, [1, 2]);
  }

  public function testAssertContains()
  {
    $this->assertContains(3, [1, 2]);
  }

  public function testAssertStringContainsString()
  {
    $search = 'aaa';

    $string = 'aaa';

    $this->assertStringContainsString($search, $string);
  }

  public function testAssertInstanceOf()
  {
    $this->assertInstanceOf(RuntimeException::class, new Exception());
  }

  public function testAssertArrayHasKey()
  {
    $this->assertArrayHasKey('key1', ['key0' => 'aa']);
  }

  public function testAssertDirectoryIsWritable()
  {
    $this->assertDirectoryIsNotWritable('/pat/to/dir');
  }

  public function testAssertFileIsWritable()
  {
    $this->assertFileIsWritable('/path/to/file');
  }
}
