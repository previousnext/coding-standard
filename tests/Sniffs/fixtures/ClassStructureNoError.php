<?php

declare(strict_types=1);

namespace Sniffs\fixtures;

/**
 * The class.
 */
final class ClassStructureNoError {

  use Foo;

  public const ALPHA = 'alpha';
  private const BRAVO = 'bravo';
  protected const CHARLIE = 'charlie';

  public $delta = NULL;
  private $foxtrot = NULL;
  protected $golf = NULL;

  /**
   * A method.
   */
  public function __construct() {
  }

  /**
   * A method.
   */
  public function foo(): void {
  }

  /**
   * A method.
   */
  private function bar(): void {
  }

  /**
   * A method.
   */
  protected function baz(): void {
  }

}
