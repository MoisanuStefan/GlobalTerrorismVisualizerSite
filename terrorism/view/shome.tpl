<style>
<?php include 'util/css/index_style.css';
?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-wight, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Global Terrorism</title>
</head>
<body>
    <div class="navigation_bar">
        <ul class="navigation_ul">
            <li><a href="#head">Home</a> </li>
            <li><a href="#section1">About</a> </li>
            <li><a href="#section2">Portfolio</a> </li>
            <li><a href="#section3">Statistics</a> </li>
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
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu pulvinar arcu. Morbi
                    bibendum urna vitae ultrices lobortis. Vivamus condimentum ultrices leo, eget luctus ante sagittis et. Maecenas
                    posuere placerat vestibulum. Phasellus interdum fermentum tellus vitae iaculis. Suspendisse ornare, dolor ac ultrices pretium, arcu sapien pharetra velit, at laoreet ipsum odio a lacus. Curabitur id
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
			if(isset($_GET['year']))
			{
				$text=$_GET['year'];
				if($text!=NULL)
				echo "year: $text,";
			}

			if(isset($_GET['month']))
			{
				$text=$_GET['month'];
				if($text!=NULL)
				echo " month: $text ";
			}

			if(isset($_GET['day']))
			{
				$text=$_GET['day'];
				if($text!=NULL)
				echo " day: $text ";
			}

			if(isset($_GET['country']))
			{
				$text=$_GET['country'];
				if($text!=NULL)
				echo " country: $text ";
			}
			
			if(isset($_GET['city']))
			{
				$text=$_GET['city'];
				if($text!=NULL)
				echo " city: $text ";
			}

			if(isset($_GET['regionCode']))
			{
				$text=$_GET['regionCode'];
				if($text!=NULL)
				echo " regionCode: $text ";
			}

			if(isset($_GET['countryCode']))
			{
				$text=$_GET['countryCode'];
				if($text!=NULL)
				echo " countryCode: $text ";
			}

			
		?>

		<form action="index.php" method="GET">
			Year:
			<input type="text" name="year">
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


                <p>
                    <label id="chart-type-label">Chart type</label>
                    <select id = "chartType" >
                        <option value = "bar" selected="selected">Bar chart</option>
                        <option value = "pie" >Pie chart</option>
                        <option value = "line">Line chart</option>
                    </select>

                    

                </p>
            </div>

            <!-- HTML -->
            <div id="chartdiv"></div>
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

    <script>
    <?php include 'E:\ProgramData\xampp\htdocs\TeVi\public\js\chart.js'; ?>
    </script>

</body>









</html>