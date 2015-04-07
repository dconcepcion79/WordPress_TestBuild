<?php
/*
Template Name: Sitemap Page
*/
?>
<?php get_header(); ?>

<div class="row section">
    
    <div id="primary" class="col grid-12 content-area">
    
        <header class="page-header">
            <h2><?php the_title(); ?></h2>
        </header><!-- close .page-header -->
        
        <div class="row section">
            
            <div class="col grid-6">
                <h3 id="authors">Archives by Authors</h3>
                <ul>
                <?php
                wp_list_authors(
                  array(
                    'exclude_admin' => false,
                  )
                );
                ?>
                </ul>
                
                <h3>Archives by Categories</h3>
                <ul>
                  	<?php
					$categories = get_categories();
					foreach ( $categories as $category ) {
						echo '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';
					}
					?>
                </ul>
                
                <div class="cloud">
                	<h3>Popular Tags</h3>
                	<?php wp_tag_cloud('smallest=11&largest=24'); ?>
                </div>
                
                <h3 id="pages">Pages</h3>
                <ul>
                <?php
                // Add pages you'd like to exclude in the exclude here
                wp_list_pages(
                  array(
                    'exclude' => '',
                    'title_li' => '',
                  )
                );
                ?>
                </ul>
                
           </div>
       
            <div class="col grid-6">
                
                <h3 id="posts">Posts by Category</h3>
                <ul>
                <?php
                // Add categories you'd like to exclude in the exclude here
                $cats = get_categories('exclude=');
                foreach ($cats as $cat) {
                  echo "<li><h4>".$cat->cat_name."</h4>";
                  echo "<ul>";
                  query_posts('posts_per_page=-1&cat='.$cat->cat_ID);
                  while(have_posts()) {
                    the_post();
                    $category = get_the_category();
                    // Only display a post link once, even if it's in multiple categories
                    if ($category[0]->cat_ID == $cat->cat_ID) {
                      echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
                    }
                  }
                  echo "</ul>";
                  echo "</li>";
                }
                ?>
                </ul>
                    
            </div>
        
        </div>

    </div><!-- close .content-area -->
    
</div><!-- close #primary -->

<?php get_footer(); ?>