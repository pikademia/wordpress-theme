<?php
get_header();
?>
<div class="container-fluid">
    <div class="row pi-baner">
        <?php
            echo pi_get_page("baner");
        ?>
    </div>
</div>
<div class="container pi-front-page">
        <div class="row justify-content-between">
        <div class="col-md-8">
        <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post(); 
                        ?>
                        <h1><?php //the_title(); ?></h1>
                        <p><?php the_content(); ?></p>
                        <?php
                }
            }
            ?>
        </div>
        <div class="col-md-3">
            <?php get_sidebar(); ?>

        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row pi-bottom">
        <?php
        echo pi_get_page("bottom");
        ?>
    </div>
</div>

<?php
get_footer();