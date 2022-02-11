<?php
$sql = rex_sql::factory();

$sql->setQuery("SHOW COLUMNS FROM ". \rex::getTablePrefix() ."d2u_jobs_jobs LIKE 'personio_job_id';");
if($sql->getRows() == 0) {
	$sql->setQuery('ALTER TABLE `'. rex::getTablePrefix() . 'd2u_jobs_jobs` ADD `personio_job_id` int(10) default NULL;');
}
$sql->setQuery("SHOW COLUMNS FROM ". \rex::getTablePrefix() ."d2u_jobs_jobs LIKE 'personio_url_application_form';");
if($sql->getRows() == 0) {
	$sql->setQuery('ALTER TABLE `'. rex::getTablePrefix() . 'd2u_jobs_jobs` ADD `personio_url_application_form` varchar(255) default NULL;');
}
$sql->setQuery("SHOW COLUMNS FROM ". \rex::getTablePrefix() ."d2u_jobs_jobs_lang LIKE 'personio_lead_in';");
if($sql->getRows() == 0) {
	$sql->setQuery('ALTER TABLE `'. rex::getTablePrefix() . 'd2u_jobs_jobs_lang` ADD `personio_lead_in` varchar(255) default NULL;');
}
$sql->setQuery("SHOW COLUMNS FROM ". \rex::getTablePrefix() ."d2u_jobs_categories LIKE 'personio_category_id';");
if($sql->getRows() == 0) {
	$sql->setQuery('ALTER TABLE `'. rex::getTablePrefix() . 'd2u_jobs_categories` ADD `personio_category_id` int(10) default NULL;');
}

// Insert frontend translations
if(class_exists('d2u_jobs_personio_lang_helper')) {
	d2u_jobs_personio_lang_helper::factory()->install();
}

if (!rex_config::has('d2u_jobs', 'personio_default_lang')) {
	rex_config::set('d2u_jobs', 'personio_default_lang', rex_clang::getStartId());
}
if (!rex_config::has('d2u_jobs', 'personio_headline_tag')) {
	rex_config::set('d2u_jobs', 'personio_headline_tag', 'h3');
}