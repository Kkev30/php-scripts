<head>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<?php
// *Disable 404 Errors
set_error_handler("customError");
function customError()
  {
  }

 // *Check if data was submitted
if (!isset($_POST['username'])) 
{
	echo '
	<center>
	<form action="" method="post">
	<input type="text" name="username" />
	<input type="submit" name="submit" value="Lookup" />
	</form>
	</center>
	';
}
else
{
	$name = $_POST["username"];
	//*Check if the form is empty
	if ($name == "")
	{
		echo '
		<center>
		<b>*No Username Entered!</b><br>
		<form action="" method="post">
		<input type="text" name="username" />
		<input type="submit" name="submit" value="Lookup" />
		</form>
		</center>
		';
	}
	else // *If the form is not empty, continue with downloading highscores.
	{
  
		$rawdata = file_get_contents("http://services.runescape.com/m=hiscore/index_lite.ws?player=$name");
		fclose($rawdata);
  
		$name = ucwords($name);
		if (!$rawdata == "")
		{
			//Replace "-1" with zero.
			$data = str_replace("-1", "0", $rawdata);
			
			//Divide the stats into an array
			$SplitSkill = explode("\n",$data);
			
			//Divide each skill into array by Rank/Level/XP
			$Overall = explode(",",$SplitSkill[0]);
			$Attack = explode(",",$SplitSkill[1]);
			$Defence = explode(",",$SplitSkill[2]);
			$Strength = explode(",",$SplitSkill[3]);
			$Constitution = explode(",",$SplitSkill[4]);
			$Ranged= explode(",",$SplitSkill[5]);
			$Prayer = explode(",",$SplitSkill[6]);
			$Magic= explode(",",$SplitSkill[7]);
			$Cooking = explode(",",$SplitSkill[8]);
			$Woodcutting = explode(",",$SplitSkill[9]);
			$Fletching = explode(",",$SplitSkill[10]);
			$Fishing = explode(",",$SplitSkill[11]);
			$Firemaking = explode(",",$SplitSkill[12]);
			$Crafting = explode(",",$SplitSkill[13]);
			$Smithing = explode(",",$SplitSkill[14]);
			$Mining = explode(",",$SplitSkill[15]);
			$Herblore = explode(",",$SplitSkill[16]);
			$Agility = explode(",",$SplitSkill[17]);
			$Thieving = explode(",",$SplitSkill[18]);
			$Slayer = explode(",",$SplitSkill[19]);
			$Farming = explode(",",$SplitSkill[20]);
			$Runecrafting = explode(",",$SplitSkill[21]);
			$Hunter = explode(",",$SplitSkill[22]);
			$Construction = explode(",",$SplitSkill[23]);
			$Summoning = explode(",",$SplitSkill[24]);
			$Dungeoneering = explode(",",$SplitSkill[25]);
			$Divination = explode(",",$SplitSkill[26]);
			$Invention = explode(",",$SplitSkill[27]); 
			
			//Add Commas to Values + Names
			for ($i=0; $i<=3; $i++)
			{
			$Overall[$i] = number_format($Overall[$i]);
			$Attack[$i] = number_format($Attack[$i]);
			$Defence[$i] = number_format($Defence[$i]);
			$Strength[$i] = number_format($Strength[$i]);
			$Constitution[$i] = number_format($Constitution[$i]);
			$Ranged[$i] = number_format($Ranged[$i]);
			$Prayer[$i] = number_format($Prayer[$i]);
			$Magic[$i] = number_format($Magic[$i]);
			$Cooking[$i] = number_format($Cooking[$i]);
			$Woodcutting[$i] = number_format($Woodcutting[$i]);
			$Fletching[$i] = number_format($Fletching[$i]);
			$Fishing[$i] = number_format($Fishing[$i]);
			$Firemaking[$i] = number_format($Firemaking[$i]);
			$Crafting[$i] = number_format($Crafting[$i]);
			$Smithing[$i] = number_format($Smithing[$i]);			
			$Mining[$i] = number_format($Mining[$i]);			
			$Herblore[$i] = number_format($Herblore[$i]);			
			$Agility[$i] = number_format($Agility[$i]);			
			$Thieving[$i] = number_format($Thieving[$i]);			
			$Slayer[$i] = number_format($Slayer[$i]);			
			$Farming[$i] = number_format($Farming[$i]);			
			$Runecrafting[$i] = number_format($Runecrafting[$i]);			
			$Hunter[$i] = number_format($Hunter[$i]);			
			$Construction[$i] = number_format($Construction[$i]);			
			$Summoning[$i] = number_format($Summoning[$i]);			
			$Dungeoneering[$i] = number_format($Dungeoneering[$i]);
			$Divination[$i] = number_format($Divination[$i]);
			$Invention[$i] = number_format($Invention[$i]); 

			} 
			
			echo '
			<center>
			<form action="" method="post">
			<input type="text" name="username" />
			<input type="submit" name="submit" value="Lookup" />
			</form>
			<br>
			<table width="200" bgcolor="#696961" style="border-collapse: collapse; border-top: 1px solid #000000; border-right: 1px solid #000000; ; border-bottom: none; border-left: 1px solid #000000;">
			<td>
			<font size="1" color="#ffffff"><center><b>Stats for [</b>'. $name.'<b>].</b></td></center></font></table>
			<center>
			<table width="199" bgcolor="#696961" style="border-collapse: collapse; border-top: none; border-right: none; border-bottom: 1px solid #000000;; border-left: 1px solid #000000;"><td>
			';
			
			//Row One
			echo '	
			<table width="199" height="8" background="interface/top.png"><tr><td></tr></td></table>
			<table width="199"  cellpadding="5" cellspacing="0"> 
			 <tr>
			 <td>
			<span class="hotspot" onmouseover="tooltipAttack()" onmouseout="tooltip.hide();"><table width="68" height="29" background="interface/attack.png"> <tr> <td align="right"><span class="topleft"><font size="2" color="#ffffff">'.$Attack[1].'</font></span></td>  </tr> </table></span></td><td>
			<span class="hotspot" onmouseover="tooltipConstitution()" onmouseout="tooltip.hide();"><table width="62" height="29" background="interface/constitution.png"> <tr> <td align="right"><span class="topleft"><font size="2" color="#ffffff">'.$Constitution[1].'</font></span></td> </tr> </table></span></td><td>
			<span class="hotspot" onmouseover="tooltipMining()" onmouseout="tooltip.hide();"><table width="69" height="29" background="interface/mining.png"> <tr> <td align="right"><span class="topright"> <font size="2" color="#ffffff">'.$Mining[1].'</font></span></td> </tr> </table></span>
			 </table>
			 ';
			 
			 //Row Two
			echo '	
			<table width="199"  cellpadding="5" cellspacing="0"> 
			 <tr>
			 <td>
			 <span class="hotspot" onmouseover="tooltipStrength()" onmouseout="tooltip.hide();"><table width="68" height="28" background="interface/strength.png"> <tr> <td align="right"><span class="middleleft"><font size="2" color="#ffffff">'.$Strength[1].'</font></span></td></tr> </table></span></td><td>
			<span class="hotspot" onmouseover="tooltipAgility()" onmouseout="tooltip.hide();"><table width="62" height="28" background="interface/agility.png"> <tr> <td align="right"> <span class="middleleft"><font size="2" color="#ffffff">'.$Agility[1].'</font></span></td> </tr></table></span></td><td>
			<span class="hotspot" onmouseover="tooltipSmithing()" onmouseout="tooltip.hide();"><table width="69" height="28" background="interface/smithing.png"> <tr> <td align="right"><span class="middleright"> <font size="2" color="#ffffff">'.$Smithing[1].'</font></span></td></tr></table></span>
			</table>
			 ';
			 
			 //Row Three
			 echo '	
			<table width="199"  cellpadding="5" cellspacing="0"> 
			 <tr>
			 <td>
			 <span class="hotspot" onmouseover="tooltipDefence()" onmouseout="tooltip.hide();"><table width="68" height="28" background="interface/defence.png"> <tr> <td align="right"><span class="middleleft"><font size="2" color="#ffffff">'.$Defence[1].'</font></span></td></tr></table></span></td><td>
			<span class="hotspot" onmouseover="tooltipHerblore()" onmouseout="tooltip.hide();"><table width="62" height="28" background="interface/herblore.png"> <tr> <td align="right"><span class="middleleft"><font size="2" color="#ffffff">'.$Agility[1].'</font></span></td></tr></table></span></td><td>
			<span class="hotspot" onmouseover="tooltipFishing()" onmouseout="tooltip.hide();"><table width="69" height="28" background="interface/fishing.png"> <tr> <td align="right"><span class="middleright"><font size="2" color="#ffffff">'.$Fishing[1].'</font></span></td></tr></table></span>
			</table>
			 ';
			 
			 //Row Four
			 echo '	
			<table width="199"  cellpadding="5" cellspacing="0"> 
			 <tr>
			 <td>
			 <span class="hotspot" onmouseover="tooltipRanged()" onmouseout="tooltip.hide();"><table width="68" height="28" background="interface/ranged.png"> <tr> <td align="right"><span class="middleleft"><font size="2" color="#ffffff">'.$Ranged[1].'</font></span></td></tr></table></span></td><td>
			<span class="hotspot" onmouseover="tooltipThieving()" onmouseout="tooltip.hide();"><table width="62" height="28" background="interface/thieving.png"> <tr> <td align="right"><span class="middleleft"><font size="2" color="#ffffff">'.$Thieving[1].'</font></span></td></tr></table></span></td><td>
			<span class="hotspot" onmouseover="tooltipCooking()" onmouseout="tooltip.hide();"><table width="69" height="28" background="interface/cooking.png"> <tr> <td align="right"><span class="middleright"><font size="2" color="#ffffff">'.$Cooking[1].'</font></span></td></tr></table></span>
			</table>
			 ';
			 
			 //Row Five
			 echo '	
			<table width="199"  cellpadding="5" cellspacing="0"> 
			 <tr>
			 <td>
			 <span class="hotspot" onmouseover="tooltipPrayer()" onmouseout="tooltip.hide();"><table width="68" height="28" background="interface/prayer.png"><tr><td align="right"><span class="middleleft"><font size="2" color="#ffffff">'.$Prayer[1].'</font></span></td> </tr></table></span></td><td>
			<span class="hotspot" onmouseover="tooltipCrafting()" onmouseout="tooltip.hide();"><table width="62" height="28" background="interface/crafting.png"><tr><td align="right"><span class="middleleft"><font size="2" color="#ffffff">'.$Crafting[1].'</font></span></td></tr></table></span></td><td>
			<span class="hotspot" onmouseover="tooltipFiremaking()" onmouseout="tooltip.hide();"><table width="69" height="28" background="interface/firemaking.png"><tr><td align="right"><span class="middleright"><font size="2" color="#ffffff">'.$Firemaking[1].'</font></span></td> </tr></table></span>
			</table>
			 ';
			 
			  //Row Six
			 echo '	
			<table width="199"  cellpadding="5" cellspacing="0"> 
			 <tr>
			 <td>
			 <span class="hotspot" onmouseover="tooltipMagic()" onmouseout="tooltip.hide();"><table width="68" height="28" background="interface/magic.png"> <tr> <td align="right"><span class="middleleft"><font size="2" color="#ffffff">'.$Magic[1].'</font></span></td></tr></table></span></td><td>
			<span class="hotspot" onmouseover="tooltipFletching()" onmouseout="tooltip.hide();"><table width="62" height="28" background="interface/fletching.png"> <tr> <td align="right"><span class="middleleft"> <font size="2" color="#ffffff">'.$Fletching[1].'</font></span></td> </tr></table></span></td><td>
			<span class="hotspot" onmouseover="tooltipWoodcutting()" onmouseout="tooltip.hide();"><table width="69" height="28" background="interface/woodcutting.png"> <tr> <td align="right"><span class="middleright"><font size="2" color="#ffffff">'.$Woodcutting[1].'</font></span></td></tr> </table></span>
			</table>
			 ';
			 
			 //Row Seven
			 echo '	
			<table width="199"  cellpadding="5" cellspacing="0"> 
			 <tr>
			 <td>
			 <span class="hotspot" onmouseover="tooltipRunecrafting()" onmouseout="tooltip.hide();"><table width="68" height="28" background="interface/runecrafting.png"> <tr> <td align="right"><span class="middleleft"><font size="2" color="#ffffff">'.$Runecrafting[1].'</font></span></td> </tr> </table></span></td><td>
			<span class="hotspot" onmouseover="tooltipSlayer()" onmouseout="tooltip.hide();"><table width="62" height="28" background="interface/slayer.png"> <tr> <td align="right"> <span class="middleleft"><font size="2" color="#ffffff">'.$Slayer[1].'</font></span></td> </tr> </table></span></td><td>
			<span class="hotspot" onmouseover="tooltipFarming()" onmouseout="tooltip.hide();"><table width="69" height="28" background="interface/farming.png"> <tr> <td align="right"><span class="middleright"><font size="2" color="#ffffff">'.$Farming[1].'</font></span></td> </tr> </table></span>
			</table>
			 ';

			 //Row Eight
			 echo '	
			<table width="199"  cellpadding="5" cellspacing="0"> 
			 <tr>
			 <td>
			 <span class="hotspot" onmouseover="tooltipConstruction()" onmouseout="tooltip.hide();"><table width="68" height="28" background="interface/construction.png"> <tr> <td align="right"><span class="middleleft"><font size="2" color="#ffffff">'.$Construction[1].'</font></span></td> </tr> </table></span></td><td>
			<span class="hotspot" onmouseover="tooltipHunter()" onmouseout="tooltip.hide();"><table width="62" height="28" background="interface/hunter.png"> <tr> <td align="right"><span class="middleleft"> <font size="2" color="#ffffff">'.$Hunter[1].'</font></span></td></tr></table></span></td><td>
			<span class="hotspot" onmouseover="tooltipSummoning()" onmouseout="tooltip.hide();"><table width="69" height="28" background="interface/summoning.png"> <tr> <td align="right"><span class="middleright"><font size="2" color="#ffffff">'.$Summoning[1].'</font></span></td> </tr> </table></span>
			</table>
			 ';
			 
			 //Row Nine
			 echo '	
			<table width="199"  cellpadding="5" cellspacing="0"> 
			 <tr>
			 <td>
			 <span class="hotspot" onmouseover="tooltipDungeoneering()" onmouseout="tooltip.hide();"><table width="68" height="27" background="interface/dungeoneering.png"> <tr> <td align="right"><span class="bottomleft"><font size="2" color="#ffffff">'.$Dungeoneering[1].'</font></span></td></tr></table></span></td><td>
			 <span class="hotspot" onmouseover="tooltipDivination()" onmouseout="tooltip.hide();"><table width="62" height="28" background="interface/divination.png"> <tr> <td align="right"><span class="middleleft"> <font size="2" color="#ffffff">'.$Divination[1].'</font></span></td></tr></table></span></td><td>
			<span class="hotspot" onmouseover="tooltipInvention()" onmouseout="tooltip.hide();"><table width="62" height="28" background="interface/invention.png"> <tr> <td align="right"><span class="middleright"><font size="2" color="#ffffff">'.$Invention[1].'</font></span></td> </tr> </table></span>
			</table>
			</td> </table></center>
			 ';
			
			echo '	
			<table width="199"  cellpadding="5" cellspacing="0"> 
			 <tr>
			 <td>


		 <span class="hotspot" onmouseover="tooltipOverall()" onmouseout="tooltip.hide();"><table width="199" height="27" background="interface/overall.png"> <tr> <td align="middle"><span class="bottomleft"><font size="1" color="#ffffff">Total Level: '.$Overall[1].'</font></span></td> </tr> </table></span></td>			<table width="199" height="8" background="interface/bottom.png"><tr><td></tr></td></table>

			</table>
			 ';
			
			
			
		}
		else
		{
			  echo '
			  <center>
			  <b>*'.$name.' not found in highscores.</b><br>
			<form action="" method="post">
			<input type="text" name="username" />
			<input type="submit" name="submit" value="Lookup" />
			</form>
			</center>
			';
		}
	}
}
?>

