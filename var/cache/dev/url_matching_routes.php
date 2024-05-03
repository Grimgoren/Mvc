<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/api/session' => [[['_route' => 'api-session', '_controller' => 'App\\Controller\\CardControllerKmom02Json::ThisSession'], null, null, null, false, false, null]],
        '/api/deck' => [[['_route' => 'api-deck', '_controller' => 'App\\Controller\\CardControllerKmom02Json::apiDeck'], null, ['GET' => 0], null, false, false, null]],
        '/api/deck/shuffle' => [[['_route' => 'api-shuffle', '_controller' => 'App\\Controller\\CardControllerKmom02Json::apiShuffle'], null, ['POST' => 0], null, false, false, null]],
        '/api/deck/draw' => [[['_route' => 'api-draw', '_controller' => 'App\\Controller\\CardControllerKmom02Json::apiDraw'], null, ['POST' => 0], null, false, false, null]],
        '/card' => [[['_route' => 'landingpage', '_controller' => 'App\\Controller\\CardControllerKmom02Twig::cardStartPage'], null, null, null, false, false, null]],
        '/apilandingpage' => [[['_route' => 'apilandingpage', '_controller' => 'App\\Controller\\CardControllerKmom02Twig::apiLandpage'], null, null, null, false, false, null]],
        '/delete' => [[['_route' => 'delete', '_controller' => 'App\\Controller\\CardControllerKmom02Twig::DeleteSession'], null, null, null, false, false, null]],
        '/card/deck' => [[['_route' => 'card_init_get', '_controller' => 'App\\Controller\\CardControllerKmom02Twig::initCard'], null, ['GET' => 0], null, false, false, null]],
        '/card/deck/shuffle' => [[['_route' => 'card_shuffle_get', '_controller' => 'App\\Controller\\CardControllerKmom02Twig::initShuffle'], null, ['GET' => 0], null, false, false, null]],
        '/card/deck/draw' => [[['_route' => 'card_draw_get', '_controller' => 'App\\Controller\\CardControllerKmom02Twig::initDraw'], null, ['GET' => 0], null, false, false, null]],
        '/api/lucky/number' => [[['_route' => 'app_luckycontrollerjson_jsonnumber', '_controller' => 'App\\Controller\\LuckyControllerJson::jsonNumber'], null, null, null, false, false, null]],
        '/api' => [[['_route' => 'app_luckycontrollerjson_apiroutes', '_controller' => 'App\\Controller\\LuckyControllerJson::apiRoutes'], null, null, null, false, false, null]],
        '/api/quote' => [[['_route' => 'app_luckycontrollerjson_apiquote', '_controller' => 'App\\Controller\\LuckyControllerJson::apiQuote'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'me', '_controller' => 'App\\Controller\\LuckyControllerTwig::me'], null, null, null, false, false, null]],
        '/about' => [[['_route' => 'about', '_controller' => 'App\\Controller\\LuckyControllerTwig::about'], null, null, null, false, false, null]],
        '/report' => [[['_route' => 'report', '_controller' => 'App\\Controller\\LuckyControllerTwig::report'], null, null, null, false, false, null]],
        '/lucky' => [[['_route' => 'lucky', '_controller' => 'App\\Controller\\LuckyControllerTwig::number'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/card/deck/draw/(\\d+)(?'
                    .'|(*:226)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        226 => [
            [['_route' => 'api_draw_number', '_controller' => 'App\\Controller\\CardControllerKmom02Json::apiDrawNumber'], ['num'], ['POST' => 0], null, false, true, null],
            [['_route' => 'card_draw_number_post', '_controller' => 'App\\Controller\\CardControllerKmom02Twig::initDrawNumber'], ['num'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
