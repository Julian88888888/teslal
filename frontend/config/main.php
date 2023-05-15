<?php
include(__DIR__.'/../../common/components/sitemap/init.php');

use himiklab\sitemap\behaviors\SitemapBehavior;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',
                [
                    'pattern' => 'sitemap',
                    'route' => 'sitemap/default/index',
                    'suffix' => '.xml',
                ],
                '<action:\w+>' => 'site/<action>',
                'feature/<id:\d+>' => 'site/feature',
            ],
        ],
        
    ],
    'params' => $params,
    'modules' => [
        'sitemap' => [
            'class' => himiklab\sitemap\Sitemap::class,
            'models' => [
                // Urls generated by models
                common\models\Car::class,
            ],
            'urls'=> [
                // Additional urls
                [
                    'loc' => '/',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.7,
                ],
                [
                    'loc' => '/models',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.6,
                ],
                [
                    'loc' => '/model3',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.6,
                ],
                [
                    'loc' => '/modelx',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.6,
                ],
                [
                    'loc' => '/modely',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.6,
                ],
                [
                    'loc' => '/cybertruck',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.6,
                ],
                [
                    'loc' => '/roadster',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.6,
                ],
                [
                    'loc' => '/testdrive',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.6,
                ],
                [
                    'loc' => '/katalogavto',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.6,
                ],

                [
                    'loc' => '/semi',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.5,
                ],
                [
                    'loc' => '/zaryadki',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.5,
                ],
                [
                    'loc' => '/sravnenie',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.5,
                ],

                [
                    'loc' => '/designs',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.5,
                ],
                [
                    'loc' => '/design3',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.5,
                ],
                [
                    'loc' => '/designx',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.5,
                ],
                [
                    'loc' => '/designy',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.5,
                ],

                [
                    'loc' => '/about',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.5,
                ],
                [
                    'loc' => '/blog',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.5,
                ],
                [
                    'loc' => '/delivery',
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.5,
                ],
            ],
            'enableGzip' => true,
            'cacheExpire' => 1//86400,     // 24 hours
        ],
    ]
];
