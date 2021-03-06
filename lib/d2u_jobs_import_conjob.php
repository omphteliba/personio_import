<?php
/**
 * Administrates background import cronjob for personio.
 */
class d2u_jobs_import_conjob extends D2U_Helper\ACronJob {
	/**
	 * Create a new instance of object
	 * @return multinewsletter_cronjob_cleanup CronJob object
	 */
	public static function factory() {
		$cronjob = new self();
		$cronjob->name = "D2U Jobs Autoimport";
		return $cronjob;
	}
	
	/**
	 * Install CronJob. Its also activated.
	 */
	public function install() {
		$description = 'Imports jobs automatically from personio XML';
		$php_code = '<?php personio::autoimport(); ?>';
		$interval = '{\"minutes\":[0],\"hours\":[21],\"days\":\"all\",\"weekdays\":\"all\",\"months\":\"all\"}';
		self::save($description, $php_code, $interval);
	}
}