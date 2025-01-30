<div class="formblock__message--error uk-text-danger uk-text-small uk-margin-small-top" data-form="fields_error" id="<?= $field->id() ?>-error-message">

    <ul class="formblock__message__list uk-list uk-list-collapse">

        <?php foreach ($field->getErrorMessages() as $errorfield): ?>
            <li class="formblock__message__list__item"><?= $errorfield ?></li>
        <?php endforeach ?>

    </ul>

</div>