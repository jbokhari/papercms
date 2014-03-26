<?php
class blogPost{
	public function __construct($file){
		$data = simplexml_load_file($file);
		$this->posttitle = $data->post->title;
		$this->author = $this->post->author;
		$this->created = $this->post->dateCreated;
		$this->changed = $this->post->lastModified;
	}
}