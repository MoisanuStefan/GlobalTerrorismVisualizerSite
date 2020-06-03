<?php

class CMap{
	public function get(){
		for ($i = 5; $i <= 80; $i=$i+10) {
   				echo '<div class="dot dot-'.$i.'" style="top: '.$i.'%; left: '.$i.'%;"></div>'; 
			}


	}




}




?>