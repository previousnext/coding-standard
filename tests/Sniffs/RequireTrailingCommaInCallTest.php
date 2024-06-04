<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Sniffs;

use PHPUnit\Framework\Attributes\CoversClass;
use SlevomatCodingStandard\Sniffs\Functions\RequireTrailingCommaInDeclarationSniff;

#[CoversClass(RequireTrailingCommaInDeclarationSniff::class)]
final class RequireTrailingCommaInCallTest extends Base {

  public function testNoError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/RequireTrailingCommaInCallNoError.php');
    self::assertNoSniffErrorInFile($report);
  }

  public function testError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/RequireTrailingCommaInCallError.php');
    self::assertSame(1, $report->getErrorCount());
    self::assertSniffError($report, 7, sniffName: 'SlevomatCodingStandard.Functions.RequireTrailingCommaInCall', code: RequireTrailingCommaInDeclarationSniff::CODE_MISSING_TRAILING_COMMA);
  }

  protected static function getSniffName(): string {
    return 'SlevomatCodingStandard.Functions.RequireTrailingCommaInCall';
  }

}
