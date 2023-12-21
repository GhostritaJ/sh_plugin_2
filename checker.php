<!DOCTYPE html>
<html lang="th" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <meta name="HandheldFriendly" content="true">
        <link rel="stylesheet" href="checker.css?v=<?=  time()?>">
                <!-- Include SweetAlert2 CSS file -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

        <!-- Include SweetAlert2 JavaScript file -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

        <!-- font Kanit -->
        <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"/>
    

    <style>
        .div1 {

display: block;
/* margin: auto; */
background: rgb(0,0,0);
background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(197,128,61,1) 50%, rgba(0,0,0,1) 100%);
width: 100%;
color: white;
padding: 0px;
padding-top: 25px;
padding-bottom: 25px;    
border-width: 20px;
border-color: #80c0ec;
transition: all 0.2s ease-in-out;
border-radius: 0px;
font-family: 'Kanit', sans-serif;
display: flex;
justify-content: center;
align-items: center;
font-size: 40px;
line-height: 18px;
}

@media (max-width: 767px) {
.div1 {
    width: 100%;
    font-size: 24px;
    border-width: 10px;
}
}


.div2 {
text-align: center;
padding: 50px 1px 1px 1px;
color: #ffc894;
font-family: 'Kanit', sans-serif;
font-size: 26px;
width: 100%;
height: 20px;
margin: 0px auto;
background: rgb(0,0,0);
background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(52,30,8,1) 50%, rgba(0,0,0,1) 100%);
}

@media (max-width: 767px) {
.div2 {
    width: 100%;
    font-size: 16px;
    border-width: 10px;
    padding: 25px 1px 1px 1px;
}
}


.select-list {
display: flex;
flex-direction: row;
align-items: center;
justify-content: center;
/* เพิ่ม line นี้ */
font-family: 'kanit', sans-serif;
font-size: 20px;
width: 70%;
margin: 0 auto;
margin-top: 35px;

}


@media (max-width: 479px) {
form {
    width: 100%;
    font-size: 14px;
    flex-direction: column;
    align-items: center;
    margin-top: 24px;

}
}








label {
flex-basis: 100%;
margin-bottom: 2px;
}

input[type="number"],
select {
width: 50%;
padding: 7px;
margin-right: 50px;
box-sizing: border-box;
border: 2px solid #7a4c20;
border-radius: 70px;
font-size: 22px;
font-family: 'Kanit', sans-serif;
display: flex;
justify-content: center;
align-items: center;
color: #009ab9;

}




lottery {
font-size: 24px;
color: #7c7c7c;
font: weight 200px;
display: flex;
align-items: center;
justify-content: center;
margin-right: 25px;

}

@media (max-width: 767px) {
lottery {
    width: 100%;
    font-size: 18px;
    border-width: 10px;
    margin-right: 0px;
}
}

.lottery-forms {
display: block;
align-items: center;
justify-content: center;
margin-bottom: 20px;
}
.lotto_formss {
display: block;
background: #000000
}

.lotto_formss input{
margin: auto 0;
text-align: center;
}

.lottery-input {
font-size: 24px;
color: #422102;
font-weight: 200;
margin:auto;
width: 60%;
height: 50px;

}



.lottery-input input[type="text"] {
width: 100%;
height: 90%;
text-align: center;
font-size: 24px;
font-weight: bold;
color: #FFFFFF;
background: rgb(0,0,0);
background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(52,30,8,1) 50%, rgba(0,0,0,1) 100%);
font-family: 'Kanit', sans-serif;
justify-content: center;
align-items: center;
border: 2px solid #422102;
border-radius: 80px;
letter-spacing: 10px;
}

input::placeholder {
color: #d1d1d1;
letter-spacing: 0px;
}

@media only screen and (max-width: 600px) {
input::placeholder {
    font-size: 18px;
}
}




#lottery-input:valid {
background-color: #c5803d;
color: #422102;

}

.lottery-input input[type="text"]:focus {
outline: none;
border: 2px solid #c5803d;				/* สีขอบตอนกดที่ text-input */
box-shadow: 0 0 10px #c5803d;
}





