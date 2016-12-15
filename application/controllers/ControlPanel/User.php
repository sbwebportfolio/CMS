<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends My_Controller
{
	/**
	 * Log a user in.
	 */
	public function login()
	{
		$this->checkAjax();

		// Get the data.
		$email = $this->input->post('user');
		$pass = $this->input->post('pass');
		$remember = $this->input->post('remember');

		// Check if the max login attempts is exceeded.
		if ($this->ion_auth->is_max_login_attempts_exceeded($email))
			echo json_encode(['error' => 'The maximum number of login attempts is exceeded.']);
		// Log the user in.
		else
			$this->showResult($this->ion_auth->login($email, $pass, $remember));
	}

	/**
	 * Log the current user out.
	 */
	public function logout()
	{
		$this->ion_auth->logout();
		redirect('/ControlPanel');
	}

	public function remove()
	{
		$this->checkAjax();
		$this->showResult($this->ion_auth->delete_user($this->input->get('id')));
	}

	/**
	 * Send a password recovery e-mail. (TODO)
	 */
	public function recover()
	{
		//$this->checkAjax();

		$email = $this->input->get('email');

		// Get the recovery code.
		$reset = $this->ion_auth->forgotten_password($email);
		if (!$reset)
			echo json_encode(['error' => 'Unknown e-mail address.']);
		else
		{
			$code = $reset['forgotten_password_code'];

			// Get the site, for 'from'.
			$url = substr(base_url(), 7);
			if (strpos($url, '/') === 0)
				$url = substr($url, 1);

			// Send the recovery mail.
			$this->load->library('email');
			$this->email->from('recovery@' . $url, $url);
			$this->email->to($email);
			$this->email->subject('Password recovery');
			$this->email->message('Your password recovery code: ' . $code);
			$this->email->send();
		}
	}

	/**
	 * Register a new user.
	 */
	public function register()
	{
		$this->checkAjax();
		$this->checkLoggedInAjax();

		// Check if the user is logged in and has the right permissions.
		if (!$this->ion_auth->is_admin())
			echo json_encode(['error' => 'You are not authorized to add a new user.']);

		// Get the data.
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');

		// Validate.
		$passValid = $this->passwordValid($pass);

		if (empty($email))
			echo json_encode(['error' => 'Not all fields are filled in.']);
		else if ($passValid !== TRUE)
			echo json_encode(['error' => $passValid]);
		// Register the user.
		else
			$this->showResult($this->ion_auth->register($email, $pass, $email));
	}

	/**
	 * Update a user's information.
	 */
	public function update()
	{
		$this->checkAjax();
		$this->checkLoggedInAjax();

		// Get the data.
		$data = [
			'email' => $this->input->post('email'),
			'first_name' => $this->input->post('first'),
			'last_name' => $this->input->post('last')
		];

		// Validate.
		if (empty($data['email']))
			echo json_encode(['error' => 'Not all fields are filled in.']);
		// Update the user.
		else
			$this->showResult($this->ion_auth->update($this->ion_auth->user()->row()->id, $data));
	}

	/**
	 * Change the current user's password.
	 */
	public function changePassword()
	{
		$this->checkAjax();
		$this->checkLoggedInAjax();
		$user = $this->ion_auth->user()->row();

		// Get the data.
		$oldPass = $this->input->post('oldPass');
		$pass = $this->input->post('pass');

		// Validate
		$passValid = $this->passwordValid($pass);
		$oldPassCorrect = $this->ion_auth->hash_password_db($user->id, $oldPass);

		if (!$oldPassCorrect)
			echo json_encode(['error' => 'Your old password is incorrect.']);
		else if ($passValid !== TRUE)
			echo json_encode(['error' => $passValid]);
		// Change the password.
		else
			$this->showResult($this->ion_auth->update($user->id, ['password' => $pass]));
	}

	/*==== Helper functions. ====*/

	 /**
	  * Check if a password is valid.
	  * Returns a string with the reason if the password is not valid, or TRUE otherwise.
	  */
	 private function passwordValid($pass)
	 {
		 if (strlen($pass) < 6)
			return "Your password should be at least 6 characters long.";

		return TRUE;
	 }

	 /**
	  * Echo (in JSON) either success, or the ion_auth errors.
	  */
	 private function showResult($success)
	 {
		 echo json_encode($success ? ['success' => TRUE] : ['error' => $this->ion_auth->errors()]);
	 }
}