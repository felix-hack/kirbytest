
<?php
$buttonStyle      = $form->send_buttonStyle()->isNotEmpty() ? ' ' . $form->send_buttonStyle() : ' uk-button-primary';
$buttonWidth      = $form->send_buttonWidth()->isNotEmpty() ? ' ' . $form->send_buttonWidth() : null;
?>
<div class="formblock__submit uk-width-1-1">
    <input class="uk-button<?= $buttonStyle ?><?= $buttonWidth ?> uk-margin-small-top" type="submit" value="<?= $form->message('send_button') ?>" data-form="submit">
    <span class="formblock__submit__bar" data-form="bar"></span>
</div>