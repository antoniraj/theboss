<?php
$ceo_num_rows = count($event_ceo);
$events_num_rows = count($event_community);
$location_num_rows = count($location);

?>

<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title">Search Results  - <?php echo $search_word;?></h3>  
  </div>
  <div class="panel-body msg-panel">
    <?php if($ceo_num_rows!=0){?>        
      <dl>
        <?php foreach ($event_ceo as $key => $value) { ?>
          <dt><?php echo date('M d,Y',strtotime($value->created_on));?></dt>
          <dd>
            <h3><a href="<?php echo base_url()?>news/view/<?php echo $value->id?>/1"><?php echo $value->title?></a></h3>
              <p><?php echo $value->summary?></p>
              <ul class="list-unstyled list-inline">
              <li><a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> <?php echo $value->view_count?> Views</a></li>
            </ul>
          </dd>
        <?php }?>
      </dl>
    <?php }?> <!-- CEO MEssage -->
    <?php if($events_num_rows!=0){?>        
      <dl>
        <?php foreach ($event_community as $key => $value) { ?>
          <dt><?php echo date('M d,Y',strtotime($value->created_on));?></dt>
          <dd>
            <h3><a href="<?php echo base_url()?>news/view/<?php echo $value->id?>/1"><?php echo $value->title?></a></h3>
              <p><?php echo $value->summary?></p>
              <ul class="list-unstyled list-inline">
              <li><a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> <?php echo $value->view_count?> Views</a></li>
            </ul>
          </dd>
        <?php }?>
      </dl>
    <?php }?> <!-- Events -->
    <?php if($location_num_rows!=0){?>
      <dl>
        <?php foreach ($location as $key => $value) { ?>
          <dd>
            <h3><a href="#"><?php echo $value->title?></a></h3>
            <p><?php echo $value->location?></p>
            <p>Office : <?php echo $value->office?></p>
            <p>Fax : <?php echo $value->fax?></p>         
          </dd>
        <?php }?> 
      </dl>
    <?php }?> <!-- Location --> 
  </div>
</div><!--panel-->

