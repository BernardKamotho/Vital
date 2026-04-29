<?php
    header('Content-type: text/plain');
    // include 'DBConnect.php';
    $dsn = 'mysql:dbname=cruddb; host=localhost;';
    $user = 'root';
    $password = '1234D!@#$';



try{
    $conn = new PDO($dsn, $user, $password);
}
catch(PDOException $e) {
    echo "END Contact Admin";
}

$phoneNumber = $_GET['phoneNumber'];
$sessionId = $_GET['sessionId'];
$serviceCode = $_GET['serviceCode'];
$user_response = $_GET['text'];

//show first menu if user_response is empty
//localhost/ussd_class/school.php?phoneNumber=0725455&sessionId=646464646&serviceCode=123&text=1*1*1
if ($user_response=="") {
    display_menu(); //level 0
}


$ussd_exploded_string = explode("*", $user_response);
$level = count($ussd_exploded_string);
//echo "level is $level\n";

if ($user_response!="" and $level > 0) {
switch ($ussd_exploded_string[0]) {
    case 1:
        login($ussd_exploded_string, $conn, $phoneNumber);
        break;
    case 2:
        $ussd_text = "Please select an option by pressing a number of the service you would like to access.";
        ussd_stop($ussd_text);
        break;    
 
    default:
        $ussd_text = "Invalid. Try Again";
        ussd_stop($ussd_text);
        break;
}//end

}//end

// //handle deposit
// //we need to check if user is logged in before proceeding
// if (count($ussd_exploded_string) > 2 and count($ussd_exploded_string) < 4) {
//    // session_start();
//     //if (!isset($_SESSION['user_id'])) {
//         // $ussd_text = "Session expired";
//         // ussd_stop($ussd_text);
//         $sql = "SELECT student_session_id FROM students_tbl WHERE student_id = ?";
//         $stmt = $conn->prepare($sql);
//         $stmt->execute(['1']);
//         $row = $stmt->fetch();
//         $count = $stmt->rowCount();
        
//         if ($count == 0) {
//             $ussd_text = "Session Expired^";
//             ussd_stop($ussd_text);
//         } 

//     //} 
//     else {
 
//         $user_id_fromdb = $row['student_session_id'];
//         switch ($ussd_exploded_string[2]) {
//             case 1:
//                 # Academic statements...
//                 $sql = "SELECT * FROM exams_tbl";
//                 $stmt = $conn->prepare($sql);
//                 $stmt->execute();
//                 $row = $stmt->fetchAll(); 
                
//                 $fTerm = "FIRST TERM EXAMS\n ";
//                 $fTerm .= "ENGLISH ".$row[0]["ex_english"]."\n ";
//                 $fTerm .= "MATHS ".$row[0]["ex_maths"]."\n ";
//                 $fTerm .= "CHEMISTRY ".$row[0]["ex_chemistry"]."\n ";
//                 $fTerm .= "BIOLOGY ".$row[0]["ex_biology"]."\n ";
//                 $fTerm .= "KISWAHILI ".$row[0]["ex_kiswahili"]."\n\n ";
//                 $fTerm .= "TOTAL ".$row[0]["ex_total"]."\n ";
//                 $fTerm .= $row[0]["ex_term"]."\n\n";

//                 $secondTerm = "SECOND TERM \n";
//                 $secondTerm .= "ENGLISH ".$row[1]["ex_english"]."\n ";
//                 $secondTerm .= "MATHS ".$row[1]["ex_maths"]."\n ";
//                 $secondTerm .= "CHEMISTRY ".$row[1]["ex_chemistry"]."\n ";
//                 $secondTerm .= "BIOLOGY ".$row[1]["ex_biology"]."\n ";
//                 $secondTerm .= "KISWAHILI ".$row[1]["ex_kiswahili"]."\n\n ";
//                 $secondTerm .= "TOTAL ".$row[1]["ex_total"]."\n ";
//                 $secondTerm .= $row[1]["ex_term"]."\n"; 
                
//                 $thirdTerm = "THIRD TERM \n";
//                 $thirdTerm .= "ENGLISH ".$row[2]["ex_english"]."\n ";
//                 $thirdTerm .= "MATHS ".$row[2]["ex_maths"]."\n ";
//                 $thirdTerm .= "CHEMISTRY ".$row[2]["ex_chemistry"]."\n ";
//                 $thirdTerm .= "BIOLOGY ".$row[2]["ex_biology"]."\n ";
//                 $thirdTerm .= "KISWAHILI ".$row[2]["ex_kiswahili"]."\n\n ";
//                 $thirdTerm .= "TOTAL ".$row[2]["ex_total"]."\n ";
//                 $thirdTerm .= $row[2]["ex_term"]."\n";

