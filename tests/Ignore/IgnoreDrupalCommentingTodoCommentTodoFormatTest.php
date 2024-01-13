<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Ignore;

/**
 * @covers \Drupal\Sniffs\Commenting\TodoCommentSniff
 */
final class IgnoreDrupalCommentingTodoCommentTodoFormatTest extends Base {

  /**
   * Checks for 'Drupal.Commenting.TodoComment.TodoFormat'.
   */
  public function testIgnored(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/IgnoreDrupalCommentingTodoCommentTodoFormat.php');
    self::assertNoSniffWarningInFile($report);
  }

}
