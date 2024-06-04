<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Ignore;

use Drupal\Sniffs\Commenting\VariableCommentSniff;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(VariableCommentSniff::class)]
final class IgnoreDrupalCommentingVariableCommentMissingTest extends Base {

  public function testIgnored(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/IgnoreDrupalCommentingVariableCommentMissing.php');
    self::assertNoSniffErrorInFile($report);
    self::assertNoSniffError($report, 12);
  }

}
