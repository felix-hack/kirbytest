<?php 

$table            = $data->table()->toTable();
$blockID          = $data->blockID()->isNotEmpty() ? 'id="' . $data->blockID()->value() . '" ' : null;
$blockClass       = $data->blockClass()->isNotEmpty() ? ' ' . $data->blockClass()->value() : null;
$tableDivider     = $data->divider()->isNotEmpty() ? $data->divider() : null;
$tableSize        = $data->size()->isNotEmpty() ? $data->size() : null;
$tableHover       = $data->hover()->isTrue() ? ' uk-table-hover' : null;
$tableJustify     = $data->justify()->isTrue() ? ' uk-table-justify' : null;
$tableStack       = $data->responsive() == "stack" ? ' uk-table-responsive' : null;
$marginVertical   = $data->marginVertical()->isNotEmpty() ? $data->marginVertical() : null;
$marginLeft       = $data->marginLeft()->isNotEmpty() ? $data->marginLeft() : null;
$marginRight      = $data->marginRight()->isNotEmpty() ? $data->marginRight() : null;
$animation        = $data->animationSwitch()->isTrue() ? ' uk-scrollspy="cls:' . $data->animationType()->or('uk-animation-fade') . '; delay:' . $data->animationDelay()->or('200')->toInt() . '"' : null;

?>
<?php if(!empty($table['headers']) && !empty($table['rows'])): ?>
<?php if($data->responsive() == "overflow"): ?>
<div <?= $blockID ?>class="uk-overflow-auto<?= $blockClass ?><?= $marginVertical ?><?= $marginLeft ?><?= $marginRight ?>"<?= $animation ?>>
<?php endif ?>   
  <table <?php e($data->responsive() != "overflow", $blockID) ?>class="uk-table<?= $tableDivider ?><?= $tableSize ?><?= $tableHover ?><?= $tableJustify ?><?= $tableStack ?><?php e($data->responsive() != "overflow", $blockClass . $marginVertical . $marginLeft . $marginRight) ?>"<?php e($data->responsive() != "overflow", $animation) ?>>
    <?php if($table['headers'] != ['']): ?>
    <thead>
      <tr>
        <?php foreach ($table['headers'] as $header): ?>
          <th><?= $header ?></th>
        <?php endforeach ?>
      </tr>
    </thead>
    <?php endif ?> 
    <tbody>
      <?php foreach ($table['rows'] as $row): ?>
        <tr>
          <?php foreach ($row as $cell): ?>
            <td><?= $cell ?></td>
          <?php endforeach ?>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
<?php if($data->responsive() == "overflow"): ?>
</div>
<?php endif ?>  
<?php endif ?>