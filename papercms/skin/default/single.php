<?php $page->getHeader() ?>
	<div class="post">
		<?php  // var_dump($post); ?>
		<h1 class='post-title'><?php $post->the_title() ?></h1>
		<p><?php $post->the_content() ?></p>
	</div>
<?php $page->getFooter() ?>
