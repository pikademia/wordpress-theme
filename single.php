<?php
get_header();
?>
<div class="container pi-single">
<?php
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post(); 
            
            ?>
            <div class="thumbnail-img">
                <?php if ( has_post_thumbnail() ) {
	                the_post_thumbnail('large', array('class'=>'img-fluid'));
                }  
                ?>
            </div>
            <?php the_title('<h2 class="entry-title">', '</h2>' ); ?>
            <h6>Kategoria: <?php the_category(); ?></h6>
            <h6>Data publikacji: <?php the_time('j F Y'); ?></h6>
            <h6>Autor: <?php the_author(); ?></h6>
            <hr>
            <div class="pi-single-content"><?php the_content(); ?></div>
          
            <?php
    }
}
?>
</div>
<?php
get_footer();
