<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\User::class)

return [
    [
        'title' => 'Dashboard',
        'icon'  => 'fa fa-dashboard',
        'url'   => route('admin.dashboard'),
    ],

    [
        'title' => 'Information',
        'icon'  => 'fa fa-exclamation-circle',
        'url'   => route('admin.information'),
    ],
    [
        'title' => "Пользователи",
        'icon' => 'fa fa-credit-card',
        'pages' => [
            (new Page(\App\Permission::class))
                ->setIcon('fa fa-key')
                ->setPriority(99),
            (new Page(\App\Role::class))
                ->setIcon('fa fa-graduation-cap')
                ->setPriority(100),
            (new Page(\App\User::class))
                ->setIcon('fa fa-user')
                ->setPriority(200)
        ]
    ],
    [
        'title' => "Новости",
        'icon' => 'fa fa-newspaper-o',
        'pages' => [
            (new Page(\App\News::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(99),
            (new Page(\App\TypeNews::class))
                ->setIcon('fa fa-unsorted')
                ->setPriority(100)
        ]
    ],
    [
        'title' => "Тарифная информация",
        'icon' => 'fa fa-cogs',
        'pages' => [
            (new Page(\App\Call::class))
                ->setIcon('fa fa-phone')
                ->setPriority(99),
            (new Page(\App\InternetPackage::class))
                ->setIcon('fa fa-briefcase')
                ->setPriority(100),
            (new Page(\App\Message::class))
                ->setIcon('fa fa-comment')
                ->setPriority(101),
            (new Page(\App\TariffName::class))
                ->setIcon('fa fa-adn')
                ->setPriority(102),
            (new Page(\App\RegularPayment::class))
                ->setIcon('fa fa-cc-paypal')
                ->setPriority(103),
            (new Page(\App\Tariff::class))
                ->setIcon('fa fa-contao')
                ->setPriority(106)
        ]
    ],
    [
        'title' => "Работа с парсером",
        'icon' => 'fa fa-spinner',
        'pages' => [
            [
                'title' => 'Kyivstar',
                'icon'  => 'fa fa-bullseye',
                'url'   => route('admin.parser.kyivstar'),
            ],
            [
                'title' => 'Lifecell',
                'icon'  => 'fa fa-bullseye',
                'url'   => route('admin.parser.lifecell'),
            ],
            [
                'title' => 'Vodafone',
                'icon'  => 'fa fa-bullseye',
                'url'   => route('admin.parser.vodafone'),
            ],
        ]
    ],
    [
        'title' => "Работа с формой",
        'icon' => 'fa fa-align-justify',
        'pages' => [
            (new Page(\App\DropdownText::class))
                ->setPriority(103),
            (new Page(\App\FormDropdown::class))
                ->setPriority(106)
        ]
    ],
    [
        'title' => "Статистика",
        'icon' => 'fa fa-line-chart',
        'pages' => [
                (new Page(\App\Statistic::class))
                    ->setPriority(103),
            [
                'title' => 'График',
                'url'   => route('admin.chart')
            ],
        ]
    ],
    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [
    //
    //        \App\User::class,
    //
    //        // or
    //
    //        (new Page(\App\User::class))
    //            ->setPriority(100)
    //            ->setIcon('fa fa-user')
    //            ->setUrl('users')
    //            ->setAccessLogic(function (Page $page) {
    //                return auth()->user()->isSuperAdmin();
    //            }),
    //
    //        // or
    //
    //        new Page([
    //            'title'    => 'News',
    //            'priority' => 200,
    //            'model'    => \App\News::class
    //        ]),
    //
    //        // or
    //        (new Page(/* ... */))->setPages(function (Page $page) {
    //            $page->addPage([
    //                'title'    => 'Blog',
    //                'priority' => 100,
    //                'model'    => \App\Blog::class
	//		      ));
    //
	//		      $page->addPage(\App\Blog::class);
    //	      }),
    //
    //        // or
    //
    //        [
    //            'title'       => 'News',
    //            'priority'    => 300,
    //            'accessLogic' => function ($page) {
    //                return $page->isActive();
    //		      },
    //            'pages'       => [
    //
    //                // ...
    //
    //            ]
    //        ]
    //    ]
    // ]
];