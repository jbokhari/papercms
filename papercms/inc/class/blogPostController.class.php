<?php 
class blogPostController {

	public $postId;

	public function __construct(paperCMS &$paper){
		$this->postId = $paper->current; 
		$this->file = $this->getFileNameFromPostID($this->postId, $paper);
		$this->fullFilePath = $this->getFullFilePath($this->file);
	}

	public function getFileNameFromPostID($postId, paperCMS $paper, $ext = "xml"){
		return $paper->prefix . $paper->postsName . $postId . "." . $ext;

	}

	public function getFullFilePath($file){
		$postDir = CMS_HOME . "/papercms/data/posts/";
		$full = $postDir . $this->file;
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
			require_once(CMS_HOME . "/papercms/inc/functions.php");
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