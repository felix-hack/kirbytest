<?php

$siteTitle = !$page->removeSiteTitle()->isTrue() ? ' | ' . $site->title()->html() : null;

echo '<title>';
if ($page->isHomePage() and $site->HomePage()->metaTitle()->isNotEmpty()) {
    echo $site->HomePage()->metaTitle()->html();
}
elseif ($page->isHomePage() and $site->metaTitle()->isNotEmpty()) {
    echo $site->metaTitle()->html();
    } elseif($page->is($site->children()->findBy('template', 'blog'))) {
    if ($category OR $tag OR $year) {
        echo $page->title()->html() . ' ' . $site->labelArchivesTitle()->html() . '&nbsp;' . Str::ucfirst($category), Str::ucfirst($tag), $year . ' | ' . $site->title()->html();
    } elseif($page->metaTitle()->isNotEmpty()) {
        echo $page->metaTitle()->html() . $siteTitle;
    } else {
        echo $page->title()->html() . $siteTitle;
    } 
}
elseif($page->is($site->children()->findBy('template', 'shop'))) {
    if ($category OR $tag) {
        echo $page->title()->html() . ' ' . $site->labelArchivesTitle()->html() . '&nbsp;' . Str::ucfirst($category), Str::ucfirst($tag) . ' | ' . $site->title()->html();
    } elseif($page->metaTitle()->isNotEmpty()) {
        echo $page->metaTitle()->html() . $siteTitle;
    } else {
        echo $page->title()->html() . $siteTitle;
    } 
} else {
    if($page->metaTitle()->isNotEmpty()) {
        echo $page->metaTitle()->html() . $siteTitle;
    } else {
    echo $page->title()->html() . $siteTitle;
    }
};
echo '</title>';