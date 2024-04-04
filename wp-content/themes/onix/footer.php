<footer class="footer">
   <div class="footer__container container">
      <div class="footer__row">
         <div class="footer__logo">
            <img src="<?php the_field('footer_logo', 'options'); ?>" alt="logo">
            <div>
               <p><?php the_field('footer_working-hours', 'options'); ?></p>
               <p><?php the_field('footer_weekend', 'options'); ?></p>
            </div>
         </div>
         <div class="footer__connection">
            <h5><?php the_field('footer_address', 'options'); ?></h5>
            <div class="footer__support">
               <a href="tel:<?php the_field('footer_phone-number1', 'options'); ?>"><?php the_field('footer_phone-number1', 'options'); ?></a>
               <a href="tel:<?php the_field('footer_phone-number2', 'options'); ?>"><?php the_field('footer_phone-number2', 'options'); ?></a>
               <a href="mailto:<?php the_field('footer_mail', 'options'); ?>"><?php the_field('footer_mail', 'options'); ?></a>
            </div>
         </div>
      </div>
      <div class="footer__different">
         <div class="footer__menu">
            <?php
            wp_nav_menu(array(
               'theme_location' => 'footer-menu',
               'container'      => false,
            ));
            ?>
         </div>
         <div class="footer__info">
            <p>© 2022 General Cleaning Sanitation. All rights reserved</p>
            <div class="footer__data">
               <p>Sitemap</p>
               <p>Privacy Policy</p>
               <p>Accessibility Statement</p>
            </div>
         </div>
      </div>
   </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>