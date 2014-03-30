<?php
class blogPost{
	public function __construct($file){
		$data = simplexml_load_file($file);
		$this->posttitle = $data->title;
		$this->author = $data->author;
		$this->created = $data->dateCreated;
		$this->changed = $data->lastModified;
		$this->body = $data->body;
	}
	public function the_content(){
		echo $this->body;
	}
	public function the_title(){
		echo $this->posttitle;
	}
	public function the_author(){
		echo $this->author;
	}
	public function the_date(){
		echo $this->created;
	}
	public function last_modified(){
		echo $this->changed;
	}
}