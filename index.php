<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IPL 2016 | Get IPLFIE</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="croppie.css" />
    <script type="text/javascript" src="js/script.js"></script>

</head>

<body <?php 
 if(!empty($_POST['bmw']) and !empty($_POST['team']) and !empty($_POST['hidden1']))
 {
    echo 'onload="displayMessage();"'; } ?> >
    <div class="banner">
        <div class="navbar">
            <a href="" class="header" ><img style="width:130px; padding:12px;" src="IPL.png"></a>
            <a href="http://getzeal.esy.es/" class="link">IPL<strong>FEVER</strong></a>
        </div>
    </div>
    <div class="content">
        <div class="col" id="text">
            <h1 id="greeting">Get The<br> IPL Feel</h1>
            <p id="supplement">Upload your profile pic to get your exclusive <strong> &nbsp;IPL_Fie .</strong><br>
            </p>
            <sub># Feel The IPL Fever!!</sub>
            <form name="myform" style="<?php if(!empty($_POST['bmw']) and !empty($_POST['team'])) { echo "display:none;"; } ?>" action="" method="POST">
            <input type="hidden" name="hidden1" id="hidden1"/>
            <input type="submit" style="display:none;" name="bmw" id="bmw"><br><br>
            <label>Select Your Favourite Team</label>
            <select name="team" style="padding:8px; margin:50px 0 0 20px;" >
            <option value="1">Mumbia Indians</option> 
            <option value="2">Kolkata Knight Riders</option>
            <option value="3">Kings XI Punjab</option>
            <option value="4">Royal Challenge Bangaluru</option>
            <option value="5">Rising Pune</option>
            <option value="6">Gujrat Lions</option>
            <option value="7">Sunrise Hyderabad</option>
            <option value="8">Delhi Daredevils</option>
        </select>   
</form>
        </div>

        <?php

        if(!empty($_POST['bmw']) and !empty($_POST['team']))
        {


            @$data= $_POST['hidden1'];
            $data =substr($data, 22);
            $data = base64_decode($data);
            @$myimage = imagecreatefromstring($data);
            $pa=rand(1000,19999);
            $path='uploads/'.$pa.'.jpg';
            imagejpeg($myimage,$path);

            $myimage= imagecreatefromjpeg($path);

            $team=$_POST['team'];
            $logow=0;
            $logoh=0;
            if($team==1)
            {
            $myimagez= imagecreatefrompng('MI.png');
            $logow=120;
            $logoh=80;
            }
            elseif ($team==2) {
            $myimagez= imagecreatefrompng('KK.png');
            $logow=80;
            $logoh=120;
            }
            elseif ($team==3) {
            $myimagez= imagecreatefrompng('KXIP.png');
            $logow=80;
            $logoh=120;
            }
            elseif ($team==4) {
            $myimagez= imagecreatefrompng('RCB.png');
            $logoh=100;
            $logow=120;
            }
            elseif ($team==5) {
            $myimagez= imagecreatefrompng('RP.png');
            $logow=120;
            $logoh=80;
            }                        
            elseif ($team==6) {
            $myimagez= imagecreatefrompng('GL.png');
            $logow=80;
            $logoh=120;
            }
            elseif ($team==7) {
            $myimagez= imagecreatefrompng('SR.png');
            $logow=120;
            $logoh=80;
            }
            elseif ($team==8) {
            $myimagez= imagecreatefrompng('DD.png');
            $logoh=80;
            $logow=120;
            }

            $width1=imagesx($myimage);
            $height1=imagesy($myimage);
            $width2=imagesx($myimagez);
            $height2=imagesy($myimagez);


            $newheight=400;
            $newwidth=350;
            $tmp=imagecreatetruecolor($newwidth,$newheight);
            $image=imagecreatetruecolor($newwidth,$newheight);
            $transparency=imagecolortransparent($myimagez);

             imagealphablending($tmp, false);
            $color = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
            imagefill($tmp, 0, 0, $color);
            imagesavealpha($tmp, true);


            imagecopyresampled($image,$myimage,0,0,0,0,$newwidth,$newheight,$width1,$height1);
            imagecopyresampled($tmp,$myimagez,0,0,0,0,$logow,$logoh,$width2,$height2);

            $x=$newwidth-$logow-5;

            @imagecopy($image, $tmp, $x,10,0,0, $newwidth, $newheight);
            imagejpeg($image,$path);

            imagedestroy($tmp);
            imagedestroy($image);
            imagedestroy($myimagez);

        ?>

        <div class="col" id="io">
            <div id="image">
                <img src="<?php echo $path; ?>">
            </div>
            <div class="buttons">
                <a href="index.php" id="apply" class="btn upload-result upload">Choose Another File
                <a class="btn" href="<?php echo $path; ?>" id="download" download="<?php echo $path; ?>">Download</a>
            </div>
        </div>

        <?php
        }
        else
        {
    ?>

        <div class="col" id="io">
            <div id="upload-demo">
                
            </div>
            <div class="buttons">
                <input type="file" id="upload" value="Choose a file" accept="image/*" />
                <button id="apply-btn" class="btn upload-result">Apply</button>
            </div>
            <div class="crop">
                
            </div>
        </div>
        <?php
    }
    ?>
  

    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="bower_components/jquery/dist/jquery.min.js"></script>')</script>
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>

        <script src="croppie.js"></script>
            <script src="fun.js"></script>
       
       <script>
            Demo.init();
</script>

</body>
</html>




<!-- <div class="col" id="text">
    <h1></h1>
    <p></p>
    <br>
        <sub># Feel The Zeal</sub>
    
</div> -->