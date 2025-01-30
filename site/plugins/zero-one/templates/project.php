<?php 

$pageTitleSize 	= $page->pageTitleSize()->isNotEmpty() ? 'uk-heading-' . $page->pageTitleSize() : ($site->pageTitleSize()->isNotEmpty() ? 'uk-heading-' . $site->pageTitleSize() : null);

?>
<?php snippet('header') ?>

<?php if($page->headersection() == "false"): ?><?php else: ?>
<?php snippet('page/heading', slots: true) ?>
  <?php slot('categories') ?>
  <h1 class="<?= $pageTitleSize ?><?php e($site->pageTitleColor() == "muted", ' uk-text-muted') ?><?php e($site->pageTitleColor() == "primary", ' uk-text-primary') ?>" uk-parallax="opacity: 1,0.3; start: 20%; end: 20%;<?php e($site->headerAlign() == "center", ' y: 0,-30; scale: 0.9,1;') ?>"><?=$page->altTitle()->isEmpty() ? $page->title() : $page->altTitle() ?></h1>
	<?php if ($page->intro()->isNotEmpty()): ?>
	<hr class="uk-divider-small" uk-parallax="opacity: 1,0.1; start: 20%; end: 20%;">
	<div class="uk-text-lead" uk-parallax="opacity: 1,0.1; start: 20%; end: 20%;">
		<?= $page->intro()->kt() ?>
	</div>
	<?php endif ?>
  <div class="uk-grid uk-grid-divider uk-grid-small uk-margin-medium uk-text-muted uk-flex-center" uk-parallax="opacity: 1,0.1; start: 20%; end: 20%;" uk-grid>
  <?php 
  // using the `toStructure()` method, we create a structure collection
  $items = $page->projectInfo()->toStructure();
  // we can then loop through the entries and render the individual fields
  foreach ($items as $item): ?>
  <div class="uk-width-auto@m">
    <?= $item->projectColumn()->kt() ?>
  </div>
  <?php endforeach ?>
  <?php if($page->tags()->isNotEmpty()): ?>
  <div><!-- project tags -->
    <p><b><?= $page->tagsLabel() ?></b>
    <?php foreach($page->tags()->split(',') as $tag): ?>
    <span class="tm-project-tags"><a href="<?= url($page->parent()->url(), ['params' => ['tag' => urlencode($tag)]]) ?>"><?= Str::ucfirst($tag) ?></a></span>
    <?php endforeach ?>
    </p>
  </div>
  <?php endif ?>
  </div>
  <?php endslot() ?>
<?php endsnippet() ?>
<?php endif ?>

<main role="main">
<?php foreach ($page->layout()->toLayouts() as $layout): ?>
<?php snippet('layout/layout', ['layout' => $layout]) ?>
<?php endforeach ?>
<section class="uk-grid uk-grid-collapse" uk-grid>
  <?php snippet('project/prevnext') ?>
</section>
</main>

<?php snippet('footer') ?>