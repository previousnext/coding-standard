<?php

declare(strict_types=1);

namespace Sniffs\fixtures;

/**
 * The class.
 */
final class RequireTrailingCommaInDeclarationError {

  /**
   * Constructor.
   */
  public function __construct(
    protected string $fooBar,
    protected string $helloWorld
  ) {
  }

}
