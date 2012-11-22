var tooltip=function(){
	var id = 'tt';
	var top = 3;
	var left = 3;
	var maxw = 300;
	var speed = 10;
	var timer = 20;
	var endalpha = 95;
	var alpha = 0;
	var tt,t,c,b,h;
	var ie = document.all ? true : false;
	return{
		show:function(v,w){
			if(tt == null){
				tt = document.createElement('div');
				tt.setAttribute('id',id);
				t = document.createElement('div');
				t.setAttribute('id',id + 'top');
				c = document.createElement('div');
				c.setAttribute('id',id + 'cont');
				b = document.createElement('div');
				b.setAttribute('id',id + 'bot');
				tt.appendChild(t);
				tt.appendChild(c);
				tt.appendChild(b);
				document.body.appendChild(tt);
				tt.style.opacity = 0;
				tt.style.filter = 'alpha(opacity=0)';
				document.onmousemove = this.pos;
			}
			tt.style.display = 'block';
			c.innerHTML = v;
			tt.style.width = w ? w + 'px' : 'auto';
			if(!w && ie){
				t.style.display = 'none';
				b.style.display = 'none';
				tt.style.width = tt.offsetWidth;
				t.style.display = 'block';
				b.style.display = 'block';
			}
			if(tt.offsetWidth > maxw){tt.style.width = maxw + 'px'}
			h = parseInt(tt.offsetHeight) + top;
			clearInterval(tt.timer);
			tt.timer = setInterval(function(){tooltip.fade(1)},timer);
		},
		pos:function(e){
			var u = ie ? event.clientY + document.documentElement.scrollTop : e.pageY;
			var l = ie ? event.clientX + document.documentElement.scrollLeft : e.pageX;
			tt.style.top = (u - h) + 'px';
			tt.style.left = (l + left) + 'px';
		},
		fade:function(d){
			var a = alpha;
			if((a != endalpha && d == 1) || (a != 0 && d == -1)){
				var i = speed;
				if(endalpha - a < speed && d == 1){
					i = endalpha - a;
				}else if(alpha < speed && d == -1){
					i = a;
				}
				alpha = a + (i * d);
				tt.style.opacity = alpha * .01;
				tt.style.filter = 'alpha(opacity=' + alpha + ')';
			}else{
				clearInterval(tt.timer);
				if(d == -1){tt.style.display = 'none'}
			}
		},
		hide:function(){
			clearInterval(tt.timer);
			tt.timer = setInterval(function(){tooltip.fade(-1)},timer);
		}
	};
}();

function tooltipAttack()
{
tooltip.show('<IMG SRC="interface/iattack.png" ALIGN=RIGHT><b>Attack<br>Rank:</b> <?php echo $Attack[0];?> <br><b>Experience:</b> <?php echo $Attack[2];?>');
}

function tooltipConstitution()
{
tooltip.show('<IMG SRC="interface/iconstitution.png" ALIGN=RIGHT><b>Constitution<br>Rank:</b> <?php echo $Constitution[0];?> <br><b>Experience:</b> <?php echo $Constitution[2];?>');
}

function tooltipMining()
{
tooltip.show('<IMG SRC="interface/imining.png" ALIGN=RIGHT><b>Mining<br>Rank:</b> <?php echo $Mining[0];?> <br><b>Experience:</b> <?php echo $Mining[2];?>');
}

//Row Two
function tooltipStrength()
{
tooltip.show('<IMG SRC="interface/istrength.png" ALIGN=RIGHT><b>Strength<br>Rank:</b> <?php echo $Strength[0];?> <br><b>Experience:</b> <?php echo $Strength[2];?>');
}

function tooltipAgility()
{
tooltip.show('<IMG SRC="interface/iagility.png" ALIGN=RIGHT><b>Agility<br>Rank:</b> <?php echo $Agility[0];?> <br><b>Experience:</b> <?php echo $Agility[2];?>');
}

function tooltipSmithing()
{
tooltip.show('<IMG SRC="interface/ismithing.png" ALIGN=RIGHT><b>Smithing<br>Rank:</b> <?php echo $Smithing[0];?> <br><b>Experience:</b> <?php echo $Smithing[2];?>');
}

//Row Three
function tooltipDefence()
{
tooltip.show('<IMG SRC="interface/idefence.png" ALIGN=RIGHT><b>Defence<br>Rank:</b> <?php echo $Defence[0];?> <br><b>Experience:</b> <?php echo $Defence[2];?>');
}

function tooltipHerblore()
{
tooltip.show('<IMG SRC="interface/iherblore.png" ALIGN=RIGHT><b>Herblore<br>Rank:</b> <?php echo $Herblore[0];?> <br><b>Experience:</b> <?php echo $Herblore[2];?>');
}

function tooltipFishing()
{
tooltip.show('<IMG SRC="interface/ifishing.png" ALIGN=RIGHT><b>Fishing<br>Rank:</b> <?php echo $Fishing[0];?> <br><b>Experience:</b> <?php echo $Fishing[2];?>');
}

