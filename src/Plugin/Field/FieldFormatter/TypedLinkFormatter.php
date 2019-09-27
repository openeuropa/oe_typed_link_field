<?php

declare(strict_types = 1);

namespace Drupal\oe_typed_link_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'typed_link_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "typed_link_formatter",
 *   label = @Translation("Typed link"),
 *   field_types = {
 *     "oe_typed_link"
 *   }
 * )
 */
class TypedLinkFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    if (count($items) === 0) {
      return [];
    }

    $elements = [
      '#theme' => 'typed_links',
      '#items' => [],
    ];

    foreach ($items as $delta => $item) {
      $elements['#items'][$delta]['type'] = [
        '#plain_text' => $item->type,
      ];
      $elements['#items'][$delta]['url'] = [
        '#plain_text' => $item->url,
      ];
      $elements['#items'][$delta]['title'] = [
        '#plain_text' => $item->title,
      ];
    }

    return $elements;
  }

}
