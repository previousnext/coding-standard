<?php

declare(strict_types = 1);

namespace PreviousNext\CodingStandard\Tests\Sniffs;

/**
 * @covers \SlevomatCodingStandard\Sniffs\Classes\RequireMultiLineMethodSignatureSniff
 */
final class RequireMultiLineMethodSignatureTest extends Base {

  public function testNoError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/RequireMultiLineMethodSignatureNoError.php');
    self::assertNoSniffErrorInFile($report);
  }

  public function testError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/RequireMultiLineMethodSignatureError.php');
    self::assertSame(1, $report->getErrorCount());
    self::assertSniffError($report, 15, sniffName: 'SlevomatCodingStandard.Classes.RequireMultiLineMethodSignature', code: 'RequiredMultiLineSignature');
  }

  protected static function getSniffName(): string {
    return 'SlevomatCodingStandard.Classes.RequireMultiLineMethodSignature';
  }

}
