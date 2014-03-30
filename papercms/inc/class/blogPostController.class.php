<?php 
class blogPostController {

	public $postId;
	public $post = array();
	public $template = "single.php";
	public $theme = "default";
	public $stylesheets = array();

	public function __construct(paperCMS &$paper){
		$this->log("constructed");
		$this->postId = $paper->current; 
		$this->file = $this->getFileFromID($this->postId, $paper);
		$this->getFullFilePath($this->file);
		$this->log("File Path Set");
		$this->setPost();
		$this->setStylesheets();
	}

	public function getFileFromID($postId, paperCMS $paper, $ext = "xml"){
		$file =  $paper->prefix . $paper->postsName . $postId . "." . $ext;
		$this->log($file);
		return $file;

	}
	public function setStylesheets($stylesheet= null){
		if (empty($this->stylesheet) && $stylesheet === null){
			$link = CMS_HOME . "/papercms/skin/";
			$link .= $this->theme;
			$link .= "library/css/style.css";
			$default = array(
					"link" => $link
				);
		}	
		$default = $stylesheet;
		$this->stylesheet = $stylesheet;

	}
	public function getFullFilePath($file = null){
		$this->log("called getFullFilePath");
		$d = DIRECTORY_SEPARATOR;
		$postDir = CMS_HOME;
		$postDir .= "/papercms/data/posts/";
		$full = $postDir . $this->file;
		$this->fullFilePath = $full;

	}
	public function styleSheets(){
		foreach ($this->stylesheets as $stylesheet) {
			echo "<link rel='stylesheet' href='{$stylesheet['link']}' />";
		}
	}
	public function postExists(){
		$this->log("postExists called");
		$this->log($this->fullFilePath);
		if (file_exists($this->fullFilePath)){
			$this->log("postExists true");
			return true;

		} else { 
			$this->log("postExists false");
			return false;
		}
	}

	/** Create **/
	public function create($postId){

			
	}

	public function getHeader($append = ""){
		$filename = "header";
		$this->getSpecificFile($filename, $append);
	}
	
	public function getSpecificFile($fileroot, $append = ""){
		$filename = $fileroot;
		if ($append != "")
			$filename = "-" . $append;
		$filename .= ".php";
		$file = CMS_HOME . "/papercms/skin/" . $this->theme ."/". $filename;
		// print_x($this->post[0]);
		$this->getPage($file, $this->post[0]);
	}
	public function getFooter($append = ""){
		$filename = "footer";
		$this->getSpecificFile($filename, $append);
	}
	
	/** Read **/
	public function getPage($file, $post = null, array $vars = array()){
		$page = $this;
		if ($post === null)
			$post = $this->post[0];
		// print_x($post);
		extract($vars, EXTR_SKIP);
		include($file);
	}
	public function log($msg){
		$this->log[] = $msg;
	}
	public function setPost(){
		$this->log("set posts called");
		if ( $this->fullFilePath == "" )
			$this->getFullFilePath();
		if ( $this->postExists() ){
			$this->post[] = new blogPost($this->fullFilePath);			
		} else {
			// print_x($this);
			$this->fourohfour = true;
			$this->post = new blogPost();			
		}
	}
	public function displayPost(){
		// print_x($this);
		require_once(CMS_HOME . "/papercms/inc/functions.php");
		$file = CMS_HOME . "/papercms/skin/" . $this->theme . "/" . $this->template;
		$this->getPage($file, $this->post[0]);
	}
	// public function displayPost(){
	// 	if ($this->post){

	// 	}
	// 	// print_x($this);


	// }
	public function four04(){
		echo "<h1>404:</h1><p>Specified post ID or page was not found.</p>";
	}
	/** Update **/
	/** Delete **/
	
}