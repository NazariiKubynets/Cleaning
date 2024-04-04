<?php
$title = $args['title'];
$subtitle = $args['subtitle'];
$text = $args['text'];
$nameRepeatingField = $args['nameRepeatingField'];
$description = $args['description'];
$textBottom = $args['textBottom'];
?>

<section class="benefits">
   <hr class="benefits__line">
   <div class="benefits__container container">
      <div class="benefits__info">
         <h1 class="benefits__title"><?php the_field($title); ?></h1>
         <h2 class="benefits__subtitle"><?php the_field($subtitle); ?></h2>
         <p class="benefits__text">
            <?php the_field($text); ?>
         </p>
      </div>
      <div class="benefits__list">
         <?php if (have_rows($nameRepeatingField)) : ?>
            <?php
            $benefits_count = count(get_field($nameRepeatingField));
            $benefits_item = 0;
            while (have_rows($nameRepeatingField)) : the_row();
               $benefits_item++;
            ?>
               <div class="benefits__item 
                  <?php echo ($benefits_item == 1 || $benefits_item == $benefits_count && $benefits_count <= 5 || $benefits_item == $benefits_count / 2 && $benefits_count > 5)
                     ? 'benefits__item_top' : ''; ?> 
                  <?php echo ($benefits_item == $benefits_count / 2 + 1 && $benefits_count > 5 || $benefits_item == $benefits_count && $benefits_count > 5)
                     ? 'benefits__item_bottom' : ''; ?>">
                  <span class="benefits__ordinal"></span>
                  <p><?php the_sub_field($description); ?></p>
               </div>

               <?php if ($benefits_item == $benefits_count / 2 && $benefits_count >= 5 || $benefits_item == $benefits_count && $benefits_count <= 5) : ?>
                  <div class="benefits__flex-row-break"></div>
               <?php endif; ?>

         <?php endwhile;
         endif; ?>
      </div>
      <p class="benefits__text text"><?php the_field($textBottom); ?>
      </p>
   </div>
</section>