<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'pgsql';
$CFG->dblibrary = 'native';

if (getenv("IS_PROD")) {
  error_log("IS_PROD");
  error_log(getenv("POSTGRESQL_ADDON_HOST"));
  $CFG->dbhost    = getenv("POSTGRESQL_ADDON_HOST");
  $CFG->dbname    = getenv("POSTGRESQL_ADDON_DB");
  $CFG->dbuser    = getenv("POSTGRESQL_ADDON_USER");
  $CFG->dbpass    = getenv("POSTGRESQL_ADDON_PASSWORD");
} else {
  error_log("IS_DEV");
  $CFG->dbhost    = 'localhost';
  $CFG->dbname    = 'moodle';
  $CFG->dbuser    = 'moodle';
  $CFG->dbpass    = 'moodle';
}

$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => '',
  'dbsocket' => '',
);

$CFG->wwwroot   = 'http://localhost';
$CFG->dataroot  = getenv("APP_HOME").'/moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

require_once(dirname(__FILE__) . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
