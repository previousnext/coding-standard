<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Sniffs;

use PHPUnit\Framework\Attributes\CoversClass;
use SlevomatCodingStandard\Sniffs\ControlStructures\RequireNullSafeObjectOperatorSniff;

#[CoversClass(RequireNullSafeObjectOperatorSniff::class)]
final class RequireNullSafeObjectOperatorTest extends Base {

  public function testNoError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/RequireNullSafeObjectOperatorNoError.php');
    self::assertNoSniffErrorInFile($report);
  }

  public function testMissing(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/RequireNullSafeObjectOperatorError.php');
    self::assertSame(1, $report->getErrorCount());
    self::assertSniffError($report, 6, RequireNullSafeObjectOperatorSniff::CODE_REQUIRED_NULL_SAFE_OBJECT_OPERATOR);
  }

  protected static function getSniffName(): string {
    return 'SlevomatCodingStandard.ControlStructures.RequireNullSafeObjectOperator';
  }

}
