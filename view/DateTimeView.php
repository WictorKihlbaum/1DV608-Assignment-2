<?php

require_once('model/ServerTime.php');

class DateTimeView {

	public function show() {

		$timeString = ServerTime::getServerTime();

		return '<p>' . $timeString . '</p>';
	}
}