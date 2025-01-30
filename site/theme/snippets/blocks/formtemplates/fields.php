
<?php foreach ($form->fields() as $field) : ?>

    <div class="<?= $field->width()->or('uk-width-1-1') ?> formfield__container" data-id="<?= $field->slug() ?>" data-type="<?= $field->inputtype() ?>">

        <?php if($field->hasOptions() && $field->type(true) != "select"): ?>
            <fieldset class="formblock__option__container uk-padding-small" data-id="<?= $field->slug() ?>">
                
                <legend class="formblock_field__label" for="<?= $field->slug() ?>">

                    <span class="formfield__label__text"><?= $field->label() ?></span>
                    <span class="formfield__label__required" aria-hidden="true"><?= $field->required('asterisk') ?></span>

                </legend>
                <div class="uk-grid-small" uk-grid>
                <?= $field->toHtml() ?>
                
                <?= $form->template('field_error', ['field' => $field]) ?>
                </div>
            </fieldset>

        <?php else: ?>
                
            <label class="formblock_field__label uk-form-label" for="<?= $field->slug() ?>" id="label-<?= $field->id() ?>">

                <span class="formfield__label__text"><?= $field->label() ?></span>
                <span class="formfield__label__required" aria-hidden="true"><?= $field->required('asterisk') ?></span>

            </label>
            
            <div class="uk-form-controls">
            <?= $field->toHtml() ?>
            </div>
            
            <?= $form->template('field_error', ['field' => $field]) ?>

        <?php endif ?>

    </div>
<?php endforeach ?>

