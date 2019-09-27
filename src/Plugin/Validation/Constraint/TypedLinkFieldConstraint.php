<?php

declare(strict_types = 1);

namespace Drupal\oe_typed_link_field\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Validation constraint for required fields of typed link field.
 *
 * @Constraint(
 *   id = "TypedLinkField",
 *   label = @Translation("Typed link field required.", context = "Validation"),
 * )
 */
class TypedLinkFieldConstraint extends Constraint {

  /**
   * Violation message. Use the same message as FormValidator.
   *
   * Note that the name argument is not sanitized so that translators only have
   * one string to translate. The name is sanitized in self::validate().
   *
   * @var string
   */
  public $message = '@name field is required.';

}
