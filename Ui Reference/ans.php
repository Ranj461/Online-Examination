<!DOCTYPE html>
<html>
<head>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/shoelace-css/1.0.0-beta16/shoelace.css">
        <link rel="stylesheet" href="styles.css">

    </head>
</head>

<body>
<!-- -->
<div class="container">
			<?php 
				$myfile = readfile("current.txt");
				
			?>
            <div class="app"> 
                <form action="ans.php" method="post">
                <label for="male"><?php  $myfile ?></label>
                <div class="input-single">
                    <textarea id="note-textarea" placeholder="Create a new note by typing or using voice recognition." rows="6" name="answer"></textarea>

                </div>         
                <button id="start-record-btn" type="Submit">Submit</button><br><br>
                
                
                
                </form>

            </div>

        </div>
<!-- -->
<div class="container">
	<div class="app"> 
		YOUR SCORE IS:
		<h3>
		<?php

		$txt = $_POST["answer"];
		$fp = fopen('lidn.txt', 'w');
		fwrite($fp, $txt);
		fclose($fp);
		$nexttest = 3;
		$score = shell_exec("python score.py ");
		
		echo $score;

		$sentiment = shell_exec("python senti.py ");
		

		$score = (int)$score;
		$nexttest = shell_exec("python adapt.py 3 $score");
		
		echo $nexttest;

		?>
		</h3>

		<button id="start-record-btn" >NEXT TEST</button><br><br>
		<button id="start-record-btn" type="Submit">EXIT TEST</button><br><br>
	</div>
</div>
</body>
</html>


