<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Sniffs\fixtures;

/**
 * The class.
 */
final class FunctionsStaticClosureError {

  /**
   * Foo.
   */
  public function foo(): void {
    $a = function (): void {
      $a = 1;
    };
  }

}
