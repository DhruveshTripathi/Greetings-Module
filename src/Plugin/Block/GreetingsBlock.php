<?php
/**
 * Provides a 'Greetings' Block
 *
 * @Block(
 *   id = "greetings_block",
 *   admin_label = @Translation("Greetings block"),
 * )
 */

namespace Drupal\greetings\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

class GreetingsBlock extends BlockBase implements BlockPluginInterface {
  /**
   * {@inheritdoc}
   */
  function greetings_function() {
  	$account = \Drupal::currentUser();
  	if ($account->isAuthenticated()) {
      $logger->log('%user logged in', ['%user' => $user->getUserName()]);
      $user->getDisplayName();
  	}
  }

  function greetings_needs_user(AccountInterface $user) {

  }
  public function build() {
    $config = $this->getConfiguration();

    if (!empty($config['name'])) {
      $name = $config['name'];
    }
    else {
      $name = $this->t('to no one');
    }
    return array(
      '#markup' => $this->t('Hello @name!', array (
          '@name' => $user,
        )
      ),
    );
  }
  /**
   * {@inheritdoc}
   */
  // public function blockForm($form, FormStateInterface $form_state) {
  //   $form = parent::blockForm($form, $form_state);

  //   $config = $this->getConfiguration();

  //   $form['greetings_name'] = array (
  //     '#type' => 'textfield',
  //     '#title' => $this->t('Who'),
  //     '#description' => $this->t('Who do you want to say hello to?'),
  //     '#default_value' => isset($config['name']) ? $config['name'] : ''
  //   );

  //   return $form;
  // }
  // /**
  //  * {@inheritdoc}
  //  */
  // public function blockSubmit($form, FormStateInterface $form_state) {
  //   $this->setConfigurationValue('name', $form_state->getValue('greetings_name'));
  // }
}
?>