<script type="text/javascript" language="javascript" src="script.js"></script>
<script type="text/javascript" language="javascript">
function tooltipAttack()
{
tooltip.show('<IMG SRC="interface/iattack.png" ALIGN=RIGHT><b>Attack&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Attack[0];?> <br><b>Experience:</b> <?php echo $Attack[2];?>');
}

function tooltipConstitution()
{
tooltip.show('<IMG SRC="interface/iconstitution.png" ALIGN=RIGHT><b>Constitution&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Constitution[0];?> <br><b>Experience:</b> <?php echo $Constitution[2];?>');
}

function tooltipMining()
{
tooltip.show('<IMG SRC="interface/imining.png" ALIGN=RIGHT><b>Mining&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Mining[0];?> <br><b>Experience:</b> <?php echo $Mining[2];?>');
}

//Row Two
function tooltipStrength()
{
tooltip.show('<IMG SRC="interface/istrength.png" ALIGN=RIGHT><b>Strength&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Strength[0];?> <br><b>Experience:</b> <?php echo $Strength[2];?>');
}

function tooltipAgility()
{
tooltip.show('<IMG SRC="interface/iagility.png" ALIGN=RIGHT><b>Agility&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Agility[0];?> <br><b>Experience:</b> <?php echo $Agility[2];?>');
}