//                 $ussd_text = "$fTerm\n$secondTerm\n$thirdTerm";
//                 ussd_stop($ussd_text);
//                 break;
//             case 2:
//                 # Fee statements...
//                 $sql = "SELECT `fee_amount`, `date_paid` FROM `students_fees_tbl` WHERE `student_id` = ?";
//                 $stmt = $conn->prepare($sql);
//                 $stmt->execute([$user_id_fromdb]);
//                 $row = $stmt->fetch();            
//                 $ussd_text = "Your fee balance is ".$row[0]." KSHS  to be paid before $row[1].";
//                 ussd_stop($ussd_text);
//                 break;
//             case 3:
//                 # check balance...
//                 $sql = "SELECT event_body FROM events_tbl";
//                 $stmt = $conn->prepare($sql);
//                 $stmt->execute();
//                 $row = $stmt->fetchAll(); 
                
//                 $event = '';

//                 foreach($row as $value) {
//                     $event = $event.$value["event_body"]."\n";
//                 }

//                 $ussd_text = "The following are the school's events for the next term.\n$event";
//                 ussd_stop($ussd_text);
//                 break;  
//             case 4:
//                 # Fees structure...
//                 $sql = "SELECT fee_first_term, fee_second_term, fee_third_term, fee_year FROM fees_structure_tbl";
//                 $stmt = $conn->prepare($sql);
//                 $stmt->execute();
//                 $row = $stmt->fetchAll(); 
                
//                 $fees = '';

//                 // foreach($row as $value) {
//                 //     $fees = "1. FIRST TERM ". $fees.$value["fee_first_term"]."\n";
//                 //     $fees .= "2. SECOND TERM ". $fees.$value["fee_second_term"]."\n";
//                 //     $fees .= "3. THIRD TERM ". $fees.$value["fee_third_term"]."\n";
//                 //     $fees .= "4. ACADEMIC YEAR ". $fees.$value["fee_year"]."\n";
//                 // }
//                 $fTerm = "FIRT TERM ".$row[0]["fee_first_term"];
//                 $sTerm = "SECOND TERM ".$row[0]["fee_second_term"];
//                 $tTerm = "THIRD TERM ".$row[0]["fee_third_term"];
//                 $year = "ACADEMIC YEAR ".$row[0]["fee_year"];

//                 $ussd_text = "This is next year's fee structure.\n1. $fTerm\n2. $sTerm\n3. $tTerm\n4. $year\n";
//                 ussd_stop($ussd_text);
//                 break;
//             default:
//                 # code...
//                 break;
//         }
//     }
// }

// // if (count($ussd_exploded_string) == 4) {
// //     session_start();
// //     if (!isset($_SESSION['user_id'])) {
// //         $ussd_text = "Session expired";
// //         ussd_stop($ussd_text);
// //     } else{
// //         $amount_withdrawable = $ussd_exploded_string[3];

// //         $sql = "INSERT INTO withdrawals (account_id, withdraw_amount) VALUES (?,?)";
// //         $stmt = $conn->prepare($sql);
// //         $stmt->execute([$_SESSION['user_id'], $amount_withdrawable]);

// //         if ($stmt->errorCode() == 0) {
// //             $ussd_text = "You have withdrawn $amount_withdrawable";
// //             ussd_stop($ussd_text);
// //         } else {
// //             $ussd_text = "Error Occured During withdrawing. Tray Again later";
// //             ussd_proceed($ussd_text);
// //         }
// //     }
// // }

if (count($ussd_exploded_string) > 2 and $ussd_exploded_string[2]==1 and $ussd_exploded_string[0]==1) {
         register($ussd_exploded_string, $conn, $phoneNumber);    
}


else if (count($ussd_exploded_string) > 2 and $ussd_exploded_string[2]==2 and $ussd_exploded_string[0]==1) {
         check_birth($ussd_exploded_string, $conn, $phoneNumber);    
}

// else {
//     $ussd_text = "Invalid choice. Retry";
//     ussd_stop($ussd_text);
// }

