<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Sniffs;

use PHPUnit\Framework\Attributes\CoversClass;
use SlevomatCodingStandard\Sniffs\TypeHints\DeclareStrictTypesSniff;

#[CoversClass(DeclareStrictTypesSniff::class)]
final class StrictTypesTest extends Base {

  public function testNoError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/StrictTypesNoError.php');
    self::assertNoSniffErrorInFile($report);
  }

  public function testMissing(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/StrictTypesMissing.php');
    self::assertSame(1, $report->getErrorCount());
    self::assertSniffError($report, 1, DeclareStrictTypesSniff::CODE_DECLARE_STRICT_TYPES_MISSING);
  }

  public function testSpacing(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/StrictTypesSpacing.php');
    self::assertSame(1, $report->getErrorCount());
    self::assertSniffError($report, 3, DeclareStrictTypesSniff::CODE_INCORRECT_STRICT_TYPES_FORMAT);
  }

  protected static function getSniffName(): string {
    return 'SlevomatCodingStandard.TypeHints.DeclareStrictTypes';
  }

}