function tooltipSmithing()
{
tooltip.show('<IMG SRC="interface/ismithing.png" ALIGN=RIGHT><b>Smithing&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Smithing[0];?> <br><b>Experience:</b> <?php echo $Smithing[2];?>');
}

//Row Three
function tooltipDefence()
{
tooltip.show('<IMG SRC="interface/idefence.png" ALIGN=RIGHT><b>Defence&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Defence[0];?> <br><b>Experience:</b> <?php echo $Defence[2];?>');
}

function tooltipHerblore()
{
tooltip.show('<IMG SRC="interface/iherblore.png" ALIGN=RIGHT><b>Herblore&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Herblore[0];?> <br><b>Experience:</b> <?php echo $Herblore[2];?>');
}

function tooltipFishing()
{
tooltip.show('<IMG SRC="interface/ifishing.png" ALIGN=RIGHT><b>Fishing&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Fishing[0];?> <br><b>Experience:</b> <?php echo $Fishing[2];?>');
}

//Row Four
function tooltipRanged()
{
tooltip.show('<IMG SRC="interface/iranged.png" ALIGN=RIGHT><b>Ranged&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Ranged[0];?> <br><b>Experience:</b> <?php echo $Ranged[2];?>');
}

function tooltipThieving()
{
tooltip.show('<IMG SRC="interface/ithieving.png" ALIGN=RIGHT><b>Thieving&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Thieving[0];?> <br><b>Experience:</b> <?php echo $Thieving[2];?>');
}

