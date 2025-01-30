<?php

$mediaIndex = site()->mediaIndex()->isTrue() ? 'site.index(true).images' : 'model.images';

return [
    'label' => 'zero.fields.backgroundImageHeading',
    'type' => 'files',
    'uploads' => 'image',
    'query' => $mediaIndex,
    'max' => '1',
    'info' => '{{ file.dimensions }} {{ file.niceSize }}',
    'image' => [
        'ratio' => '2/1',
        'cover' => 'true',
      ],
];