.flex-container {
display: flex;
flex-wrap: wrap;
justify-content: center;
align-items: center;
margin: 50px 1px 40px 1px;
}

.month-select {
/* width: 100px;
margin-right: -10px;
flex: 0 0 auto;
font-size: 16px;
color: #7c7c7c; */
width: 150px;
flex: 0 0 auto;
font-size: 16px;
color: #7c7c7c;
background-color: #000000;
}

@media (max-width: 767px) {
.month-select {
    width: 57%;
    font-size: 16px;
    padding: 0;
    margin-left: -25px;
    padding: 7px;
}
}

.label-year {
width: 100px;
margin-right: 10px;
font-size: 20px;
font-family: 'Kanit', sans-serif;
display: flex;
justify-content: center;
align-items: center;
color: #7c7c7c;
flex: 0 0 auto;
}

@media (max-width: 767px) {
.label-year {
    width: 20%;
    font-size: 16px;
    padding: 0;
    margin-left: 30px;


}
}


.label-month {
width: 100px;
margin-right: 10px;
font-size: 20px;
font-family: 'Kanit', sans-serif;
display: flex;
justify-content: center;
align-items: center;
color: #7c7c7c;
flex: 0 0 auto;
}

@media (max-width: 767px) {
.label-month {
    width: 35%;
    font-size: 16px;
    padding: 0;
    margin: 10px;
}
}

.year-select {
width: 100px;
flex: 0 0 auto;
font-size: 16px;
color: #7c7c7c;
background-color: #000000;
}

@media only screen and (max-width: 600px) {
.year-select {
    width: 55%;
    font-size: 16px;
    padding: 7px;
    margin: 0;
    
}
}


button {
background: rgb(0,0,0);
background: linear-gradient(45deg, rgba(0,0,0,1) 0%, rgba(122,76,32,1) 21%, rgba(47,24,2,1) 49%, rgba(197,128,61,1) 75%, rgba(0,0,0,1) 100%);
/* box-shadow: 0 0 10px #9f9f9f; */
align-items: center;
color: #fff;
font-size: 28px;
padding: 5px 70px;
margin-bottom: 40;
border-radius: 0px;
font-family: 'Kanit', sans-serif;
display: flex;
justify-content: center;
align-items: center;
/* border-width: 4px;
border-color: #80c0ec; */
transition: all 0.2s ease-in-out;
/* text-shadow: 2px 1px 8px #044263 */
border: 0px solid black!important;
}

@media screen and (max-width: 768px) {
button {
    font-size: 20px;
    padding: 5px 50px;
}

button:focus {
    background: rgb(187, 255, 253);
    background: linear-gradient(297deg, rgba(187, 255, 253, 1) 11%, rgba(41, 132, 180, 1) 31%, rgba(0, 95, 181, 1) 64%, rgba(46, 184, 200, 1) 100%);
    color: #ffffff;
    box-shadow: 0 0 30px #ebd58b;
    transform: scale(0.9);
}

button:hover {                                  /* สีเมื่อเมาส์ชี้ (hover) ไปที่ปุ่ม */
    background-color: #2980b9;
}

button:active {                                 /* สีเมื่อปุ่มถูกกด (active) */
    background: rgb(174,136,84);
    background: linear-gradient(45deg, rgba(174,136,84,1) 0%, rgba(235,213,139,1) 51%, rgba(142,82,10,1) 100%);
}

body {
    background-color: rgb(201, 201, 201);
    background: linear-gradient(90deg, rgba(201, 201, 201, 1) 0%, rgba(255, 255, 255, 1) 19%, rgba(255, 255, 255, 1) 49%, rgba(255, 255, 255, 1) 80%, rgba(201, 201, 201, 1) 100%);
    font-family: 'Kanit', sans-serif;
    background: #ffffff;
    color: #34495e;
}
}



@media (min-width: 200rem) {
.column {
  float: left;
  padding-left: 1rem;
  padding-right: 1rem;
}

.column.full { width: 100%; }
.column.two-thirds { width: 66.7%; }
.column.half { width: 50%; }
.column.third { width: 33.3%; }
.column.fourth { width: 25%; }
.column.flow-opposite { float: right; }  
}