function tooltipCooking()
{
tooltip.show('<IMG SRC="interface/icooking.png" ALIGN=RIGHT><b>Cooking&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Cooking[0];?> <br><b>Experience:</b> <?php echo $Cooking[2];?>');
}

//Row Five
function tooltipPrayer()
{
tooltip.show('<IMG SRC="interface/iprayer.png" ALIGN=RIGHT><b>Prayer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Prayer[0];?><br><b>Experience:</b> <?php echo $Prayer[2];?>');
}

function tooltipCrafting()
{
tooltip.show('<IMG SRC="interface/icrafting.png" ALIGN=RIGHT><b>Crafting&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Crafting[0];?> <br><b>Experience:</b> <?php echo $Crafting[2];?>');
}

function tooltipFiremaking()
{
tooltip.show('<IMG SRC="interface/ifiremaking.png" ALIGN=RIGHT><b>Firemaking&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Firemaking[0];?> <br><b>Experience:</b> <?php echo $Firemaking[2];?>');
}

//Row Six
function tooltipMagic()
{
tooltip.show('<IMG SRC="interface/imagic.png" ALIGN=RIGHT><b>Magic&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Magic[0];?> <br><b>Experience:</b> <?php echo $Magic[2];?>');
}

function tooltipFletching()
{
tooltip.show('<IMG SRC="interface/ifletching.png" ALIGN=RIGHT><b>Fletching&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Fletching[0];?> <br><b>Experience:</b> <?php echo $Fletching[2];?>');
}

