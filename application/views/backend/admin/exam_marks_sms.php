<hr />
   
<div class="row">
	<div class="col-md-12">
	
		<div class="panel panel-default panel-shadow" data-collapsed="0"><!-- to apply shadow add class "panel-shadow" -->
			
			<!-- panel head -->
			<div class="panel-heading">
				<div class="panel-title"><?php echo get_phrase('Send Results Alert');?> via SMS</div>
			</div>
			
			<!-- panel body -->
			<div class="panel-body">
			<div>

				<div class="form-group">
                    <div class="col-md-3">
                        <select id="exam_id" name="exam_id" class="form-control" required>
                        	<option value=""><?php echo get_phrase('select_exam');?></option>
                    	<?php 
                    		$exams = $this->db->get('exam')->result_array();
                    		foreach ($exams as $row):
                    	?>
                        	<option value="<?php echo $row['exam_id'];?>"><?php echo $row['name'];?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                        <select id="class_id" name="class_id" class="form-control" required>
                        	<option value=""><?php echo get_phrase('select_class');?></option>
                        <?php 
                        	$classes = $this->db->get('class')->result_array();
                        	foreach ($classes as $row):
                        ?>
                        	<option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                        <select id="receiver" name="receiver" class="form-control" required>
                        	<option value=""><?php echo get_phrase('select_receiver');?></option>
                        	<option value="student"><?php echo get_phrase('students');?></option>
                        	<option value="parent"><?php echo get_phrase('parents');?></option>
                        </select>
                    </div>
                </div>
                
                  <div class="col-md-3">
                      <button onclick='avrooms();' class="btn btn-primary"><?php echo get_phrase('Send Results Alert');?> via SMS</button>
                  </div>

	</div>
			</div>
			
		</div>
	
	</div>
</div>