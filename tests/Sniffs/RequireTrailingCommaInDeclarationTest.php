<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Sniffs;

/**
 * @covers \SlevomatCodingStandard\Sniffs\Classes\RequireMultiLineMethodSignatureSniff
 */
final class RequireTrailingCommaInDeclarationTest extends Base {

  public function testNoError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/RequireTrailingCommaInDeclarationNoError.php');
    self::assertNoSniffErrorInFile($report);
  }

  public function testNoErrorSingleLine(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/RequireTrailingCommaInDeclarationSingleLineNoError.php');
    self::assertNoSniffErrorInFile($report);
  }

  public function testError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/RequireTrailingCommaInDeclarationError.php');
    self::assertSame(1, $report->getErrorCount());
    self::assertSniffError($report, 17, sniffName: 'SlevomatCodingStandard.Functions.RequireTrailingCommaInDeclaration', code: 'MissingTrailingComma');
  }

  protected static function getSniffName(): string {
    return 'SlevomatCodingStandard.Functions.RequireTrailingCommaInDeclaration';
  }

}
