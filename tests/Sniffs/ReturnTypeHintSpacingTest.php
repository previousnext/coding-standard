<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Sniffs;

use SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSpacingSniff;

/**
 * @covers \SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSpacingSniff
 */
final class ReturnTypeHintSpacingTest extends Base {

  public function testNoError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/ReturnTypeHintSpacingNoError.php');
    self::assertNoSniffErrorInFile($report);
  }

  public function testError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/ReturnTypeHintSpacingError.php');
    self::assertSame(1, $report->getErrorCount());
    self::assertSniffError($report, 8, ReturnTypeHintSpacingSniff::CODE_WHITESPACE_BEFORE_COLON);
  }

  protected static function getSniffName(): string {
    return 'SlevomatCodingStandard.TypeHints.ReturnTypeHintSpacing';
  }

}
