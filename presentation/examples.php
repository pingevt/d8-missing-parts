<?php


function hook_preprocess_node(&$variables) {
  global $base_url;

  $node = $variables['elements']['#node'];
  $variables['type'] = $node->bundle();

  switch ($node->bundle()) {
    case 'CONTENT TYPE':
      // ... Do a bunch of cool stuff ...
    break;
  }
}




/**
 * Implements hook_token_info().
 */
function hook_token_info() {

}

/**
 * Implements hook_tokens().
 */
function hook_tokens($type, $tokens, array $data, array $options, BubbleableMetadata $bubbleable_metadata) {

}