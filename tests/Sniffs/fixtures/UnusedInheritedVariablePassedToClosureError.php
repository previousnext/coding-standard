<?php

declare(strict_types = 1);

namespace Sniffs\fixtures;

/**
 * The class.
 */
final class UnusedInheritedVariablePassedToClosureError {

  /**
   * Test method.
   */
  public function foo(): void {
    $a = 1;
    $b = 2;
    $foo = static function () use (&$a, &$b): void {
      $a++;
    };
  }

}
