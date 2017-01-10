<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates_model extends CI_Model
{
	const TEMPLATE_DIR = APPPATH . 'views/templates/';

	/**
	 * Get a list of all available templates.
	 */
	public function all()
	{
		$result = [];
		$files = scandir(self::TEMPLATE_DIR);

		foreach ($files as $file)
		{
			// Check if the file ends in .php.
			$isPhp = strlen($file) <= 4 ? FALSE : substr_compare($file, '.php', strlen($file) - 4) === 0;

			// Add the filename without extension to the results.
			if (is_file(self::TEMPLATE_DIR . $file) && $isPhp)
				$result[] = substr($file, 0, strlen($file) - 4);
		}

		return $result;
	}

	/**
	 * Get the default template.
	 */
	public function getDefault()
	{
		return $this->config->item('default_template');
	}
}