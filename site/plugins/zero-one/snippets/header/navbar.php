<?php if($site->topbar() == "true"): ?>
  <?php snippet('header/navbar/topbar') ?>
<?php endif ?>
<div id="navbar"<?php if($site->sticky()->isNotEmpty()): ?> uk-sticky="<?php if($site->sticky() == "scroll"): ?>show-on-up: true; start: 300; <?php endif ?>animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive:<?php if($page->transparentNavbar()->isEmpty() && $site->sticky()->isNotEmpty() && $page->intendedTemplate()->name() !== "error" && $page->intendedTemplate()->name() !== "search" && $page->intendedTemplate()->name() !== "product"): ?><?php e($site->transparentNavbar() == "true" && $site->sticky()->isNotEmpty(), 'uk-navbar-transparent') ?><?php e($site->transparentNavbar() == "true" && $site->sticky()->isNotEmpty() && $site->navbarInverse() == "true", ' uk-light') ?><?php elseif($page->transparentNavbar() == "transparent" && $site->sticky()->isNotEmpty()): ?> uk-navbar-transparent<?php e($page->navbarInverse() == "true", ' uk-light') ?><?php endif ?>;"<?php endif ?>>
  <div class="uk-navbar-container<?php if($page->transparentNavbar()->isEmpty() && $site->sticky()->isEmpty() && $page->intendedTemplate()->name() !== "error" && $page->intendedTemplate()->name() !== "search" && $page->intendedTemplate()->name() !== "product"): ?><?php e($site->transparentNavbar() == "true" && $site->sticky()->isEmpty(), ' uk-navbar-transparent') ?><?php e($site->transparentNavbar() == "true" && $site->sticky()->isEmpty() && $site->navbarInverse() == "true", ' uk-light') ?><?php elseif($page->transparentNavbar() == "transparent" && $site->sticky()->isEmpty()): ?> uk-navbar-transparent<?php e($page->navbarInverse() == "true", ' uk-light') ?><?php endif ?>" aria-live="polite">
    <div class="uk-container<?php e($site->navbarWidth() == "large", ' uk-container-large') ?><?php e($site->navbarWidth() == "expand", ' uk-container-expand') ?>">
    <nav class="uk-navbar" uk-navbar>
    <?php if($site->menuPosition() == "left" && ($site->children()->listed()->isNotEmpty() or $site->mainMenuBuilder()->isNotEmpty())): ?>
      <!-- offset click -->
      <a class="uk-navbar-toggle tm-menu-animate uk-hidden@m" data-no-swup uk-icon="icon: menu;" role="button" aria-label="Open menu" uk-toggle="target: #offcanvas"></a>
    <?php endif ?>
      <div class="uk-navbar-left<?php e($site->menuPosition() == "left", ' uk-visible@m') ?>">
      <?php if($site->menuPosition() == "left"): ?>
        <?php if($site->mainMenuBuilder()->toStructure()->isNotEmpty()): ?>
          <?php snippet('menus/menu-builder') ?>
        <?php else: ?>
          <?php snippet('menus/nested-menu') ?>
        <?php endif ?>
      <?php else: ?>
        <?php snippet('header/navbar/logo') ?>
      <?php endif ?>
      </div>

      <?php if($site->menuPosition() == "center"): ?>
      <div class="uk-navbar-center uk-visible@m">
        <?php if($site->mainMenuBuilder()->toStructure()->isNotEmpty()): ?>
          <?php snippet('menus/menu-builder') ?>
        <?php else: ?>
          <?php snippet('menus/nested-menu') ?>
        <?php endif ?>
      </div>
      <?php endif ?>
      <?php if($site->menuPosition() == "left"): ?>
      <div class="uk-navbar-center">
        <?php snippet('header/navbar/logo') ?>
      </div>
      <?php endif ?>
        
      <div class="uk-navbar-right">
      <?php if($site->menuPosition() == "right"): ?>
      <div class="uk-visible@m">
        <?php if($site->mainMenuBuilder()->toStructure()->isNotEmpty()): ?>
          <?php snippet('menus/menu-builder') ?>
        <?php else: ?>
          <?php snippet('menus/nested-menu') ?>
        <?php endif ?>
      </div>
      <?php endif ?>
      <?php if($site->languagenav()->isTrue() && $kirby->languages()->isNotEmpty()): ?> <!-- language nav -->
      <?php if($site->languagenavStyle()->isTrue()): ?>
      <ul class="uk-navbar-nav<?php e($site->languagenavMobile()->isTrue(), ' uk-visible@m') ?>">
        <li>
          <a title="<?= $kirby->language()->name() ?>" aria-label="Change language" role="button"><?= $kirby->language()->code() ?></a>
        </li>
        <div class="uk-navbar-dropdown uk-width-auto" uk-drop="mode: click; animation: uk-animation-slide-top-small; duration: 300; offset: 0; animate-out: true;">
          <ul class="uk-nav uk-navbar-dropdown-nav">
              <?php foreach($kirby->languages() as $language): ?>
              <li<?php e($kirby->language() == $language, ' class="uk-active"') ?>>
              <a href="<?= $page->url($language->code()) ?>" lang="<?= $language->code() ?>" hreflang="<?= $language->code() ?>">
              <?= $language->name() ?>
              </a>
              </li>
              <?php endforeach ?>
          </ul>
        </div>
      </ul>
      <?php else: ?>
      <a href="#language-modal" class="uk-navbar-item tm-language<?php e($site->languagenavMobile()->isTrue(), ' uk-visible@m') ?>" title="<?= $site->labelLanguageTitle()->html() ?>" aria-label="Change language" role="button" data-no-swup uk-toggle><?= $kirby->languages()->isNotEmpty() ? $kirby->language()->code() : '' ?></a>
      <?php endif ?>
      <?php endif ?>
      <?php if($site->snipcartSwitch() == "true" && $site->snipcartApi()->isNotEmpty() && $site->hideCart() != "true"): ?>
        <div class="uk-navbar-item"><a href="#" class="snipcart-checkout" role="button" aria-label="Open shop cart" data-no-swup uk-icon="icon: cart"></a><sup class="snipcart-items-count"></sup><?php e($site->hideTotal() != "true", ' <span class="snipcart-total-price uk-text-small uk-visible@s"></span>') ?></div>
      <?php endif ?>
      <?php if($site->rightnav()->isEmpty() or $site->rightnav() == "button"): ?>
        <!-- button -->
        <?php if($site->menubuttonObject()->isNotEmpty()): ?>
        <?php $menubuttonObject = $site->menubuttonObject()->toObject(); ?>
        <div class="uk-navbar-item<?php e($site->children()->listed()->isEmpty(), ' uk-visible', ' uk-visible@m') ?>">
          <a class="uk-button<?php e($menubuttonObject->buttonStyle()->isNotEmpty(), ' ' . $menubuttonObject->buttonStyle(), ' uk-button-primary') ?><?php e($menubuttonObject->class()->isNotEmpty(), ' ' . $menubuttonObject->class()) ?>" href="<?= $menubuttonObject->link()->toUrl() ?>"<?php e($menubuttonObject->target()->isTrue(), ' target="_blank"') ?><?php e($menubuttonObject->title()->isNotEmpty(), ' title="' . h($menubuttonObject->title()) . '"') ?>><?= h($menubuttonObject->buttonText()) ?></a>
        </div>
        <?php endif ?>
      <?php endif ?>
      <?php if($site->rightnav()->isEmpty() or $site->rightnav() == "icons"): ?>
        <!-- iconnav -->
        <?php if($site->searchicon()->isTrue()): ?>
        <div class="uk-navbar-item<?php e($site->searchiconMobile() == "true", ' uk-visible@m') ?>"><a href="#modal-full" role="button" aria-label="Open search" data-no-swup uk-search-icon uk-toggle></a></div>
        <?php endif ?>
        <?php if($site->additionalIconToggle()->isTrue() && $site->additionalIconObject()->isNotEmpty()): ?>
        <?php $additionalIconObject = $site->additionalIconObject()->toObject(); ?>
        <div class="uk-navbar-item"><a href="<?= $additionalIconObject->link()->toUrl() ?>"<?php e($additionalIconObject->target()->isTrue(), ' target="_blank"') ?><?php e($additionalIconObject->title()->isNotEmpty(), ' title="' . h($additionalIconObject->title()) . '"') ?> uk-icon="<?php e($additionalIconObject->icon()->isNotEmpty(), $additionalIconObject->icon()) ?>" data-no-swup></a></div>
        <?php endif ?>
        <?php if($site->moreicon()->isNotEmpty()): ?>
        <div class="uk-navbar-item tm-menu-animate<?php e($site->children()->listed()->isEmpty(), ' uk-visible', ' uk-visible@m') ?>"><a href="#" data-no-swup uk-icon="icon: menu" role="button" aria-label="Open offcanvas content" uk-toggle="target: #offcanvas-flip"></a></div>
        <?php endif ?>
      <?php endif ?>
      <?php if($site->menuPosition() != "left" && ($site->children()->listed()->isNotEmpty() or $site->mainMenuBuilder()->isNotEmpty())): ?>
        <!-- offset click -->
        <a class="uk-navbar-toggle tm-menu-animate uk-hidden@m" data-no-swup uk-icon="icon: menu;" role="button" aria-label="Open menu" uk-toggle="target: #offcanvas"></a>
      <?php endif ?>
      </div>
      </nav>
      </div>
    </div>

    <?php if($site->rightnav()->isEmpty() or $site->rightnav() == "icons"): ?>
    <?php if($site->searchicon() == "true"): ?><!-- search modal -->
      <?php snippet('header/navbar/search-modal') ?>
    <?php endif ?>
    <?php if($site->moreicon()->isNotEmpty()): ?>
    <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true"> <!-- offset content -->
        <div class="uk-offcanvas-bar">
            <button class="uk-offcanvas-close" type="button" uk-close></button>
            <?= $site->moreicon()->kt() ?>
        </div>
    </div>
    <?php endif ?>
    <?php endif ?>

    <?php if($site->languagenav()->isTrue() && !$site->languagenavStyle()->isTrue()): ?>
      <?php snippet('header/navbar/language-modal') ?>
    <?php endif ?>

  </div>  