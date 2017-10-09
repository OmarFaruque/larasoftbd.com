<?php 
  // Options
$form = ls_option('select_query_form');
$bg = ls_option('attorney_form_background_id');
$overlayer = ls_option('attorney_form_overlayer');
?>

  <section class="style-two overlayer <?= ($overlayer)?$overlayer:'default-overlay';  ?> parallax" data-bg-image="<?= ($bg)?wp_get_attachment_url($bg ):get_template_directory_uri() . '/css/images/bg/bg6.jpg'; ?>">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 text-uppercase">
          <div class="appointment-form p30">
            <h3 class="pb10">Send Your Query</h3>
            <div class="frm-register">
            <!-- Form -->
            <?= do_shortcode('[contact-form-7 id="'.$form.'" title="' .get_the_title( $form ).  '"]');  ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>