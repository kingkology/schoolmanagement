<?php
	$student_info	=	$this->crud_model->get_student_info($param2);
	foreach($student_info as $row1):
?>
<center>
	<div style="font-size: 20px;font-weight: 200;margin: 10px;"><?php echo $row1['name'];?></div>

<div class="panel-group joined" id="accordion-test-2">

	<?php 
	/////SEMESTER WISE RESULT, RESULTSHEET FOR EACH SEMESTER SEPERATELY
	$toggle = true;
	$exams	=	$this->crud_model->get_exams();
	foreach($exams as $row0):
							
	$total_grade_point	=	0;
	$total_marks		=	0;
	$total_subjects		=	0;
	?>
    <div class="panel panel-default">
            <div class="panel-heading">
            		<h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapse<?php echo $row0['exam_id'];?>">
                    <i class="entypo-rss"></i>  <?php echo $row0['name'];?>
                </a>
                </h4>
            </div>
            
            
    
        <div id="collapse<?php echo $row0['exam_id'];?>" class="panel-collapse collapse <?php if($toggle){echo 'in';$toggle=false;}?>" >
            <div class="panel-body">
            <center>
              <table class="table table-bordered " >
                    <thead>
                        <tr>
                             <th>Subject</th>
                                            <th>Class</th>
                                            <th>Exams</th>
                                            <th>Total mark</th>
                                            <th>Grade</th>
                                             <th>Comment</th>
                                              <th>Position</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $subjects	=	$this->crud_model->get_subjects_by_class($row1['class_id']);
                        foreach($subjects as $row2):
                        $total_subjects++;
                        ?>
                        <tr>
                            <td><?php echo $row2['name'];?></td>
                             <td>
                                                    <?php
                                                    //obtained marks
                                                    $verify_data = array('exam_id' => $row0['exam_id'],
                                                        'class_id' => $row1['class_id'],
                                                        'subject_id' => $row2['subject_id'],
                                                        'student_id' => $row1['student_id']);

                                                    $query = $this->db->get_where('mark', $verify_data);
                                                    $marks = $query->result_array();
                                                    foreach ($marks as $row3):
                                                        echo $row3['class_mark'];
                                                       
                                                    endforeach;
                                                    ?>
                                                </td>
                           <td>
                                                    <?php
                                                    //obtained marks
                                                    $verify_data = array('exam_id' => $row0['exam_id'],
                                                        'class_id' => $row1['class_id'],
                                                        'subject_id' => $row2['subject_id'],
                                                        'student_id' => $row1['student_id']);

                                                    $query = $this->db->get_where('mark', $verify_data);
                                                    $marks = $query->result_array();
                                                    foreach ($marks as $row3):
                                                        echo $row3['mark_obtained'];
                                                        $mark_obtained[] = $row3['mark_obtained'];
                                                    endforeach;
                                                    ?>
                                                </td>
                           <td>
                                                    <?php
                                                    //obtained marks
                                                    $verify_data = array('exam_id' => $row0['exam_id'],
                                                        'class_id' => $row1['class_id'],
                                                        'subject_id' => $row2['subject_id'],
                                                        'student_id' => $row1['student_id']);

                                                    $query = $this->db->get_where('mark', $verify_data);
                                                    $marks = $query->result_array();
                                                    foreach ($marks as $row3):
                                                        echo $row3['mark_total'];
                                                        $total_marks += $row3['mark_total'];
                                                    endforeach;
                                                    ?>
                                                </td>

                                                <td>
                                                    <?php
                                                    $grade = $this->crud_model->get_grade($row3['mark_total']);
                                                    echo $grade['comment'];
                                                    $total_grade_point += $grade['grade_point'];
                                                    ?>
                                                </td>
                                                 <td style="text-align: center;">
                                     <?php
                                 $countz=1;
                                 $mastudid=$row1['student_id'];
                                
        $this->db->where('exam_id' , $row0['exam_id']);
        $this->db->where('class_id' , $row1['class_id']);
        $this->db->where('subject_id' , $row2['subject_id']);
        $this->db->order_by('mark_total', 'DESC');
        $highest_markstot = $this->db->get('mark')->result_array();

        foreach($highest_markstot as $row) 
        {
           
            if ($row['mark_total']!=$row4['mark_total']) 
            {
               $countz+=1;
            }
            else
            {
                $lastdigit = $countz%10;
                $lasttwodigit = $countz%100;
                if ($lastdigit=="1" && $lasttwodigit!="11") 
                {
                    if ($row['student_id']==$mastudid) 
                    {
                         echo $countz."st";
                    }
                }
                 if ($lastdigit=="2") 
                {
                       if ($row['student_id']==$mastudid) 
                    {
                         echo $countz."nd";
                    }
                }
                 if ($lastdigit=="3") 
                {
                       if ($row['student_id']==$mastudid) 
                    {
                        echo $countz."rd";
                    }
                    
                }
                 if ($lastdigit=="4") 
                {
                       if ($row['student_id']==$mastudid) 
                    {
                        echo $countz."th";
                    }
                   
                }
                 if ($lastdigit=="5") 
                {
                       if ($row['student_id']==$mastudid) 
                    {
                         echo $countz."th";
                    }
                   
                }
                 if ($lastdigit=="6") 
                {
                       if ($row['student_id']==$mastudid) 
                    {
                          echo $countz."th";
                    }
                   
                }
                 if ($lastdigit=="7") 
                {
                       if ($row['student_id']==$mastudid) 
                    {
                        echo $countz."th";
                    }
                    
                }
                
                 if ($lastdigit=="8") 
                {
                       if ($row['student_id']==$mastudid) 
                    {
                        echo $countz."th";
                    }
                   
                }
                 if ($lastdigit=="9") 
                {
                       if ($row['student_id']==$mastudid) 
                    {
                        echo $countz."th";
                    }
                    
                }
                 if ($lastdigit=="0") 
                {
                       if ($row['student_id']==$mastudid) 
                    {
                         echo $countz."th";
                    }
                    
                }

                 if ($lasttwodigit=="11") 
                {
                     if ($row['student_id']==$mastudid) 
                    {
                         echo $countz."th";
                    }
                }
                
            }
           
        }
        

                                    ?>
                                </td>
                                                <td></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <hr />
                                Total Marks : <?php echo $total_marks; ?>
                                <hr />
                                GPA(grade point average) : <?php echo round($total_marks / $total_subjects, 2); ?>
                                
                            </center>
            </div>
      	</div>
    </div>
    <?php endforeach;?>
  </div>
</center>
<?php endforeach;?>