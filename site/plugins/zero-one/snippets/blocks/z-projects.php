<?php 

$blockID          = $data->blockID()->isNotEmpty() ? ' id="' . $data->blockID()->value() . '"' : null;
$blockClass       = $data->blockClass()->isNotEmpty() ? ' class="' . $data->blockClass()->value() . '"' : null;
$columnWidth      = $data->columnWidth()->isNotEmpty() ? ' ' . $data->columnWidth() : ' uk-child-width-1-3@m';
$tabletWidth      = $data->tabletWidth()->isNotEmpty() ? ' ' . $data->tabletWidth() : ' uk-child-width-1-2@s';
$textColor        = $data->projectsTextColor()->isNotEmpty() ? $data->projectsTextColor() : ' uk-light';
$maxProjects      = $data->maxProjects()->isNotEmpty() ? $data->maxProjects()->toInt() : '5';
$autoplay         = $data->autoplay()->isTrue() ? 'autoplay: true;' : null;
$finite           = $data->finite()->isTrue() ? 'finite: true;' : 'finite: false;';
$slideSets        = $data->slideSets()->isTrue() ? 'sets: true;' : null;
$projects         = $data->projects()->toPages()->count() > 0 ? $data->projects()->toPage()->children()->limit($maxProjects) : $kirby->collection('projects')->limit($maxProjects);

$cover_width      = $site->coverWidth()->isNotEmpty() ? $site->coverWidth()->toInt() : '600';
$cover_height     = $site->coverHeight()->isNotEmpty() ? $site->coverHeight()->toInt() : '800';

?>
<div<?= $blockID ?><?= $blockClass ?>>
<div uk-grid>
    <div class="uk-slider uk-width-expand" uk-slider="<?= $autoplay ?><?= $finite ?><?= $slideSets ?>">
    <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
        <ul class="uk-slider-items uk-grid<?= $tabletWidth ?><?= $columnWidth ?>">
    <?php foreach ($projects as $project) : ?>
        <li>
        <?php if($img = $project->cover()->toFile()): ?>
        <a href="<?= $project->url() ?>" class="uk-link-toggle">
        <div class="tm-projects uk-inline-clip uk-transition-toggle" tabindex="0">
            <?php if($data->projectsCover()->isTrue()): ?>
            <picture>
                <source type="image/webp" srcset="<?= $img->thumb(['crop' => true, 'width' => $data->coverWidth()->or(600)->int(), 'height' => $data->coverHeight()->or(800)->int(), 'format' => 'webp'])->url() ?>" />
                <img class="uk-transition-scale-up uk-transition-opaque" src="<?= $img->crop($data->coverWidth()->or(600)->int(), $data->coverHeight()->or(800)->int())->url() ?>" alt="<?= $project->title()->html() ?>" width="<?= $data->coverWidth()->or(600)->int() ?>" height="<?= $data->coverHeight()->or(800)->int() ?>" loading="lazy">
            </picture>
            <?php else: ?>
            <picture>
                <source type="image/webp" srcset="<?= $img->thumb(['crop' => true, 'width' => $cover_width, 'height' => $cover_height, 'format' => 'webp'])->url() ?>" />
                <img class="uk-transition-scale-up uk-transition-opaque" src="<?= $img->crop($cover_width, $cover_height)->url() ?>" alt="<?= $project->title()->html() ?>" width="<?= $img->width() ?>" height="<?= $img->height() ?>" loading="lazy">
            </picture>
            <?php endif ?>
            <div class="uk-overlay-gradient uk-position-cover"></div>
            <div class="uk-overlay uk-position-bottom<?= $textColor ?>">
                <h3 class="uk-h2"><?= $project->title()->html() ?></h3>
                <?php if($project->intro()->isNotEmpty()): ?>
                <p class="tm-project-description uk-visible@s"><?= $project->intro()->kt()->excerpt(60) ?></p>
                <?php endif ?>
            </div>
        </div>
        </a>
        <?php endif ?>
        </li>
    <?php endforeach ?>
        </ul>
            <a class="uk-position-center-left uk-slidenav-large" href="#" data-no-swup uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-slidenav-large" href="#" data-no-swup uk-slidenav-next uk-slider-item="next"></a>
        </div>
        <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
    </div>
</div>
</div>