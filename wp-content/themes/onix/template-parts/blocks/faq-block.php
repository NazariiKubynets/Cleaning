<?php
$title = $args['title'];
$subtitle = $args['subtitle'];
$nameRepeatingField = $args['nameRepeatingField'];
$questionTitle = $args['questionTitle'];
$questionDescription = $args['questionDescription'];
$btnLink = $args['btnLink'];
?>


<div class="faqAccordion__container container">
   <h1 class="faqAccordion__title"><?php the_field($title) ?></h1>
   <h2 class="faqAccordion__subtitle"><?php the_field($subtitle); ?></h2>
   <div class="accordion">
      <?php if (have_rows($nameRepeatingField)) : ?>
         <?php while (have_rows($nameRepeatingField)) : the_row(); ?>
            <div class="accordion__item">
               <div class="accordion__header">
                  <div class="accordion__ordinal"></div>
                  <p><?php the_sub_field($questionTitle); ?></p>
                  <span></span>
               </div>
               <div class="accordion__content">
                  <p>
                     <?php the_sub_field($questionDescription); ?>
                  </p>
               </div>
            </div>
         <?php endwhile; ?>
      <?php endif; ?>
   </div>
   <a href="<?php the_field($btnLink); ?>" class="faqAccordion__btn btn">View More</a>
</div>