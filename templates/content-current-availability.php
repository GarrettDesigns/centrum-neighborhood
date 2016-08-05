<h2 class="current-availability--heading">Current Availability</h2>

<?php
	// Accessing Data from class in soap.php
	// to generate info for apartment Availability

	$apt_info = new CentrumLivingSoapObject;
	$units = $apt_info->get_availability_info( 'Unit', 'List' );
	$unit_data = $units->ListResult->UnitObject;
 ?>

<?php
    // Define arrays and variable to hold reformatted api data

    $unit_types = array();
    $model_data = array();
    $model_types = array();
    $previous_models = array();

    $model_count = 1;
    $last_unit_type = '';
    $last_rent_amt = '';
    $counter = 0;
?>

<?php
    foreach( $unit_data as $unit_type ) {

        // Store number of bedrooms for each unit type in unit_types array

        $unit_types[$unit_type->FloorPlan->FloorPlanGroupName]['bedrooms'] =
            $unit_type->UnitDetails->Bedrooms;

        // Store number of bathrooms in for each unit in unit_types array

        $unit_types[$unit_type->FloorPlan->FloorPlanGroupName]['bathrooms'] =
            $unit_type->UnitDetails->Bathrooms;

        // Find all model names and store them in unit_types array

        foreach( $unit_data  as $model_type ) {
            array_push( $model_types, $model_type->FloorPlan->FloorPlanCode );
        }

        $unique_model_types = array_unique( $model_types );

        foreach( $unique_model_types as $model ) {
            if($unit_type->FloorPlan->FloorPlanCode == $model ) {
                $unit_model_groups[$unit_type->FloorPlan->FloorPlanGroupName][$counter] =
                    $model;
                $counter++;
            }
        }
        // Find unit types and store them in unit_types array

        if( $unit_type->FloorPlan->FloorPlanGroupName != $last_unit_type ) {
            $unit_types[$unit_type->FloorPlan->FloorPlanGroupName]['unit_type']
                = $unit_type->FloorPlan->FloorPlanGroupName;
        }

        // Find base rent amount for each unit type and store in
        // unit_types array

        if ( $unit_type->BaseRentAmount < $last_rent_amt ) {
            $unit_types[$unit_type->FloorPlan->FloorPlanGroupName]['min_rent']
                = $unit_type->BaseRentAmount;
        }
        $last_rent_amt = $unit_type->BaseRentAmount;

        // split in 3 arrays, dynamically generate array names and put min and max
        // sq ft values into unit_types array

        if ( $unit_type->FloorPlan->FloorPlanGroupName == $last_unit_type ) {
            ${$unit_type->FloorPlan->FloorPlanGroupName}[$counter] = $unit_type->UnitDetails->GrossSqFtCount;
            $counter++;
            $unit_types[$unit_type->FloorPlan->FloorPlanGroupName]['min_sqft'] = min(${$unit_type->FloorPlan->FloorPlanGroupName});
            $unit_types[$unit_type->FloorPlan->FloorPlanGroupName]['max_sqft'] = max(${$unit_type->FloorPlan->FloorPlanGroupName});
        }
        $last_unit_type = $unit_type->FloorPlan->FloorPlanGroupName;


    }

    // Reverse unit_types array to order it starting
    // with Convertible units

    $ordered_unit_types = array_reverse($unit_types);

    foreach($unit_model_groups as $key => $value ) {
      $unique_unit_model_pairs[$key] = array_unique( $unit_model_groups[$key] );
    }
    $sorted_unique_unit_model_pairs =  array_reverse( $unique_unit_model_pairs );
    var_dump($sorted_unique_unit_model_pairs);
?>

