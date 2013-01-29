<?php
/*

http://eu.battle.net/api/d3/data/item/

$_GET['item']="item/CmAIgrbH_wISBwgEFeaWt-IdPCtv8R32alBfHXYe9g0dhgJj6h3QcfM8HSY9vwwwCTj-AUAAUBJgzgJqJQoMCAAQ0OPDmICAgKAYEhUIxuCAvwISBwgEFRCf2KswDTgAQAEYs6TD1ANQCFgCoAGzpMPUA6AB7NTs4wM";
*/


if ( isset($_COOKIE['region']) && 
   isset($_COOKIE['btTag']) && 
	 isset($_COOKIE['btNum']) && 
	 isset($_COOKIE['heroID'])) {

		$region = $_COOKIE['region'];//='eu';//test
		$btTag = $_COOKIE['btTag'];//='Termiton';//test
		$btNum = $_COOKIE['btNum'];//='2730';//test
		$heroID = $_COOKIE['heroID'];//='10925158';//test

		$profil_URL = 'http://'.$region.'.battle.net/api/d3/profile/'.$btTag.'-'.$btNum.'/hero/'.$heroID;
		$jsonProfil = implode('', file($profil_URL));			  
		$referencestuff = file('stuff.txt');

		$Ptableau = json_decode($jsonProfil, true);
//print_r($Ptableau);

	foreach ($Ptableau as $Pkey => $Pvalue) 
	{
		if (!is_array($Pvalue)){
		//	echo "cle ".$Pkey." : val ".$Pvalue."<br>";###################
	 	}else{
	 	//	echo $Pkey.'<br>';###################
			foreach ($Pvalue as $Pkey2 => $Pvalue2) {

				if (!is_array($Pvalue2)){
					//echo "----cle2 : ".$Pkey2." : val2 ".$Pvalue2."<br>";###################
				}else{
				//	echo '----cle 2 : '.$Pkey2.'<br>';###################
					foreach ($Pvalue2 as $Pkey3 => $Pvalue3){
						
						if (!is_array($Pvalue3)){
							//echo "--------cle3 ".$Pkey3." : val3 ".$Pvalue3."<br>";###################
							if( $Pkey3 == 'name' ){
								if( $Pkey2 == 'torso' || $Pkey2 == 'shoulders' || $Pkey2 == 'head' || $Pkey2 == 'neck' || $Pkey2 == 'hands' || $Pkey2 == 'waist' || $Pkey2 == 'feet' || $Pkey2 == 'bracers' || $Pkey2 == 'legs' || $Pkey2 == 'mainHand' || $Pkey2 == 'offHand' || $Pkey2 == 'rightFinger' || $Pkey2 == 'leftFinger' ){
							echo "<div id=".$Pkey2."><center><h2>".$Pkey2." : <span class=\"valeur\">".$Pvalue3."</span></h2></center>";
								}
							}	
							foreach ($referencestuff as $Pcle => $Pvaleur){
###############################################################################################################################	 							
		 						if( trim($Pkey2) == trim($Pvaleur) && trim($Pkey3) == 'tooltipParams') {
		 							$_SESSION[$Pkey2]=$Pvalue3;
		 							$item = $Pvalue3;
									$item_URL = 'http://'.$region.'.battle.net/api/d3/data/'.$item;	  
									$jsonItem = implode('', file($item_URL));
									$referenceitem = file('carac.txt');
									$Itableau = json_decode($jsonItem, true);
									foreach ($Itableau as $Ikey => $Ivalue) 
									{
										if (!is_array($Ivalue)){
	 										foreach ($referenceitem as $Icle => $Ivaleur){
		 										if( trim($Ikey) == trim($Ivaleur)){		
	 									//			echo "<b>".$Ikey." : </b> ".$Ivalue."<br>";###################
												}
 											}	
 										}else{
 										//	echo "<b>".$Ikey.'</b><br>';
 											foreach ($Ivalue as $Ikey2 => $Ivalue2) {
 												if (!is_array($Ivalue2)){
 											 		foreach ($referenceitem as $Icle => $Ivaleur){
 												 		if( trim($Ikey2) == trim($Ivaleur)){
 												//		echo "<center><div class=".$Ikey."><div id=".$Ikey2.">".$Ikey2." : ".$Ivalue2."</div></div></center>";###################
 														}
 											 		}
 												}else{
 											//		echo '----<b>'.$Ikey2.'</b><br>';
													foreach ($Ivalue2 as $Ikey3 => $Ivalue3){
														if (!is_array($Ivalue3)){
 										 					foreach ($referenceitem as $Icle => $Ivaleur){
 										 						if( trim($Ikey2) == trim($Ivaleur)){
											 						//	$_SESSION[$Ikey2]=$Ivalue3;
											 						//	echo "--------<b>".$Ikey3." : </b> ".$Ivalue3."<br>";###################
																	if ( $Ikey3 == 'max' ){
																		echo "<div class=".$Ikey2."><center>".$Ikey2." : <span class=\"valeur\">".$Ivalue3."</span><center></div>";
																	}
 																}
															}
														}
													}
												}
											}
										}
									}
		 						}
###############################################################################################################################
							}	echo "</div>";
						}
	 				}
				}
			}
		}
	}
}	
	 
	 ?>
