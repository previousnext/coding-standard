# PreviousNext Drupal Coding Standard

[![Latest Stable Version](http://poser.pugx.org/previousnext/coding-standard/v)](https://packagist.org/packages/previousnext/coding-standard)
[![Total Downloads](http://poser.pugx.org/previousnext/coding-standard/downloads)](https://packagist.org/packages/previousnext/coding-standard)
[![GitHub branch checks state](https://img.shields.io/github/checks-status/previousnext/coding-standard/main)][ci]
[![License](http://poser.pugx.org/previousnext/coding-standard/license)](https://packagist.org/packages/previousnext/coding-standard)

This is a PHP Codesniffer standard enhancing the [Drupal Coder][drupal-coder]
project. It is designed to be utilised on full Drupal site projects, rather than
core or contrib, or projects outside of Drupal.

The standard improves upon the Drupal standard, while maintaining the general
style of Drupal.

Rules are loosened where static analysis tools such as PHPStan are better at
enforcing.

Documentation rules are loosened, trusting developers to properly self describe
code. Suggestions to improve documentation are encouraged during human code
review of MR/PR's.

Rules added are generally those we think would be accepted by Drupal Coder
itself.

Generally, rules that are not auto-fixable, especially documentation/commenting
related, will be stripped from the ruleset.

New rules may be introduced in minor versions. You can choose to lock a version
until you are ready, or utilise the baseline project.

# License

MIT

# Transitioning

Consider using the [Baseliner][php-codesniffer-baseline] project when
transitioning. A quick `phpcbf` beforehand will eliminate most or all problems
before they are added to a baseline.

```shell
composer require --dev digitalrevolution/php-codesniffer-baseline
php bin/phpcs --report=\\DR\\CodeSnifferBaseline\\Reports\\Baseline --report-file=phpcs.baseline.xml
```

Unlike PHPStan's `reportUnmatchedIgnoredErrors`, warnings will not display when
items in the PHPCS baseline are resolved. Instead, work until no CS issues are
reported with `phpcs`, then regenerate with the same baseline command above.

# Using the standard

Use the installer via Composer:

```shell
composer require dealerdirect/phpcodesniffer-composer-installer
```

Install this project with:

```shell
composer require previousnext/coding-standard
```

Dependencies such as Coding standard, Drupal Coder, and Slevomat Coding Standard
will be brought in automatically.

## Configuration Template

Create a `phpcs.xml` file in a project root with the following contents:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<ruleset name="My Coding Standard">
    <file>./src</file>
    <file>./tests</file>
    <file>./app/modules/custom</file>
    <file>./app/profiles/custom</file>
    <file>./app/themes/custom</file>
    <rule ref="PreviousNextDrupal" />
    <arg name="report" value="full"/>
</ruleset>
```

This standard does not assume the location of code, so all covered paths must be
added to the extending ruleset.

# Tips

Parameters and return documentation may be omitted.
If you intend to add typing, but do not care to document what a param or return
does, then consider using `@phpstan-` prefixed annotations. Such as
`@phpstan-param` or `@phpstan-return`.

**Example**

From _Drupal Coder_ style:

```php
/**
 * Does a thing.
 * 
 * @param array $data
 *   Some data.
 * 
 * @return int
 *   An integer.
 */
function foo(array $data): int {
}
```

To:

Remove useless documentation for the function/method itself. Human code review
must ensure the function/method/variable/param, etc, are self describing.

```php
/**
 * @phpstan-param array{bar: int} $data
 * @phpstan-return int{0, max}
 */
function doesAThing(array $data): int {
}
```


# Style

## Added Sniffs

#### PSR2.Methods.FunctionClosingBrace.SpacingBeforeClose
#### SlevomatCodingStandard.Classes.ClassStructure
#### SlevomatCodingStandard.Classes.RequireMultiLineMethodSignature
#### SlevomatCodingStandard.Functions.RequireTrailingCommaInCall
#### SlevomatCodingStandard.Functions.RequireTrailingCommaInDeclaration
#### SlevomatCodingStandard.Functions.StaticClosure
#### SlevomatCodingStandard.Functions.UnusedInheritedVariablePassedToClosure
#### SlevomatCodingStandard.Namespaces.AlphabeticallySortedUses
#### SlevomatCodingStandard.TypeHints.DeclareStrictTypes
#### SlevomatCodingStandard.TypeHints.ReturnTypeHint
#### SlevomatCodingStandard.TypeHints.ReturnTypeHintSpacing
#### Squiz.WhiteSpace.FunctionOpeningBraceSpace.SpacingAfter

## Removed/Loosened Inherited Sniffs

#### Drupal.Arrays.Array.LongLineDeclaration

#### Drupal.Commenting.*

 * Drupal.Commenting.ClassComment.Short
 * Drupal.Commenting.DocComment.MissingShort
 * Drupal.Commenting.FileComment.Missing
 * Drupal.Commenting.FunctionComment.IncorrectParamVarName
 * Drupal.Commenting.FunctionComment.InvalidReturn
 * Drupal.Commenting.TodoComment.TodoFormat
 * Drupal.Commenting.VariableComment.Missing

Commenting rules are not auto-fixable, are usually boilerplate-y.

Developers are entrusted to properly self-describe code. Suggestions to improve documentation are encouraged during human code review of MR/PR's.

#### Squiz.PHP.NonExecutableCode.Unreachable

This rule has trouble with newer PHP syntax, especially expression throwables. In any case this rule is best enforced with static analysis.

---

_Drupal is a registered trademark of Dries Buytaert._

 [ci]: https://github.com/previousnext/coding-standard/actions
 [drupal-coder]: https://www.drupal.org/project/coder
 [php-codesniffer-baseline]: https://github.com/123inkt/php-codesniffer-baseline