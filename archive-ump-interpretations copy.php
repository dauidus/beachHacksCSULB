<?php
	global $avia_config;

	//$validation_key = get_user_meta($current_user->ID, 'pmpro_email_confirmation_key', true);

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	get_template_part( 'includes/helper', 'header-check' );

?>

	<div class='container'>

		<main class='content units <?php avia_layout_class( 'content' ); ?>' <?php avia_markup_helper(array('context' => 'content','post_type'=>'post'));?>>

		<?php
			query_posts(array(
				'paged' => $paged,
				// 'posts_per_page' => 10,
				'post_type' => 'ump-interpretations',
				// 'orderby' => 'title',
				'order' => 'ASC'
			));

			echo '<h1 class="interpretations-icon">' . __( 'Umpire Interpretations of', 'dauidus' ) . ' ' . __( 'Major League Baseball', 'dauidus' ) . '</h1>';

			echo avia_pagination('', 'nav');

			while (have_posts()) : the_post();
			?>

			<article <?php avia_markup_helper(array('context' => 'entry')); ?>>
		        <div class="entry-content-wrapper clearfix <?php echo $post_format; ?>-content">

		            <header class="entry-content-header">
		            <?php
		            	echo "<h2 class='post-title entry-title'><a title='".the_title_attribute('echo=0')."' href='".get_permalink()."'>".get_the_title()."</a></h2>"; ?>

		            	<?php
				        	// get_template_part( 'includes/helper', 'meta-header' );
				        ?>
				    </header>

		                <?php
		                echo '<div class="entry-content">';
		                	echo the_excerpt();
		                echo '</div>';
						?>

		            <footer class="entry-foot">
		        	
			        <?php
			        	get_template_part( 'includes/helper', 'meta-footer' );
			        ?>

			        </footer>
		        </div>
  
		        <?php // do_action('ava_after_content', $the_id, 'loop-search'); ?>
			</article><!--end post-entry-->

			<?php


				$first = false;
			endwhile; 

			echo avia_pagination('', 'nav');
			?>

		</main>

		<?php

		//get the sidebar
		$avia_config['currently_viewing'] = 'page';

		//get the sidebar
		get_sidebar();

		?>

	</div><!--end container-->


</div><!-- close default .container_wrap element -->


<?php get_footer(); 

