<?php

// Most of this file ported from slevomat/coding-standard and is immune from
// rule of this standard until it has been reworked.
// @codingStandardsIgnoreFile

declare(strict_types = 1);

namespace PreviousNext\CodingStandard\Tests\Sniffs;

use Drupal\Sniffs\Commenting\FileCommentSniff;
use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Files\LocalFile;
use PHP_CodeSniffer\Runner;
use PHPUnit\Framework\TestCase;
use function array_map;
use function array_merge;
use function count;
use function define;
use function defined;
use function implode;
use function in_array;
use function preg_replace;
use function sprintf;
use function strpos;

/**
 * @codeCoverageIgnore
 */
abstract class Base extends TestCase {

  /**
   * @param (string|int|bool|array<int|string, (string|int|bool|null)>)[] $sniffProperties
   * @param string[] $codesToCheck
   * @param string[] $cliArgs
   */
  protected static function checkFile(string $filePath, array $sniffProperties = [], array $codesToCheck = [], array $cliArgs = []): File {
    if (defined('PHP_CODESNIFFER_CBF') === FALSE) {
      define('PHP_CODESNIFFER_CBF', FALSE);
    }
    $codeSniffer = new Runner();
    $codeSniffer->config = new Config(array_merge(['-s'], $cliArgs));

    $codeSniffer->config->standards = [__DIR__ . '/../../PreviousNextDrupal/'];

    $codeSniffer->init();

    if (count($sniffProperties) > 0) {
      $codeSniffer->ruleset->ruleset[self::getSniffName()]['properties'] = $sniffProperties;
    }

    $sniffClassName = static::getSniffClassName();
    if ($sniffClassName !== NULL) {
      /** @var \PHP_CodeSniffer\Sniffs\Sniff $sniff */
      $sniff = new $sniffClassName();
      $codeSniffer->ruleset->sniffs = [$sniffClassName => $sniff];
    }

    // Remove this so we dont need to add comments to fixture files.
    foreach (static::excludeSniffs() as $excludeSniff) {
      unset($codeSniffer->ruleset->sniffs[$excludeSniff]);
    }

    if (count($codesToCheck) > 0) {
      foreach (self::getSniffClassReflection()->getConstants() as $constantName => $constantValue) {
        if (strpos($constantName, 'CODE_') !== 0 || in_array($constantValue, $codesToCheck, TRUE)) {
          continue;
        }

        $codeSniffer->ruleset->ruleset[sprintf('%s.%s', self::getSniffName(), $constantValue)]['severity'] = 0;
      }
    }

    $codeSniffer->ruleset->populateTokenListeners();

    $file = new LocalFile($filePath, $codeSniffer->ruleset, $codeSniffer->config);
    $file->process();

    return $file;
  }

  protected static function assertNoSniffErrorInFile(File $phpcsFile): void {
    $errors = $phpcsFile->getErrors();
    self::assertEmpty($errors, sprintf('No errors expected, but %d errors found.', count($errors)));
  }

  protected static function assertNoSniffWarningInFile(File $phpcsFile): void {
    $errors = $phpcsFile->getWarnings();
    self::assertEmpty($errors, sprintf('No warnings expected, but %d warnings found.', count($errors)));
  }

  protected static function assertSniffError(File $phpcsFile, int $line, string $code, ?string $message = NULL, ?string $sniffName = NULL): void {
    $errors = $phpcsFile->getErrors();
    self::assertTrue(isset($errors[$line]), sprintf('Expected error on line %s, but none found.', $line));

    $sniffCode = sprintf('%s.%s', $sniffName ?? static::getSniffName(), $code);

    self::assertTrue(
    self::hasError($errors[$line], $sniffCode, $message),
    sprintf(
                'Expected error %s%s, but none found on line %d.%sErrors found on line %d:%s%s%s',
                $sniffCode,
                $message !== NULL
                    ? sprintf(' with message "%s"', $message)
                    : '',
                $line,
                \PHP_EOL . \PHP_EOL,
                $line,
                \PHP_EOL,
                self::getFormattedErrors($errors[$line]),
                \PHP_EOL,
    ),
     );
  }

  protected static function assertNoSniffError(File $phpcsFile, int $line): void {
    $errors = $phpcsFile->getErrors();
    self::assertFalse(
    isset($errors[$line]),
    sprintf(
                'Expected no error on line %s, but found:%s%s%s',
                $line,
                \PHP_EOL . \PHP_EOL,
                isset($errors[$line]) ? self::getFormattedErrors($errors[$line]) : '',
                \PHP_EOL,
    ),
     );
  }

  protected static function assertAllFixedInFile(File $phpcsFile): void {
    $phpcsFile->disableCaching();
    $phpcsFile->fixer->fixFile();
    $expectedFile = preg_replace('~(\\.php)$~', '.fixed\\1', $phpcsFile->getFilename()) ?? throw new \Exception();
    self::assertStringEqualsFile($expectedFile, $phpcsFile->fixer->getContents());
  }

  protected static function getSniffName(): ?string {
    $className = static::getSniffClassName();
    if ($className === NULL) {
      return NULL;
    }

    return preg_replace(
    [
      '~\\\~',
      '~\.Sniffs~',
      '~Sniff$~',
    ],
    [
      '.',
      '',
      '',
    ],
      $className,
     ) ?? throw new \Exception();
  }

  /**
   * @return class-string|null
   */
  protected static function getSniffClassName(): ?string {
    return NULL;
  }

  private static function getSniffClassReflection(): \ReflectionClass {
    static $reflections = [];

    $className = static::getSniffClassName() ?? throw new \Exception();

    return $reflections[$className] ?? $reflections[$className] = new \ReflectionClass($className);
  }

  /**
   * @param (string|int)[][][] $errorsOnLine
   */
  private static function hasError(array $errorsOnLine, string $sniffCode, ?string $message): bool {
    $hasError = FALSE;

    foreach ($errorsOnLine as $errorsOnPosition) {
      foreach ($errorsOnPosition as $error) {
        /** @var string $errorSource */
        $errorSource = $error['source'];
        /** @var string $errorMessage */
        $errorMessage = $error['message'];

        if (
        $errorSource === $sniffCode
        && (
         $message === NULL
         || strpos($errorMessage, $message) !== FALSE
        )
        ) {
          $hasError = TRUE;
          break;
        }
      }
    }

    return $hasError;
  }

  /**
   * @param (string|int|bool)[][][] $errors
   */
  private static function getFormattedErrors(array $errors): string {
    return implode(\PHP_EOL, array_map(static function (array $errors): string {
      return implode(\PHP_EOL, array_map(static function (array $error): string {
        return sprintf("\t%s: %s", $error['source'], $error['message']);
      }, $errors));
    }, $errors));
  }

  /**
   * @return string[]
   */
  protected static function excludeSniffs(): array {
    return [
      FileCommentSniff::class,
    ];
  }

}
