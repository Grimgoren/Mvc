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
        '/session' => [[['_route' => 'api-session', '_controller' => 'App\\Controller\\CardControllerKmom02Json::thisSession'], null, null, null, false, false, null]],
        '/api/deck' => [[['_route' => 'api-deck', '_controller' => 'App\\Controller\\CardControllerKmom02Json::apiDeck'], null, ['GET' => 0], null, false, false, null]],
        '/api/deck/shuffle' => [[['_route' => 'api-shuffle', '_controller' => 'App\\Controller\\CardControllerKmom02Json::apiShuffle'], null, ['POST' => 0], null, false, false, null]],
        '/api/deck/draw' => [[['_route' => 'api-draw', '_controller' => 'App\\Controller\\CardControllerKmom02Json::apiDraw'], null, ['POST' => 0], null, false, false, null]],
        '/api/game' => [[['_route' => 'api-game', '_controller' => 'App\\Controller\\CardControllerKmom02Json::apiGame'], null, ['GET' => 0], null, false, false, null]],
        '/card' => [[['_route' => 'landingpage', '_controller' => 'App\\Controller\\CardControllerKmom02Twig::cardStartPage'], null, null, null, false, false, null]],
        '/apilandingpage' => [[['_route' => 'apilandingpage', '_controller' => 'App\\Controller\\CardControllerKmom02Twig::apiLandpage'], null, null, null, false, false, null]],
        '/gamelandingpage' => [[['_route' => 'gamelandingpage', '_controller' => 'App\\Controller\\CardControllerKmom02Twig::gameLandingpage'], null, null, null, false, false, null]],
        '/game/doc' => [[['_route' => 'gamedoc', '_controller' => 'App\\Controller\\CardControllerKmom02Twig::gameDoc'], null, null, null, false, false, null]],
        '/session/delete' => [[['_route' => 'delete', '_controller' => 'App\\Controller\\CardControllerKmom02Twig::deleteSession'], null, null, null, false, false, null]],
        '/card/deck' => [[['_route' => 'card_init_get', '_controller' => 'App\\Controller\\CardControllerKmom02Twig::initCard'], null, ['GET' => 0], null, false, false, null]],
        '/card/deck/shuffle' => [[['_route' => 'card_shuffle_get', '_controller' => 'App\\Controller\\CardControllerKmom02Twig::initShuffle'], null, ['GET' => 0], null, false, false, null]],
        '/card/deck/draw' => [[['_route' => 'card_draw_get', '_controller' => 'App\\Controller\\CardControllerKmom02Twig::initDraw'], null, ['GET' => 0], null, false, false, null]],
        '/library' => [[['_route' => 'app_library', '_controller' => 'App\\Controller\\LibraryController::index'], null, null, null, false, false, null]],
        '/library/landing-page' => [[['_route' => 'library-page', '_controller' => 'App\\Controller\\LibraryController::libraryPage'], null, null, null, false, false, null]],
        '/library/addBook' => [[['_route' => 'library-addBook-page', '_controller' => 'App\\Controller\\LibraryController::addBookPage'], null, null, null, false, false, null]],
        '/library/create' => [[['_route' => 'library_create', '_controller' => 'App\\Controller\\LibraryController::createLibraryItem'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/library/showHtml' => [[['_route' => 'library_show_all_html', '_controller' => 'App\\Controller\\LibraryController::showAllLibraryItemsHtml'], null, null, null, false, false, null]],
        '/library/search' => [[['_route' => 'library_search_html', '_controller' => 'App\\Controller\\LibraryController::showLibrarySearchHtml'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/library/books' => [[['_route' => 'library_show_all', '_controller' => 'App\\Controller\\LibraryControllerJson::showAllLibraryItems'], null, null, null, false, false, null]],
        '/api/lucky/number' => [[['_route' => 'api-lucky', '_controller' => 'App\\Controller\\LuckyControllerJson::jsonNumber'], null, null, null, false, false, null]],
        '/api' => [[['_route' => 'api', '_controller' => 'App\\Controller\\LuckyControllerJson::apiRoutes'], null, null, null, false, false, null]],
        '/api/quote' => [[['_route' => 'api-quote', '_controller' => 'App\\Controller\\LuckyControllerJson::apiQuote'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'me', '_controller' => 'App\\Controller\\LuckyControllerTwig::mePage'], null, null, null, false, false, null]],
        '/about' => [[['_route' => 'about', '_controller' => 'App\\Controller\\LuckyControllerTwig::about'], null, null, null, false, false, null]],
        '/report' => [[['_route' => 'report', '_controller' => 'App\\Controller\\LuckyControllerTwig::report'], null, null, null, false, false, null]],
        '/lucky' => [[['_route' => 'lucky', '_controller' => 'App\\Controller\\LuckyControllerTwig::number'], null, null, null, false, false, null]],
        '/metrics' => [[['_route' => 'metrics', '_controller' => 'App\\Controller\\LuckyControllerTwig::metrics'], null, null, null, false, false, null]],
        '/product' => [[['_route' => 'app_product', '_controller' => 'App\\Controller\\ProductController::index'], null, null, null, false, false, null]],
        '/product/create' => [[['_route' => 'product_create', '_controller' => 'App\\Controller\\ProductController::createProduct'], null, null, null, false, false, null]],
        '/product/show' => [[['_route' => 'product_show_all', '_controller' => 'App\\Controller\\ProductController::showAllProduct'], null, null, null, false, false, null]],
        '/product/view' => [[['_route' => 'product_view_all', '_controller' => 'App\\Controller\\ProductController::viewAllProduct'], null, null, null, false, false, null]],
        '/proj' => [[['_route' => 'proj', '_controller' => 'App\\Controller\\ProjController::blackJackStart'], null, null, null, false, false, null]],
        '/blackjack/start' => [[['_route' => 'blackjack', '_controller' => 'App\\Controller\\ProjController::startBlackJack'], null, ['GET' => 0], null, false, false, null]],
        '/blackjack/gameCheck' => [[['_route' => 'gameCheck', '_controller' => 'App\\Controller\\ProjController::gameCheck'], null, ['GET' => 0], null, false, false, null]],
        '/blackjack/hitRegister' => [[['_route' => 'hitRegister', '_controller' => 'App\\Controller\\ProjController::hitRegister'], null, ['GET' => 0], null, false, false, null]],
        '/blackjack/hit' => [[['_route' => 'hit', '_controller' => 'App\\Controller\\ProjController::blackJackHit'], null, ['GET' => 0], null, false, false, null]],
        '/blackjack/standRegister' => [[['_route' => 'standRegister', '_controller' => 'App\\Controller\\ProjController::standRegister'], null, ['GET' => 0], null, false, false, null]],
        '/blackjack/stand' => [[['_route' => 'stand', '_controller' => 'App\\Controller\\ProjController::stopBlackJack'], null, ['GET' => 0], null, false, false, null]],
        '/blackjack/doublingRegister' => [[['_route' => 'doublingRegister', '_controller' => 'App\\Controller\\ProjController::doublingRegister'], null, ['GET' => 0], null, false, false, null]],
        '/blackjack/DoublingDown' => [[['_route' => 'DoublingDown', '_controller' => 'App\\Controller\\ProjController::blackJackDoublingDown'], null, ['GET' => 0], null, false, false, null]],
        '/game' => [[['_route' => 'gamepage', '_controller' => 'App\\Controller\\TjugoettControllerTwig::cardStartPage'], null, null, null, false, false, null]],
        '/game/start' => [[['_route' => 'startgame', '_controller' => 'App\\Controller\\TjugoettControllerTwig::initGame'], null, ['GET' => 0], null, false, false, null]],
        '/game/continue' => [[['_route' => 'continuegame', '_controller' => 'App\\Controller\\TjugoettControllerTwig::continueGame'], null, ['GET' => 0], null, false, false, null]],
        '/game/stop' => [[['_route' => 'stopgame', '_controller' => 'App\\Controller\\TjugoettControllerTwig::stopGame'], null, ['GET' => 0], null, false, false, null]],
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
                .'|/library/(?'
                    .'|detailsOfBook/([^/]++)(*:269)'
                    .'|([^/]++)/update(*:292)'
                    .'|edit/([^/]++)(*:313)'
                    .'|delete/([^/]++)(*:336)'
                    .'|show/([^/]++)(*:357)'
                .')'
                .'|/api/library/book/([^/]++)(*:392)'
                .'|/product/(?'
                    .'|show/(?'
                        .'|([^/]++)(*:428)'
                        .'|min/([^/]++)(*:448)'
                    .')'
                    .'|delete/([^/]++)(*:472)'
                    .'|update/([^/]++)/([^/]++)(*:504)'
                    .'|view/([^/]++)(*:525)'
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
        ],
        269 => [[['_route' => 'library-showDetails-page', '_controller' => 'App\\Controller\\LibraryController::showBookDetails'], ['title'], ['GET' => 0], null, false, true, null]],
        292 => [[['_route' => 'library_edit', '_controller' => 'App\\Controller\\LibraryController::editLibraryItem'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        313 => [[['_route' => 'library_show_edit_form', '_controller' => 'App\\Controller\\LibraryController::showEditForm'], ['id'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        336 => [[['_route' => 'library_delete', '_controller' => 'App\\Controller\\LibraryController::libraryDelete'], ['id'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        357 => [[['_route' => 'library_by_id', '_controller' => 'App\\Controller\\LibraryControllerJson::showLibraryItemById'], ['id'], null, null, false, true, null]],
        392 => [[['_route' => 'library_by_isbn', '_controller' => 'App\\Controller\\LibraryControllerJson::showLibraryItemByISBN'], ['isbn'], null, null, false, true, null]],
        428 => [[['_route' => 'product_by_id', '_controller' => 'App\\Controller\\ProductController::showProductById'], ['id'], null, null, false, true, null]],
        448 => [[['_route' => 'product_by_min_value', '_controller' => 'App\\Controller\\ProductController::showProductByMinimumValue'], ['value'], null, null, false, true, null]],
        472 => [[['_route' => 'product_delete_by_id', '_controller' => 'App\\Controller\\ProductController::deleteProductById'], ['id'], null, null, false, true, null]],
        504 => [[['_route' => 'product_update', '_controller' => 'App\\Controller\\ProductController::updateProduct'], ['id', 'value'], null, null, false, true, null]],
        525 => [
            [['_route' => 'product_view_minimum_value', '_controller' => 'App\\Controller\\ProductController::viewProductWithMinimumValue'], ['value'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
