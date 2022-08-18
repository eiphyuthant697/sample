<?php 
$args = array( 
  'post_type' => 'our_news',
  'order'   => 'ASC',
   );
$the_query = new WP_Query( $args ); 
$categories = get_categories($args);
$count=1;
?>
<div class="information-header">
  <div class="left">
    <h2>LATEST</h2>
  </div>
  <div class="right">
    <p>Browse by</p>
    <div class="dropdown">
      <button class="dropdown-toggle" data-toggle="dropdown">...
      <i class="fa fa-chevron-down" aria-hidden="true"></i></button>
      <ul class="dropdown-menu">
        <li><p class="category1">All </p></li>
            <?php foreach($categories as $category) {?>
            <li><?php echo '<p class="category'.++$count.'">' . $category->slug . '</p>';?></li>
          <?php }?>
        </ul>
    </div>
  </div>
</div>