//check birth
function check_birth($ussd_exploded_string, $conn, $phoneNumber){
if (count($ussd_exploded_string) == 3) {
$ussd_text = "Enter Notification No.";
ussd_proceed($ussd_text);
}

if (count($ussd_exploded_string) == 4) {
        $notification = $ussd_exploded_string[3];
        $sql = "SELECT * FROM birthcertificat_app_form WHERE notification_no = ? and 
        status = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$notification,'Approved']);
        $row = $stmt->fetch();

        $count = $stmt->rowCount();
        if ($count == 0) {
            $ussd_text = "Certificate Not Found/ or Not Approved";
            ussd_stop($ussd_text);
        } else if ($count == 1) {
                if ($stmt->errorCode() == 0) {
                    $url = "http://localhost/Vital/generate_pdf.php";
                    $postdata = http_build_query(
                        array(
                            'edit_notification_search' => $notification
                        )
                    );

                    $opts = array('http' =>
                        array(
                            'method'  => 'POST',
                            'header'  => 'Content-type: application/x-www-form-urlencoded',
                            'content' => $postdata
                        )
                    );

                    $context  = stream_context_create($opts);
                    $result = file_get_contents($url, false, $context);
                    $ussd_text = "Your Certificate has been Approved.";
                    ussd_stop($ussd_text);
                } else {
                    $ussd_text = "Error Occured During login. Tray Again later";
                    ussd_stop($ussd_text);
                }  
        } else {
            $ussd_text = "Contact admin";
            ussd_stop($ussd_text);
        }
    }
}//end check birth

//register birth
function register($ussd_exploded_string, $conn, $phoneNumber){
//reg code here
//connect to database
//request inputs from user
//trigger SQL to save.
if (count($ussd_exploded_string) == 3) {
$ussd_text = "Enter Child First name.";
ussd_proceed($ussd_text);
}
if (count($ussd_exploded_string) == 4) {
$ussd_text = "Enter Child Middle Name.";
ussd_proceed($ussd_text);
}

if (count($ussd_exploded_string) == 5) {
$ussd_text = "Enter Child Surname.";
ussd_proceed($ussd_text);
}

if (count($ussd_exploded_string) == 6) {
$ussd_text = "Enter Child DOB..i.e 2020-03-13";
ussd_proceed($ussd_text);
}
//http://localhost/Vital/school.php?phoneNumber=0725455&sessionId=646464646&serviceCode=123&text=1*2222*1*Wanyoike*Kanini*Mwangi*2020-07-15*Male*Twin*Central*Nyeri*3*0*Dead*Joseph%20Mwangi%20Maina*Stella%20Mwangi*Mugoiri*Parent*Uhai*Sosion*23232323*0756565656*Yes


if (count($ussd_exploded_string) == 7) {
$ussd_text = "Enter Gender Male or Female";
ussd_proceed($ussd_text);
}



if (count($ussd_exploded_string) == 8) {
$ussd_text = "Enter Type of Birth ...Single, Twin or Other";
ussd_proceed($ussd_text);
}



if (count($ussd_exploded_string) == 9) {
$ussd_text = "Enter Province of Birth";
ussd_proceed($ussd_text);
}


if (count($ussd_exploded_string) == 10) {
$ussd_text = "Enter District of Birth";
ussd_proceed($ussd_text);
}


if (count($ussd_exploded_string) == 11) {
$ussd_text = "Enter Prev. Babies born Alive to mother";
ussd_proceed($ussd_text);
}


if (count($ussd_exploded_string) == 12) {
$ussd_text = "Enter Prev. Babies born Dead to mother";
ussd_proceed($ussd_text);
}

if (count($ussd_exploded_string) == 13) {
$ussd_text = "Enter State of Birth. Dead.Alive";
ussd_proceed($ussd_text);
}


if (count($ussd_exploded_string) == 14) {
$ussd_text = "Enter Fathers Name";
ussd_proceed($ussd_text);
}


if (count($ussd_exploded_string) == 15) {
$ussd_text = "Enter Mothers Name";
ussd_proceed($ussd_text);
}


if (count($ussd_exploded_string) == 16) {
$ussd_text = "Enter Their Residence";
ussd_proceed($ussd_text);
}


if (count($ussd_exploded_string) == 17) {
$ussd_text = "Enter Capacity of Informant";
ussd_proceed($ussd_text);
}


if (count($ussd_exploded_string) == 18) {
$ussd_text = "Enter Registering Hospital";
ussd_proceed($ussd_text);
}


if (count($ussd_exploded_string) == 19) {
$ussd_text = "Enter Registrar Name";
ussd_proceed($ussd_text);
}


if (count($ussd_exploded_string) == 20) {
$ussd_text = "Enter Applicant ID";
ussd_proceed($ussd_text);
}

if (count($ussd_exploded_string) == 21) {
$ussd_text = "Enter Applicant Phone";
ussd_proceed($ussd_text);
}

if (count($ussd_exploded_string) == 22) {
$ussd_text = "Did applicant confirm Yes/No";
ussd_proceed($ussd_text);
}


if (count($ussd_exploded_string) == 23) {
//save to mysql
//mysqli, PDO.. PHP Daya Objects
 session_start();
$username = $_SESSION['username'];    
$cfname = $ussd_exploded_string[3];
$cmname = $ussd_exploded_string[4];
$csurname = $ussd_exploded_string[5];
$dob = $ussd_exploded_string[6];
$gender = $ussd_exploded_string[7];
$tob = $ussd_exploded_string[8];
$pob = $ussd_exploded_string[9];
$district = $ussd_exploded_string[10];
$balive = $ussd_exploded_string[11];
$bdead = $ussd_exploded_string[12];
$sob = $ussd_exploded_string[13];
$father_name = $ussd_exploded_string[14];
$mother_name = $ussd_exploded_string[15];
$residence = $ussd_exploded_string[16];
$capc_info = $ussd_exploded_string[17];
$reg_ass = $ussd_exploded_string[18];
$reg_name = $ussd_exploded_string[19];
$applicant_id = $ussd_exploded_string[20];
$applicant_phone = $ussd_exploded_string[21];
$applicant_confirm = $ussd_exploded_string[22];
$reg_date = date("y/m/d");


//http://localhost/crud/school.php?phoneNumber=0725455&sessionId=646464646&serviceCode=123&text=1*4545*2*john*kamau*mwangi*22/09.20*Male*2.45.44*Meru*mutuati*6*4*Dead*James%20kirimi*joyce%20karimi*kiirua*parent*nkubu%20mission*Odongo%20Caleb

$sql = "INSERT INTO `birthcertificat_app_form`(`cfname`, `cmname`, `csurname`, `dob`, `gender`, `tob`, `pob`, `district`, `balive`, `bdead`, `father_name`, `mother_name`, `residence`, `capc_info`, `reg_ass`, `reg_name`,
`applicant_idno`,`applicant_phone`,`applicant_confirm`,`who_saved`,`reg_date`,`sob`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->execute([$cfname, $cmname,$csurname, $dob, $gender,$tob,$pob,$district,$balive, $bdead, $father_name, $mother_name,$residence, $capc_info, $reg_ass, $reg_name, $applicant_id, $applicant_phone, $applicant_confirm, $username, $reg_date,$sob]);

if ($stmt->errorCode()==0) {
    $last_id = $conn->lastInsertId();
    $ussd_text = "Thank you Your details have been saved, Notification No. ".$last_id;
    ussd_stop($ussd_text);
} else {
    $ussd_text = "Error Occured During Registration. Tray Again later";
    ussd_proceed($ussd_text);
}
}//end
}//end


