<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Ignore;

/**
 * @covers \PHP_CodeSniffer\Standards\Squiz\Sniffs\Commenting\FunctionCommentSniff
 */
final class IgnoreDrupalCommentingFunctionCommentTest extends Base {

  /**
   * Checks for 'Drupal.Commenting.FunctionComment.IncorrectParamVarName'.
   */
  public function testIgnoredIncorrectParamVarName(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/IgnoreDrupalCommentingFunctionComment_IncorrectParamVarName.php');
    self::assertNoSniffErrorInFile($report);
  }

  /**
   * Checks for 'Drupal.Commenting.FunctionComment.InvalidReturn'.
   */
  public function testIgnoredInvalidReturn(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/IgnoreDrupalCommentingFunctionComment_InvalidReturn.php');
    self::assertNoSniffErrorInFile($report);
  }

}
