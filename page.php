<?php
get_header();
?>
<div class="container pi-page">
    <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post(); 
                    ?>
                    <h1><?php the_title(); ?></h1>
                    <p><?php the_content(); ?></p>
                    <?php
            }
        }
?>
</div>
<?php
get_footer();