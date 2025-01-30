<?php

Kirby::plugin('getkirby/resave', [
	'routes' => [
		[
			'pattern' => 'resave',
			'language' => '*',
			'action'  => function () {

				set_time_limit(0);

				kirby()->impersonate('kirby');

				foreach (kirby()->site()->index() as $page) {
					$page->update();
				}

				die('Your content is updated!');

			}
		]
	]
]);
