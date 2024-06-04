<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Sniffs;

use PHPUnit\Framework\Attributes\CoversClass;
use SlevomatCodingStandard\Sniffs\Namespaces\AlphabeticallySortedUsesSniff;

#[CoversClass(AlphabeticallySortedUsesSniff::class)]
final class AlphabeticallySortedUsesTest extends Base {

  public function testNoError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/AlphabeticallySortedUsesNoError.php');
    self::assertNoSniffErrorInFile($report);
  }

  public function testError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/AlphabeticallySortedUsesError.php');
    self::assertSame(1, $report->getErrorCount());
    self::assertSniffError($report, 8, AlphabeticallySortedUsesSniff::CODE_INCORRECT_ORDER);
  }

  protected static function getSniffName(): string {
    return 'SlevomatCodingStandard.Namespaces.AlphabeticallySortedUses';
  }

}
