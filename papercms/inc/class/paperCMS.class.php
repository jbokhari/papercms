<?php

class paperCMS {
	private $settings;
	public $prefix = "paperCMS_";
	public $postsName = "post_";
	public $blogPostController;

	public function __construct($postId = 1){
		$this->current = $postId;
		if (extension_loaded("SimpleXML")){

			$this->settings = simplexml_load_file(CMS_HOME . "/papercms/data/paperCMS.xml");
			$this->init();


		} else {

			echo "Fatal Error: Paper CMS requires SimpleXML extension to be installed. This is a default with PHP 5 and up. Contact your web guy or just try figuring it out yourself.";

		}
	}

	/**
	 * Init is triggered on construction after successfully loading settings
	 **/
	public function init(){
		print_x($this);
		$this->blogPostController = new blogPostController($this->current);
		// $this->loadPage();
	}

	public function loadPage(){
		if ($this->current === null || $this->current === 0){
			//load default homepage
			//0 or null for now, these may be different later on
			//eg, null could mean archive and look for other parameters
			// blogPostController->displayPage($this->current);
			// $this->createPage($page);
		} else {
			
		}
	}
	public function createPage($page){
		$page->display();
	}

}
