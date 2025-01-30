<?php 

$pageTitleSize 	= $page->pageTitleSize()->isNotEmpty() ? 'uk-heading-' . $page->pageTitleSize() : ($site->pageTitleSize()->isNotEmpty() ? 'uk-heading-' . $site->pageTitleSize() : null);

?>
<?php snippet('header') ?>

<main role="main">
<?php if($page->headersection() == "false"): ?><?php else: ?>
<?php snippet('page/heading', slots: true) ?>
  <?php slot('categories') ?>
    <?php if($category OR $tag OR $year): ?>
      <?php snippet('blog/filtered') ?>
    <?php else: ?>
      <h1 class="<?= $pageTitleSize ?><?php e($site->pageTitleColor() == "muted", ' uk-text-muted') ?><?php e($site->pageTitleColor() == "primary", ' uk-text-primary') ?>" uk-parallax="opacity: 1,0.3; start: 20%; end: 20%;<?php e($site->headerAlign() == "center", ' y: 0,-30; scale: 0.9,1;') ?>"><?=$page->altTitle()->isEmpty() ? $page->title() : $page->altTitle() ?></h1>
      <?php if ($page->intro()->isNotEmpty()): ?>
      <hr class="uk-divider-small">
      <div class="uk-text-lead" uk-parallax="opacity: 1,0.1; start: 20%; end: 20%;"><?= $page->intro()->kt() ?></div>
      <?php endif ?>
      <?php if ($page->categories()->isNotEmpty()): ?>
      <div class="uk-flex<?php e($site->headerAlign() == "center", ' uk-flex-center') ?>" uk-parallax="opacity: 1,0.2; start: 20%; end: 20%;">
      <?php snippet('blog/categories') ?>
      </div>
    <?php endif ?>
  <?php endif ?>
  <?php endslot() ?>
<?php endsnippet() ?>
<?php endif ?>
<?php if($page->layoutBuilderPosition() != "true"): ?>
<?php foreach ($page->layout()->toLayouts() as $layout): ?>
<?php snippet('layout/layout', ['layout' => $layout]) ?>
<?php endforeach ?>
<?php endif ?>
<section class="uk-container uk-margin-large" aria-label="Articles"> <!-- articles section -->
  <div uk-grid>
  <div class="uk-width-expand">
  <?php if($page->sidebarBlog() == "yes"): ?>
  <div class="uk-grid<?php e($page->listingStyle() != "classic", ' uk-child-width-1-2@m') ?>" uk-grid="masonry: true" uk-scrollspy="cls: uk-animation-slide-bottom-small; target: .uk-card; delay: 200">
  <?php else: ?>
  <div class="uk-grid uk-grid-medium<?php e($page->listingStyle() != "classic", ' uk-child-width-1-3@m uk-child-width-1-2@s') ?>" uk-grid="masonry: true" uk-scrollspy="cls: uk-animation-slide-bottom-small; target: .uk-card; delay: 200">
  <?php endif ?>
  <?php foreach($articles as $article):

      $imgWidth = $page->listingStyle() == "classic" ? '800' : '600';

    ?>
  <div>
  <?php if($article->featured() == 'yes'): ?>
  <article class="uk-card uk-card-secondary uk-card-hover uk-transition-toggle<?php e($page->listingStyle() == "classic" && $page->sidebarBlog()->isFalse(), ' uk-card-large', ' uk-card-small') ?><?php e($page->listingStyle() == "classic", ' uk-grid uk-grid-collapse uk-child-width-1-2@s') ?>" tabindex="0">
  <?php else: ?>
  <article class="uk-card uk-card-hover uk-transition-toggle<?php e($page->listingStyle() == "classic" && $page->sidebarBlog()->isFalse(), ' uk-card-large', ' uk-card-small') ?><?php e($page->listingStyle() == "classic", ' uk-grid uk-grid-collapse uk-child-width-1-2@s') ?><?php e($page->listingStyle() == "classic", ' uk-grid uk-grid-collapse uk-child-width-1-2@s') ?>" tabindex="0">
  <?php endif ?>
    <?php if($img = $article->cover()->toFile()): ?>
    <div class="<?php e($page->listingStyle() == "classic", 'uk-card-media-left uk-cover-container', 'uk-card-media-top') ?> uk-inline-clip">
      <a href="<?= $article->url() ?>">
        <picture>
          <source type="image/webp" srcset="<?= $img->thumb(['crop' => 'true', 'width' => $imgWidth, 'height' => 600, 'format' => 'webp'])->url() ?>" />
          <img class="uk-transition-scale-up uk-transition-opaque" src="<?= $img->crop($imgWidth, 600)->url() ?>" alt="<?= $article->title()->html() ?>" loading="lazy"<?php e($page->listingStyle() == "classic", ' uk-cover') ?>>
        </picture>
        <?php e($page->listingStyle() == "classic", '<canvas width="800" height="600"></canvas>') ?>
      </a>
    </div>
    <?php endif ?>
    <div class="uk-card-body">
      <h2><a class="uk-link-heading<?php e($page->articleTitleSize()->isNotEmpty(), ' ' . $page->articleTitleSize()) ?>" href="<?= $article->url() ?>"><?= $article->title()->html() ?></a></h2>
      <p class="uk-article-meta"><?= $site->labelPublished()->html() ?> <time><?= $article->date()->toDate($page->dateFormat()->html()) ?></time></p>
      <?= $article->desc()->kt()->excerpt(120) ?>
      <div class="uk-margin">
      <a class="uk-button uk-button-text" href="<?= $article->url() ?>"><?= $site->labelReadMore()->html() ?></a>
      </div>
    </div>
  </article>
  </div>
  <?php endforeach ?>
  </div>
  
  <?php snippet('blog/pagination') ?>
  
  </div>
  <?php if($page->sidebarBlog() == "yes"): ?>
  <div class="<?php e($page->listingStyle() == "classic", 'uk-width-1-4@s uk-width-1-3@m ', 'uk-width-1-3@s ') ?>uk-animation-slide-right-small">
  <?php snippet('blog/sidebar') ?>
  </div>
  <?php endif ?>
  </div>

</section>
<?php if($page->layoutBuilderPosition()->isTrue()): ?>
<?php foreach ($page->layout()->toLayouts() as $layout): ?>
<?php snippet('layout/layout', ['layout' => $layout]) ?>
<?php endforeach ?>
<?php endif ?>
</main>

<?php snippet('footer') ?>