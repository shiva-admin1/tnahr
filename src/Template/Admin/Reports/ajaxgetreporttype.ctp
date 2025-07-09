<option value="">Select Report Type</option>
<?php  foreach($reportTypes as $report_type_value => $report_type_name){ ?>
<option value="<?php echo $report_type_value; ?>"><?php echo $report_type_name;  ?></option>

<?php }  ?>