var num=1;

function adelante() { 
	num++;
	if(num>7) 
		num=1
		var foto=document.getElementById("foto");
		foto.src="foto"+num+".jpg";

	}

function atras() { 
	num--;
	if(num<1) 
		num=7
		var foto=document.getElementById("foto");
		foto.src="foto"+num+".jpg";

	}