//Row Four
function tooltipRanged()
{
tooltip.show('<IMG SRC="interface/iranged.png" ALIGN=RIGHT><b>Ranged<br>Rank:</b> <?php echo $Ranged[0];?> <br><b>Experience:</b> <?php echo $Ranged[2];?>');
}

function tooltipThieving()
{
tooltip.show('<IMG SRC="interface/ithieving.png" ALIGN=RIGHT><b>Thieving<br>Rank:</b> <?php echo $Thieving[0];?> <br><b>Experience:</b> <?php echo $Thieving[2];?>');
}

function tooltipCooking()
{
tooltip.show('<IMG SRC="interface/icooking.png" ALIGN=RIGHT><b>Cooking<br>Rank:</b> <?php echo $Cooking[0];?> <br><b>Experience:</b> <?php echo $Cooking[2];?>');
}

//Row Five
function tooltipPrayer()
{
tooltip.show('<IMG SRC="interface/iprayer.png" ALIGN=RIGHT><b>Prayer<br>Rank:</b> <?php echo $Prayer[0];?> <br><b>Experience:</b> <?php echo $Prayer[2];?>');
}

function tooltipCrafting()
{
tooltip.show('<IMG SRC="interface/icrafting.png" ALIGN=RIGHT><b>Crafting<br>Rank:</b> <?php echo $Crafting[0];?> <br><b>Experience:</b> <?php echo $Crafting[2];?>');
}

function tooltipFiremaking()
{
tooltip.show('<IMG SRC="interface/ifiremaking.png" ALIGN=RIGHT><b>Firemaking<br>Rank:</b> <?php echo $Firemaking[0];?> <br><b>Experience:</b> <?php echo $Firemaking[2];?>');
}

//Row Six
function tooltipMagic()
{
tooltip.show('<IMG SRC="interface/imagic.png" ALIGN=RIGHT><b>Magic<br>Rank:</b> <?php echo $Magic[0];?> <br><b>Experience:</b> <?php echo $Magic[2];?>');
}

function tooltipFletching()
{
tooltip.show('<IMG SRC="interface/ifletching.png" ALIGN=RIGHT><b>Fletching<br>Rank:</b> <?php echo $Fletching[0];?> <br><b>Experience:</b> <?php echo $Fletching[2];?>');
}

function tooltipWoodcutting()
{
tooltip.show('<IMG SRC="interface/iwoodcutting.png" ALIGN=RIGHT><b>Woodcutting<br>Rank:</b> <?php echo $Woodcutting[0];?> <br><b>Experience:</b> <?php echo $Woodcutting[2];?>');
}

//Row Seven
function tooltipRunecrafting()
{
tooltip.show('<IMG SRC="interface/irunecrafting.png" ALIGN=RIGHT><b>Runecrafting<br>Rank:</b> <?php echo $Runecrafting[0];?> <br><b>Experience:</b> <?php echo $Runecrafting[2];?>');
}

function tooltipSlayer()
{
tooltip.show('<IMG SRC="interface/islayer.png" ALIGN=RIGHT><b>Slayer<br>Rank:</b> <?php echo $Slayer[0];?> <br><b>Experience:</b> <?php echo $Slayer[2];?>');
}

function tooltipFarming()
{
tooltip.show('<IMG SRC="interface/ifarming.png" ALIGN=RIGHT><b>Farming<br>Rank:</b> <?php echo $Farming[0];?> <br><b>Experience:</b> <?php echo $Farming[2];?>');
}

//Row Eight
function tooltipConstruction()
{
tooltip.show('<IMG SRC="interface/iconstruction.png" ALIGN=RIGHT><b>Construction<br>Rank:</b> <?php echo $Construction[0];?> <br><b>Experience:</b> <?php echo $Construction[2];?>');
}

function tooltipHunter()
{
tooltip.show('<IMG SRC="interface/ihunter.png" ALIGN=RIGHT><b>Hunter<br>Rank:</b> <?php echo $Hunter[0];?> <br><b>Experience:</b> <?php echo $Hunter[2];?>');
}

function tooltipSummoning()
{
tooltip.show('<IMG SRC="interface/isummoning.png" ALIGN=RIGHT><b>Summoning<br>Rank:</b> <?php echo $Summoning[0];?> <br><b>Experience:</b> <?php echo $Summoning[2];?>');
}

//Row Nine

function tooltipDungeoneering()
{
tooltip.show('<IMG SRC="interface/idungeoneering.png" ALIGN=RIGHT><b>Dungeoneering   <br>Rank:</b> <?php echo $Dungeoneering[0];?> <br><b>Experience:</b> <?php echo $Dungeoneering[2];?>');
}

function tooltipOverall()
{
tooltip.show('<IMG SRC="interface/ioverall.png" ALIGN=RIGHT><b>Total<br>Rank:</b> <?php echo $Overall[0];?> <br><b>Experience:</b> <?php echo $Overall[2];?>');
}