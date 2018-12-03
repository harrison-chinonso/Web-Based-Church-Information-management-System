<?php
//insert.php
include '../core/init.php';
$link = new mysqli('localhost', 'root','', 'dc_okota_db');
$id = $_SESSION['id'];
        $namearray = referal($id);
        $name = $namearray[0];
        $rol = $namearray[1];
        $area = $namearray[2];
        $page = getpage();

if ($page === "daysreport.php") {
        if(isset($_POST["first_name"])){
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $letter_deliver = $_POST["letter_deliver"];
        $date_deliver = $_POST["date_deliver"];
        $signed = $_POST["signed"];
        $visited = $_POST["visited"];
        $date_visited = $_POST["date_visited"];
        $query = '';
        for($count = 0; $count<count($first_name); $count++)
        {
        $first_name_clean = sanitize($first_name[$count]);
        $last_name_clean = sanitize($last_name[$count]);
        $letter_deliver_clean = sanitize($letter_deliver[$count]);
        $date_deliver_clean = sanitize($date_deliver[$count]);
        $signed_clean = sanitize($signed[$count]);
        $visited_clean = sanitize($visited[$count]);
        $date_visited_clean = sanitize($date_visited[$count]);
                if($first_name_clean != '' && $last_name_clean != '' && $letter_deliver_clean != '' && $date_deliver_clean != '' && $signed_clean != '' && $visited_clean != '' && $date_visited_clean != '')
                {
                $query .= "
                UPDATE follow_tb  SET letter_delievered = '".$letter_deliver_clean."', date_of_delievery = '".$date_deliver_clean."', sign_copy_returned = '".$signed_clean."', visited = '".$visited_clean."', date_of_visit = '".$date_visited_clean."' 
                WHERE firstname = '".$first_name_clean."' AND lastname = '".$last_name_clean."'; 
                ";
                }
        }
                if($query != '')
                {
                        if(mysqli_multi_query($link, $query))
                        {
                        echo 'Record Updated';
                        }
                        else
                        {
                        echo 'Error';
                        }
                }
                else
                {
                echo 'All Fields are Required';
                }
        }
}
else if ($page === "month.php") {
        if(isset($_POST["first_name"])){
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $sectime = $_POST["sectime"];
        $cell = $_POST["cell"];
        $enc = $_POST["enc"];
        $dcabasic = $_POST["dcabasic"];
        $mat = $_POST["mat"];
        $dept = $_POST["dept"];
        $disciple = $_POST["disciple"];
        $query = '';
        for($count = 0; $count<count($first_name); $count++)
        {
        $first_name_clean = sanitize($first_name[$count]);
        $last_name_clean = sanitize($last_name[$count]);
        $sectime_clean = sanitize($sectime[$count]);
        $cell_clean = sanitize($cell[$count]);
        $enc_clean = sanitize($enc[$count]);
        $dcabasic_clean = sanitize($dcabasic[$count]);
        $disciple_clean = sanitize($disciple[$count]);
        $dept_clean = sanitize($dept[$count]);
        $mat_clean = sanitize($mat[$count]);
       
                if($first_name_clean != '' && $last_name_clean != '' && $sectime_clean != '' && $cell_clean != '' && $enc_clean != '' && $dcabasic_clean != '' && $mat_clean != '')
                {
                $query .= "
                UPDATE follow_tb  SET 2ndtime = '".$sectime_clean."', joined_cell = '".$cell_clean."', enc = '".$enc_clean."', joined_dca = '".$dcabasic_clean."', joined_mat = '".$mat_clean."', 
                joined_dept = '".$dept_clean."', joined_disciple = '".$disciple_clean."' WHERE firstname = '".$first_name_clean."' AND lastname = '".$last_name_clean."'; 
                ";
                }
        }
                if($query != '')
                {
                        if(mysqli_multi_query($link, $query))
                        {
                        echo 'Record Updated';
                        }
                        else
                        {
                        echo 'Error';
                        }
                }
                else
                {
                echo 'All Fields are Required';
                }
        }
}
else if ($page === "Hoursreport.php") {
       
        if(isset($_POST["first_name"])){
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $letter_recieved = $_POST["letter_recieved"];
        $letter_sentout = $_POST["letter_sentout"];
        $responsible = $_POST["responsible"];
        $responsibleNo = $_POST["responsibleNo"];
        $cell_leader = $_POST["cell_leader"];
        $cell = $_POST["cell"];
        $query = '';
        for($count = 0; $count<count($first_name); $count++)
        {
        $first_name_clean = sanitize($first_name[$count]);
        $last_name_clean = sanitize($last_name[$count]);
        $letter_recieved_clean = sanitize($letter_recieved[$count]);
        $letter_sentout_clean = sanitize($letter_sentout[$count]);
        $responsible_clean = sanitize($responsible[$count]);
        $responsibleNo_clean = sanitize($responsibleNo[$count]);
        $cell_leader_clean = sanitize($cell_leader[$count]);
        $cell_clean = sanitize($cell[$count]);
                if($first_name_clean != '' && $last_name_clean != '' && $letter_recieved_clean != '' && $letter_sentout_clean != '' && $responsible_clean != '' && $responsibleNo_clean != '' && $cell_leader_clean != '' && $cell_clean != '')
                {
                $query .= "
                UPDATE follow_tb  SET letter_recieved = '".$letter_recieved_clean."', letter_sentout = '".$letter_sentout_clean."', person_responsible = '".$responsible_clean."', person_responsible_phone = '".$responsibleNo_clean."', cell_leader = '".$cell_leader_clean."' 
                WHERE firstname = '".$first_name_clean."' AND lastname = '".$last_name_clean."'; 
                ";
                }
        }
                if($query != '')
                {
                        if(mysqli_multi_query($link, $query))
                        {
                                for($count = 0; $count<count($first_name); $count++)
                                {
                                    $cell_clean = sanitize($cell[$count]);
                                        $query .= " 
                                        UPDATE mvp_tb  SET cell = '".$cell_clean."' WHERE firstname = '".$first_name_clean."' AND lastname = '".$last_name_clean."';";        
                                }        
                                        if(mysqli_query($link, $query)){
                                                echo 'Record Updated';
                                        }
                                        else
                                        {
                                        echo 'Error';
                                        }
                        }
                }
                else
                {
                echo 'All Fields are Required';
                }
        }
}

