<?php get_header(); ?>


<div class="breadcrumbs">
   <div class="breadcrumbs__container container">
      <a href="\..\">Home</a>
      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
         <path d="M5.25 11L8.75 7.5L5.25 4" stroke="#1E1E23" stroke-opacity="0.5" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <a href="blog">Blog</a>
      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
         <path d="M5.25 11L8.75 7.5L5.25 4" stroke="#1E1E23" stroke-opacity="0.5" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <span class="breadcrumbs__current">Blog Inner</span>
   </div>
</div>

<section class="description">
   <div class="description__container container">
      <div class="description__post">
         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
               <?php the_content(); ?>
            <?php endwhile; ?>
         <?php endif; ?>
      </div>
</section>
<section class="related">
   <div class="related__container container">
      <h1>Related Articles</h1>
      <div class="related__row">
         <?php
         $args_random = array(
            'post_type'      => 'post',
            'orderby'        => 'rand',
            'posts_per_page' => 3,
         );

         $random_posts = new WP_Query($args_random);

         if ($random_posts->have_posts()) :
            while ($random_posts->have_posts()) : $random_posts->the_post(); ?>
               <a class="blog__item" href="<?php the_permalink(); ?>">
                  <div class="blog__img img">
                     <?php
                     $img = get_template_directory_uri() . '/frontend/img/blog/blog-img-one.jpg';
                     if (has_post_thumbnail()) {
                        the_post_thumbnail();
                     } else {
                        echo '<img src="' . $img . '" alt="Blog Image">';
                     }
                     ?>
                  </div>
                  <h3><?php the_title(); ?></h3>
                  <?php
                  $post_content = get_the_content();
                  $post_excerpt = get_the_excerpt();
                  
                  if ( ! empty( $post_excerpt ) ) {
                      echo '<p>'.$post_excerpt.'</p>';
                  } else {
                      echo  '<p>'.wp_trim_words( $post_content, 15 ).'</p>';
                  }
                  ?>
               </a>
         <?php endwhile;
            wp_reset_postdata();
         else :
            echo 'There are no related articles.';
         endif;
         ?>
      </div>
   </div>
</section>
<?php get_footer(); ?>