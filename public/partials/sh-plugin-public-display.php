<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://-
 * @since      1.0.0
 *
 * @package    Sh-Plugin
 * @subpackage sh-plugin/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="castx mb-10">
    <center>
        <div class="castx-wheel">
            <img src="../image/wheel-1@2x.png" class="hires castx-img" id="castx-img1" alt="">
            <img src="../image/wheel-2@2x.png" class="hires castx-img" id="castx-img2" alt="">
            <img src="../image/wheel-pointer@2x.png" class="hires img-blink castx-img" id="castx-img-pointer" alt=""
                style="display:none">
        </div>
    </center>
    <div class="castx-box">
        <div id="castx_result" class="castx-result"></div>
        <div class="castx-start"><input name="castx_start" type="button" value="เสี่ยงทาย" class="castx_start btn">
        </div>
    </div>

    <div class="cls"></div>

    <style>
    .castx {
        width: 100%;
        margin: 0px auto;
    }

    .castx-box {
        width: 100%;
        height: 140px;
    }

    .castx-wheel {
        width: 450px;
        height: 450px;
        position: relative;
    }

    .castx-img {
        width: 100%;
        height: 100%;
        top: 0px;
        left: 0px;
        position: absolute;
        user-select: none;
    }

    .castx-start {
        font-size: 1.2em;
        margin-top: 10px;
        text-align: center;
    }

    .castx-result {
        width: 100%;
        font-size: 1.2em;
        text-align: center;
    }

    @media (max-width:575px) {
        .castx-wheel {
            width: 350px;
            height: 350px;
        }
    }
    </style>
</div>