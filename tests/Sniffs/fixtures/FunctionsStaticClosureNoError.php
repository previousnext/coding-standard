<?php

declare(strict_types = 1);

namespace Sniffs\fixtures;

/**
 * The class.
 */
final class FunctionsStaticClosureNoError {

  /**
   * Foo.
   */
  public function foo(): void {
    $a = static function (): void {
      $a = 1;
    };
  }

}
