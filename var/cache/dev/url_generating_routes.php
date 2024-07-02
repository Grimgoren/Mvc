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
    'api-session' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Json::thisSession'], [], [['text', '/session']], [], [], []],
    'api-deck' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Json::apiDeck'], [], [['text', '/api/deck']], [], [], []],
    'api-shuffle' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Json::apiShuffle'], [], [['text', '/api/deck/shuffle']], [], [], []],
    'api-draw' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Json::apiDraw'], [], [['text', '/api/deck/draw']], [], [], []],
    'api_draw_number' => [['num'], ['_controller' => 'App\\Controller\\CardControllerKmom02Json::apiDrawNumber'], ['num' => '\\d+'], [['variable', '/', '\\d+', 'num', true], ['text', '/card/deck/draw']], [], [], []],
    'api-game' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Json::apiGame'], [], [['text', '/api/game']], [], [], []],
    'landingpage' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Twig::cardStartPage'], [], [['text', '/card']], [], [], []],
    'apilandingpage' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Twig::apiLandpage'], [], [['text', '/apilandingpage']], [], [], []],
    'gamelandingpage' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Twig::gameLandingpage'], [], [['text', '/gamelandingpage']], [], [], []],
    'gamedoc' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Twig::gameDoc'], [], [['text', '/game/doc']], [], [], []],
    'delete' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Twig::deleteSession'], [], [['text', '/session/delete']], [], [], []],
    'card_init_get' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Twig::initCard'], [], [['text', '/card/deck']], [], [], []],
    'card_shuffle_get' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Twig::initShuffle'], [], [['text', '/card/deck/shuffle']], [], [], []],
    'card_draw_get' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Twig::initDraw'], [], [['text', '/card/deck/draw']], [], [], []],
    'card_draw_number_post' => [['num'], ['_controller' => 'App\\Controller\\CardControllerKmom02Twig::initDrawNumber'], ['num' => '\\d+'], [['variable', '/', '\\d+', 'num', true], ['text', '/card/deck/draw']], [], [], []],
    'app_library' => [[], ['_controller' => 'App\\Controller\\LibraryController::index'], [], [['text', '/library']], [], [], []],
    'library-page' => [[], ['_controller' => 'App\\Controller\\LibraryController::libraryPage'], [], [['text', '/library/landing-page']], [], [], []],
    'library-addBook-page' => [[], ['_controller' => 'App\\Controller\\LibraryController::addBookPage'], [], [['text', '/library/addBook']], [], [], []],
    'library-showAll-page' => [[], ['_controller' => 'App\\Controller\\LibraryController::showAllBooks'], [], [['text', '/library/allBooks']], [], [], []],
    'library-showDetails-page' => [['title'], ['_controller' => 'App\\Controller\\LibraryController::showBookDetails'], [], [['variable', '/', '[^/]++', 'title', true], ['text', '/library/detailsOfBook']], [], [], []],
    'library_create' => [[], ['_controller' => 'App\\Controller\\LibraryController::createLibraryItem'], [], [['text', '/library/create']], [], [], []],
    'library_show_all' => [[], ['_controller' => 'App\\Controller\\LibraryController::showAllLibraryItems'], [], [['text', '/api/library/books']], [], [], []],
    'library_show_all_html' => [[], ['_controller' => 'App\\Controller\\LibraryController::showAllLibraryItemsHtml'], [], [['text', '/library/showHtml']], [], [], []],
    'library_by_id' => [['id'], ['_controller' => 'App\\Controller\\LibraryController::showLibraryItemById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/library/show']], [], [], []],
    'library_by_isbn' => [['isbn'], ['_controller' => 'App\\Controller\\LibraryController::showLibraryItemByISBN'], [], [['variable', '/', '[^/]++', 'isbn', true], ['text', '/api/library/book']], [], [], []],
    'library_search_html' => [[], ['_controller' => 'App\\Controller\\LibraryController::showLibrarySearchHtml'], [], [['text', '/library/search']], [], [], []],
    'library_update' => [['id', 'picture'], ['_controller' => 'App\\Controller\\LibraryController::updateLibraryItem'], [], [['variable', '/', '[^/]++', 'picture', true], ['variable', '/', '[^/]++', 'id', true], ['text', '/library/update']], [], [], []],
    'library_edit' => [['id'], ['_controller' => 'App\\Controller\\LibraryController::editLibraryItem'], [], [['text', '/update'], ['variable', '/', '[^/]++', 'id', true], ['text', '/library']], [], [], []],
    'library_show_edit_form' => [['id'], ['_controller' => 'App\\Controller\\LibraryController::showEditForm'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/library/edit']], [], [], []],
    'library_delete' => [['id'], ['_controller' => 'App\\Controller\\LibraryController::libraryDelete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/library/delete']], [], [], []],
    'api-lucky' => [[], ['_controller' => 'App\\Controller\\LuckyControllerJson::jsonNumber'], [], [['text', '/api/lucky/number']], [], [], []],
    'api' => [[], ['_controller' => 'App\\Controller\\LuckyControllerJson::apiRoutes'], [], [['text', '/api']], [], [], []],
    'api-quote' => [[], ['_controller' => 'App\\Controller\\LuckyControllerJson::apiQuote'], [], [['text', '/api/quote']], [], [], []],
    'me' => [[], ['_controller' => 'App\\Controller\\LuckyControllerTwig::mePage'], [], [['text', '/']], [], [], []],
    'about' => [[], ['_controller' => 'App\\Controller\\LuckyControllerTwig::about'], [], [['text', '/about']], [], [], []],
    'report' => [[], ['_controller' => 'App\\Controller\\LuckyControllerTwig::report'], [], [['text', '/report']], [], [], []],
    'lucky' => [[], ['_controller' => 'App\\Controller\\LuckyControllerTwig::number'], [], [['text', '/lucky']], [], [], []],
    'app_product' => [[], ['_controller' => 'App\\Controller\\ProductController::index'], [], [['text', '/product']], [], [], []],
    'product_create' => [[], ['_controller' => 'App\\Controller\\ProductController::createProduct'], [], [['text', '/product/create']], [], [], []],
    'product_show_all' => [[], ['_controller' => 'App\\Controller\\ProductController::showAllProduct'], [], [['text', '/product/show']], [], [], []],
    'product_by_id' => [['id'], ['_controller' => 'App\\Controller\\ProductController::showProductById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product/show']], [], [], []],
    'product_delete_by_id' => [['id'], ['_controller' => 'App\\Controller\\ProductController::deleteProductById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product/delete']], [], [], []],
    'product_update' => [['id', 'value'], ['_controller' => 'App\\Controller\\ProductController::updateProduct'], [], [['variable', '/', '[^/]++', 'value', true], ['variable', '/', '[^/]++', 'id', true], ['text', '/product/update']], [], [], []],
    'product_view_all' => [[], ['_controller' => 'App\\Controller\\ProductController::viewAllProduct'], [], [['text', '/product/view']], [], [], []],
    'product_view_minimum_value' => [['value'], ['_controller' => 'App\\Controller\\ProductController::viewProductWithMinimumValue'], [], [['variable', '/', '[^/]++', 'value', true], ['text', '/product/view']], [], [], []],
    'product_by_min_value' => [['value'], ['_controller' => 'App\\Controller\\ProductController::showProductByMinimumValue'], [], [['variable', '/', '[^/]++', 'value', true], ['text', '/product/show/min']], [], [], []],
    'gamepage' => [[], ['_controller' => 'App\\Controller\\TjugoettControllerTwig::cardStartPage'], [], [['text', '/game']], [], [], []],
    'startgame' => [[], ['_controller' => 'App\\Controller\\TjugoettControllerTwig::initGame'], [], [['text', '/game/start']], [], [], []],
    'continuegame' => [[], ['_controller' => 'App\\Controller\\TjugoettControllerTwig::continueGame'], [], [['text', '/game/continue']], [], [], []],
    'stopgame' => [[], ['_controller' => 'App\\Controller\\TjugoettControllerTwig::stopGame'], [], [['text', '/game/stop']], [], [], []],
    'App\Controller\CardControllerKmom02Json::thisSession' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Json::thisSession'], [], [['text', '/session']], [], [], []],
    'App\Controller\CardControllerKmom02Json::apiDeck' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Json::apiDeck'], [], [['text', '/api/deck']], [], [], []],
    'App\Controller\CardControllerKmom02Json::apiShuffle' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Json::apiShuffle'], [], [['text', '/api/deck/shuffle']], [], [], []],
    'App\Controller\CardControllerKmom02Json::apiDraw' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Json::apiDraw'], [], [['text', '/api/deck/draw']], [], [], []],
    'App\Controller\CardControllerKmom02Json::apiDrawNumber' => [['num'], ['_controller' => 'App\\Controller\\CardControllerKmom02Json::apiDrawNumber'], ['num' => '\\d+'], [['variable', '/', '\\d+', 'num', true], ['text', '/card/deck/draw']], [], [], []],
    'App\Controller\CardControllerKmom02Json::apiGame' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Json::apiGame'], [], [['text', '/api/game']], [], [], []],
    'App\Controller\CardControllerKmom02Twig::cardStartPage' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Twig::cardStartPage'], [], [['text', '/card']], [], [], []],
    'App\Controller\CardControllerKmom02Twig::apiLandpage' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Twig::apiLandpage'], [], [['text', '/apilandingpage']], [], [], []],
    'App\Controller\CardControllerKmom02Twig::gameLandingpage' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Twig::gameLandingpage'], [], [['text', '/gamelandingpage']], [], [], []],
    'App\Controller\CardControllerKmom02Twig::gameDoc' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Twig::gameDoc'], [], [['text', '/game/doc']], [], [], []],
    'App\Controller\CardControllerKmom02Twig::deleteSession' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Twig::deleteSession'], [], [['text', '/session/delete']], [], [], []],
    'App\Controller\CardControllerKmom02Twig::initCard' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Twig::initCard'], [], [['text', '/card/deck']], [], [], []],
    'App\Controller\CardControllerKmom02Twig::initShuffle' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Twig::initShuffle'], [], [['text', '/card/deck/shuffle']], [], [], []],
    'App\Controller\CardControllerKmom02Twig::initDraw' => [[], ['_controller' => 'App\\Controller\\CardControllerKmom02Twig::initDraw'], [], [['text', '/card/deck/draw']], [], [], []],
    'App\Controller\CardControllerKmom02Twig::initDrawNumber' => [['num'], ['_controller' => 'App\\Controller\\CardControllerKmom02Twig::initDrawNumber'], ['num' => '\\d+'], [['variable', '/', '\\d+', 'num', true], ['text', '/card/deck/draw']], [], [], []],
    'App\Controller\LibraryController::index' => [[], ['_controller' => 'App\\Controller\\LibraryController::index'], [], [['text', '/library']], [], [], []],
    'App\Controller\LibraryController::libraryPage' => [[], ['_controller' => 'App\\Controller\\LibraryController::libraryPage'], [], [['text', '/library/landing-page']], [], [], []],
    'App\Controller\LibraryController::addBookPage' => [[], ['_controller' => 'App\\Controller\\LibraryController::addBookPage'], [], [['text', '/library/addBook']], [], [], []],
    'App\Controller\LibraryController::showAllBooks' => [[], ['_controller' => 'App\\Controller\\LibraryController::showAllBooks'], [], [['text', '/library/allBooks']], [], [], []],
    'App\Controller\LibraryController::showBookDetails' => [['title'], ['_controller' => 'App\\Controller\\LibraryController::showBookDetails'], [], [['variable', '/', '[^/]++', 'title', true], ['text', '/library/detailsOfBook']], [], [], []],
    'App\Controller\LibraryController::createLibraryItem' => [[], ['_controller' => 'App\\Controller\\LibraryController::createLibraryItem'], [], [['text', '/library/create']], [], [], []],
    'App\Controller\LibraryController::showAllLibraryItems' => [[], ['_controller' => 'App\\Controller\\LibraryController::showAllLibraryItems'], [], [['text', '/api/library/books']], [], [], []],
    'App\Controller\LibraryController::showAllLibraryItemsHtml' => [[], ['_controller' => 'App\\Controller\\LibraryController::showAllLibraryItemsHtml'], [], [['text', '/library/showHtml']], [], [], []],
    'App\Controller\LibraryController::showLibraryItemById' => [['id'], ['_controller' => 'App\\Controller\\LibraryController::showLibraryItemById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/library/show']], [], [], []],
    'App\Controller\LibraryController::showLibraryItemByISBN' => [['isbn'], ['_controller' => 'App\\Controller\\LibraryController::showLibraryItemByISBN'], [], [['variable', '/', '[^/]++', 'isbn', true], ['text', '/api/library/book']], [], [], []],
    'App\Controller\LibraryController::showLibrarySearchHtml' => [[], ['_controller' => 'App\\Controller\\LibraryController::showLibrarySearchHtml'], [], [['text', '/library/search']], [], [], []],
    'App\Controller\LibraryController::updateLibraryItem' => [['id', 'picture'], ['_controller' => 'App\\Controller\\LibraryController::updateLibraryItem'], [], [['variable', '/', '[^/]++', 'picture', true], ['variable', '/', '[^/]++', 'id', true], ['text', '/library/update']], [], [], []],
    'App\Controller\LibraryController::editLibraryItem' => [['id'], ['_controller' => 'App\\Controller\\LibraryController::editLibraryItem'], [], [['text', '/update'], ['variable', '/', '[^/]++', 'id', true], ['text', '/library']], [], [], []],
    'App\Controller\LibraryController::showEditForm' => [['id'], ['_controller' => 'App\\Controller\\LibraryController::showEditForm'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/library/edit']], [], [], []],
    'App\Controller\LibraryController::libraryDelete' => [['id'], ['_controller' => 'App\\Controller\\LibraryController::libraryDelete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/library/delete']], [], [], []],
    'App\Controller\LuckyControllerJson::jsonNumber' => [[], ['_controller' => 'App\\Controller\\LuckyControllerJson::jsonNumber'], [], [['text', '/api/lucky/number']], [], [], []],
    'App\Controller\LuckyControllerJson::apiRoutes' => [[], ['_controller' => 'App\\Controller\\LuckyControllerJson::apiRoutes'], [], [['text', '/api']], [], [], []],
    'App\Controller\LuckyControllerJson::apiQuote' => [[], ['_controller' => 'App\\Controller\\LuckyControllerJson::apiQuote'], [], [['text', '/api/quote']], [], [], []],
    'App\Controller\LuckyControllerTwig::mePage' => [[], ['_controller' => 'App\\Controller\\LuckyControllerTwig::mePage'], [], [['text', '/']], [], [], []],
    'App\Controller\LuckyControllerTwig::about' => [[], ['_controller' => 'App\\Controller\\LuckyControllerTwig::about'], [], [['text', '/about']], [], [], []],
    'App\Controller\LuckyControllerTwig::report' => [[], ['_controller' => 'App\\Controller\\LuckyControllerTwig::report'], [], [['text', '/report']], [], [], []],
    'App\Controller\LuckyControllerTwig::number' => [[], ['_controller' => 'App\\Controller\\LuckyControllerTwig::number'], [], [['text', '/lucky']], [], [], []],
    'App\Controller\ProductController::index' => [[], ['_controller' => 'App\\Controller\\ProductController::index'], [], [['text', '/product']], [], [], []],
    'App\Controller\ProductController::createProduct' => [[], ['_controller' => 'App\\Controller\\ProductController::createProduct'], [], [['text', '/product/create']], [], [], []],
    'App\Controller\ProductController::showAllProduct' => [[], ['_controller' => 'App\\Controller\\ProductController::showAllProduct'], [], [['text', '/product/show']], [], [], []],
    'App\Controller\ProductController::showProductById' => [['id'], ['_controller' => 'App\\Controller\\ProductController::showProductById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product/show']], [], [], []],
    'App\Controller\ProductController::deleteProductById' => [['id'], ['_controller' => 'App\\Controller\\ProductController::deleteProductById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product/delete']], [], [], []],
    'App\Controller\ProductController::updateProduct' => [['id', 'value'], ['_controller' => 'App\\Controller\\ProductController::updateProduct'], [], [['variable', '/', '[^/]++', 'value', true], ['variable', '/', '[^/]++', 'id', true], ['text', '/product/update']], [], [], []],
    'App\Controller\ProductController::viewAllProduct' => [[], ['_controller' => 'App\\Controller\\ProductController::viewAllProduct'], [], [['text', '/product/view']], [], [], []],
    'App\Controller\ProductController::viewProductWithMinimumValue' => [['value'], ['_controller' => 'App\\Controller\\ProductController::viewProductWithMinimumValue'], [], [['variable', '/', '[^/]++', 'value', true], ['text', '/product/view']], [], [], []],
    'App\Controller\ProductController::showProductByMinimumValue' => [['value'], ['_controller' => 'App\\Controller\\ProductController::showProductByMinimumValue'], [], [['variable', '/', '[^/]++', 'value', true], ['text', '/product/show/min']], [], [], []],
    'App\Controller\TjugoettControllerTwig::cardStartPage' => [[], ['_controller' => 'App\\Controller\\TjugoettControllerTwig::cardStartPage'], [], [['text', '/game']], [], [], []],
    'App\Controller\TjugoettControllerTwig::initGame' => [[], ['_controller' => 'App\\Controller\\TjugoettControllerTwig::initGame'], [], [['text', '/game/start']], [], [], []],
    'App\Controller\TjugoettControllerTwig::continueGame' => [[], ['_controller' => 'App\\Controller\\TjugoettControllerTwig::continueGame'], [], [['text', '/game/continue']], [], [], []],
    'App\Controller\TjugoettControllerTwig::stopGame' => [[], ['_controller' => 'App\\Controller\\TjugoettControllerTwig::stopGame'], [], [['text', '/game/stop']], [], [], []],
];