.flex-item {
display: flex;
flex-direction: row;
align-items: center;
width: 50%;  /* Adjust as needed */
margin: 10px 0;
}

.label-year, .label-month {
margin-right: 20px;
}

@media (max-width: 600px) {
.flex-item {
    width: 100%;  /* Stack items vertically on small screens */
}
}

.swal2-header{
display: flex;
flex-direction: column;
align-items: center;
padding: 0 1em !important;
font-family: 'Kanit', sans-serif !important;
}

@media (max-width: 600px) {
.swal2-header{
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0 0.1em !important;
}

.swal2-content{
    font-size: 18px !important;
    padding: 0 0.1em !important;
    /*color: yellow !important;*/
    font-family: 'Kanit', sans-serif !important;
}

.swal2-title{
    font-size: 22px !important;
    font-family: 'Kanit', sans-serif !important;
}

.swal2-popup{
    width: 90% !important;
}
}

pre{
font-family: 'Kanit', sans-serif !important;
}

body{
background: #000000;
}

div.flex-container{
background: rgb(0,0,0);
background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(52,30,8,1) 50%, rgba(0,0,0,1) 100%);
}
    </style>
    </head>
    <body>

    <?php
        define("GLO_URL","https://www.glo.or.th/api/checking/getcheckLotteryResult");

        function check_reward($data){
            // check if $data is a JSON object
            if (is_object($data)) {
                // check if the `statusType` key exists 
                if (isset($data->statusType) && isset($data->status_data)) {
                    // do something
                    if($data->statusType === 1) {
                        // ถูกรางวัล
                        return "ยินดีด้วยค่ะ คุณพี่ถูก ".$data->status_data[0]->reward;
                    }else{
                        // ถูกหวยกิน
                        return "เสียใจด้วยจ้าา คุณพี่ถูกหวยกิน";
                    }

                    return "ระบบกำลังดำเนินการ";
                }
            }
            return "ระบบกำลังดำเนินการ";
        }

        function bulk_check_lotto($day,$month,$year,$numbers){

            $date = $year.'-'.$month.'-'.$day;
            $data = array(
                'number' => array(),
                'period_date' => $date
            );
            
            if(is_array($numbers)){
                
                foreach($numbers as $number){
                    // Add Lottery Number to array
                    if(isset($number) && gettype($number) == 'string' && strlen($number) > 0){
                       //var_dump($number);
                       $payload = array(
                            "lottery_num" => $number,
                        );
                        $data['number'][] = $payload;
                    }
                    
                 }
            }
            
            //var_dump($data);
            // Convert the POST data to JSON format
            $jsonData = json_encode($data);

            // Set up cURL
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, GLO_URL);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Length: ' . strlen($jsonData),
                'Content-Type: application/json;charset=utf-8',
                'Origin: https://www.glo.or.th',
                'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Safari/605.1.15',
                'Referer: https://www.glo.or.th/mission/reward-payment/check-reward'
            ));

            $response = curl_exec($ch);
            $err = curl_error($ch);

            curl_close($ch);

            if ($err) {
                echo "cURL Error #:" . $err;
            }

            return $response;

        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
            $day = $_POST['datemonth'];
            $result_day = explode("-" , $day);
            $aday = $result_day[0];
            $month = $result_day[1];
            $year = $_POST['year'] - 543;
            $number = $_POST['lottery'];

            if(is_array($number)){
              
                    //print_r($number);
                    $response = bulk_check_lotto($aday, $month, $year, $number);

                    $result_data = json_decode($response);
                    $output = "";

                    // echo "<pre>";
                    // var_dump($result_data);
                    // echo "</pre>";

                    foreach ($result_data->response->result as $lotto_result){
                        //var_dump($lotto_result);
                        $re_msg = check_reward($lotto_result);
                        $day1 = substr("$lotto_result->date",8,10);
                        $month1 = substr("$lotto_result->date",5,-3);
                        $year1 = substr("$lotto_result->date",0,4)+543;
                        $output .= "งวดวันที่ : ".$day1."-".$month1."-".$year1;
                        $output .= "<br>";
                        $output .= "เลขที่ตรวจ : ".$lotto_result->number;
                        $output .= "<br>";
                        if($re_msg=="ยินดีด้วยค่ะ คุณพี่ถูก รางวัลข้างเคียงรางวัลที่ 1"){
                            $re_msg="ยินดีด้วยค่ะ คุณถูก"."<br>"."รางวัลข้างเคียงรางวัลที่ 1";
                        }else if($re_msg=="เสียใจด้วยจ้าา คุณพี่ถูกหวยกิน"){
                            $re_msg="เสียใจด้วยค่ะ คุณไม่ถูกรางวัล";
                        }else if($re_msg=="ยินดีด้วยค่ะ คุณพี่ถูก รางวัลที่ 1"){
                            $re_msg="ยินดีด้วยค่ะ คุณถูก รางวัลที่ 1";
                        }else if($re_msg=="ยินดีด้วยค่ะ คุณพี่ถูก รางวัลที่ 2"){
                            $re_msg="ยินดีด้วยค่ะ คุณถูก รางวัลที่ 2";
                        }else if($re_msg=="ยินดีด้วยค่ะ คุณพี่ถูก รางวัลที่ 3"){
                            $re_msg="ยินดีด้วยค่ะ คุณถูก รางวัลที่ 3";
                        }else if($re_msg=="ยินดีด้วยค่ะ คุณพี่ถูก รางวัลที่ 4"){
                            $re_msg="ยินดีด้วยค่ะ คุณถูก รางวัลที่ 4";
                        }else if($re_msg=="ยินดีด้วยค่ะ คุณพี่ถูก รางวัลที่ 5"){
                            $re_msg="ยินดีด้วยค่ะ คุณถูก รางวัลที่ 5";
                        }
                        
                        $output .= "ผลการตรวจสอบ : "."<br>".$re_msg;
                        $output .= "<br>"."<br>";
                        $output .= "===============<br>";
                        
                    }
                    //echo $output;
                    echo '<script>';
                    echo 'Swal.fire({
                        title: "ผลการตรวจสลากกินแบ่งรัฐบาล",
                        html: "<pre>' . $output . '</pre>",
                        confirmButtonText: "ตกลง",
                        imageUrl: "lotto_logo.png",
                        imageWidth: 75,
                        imageHeight: 75,
                        imageAlt: "Custom image",
                        customClass: {
                            popup: "format-pre"
                        },
                        width: "75%",
                    });';
                    echo '</script>';
                
                
            }
        }
    ?>

        <div class="div1" style="font-weight: bold;">ตรวจผลสลากกินแบ่งรัฐบาล</div>
        <div class="div2">ตรวจผลรางวัล จากหมายเลขสลากงวดประจำวันที่</div>
        
        <div class="flex-container">
            
            <form method="post" action="" style="display:flex">
                <div class="flex-item">
                        <label for="year" class="label-year">พ.ศ.</label>
                        <select id="year" name="year" class="year-select" onchange="work_flow()" required>
                            <option value="">--โปรดเลือก--</option>
                            <option value="2548">2548</option>
                            <option value="2549">2549</option>
                            <option value="2550">2550</option>
                            <option value="2551">2551</option>
                            <option value="2552">2552</option>
                            <option value="2553">2553</option>
                            <option value="2554">2554</option>
                            <option value="2555">2555</option>
                            <option value="2556">2556</option>
                            <option value="2557">2557</option>
                            <option value="2558">2558</option>
                            <option value="2559">2559</option>
                            <option value="2560">2560</option>
                            <option value="2561">2561</option>
                            <option value="2562">2562</option>
                            <option value="2563">2563</option>
                            <option value="2564">2564</option>
                            <option value="2565">2565</option>
                            <option value="2566">2566</option>
                        </select>
                </div>
                <div class="flex-item">
                        <label for="datemonth" class="label-month">วัน-เดือน</label>
                        <select id="datemonth" name="datemonth" class="month-select" required>
                            <?php 
                                            echo "<option value='' selected>--โปรดเลือก--</option>";
                                            for($i=$yearNow;$i>2548;$i--){  
                                                $responseYear[$i] = select_for_show($i);   
                                                                                          // value year
                                                for($j=count($responseYear[$i])-1;$j>=0;$j--){   
                                                    $rpDay[$i][$j] = substr($responseYear[$i][$j],0,2); 
                                                    $rpADay = $rpDay[$i][$j];
                                                    $rpMonth[$i][$j] = substr($responseYear[$i][$j],2,2);
                                                    $rpMonthInt = intval( $rpMonth[$i][$j]);
                                                    $idxMonth = $rpMonthInt -1;
                                                    //$datas[$i][$j] = list_price_win($i, $rpMonth[$i][$j], $rpDay[$i][$j]);
                                                    //if($rpMonthInt==)
                                                    
                                                        if(($i==$yearNow) && ($j==count($responseYear[$i])-1)){
                                                            echo "<option data-parent='$i' value='$rpADay,$rpMonthInt'>
                                                            $rpADay".' / '."$monthTh[$idxMonth]
                                                            </option>"; ?><br><?php
                                                        }
                                                        // else{
                                                        //     echo "<option data-parent='$i' value='$rpADay,$rpMonthInt'>
                                                        //     $rpADay".' / '."$monthTh[$idxMonth]
                                                        // </option>"; ?><br><?php
                                                        // }
                                                      
                                                }    
                                            }
                            ?>
                        </select>
                </div>
                
        </div>

        <div class="lottery-forms">
            
                <div class= "lotto_formss">
                
                    <lottery>เลขสลาก 1</lottery>
                    <div class="lottery-input">
                        <input type="text" name="lottery[]" id="lottery-input" placeholder="กรอกเลขสลาก 6 หลัก" pattern="[0-9]{6}" required>
                    </div>
               
                    <lottery style="padding-top: 2em;">เลขสลาก 2</lottery>
                    <div class="lottery-input" >
                        <input type="text" name="lottery[]" id="lottery-input" placeholder="กรอกเลขสลาก 6 หลัก" pattern="[0-9]{6}">
                    </div>
                
                    <lottery style="padding-top: 2em;">เลขสลาก 3</lottery>
                    <div class="lottery-input" >
                        <input type="text" name="lottery[]" id="lottery-input" placeholder="กรอกเลขสลาก 6 หลัก" pattern="[0-9]{6}">
                    </div>
                    </div>
                </div>
                <div style="padding-top: 2em;">
                    <button type="submit" name="submit" value="submit" style="margin:0 auto;">
                        ตรวจรางวัล
                    </button>
                </div>
                </form>
        </div>
