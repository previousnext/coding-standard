<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Ignore;

/**
 * @covers \PHP_CodeSniffer\Standards\Squiz\Sniffs\PHP\NonExecutableCodeSniff
 */
final class IgnoreUnreachableTest extends Base {

  public function testIgnored(): void {
    $report = self::checkFile(__DIR__ . '/fixtures/IgnoreUnreachable.php');
    self::assertNoSniffWarningInFile($report);
  }

}
