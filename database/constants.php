<?php

// define database constants

defined('DB_SERVER') ? null : define('DB_SERVER', 'localhost');
defined('DB_USER') ? null : define('DB_USER', 'root');
defined('DB_PASS') ? null : define('DB_PASS', '');
defined('DB_NAME') ? null : define('DB_NAME', 'visionary_db');

// database table constants
defined('TBL_USER') ? null : define('TBL_USER', 'tbl_users');
defined('TBL_PROJECT') ? null : define('TBL_PROJECT', 'tbl_projects');
defined('TBL_MEMBER') ? null : define('TBL_MEMBER', 'tbl_members');
defined('TBL_CONTRIBUTION') ? null : define('TBL_CONTRIBUTION', 'tbl_contributions');
defined('TBL_CATEGORY') ? null : define('TBL_CATEGORY', 'tbl_categories');
