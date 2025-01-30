
<?php $isMultiple = $formfield->maxnumber()->value() > 1; ?>
<div uk-form-custom="target: true">
<input
    class="formfield__file"
    type="file"
    id="<?= $formfield->id() ?>"
    name="<?= $formfield->slug() . '[]' ?>"
    accept="<?= $formfield->accept() ?>"
    data-form="files"
    <?= $formfield->autofill(true) ?>
    <?= $formfield->required('attr') ?>
    <?= $formfield->ariaAttr() ?>
    <?= ($isMultiple) ? "multiple" : "" ?>

    />
    <input class="uk-input uk-width-2xlarge" type="text" placeholder="<?php e($formfield->select_file_text()->isNotEmpty(), $formfield->select_file_text()->html(), 'Select file') ?>" aria-label="Upload your file" disabled />
</div>
    