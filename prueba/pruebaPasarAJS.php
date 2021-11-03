<?php

// Creating a PHP Array
$sampleArray = array('Car', 'Bike', 'Boat');

?>

<script type="text/javascript">

// Using PHP implode() function
var passedArray =
	<?php echo '["' . implode('", "', $sampleArray) . '"]' ?>;

// Printing the passed array elements
console.log(passedArray);

</script>
