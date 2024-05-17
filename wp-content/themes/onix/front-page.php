<?php get_header(); ?>

<main>
   <section class="block-info">
      <div class="block-info__container block-info__container_professional container">
         <div class="block-info__content">
            <h1 class="block-info__title"><?php the_field('front-page_info-title'); ?></h1>
            <p class="block-info__text block-info__text_professional">
               <?php the_field('front-page_info-text'); ?>
            </p>
            <div class="block-info__button">
               <a href="contacts.html" class="block-info__btn btn">Get Started
                  <img src="<?php echo get_template_directory_uri(); ?>/frontend/img/section/Arrow.svg" alt="arrow">
               </a>
               <a href="#our-services">View All Services</a>
            </div>
         </div>
         <div class="block-info__img block-info__img_professional img">
            <img src="<?php the_field('front-page_info-img'); ?>" alt="img-commercial">
         </div>
      </div>
   </section>
   <section id="our-services" class="our-services">
      <div class="our-services__container container">
         <h1 class="our-services__title"><?php the_field('front-page_services-title'); ?></h1>
         <div class="our-services__items">
            <?php if (have_rows('front-page_services-grup_1')) : ?>
               <?php while (have_rows('front-page_services-grup_1')) : the_row(); ?>
                  <div class="our-services__item">
                     <h4 class="our-services__subtitle"><?php the_sub_field('front-page_services-grup_1_title'); ?></h4>
                     <p><?php the_sub_field('front-page_services-grup_1_text'); ?></p>
                     <a href="<?php the_sub_field('front-page_services-grup_1_link'); ?>">View More</a>
                  </div>
               <?php endwhile; ?>
            <?php endif; ?>
         </div>
      </div>
   </section>
   <section class="block-info">
      <div class="block-info__container block-info__container_general container">
         <div class="block-info__content block-info__content_general">
            <h2 class="block-info__title"><?php the_field('front-page_generalC_title'); ?></h2>
            <div class="block-info__text block-info__text_general">
               <?php the_field('front-page_generalC_text'); ?>
            </div>
            <button class="btn">
               <a href="<?php the_field('front-page_generalC_button'); ?>">View More</a>
            </button>
         </div>
         <div class="block-info__img img block-info__img_general">
            <img src="<?php the_field('front-page_generalC_img'); ?>" alt="img-general">
         </div>
      </div>
   </section>
   <section class="forma">
      <div class="forma__container container">
         <img src="<?php echo get_template_directory_uri(); ?>/frontend/img/section/imageForm.png" alt="img-forma">
         <div class="forma__form">
            <h3 class="forma__title">Fing out how much your cleaning cost</h3>
            <?php
               echo do_shortcode('[contact-form-7 id="c0fb60a" title="Contact form front page"]');
            ?>
         </div>
      </div>
   </section>
   <?php
   $args_benefits = array(
      'title' => 'front-page_benefits-title',
      'subtitle' => 'front-page_benefits-subtitle',
      'text' => 'front-page_benefits-text',
      'nameRepeatingField' => 'front-page_benefits',
      'description' => 'front-page_benefits-description',
      'textBottom' => 'front-page_benefits-text_bottom',
   );

   get_template_part('/template-parts/blocks/benefits', null, $args_benefits);
   ?>
   <section class="testimonials">
      <div class="testimonials__container container">
         <h1 class="testimonials__title"><?php the_field('front-page_testimonials-title'); ?></h1>
         <h2 class="testimonials__subtitle"><?php the_field('front-page_testimonials-subtitle'); ?></h2>
         <div class="testimonials__block">
            <?php if (have_rows('front-page_testimonial-grup_1')) : ?>
               <?php while (have_rows('front-page_testimonial-grup_1')) : the_row(); ?>
                  <div class="testimonials__item">
                     <div class="testimonials__img">
                        <img src="<?php the_sub_field('front-page_testimonial-grup_1_img'); ?>" alt="testimonialsImg">
                     </div>
                     <p class="testimonials__text"><?php the_sub_field('front-page_testimonial-grup_1_text'); ?></p>
                     <p class="testimonials__name"><?php the_sub_field('front-page_testimonial-grup_1_name'); ?></p>
                     <p class="testimonials__description"><?php the_sub_field('front-page_testimonial-grup_1_description'); ?></p>
                  </div>
               <?php endwhile; ?>
            <?php endif; ?>
         </div>
      </div>
   </section>
   <section class="faqAccordion">
      <?php
      $args_posts = array(
         'title' => 'front-page_faq-title',
         'subtitle' => 'front-page_faq-subtitle',
         'nameRepeatingField' => 'front-page_faq-question',
         'questionTitle' => 'front-page_faq-question_title',
         'questionDescription' => 'front-page_faq-question_description',
         'btnLink' => 'front-page_faq-btn',
      );

      get_template_part('/template-parts/blocks/faq-block', null, $args_posts);
      ?>
   </section>
</main>

<?php get_footer(); ?>