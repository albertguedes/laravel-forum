<?php declare(strict_types=1);

/**
 * Web Routes
 *
 * These routes are for the web and are loaded by the RouteServiceProvider within a group which
 * contains the "web" middleware group. Now create something great!
 */
require __DIR__ . '/web/admin/admin.php';

require __DIR__ . '/web/posts.php';

require __DIR__ . '/web/topics.php';

require __DIR__ . '/web/forum.php';

require __DIR__ . '/web/categories.php';

require __DIR__ . '/web/tags.php';

require __DIR__ . '/web/contact.php';

require __DIR__ . '/web/xml.php';

require __DIR__ . '/web/pages.php';

require __DIR__ . '/web/users.php';

require __DIR__ . '/web/errors.php';
