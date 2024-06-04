<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Ignore;

use Drupal\Sniffs\Commenting\ClassCommentSniff;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ClassCommentSniff::class)]
final class IgnoreDrupalCommentingClassCommentShortTest extends Base {

  /**
   * Checks for 'Drupal.Commenting.ClassComment.Short'.
   */
  public function testIgnored(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/IgnoreDrupalCommentingClassCommentShort.php');
    self::assertNoSniffWarningInFile($report);
  }

}
