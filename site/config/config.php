<?php

return [

    // https://getkirby.com/docs/reference/system/options/panel#custom-panel-css
    'panel' => [
      'css' => 'assets/css/panel.css'
    ],

    // https://getkirby.com/docs/reference/system/options/languages
    'languages' => true,
    // 'languages.detect' => false,

    // https://getkirby.com/docs/reference/system/options/smartypants
    'smartypants' => true,

    // https://getkirby.com/docs/reference/system/options/thumbs
    // not used anywhere actually
    'thumbs' => [
      'srcsets' => [
        'default' => [
          '300w'  => ['width' => 300, 'quality' => 85],
          '600w'  => ['width' => 600, 'quality' => 85],
          '900w'  => ['width' => 900, 'quality' => 85],
          '1200w' => ['width' => 1200, 'quality' => 85],
          '1800w' => ['width' => 1800, 'quality' => 85]
        ],
        'default_webp' => [
          '300w'  => ['width' => 300, 'quality' => 85, 'format' => 'webp'],
          '600w'  => ['width' => 600, 'quality' => 85, 'format' => 'webp'],
          '900w'  => ['width' => 900, 'quality' => 85, 'format' => 'webp'],
          '1200w' => ['width' => 1200, 'quality' => 85, 'format' => 'webp'],
          '1800w' => ['width' => 1800, 'quality' => 85, 'format' => 'webp']
        ],
        'background' => [
          '600w'  => ['width' => 600, 'quality' => 85],
          '900w'  => ['width' => 900, 'quality' => 85],
          '1200w' => ['width' => 1200, 'quality' => 85],
          '1600w' => ['width' => 1600, 'quality' => 85],
          '1920w' => ['width' => 1920, 'quality' => 85],
          '2200w' => ['width' => 2200, 'quality' => 85],
          '2560w' => ['width' => 2560, 'quality' => 85]
        ],
        'background_webp' => [
          '600w'  => ['width' => 600, 'quality' => 85, 'format' => 'webp'],
          '900w'  => ['width' => 900, 'quality' => 85, 'format' => 'webp'],
          '1200w' => ['width' => 1200, 'quality' => 85, 'format' => 'webp'],
          '1600w' => ['width' => 1600, 'quality' => 85, 'format' => 'webp'],
          '1920w' => ['width' => 1920, 'quality' => 85, 'format' => 'webp'],
          '2200w' => ['width' => 2200, 'quality' => 85, 'format' => 'webp'],
          '2560w' => ['width' => 2560, 'quality' => 85, 'format' => 'webp']
          ]
        ]
    ],

    // Robots plugin https://github.com/bnomei/kirby3-robots-txt
    'bnomei.robots-txt.sitemap' => 'sitemap.xml',
    'bnomei.robots-txt.groups' => [ // array or callback
      '*' => [ // user-agent
          'disallow' => [
              '/kirby/',
              '/site/',
          ],
          'allow' => [
              '/media/',
          ]
      ]
    ],

    // Write custom CSS to file
    'hooks' => [
      'site.update:after' => function($newSite) {
    
        $css = $newSite->customCss()->value();
          if (kirby()->languages()->isNotEmpty()) {
            if (kirby()->language()->isDefault()) {
              F::write(kirby()->root('assets') . '/css/site.css', $css);
            }
          } else {
            F::write(kirby()->root('assets') . '/css/site.css', $css);
          }
        }
    ],

    // Support for language detect option https://getkirby.com/docs/guide/languages/introduction#automatic-language-detection
    'routes' => [
      [
          'pattern' => '/',
          'action'  => function () {
              $session = kirby()->session();

              if ($session->get('languages.detect', false) === false && option('languages.detect') === true) {
                  $session->set('languages.detect', true);

                  return kirby()
                      ->response()
                      ->redirect(kirby()->detectedLanguage()->url());
              }

              return page();
          }
        ]
    ],

    // Remove update notification for some plugins
    'updates.plugins' => [
      'avoskitchen/sanitizer'         => false,
      'bvdputte/kirby-bettersearch'   => false,
      'hananils/kirby-colors'         => false,
      'kirbyzone/sitemapper'          => false,
      'sylvainjule/code-editor'       => false,
      'microman/formblock'            => false,
      'zero/zero-one'                 => false,
      'getkirby/resave'               => false
    ]

];
