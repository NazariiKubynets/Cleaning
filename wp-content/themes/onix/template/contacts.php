<?php
/*
Template Name: Contacts
*/
?>

<?php get_header(); ?>

<main>
   <section class="contact">
      <div class="contact__container container">
         <h1>Contacts</h1>
         <div class="contact__content">
            <div class="contact__form">
               <h4>Send a Message</h4>
               <?php
               echo do_shortcode('[contact-form-7 id="4d600a2" title="Contact"]');
               ?>
            </div>
            <hr>
            <div class="contact__data">
               <?php if (get_field('contact-data_content')) : ?>
                  <?php while (has_sub_field('contact-data_content')) : ?>
                     <div class="contact__call">
                        <h4><?php the_sub_field('contact-data_content-title'); ?></h4>
                        <div class="contact__number">
                           <div>
                              <img src="<?php the_sub_field('contact-data_content-icon'); ?>" alt="contact-data_icon">
                           </div>
                           <a href="<?php
                                    the_sub_field('contact-data_content-data_type') .
                                       the_sub_field('contact-data_content-data_one'); ?>">
                              <?php the_sub_field('contact-data_content-data_one'); ?>
                           </a>
                           <?php if (get_sub_field('contact-data_content-data_two')) : ?>
                              <p>/</p>
                              <a href="<?php the_sub_field('contact-data_content-data_type'); ?><?php the_sub_field('contact-data_content-data_two'); ?>">
                                 <?php the_sub_field('contact-data_content-data_two'); ?>
                              </a>
                           <?php endif; ?>
                        </div>
                     </div>
                  <?php endwhile; ?>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </section>
   <section class="maps">
      <div class="maps__container container">
         <?php the_field('contact-link_map'); ?>
      </div>
   </section>
</main>

<?php get_footer(); ?>