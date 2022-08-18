<?php global $current_user;
      get_currentuserinfo();
?>
<?php 
  $post_args = array(
    'posts_per_page'=>-1,
    'order'   => 'ASC',
    'post_type'=> 'questions'
  );
  $the_query = new WP_Query( $post_args ); 
  $numberOfPostCat = $the_query->found_posts; 
?>
<div class="extra">
  <div class="question-section">
    <form method="POST" class="question-form">
      <input name="cuser_email" id="cuser_email" value="<?php echo $current_user->user_email; ?>" type="hidden" class="field email"/>
      <input name="cuser_name" id="cuser_name" value="<?php echo $current_user->user_login; ?>" type="hidden"/>
      
          
          <?php if ( $the_query->have_posts() ) : 
            
            while ( $the_query->have_posts() ) : $the_query->the_post();
				if( have_rows('question_loop') ):?>
              		<div class="question-answer qans_<?php echo $numberOfPostCat;?>">
						<?php while( have_rows('question_loop') ) : the_row();?>
						  <div class="question-title qa_<?php echo $numberOfPostCat;?>"><?php echo get_sub_field('question');?></div>
						  <input name="qt_<?php echo $numberOfPostCat;?>" id="question_title" value="<?php echo get_sub_field('question');?>" type="hidden" class="field"/>
						  <div class="answer-sect">
							  <?php while( has_sub_field('question_answer') ): ?>

							<?php
								$field = get_sub_field('question_answer');

								?>
								<div class="answer answer-<?php echo esc_attr($field['value']); ?>">
									<input type="radio" class="answer-<?php echo esc_attr($field['value']); ?>" id="question_<?php echo esc_attr($field['value']); ?>" name="question_<?php echo esc_attr($field['value']); ?>" value="<?php echo esc_attr($field['value']); ?>">
									<label for="<?php echo esc_attr($field['value']); ?>"><?php echo esc_html($label); ?></label>
								</div>
							  <?php endwhile; ?>

						  </div>
						<?php endwhile ; ?>
              </div>
            <?php
			endif;
            $numberOfPostCat--;
          endwhile; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
      
      <input type="submit" name="question_submit" class="submit" value="Submit">
    </form>
  </div>
</div>
<?php

    global $wpdb, $post;
    $time = current_time( 'mysql' );
    if(array_key_exists('question_submit', $_POST))
    {
		
      $question_title ='';

		  $question_title .= "question : ". $_POST["qt_.$i"];
		  $question_title .= "   answer : ". $_POST["question_.$i"];

	  $insertData = $wpdb->get_results(" INSERT INTO ".$wpdb->prefix."extra_questions (data) VALUES ('".$question_title."')");

    }

?>