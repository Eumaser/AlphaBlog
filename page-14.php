<?php
  //Template Name: Contact Page
 ?>

<?php get_header(); ?>

<?php
  $listError = array();
  $leEmpty = true;

if(isset($_POST['submit']) ){
      $name = $_POST['messageName'];
      $email = $_POST['email'];
      $inquiry = $_POST['inquiry'];

      $to = get_option('admin_email');
      $subject = "Inquiry from Alphablog";
      $headers = 'From: '. $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n";

      $message = "From: " .$name. "\n\n" .$inquiry;

      if(empty($name)){
        array_push($listError, "Name is required.");
      }elseif (strlen($name)>30) {
        array_push($listError, "Name too long.");
      }

      if(!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)){
        array_push($listError, "Invalid Email.");
      }elseif (strlen($email)>100) {
        array_push($listError, "Email too long.");
      }

      if(empty($inquiry)){
        array_push($listError, "Inquiry is required");
      }elseif (strlen($inquiry)>750) {
        array_push($listError, "Inquiry too long.");
      }

      if(empty($listError)) {
        $sent = wp_mail($to,$subject,strip_tags($message),$headers);

        if ($sent) {
          $success = "Message sent.";
          $leEmpty = false;
        }else {
          array_push($listError, 'Message was not sent');
        }

      }
  }

?>

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-md-12">
      <?php  if(have_posts() ): ?>
          <?php while (have_posts() ):the_post(); ?>
            <div class="theHome">
              <?php the_content(); ?>
            </div>

            <div class="row">
              <div class="col-md-4 offset">

              </div>
              <div class="col-md-4">

              <?php  if(!empty($listError) ): ?>
                <div class="error">
                  <ul>
                  <?php
                    foreach($listError as $err){
                        echo "<li>". $err. "</li>";
                    }
                  ?>
                    </ul>
                </div>
              <?php endif ?>

              <?php  if(empty($listError) && $leEmpty == false ): ?>
                <div class="success">
                    <?php echo $success ?>
                </div>
              <?php endif ?>

                <form action="<?php the_permalink();?>" method="post">
                  <div class="form-group">
                    <input type="text" name="messageName"  placeholder="Name" class="form-control" maxlength="30" value="<?php echo esc_attr($_POST['messageName']); ?>">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email"  placeholder="Email Address" class='form-control' maxlength="100" value="<?php echo esc_attr($_POST['email']); ?>" >
                  </div>
                  <div class="form-group">
                    <textarea name="inquiry" rows="8" cols="80" placeholder="Inquiry" class='form-control' maxlength="750" type="text"><?php echo esc_textarea($_POST['inquiry']); ?></textarea>
                  </div>
                  <input type="hidden" name="submit" value="1">
                  <div class="form-group">
                    <input type="submit" name="submit" value="submit" class="btn btn-default">
                  </div>
                </form>
              </div>

              </div>
        <?php endwhile?>
      <?php endif ?>
    </div>
  </div>
</div>











<?php get_footer(); ?>
