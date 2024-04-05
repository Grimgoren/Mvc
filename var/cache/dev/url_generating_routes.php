<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_xdebug' => [[], ['_controller' => 'web_profiler.controller.profiler::xdebugAction'], [], [['text', '/_profiler/xdebug']], [], [], []],
    '_profiler_font' => [['fontName'], ['_controller' => 'web_profiler.controller.profiler::fontAction'], [], [['text', '.woff2'], ['variable', '/', '[^/\\.]++', 'fontName', true], ['text', '/_profiler/font']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    'app_luckycontrollerjson_jsonnumber' => [[], ['_controller' => 'App\\Controller\\LuckyControllerJson::jsonNumber'], [], [['text', '/api/lucky/number']], [], [], []],
    'app_luckycontrollerjson_apiroutes' => [[], ['_controller' => 'App\\Controller\\LuckyControllerJson::apiRoutes'], [], [['text', '/api']], [], [], []],
    'app_luckycontrollerjson_apiquote' => [[], ['_controller' => 'App\\Controller\\LuckyControllerJson::apiQuote'], [], [['text', '/api/quote']], [], [], []],
    'me' => [[], ['_controller' => 'App\\Controller\\LuckyControllerTwig::me'], [], [['text', '/']], [], [], []],
    'about' => [[], ['_controller' => 'App\\Controller\\LuckyControllerTwig::about'], [], [['text', '/about']], [], [], []],
    'report' => [[], ['_controller' => 'App\\Controller\\LuckyControllerTwig::report'], [], [['text', '/report']], [], [], []],
    'lucky' => [[], ['_controller' => 'App\\Controller\\LuckyControllerTwig::number'], [], [['text', '/lucky']], [], [], []],
    'App\Controller\LuckyControllerJson::jsonNumber' => [[], ['_controller' => 'App\\Controller\\LuckyControllerJson::jsonNumber'], [], [['text', '/api/lucky/number']], [], [], []],
    'App\Controller\LuckyControllerJson::apiRoutes' => [[], ['_controller' => 'App\\Controller\\LuckyControllerJson::apiRoutes'], [], [['text', '/api']], [], [], []],
    'App\Controller\LuckyControllerJson::apiQuote' => [[], ['_controller' => 'App\\Controller\\LuckyControllerJson::apiQuote'], [], [['text', '/api/quote']], [], [], []],
    'App\Controller\LuckyControllerTwig::me' => [[], ['_controller' => 'App\\Controller\\LuckyControllerTwig::me'], [], [['text', '/']], [], [], []],
    'App\Controller\LuckyControllerTwig::about' => [[], ['_controller' => 'App\\Controller\\LuckyControllerTwig::about'], [], [['text', '/about']], [], [], []],
    'App\Controller\LuckyControllerTwig::report' => [[], ['_controller' => 'App\\Controller\\LuckyControllerTwig::report'], [], [['text', '/report']], [], [], []],
    'App\Controller\LuckyControllerTwig::number' => [[], ['_controller' => 'App\\Controller\\LuckyControllerTwig::number'], [], [['text', '/lucky']], [], [], []],
];
