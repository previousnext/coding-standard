<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Sniffs;

use SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSniff;

/**
 * @covers \SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSniff
 * @see https://github.com/slevomat/coding-standard/blob/master/doc/type-hints.md#slevomatcodingstandardtypehintsreturntypehint-
 */
final class ReturnTypeHintTest extends Base {

  public function testNoError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/ReturnTypeHintNoError.php');
    self::assertNoSniffErrorInFile($report);
  }

  /**
   * Ensures traversables do not need to be fully documented.
   *
   * @covers \SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSniff::CODE_MISSING_TRAVERSABLE_TYPE_HINT_SPECIFICATION
   */
  public function testIgnoreTraversable(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/ReturnTypeHintIgnoreTraversable.php');
    self::assertSame(0, $report->getErrorCount());
    self::assertNoSniffError($report, 8);
  }

  public function testUseless(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/ReturnTypeHintUseless.php');
    self::assertSniffError($report, 8, code: ReturnTypeHintSniff::CODE_USELESS_ANNOTATION);
  }

  public function testUselessWithDescription(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/ReturnTypeHintUselessWithDescription.php');
    self::assertSame(0, $report->getErrorCount());
    self::assertNoSniffError($report, 8);
  }

  protected static function getSniffName(): string {
    return 'SlevomatCodingStandard.TypeHints.ReturnTypeHint';
  }

}
