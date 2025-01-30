<div class="formblock__message--error uk-width-1-1" data-form="form_error">

    <div class="uk-alert-danger" uk-alert>

    <p class="formblock__message__text"><?= $form->errorMessage() ?></p>

    <?php if(!$form->isValid()): ?>

        <ul class="formblock__message__list uk-list uk-list-circle uk-list-collapse">
            <?php foreach ($form->fields()->errorFields('label') as $errorfield): ?>
                <li class="formblock__message__list__item"><?= $errorfield ?></li>
            <?php endforeach ?>
        </ul>

    <?php endif ?>

    </div>

</div>