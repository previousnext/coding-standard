<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Sniffs;

use PHP_CodeSniffer\Standards\Squiz\Sniffs\WhiteSpace\FunctionOpeningBraceSpaceSniff;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(FunctionOpeningBraceSpaceSniff::class)]
final class FunctionClosingBraceSpacingBeforeCloseTest extends Base {

  public function testNoError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/FunctionClosingBraceSpacingBeforeCloseNoError.php');
    self::assertNoSniffErrorInFile($report);
  }

  public function testError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/FunctionClosingBraceSpacingBeforeCloseError.php');
    self::assertSame(1, $report->getErrorCount());
    self::assertSniffError($report, 18, sniffName: 'PSR2.Methods.FunctionClosingBrace', code: 'SpacingBeforeClose');
  }

  protected static function getSniffName(): string {
    return 'PSR2.Methods.FunctionClosingBrace.SpacingBeforeClose';
  }

}
