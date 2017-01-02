<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media_model extends CI_Model
{
	const MEDIA_DIR = APPPATH . '../assets/media/';

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('file');
	}

	/**
	 * Get all files in the media folder.
	 */
	public function all()
	{
		// Check if the media directory exists.
		if (!is_dir(self::MEDIA_DIR))
			return [];

		$files = [];
		$paths = get_filenames(self::MEDIA_DIR, TRUE);
		$start = strlen(realpath(self::MEDIA_DIR)) + 1;

		foreach ($paths as $path) {
			$relPath = str_replace('\\', '/', substr($path, $start));

			// Build the file object.
			$files[] = (object)[
				'name' => $relPath,
				'size' => $this->humanFilesize($path),
				'url' => base_url() . 'assets/media/' . $relPath
			];
		}

		return $files;
	}

	/**
	 * Get the human-readable file size of a file.
	 */
	private function humanFilesize($file)
	{
		$bytes = filesize($file);
		$sz = 'BKMGTP';
		$factor = floor((strlen($bytes) - 1) / 3);
		return sprintf("%.2f", $bytes / pow(1024, $factor)) . @$sz[$factor];
	}
}