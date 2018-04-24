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