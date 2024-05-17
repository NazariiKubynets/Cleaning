<?php
/*
    Template Name: Faq
    */
?>

<?php get_header(); ?>

<main>
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