</body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    async function get_datemonth(){
        let year = document.getElementById("year").value;
        console.log(year);
        const url = 'https://thai-lottery1.p.rapidapi.com/gdpy?year='+year;
        const options = {
            method: 'GET',
            headers: {
                'X-RapidAPI-Key': '713e163f73msh40587892542f9b9p16c69cjsna750c32b9201',         //'X-RapidAPI-Key': 'be72945233msha7f60a56f8df87ep18f7bcjsn366b4116954e',
                'X-RapidAPI-Host': 'thai-lottery1.p.rapidapi.com'                               //'X-RapidAPI-Host': 'thai-lottery1.p.rapidapi.com'
            }
        };

        try {
            const response = await fetch(url, options);
            const date_months = await response.json();
            //console.log(date_months);
            return date_months
        } catch (error) {
            console.error(error);
        }
    }

    function add_option_element(date){
        /*
        *   date : parameter format `16042566`
        */
       // console.log("add_option_element")
       // console.log(date);
        const monthTh = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];

        let selectElement = document.getElementById("datemonth");
        const newOption = document.createElement("option"); // Create a new option element
        let day = date.substr(0,2)
        let text_month = monthTh[parseInt(date.substr(2,2))-1]
        newOption.value = day + "-"+date.substr(2,2); // Set the value of the new option
        newOption.text = day + "-"+text_month; // Set the text of the new option
        selectElement.add(newOption); // Append the new option to the select element's options collection
        
    }

    function work_flow(){
        // Clear Datemonth options
        document.getElementById("datemonth").options.length = 0

        get_datemonth().then( date_months => {
            //console.log("Result ")
            //console.log(date_months);
            date_months.forEach( date => {
                add_option_element(date);

            })

        })

    }
</script>
</html>
