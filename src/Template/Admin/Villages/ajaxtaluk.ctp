<option value="">Select Taluk</option> 
<?php foreach($taluks as $taluk){  ?>
<option value = "<?php echo $taluk['id']; ?>"><?php echo $taluk['name']; ?></option>
<?php } ?>



