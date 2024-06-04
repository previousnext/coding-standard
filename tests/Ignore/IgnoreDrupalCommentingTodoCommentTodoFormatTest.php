<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Ignore;

use Drupal\Sniffs\Commenting\TodoCommentSniff;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(TodoCommentSniff::class)]
final class IgnoreDrupalCommentingTodoCommentTodoFormatTest extends Base {

  /**
   * Checks for 'Drupal.Commenting.TodoComment.TodoFormat'.
   */
  public function testIgnored(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/IgnoreDrupalCommentingTodoCommentTodoFormat.php');
    self::assertNoSniffWarningInFile($report);
  }

}
