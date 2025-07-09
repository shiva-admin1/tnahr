<option value="">Select Publisher</option>
<?php  foreach($publishers as $publisher_name => $publisher){ ?>
<option value="<?php echo $publisher_name; ?>"><?php echo $publisher;  ?></option>

<?php }  ?>