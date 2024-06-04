<?php

declare(strict_types=1);

namespace PreviousNext\CodingStandard\Tests\Sniffs\fixtures;

/**
 * The class.
 */
final class UselessInheritDocCommentNoError extends UselessInheritDocCommentParent {

  /**
   * Foo.
   */
  public function foo(): void {
    parent::foo();
  }

}