function tooltipWoodcutting()
{
tooltip.show('<IMG SRC="interface/iwoodcutting.png" ALIGN=RIGHT><b>Woodcutting&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Woodcutting[0];?> <br><b>Experience:</b> <?php echo $Woodcutting[2];?>');
}

//Row Seven
function tooltipRunecrafting()
{
tooltip.show('<IMG SRC="interface/irunecrafting.png" ALIGN=RIGHT><b>Runecrafting&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Runecrafting[0];?> <br><b>Experience:</b> <?php echo $Runecrafting[2];?>');
}

function tooltipSlayer()
{
tooltip.show('<IMG SRC="interface/islayer.png" ALIGN=RIGHT><b>Slayer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Slayer[0];?> <br><b>Experience:</b> <?php echo $Slayer[2];?>');
}

function tooltipFarming()
{
tooltip.show('<IMG SRC="interface/ifarming.png" ALIGN=RIGHT><b>Farming&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Farming[0];?> <br><b>Experience:</b> <?php echo $Farming[2];?>');
}

//Row Eight
function tooltipConstruction()
{
tooltip.show('<IMG SRC="interface/iconstruction.png" ALIGN=RIGHT><b>Construction&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Construction[0];?> <br><b>Experience:</b> <?php echo $Construction[2];?>');
}

