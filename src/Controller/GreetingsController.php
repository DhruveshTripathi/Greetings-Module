<?php
/**
 * @file
 * Contains \Drupal\greetings\Controller\HelloController.
 */

namespace Drupal\greetings\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

class GreetingsController extends ControllerBase {
  public function content() {
    return array(
        '#type' => 'markup',
        '#markup' => $this->t('Hello, World!'),
    );
  }
}
?>