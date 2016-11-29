<?php
 /*Template Name: leadership-archive-directory
 */
get_header(); ?>

<?php
	

	$term = get_term_by('slug', get_query_var( 'term' ), get_query_var( 'taxonomy') );
    
	//$mypost = array( 'post_type' => 'partner', );
    
	$args = array(
		'posts_per_page' => '50',
		'tax_query' => array(
			array(
				'taxonomy' => $term->taxonomy,
				'field' => 'slug',
				'terms' => $term->slug,
			)
		),
		//'post_type' => 'leadership',
		'meta_query' => array(
			'sort_field' => array(
			  'key' => 'leadership-sort-'. $term->term_id,
			  'compare' => 'EXISTS'
			)
		),
		'orderby' => array(
			'sort_field' => 'ASC',
		)
	);
	
	
	
	$loop = new WP_Query( $args );
	
	//echo "<pre>"; print_r($loop); echo "</pre>"; exit();
	
	//echo "<pre>"; print_r($loop); echo "</pre>";
	//echo date("Y-m-d", strtotime("+2 week", time())); exit();
	
	/*
	// if event date has passed lets remove it from the array
		
		$event_date = strtotime($newArray[$lid]['event_date']);
		$expiry_date = strtotime("-2 week", $event_date);		
		
		if (($newArray[$lid]['listing_type']=='Single' && $expiry_date < time()) || $newArray[$lid]['listing_approved'] != 'Yes' ) {
			unset($newArray[$lid]);
		}
	*/
	
?>
<div class="leadership-wrapper">
<div class="container">
    <h4 class="entry-title"><?php echo $term->description; ?></h4>
<ul class="staffer-archive-grid">
<?php while ( $loop->have_posts() ) : $loop->the_post();?>
	<?php $meta = get_post_meta(get_the_ID()); ?>
            <li>
		 <!-- Check for external permalink -->
		 <?php if (!empty($meta['leadership-permalink-'. $term->term_id][0])): ?>
			
			<a href="<?php echo $meta['leadership-permalink-'. $term->term_id][0]; ?>" target="_blank">
				<?php the_post_thumbnail(); ?><br>test
				<?php the_title(); ?>
			</a><br>
		<?php else: ?>
		<!-- Use standard permalink -->
			
			<a href="<?php echo get_post_permalink(get_the_ID()) .'?gid='. $term->term_id ?>">
				<?php the_post_thumbnail(); ?><br>
				<?php the_title(); ?>
			</a><br>
        <?php endif; ?>
		
		<?php if (!empty($meta['leadership-line1-'. $term->term_id][0])): ?>
		<div>
			<?php echo wp_trim_words($meta['leadership-line1-'. $term->term_id][0], 25); ?>
			</div>
		<?php endif; ?>	
		
        <?php if (isset($meta['leadership-line2-'. $term->term_id][0])): ?>
			<div>
			<i><?php echo wp_trim_words($meta['leadership-line2-'. $term->term_id][0], 25); ?></i>
			</div>
		<?php endif; ?>
			
		
			<br>
		
		</li>



<?php endwhile; ?>
</ul>
</div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>