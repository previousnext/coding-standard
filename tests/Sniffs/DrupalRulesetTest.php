<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Sniffs;

use Drupal\Sniffs\ControlStructures\InlineControlStructureSniff;

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
    // Sniff removed in drupal/coder 9.x.
    $inlineControlSniff = \class_exists(InlineControlStructureSniff::class)
        ? 'Drupal.ControlStructures.InlineControlStructure'
        : 'Generic.ControlStructures.InlineControlStructure';
    self::assertSniffError($report, 5, sniffName: $inlineControlSniff, code: 'NotAllowed');
    self::assertSniffError($report, 5, sniffName: 'Generic.PHP.UpperCaseConstant', code: 'Found');
  }

  protected static function excludeSniffs(): array {
    // Test everything.
    return [];
  }

}
