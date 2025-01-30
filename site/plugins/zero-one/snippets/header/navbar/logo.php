<?php

$src                        = null;
$anchor                     = $page->overrideLogo()->isTrue() && $page->logoLinkType() == "anchor" ? ' data-no-swup uk-scroll' : null;
$target                     = $page->overrideLogo()->isTrue() && $page->target()->isTrue() ? ' target="_blank"' : null;
$page_logo_height           = $page->logoHeight()->isNotEmpty() ? $page->logoHeight()->toInt() : '21';
$page_mobile_logo_height    = $page->mobileLogoHeight()->isNotEmpty() ? $page->mobileLogoHeight()->toInt() : '21';
$site_logo_height           = $site->logoHeight()->isNotEmpty() ? $site->logoHeight()->toInt() : '21';
$site_mobile_logo_height    = $site->mobileLogoHeight()->isNotEmpty() ? $site->mobileLogoHeight()->toInt() : '21';

if ($page->logoLinkType() == "internal" && $link = $page->internalPage()->toPage()) {
    $src = $link->url();
} elseif ($page->logoLinkType() == "url") {
    $src = $page->link()->toUrl();
} elseif ($page->logoLinkType() == "anchor") {
    $src = '#' . $page->anchor();
}

?>
<a class="uk-logo" href="<?php e($page->overrideLogo()->isTrue() && $page->logoLinkType()->isNotEmpty(), $src, $site->url()) ?>"<?= $target ?> aria-label="Back to Home" rel="home"<?= $anchor ?>>
<?php if($page->overrideLogo()->isTrue()): ?>
    <?php if($logo = $page->logo()->toFile() or ($imageinverted = $page->logoInverted()->toFile())): ?>
        <?php if($logo = $page->logo()->toFile()): ?>
        <img data-src="<?= $logo->url() ?>" class="uk-visible@s" style="height:<?= $page_logo_height ?>px;" alt="<?= $page->title() ?>" data-width="<?= Str::toBytes(($logo->width() / $logo->height()) * $page_logo_height) ?>" data-height="<?= $page_logo_height ?>" uk-img>
        <?php if($logoMobile = $page->logoMobile()->toFile()): ?>
        <img data-src="<?= $logoMobile->url() ?>" class="uk-hidden@s" style="height:<?= $page_mobile_logo_height ?>px;" alt="<?= $page->title() ?>" data-width="<?= Str::toBytes(($logoMobile->width() / $logoMobile->height()) * $page_mobile_logo_height) ?>" data-height="<?= $page_mobile_logo_height ?>" uk-img>
        <?php else: ?>
        <img data-src="<?= $logo->url() ?>" class="uk-hidden@s" style="height:<?= $page_mobile_logo_height ?>px;" alt="<?= $page->title() ?>" data-width="<?= Str::toBytes(($logo->width() / $logo->height()) * $page_mobile_logo_height) ?>" data-height="<?= $page_mobile_logo_height ?>" uk-img>
        <?php endif ?>
        <?php endif ?>
        <?php if($logoinverted = $page->logoInverted()->toFile()): ?>
        <img data-src="<?= $logoinverted->url() ?>" class="uk-logo-inverse uk-visible@s" style="height:<?= $page_logo_height ?>px;" alt="<?= $page->title() ?>" data-width="<?= Str::toBytes(($logoinverted->width() / $logoinverted->height()) * $page_logo_height) ?>" data-height="<?= $page_logo_height ?>" uk-img>
        <?php if($logoMobileInverted = $page->logoMobileInverted()->toFile()): ?>
        <img data-src="<?= $logoMobileInverted->url() ?>" class="uk-logo-inverse uk-hidden@s" style="height:<?= $page_mobile_logo_height ?>px;" alt="<?= $page->title() ?>" data-width="<?= Str::toBytes(($logoMobileInverted->width() / $logoMobileInverted->height()) * $page_mobile_logo_height) ?>" data-height="<?= $page_mobile_logo_height ?>" uk-img>
        <?php else: ?>
        <img data-src="<?= $logoinverted->url() ?>" class="uk-logo-inverse uk-hidden@s" style="height:<?= $page_mobile_logo_height ?>px;" alt="<?= $page->title() ?>" data-width="<?= Str::toBytes(($logoinverted->width() / $logoinverted->height()) * $page_mobile_logo_height) ?>" data-height="<?= $page_mobile_logo_height ?>" uk-img>
        <?php endif ?>
        <?php endif ?>
    <?php else: ?>
        <?= $page->title() ?>
    <?php endif ?>
<?php elseif($logo = $site->logo()->toFile() or ($imageinverted = $site->logoInverted()->toFile())): ?>
    <?php if($logo = $site->logo()->toFile()): ?>
    <img data-src="<?= $logo->url() ?>" class="uk-visible@s" style="height:<?= $site_logo_height ?>px;" alt="<?= $site->title() ?>" data-width="<?= Str::toBytes(($logo->width() / $logo->height()) * $site_logo_height) ?>" data-height="<?= $site_logo_height ?>" uk-img>
    <?php if($logoMobile = $site->logoMobile()->toFile()): ?>
    <img data-src="<?= $logoMobile->url() ?>" class="uk-hidden@s" style="height:<?= $site_mobile_logo_height ?>px;" alt="<?= $site->title() ?>" data-width="<?= Str::toBytes(($logoMobile->width() / $logoMobile->height()) * $site_mobile_logo_height) ?>" data-height="<?= $site_mobile_logo_height ?>" uk-img>
    <?php else: ?>
    <img data-src="<?= $logo->url() ?>" class="uk-hidden@s" style="height:<?= $site_mobile_logo_height ?>px;" alt="<?= $site->title() ?>" data-width="<?= Str::toBytes(($logo->width() / $logo->height()) * $site_mobile_logo_height) ?>" data-height="<?= $site_mobile_logo_height ?>" uk-img>
    <?php endif ?>
    <?php endif ?>
    <?php if($logoinverted = $site->logoInverted()->toFile()): ?>
    <img data-src="<?= $logoinverted->url() ?>" class="uk-logo-inverse uk-visible@s" style="height:<?= $site_logo_height ?>px;" alt="<?= $site->title() ?>" data-width="<?= Str::toBytes(($logoinverted->width() / $logoinverted->height()) * $site_logo_height) ?>" data-height="<?= $site_logo_height ?>" uk-img>
    <?php if($logoMobileInverted = $site->logoMobileInverted()->toFile()): ?>
    <img data-src="<?= $logoMobileInverted->url() ?>" class="uk-logo-inverse uk-hidden@s" style="height:<?= $site_mobile_logo_height ?>px;" alt="<?= $site->title() ?>" data-width="<?= Str::toBytes(($logoMobileInverted->width() / $logoMobileInverted->height()) * $site_mobile_logo_height) ?>" data-height="<?= $site_mobile_logo_height ?>" uk-img>
    <?php else: ?>
    <img data-src="<?= $logoinverted->url() ?>" class="uk-logo-inverse uk-hidden@s" style="height:<?= $site_mobile_logo_height ?>px;" alt="<?= $site->title() ?>" data-width="<?= Str::toBytes(($logoinverted->width() / $logoinverted->height()) * $site_mobile_logo_height) ?>" data-height="<?= $site_mobile_logo_height ?>" uk-img>
    <?php endif ?>
    <?php endif ?>
<?php else: ?>
    <?= $site->title() ?>
<?php endif ?>
</a>