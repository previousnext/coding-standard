<?php

declare(strict_types = 1);

namespace Sniffs\fixtures;

/**
 * The class.
 */
final class ClassStructureError {

  /**
   * A method.
   */
  protected function baz(): void {
  }

  /**
   * A method.
   */
  private function bar(): void {
  }

  /**
   * A method.
   */
  public function foo(): void {
  }

  /**
   * A method.
   */
  public function __construct() {
  }

  protected $golf = NULL;

  private $foxtrot = NULL;


  public $delta = NULL;

  protected const CHARLIE = 'charlie';

  private const BRAVO = 'bravo';

  public const ALPHA = 'alpha';

  use Foo;

}
