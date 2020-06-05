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
            <li><a  href="#head">Home</a> </li>
            <li><a  href="#section1">Register</a> </li>
            <li><a   href="#section2">Portfolio</a> </li>
            <li><a  href="#section3">Statistics</a> </li>
            <li><a   href="#section5">Maps</a> </li>
            <li><a href="#section4">Team</a> </li>
			<li class="navname">TeVi </li>
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
               <h2 class="titles" id="nav1">Register</h2>
               <div class="flexbox">
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
                     echo '<p class="topText">Login to acces our database !</p>';
                     echo '<input class="logInput" id="topfield" type="text" name="user" placeholder="Username" autocomplete="off">'; 
                     echo '<input class="logInput" type="text" name="password" placeholder="Password" autocomplete="off">';
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
                     echo '<p class="topText">Create a new account !</p>';
                     echo '<input class="logInput" id="topfield" type="text" name="name" placeholder="Name" autocomplete="off">';
                     echo '<input class="logInput" type="text" name="user" placeholder="Username" autocomplete="off">';
                     echo '<input class="logInput" type="text" name="password" placeholder="Password" autocomplete="off">';
                     echo '<button class="logButton" type="submit">Sign up</button>';
                     echo '</form>';
                     }
                     ?>
               </div>
            </div>
        </div>
        <div id="section3" class="sections">
            <div class="content">
                <h2 class="titles">Statistics</h2>

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
			<option value = "targtype1_txt"> Number of events by target type </option>
			<option value = "attacktype1_txt"> Number of events by attack type </option>


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

			<label for="attacktype1_txt">Attack type</label><br>
			<select id="attacktype1_txt" name = "attacktype1_txt" >
			<option value = "" selected="selected">No Value</option>
            <option value = "Bombing/Explosion" >Bombing/Explosion</option>
            <option value = "Armed Assault" >Armed Assault</option>
            <option value = "Assassination">Assassination</option>
			<option value = "Facility/Infrastructure Attack">Facility/Infrastructure Attack</option>
			<option value = "Hostage Taking (Kidnapping)">Hostage Taking (Kidnapping)</option>
			<option value = "Insurgency/Guerilla Action">Insurgency/Guerilla Action</option>
			<option value = "Hostage Taking (Barricade Incident)">Hostage Taking (Barricade Incident)</option>
       		<option value = "Unarmed Assault">Unarmed Assault</option>
			<option value = "Hijacking">Hijacking</option>
			</select>
			

			<label for="targtype1_txt">Target type</label><br>
			<select id="targtype1_txt" name = "targtype1_txt" >
            <option value = "" selected="selected">No Value</option>
			<option value = "Private Citizens & Property" >Private Citizens & Property</option>
            <option value = "Business" >Business</option>
            <option value = "Military">Military</option>
			<option value = "Government (General)">Government (General)</option>
			<option value = "Police">Police</option>
			<option value = "Utilities">Utilities</option>
			<option value = "Transportation">Transportation</option>
			<option value = "Government (Diplomatic)">Government (Diplomatic)</option>
			<option value = "Journalists & Media">Journalists & Media</option>
			<option value = "Educational Institution">Educational Institution</option>
			<option value = "Religious Figures/Institutions">Religious Figures/Institutions</option>
			<option value = "Airports & Aircraft">Airports & Aircraft</option>
			<option value = "Telecommunication">Telecommunication</option>
			<option value = "NGO">NGO</option>
			<option value = "Tourists">Tourists</option>
			<option value = "Maritime">Maritime</option>


       		</select>
			
			<label for="weaptype1_txt">Weapon</label><br>
			<select id="weaptype1_txt" name = "weaptype1_txt" >
			<option value = "" selected="selected">No Value</option>
            <option value = "Explosives" >Explosives</option>
            <option value = "Firearms" >Firearms</option>
            <option value = "Incendiary">Incendiary</option>
			<option value = "Melee">Melee</option>
			<option value = "Unknown">Unknown</option>
       		</select>
			
			<label for="success">Success</label><br>
			<select id="success" name = "success" >
			<option value = "" selected="selected">No Value</option>
            <option value = "1" >True</option>
            <option value = "0" >False</option>
       		</select>

			<label for="suicide">Suicide</label><br>
			<select id="suicide" name = "suicide" >
			<option value = "" selected="selected">No Value</option>
            <option value = "1" >True</option>
            <option value = "0" >False</option>
       		</select>
			
			

			
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
            <h2 class="titles">Maps</h2>
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
               <button id="fetchBtn" type="button">SET</button>
            </form>
            <p>mapa</p>
            <div id="mapdiv"></div>
         </div>
         <div id="section4" class="sections">
            <div class="content" id="teamsParent">
               <h2 class="titles" id="nav1">Our team</h2>
               <div class="row">
                  <div class="column">
                     <div class="card">
                        <img src="images/caarol.jpg" alt="Carol"  id="profileImg">
                        <div class="container">
                           <span typeof="schema:Person" >
                              <meta property="schema:givenName" content="Carol">
                              <meta property="schema:familyName" content="Raemder">
                              <h2 property="schema:name">Carol Rameder</h2>
                           </span>
                           <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                           <a  href="https://www.facebook.com/ramederc">   <img id="socButton" src="images/facebook.png" alt="" /></a>
                           <a href="mailto:ramederc30@gmail.com">   <img id="socButton" src="images/google-plus.png" alt="" /></a>
                        </div>
                     </div>
                  </div>
                  <div class="column">
                     <div class="card">
                        <img src="images/costina.jpg" alt="Costina"  id="profileImg">
                        <div class="container">
                           <span typeof="schema:Person" >
                              <meta property="schema:givenName" content="Costina">
                              <meta property="schema:familyName" content="Andrici">
                              <h2 property="schema:name">Costina Andrici</h2>
                           </span>
                           <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                           <a  href="https://www.facebook.com/costinaa.ioana">   <img id="socButton" src="images/facebook.png" alt="" /></a>
                           <a href="mailto:Costinaa.ioana18@gmail.com">   <img id="socButton"  src="images/google-plus.png" alt="" /></a>
                        </div>
                     </div>
                  </div>
                  <div class="column">
                     <div class="card">
                        <img src="images/stefan.jpg" alt="John" id="profileImg">
                        <div class="container">
                           <span typeof="schema:Person" >
                              <meta property="schema:givenName" content="Stefan">
                              <meta property="schema:familyName" content="Moisanu">
							  <meta property="schema:additionalName" content="Costinescu">
                              <h2 property="schema:name">Stefan Moisanu</h2>
                           </span>
                           <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                           <a  href="https://www.facebook.com/stef.moisanu">   <img id="socButton" src="images/facebook.png" alt="" /></a>
                           <a href="mailto:smoisanu@gmail.com">   <img id="socButton"  src="images/google-plus.png" alt="" /></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>
      <footer class="footer">
 <span typeof="schema:WebSite" >
    <meta property="schema:logo" >
         <a  href="https://www.kaggle.com/START-UMD/gtd">   <img  class="mylogo" src="images/kaggle-logo.png" alt="" /></a>
</span>

<span typeof="schema:CollegeOrUniversity">
    <meta property="schema:logo" >
         <a  href="https://www.info.uaic.ro/">   <img  class="mylogo" src="images/logo-fii.png" alt="" /></a>
</span>


<span typeof="schema:license">
<meta property="schema:logo" >
         <a  href="https://creativecommons.org/licenses/by-nc-sa/4.0/">   <img  class="mylogo" src="images/creative commons.png" alt="" /></a>
</span>
         <p id="copyr" >2020 TeVi . Realizat de Rameder Carol, Moisanu Stefan & Andrici Costina . 	</p>
      </footer >
      <!-- Resources -->
      <script src="https://www.amcharts.com/lib/4/core.js"></script>
      <script src="https://www.amcharts.com/lib/4/charts.js"></script>
      <script src="https://www.amcharts.com/lib/4/themes/dataviz.js"></script>
      <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
      <script src="util/js/form-ajax.js"></script>
   </body>
</html>