<ul class="current-availability--tiles">
    <?php foreach( $ordered_unit_types as $unit ) : ?>
        <li class="unit-tile">
            <h1 class="unit-tile--heading">
                <?php
                    if($unit['unit_type'] == "Convertible" ) {
                        echo "Studio";
                    } else {
                        echo $unit['bedrooms'] . ' bedroom';
                    }
                ?>
            </h1>
            <p class="unit-tile--content">
                <?php if ( $unit['bedrooms'] == '0.5' ) {
                    echo '1 Bedroom';
                } elseif ($unit['bedrooms'] == '2' ) {
                    echo $unit['bedrooms'] . ' Bedrooms';
                } else {
                    echo $unit['bedrooms'] . ' Bedroom';
                } ?>
                <br>
                <?php if ( $unit['bathrooms'] == '2' ) {
                    echo $unit['bathrooms'] . ' Bathrooms';
                } else {
                    echo $unit['bathrooms'] . ' Bathroom';
                } ?>
                <br>
                <?php if( $unit['min_sqft'] == $unit['max_sqft'] ) {
                    echo $unit['min_sqft'];
                } else {
                    echo $unit['min_sqft'] . ' to ' . $unit['max_sqft'];
                } ?> Sq. Ft.<br>From &dollar;<?php echo
                round( $unit['min_rent'] ); ?>/mo.
            </p>
            <a href="#" class="unit-tile--button buttons primary <?php echo
    $unit['unit_type']; ?>">floor plans <i class="fa fa-chevron-right"></i></a>
        </li>
    <?php endforeach; ?>
</ul>

<article class="availability-modal">
  <button class="close-availability">
    <img class="iconic" src="<?php echo get_template_directory_uri(); ?>/dist/fonts/x.svg" alt="an x">
  </button>
    <section class="unit-filters-container">
        <p class="filter-heading">Select Number of Bedrooms Preferred</p>
        <ul class="unit-filter">
            <?php foreach ( $ordered_unit_types as $unit ) : ?>
                <li class="unit-option <?php echo $unit['unit_type']; ?>">
                    <?php
                        if($unit['unit_type'] == "Convertible" ) {
                            echo "Studio";
                        } else {
                            echo $unit['bedrooms'] . ' bedroom';
                        }
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <p class="filter-heading">Select a Model Number to view Floor Plans</p>
        <ul class="model-list">
            <?php foreach ($sorted_unique_unit_model_pairs as $unit => $models ) : ?>
                <?php foreach( $models as $model ) : ?>
                   <li class="<?php echo $unit; ?> model-option"><?php echo 'Model ' . $model; ?></li>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>

        <ul class="model-data">
            <li class="model-data--list-container">
                <ul class="model-data--list">
                    <li class="model-data--list-item"><span class="model-data--heading">Unit: </span></li>
                    <li class="model-data--list-item"><span class="model-data--heading">Bedrooms: </span></li>
                    <li class="model-data--list-item"><span class="model-data--heading">Bathrooms: </span></li>
                    <li class="model-data--list-item"><span class="model-data--heading">Rent: </span></li>
                    <li class="model-data--list-item"><span class="model-data--heading">Sq Ft: </span></li>
                </ul>

                <ul class="model-data--list">
                    <li class="model-data--list-item"><span class="model-data--heading">Unit: </span></li>
                    <li class="model-data--list-item"><span class="model-data--heading">Bedrooms: </span></li>
                    <li class="model-data--list-item"><span class="model-data--heading">Bathrooms: </span></li>
                    <li class="model-data--list-item"><span class="model-data--heading">Rent: </span></li>
                    <li class="model-data--list-item"><span class="model-data--heading">Sq Ft: </span></li>
                </ul>
            </li>
        </ul>

    <a href="#" class="apply-now primary buttons">Apply Now</a>
    </section>
    <section class="floorplan-view-container">
        <article class="floor-plan-viewer">
            <div class="slider-slide"><img height="600" src="<?php echo get_template_directory_uri(); ?>/dist/images/floor_plan_example.png"></div>
            <div class="slider-slide"><img height="600" src="<?php echo get_template_directory_uri(); ?>/dist/images/floor_plan_example.png"></div>
        </article>
    </section>
</article>
