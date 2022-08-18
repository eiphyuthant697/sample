<?php 
$operation_ags = array( 
    'post_type' => 'operation_time',
    //'posts_per_page' => 6,
//     'order'   => 'DSC',
     );
$operation_query = new WP_Query( $operation_ags ); 
$mon_duty_10_1;
$tue_duty_10_1;
$wed_duty_10_1;
$thu_duty_10_1;
$fri_duty_10_1;
$sat_duty_10_1;
$sun_duty_10_1;
$mon_duty_3_7;
$tue_duty_3_7;
$wed_duty_3_7;
$thu_duty_3_7;
$fri_duty_3_7;
$sat_duty_3_7;
$sun_duty_3_7;
?>
<?php if ( $operation_query->have_posts() ) : ?>
    <div class="operation-wrap">
        <h3 class="widget-title">診療時間</h3>
        <?php while ( $operation_query->have_posts() ) : $operation_query->the_post(); ?>
        <?php $operation_10_1 = get_field('operation_time_10_1');
            $operation_3_7 = get_field('operation_time_3_7');
            if($operation_10_1['mon'] == 'on'){ $mon_duty_10_1 = 'open';} else {$mon_duty_10_1 = 'close';}
            if($operation_10_1['tue'] =='on'){  $tue_duty_10_1 = 'open';} else{$tue_duty_10_1 = 'close';}
            if($operation_10_1['wed'] =='on'){ $wed_duty_10_1 = 'open'; } else{ $wed_duty_10_1 = 'close';}
            if($operation_10_1['thu'] =='on'){ $thu_duty_10_1 = 'open'; } else{$thu_duty_10_1 = 'close';}
            if($operation_10_1['fri'] =='on'){ $fri_duty_10_1 = 'open'; } else{ $fri_duty_10_1 = 'close';  }
            if($operation_10_1['sat'] =='on') { $sat_duty_10_1 = 'open'; } else{$sat_duty_10_1 = 'close';}
			if($operation_10_1['sun'] =='on') { $sun_duty_10_1 = 'open'; } else{$sun_duty_10_1 = 'close';}
            
            if($operation_3_7['mon'] =='on') { $mon_duty_3_7 = 'open'; } else{ $mon_duty_3_7 = 'close';}
            if($operation_3_7['tue'] =='on') { $tue_duty_3_7 = 'open'; } else{ $tue_duty_3_7 = 'close';  }
            if($operation_3_7['wed'] =='on') { $wed_duty_3_7 = 'open'; } else{ $wed_duty_3_7 = 'close'; }
            if($operation_3_7['thu'] =='on') { $thu_duty_3_7 = 'open'; } else{$thu_duty_3_7 = 'close'; }
            if($operation_3_7['fri'] =='on'){ $fri_duty_3_7 = 'open'; } else{$fri_duty_3_7 = 'close';}
            if($operation_3_7['sat'] =='on') { $sat_duty_3_7 = 'open';  } else{$sat_duty_3_7 = 'close'; }
            if($operation_3_7['sun'] =='on') { $sun_duty_3_7 = 'open'; } else{$sun_duty_3_7 = 'close';}
            ?>
                
        <?php endwhile; ?>
		<div class="operation-time-table" style="overflow-x: auto;">
        <table>
            <tr>
                <th></th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
                <th>Sun</th>
            </tr>
            <tr>
                <td>9:00am - 1:00pm</td>
                <td><p><span class="post-<?php echo $mon_duty_10_1; ?>"></span></p></td>
                <td><p><span class="post-<?php echo( $tue_duty_10_1 ); ?>"></span></p></td>
                <td><p><span class="post-<?php echo( $wed_duty_10_1 ); ?>"></span></p></td>
                <td><p><span class="post-<?php echo( $thu_duty_10_1 ); ?>"></span></p></td>
                <td><p><span class="post-<?php echo( $fri_duty_10_1 ); ?>"></span></p></td>
                <td><p><span class="post-<?php echo( $sat_duty_10_1 ); ?>"></span></p></td>
                <td><p><span class="post-<?php echo( $sun_duty_10_1 ); ?>"></span></p></td>
            </tr>
            <tr>
                <td>3:00pm - 7:00pm</td>
                <td><p><span class="post-<?php echo( $mon_duty_3_7 ); ?>"></span></p></td>
                <td><p><span class="post-<?php echo( $tue_duty_3_7 ); ?>"></span></p></td>
                <td><p><span class="post-<?php echo( $wed_duty_3_7 ); ?>"></span></p></td>
                <td><p><span class="post-<?php echo( $thu_duty_3_7 ); ?>"></span></p></td>
                <td><p><span class="post-<?php echo( $fri_duty_3_7 ); ?>"></span></p></td>
                <td><p><span class="post-<?php echo( $sat_duty_3_7 ); ?>"></span></p></td>
                <td><p><span class="post-<?php echo( $sun_duty_3_7 ); ?>"></span></p></td>
            </tr>
        </table>
		</div>
        <div class="doctor-name-whole">
        <div class="doctor-name">
                <h3>
                    <span class="post-open"></span>
                    ... Open
                </h3>
            </div>
			<div class="doctor-name">
                <h3>
                    <span class="post-close"></span>
                    ... Close
                </h3>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>


       
