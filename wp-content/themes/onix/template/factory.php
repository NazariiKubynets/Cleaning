<?php
/*
Template Name: Factory
*/
?>

<?php get_header(); ?>

<main>
   <section class="block-info">
      <div class="block-info__container block-info__container_manufacturing container">
         <h1 class="block-info__title"><?php the_field('factory_block-info_title'); ?></h1>
         <div class="block-info__content block-info__content_manufacturing">
            <div class="block-info__img img">
               <img src="<?php the_field('factory_block-info_img'); ?>" alt="img-commercial">
            </div>
            <div>
               <p class="block-info__text block-info__text_manufacturing ">
                  <?php the_field('factory_block-info_text'); ?>
               </p>
               <div class="block-info__button">
                  <a href="tel:<?php the_field('factory_block-info_button'); ?>" class="block-info__btn block-info__btn_manufacturing btn">
                     Call us <?php the_field('factory_block-info_button'); ?>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="block-info">
      <div class="block-info__container block-info__container_advantages container">
         <div class="block-info__content">
            <h2 class="block-info__title"><?php the_field('factory_advantages_title'); ?></h2>
            <p class="block-info__text block-info__text_advantages">
               <?php the_field('factory_advantages_text'); ?>
            </p>
         </div>
         <div class="block-info__img block-info__img_advantages img">
            <img src="<?php the_field('factory_advantages_img'); ?>" alt="img-factory">
         </div>
      </div>
   </section>
   <?php
   $args_benefits = array(
      'title' => 'factory_benefits-title',
      'subtitle' => 'factory_benefits-subtitle',
      'text' => 'factory_benefits-text',
      'nameRepeatingField' => 'factory_benefits',
      'description' => 'factory_benefits-description',
      'textBottom' => 'factory_benefits-text_bottom',
   );

   get_template_part('/template-parts/blocks/benefits', null, $args_benefits);
   ?>
   <section class="faqAccordion">
      <?php
      $args_posts = array(
         'title' => 'factory_faq-title',
         'subtitle' => 'factory_faq-subtitle',
         'nameRepeatingField' => 'factory_faq-question',
         'questionTitle' => 'factory_faq-question_title',
         'questionDescription' => 'factory_faq-question_description',
         'btnLink' => 'factory_faq-btn',
      );

      get_template_part('/template-parts/blocks/faq-block', null, $args_posts);
      ?>
   </section>
</main>

<?php get_footer(); ?>