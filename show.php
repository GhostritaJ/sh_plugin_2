    <head>
        <?php require(dirname(__FILE__) . '/../../../wp-config.php'); ?>
   
            <?php 
                    set_time_limit(400);
            ?>

        <!-- font Kanit -->
        <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"/>

        <!--link href="bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"-->

        <style>
            .loading {
                position: fixed;
                top: 15%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: rgba(255, 255, 255, 0.8);
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
                display: none;
            }

            .lds-dual-ring {
                display: inline-block;
                width: 80px;
                height: 80px;
                margin-top: -50px;
            }
            .lds-dual-ring:after {
                content: " ";
                display: block;
                width: 64px;
                height: 64px;
                margin: 8px;
                border-radius: 50%;
                border: 6px solid #cef;
                border-color: #cef transparent #cef transparent;
                animation: lds-dual-ring 1.2s linear infinite;
            }
            @keyframes lds-dual-ring {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
            }

        </style>
        
        <?php
            $plugin_name = "Sh_Plugin_Checker";
            $version = "1.2";
            $sh_plugin = new Sh_Plugin_Public($plugin_name, $version);
            $sh_plugin->css_shower();

            date_default_timezone_set('asia/bangkok');                  
            $year = date('Y');                                  // 2023,2024
            $month = date('m');
            $day = date('d');
            //echo $day.$month;
            if($day<16 && $month==1){
                //echo '000';
                $yearNow = intval($year)+543-1;
            }else{
                $yearNow = intval($year)+543;
            }
            //echo $yearNow;
            
        ?>

        <?php
            function select_for_show($yearNow) {

                $curl = curl_init();
            
                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://thai-lottery1.p.rapidapi.com/gdpy?year=$yearNow",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => [
                        "X-RapidAPI-Host: thai-lottery1.p.rapidapi.com",
                        "X-RapidAPI-Key: be72945233msha7f60a56f8df87ep18f7bcjsn366b4116954e",
                        "content-type: application/octet-stream"
                    ],
                ]);
            
                $response = curl_exec($curl);
                $err = curl_error($curl);
                //print_r($response);
            
                curl_close($curl);

                $fileName = "output_".$yearNow.".txt";
                $files;
                //echo '123';

                if($response==NULL){
                    $curl = curl_init();
                    
                    curl_setopt_array($curl, [
                        CURLOPT_URL => "https://thai-lottery1.p.rapidapi.com/gdpy?year=$yearNow-1",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => [
                            "X-RapidAPI-Host: thai-lottery1.p.rapidapi.com",
                            "X-RapidAPI-Key: be72945233msha7f60a56f8df87ep18f7bcjsn366b4116954e",
                            "content-type: application/octet-stream"
                        ],
                    ]);
            
                    $response = curl_exec($curl);
                    $err = curl_error($curl);
                    //print_r($response);
                
                    curl_close($curl);

                    if(file_exists($fileName) && is_array($response)){
                        
                        if (($response !== file_get_contents($fileName))&&(is_array($response))) {
                            
                            // บันทึกข้อมูลในไฟล์
                            file_put_contents($fileName, $response);
                            //echo $files;
                            // ตรวจสอบว่าบันทึกสำเร็จหรือไม่
                            if (file_exists($fileName)) {
                                
                                echo "Download link: <a href='$fileName' download>Download File</a>";
                            } else {
                                echo "Failed to save data to file.";
                            }
                        } else {
                            echo "Data is the same, no need to download.";
                        }
                    }else if(is_array($response)){
                        file_put_contents($fileName, $response);
                        echo "บันทึกข้อมูลเรียบร้อยแล้วในไฟล์ $fileName";
                    }
                }else{
                    if(file_exists($fileName) && is_array($response)){
                    
                        if (($response !== file_get_contents($fileName))&&(is_array($response))) {
                            
                            // บันทึกข้อมูลในไฟล์
                            file_put_contents($fileName, $response);
                            //echo $files;
                            // ตรวจสอบว่าบันทึกสำเร็จหรือไม่
                            if (file_exists($fileName)) {
                                
                                echo "Download link: <a href='$fileName' download>Download File</a>";
                            } else {
                                echo "Failed to save data to file.";
                            }
                        } else {
                            echo "Data is the same, no need to download.";
                        }
                    }else if(is_array($response)){
                        file_put_contents($fileName, $response);
                        echo "บันทึกข้อมูลเรียบร้อยแล้วในไฟล์ $fileName";
                    }
                }

                if ($err) {
                    return "cURL Error #:" . $err;
                } else {
                    //var_dump($response);
                    $data = json_decode($response, true); // แปลง JSON เป็น associative array
                    //var_dump($data);
                    if (is_array($data)) {
                        // ถ้า $data เป็น array ให้ทำการ loop และสร้าง HTML ตาราง
                        
                        return $data;
                    } else {
                        // ถ้า $data ไม่ใช่ array ให้ส่ง error message กลับไปแสดงผล
                        return "Error: Cannot decode JSON response from API.";
                    }
                }

                
                //return $data;
            }
            
            function list_price_win($year, $month, $day){
                    //$url = 'https://thai-lottery1.p.rapidapi.com/?date=16052564';

                    $payload = sprintf("%02d%02d%4d",$day,$month,$year);
                    $url = 'https://thai-lottery1.p.rapidapi.com/?date='.$payload;
                    $options = array(
                        'http' => array(
                            'header' => "X-RapidAPI-Key: be72945233msha7f60a56f8df87ep18f7bcjsn366b4116954e\r\n" .
                                        "X-RapidAPI-Host: thai-lottery1.p.rapidapi.com\r\n"
                        )
                    );
                    $context = stream_context_create($options);
                    $response = file_get_contents($url, false, $context);
                    $data = json_decode($response, true);

                    return $data;
            }

           
        ?>
    </head>
            
    <body class="homesh blog wide" onload="ativeShowPage()">
        <div id="page" class="hfeed site">
            <div id="main" class="clearfix">
                <?php
                    
                    $responseYear = array();
                    $responseYears = array();
                    $fileName = "output.txt";
                    $files = file_get_contents($fileName);
                    $array_files = json_decode($files);
                    //print_r($array_files);
                    $monthTh = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
                                "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
 
                    $i = $yearNow;
                    $responseYear[$i] = select_for_show($i);            // value year
                    //$responseYears = print_r($array_files);
                    //echo count($array_files);
                    
                    //echo count($responseYear[$yearNow]);
                    //var_dump($responseYear);
                    //var_dump($array_files);
                    if($responseYear[$i] == NULL){
                        
                        for($j=count($array_files)-1;$j>=0;$j--){   
                            //echo $i;
                            $rpDay[$i][$j] = substr($array_files[$j],0,2); 
                            $rpADay = $rpDay[$i][$j];
                            $rpMonth[$i][$j] = substr($array_files[$j],2,2);
                            $rpMonthInt = intval( $rpMonth[$i][$j]);
                            $idxMonth = $rpMonthInt -1;
                        }
                    }else{
                        for($j=count($array_files)-1;$j>=0;$j--){   
                            $rpDay[$i][$j] = substr($array_files[$j],0,2); 
                            $rpADay = $rpDay[$i][$j];
                            $rpMonth[$i][$j] = substr($array_files[$j],2,2);
                            $rpMonthInt = intval( $rpMonth[$i][$j]);
                            $idxMonth = $rpMonthInt -1;
                    }
                    }
                    
                    

                ?>
                <?php
                    $lastLotto = count($array_files)-1;
                    //$lastLotto = count($responseYear[$yearNow])-1;
                    //echo $lastLotto;
                    $datas[$yearNow][$lastLotto] = list_price_win($yearNow, $rpMonth[$yearNow][$lastLotto], $rpDay[$yearNow][$lastLotto]);
                    $dataNow = $datas[$yearNow][$lastLotto];
                ?>

                        <div class="table-responsive">
                            <table id="reward1" class="easy-table easy-table-default table" style="font-weight: bold;">
                                <caption>
                                    <?php
                                        if(isset($_POST['check_lotto_btn'])){
                            
                                            // echo "Event submit;";
                                                $days = $_POST['datemonth'];
                                                //$daymonth = explode(",", $_POST['day']);
                                                $daymonth = explode("-", $days);
                                                //print_r($daymonth);
                                                $day = intval($daymonth[0]);
                                                $month = intval($daymonth[1]);
                                                $AmonthTh = $monthTh[$month-1];
                                                $year = $_POST['year'];
                                                //DEbug
                                                ?><td class="myBox"><?php
                                                echo 'งวด '.$day." ".$AmonthTh." ".$year;   
                                                $dataNow = list_price_win($year,$month,$day); 
                                                ?></td><?php 
                                        }else{
                                            $daymonth[0] = $rpDay[$yearNow][$lastLotto];
                                            $daymonth[1] = $rpMonth[$yearNow][$lastLotto];
                                            $day = intval($daymonth[0]);
                                            $month = intval($daymonth[1]);
                                            $AmonthTh = $monthTh[$month-1];
                                            $year = $yearNow;
                                            //DEbug
                                            ?><td class="myBox"><?php
                                            echo 'งวด '.$day." ".$AmonthTh." ".$year;   
                                            ?></td><?php 
                                        }
                                    ?>
                                </caption>
                            </table>
                        </div>
                    <table class="table table-hover text-nowrap" id="attribute_table">
                        
                        <form method="post" action="" onsubmit="showLoad()">
                            <h3 class="widget-title">
                                <thead class="head-date">
                                    <tr>
                                        <th>ปี</th>
                                        <th>วัน / เดือน</th>
                                    </tr>
                                </thead>
                                <tr id="row1">
                                    <td>
                                        <select id="year" name="year" class="select_year" onchange="work_flow()" required>
                                            <?php
                                                echo "<option value='' selected>ปี</option>";
                                                // Generate options for year dropdown
                                                for ($i = $yearNow; $i > 2555; $i--) {                              //หาค่าปีแล้วดึงมาใส่ซะ
                                                    if($i == $yearNow){
                                                        //$j = $i - 543;
                                                        echo "<option class='selects' value='$i'>$i</option>";
                                                    }
                                                    else if($i != intval($yearNow)){
                                                        //$j = $i - 543;
                                                        echo "<option class='selects' value='$i'>$i</option>";
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="datemonth" id="datemonth" class="select_date_month" required>
                                            <?php 
                                                echo "<option value='' selected>วัน / เดือน</option>";
                                                for($i=$yearNow;$i>2565;$i--){  
                                                    $responseYear[$i] = select_for_show($i);   
                                                                                              // value year
                                                    for($j=count($responseYear[$i])-1;$j>=0;$j--){   
                                                        $rpDay[$i][$j] = substr($responseYear[$i][$j],0,2); 
                                                        $rpADay = $rpDay[$i][$j];
                                                        $rpMonth[$i][$j] = substr($responseYear[$i][$j],2,2);
                                                        $rpMonthInt = intval( $rpMonth[$i][$j]);
                                                        $idxMonth = $rpMonthInt -1;
                                                    }    
                                                }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="form-group" >
                                            <button type="submit" name="check_lotto_btn" value="submit" title="ดูเลขถูกรางวัล" class="btnsh" onclick="">ดูเลขถูกรางวัล</button>
                                        </div>
                                        
                                        <?php
                                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['check_lotto_btn'])) {
                                                // ตรวจสอบเงื่อนไขหรือทำตามการเลือกวันที่ตามความเหมาะสม
                                                
                                                if (isset($_POST['year']) && isset($_POST['datemonth'])) {
                                                    $selectedYear = $_POST['year'];
                                                    $selectedMonth = $_POST['datemonth'];

                                                    // ทำสิ่งที่คุณต้องการตามเงื่อนไข
                                                    // ...

                                                    // เช่น เรียกใช้ฟังก์ชัน work_flow_loading();
                                                    //work_flow_loading();
                                                    
                                                }
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="lds-dual-ring" id="preLoader"></div>
                                    </td>
                                    
                                </tr>
                            </h3>
                        </form>
                            
                            
                                    <div class="textwidget custom-html-widget">
                                        <div class="entry-content">
                                            <div class="table-responsive">
                                                <table id="reward1" class="table1">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <caption class="myDivH">
                                                                    <div class="md-text">รางวัลที่ 1</div>
                                                                    <br />
                                                                    <div class="sm-text">มี 1 รางวัลๆละ 6,000,000 บาท</div>
                                                                </caption>
                                                            </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody id="info">
                                                        <tr>
                                                            <td /*class="myDiv"*/ style="font-size: 40px; letter-spacing: 20px;"><b><?php echo $dataNow[0][1]; ?></b></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                            <div class="table-responsive">
                                                <table id="reward-3front-3back-2back" class="table1">
                                                    <thead>
                                                        <tr>
                                                            <th class="myDivH" colspan="2" style="width: 40%; color: #fff; font-weight: normal!important;">
                                                                <div class="md-text">เลขหน้า3ตัว</div>
                                                                <br>
                                                                <div class="sm-text xxx">มี 2 รางวัลๆละ 4,000 บาท</div>
                                                            </th>
                                                            <th class="myDivH" colspan="2" style="width: 40%; color: #fff; font-weight: normal!important;">
                                                                <div class="md-text" style="height: 6px;">เลขท้าย3ตัว</div>
                                                                <br>
                                                                <div class="sm-text xxx">มี 2 รางวัลๆละ 4,000 บาท</div>
                                                            </th>
                                                            <th class="myDivH" colspan="1" style="width: 20%; color: #fff; font-weight: normal!important;">
                                                                <div class="md-text">เลขท้าย2ตัว</div>
                                                                <br>
                                                                <div class="sm-text xxx">มี 2 รางวัลๆละ 4,000 บาท</div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="myDiv" style="font-size: 20px; letter-spacing: 3px;"><b><?php echo $dataNow[1][1]; ?></b></td>
                                                            <td class="myDiv" style="font-size: 20px; letter-spacing: 3px;"><b><?php echo $dataNow[1][2]; ?></b></td>
                                                        
                                                            <td class="myDiv" style="font-size: 20px; letter-spacing: 3px;"><b><?php echo $dataNow[2][1]; ?></b></td>
                                                            <td class="myDiv" style="font-size: 20px; letter-spacing: 3px;"><b><?php echo $dataNow[2][2]; ?></b></td>

                                                            <td class="myDiv" style="font-size: 20px; letter-spacing: 3px;"><b><?php echo $dataNow[3][1]; ?></b></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="nearreward1" class="table1">
                                                    <thead>
                                                        <td>
                                                            <caption class="myDivH">
                                                                <div class="md-text" style="height: 6px;"><?php echo $dataNow[4][0]; ?></div>
                                                                <br/>
                                                                <div class="sm-text" style="height: 24px;">มี 2 รางวัลๆละ 100,000 บาท</div>
                                                            </caption>
                                                        </td>
                                                    </thead>
                                                    
                                                    <tbody style="font-weight: normal!important;">
                                                        <tr>
                                                            <td class="myDiv" style="font-size: 20px; letter-spacing: 7px;"><?php echo $dataNow[4][1]; ?></td>
                                                            <td class="myDiv" style="font-size: 20px; letter-spacing: 7px;"><?php echo $dataNow[4][2]; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="reward2" class="table1">
                                                    <caption class="myDivH">
                                                        <div class="md-text" style="height: 6px;">ผลสลาก รางวัลที่ 2</div>
                                                        <br/>
                                                        <div class="sm-text" style="height: 24px;">มี 5 รางวัลๆละ 200,000 บาท</div>
                                                    </caption>
                                                    <tbody style="font-weight: normal!important;">
                                                        <tr>
                                                            <td class="myDiv"><?php echo $dataNow[5][1]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[5][2]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[5][3]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[5][4]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[5][5]; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="reward3" class="table1">
                                                    <caption class="myDivH">
                                                        <div class="md-text">ผลสลาก รางวัลที่ 3</div><br/><div class="sm-text">มี 10 รางวัลๆละ 80,000 บาท</div>
                                                    </caption>
                                                    <tbody style="font-weight: normal!important;">
                                                        <tr>
                                                            <td class="myDiv"><?php echo $dataNow[6][1]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[6][2]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[6][3]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[6][4]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[6][5]; ?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td class="myDiv"><?php echo $dataNow[6][6]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[6][7]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[6][8]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[6][9]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[6][10]; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="reward4" class="table1">
                                                    <caption class="myDivH">
                                                        <div class="md-text">ผลสลาก รางวัลที่ 4</div><br/><div class="sm-text">มี 50 รางวัลๆละ 40,000 บาท</div>
                                                    </caption>
                                                    <tbody style="font-weight: normal!important;">
                                                        <?php
                                                            for($i=0;$i<50;$i=$i+10){
                                                        ?>
                                                        <tr>
                                                            <td class="myDiv"><?php echo $dataNow[7][1+$i]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[7][2+$i]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[7][3+$i]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[7][4+$i]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[7][5+$i]; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="myDiv"><?php echo $dataNow[7][6+$i]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[7][7+$i]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[7][8+$i]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[7][9+$i]; ?></td>
                                                            <td class="myDiv"><?php echo $dataNow[7][10+$i]; ?></td>
                                                        </tr>
                                                        <?php
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="reward5" class="table1">
                                                    <caption class="myDivH">
                                                        <div class="md-text">ผลสลาก รางวัลที่ 5</div><br/><div class="sm-text">มี 100 รางวัลๆละ 20,000 บาท</div>
                                                    </caption>
                                                    <tbody style="font-weight: normal!important;">
                                                        <?php
                                                            for($i=0;$i<100;$i=$i+20){
                                                        ?>
                                                            <tr>
                                                                <td class="myDiv"><?php echo $dataNow[8][1+$i]; ?></td>
                                                                <td class="myDiv"><?php echo $dataNow[8][2+$i]; ?></td>
                                                                <td class="myDiv"><?php echo $dataNow[8][3+$i]; ?></td>
                                                                <td class="myDiv"><?php echo $dataNow[8][4+$i]; ?></td>
                                                                <td class="myDiv"><?php echo $dataNow[8][5+$i]; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="myDiv"><?php echo $dataNow[8][6+$i]; ?></td>
                                                                <td class="myDiv"><?php echo $dataNow[8][7+$i]; ?></td>
                                                                <td class="myDiv"><?php echo $dataNow[8][8+$i]; ?></td>
                                                                <td class="myDiv"><?php echo $dataNow[8][9+$i]; ?></td>
                                                                <td class="myDiv"><?php echo $dataNow[8][10+$i]; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="myDiv"><?php echo $dataNow[8][11+$i]; ?></td>
                                                                <td class="myDiv"><?php echo $dataNow[8][12+$i]; ?></td>
                                                                <td class="myDiv"><?php echo $dataNow[8][13+$i]; ?></td>
                                                                <td class="myDiv"><?php echo $dataNow[8][14+$i]; ?></td>
                                                                <td class="myDiv"><?php echo $dataNow[8][15+$i]; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="myDiv"><?php echo $dataNow[8][16+$i]; ?></td>
                                                                <td class="myDiv"><?php echo $dataNow[8][17+$i]; ?></td>
                                                                <td class="myDiv"><?php echo $dataNow[8][18+$i]; ?></td>
                                                                <td class="myDiv"><?php echo $dataNow[8][19+$i]; ?></td>
                                                                <td class="myDiv"><?php echo $dataNow[8][20+$i]; ?></td>
                                                            </tr>
                                                        <?php
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                    </div>
                     
                        
            </div>
        </div>
    </body>    
        
        <link rel="stylesheet" href="https://www.lottery.co.th/style.min2020.css" type="text/css"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>
            $('#year').bind('change', function () {
                var parent = $(this).val();
                console.log(parent)
                $('#day').children().each(function () {
                    if ($(this).data('parent') != parent) {
                        $(this).hide();
                    } else
                        $(this).show();
                });
            });
        </script>

<script>
    async function get_datemonth(){
        let year = document.getElementById("year").value;
        console.log(year);
        const url = 'https://thai-lottery1.p.rapidapi.com/gdpy?year='+year;
        const options = {
            method: 'GET',
            headers: {
                'X-RapidAPI-Key': 'be72945233msha7f60a56f8df87ep18f7bcjsn366b4116954e',
                'X-RapidAPI-Host': 'thai-lottery1.p.rapidapi.com'
            }
        };

        try {
            const response = await fetch(url, options);
            const date_months = await response.json();
            return date_months
        } catch (error) {
            console.error(error);
        }
    }

    function add_option_element(date){
        const monthTh = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];

        let selectElement = document.getElementById("datemonth");
        const newOption = document.createElement("option");
        let day = date.substr(0,2)
        let text_month = monthTh[parseInt(date.substr(2,2))-1]
        newOption.value = day + "-"+date.substr(2,2);
        newOption.text = day + "-"+text_month;
        selectElement.add(newOption);
    }

    function work_flow(){
        document.getElementById("datemonth").options.length = 0

        get_datemonth().then( date_months => {
            date_months.forEach( date => {
                add_option_element(date);
            })
        })
    }

    $('#year').bind('change', function () {
        var parent = $(this).val();
        $('#day').children().each(function () {
            if ($(this).data('parent') != parent) {
                $(this).hide();
            } else
                $(this).show();
        });

        work_flow(); // เพิ่มเรียกใช้ฟังก์ชัน work_flow() เมื่อมีการเลือกปีใหม่
    });

    function work_flow_loading() {
        // ตรวจสอบเงื่อนไขหรือทำตามการเลือกวันที่ตามความเหมาะสม
        // ...

        // แสดง loading element เมื่อเริ่มต้นโหลดข้อมูล
        document.querySelector('.loading').style.display = 'block';

        // ส่ง AJAX request เพื่อดึงข้อมูลหรือทำการตรวจสอบ
        // ...

        // ซ่อน loading element เมื่อโหลดข้อมูลเสร็จสิ้น
        document.querySelector('.loading').style.display = 'none';
    }

    $(document).ready(function() {
        $('#check_lotto_btn').click(function() {
            work_flow_loading();
        });
    });

    function ativeShowPage(){
        let content = setTimeout(showPage, 500);
    }

    function showPage(){
        document.getElementById('preLoader').style.display = 'none';
    }

    function showLoad(){
        document.getElementById('preLoader').style.display = 'block';
    }

</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- This website is like a Rocket, isn't it? Performance optimized by WP Rocket. Learn more: https://wp-rocket.me - Debug: cached@1681173548 -->
