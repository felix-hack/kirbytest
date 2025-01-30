

<?php /** @var \Kirby\Cms\Block $block */ ?>

<?php 
$text                   = $block->text();
$textAlign              = $block->textAlign()->isNotEmpty() ? $block->textAlign() : null;
$textAlignTablet        = $block->textAlignTablet()->isNotEmpty() ? $block->textAlignTablet() : null;
$textAlignMobile        = $block->textAlignMobile()->isNotEmpty() ? $block->textAlignMobile() : null;
$textSize               = $block->textSize()->isNotEmpty() ? $block->textSize() : null;
$textTransform          = $block->textTransform()->isNotEmpty() ? $block->textTransform() : null;
$textWrapping           = $block->textWrapping()->isNotEmpty() ? $block->textWrapping() : null;
$textColor              = $block->textColor()->isNotEmpty() ? $block->textColor() : null;

if($textAlign or $textAlignTablet or $textAlignMobile or $textSize or $textTransform or $textWrapping or $textColor) {
  $text = preg_replace('/<p>/', '<p class="' . $textAlign . $textAlignTablet . $textAlignMobile . $textSize . $textTransform . $textWrapping . $textColor . '">', $text);
  $text = preg_replace('/<h1>/', '<h1 class="' . $textAlign . $textAlignTablet . $textAlignMobile . $textSize . $textTransform . $textWrapping . $textColor . '">', $text);
  $text = preg_replace('/<h2>/', '<h2 class="' . $textAlign . $textAlignTablet . $textAlignMobile . $textSize . $textTransform . $textWrapping . $textColor . '">', $text);
  $text = preg_replace('/<h3>/', '<h3 class="' . $textAlign . $textAlignTablet . $textAlignMobile . $textSize . $textTransform . $textWrapping . $textColor . '">', $text);
  $text = preg_replace('/<h4>/', '<h4 class="' . $textAlign . $textAlignTablet . $textAlignMobile . $textSize . $textTransform . $textWrapping . $textColor . '">', $text);
  $text = preg_replace('/<h5>/', '<h5 class="' . $textAlign . $textAlignTablet . $textAlignMobile . $textSize . $textTransform . $textWrapping . $textColor . '">', $text);
  $text = preg_replace('/<h6>/', '<h6 class="' . $textAlign . $textAlignTablet . $textAlignMobile . $textSize . $textTransform . $textWrapping . $textColor . '">', $text);
  $text = preg_replace('/<ul>/', '<ul class="' . $textAlign . $textAlignTablet . $textAlignMobile . $textSize . $textTransform . $textWrapping . $textColor . '">', $text);
  $text = preg_replace('/<ol>/', '<ol class="' . $textAlign . $textAlignTablet . $textAlignMobile . $textSize . $textTransform . $textWrapping . $textColor . '">', $text);
}
echo $text;