function tooltipHunter()
{
tooltip.show('<IMG SRC="interface/ihunter.png" ALIGN=RIGHT><b>Hunter&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Hunter[0];?> <br><b>Experience:</b> <?php echo $Hunter[2];?>');
}

function tooltipSummoning()
{
tooltip.show('<IMG SRC="interface/isummoning.png" ALIGN=RIGHT><b>Summoning&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Summoning[0];?> <br><b>Experience:</b> <?php echo $Summoning[2];?>');
}

//Row Nine

function tooltipDungeoneering()
{
tooltip.show('<IMG SRC="interface/idungeoneering.png" ALIGN=RIGHT><b>Dungeoneering&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Dungeoneering[0];?> <br><b>Experience:</b> <?php echo $Dungeoneering[2];?>');
}

function tooltipDivination()
{
tooltip.show('<IMG SRC="interface/idivination.png" ALIGN=RIGHT><b>Divination&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Divination[0];?> <br><b>Experience:</b> <?php echo $Divination[2];?>');
}

function tooltipInvention()
{
tooltip.show('<IMG SRC="interface/IInvention.png" ALIGN=RIGHT><b>Invention&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Invention[0];?> <br><b>Experience:</b> <?php echo $Invention[2];?>');
}

function tooltipOverall()
{
tooltip.show('<IMG SRC="interface/ioverall.png" ALIGN=RIGHT><b>Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Rank:</b> #<?php echo $Overall[0];?> <br><b>Experience:</b> <?php echo $Overall[2];?>');
}
</script>