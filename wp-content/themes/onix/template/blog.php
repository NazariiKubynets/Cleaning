<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>
<section class="blog">
   <div class="blog__container container">
      <h1>Blog</h1>
      <div class="blog__posts">
         <?php
         $paged = get_query_var('paged') ? get_query_var('paged') : 1;
         $args = array(
            'post_type' => 'post',
            'posts_per_page' => 4, // Змініть це на кількість постів, яку ви хочете відображати на одній сторінці
            'paged' => $paged,
            'orderby' => 'date',
            'order' => 'DESC'
         );

         $query = new WP_Query($args);

         if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
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

                  if (!empty($post_excerpt)) {
                     echo '<p>' . $post_excerpt . '</p>';
                  } else {
                     echo  '<p>' . wp_trim_words($post_content, 15) . '</p>';
                  }
                  ?>
               </a>
            <?php endwhile; ?>
         <?php endif;
         wp_reset_postdata(); // Скидаємо дані запиту 
         ?>
      </div>
      <?php
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;
      $posts_per_page = 4; // Встановіть кількість постів на сторінці
      $args = array(
         'post_type'      => 'post',
         'posts_per_page' => $posts_per_page,
         'paged'          => $paged,
      );
      $query = new WP_Query($args);

      $total_posts = $query->found_posts;

      $first_post = (($paged - 1) * $posts_per_page) + 1;
      $last_post = min($paged * $posts_per_page, $total_posts);

      echo '<p class="blog__posts_number">Shown ' . $last_post . ' from ' . $total_posts . '</p>';
      ?>

      <?php
      $big = 999999999; // Велике число, щоб забезпечити, що номери сторінок завжди були більшими за кількість сторінок

      echo '<div class="blog__pagination">';
      echo paginate_links(array(
         'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
         'format' => '?paged=%#%',
         'current' => max(1, get_query_var('paged')),
         'total' => $query->max_num_pages,
         'prev_text' => __('<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                           </svg>'),
         'next_text' => __('<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                           </svg>'),
      ));
      echo '</div>';
      ?>
   </div>
</section>

<?php get_footer(); ?>