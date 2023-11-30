<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Ignore\fixtures;

/**
 * The class.
 */
final class IgnoreUnreachable {

  /**
   * Test method.
   */
  public function foo(): int {
    $a['b'] ?? throw new \Exception();
    return 1;
  }

}
