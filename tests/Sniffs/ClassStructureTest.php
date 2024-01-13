<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Sniffs;

use SlevomatCodingStandard\Sniffs\Classes\ClassStructureSniff;

/**
 * @covers \SlevomatCodingStandard\Sniffs\Classes\ClassStructureSniff
 */
final class ClassStructureTest extends Base {

  public function testNoError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/ClassStructureNoError.php');
    self::assertNoSniffErrorInFile($report);
  }

  public function testError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/ClassStructureError.php');
    self::assertSame(8, $report->getErrorCount());
    self::assertSniffError($report, 33, ClassStructureSniff::CODE_INCORRECT_GROUP_ORDER);
    self::assertSniffError($report, 36, ClassStructureSniff::CODE_INCORRECT_GROUP_ORDER);
    self::assertSniffError($report, 38, ClassStructureSniff::CODE_INCORRECT_GROUP_ORDER);
    self::assertSniffError($report, 41, ClassStructureSniff::CODE_INCORRECT_GROUP_ORDER);
    self::assertSniffError($report, 43, ClassStructureSniff::CODE_INCORRECT_GROUP_ORDER);
    self::assertSniffError($report, 45, ClassStructureSniff::CODE_INCORRECT_GROUP_ORDER);
    self::assertSniffError($report, 47, ClassStructureSniff::CODE_INCORRECT_GROUP_ORDER);
    self::assertSniffError($report, 49, ClassStructureSniff::CODE_INCORRECT_GROUP_ORDER);
  }

  protected static function getSniffName(): string {
    return 'SlevomatCodingStandard.Classes.ClassStructure';
  }

}
