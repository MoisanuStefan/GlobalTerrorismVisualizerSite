<?php

class MMap{
	public function get(){

		$long=array(0,0.9,0.4,0.3,0.5,0.3);
		$lat=array(0,0.4,0.6,0.3,0.9,0.1);

		for ($i = 0; $i <= 4; $i++) {


				
				$lg=$long[$i]*10;
				$lt=$lat[$i]*10;
				echo "$lg $lt";
   				echo '<div class="dot dot-'.$i.'" style="top: '.$i.'%; left: '.$i.'%;"></div>'; 
			}
		echo '<div class="dot dot-'.$i.'" style="top: 65%; left: 47%;"></div>'; 
		echo '<div class="dot dot-'.$i.'" style="top: 45.9%; left: 24.9%;"></div>'; 
		echo '<div class="dot dot-'.$i.'" style="top: 35.9%; left: 53.9%;"></div>';
		echo '<div class="dot dot-'.$i.'" style="top: 32%; left: 41.5%;"></div>';

	}




}




?>