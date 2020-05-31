<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-wight, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Global Terrorism</title>
    <link rel="stylesheet" type="text/css" href="util/css/index_style.css">
</head>
<body>
    <div class="navigation_bar">
        <ul class="navigation_ul">
            <li><a href="#head">Home</a> </li>
            <li><a href="#section1">About</a> </li>
            <li><a href="#section2">Portfolio</a> </li>
            <li><a href="#section3">Statistics</a> </li>
            <li><a href="#section5">Maps</a> </li>
	    <li><a href="#section4">Contact</a> </li>
	    <?php if(isset($_POST['user'])) echo '<li><a>   Welcome, '.$_POST['user']. ' </a> </li>'; ?>
        </ul>
    </div>
    <div class="wrapper">
        <div id="head" class="sections">
            <div class="title-content">
                <h1 class="title">Global terrorism</h1>
                <h2 class="subtitle">Statistics and more information about terrorist events around the world</h2>
            </div>
        </div>
        <div id="section1" class="sections">
            <div class="content">
                <h2>About</h2>
                <p> 

			<?php

			$text= '';

			if(isset($_POST['user']))
			{
				$text=$_POST['user'];
				
			}

			if(isset($_POST['password']))
			{
				$text=$_POST['password'];
				
			}

			

			
			if(!isset($_POST['user']))
			{echo '<form action="index.php" method="POST" class="logIn">';
			echo '<input type="hidden" name="actiune" value="LogIn">';
			echo '<input type="hidden" name="loginTried" value="tried">';
			echo 'User:'; 
			echo '<input class="logInput" type="text" name="user">'; 
			echo '<hr>';
			echo 'Password:';
			echo '<input class="logInput" type="text" name="password">';
			echo '<hr>';
			echo '<button class="logButton" type="submit">Log in</button>';
				if(!isset($_POST['user'])  && isset($_POST['loginTried']))
			{
				echo '<p id="failedLogin"> Wrong username or password!</p>';
				
			}
			echo '</form>';
			}

			$text= '';
			if(isset($_POST['name']))
			{
				$text=$_POST['name'];
				
			}


			if(isset($_POST['user']))
			{
				$text=$_POST['user'];
				if($text!=NULL)
				echo "WELCOME, $text,";
			}

			if(isset($_POST['password']))
			{
				$text=$_POST['password'];
				
			}

			
			if(!isset($_POST['user']))
			{
			echo '<form action="index.php" method="POST" class=signIn>';
			echo '<input type="hidden" name="actiune" value="SignIn">';
			echo 'Name:';
			echo '<input class="logInput" type="text" name="name">';
			echo '<hr>';
			echo 'User:';
			echo '<input class="logInput" type="text" name="user">';
			echo '<hr>';
			echo 'Password:';
			echo '<input class="logInput" type="text" name="password">';
			echo '<hr>';
			echo '<button class="logButton" type="submit">Sign in</button>';
			echo '</form>';

			}
			?>

		 </p>
            </div>
        </div>
        <div id="section2" class="sections">
            <div class="content">
                <h2>Portfolio</h2>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu pulvinar arcu. Morbi
                    bibendum urna vitae ultrices lobortis. Vivamus condimentum ultrices leo, eget luctus ante sagittis et. Maecenas
                    posuere placerat vestibulum. Phasellus interdum fermentum tellus vitae iaculis. Suspendisse ornare, dolor ac ultrices pretium, arcu sapien pharetra velit, at laoreet ipsum odio a lacus. Curabitur id
                </p>
            </div>
        </div>
        <div id="section3" class="sections">
            <div class="content">
                <h2>Statistics</h2>

		<?php
			
			$text= '';
			if(isset($_POST['year']))
			{
				$text=$_POST['year'];
				if($text!=NULL)
				echo "year: $text,";
			}

			if(isset($_POST['month']))
			{
				$text=$_POST['month'];
				if($text!=NULL)
				echo " month: $text ";
			}

			if(isset($_POST['day']))
			{
				$text=$_POST['day'];
				if($text!=NULL)
				echo " day: $text ";
			}

			if(isset($_POST['country']))
			{
				$text=$_POST['country'];
				if($text!=NULL)
				echo " country: $text ";
			}
			
			if(isset($_POST['city']))
			{
				$text=$_POST['city'];
				if($text!=NULL)
				echo " city: $text ";
			}

			if(isset($_POST['regionCode']))
			{
				$text=$_POST['regionCode'];
				if($text!=NULL)
				echo " regionCode: $text ";
			}

			if(isset($_POST['countryCode']))
			{
				$text=$_POST['countryCode'];
				if($text!=NULL)
				echo " countryCode: $text ";
			}

			?>
		
 		

		<form action="index.php" method="POST">
		<label>Graph me this: </label>
        <select id="graph-me-this" name = "graph-me-this" >
            <option value = "weaptype1_txt" >Number of weapons by category</option>
            <option value = "country_txt" > Number of events by country </option>
            <option value = "iyear"> Number of events by year </option>
        </select>
		
			<input type="hidden" name="actiune" value="changeChart">
			Years between: 
			<input id="year_l" type="text" name="year_l">
			and 
			<input id="year_h" type="text" name="year_h">
			Month:
			<input  id="month" type="text" name="month">
			Day:
			<input id="day" type="text" name="day">
			Country:
			<input id="country" type="text" name="country">
			City:
			<input id="city" type="text" name="city">
			Region code:
			<input id="regionCode" type="text" name="regionCode">
			Country code:
			<input  id="countryCode" type="text" name="countryCode">
			

			
			<button id="fetchBtn" type="button">SET</button>
		</form>
		<label id="chart-type-label">Chart type</label>
                   	<select id = "chartType" name="chartType">
					    <option disabled selected value> -- chart type -- </option>
                        <option value = "bar" >Bar chart</option>
                        <option value = "pie" >Pie chart</option>
                        <option value = "line">Line chart</option>
                    	</select>


                <!-- HTML -->
            <div id="chartdiv"></div>
            </div>

            
        </div>


	<div id="section5" class="sections">
            <div class="content">
                <h2>Maps</h2>
                

		<form action="index.php" method="GET">
			<input type="hidden" name="actiune" value="changeMap">
			Years between: 
			<input type="text" name="year_l">
			and 
			<input type="text" name="year_h">
			Month:
			<input type="text" name="month">
			Day:
			<input type="text" name="day">
			Country:
			<input type="text" name="country">
			City:
			<input type="text" name="city">
			Region code:
			<input type="text" name="regionCode">
			Country code:
			<input type="text" name="countryCode">
			
			<button type="submit">SET</button>
		</form>







		<div id="map">
	  <div class="img-container">
		  <img src="http://res.cloudinary.com/reddelicious/image/upload/v1496891721/map_no-dots_mptb8a.png" alt="Map">
	  </div>
	  <div id="dots">

		<?php
		  $map=new MMap();
	          $map->get();
		  
		?>
	  </div>
	</div>

            </div>
        </div>


        <div id="section4" class="sections">
        <div class="content" id="teamsParent">
            <h2>Our team</h2>

            <div class="team">
                <a href="https://www.facebook.com/stef.moisanu">
                    <div class="box" id="stef">Moisanu Stefan
                        <p class="email">smoisanu@gmail.com</p>
                        <p class="instructions">Click for facebook</p>
                    </div>
                </a>
                <a href="https://www.facebook.com/costinaa.ioana">
                    <div class="box" id="costina">Andrici Costina
                        <p class="email">costinaa.ioana18@gmail.com</p>
                        <p class="instructions">Click for facebook</p>
                    </div>
                </a>
                <a href="https://www.facebook.com/ramederc">
                    <div class="box" id="carol">Rameder Carol
                        <p class="email">carolrameder@gmail.com</p>
                        <p class="instructions">Click for facebook</p>
                    </div>
                </a>
            </div>

        </div>
        </div>

	


    </div>

    <!-- Resources -->
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/dataviz.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
  	<script src="util/js/form-ajax.js"></script>
	

</body>









</html>