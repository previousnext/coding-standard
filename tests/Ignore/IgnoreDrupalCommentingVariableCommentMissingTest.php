<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Ignore;

/**
 * @covers \Drupal\Sniffs\Commenting\VariableCommentSniff
 */
final class IgnoreDrupalCommentingVariableCommentMissingTest extends Base {

  public function testIgnored(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/IgnoreDrupalCommentingVariableCommentMissing.php');
    self::assertNoSniffErrorInFile($report);
    self::assertNoSniffError($report, 12);
  }

}
