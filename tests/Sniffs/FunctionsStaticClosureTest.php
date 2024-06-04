<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Sniffs;

/**
 * @covers \SlevomatCodingStandard\Sniffs\Functions\StaticClosureSniff
 */
final class FunctionsStaticClosureTest extends Base {

  public function testNoError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/FunctionsStaticClosureNoError.php');
    self::assertNoSniffErrorInFile($report);
  }

  public function testError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/FunctionsStaticClosureError.php');
    self::assertSame(1, $report->getErrorCount());
    self::assertSniffError($report, 16, sniffName: 'SlevomatCodingStandard.Functions.StaticClosure', code: 'ClosureNotStatic');
  }

  protected static function getSniffName(): string {
    return 'SlevomatCodingStandard.Functions.StaticClosure';
  }

}