function login($ussd_exploded_string, $conn, $phoneNumber){
    //reg code here
    //connect to database
    //request inputs from user
    //trigger SQL to save.
    if (count($ussd_exploded_string) == 1) {
        $ussd_text = "Enter your pin Number";
        ussd_proceed($ussd_text);
    }
    if (count($ussd_exploded_string) == 2) {
        $pin_code = $ussd_exploded_string[1];
        $sql = "SELECT * FROM users WHERE ussd_pin = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$pin_code]);
        $row = $stmt->fetch();

        $count = $stmt->rowCount();
        if ($count == 0) {
            $ussd_text = "Login Failed";
            ussd_stop($ussd_text);
        } else if ($count == 1) {

                if ($stmt->errorCode() == 0) {
                    $username = $row['username'];

                    session_start();
                    $_SESSION['username'] = $username;
                    $ussd_text = "Welcome. You are about to register a new birth, Press \n1 Register A Birth.\n2 Check Birth.\n. Register Death";
                    ussd_proceed($ussd_text);
                } else {
                    $ussd_text = "Error Occured During login. Tray Again later";
                    ussd_proceed($ussd_text);
                }  
        } else {
            $ussd_text = "Contact admin";
            ussd_stop($ussd_text);
        }
    }
}//end


function display_menu(){
    $ussd_text = "Welcome to eVital  \n1.Login.";
    ussd_proceed($ussd_text);
}


# proceed and stop
function ussd_proceed($ussd_text){
    echo "CON $ussd_text";
}


function ussd_stop($ussd_text){
    echo "END $ussd_text";
}


?>