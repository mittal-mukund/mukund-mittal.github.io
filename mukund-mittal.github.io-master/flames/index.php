
<!DOCTYPE HTML>
<html>
	<head>
		<title>FLAME Game</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/npm.js"></script>
        <style type="text/css">
			#background{
                background-color: #dee2e0;
                padding: 0px;
                width: 90%;
            }
		</style>
	</head>
	<body>
		<?php
		$name1=$name2="";
	    if (isset($_POST["submit"])) {
		
 
		// Check if name has been entered
		if (!$_POST['name1']) {
			$errName1 = 'Please enter your name';
		}

        // Check if partner's name has been entered
        if (!$_POST['name2']) {
			$errName2 = 'Please enter your partners name';
		}
 
        if($_POST['name1'] && $_POST['name2'])
        {
            $c=0;
            $cs="";
            $name1=$_POST['name1'];
            $name2=$_POST['name2'];
            $x=strlen($name1);
            $y=strlen($name2);
            $t1=str_split($name1);
            $t2=str_split($name2);
            for($i=0;$i<$x;$i++)
            {
                $c=0;
                $cs=$t1[$i];
                for($j=0;$j<$y;$j++)
                {
                    if ($t1[$i] == $t2[$j])
                    {   
                        $c=1;
                        unset($t2[$j]);              
                    }
                }
                if ($c==1)
                {
                    for($j=0;$j<$x;$j++)
                    {
                        if($t1[$j]==$cs)
                        unset($t1[$j]);
                    }
                }
            }
            $comb = array_merge($t1, $t2);
            $c=count($comb)%5;
            switch($c)
            {
                case 1:
                    $result='<div class="alert alert-success" style="text-align: center;">You are now Friends</div>';
                    break;
                case 2:
                    $result='<div class="alert alert-success" style="text-align: center;">You are now Lovers</div>';
                    break;
                case 3:
                    $result='<div class="alert alert-success" style="text-align: center;">You are now Affectionate</div>';
                    break;
                case 4:
                    $result='<div class="alert alert-success" style="text-align: center;">You are now Married</div>';
                    break;
                case 0:
                    $result='<div class="alert alert-success" style="text-align: center;">You are now Enemies</div>';
                    break;
            }
            /*for($i=0;$i<$x;$i++)
            {
                echo substr($name1,$i,1);
                for($j=0;$j<$y;$j++)
                {
                    if(substr($name1,$i,1)==substr($name2,$j,1))
                    {
                        //echo substr($name2,$j,1);
                        str_replace(substr($name1,$i,1),'',$name1);
                        str_replace(substr($name2,$j,1),'',$name2);
                        $name2=trim($name2,substr($name2,$j,1));
                    }
                }
                echo $name2;
            }
            echo $name1;
            echo $name2;*/
        }

	    }
        ?>
        <div class="container" id="background">
            <form method="post" role="form" class="col-md-12" style="width:80%; margin-left:10%;">

            <div class="row">
                <div class="col-md-10 col-md-offset-1" style="background-color: #dee2e0; margin-top: 2%;">
                    <img src="images/flames.jpg"/ style="width: 100%;">
		        </div>
            </div>

            <br/>
            <div class="form-group">
				<div style="width:80%; margin-left:10%;">
					<?php echo $result; ?>
				</div>
			</div>

        <br/>
        <div class="row">
            <div class="col-md-4" style="text-align: center;">
                <p style="font-size:1.5em;">Your Name:</p>
            </div>
            <div class="col-md-6" style="text-align: center;">
                <input type="text" name="name1" class="form-control" placeholder="Your Name" value="<?php echo htmlspecialchars($name1); ?>"/>
					<?php echo "<p class='text-danger'>$errName1</p>";?>
            </div>
        </div>

        <br/>
        <div class="row">
            <div class="col-md-4" style="text-align: center;">
                <p style="font-size:1.5em;">Partner's Name:</p>
            </div>
            <div class="col-md-6" style="text-align: center;">
                <input type="text" name="name2" class="form-control" placeholder="Partner's Name" value="<?php echo htmlspecialchars($name2); ?>"/>
					<?php echo "<p class='text-danger'>$errName2</p>";?>
            </div>
        </div>

        <br/>
        <div align="center">
		    <input type="submit" name="submit" class="btn" value="Submit" style="background-color:#59677c;color:white;"/>
		</div>
        <br/>

        </form>
        </div>

	</body>
</html>