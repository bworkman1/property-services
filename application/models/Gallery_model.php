<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {

	private $Image_Directory_Path = 'assets/images/gallery/';
	private $RandomAlts = [];

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('directory');

		$this->RandomAlts = explode(', ', getKeywords());
	}

	public function getGallery()
	{
		return $this->formatDirectoryMap(directory_map($this->Image_Directory_Path));
	}

	/*
		RETURNS ARRAY - TAKES ALL THE FILES IN A DIRECTORY AND UPPERCASES THE ONES THAT ARE NON NUMERIC FOR EASY COMPARISONS
	*/
	private function formatDirectoryMap($directories)
	{
		$data = [];
		if(!empty($directories)) {
			foreach($directories as $key => $dir) {
				if(is_numeric($key)) {
					$data['OTHER'][] = $this->formatImageAttributes($dir, '');
				} else {
					
					if(is_array($dir) && !empty($dir)) {
						foreach($dir as $k => $img) {
							$data[strtoupper(rtrim(rtrim($key, '/'), '\\'))][] = $this->formatImageAttributes($img, $key);
						}
					}
				}
			}
		}

		return $data;
	}

	private function formatImageAttributes($image, $folder)
	{
		$imgAttr = [
			'path' => base_url($this->Image_Directory_Path . $folder . $image),
			'alt' => $this->formatImageName($image)
		];

		return $imgAttr;
	}

	private function formatImageName($image)
	{
		$find = ['-', '_', 'IMG', 'MIN'];
		$replace = [' ', ' ', '', ''];

		$name = explode('.', $image)[0];
		$name = trim(str_replace($find, $replace, preg_replace('/\d/', '', strtoupper( $name) )));
		
		if(!$name) {
			$name = 'Samson Concrete Central Ohio ' . $this->RandomAlts[rand(0, (count($this->RandomAlts) - 1))];
		}

		return $name;
	}

}
