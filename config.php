<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'pgsql';
$CFG->dblibrary = 'native';

if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1' ) {
  $CFG->dbhost    = 'localhost';
  $CFG->dbname    = 'moodle';
  $CFG->dbuser    = 'moodle';
  $CFG->dbpass    = 'moodle';
} else {
  $CFG->dbhost    = getenv("POSTGRESQL_ADDON_HOST");
  $CFG->dbname    = getenv("POSTGRESQL_ADDON_DB");
  $CFG->dbuser    = getenv("POSTGRESQL_ADDON_USER");
  $CFG->dbpass    = getenv("POSTGRESQL_ADDON_PASSWORD");
}

$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => '',
  'dbsocket' => '',
);

$CFG->wwwroot   = 'http://localhost';
$CFG->dataroot  = '/moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

require_once(dirname(__FILE__) . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
