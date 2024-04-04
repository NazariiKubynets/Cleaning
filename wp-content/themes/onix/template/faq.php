<?php
/*
    Template Name: Faq
    */
?>

<?php get_header(); ?>

<main>
   <div class="breadcrumbs">
      <div class="breadcrumbs__container container">
         <a href="\..\">Home</a>
         <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
            <path d="M5.25 11L8.75 7.5L5.25 4" stroke="#1E1E23" stroke-opacity="0.5" stroke-linecap="round" stroke-linejoin="round" />
         </svg>
         <span class="breadcrumbs__current">FAQ</span>
      </div>
   </div>

   <section class="faq">
      <?php
      $args_posts = array(
         'subtitle' => 'faq_title',
         'nameRepeatingField' => 'faq-question',
         'questionTitle' => 'faq-question_title',
         'questionDescription' => 'faq-question_description',
      );

      get_template_part('/template-parts/blocks/faq-block', null, $args_posts);
      ?>
   </section>
</main>

<?php get_footer(); ?>