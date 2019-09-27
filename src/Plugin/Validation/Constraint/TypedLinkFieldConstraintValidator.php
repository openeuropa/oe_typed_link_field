<?php

declare(strict_types = 1);

namespace Drupal\oe_typed_link_field\Plugin\Validation\Constraint;

use Drupal\oe_typed_link_field\Plugin\Field\FieldType\TypedLinkItem;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validation handler for required fields of typed link field.
 *
 * We need to make sure that URL or Title does not get saved without
 * one another.
 */
class TypedLinkFieldConstraintValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   */
  public function validate($field, Constraint $constraint) {
    if (!$field instanceof TypedLinkItem) {
      return;
    }

    $values = $field->getValue();
    if (empty($values)) {
      return;
    }

    // We are not checking the type field.
    if (isset($values['type'])) {
      unset($values['type']);
    }
    foreach ($values as $property => $property_value) {
      if (empty($property_value)) {
        $this->context->buildViolation($constraint->message, ['@name' => $field->getFieldDefinition()->getLabel()])
          ->atPath($property)
          ->addViolation();
      }
    }
  }

}
