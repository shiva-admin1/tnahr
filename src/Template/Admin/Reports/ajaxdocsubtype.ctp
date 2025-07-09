<option value="" placeholder="Select Document type">Select Document Type</option>
<?php  foreach($documentSubtypes as $key => $value){ ?>
<option value="<?php echo $key; ?>"><?php echo $value;  ?></option>

<?php }  ?>