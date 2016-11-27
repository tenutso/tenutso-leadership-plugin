<?php
 /*Template Name: leadership-archive-directory
 */
get_header(); 

$leadership_groups = wp_get_post_terms( get_the_ID(), 'leadership-group' );

if (isset($_GET['gid'])) {
    $term_id = $_GET['gid'];
}
else {
    $term_id = reset($leadership_groups)->term_id; //retrieve the first group when no param specified
}

$thisgroup = get_term( $term_id );
$meta = get_post_meta(get_the_ID());
?>
<div class="leadership-wrapper-single">
    <div class="leadership-nav"><a href="<?php echo get_term_link($thisgroup->slug, 'leadership-group'); ?>">back to listing</a><br></div>
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="leadership-single-profile-image"><?php the_post_thumbnail(); ?></div>
        <div class="leadership-single-profile-details">
            <h1><?php the_title(); ?></h1>
            <?php echo $thisgroup->name; ?><br>
            <?php if ( !empty( $meta['leadership-line1-'. $term_id][0] ) ): ?>
        			<?php echo $meta['leadership-line1-'. $term_id][0]; ?><br>
        	<?php endif; ?>
        	<?php if ( !empty( $meta['leadership-line2-'. $term_id][0] ) ): ?>
        			<i><?php echo $meta['leadership-line2-'. $term_id][0]; ?></i><br>
        	<?php endif; ?><br>
        	<?php if (sizeof($leadership_groups) > 1): ?>
        	    Also featured in:<br>
                <?php foreach($leadership_groups as $group): ?>
                    <?php if ($thisgroup->name == $group->name): continue;?> <?php endif; ?>
                    <a href="<?php echo get_term_link($group->slug, 'leadership-group'); ?>"><?php echo $group->name; ?></a><br>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <h4>About <?php the_title(); ?></h4>
        <?php the_content(); ?>
    <?php endwhile; ?>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
