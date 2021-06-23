<?php 
    $child_of_parent = $this->db->get_where('student' , array(
        'student_id' => $student_id
    ))->result_array();
    foreach ($child_of_parent as $row):
?>
<hr />
    <div class="label label-primary pull-right" style="font-size: 14px;">
        <i class="entypo-user"></i> <?php echo $row['name'];?>
    </div>
<br><br>
<div class="row">
    <div class="col-md-12">
    
        <div class="tabs-vertical-env">
        
            <ul class="nav tabs-vertical">
                <?php 
                    $exams = $this->db->get('exam')->result_array();
                    foreach ($exams as $row2):
                ?>
                <li class="">
                    <a href="#<?php echo $row2['exam_id'];?>" data-toggle="tab">
                        <?php echo $row2['name'];?>  <small>( <?php echo $row2['date'];?> )</small>
                    </a>
                </li>
            <?php endforeach;?>
            </ul>
            
            <div class="tab-content">
            
            <?php 
                foreach ($exams as $exam):
                    $this->db->where('exam_id' , $exam['exam_id']);
                    $this->db->where('student_id' , $student_id);
                    $marks = $this->db->get('mark')->result_array();
            ?>
                <div class="tab-pane" id="<?php echo $exam['exam_id'];?>">
                    <table class="table table-bordered responsive">
                        <thead>
                            <tr>
                                <th width="15%"><?php echo get_phrase('class');?></th>
                                <th><?php echo get_phrase('subject');?></th>
                                <th><?php echo "Class Score";?></th>
                                <th><?php echo "Exam Score";?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($marks as $mark):?>
                            <tr>
                                <td>
                                    <?php echo $this->db->get_where('class' , array(
                                        'class_id' => $mark['class_id']
                                    ))->row()->name;?>
                                </td>
                                <td>
                                    <?php echo $this->db->get_where('subject' , array(
                                        'subject_id' => $mark['subject_id']
                                    ))->row()->name;?>
                                </td>
                                <td><?php echo $mark['class_mark'];?></td>
                                <td><?php echo $mark['mark_obtained'];?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <a href="<?php echo base_url();?>index.php?parents/student_marksheet_print_view/<?php echo $student_id;?>/<?php echo $exam['exam_id'];?>" 
                        class="btn btn-primary" target="_blank">
                        <?php echo get_phrase('print_marksheet');?>
                    </a>
                </div>
            <?php endforeach;?>

            </div>
            
        </div>  
    
    </div>
</div>
<?php endforeach;?>