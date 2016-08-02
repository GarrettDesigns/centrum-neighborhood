<h2 class="current-availability--heading">Current Availability</h2>

<?php
	// Accessing Data from class in soap.php
	// to generate info for apartment Availability

	$apt_info = new CentrumLivingSoapObject;

	$units = $apt_info->get_availability_info( 'Unit', 'List' );
	$unit_data = $units->ListResult->UnitObject;
//    var_dump($unit_data);
 ?>



<ul class="current-availability--tiles">
    <li class="unit-tile">
        <h1 class="unit-tile--heading">Convertible</h1>
        <p class="unit-tile--content">One Bedroom<br>1 Bathroom<br> XX to XX
Sq. Ft.<br>From &dollar;x,xxx/mo.</p>
        <a href="#" class="unit-tile--button buttons primary">floor plans <i
class="fa fa-chevron-right"></i></a>
    </li>
    <li class="unit-tile">
        <h1 class="unit-tile--heading">2 Bedroom</h1>
        <p class="unit-tile--content">Two Bedroom<br>2 Bathroom<br> XX to XX
Sq. Ft.<br>From &dollar;x,xxx/mo.</p>
        <a href="#" class="unit-tile--button buttons primary">floor plans <i
class="fa fa-chevron-right"></i></a>
    </li>
    <li class="unit-tile">
        <h1 class="unit-tile--heading">3 bedroom</h1>
        <p class="unit-tile--content">Three Bedroom<br>2 Bathroom<br> XX to XX
Sq. Ft.<br>From &dollar;x,xxx/mo.</p>
        <a href="#" class="unit-tile--button buttons primary">floor plans <i
class="fa fa-chevron-right"></i></a>
    </li>
</ul>

<article class="availability-modal">
    <section class="unit-filters-container">
        <?php
            $unit_types = array();
            $previous_models = array();
            $model_count = 1;
        ?>

        <ul class="unit-filter">
            <?php foreach ( $unit_data as $unit_type ) : ?>
                <?php if ( !in_array( $unit_type->FloorPlan->FloorPlanGroupName, $unit_types  ) ) : ?>
                    <li class="unit-option <?php echo $unit_type->FloorPlan->FloorPlanGroupName; ?>">
                        <?php
                            if($unit_type->FloorPlan->FloorPlanGroupName == "Convertible" ) {
                                echo "Studio";
                            } else {
                                echo $unit_type->UnitDetails->Bedrooms . ' bedroom';
                            }
                        ?>
                    </li>
                <?php endif; ?>
                    <?php $unit_types[] = $unit_type->FloorPlan->FloorPlanGroupName; ?>
            <?php endforeach; ?>
        </ul>

        <ul class="model-list">
            <?php foreach ($unit_data as $unit) : if ( !in_array( $unit->FloorPlan->FloorPlanID, $previous_models ) ) : ?>
               <li class="<?php echo $unit->FloorPlan->FloorPlanGroupName; ?> model-option"><?php echo 'Model ' . $model_count; ?></li>
            <?php $model_count++; endif; ?>
               <?php $previous_models[] = $unit->FloorPlan->FloorPlanID; ?>
            <?php endforeach; ?>
        </ul>

    </section>
    <section class="floorplan-view-container">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/floor_plan_example.png">
    </section>
</article>
