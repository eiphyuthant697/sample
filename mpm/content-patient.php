<?php 
$patient_args = array( 
  'post_type' => 'patients',
  // 'posts_per_page' => 6,
  'order'   => 'DSC',
   );
$patient_query = new WP_Query( $patient_args ); 
?>
<?php if ( $patient_query->have_posts() ) : ?>
  <div class="patient-wrap">
    
     
    <?php while ( $patient_query->have_posts() ) : $patient_query->the_post(); ?>
	  <table class="post-<?php the_ID(); ?> table table-stripped table-bordered">
    <?php if( have_rows('visit_history') ):?>
<?php
    $lang = get_bloginfo( 'language' );
    //$acceptLang = ['ja', 'my-MM', 'en-GB']; 
	$day = 'Day';
	$time = 'Time';
	$appointment = 'Appointment';	
	$letter = 'If you forget the medical certificate given by your doctor, you can download it from the link below.';
	$download_letter = 'Download the medical certificate';
    if( $lang == 'ja' ){
		$day = '日';
		$time = '時間';
		$appointment = '予約';
		$letter = 'お医者さんからもらった診断書を忘れた場合、以下のリンクからダウンロード出来ます。';
		$download_letter = '診断書をダウンロードする';
	}
	elseif( $lang == 'my-MM' ){
		$day = 'နေ့';
		$time = 'အချိန်';
		$appointment = 'ချိန်းဆိုမှု';
		$letter = 'သင့်ဆရာဝန်ပေးသော ဆေးစစ်လက်မှတ်မေ့သွားခဲ့ပါက အောက်ပါလင့်ခ်မှ ဒေါင်းလုဒ်လုပ်နိုင်ပါသည်။';
		$download_letter = 'ဆေးစစ်လက်မှတ်ကို ဒေါင်းလုဒ်လုပ်ပါ။';
		
	}	  

?>
	  
        <tr>
            <th><?php echo $day; ?></th>
            <th><?php echo $time; ?></th>
            <th><?php echo $appointment; ?></th>
        </tr>
        <?php $count = count(get_field("visit_history")); ?>
							
            <?php while( have_rows('visit_history') ) : the_row();?>
                <tr>
                    <td><?php echo get_sub_field('day');?></td>
                    <td><?php echo get_sub_field('time');?></td>
                    <td><?php echo get_sub_field('symptoms');?></td>
                </tr>
            <?php endwhile; ?>
		  
        <?php endif; ?>
		  <tr class="hide-tr"  id="post-<?php the_ID(); ?>">
			 			  <td class="patient-name"><?php $user = get_field("user_mail");if( $user ): ?><?php echo $user['display_name']; ?><?php endif; ?></td>
		  </tr>
		  <?php if( get_field('doctor_letter') ): ?>
		  <tr class="letter">
			 
			   <td colspan="3">
				   <p><?php echo $letter; ?></p>
						<a class="don-letter" href="<?php the_field('doctor_letter'); ?>" ><?php echo $download_letter; ?></a>
					
			  
			 </td>
			  
		  </tr>
		  <?php endif; ?>
		  </table> 
	  
      
    <?php endwhile; ?>
    
    
  </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
