<?php
/*
    Template Name: Meat
    */
?>

<?php get_header(); ?>
<main>
   <section class="block-info">
      <div class="block-info__container block-info__container_manufacturing container">
         <h1 class="block-info__title"><?php the_field('meat_block-info_title'); ?></h1>
         <div class="block-info__content block-info__content_manufacturing">
            <div class="block-info__img block-info__img_meat img">
               <img src="<?php the_field('meat_block-info_img'); ?>" alt="img-meat">
            </div>
            <div>
               <p class="block-info__text block-info__text_manufacturing ">
                  <?php the_field('meat_block-info_text'); ?>
               </p>
               <div class="block-info__button">
                  <a href="tel:<?php the_field('meat_block-info_button'); ?>" class="block-info__btn block-info__btn_manufacturing btn">Call us <?php the_field('meat_block-info_button'); ?></a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="block-info">
      <div class="block-info__container block-info__container_meat container">
         <div class="block-info__content">
            <h2 class="block-info__title"><?php the_field('meat_block-info_second-title'); ?></h2>
            <p class="block-info__text block-info__text_adventages">
            <?php the_field('meat_block-info_second-text'); ?>
            </p>
         </div>
         <div class="block-info__img block-info__img_meatSecond img ">
            <img src="<?php the_field('meat_block-info_second-img'); ?>" alt="img-meat-second">
         </div>
      </div>
   </section>
   <section class="block-info">
      <div class="block-info__container block-info__container_emergency container">
         <div class="block-info__img img block-info__img_meat block-info__img_meat-third">
            <img src="<?php the_field('meat_block-info_emergency-img'); ?>" alt="img-general">
         </div>
         <div class="block-info__content block-info__content_general">
            <h2 class="block-info__title"><?php the_field('meat_block-info_emergency-title'); ?></h2>
            <p class="block-info__text block-info__text_emergency">
            <?php the_field('meat_block-info_emergency-text'); ?>
            </p>
            <a href="<?php the_field('meat_block-info_emergency-button'); ?>" class="btn">View More</a>
         </div>
      </div>
   </section>
   <section class="faqAccordion">
      <?php
      $args_posts = array(
         'title' => 'meat_faq-title',
         'subtitle' => 'meat_faq-subtitle',
         'nameRepeatingField' => 'meat_faq-question',
         'questionTitle' => 'meat_faq-question_title',
         'questionDescription' => 'meat_faq-question_description',
         'btnLink' => 'meat_faq-btn',
      );

      get_template_part('/template-parts/blocks/faq-block', null, $args_posts);
      ?>
   </section>

</main>
<?php get_footer(); ?>