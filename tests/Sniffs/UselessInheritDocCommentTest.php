<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Sniffs;

use SlevomatCodingStandard\Sniffs\Commenting\UselessInheritDocCommentSniff;

/**
 * @covers \SlevomatCodingStandard\Sniffs\Commenting\UselessInheritDocCommentSniff
 */
final class UselessInheritDocCommentTest extends Base {

  public function testNoError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/UselessInheritDocCommentNoError.php');
    self::assertNoSniffErrorInFile($report);
  }

  public function testMissing(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/UselessInheritDocCommentError.php');
    self::assertSame(1, $report->getErrorCount());
    self::assertSniffError($report, 14, UselessInheritDocCommentSniff::CODE_USELESS_INHERIT_DOC_COMMENT);
  }

  protected static function getSniffName(): string {
    return 'SlevomatCodingStandard.Commenting.UselessInheritDocComment';
  }

}