else if ($page === "mvpreport.php") {

        if(isset($_POST["first_name"])){
                                        $date = $_POST["date"];
					$first_name = $_POST["first_name"];
					$last_name = $_POST["last_name"];
					$area = $_POST["area"];
					$letter_prepared = $_POST["letter_prepared"];
					$letter_collected = $_POST["letter_collected"];
					$call = $_POST["call"];
					$sms = $_POST["sms"];
					$query = '';
					for($count = 0; $count<count($first_name); $count++)
					{
					$first_name_clean = sanitize($first_name[$count]);
					$last_name_clean = sanitize($last_name[$count]);
					$letter_prepared_clean = sanitize($letter_prepared[$count]);
					$letter_collected_clean = sanitize($letter_collected[$count]);
					$call_clean = sanitize($call[$count]);
					$sms_clean = sanitize($sms[$count]);
					$area_clean = sanitize($area[$count]);
                if($first_name_clean != '' && $last_name_clean != '' && $letter_prepared_clean != '' && $letter_collected_clean != '' && $call_clean != '' && $sms_clean != '' && $area_clean != '')
                {
              echo  $query .= "
                UPDATE follow_tb  SET letter_prepared = '".$letter_prepared_clean."', letter_collected = '".$letter_collected_clean."', called = '".$call_clean."', sms = '".$sms_clean."', area = '".$area_clean."' 
                WHERE firstname = '".$first_name_clean."' AND lastname = '".$last_name_clean."'; 
                ";
                }
        }
                if($query != '')
                {
                        if(mysqli_multi_query($link, $query))
                        {
                        echo 'Record Updated';
                        }
                        else
                        {
                        echo 'Error';
                        }
                }
                else
                {
                echo 'All Fields are Required';
                }
        }
}
else if ($page === "dcabasic.php") {
    if(isset($_GET["first_name"])) {
        $reg_no = $_GET["reg_no"];
        $score = $_GET["score"];
        $course = $_GET["course"];  
        $query = '';
        for($count = 0; $count<count($reg_no); $count++)
        {
        $reg_no_clean = sanitize($reg_no[$count]);
        $score_clean =  sanitize($score[$count]);
        $course_clean = sanitize($course[$count]);
       
                if($reg_no_clean != '' && $score_clean != '' && $course_clean != '')
                {
              $query .= "
                UPDATE dca_score_tb  SET ".$course_clean." = '".$score_clean."' WHERE DCAreg_no = '".$reg_no_clean."'; 
                ";
                }
        }
                if($query != '')
                {
                        if(mysqli_multi_query($link, $query))
                        {
                        echo 'Record Updated';
                        }
                        else
                        {
                        echo 'Error';
                        }
                }
                else
                {
                echo 'All Fields are Required';
                }
        }
    else if(isset($_GET["basic"])) {
                $id = sanitize($_GET["basic"]);
                $graddate = sanitize($_GET["graddate"]);
                $soul = sanitize($_GET["soul"]); 
                $query = '';
               
                if($id != '' && $graddate != '' && $soul != '')
                        {
                      $query .= "
                        UPDATE consolidation_db  SET basic_end = '".$graddate."', soul_won = '".$soul."' WHERE reg_no = '".$id."'; 
                        ";
                     $query .= "
                        UPDATE member_tb  SET dcabasic = '".$graddate."' WHERE DCAreg_no = '".$id."'; 
                        ";
                        }
                }
                   if($query != '')
                        {
                                if(mysqli_multi_query($link, $query))
                                {
                                echo 'Record Updated';
                                }
                                else
                                {
                                echo 'Error';
                                }
                        }
                    else
                        {
                         echo 'All Fields are Required';
                        }
}
else if ($page === "dcamat.php") {
        if(isset($_GET["first_name"])) {
            $reg_no = $_GET["reg_no"];
            $score = $_GET["score"];
            $course = $_GET["course"];  
            $query = '';
            for($count = 0; $count<count($reg_no); $count++)
            {
            $reg_no_clean = sanitize($reg_no[$count]);
            $score_clean = sanitize($score[$count]);
            $course_clean = sanitize($course[$count]);
           
                    if($reg_no_clean != '' && $score_clean != '' && $course_clean != '')
                    {
                  $query .= "
                    UPDATE dca_score_tb  SET ".$course_clean." = '".$score_clean."' WHERE DCAreg_no = '".$reg_no_clean."'; 
                    ";
                    }
            }
                    if($query != '')
                    {
                            if(mysqli_multi_query($link, $query))
                            {
                            echo 'Record Updated';
                            }
                            else
                            {
                            echo 'Error';
                            }
                    }
                    else
                    {
                    echo 'All Fields are Required';
                    }
            }
        else if(isset($_GET["maturity"])) {
                    $id = sanitize($_GET["maturity"]);
                    $graddate = sanitize($_GET["graddate"]);
                    $followup = sanitize($_GET["followup"]);
                    $responsibility = sanitize($_GET["responsibility"]); 
                    $query = '';
                   
                            if($id != '' && $graddate != '' && $followup != '' && $responsibility != '')
                            {
                          $query .= "
                            UPDATE consolidation_db  SET mat_end = '".$graddate."', follow_up = '".$followup."',responsibility = '".$responsibility."' WHERE reg_no = '".$id."'; 
                            ";
                         $query .= "
                            UPDATE member_tb  SET mat = '".$graddate."' WHERE DCAreg_no = '".$id."'; 
                            ";
                            }
                    }
                            if($query != '')
                            {
                                    if(mysqli_multi_query($link, $query))
                                    {
                                    echo 'Record Updated';
                                    }
                                    else
                                    {
                                    echo 'Error';
                                    }
                            }
                            else
                            {
                            echo 'All Fields are Required';
                            }
}
else if ($page === "dli.php") {
        if(isset($_GET["first_name"])) {
                $reg_no = $_GET["reg_no"];
                $date = $_GET["date"];
                $query = '';
                
                for($count = 0; $count<count($reg_no); $count++)
                {
                $reg_no_clean = sanitize($reg_no[$count]);
                $date_clean = sanitize($date[$count]);
                
                        if($reg_no_clean != '' && $date_clean != '')
                        {
                        $query .= "
                        UPDATE consolidation_db  SET dli_session = '".$date_clean."' WHERE reg_no = '".$reg_no_clean."'; 
                        ";
                        $query .= "
                        UPDATE member_tb  SET dli = '".$date_clean."' WHERE DCAreg_no = '".$reg_no_clean."'; 
                        ";
                        }
        }
                        if($query != '')
                {
                                if(mysqli_multi_query($link, $query))
                                {
                                echo 'Record Updated';
                                }
                                else
                                {
                                echo 'Error';
                                }
                        }
                        else
                        {
                        echo 'All Fields are Required';
                        }
}
}
else if ($page === "enc.php") {
	if(isset($_GET["first_name"])) {
			$reg_no = $_GET["reg_no"];
			$date = $_GET["date"];
			$query = '';
			
			for($count = 0; $count<count($reg_no); $count++)
			{
			$reg_no_clean = sanitize($reg_no[$count]);
			$date_clean = sanitize($date[$count]);
			
                                if($reg_no_clean != '' && $date_clean != '')
                                {
                                $query .= "
                                UPDATE consolidation_db  SET enc_session = '".$date_clean."' WHERE reg_no = '".$reg_no_clean."'; 
                                ";
                                $query .= "
                                UPDATE member_tb  SET enc = '".$date_clean."' WHERE DCAreg_no = '".$reg_no_clean."'; 
                                ";
                                }
                        }
                                if($query != '')
                                {
                                        if(mysqli_multi_query($link, $query))
                                        {
                                        echo 'Record Updated';
                                        }
                                        else
                                        {
                                        echo 'Error';
                                        }
                                }
                                else
                                {
                                echo 'All Fields are Required';
                                }
	}
}
else if ($page === "registerstudents.php") {   
   if(isset($_GET["names"])){
        $names = $_GET["names"];
        $phone = $_GET["phone"];
        $area = $_GET["area"];
        $reg_no = $_GET["reg_no"];
        $regdate = $_GET["regdate"];
        $field = sanitize($_GET["field"]);   
        $query = '';
        for($count = 0; $count<count($names); $count++)
        {
        $names_clean = sanitize($names[$count]);
        $phone_clean = sanitize($phone[$count]);
        $area_clean = sanitize($area[$count]);
        $reg_no_clean = sanitize($reg_no[$count]);
        $regdate_clean = sanitize($regdate[$count]);


	   if($names_clean != '' && $phone_clean != '' && $area_clean != '' && $reg_no_clean != ''&& $regdate_clean != '' && $field == 'mat_start')
                {
                echo	$query .= "
                                 UPDATE consolidation_db SET ".$field." = '".$regdate_clean."' WHERE reg_no = '".$reg_no_clean."'; 
                                ";
                                }
                else if($names_clean != '' && $phone_clean != '' && $area_clean != '' && $reg_no_clean != ''&& $regdate_clean != '' && $field == 'basic_start')
                {
              $query .= "
                UPDATE member_tb  SET DCAreg_no = '".$reg_no_clean."' WHERE phone = '".$phone_clean."'; 
                ";
              $query .= "
                INSERT INTO dca_score_tb (DCAreg_no) VALUES ('".$reg_no_clean."'); 
                ";
              $query .= "
                INSERT INTO consolidation_db (reg_no,$field,area) VALUES ('".$reg_no_clean."','".$regdate_clean."','".$area_clean."'); 
                ";
								}
             }
                if($query != '')
                {
                        if(mysqli_multi_query($link, $query))
                        {
                        echo 'Record Updated';
                        }
                        else
                        {
                        echo 'Error';
                        }
                }
                else
                {
                echo 'All Fields are Required';
                }
       }
}
?>