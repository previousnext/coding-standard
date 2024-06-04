<?php

declare(strict_types=1);

namespace Sniffs\fixtures;

use PreviousNext\CodingStandard\Tests\Sniffs\fixtures\UselessInheritDocCommentParent;

/**
 * The class.
 */
final class UselessInheritDocCommentError extends UselessInheritDocCommentParent {

  /**
   * {@inheritdoc}
   */
  public function foo(): void {
    parent::foo();
  }

}
