<?php 
class blogPostController {

	public $postId;

	public function __construct($postId = null){
		$this->postId = $postId; 
		$this->file = $this->getFileNameFromPostID($postId);
		$this->fullFilePath = $this->getFullFilePath($this->file);
	}

	public function getFileNameFromPostID($postId, $ext = "xml"){
		global $paper;
		print_x($paper);
		return $paper->prefix . $paper->postsName . $postId . "." . $ext;

	}

	public function getFullFilePath($file){

		$file = $this->getFileNameFromPostID($postId);
		$postDir = CMS_HOME . "/papercms/data/posts/";
		$full = $postDir . $file;
		echo $full;

	}

	public function postExists(){

		if (file_exists($this->fullFilePath)){
			return true;

		} else return false;

	}

	/** Create **/
	public function create($postId){

			
	}
	
	/** Read **/
	public function displayPost(){
		if ($this->postExists()){
			require_once(CMS_HOME . "\papercms/inc/functions.php");
			$post = new blogPost($this->fullFilePath);
			
		} else {
			$this->four04();
		}

	}
	public function four04(){
		echo "<h1>404:</h1><p>Specified post ID or page was not found.</p>";
	}
	/** Update **/
	/** Delete **/
	
}