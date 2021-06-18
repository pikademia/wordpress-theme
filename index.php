<?php
get_header();
?>
<div class="container pi-blog">
<?php
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();

        ?>
        <div class="row pi-article-item">
            <div class="col-md-4">
                <div class="thumbnail-img overflow-hidden">
                    <?php if ( has_post_thumbnail() ) {
                        ?>
                        <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('large', array('class'=>'img-fluid'));?>
                        </a>
                        <?php
                    }  
                    ?>
                </div>
            </div>
            <div class="col-md-8">
                <?php
                the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); 
                ?>
                <h6 class="d-md-none d-lg-block">Kategoria: <?php the_category(); ?></h6>
                <?php
                    $catList = wp_get_post_categories(get_the_ID());
                    echo get_category_icon($catList);
                ?>
                <h6>Data publikacji: <?php the_time('j F Y'); ?></h6>
                <p><?php the_excerpt(); ?></p>
            </div>
        </div>
        <?php
    }
}
?>
</div>



<?php




get_footer();