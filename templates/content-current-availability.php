<h2 class="current-availability--heading">Current Availability</h2>

<?php
	// Accessing Data from class in soap.php
	// to generate info for apartment Availability

	$apt_info = new CentrumLivingSoapObject;
	$units = $apt_info->get_availability_info( 'Unit', 'List' );
	$unit_data = $units->ListResult->UnitObject;

    // Define arrays and variable to hold reformatted api data

    $unit_types = array();
    $floor_plan_images = array();
?>

<?php
    foreach( $unit_data as $unit_type ) {

        $unit_types[$unit_type->FloorPlan->FloorPlanGroupName]['bedrooms'] =
            $unit_type->UnitDetails->Bedrooms;

        $unit_types[$unit_type->FloorPlan->FloorPlanGroupName]['bathrooms'] =
            $unit_type->UnitDetails->Bathrooms;

        $unit_types[$unit_type->FloorPlan->FloorPlanGroupName]['sqft'][] =
            $unit_type->UnitDetails->GrossSqFtCount;

        $unit_types[$unit_type->FloorPlan->FloorPlanGroupName]['models'][] =
            $unit_type->FloorPlan->FloorPlanCode;

        $unit_types[$unit_type->FloorPlan->FloorPlanGroupName]['unit_type']
            = $unit_type->FloorPlan->FloorPlanGroupName;

        $unit_types[$unit_type->FloorPlan->FloorPlanGroupName]['rent_amts'][]
            = $unit_type->BaseRentAmount;

        $unit_types[$unit_type->FloorPlan->FloorPlanGroupName]['unit_id'] =
            $unit_type->Address->UnitID;
    }

    // Reverse unit_types array to order it starting
    // with Convertible units

    $ordered_unit_types = array_reverse($unit_types);
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
                <?php if( min( $unit['sqft'] ) == max( $unit['sqft'] ) ) {
                    echo min( $unit['sqft'] );
                } else {
                    echo min( $unit['sqft'] ) . ' to ' . max( $unit['sqft'] );
                } ?> Sq. Ft.<br>From &dollar;<?php echo
                round( min( $unit['rent_amts'] ) ); ?>/mo.
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
            <?php foreach ( $unit_types as $unit ) : ?>
                <?php foreach( array_unique( $unit['models'] ) as $model ) : ?>
                   <li class="<?php echo $unit['unit_type']; ?> model-option"
                   name="<?php echo $model; ?>"><?php echo 'Model ' . $model;  ?></li>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>

        <ul class="model-data">
            <li class="model-data--list-container">
                <ul class="model-data--list list-one">
                    <li class="model-data--list-item"><span class="model-data--heading">Unit: </span><span class="unit"></span></li>
                    <li class="model-data--list-item"><span class="model-data--heading">Bedrooms: </span><span class="bedrooms"></span></li>
                    <li class="model-data--list-item"><span class="model-data--heading">Bathrooms: </span><span class="bathrooms"></span></li>
                    <li class="model-data--list-item"><span class="model-data--heading">Rent Starting at: </span><span class="rent"></span></li>
                    <li class="model-data--list-item"><span class="model-data--heading">Sq Ft: </span><span class="sqft"></span></li>
                </ul>
            </li>
        </ul>

       <a href="#" target="_blank" class="apply-now primary buttons">Apply Now</a>
    </section>

    <?php
    $args = array(
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'post_mime_type' => 'image/jpeg',
        'tax_query' => array(
            array(
                'taxonomy' => 'floorplan',
                'field' => 'slug',
                'terms' => array('C', 'B9', 'B4', 'B1', 'A7', 'A8', 'A2',
                'A6'),
            ),
        ),
    );

    $floorplan_slides = new WP_Query( $args );

//    var_dump( $floorplan_slides );
?>

    <section class="floorplan-view-container">
        <article class="floor-plan-viewer">
            <?php
                foreach ($floorplan_slides->posts as $slide) {
                $plan_name = explode('-', $slide->post_name);
                $plan_name_class = count($plan_name) == 4 ? $plan_name[2] : $plan_name[1];
                   echo '<img class="' . $plan_name_class . ' slider-slide" src="' . $slide->guid . '">';
                }
            ?>
        </article>
    </section>
</article>
