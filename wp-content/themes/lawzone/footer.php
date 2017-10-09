<?php 
/*
* Lawzone Footer
*/
?>
 <!--Main Footer-->
  <footer class="main-footer">
    <div class="container">
      <div class="row clearfix">
        <?php if(is_active_sidebar( 'footer-contents' )){
          dynamic_sidebar( 'footer-contents' );
          } ?>        
      </div>
    </div>
    <!--Copyright-->
    <div class="copyright"><?= (ls_option('footer_(copyright)'))?str_replace('\"', '"', ls_option('footer_(copyright)')):'';  ?></div>
  </footer>
</div>

<!--End pagewrapper--> 
<!--Scroll to top-->
<?php if (ls_option('back_to_top') == 'yes'): ?>
<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="fa fa-long-arrow-up"></span></div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>