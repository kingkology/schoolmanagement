<style>
    .exam_chart {
    width           : 100%;
        height      : 265px;
        font-size   : 11px;
}
  
</style>

<?php 
    $student_info = $this->crud_model->get_student_info($student_id);
    $exams         = $this->crud_model->get_exams();
    foreach ($student_info as $row1):
    foreach ($exams as $row2):
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title"><?php echo $row2['name'];?></div>
            </div>
            <div class="panel-body">
                
                
               <div class="col-md-12">
                   <table class="table table-bordered">
                       <thead>
                        <tr>
                            <td style="text-align: center;">Subject</td>
                            <td style="text-align: center;">Class</td>
                            <td style="text-align: center;">Exams</td>
                            <td style="text-align: center;">Total mark</td>
                            <td style="text-align: center;">Grade</td>
                            <td style="text-align: center;">Comment</td>
                            <td style="text-align: center;">Position</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $total_marks = 0;
                            $total_grade_point = 0;
                            $subjects = $this->db->get_where('subject' , array('class_id' => $class_id))->result_array();
                            foreach ($subjects as $row3):
                        ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $row3['name'];?></td>
                                <td style="text-align: center;">
                                    <?php
                                        $obtained_mark_query = $this->db->get_where('mark' , array(
                                                    'subject_id' => $row3['subject_id'],
                                                        'exam_id' => $row2['exam_id'],
                                                            'class_id' => $class_id,
                                                                'student_id' => $student_id));
                                        if ( $obtained_mark_query->num_rows() > 0) {
                                            $marks = $obtained_mark_query->result_array();
                                            foreach ($marks as $row4) {
                                                echo $row4['class_mark'];
                                            }
                                        }
                                    ?>
                                </td>


                                 <td style="text-align: center;">
                                    <?php
                                        $obtained_mark_query = $this->db->get_where('mark' , array(
                                                    'subject_id' => $row3['subject_id'],
                                                        'exam_id' => $row2['exam_id'],
                                                            'class_id' => $class_id,
                                                                'student_id' => $student_id));
                                        if ( $obtained_mark_query->num_rows() > 0) {
                                            $marks = $obtained_mark_query->result_array();
                                            foreach ($marks as $row4) {
                                                echo $row4['mark_obtained'];
                                            }
                                        }
                                    ?>
                                </td>




                                  <td style="text-align: center;">
                                    <?php
                                        $obtained_mark_query = $this->db->get_where('mark' , array(
                                                    'subject_id' => $row3['subject_id'],
                                                        'exam_id' => $row2['exam_id'],
                                                            'class_id' => $class_id,
                                                                'student_id' => $student_id));
                                        if ( $obtained_mark_query->num_rows() > 0) {
                                            $marks = $obtained_mark_query->result_array();
                                            foreach ($marks as $row4) {
                                                echo $row4['mark_total'];
                                                $total_marks += $row4['mark_total'];
                                            }
                                        }
                                    ?>
                                </td>





                               <td style="text-align: center;">
                                    <?php
                                        if ($row4['mark_total'] >= 0 || $row4['mark_total'] != '') {
                                            $grade = $this->crud_model->get_grade($row4['mark_total']);
                                            echo $grade['name'];
                                        }
                                    ?>
                                </td>

                                <td style="text-align: center;">
                                    <?php
                                        if ($row4['mark_total'] >= 0 || $row4['mark_total'] != '') {
                                            $grade = $this->crud_model->get_grade($row4['mark_total']);
                                            echo $grade['comment'];
                                        }
                                    ?>
                                </td>

                                 <td style="text-align: center;">
                                     <?php
                                 $countz=1;
                                 $mastudid=$student_id;
        $this->db->where('exam_id' , $row2['exam_id']);
        $this->db->where('class_id' , $class_id);
        $this->db->where('subject_id' , $row3['subject_id']);
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
                    if ($row['student_id']==$student_id) 
                    {
                         echo $countz."st";
                    }
                }
                 if ($lastdigit=="2") 
                {
                       if ($row['student_id']==$student_id) 
                    {
                         echo $countz."nd";
                    }
                }
                 if ($lastdigit=="3") 
                {
                       if ($row['student_id']==$student_id) 
                    {
                        echo $countz."rd";
                    }
                    
                }
                 if ($lastdigit=="4") 
                {
                       if ($row['student_id']==$student_id) 
                    {
                        echo $countz."th";
                    }
                   
                }
                 if ($lastdigit=="5") 
                {
                       if ($row['student_id']==$student_id) 
                    {
                         echo $countz."th";
                    }
                   
                }
                 if ($lastdigit=="6") 
                {
                       if ($row['student_id']==$student_id) 
                    {
                          echo $countz."th";
                    }
                   
                }
                 if ($lastdigit=="7") 
                {
                       if ($row['student_id']==$student_id) 
                    {
                        echo $countz."th";
                    }
                    
                }
                
                 if ($lastdigit=="8") 
                {
                       if ($row['student_id']==$student_id) 
                    {
                        echo $countz."th";
                    }
                   
                }
                 if ($lastdigit=="9") 
                {
                       if ($row['student_id']==$student_id) 
                    {
                        echo $countz."th";
                    }
                    
                }
                 if ($lastdigit=="0") 
                {
                       if ($row['student_id']==$student_id) 
                    {
                         echo $countz."th";
                    }
                    
                }

                 if ($lasttwodigit=="11") 
                {
                     if ($row['student_id']==$student_id) 
                    {
                         echo $countz."th";
                    }
                }
                
            }
           
        }
        

                                    ?>
                                </td>

    

                                
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                   </table>

                   <hr />

                   <?php echo get_phrase('total_marks');?> : <?php echo $total_marks;?>
                   <br>
                   <?php echo get_phrase('average_grade_point');?> : 
                        <?php 
                            $this->db->where('class_id' , $class_id);
                            $this->db->from('subject');
                            $number_of_subjects = $this->db->count_all_results();
                            echo ($total_marks / $number_of_subjects);
                        ?>


                    <br> <br>
                    <a href="<?php echo base_url();?>index.php?teacher/student_marksheet_print_view/<?php echo $student_id;?>/<?php echo $row2['exam_id'];?>" 
                        class="btn btn-primary" target="_blank">
                        <?php echo get_phrase('print_marksheet');?>
                    </a>
               </div>

               
               
            </div>
        </div>  
    </div>
</div>
<?php
    endforeach;
        endforeach;
?>