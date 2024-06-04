<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Sniffs;

use PHPUnit\Framework\Attributes\CoversClass;
use SlevomatCodingStandard\Sniffs\Functions\UnusedInheritedVariablePassedToClosureSniff;

#[CoversClass(UnusedInheritedVariablePassedToClosureSniff::class)]
final class UnusedInheritedVariablePassedToClosureTest extends Base {

  public function testNoError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/UnusedInheritedVariablePassedToClosureNoError.php');
    self::assertNoSniffErrorInFile($report);
  }

  public function testError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/UnusedInheritedVariablePassedToClosureError.php');
    self::assertSame(1, $report->getErrorCount());
    self::assertSniffError($report, 18, sniffName: 'SlevomatCodingStandard.Functions.UnusedInheritedVariablePassedToClosure', code: UnusedInheritedVariablePassedToClosureSniff::CODE_UNUSED_INHERITED_VARIABLE);
  }

  protected static function getSniffName(): string {
    return 'SlevomatCodingStandard.Functions.UnusedInheritedVariablePassedToClosure';
  }

}
