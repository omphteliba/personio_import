<?php
$sql = rex_sql::factory();

$sql->setQuery('ALTER TABLE `'. rex::getTablePrefix() . 'd2u_jobs_jobs` DROP COLUMN `personio_job_id`;');
$sql->setQuery('ALTER TABLE `'. rex::getTablePrefix() . 'd2u_jobs_jobs` DROP COLUMN `personio_url_application_form`;');
$sql->setQuery('ALTER TABLE `'. rex::getTablePrefix() . 'd2u_jobs_jobs_lang` DROP COLUMN `personio_lead_in`;');
$sql->setQuery('ALTER TABLE `'. rex::getTablePrefix() . 'd2u_jobs_categories` DROP COLUMN `personio_category_id`;');

// Delete language replacements
if(!class_exists('d2u_jobs_personio_lang_helper')) {
	// Load class in case addon is deactivated
	require_once 'lib/d2u_jobs_personio_lang_helper.php';
}
d2u_jobs_personio_lang_helper::factory()->uninstall();

// Delete CronJob if installed
if(!class_exists('d2u_jobs_import_conjob')) {
	// Load class in case addon is deactivated
	require_once 'lib/d2u_jobs_import_conjob.php';
}
$import_cronjob = d2u_jobs_import_conjob::factory();
if($import_cronjob->isInstalled()) {
	$import_cronjob->delete();
}

if (!rex_config::has('d2u_jobs', 'personio_autoimport')) {
	rex_config::remove('d2u_jobs', 'personio_autoimport');
}
if (!rex_config::has('d2u_jobs', 'personio_default_category')) {
	rex_config::remove('d2u_jobs', 'personio_default_category');
}
if (!rex_config::has('d2u_jobs', 'personio_default_lang')) {
	rex_config::remove('d2u_jobs', 'personio_default_lang');
}
if (!rex_config::has('d2u_jobs', 'personio_headline_tag')) {
	rex_config::remove('d2u_jobs', 'personio_headline_tag');
}
if (!rex_config::has('d2u_jobs', 'personio_media_category')) {
	rex_config::remove('d2u_jobs', 'personio_media_category');
}
if (!rex_config::has('d2u_jobs', 'personio_xml_url')) {
	rex_config::remove('d2u_jobs', 'personio_xml_url');
}