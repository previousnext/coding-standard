<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Ignore;

use Drupal\Sniffs\Arrays\ArraySniff;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ArraySniff::class)]
final class IgnoreDrupalArraysArrayLongLineDeclarationTest extends Base {

  /**
   * Checks for 'Drupal.Arrays.Array.LongLineDeclaration'.
   */
  public function testIgnored(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/IgnoreDrupalArraysArrayLongLineDeclaration.php');
    self::assertNoSniffErrorInFile($report);
  }

}
