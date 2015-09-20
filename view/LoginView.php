<?php

class LoginView {

	private static $login = 'LoginView::Login';
	private static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	private static $cookieName = 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
	private static $messageId = 'LoginView::Message';



	/**
	 * Create HTTP response
	 *
	 * Should be called after a login attempt has been determined
	 *
	 * @return  void BUT writes to standard output and cookies!
	 */
	public function response() {
		$message = '';

		$response = $this->generateLoginFormHTML($message);
		//$response .= $this->generateLogoutButtonHTML($message);
		return $response;
	}

	/**
	 * Generate HTML code on the output buffer for the logout button
	 * @param $message, String output message
	 * @return  void, BUT writes to standard output!
	 */
	private function generateLogoutButtonHTML($message) {
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $message .'</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
	}

	/**
	 * Generate HTML code on the output buffer for the logout button
	 * @param $message, String output message
	 * @return  void, BUT writes to standard output!
	 */
	private function generateLoginFormHTML($message) {
		return '
			<form method="post" > 
				<fieldset>
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $this -> setFeedbackMessage($message) . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' . $this -> fillInUserName() . '" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />
					
					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
	}

	public function didUserPressLogin() {

		return isset($_POST[self::$login]);
	}

	public function getPostedUserName() {

		return $_POST[self::$name];
	}

	public function getPostedPassword() {

		return $_POST[self::$password];
	}

	private function fillInUserName() {

		if (isset($_COOKIE[self::$cookieName])) {

			return $_COOKIE[self::$cookieName];

		} else {

			setcookie(self::$cookieName, $_POST[self::$name], time() + 60 * 60 * 24 * 365);
			$_COOKIE[self::$cookieName] = $_POST[self::$name];

			return $_POST[self::$name];
		}
	}

	private function setFeedbackMessage($feedbackMessage) {

		if ($this -> didUserPressLogin()) {

			$userNameField = $_POST[self::$name];
			$passwordField = $_POST[self::$password];

			if (empty($userNameField)) {

				$feedbackMessage = $this -> getRequestUserName();

			} else if (!empty($userNameField) && empty($passwordField)) {

				$feedbackMessage = $this -> getReguestPassword();
			}

		} else {

			$feedbackMessage = "";
		}

		return $feedbackMessage;
	}

	//CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES
	private function getRequestUserName() {
		//RETURN REQUEST VARIABLE: USERNAME
		return "Username is missing";
	}

	private function getReguestPassword() {

		return "Password is missing";
	}

}