<?php
/*
Template Name: Contacts
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
         <span class="breadcrumbs__current">Contact</span>
      </div>
   </div>

   <section class="contact">
      <div class="contact__container container">
         <h1>Contacts</h1>
         <div class="contact__content">
            <div class="contact__form">
               <h4>Send a Message</h4>
               <!-- <form action="#" class="form" method="POST">
                  <div class="contact__form_row">
                     <div class="contact__item form__item">
                        <label for="formName" class="form__label">Name<span>*</span></label>
                        <input id="formName" type="text" name="name" placeholder="Name" class="form__input _req">
                     </div>
                     <div class="contact__item form__item">
                        <label for="formMail">Email<span>*</span></label>
                        <input id="formail" type="email" name="mail" placeholder="Email" class="form__input _req _email">
                     </div>
                  </div>
                  <div class="contact__item form__item">
                     <label for="formMessage" class="form__label">Message<span>*</span></label>
                     <textarea name="message" type="text" id="formMessage" placeholder="Message" class="form__textarea _req _message"></textarea>
                  </div>
                  <div class="form__btn ">
                     <button type="submit" class="form__btn_button contact__btn btn" name="submit">Submit</button>
                  </div>
               </form> -->
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