<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Sniffs;

use SlevomatCodingStandard\Sniffs\Namespaces\FullyQualifiedGlobalFunctionsSniff;

/**
 * @covers \SlevomatCodingStandard\Sniffs\Namespaces\FullyQualifiedGlobalFunctionsSniff
 */
final class FullyQualifiedGlobalFunctionsTest extends Base {

  public function testNoError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/FullyQualifiedGlobalFunctionsNoError.php');
    self::assertNoSniffErrorInFile($report);
  }

  public function testError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/FullyQualifiedGlobalFunctionsError.php');
    self::assertSame(1, $report->getErrorCount());
    self::assertSniffError($report, 7, FullyQualifiedGlobalFunctionsSniff::CODE_NON_FULLY_QUALIFIED);
  }

  protected static function getSniffName(): string {
    return 'SlevomatCodingStandard.Namespaces.FullyQualifiedGlobalFunctions';
  }

}
