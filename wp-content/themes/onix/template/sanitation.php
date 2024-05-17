<?php
/*
    Template Name: Sanitation
    */
?>

<?php get_header(); ?>
<main>
   <section class="block-info block-info_sanitation">
      <div class="block-info__container block-info__container_manufacturing container">
         <h1 class="block-info__title"><?php the_field('sanitation_block-info_title'); ?></h1>
         <div class="block-info__content block-info__content_manufacturing">
            <div class="block-info__img block-info__img_meat img">
               <img src="<?php the_field('sanitation_block-info_img'); ?>" alt="img-meat">
            </div>
            <div>
               <p class="block-info__text block-info__text_manufacturing ">
                  <?php the_field('sanitation_block-info_text'); ?>
               </p>
               <div class="block-info__button">
                  <button class="block-info__btn block-info__btn_manufacturing btn">Call us +1 313-744-0805</button>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="block-info">
      <div class="block-info__services block-info__list container">
         <?php the_field('sanitation_block-info_services_content'); ?>
      </div>
   </section>
   <section class="block-info">
      <div class="container">
         <div class="block-info__content block-info__content_sanitation">
            <div class="block-info__price">
               <h2 class="block-info__title"><?php the_field('sanitation_block-info_price-title'); ?></h2>
               <p>
               <?php the_field('sanitation_block-info_price-text'); ?>
               </p>
            </div>
            <div class="block-info__img block-info__img_meat img">
               <img src="<?php the_field('sanitation_block-info_price-img'); ?>" alt="img-commercial-second">
            </div>
         </div>
         <p class="block-info__text_sanitation">
            <?php the_field('sanitation_block-info_price-text_bottom'); ?>
         </p>
      </div>
   </section>
   <?php
   $args_benefits = array(
      'title' => 'sanitation_benefits-title',
      'subtitle' => 'sanitation_benefits-subtitle',
      'text' => 'sanitation_benefits-text',
      'nameRepeatingField' => 'sanitation_benefits',
      'description' => 'sanitation_benefits-description',
      'textBottom' => 'sanitation_benefits-text_bottom',
   );

   get_template_part('/template-parts/blocks/benefits', null, $args_benefits);
   ?>
   <section class="faqAccordion">
      <?php
      $args_posts = array(
         'title' => 'sanitation_faq-title',
         'subtitle' => 'sanitation_faq-subtitle',
         'nameRepeatingField' => 'sanitation_faq-question',
         'questionTitle' => 'sanitation_faq-question_title',
         'questionDescription' => 'sanitation_faq-question_description',
         'btnLink' => 'sanitation_faq-btn',
      );

      get_template_part('/template-parts/blocks/faq-block', null, $args_posts);
      ?>
   </section>

</main>
<?php get_footer(); ?>