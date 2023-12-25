<?php
//include 'admin/class-sh-plugin-admin.php';

//$sh_plugin = new Sh_Plugin();

function css_checker(){
    ?>
    <style>
        .div1 {
        
        display: block;
        /* margin: auto; */
        background: rgb(0,0,0);
        background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(197,128,61,1) 50%, rgba(0,0,0,1) 100%);
        /*background: <!--?php $div1_background_color; ?-->;*/
        width: 100%;
        /* color: black; */
        color: pink;
        padding: 0px;
        padding-top: 25px;
        padding-bottom: 25px;    
        border-width: 20px;
        border-color: #80c0ec;
        transition: all 0.2s ease-in-out;
        border-radius: 0px;
        font-family: "Kanit", sans-serif;
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
        /* color: #ffc894; */
        color: yellow;
        font-family: "Kanit", sans-serif;
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
        font-family: "Kanit", sans-serif;
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
        font-family: "Kanit", sans-serif;
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
        font-family: "Kanit", sans-serif;
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
        font-family: "Kanit", sans-serif;
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
        font-family: "Kanit", sans-serif;
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
        font-family: "Kanit", sans-serif;
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
        font-family: "Kanit", sans-serif;
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
        font-family: "Kanit", sans-serif !important;
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
        font-family: "Kanit", sans-serif !important;
        }

        .swal2-title{
        font-size: 22px !important;
        font-family: "Kanit", sans-serif !important;
        }

        .swal2-popup{
        width: 90% !important;
        }
        }

        pre{
        font-family: "Kanit", sans-serif !important;
        }

        body{
        background: #000000;
        }

        div.flex-container{
        background: rgb(0,0,0);
        background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(52,30,8,1) 50%, rgba(0,0,0,1) 100%);
        }
    </style>
    <?php
}
