<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Sniffs;

use PHP_CodeSniffer\Standards\Squiz\Sniffs\WhiteSpace\FunctionOpeningBraceSpaceSniff;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(FunctionOpeningBraceSpaceSniff::class)]
final class FunctionOpeningBraceSpaceSpacingAfterTest extends Base {

  public function testNoError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/FunctionOpeningBraceSpaceSpacingAfterNoError.php');
    self::assertNoSniffErrorInFile($report);
  }

  public function testError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/FunctionOpeningBraceSpaceSpacingAfterError.php');
    self::assertSame(1, $report->getErrorCount());
    self::assertSniffError($report, 15, sniffName: 'Squiz.WhiteSpace.FunctionOpeningBraceSpace', code: 'SpacingAfter');
  }

  protected static function getSniffName(): string {
    return 'Squiz.WhiteSpace.FunctionOpeningBraceSpace.SpacingAfter';
  }

}
