

function gradient(id, level)
{
	var box = document.getElementById(id);
	box.style.opacity = level;
	box.style.MozOpacity = level;
	box.style.KhtmlOpacity = level;
	box.style.filter = "alpha(opacity=" + level * 100 + ")";
	box.style.display="block";
	return;
}


function fadein(id) 
{
	var level = 0;
	while(level <= 1)
	{
		setTimeout( "gradient('" + id + "'," + level + ")", (level* 1000) + 10);
		level += 0.01;
	}
}


// Open the lightbox


function openbox(formtitle, fadin,id)
{
if(id=="box1")
closebox("box");

 var box = document.getElementById(id);
	 
  document.getElementById('shadowing').style.display='block';

  var btitle = document.getElementById('boxtitle');

  btitle.innerHTML = formtitle;
  
  if(fadin)
  {
	 gradient(id, 0);
	 fadein(id);
  }
  else
  { 	
    box.style.display='block';
  }  

}


// Close the lightbox

function closebox(id)
{
   document.getElementById(id).style.display='none';
   document.getElementById('shadowing').style.display='none';
}



