<?php
/**
 * Template part for post layout
 *
 * @subpackage Home Decor Shop
 * @since 1.0
 */
?>
<?php
$home_decor_shop_post_layout = get_theme_mod( 'home_decor_shop_post_layout','two_column_right');
if($home_decor_shop_post_layout == 'two_column_right'){ ?>
    <div class="content_area col-lg-8 col-md-8">
        <?php if( have_posts() ): ?>
        
            <?php while( have_posts() ): the_post(); ?>
            
                <?php get_template_part('template-parts/content-page-grid',get_post_format() ); ?>
            <?php endwhile; ?>
            
        <?php endif; ?>
        <div class="paginations">
            <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
            'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
            'next_text'          => '<i class="fa fa-angle-double-right"></i>',
            ) ); ?>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 sidebar">
        <?php get_sidebar();?>
    </div>
<?php }
else if($home_decor_shop_post_layout == 'two_column_left'){ ?>
    <div class="col-lg-4 col-md-4 sidebar">
        <?php get_sidebar();?>
    </div>
    <div class="content_area col-lg-8 col-md-8">       
        <?php if( have_posts() ): ?>
        
            <?php while( have_posts() ): the_post(); ?>
            
                <?php get_template_part('template-parts/content-page-grid',get_post_format() ); ?>
            <?php endwhile; ?>
            
        <?php else: ?>
            
            <?php get_template_part('template-parts/content','none'); ?>
            
        <?php endif; ?>
        <div class="paginations">
            <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
            'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
            'next_text'          => '<i class="fa fa-angle-double-right"></i>',
            ) ); ?>
        </div>
    </div>
<?php }
else if($home_decor_shop_post_layout == 'one_column'){ ?>
    <div class="content_area col-lg-12 col-md-12">     
        <?php if( have_posts() ): ?>
        
            <?php while( have_posts() ): the_post(); ?>
            
                <?php get_template_part('template-parts/content-page-grid',get_post_format() ); ?>
            <?php endwhile; ?>
        
        <?php else: ?>
            
            <?php get_template_part('template-parts/content','none'); ?>

        <?php endif; ?>
        <div class="paginations">
            <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
            'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
            'next_text'          => '<i class="fa fa-angle-double-right"></i>',
            ) ); ?>
        </div>
    </div>
<?php }
else if($home_decor_shop_post_layout == 'three_column'){ ?>
    <div class="col-lg-3 col-md-3 sidebar">
        <?php get_sidebar();?>
    </div>
    <div class="content_area col-lg-6 col-md-6">    
        <?php if( have_posts() ): ?>
        
            <?php while( have_posts() ): the_post(); ?>
            
                <?php get_template_part('template-parts/content-page-grid',get_post_format() ); ?>
            <?php endwhile; ?>
            
        <?php else: ?>
            
            <?php get_template_part('template-parts/content','none'); ?>
            
        <?php endif; ?>
        <div class="paginations">
            <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
            'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
            'next_text'          => '<i class="fa fa-angle-double-right"></i>',
            ) ); ?>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 sidebar">
        <?php dynamic_sidebar('sidebar1'); ?>
    </div>
<?php }
else if($home_decor_shop_post_layout == 'four_column'){ ?>
    <div class="col-lg-3 col-md-3 sidebar">
        <?php get_sidebar();?>
    </div>
    <div class="col-lg-3 col-md-3 sidebar">
        <?php dynamic_sidebar('sidebar1'); ?>
    </div>
    <div class="content_area col-lg-3 col-md-3">       
        <?php if( have_posts() ): ?>
        
            <?php while( have_posts() ): the_post(); ?>
            
                <?php get_template_part('template-parts/content-page-grid',get_post_format() ); ?>
            <?php endwhile; ?>
            
        <?php else: ?>
            
            <?php get_template_part('template-parts/content','none'); ?>
            
        <?php endif; ?>
        <div class="paginations">
            <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
            'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
            'next_text'          => '<i class="fa fa-angle-double-right"></i>',
            ) ); ?>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 sidebar">
        <?php dynamic_sidebar('sidebar2'); ?>
    </div>
<?php }
else if($home_decor_shop_post_layout == 'grid_post'){ ?>
<div class="content_area col-lg-12 col-md-12">
    <div class="row">
        <?php if( have_posts() ): ?>
        
            <?php while( have_posts() ): the_post(); ?>
            
               <div class="col-lg-4 mb-4">
                    <?php get_template_part('template-parts/content-page-grid',get_post_format() ); ?>
                </div>
            <?php endwhile; ?>
            
        <?php else: ?>
            
            <?php get_template_part('template-parts/content','none'); ?>
            
        <?php endif; ?>
    </div>
    <div class="paginations">
        <?php
        // Previous/next page navigation.
        the_posts_pagination( array(
        'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
        'next_text'          => '<i class="fa fa-angle-double-right"></i>',
        ) ); ?>
    </div>
</div>
<?php }