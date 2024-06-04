<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Sniffs;

/**
 * Tests inherits from Drupal ruleset.
 */
final class DrupalRulesetTest extends Base {

  public function testNoError(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/DrupalRulesetNoError.php');
    self::assertNoSniffErrorInFile($report);
  }

  public function testMissing(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/DrupalRulesetError.php');
    self::assertSame(2, $report->getErrorCount());
    self::assertSniffError($report, 5, sniffName: 'Drupal.ControlStructures.InlineControlStructure', code: 'NotAllowed');
    self::assertSniffError($report, 5, sniffName: 'Generic.PHP.UpperCaseConstant', code: 'Found');
  }

  protected static function excludeSniffs(): array {
    // Test everything.
    return [];
  }

}
