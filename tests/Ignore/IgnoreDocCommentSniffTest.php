<?php

declare(strict_types = 1);

namespace PreviousNext\CodingStandard\Tests\Ignore;

/**
 * @covers \PHP_CodeSniffer\Standards\Generic\Sniffs\Commenting\DocCommentSniff
 */
final class IgnoreDocCommentSniffTest extends Base {

  /**
   * Checks for 'Drupal.Commenting.DocComment.MissingShort'.
   */
  public function testIgnored(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/IgnoreDocCommentSniff.php');
    self::assertNoSniffErrorInFile($report);
  }

}
