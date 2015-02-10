var xml = getXMLObject();
var add = 0; // variabila prin care controlez daca sa adauge sau nu text;
var message = ''; // variabila prin care controlez textul ce urmeaza a fi adaugat;
var numRows = 10; // numarul de mesaje ce urmeaza a fi afisate
var deleteId = 0; // id-ul randului ce urmeaza a fi sters;
var mail = ''; // retine mailul userului;
var initPage = 1; // variabila care este 1 pentru afisarea datelor cand pagina este deschisa, 0 in rest. Mai precis modifica query-ul
var firstId = 0; // primul id al paragrafului;
var lastId = 0; // ultimul id al paragrafului;
var maxNumRows = 29; // numarul maxim de paragrafe afiaste
var toAdd = 0;

// functie care se ocupa de eventul onclick al butonului send din body.php
function buttonOnClick(){
	add = 1;
	toAdd = 1;
	message = document.getElementById('message').value;
	document.getElementById('message').value = "";
	document.getElementById('message').focus();
	
	destroyXMLRequest();
	timer = setInterval(function(){sendRequest();},2000);
}

function getXMLObject(){
	
	try{
		request = new XMLHttpRequest();
	}catch(err1){
		try{
			request = new ActiveXObject('Microsoft.XMLHTTP')
		}catch(err2){
			try{
				request = new ActiveXObject('Msxml2.XMLHTTP');
			}catch(err3){
				request = false;
			}
		}
	}
	
	return request;
}

var timer = setInterval(function(){sendRequest();},2000);
// send info
function sendRequest(){
	
	
	if(xml.readyState == 0 || xml.readyState == 4){
		pgraphs = document.getElementById("content").getElementsByTagName('p');// creez un vector in care am paragrafele din pagina
		
		if(pgraphs.length > 0) {// daca exista vreun paragraf;
			firstId = pgraphs.item(pgraphs.length-1).getAttribute('numId');
		}
		
		myurl = 'second.php'; // linkul de la care se asteapta raspuns
		xml.onreadystatechange = receiveInfo;
		
		if(add == 1 && message !='') {// daca butonul a fost apasat si mesajul nu e null
			xml.open('POST', myurl, false);
			xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xml.send("message="+message+"&firstId="+firstId);
			
			
		}else {
			if(lastId == 0)
				xml.open('POST', myurl, true);
			else xml.open('POST', myurl, false);
			
			xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xml.send("initPage="+initPage+"&firstId="+firstId + "&lastId="+lastId);
			
		}
		
		initPage = 0;
		deleteId = 0;
		
		// resetez variabilele
		if(add == 1){
			add = 0; 
			message = '';
		}
		
	}
	
}




// functie care primeste raspunsul xml
function receiveInfo(){

	if(xml.readyState == 4){
		//alert(xml.readyState + " " + xml.status);
		if(xml.status == 200){
			result  = xml.responseXML;
			root = result.documentElement;
			response = root.getElementsByTagName('response');
			numRows = root.getElementsByTagName('numRows').item(0).firstChild.data; // numarul de randuri
			mail = root.getElementsByTagName('mail').item(0).firstChild.data; // emailul userului
			newResult = root.getElementsByTagName('newResult').item(0).firstChild.data; //daca a fost sau nu adaugat text nou
			if(response.length !=0){// daca se primeste raspuns
				getAllElements();
			}
			
			if(lastId != 0) lastId = 0;
			
		}
	}
	
	
}

//functie care afiseaza raspunsul primit

function getAllElements(){
	
	for(var i=0; i<response.length; i++){
	
		
		pgraphs = document.getElementById("content").getElementsByTagName('p'); // formez vectorul cu toate elementele de tip paragraf
		
		id = response.item(i).getElementsByTagName('id');
		user = response.item(i).getElementsByTagName('user');
		text = response.item(i).getElementsByTagName('text');
		email = response.item(i).getElementsByTagName('email');
		
		id_value = id.item(0).firstChild.data;
		user_value = user.item(0).firstChild.data;
		text_value = text.item(0).firstChild.data;
		email_value = email.item(0).firstChild.data;
		
		p = document.createElement('p');// creez noul paragraf
		p.innerHTML = id_value + " "+user_value + ' : ' + text_value ;
		p.style.width = 330; // latimea unui paragraf
		
		// adauga imaginea cu "x" pentru delete
		if(mail == email_value){
			img = document.createElement('img');
			img.src="img/close.png";
			img.width = "15";
			img.height = "15";
			p.appendChild(img);
			img.setAttribute('numId', id_value);
			//img.setAttribute('index', i);
			img.addEventListener('click',function(){imageOnClick(this);},false);
		}

		if(toAdd == 0 && newResult == 0)
			document.getElementById('content').insertBefore(p,pgraphs.item(0)); // adaugarea paragrafului
		else {
			
			document.getElementById('content').appendChild(p);
		}
		
		p.setAttribute('numId', id_value);
		
		
		
	}
	
	pgraphs = document.getElementById("content").getElementsByTagName("p");
	//daca numarul de mesaje e mai mare decat numarul de linii din baza de date, ascund butonul de loadMOre
	if(maxNumRows < pgraphs.length) {
			var loadMore = document.getElementById('loadMore');
			loadMore.style.display ="none";
	}
	
	if(toAdd == 1){
		toAdd = 0;
	}
	
	if(newResult){
		document.getElementById('content').scrollTop = document.getElementById('content').scrollHeight;
	}
}



// functie care opreste conexiunea cu serverul
function destroyXMLRequest(){
	clearInterval(timer);
	xml.abort();
}

//mareste numarul de mesaje afisate
function increaseNumMessages(){
	numRows +=10;
	pgraphs = document.getElementsByTagName('p'); // creez un vector in care am paragrafele din pagina
	lastId = pgraphs.item(1).getAttribute('numId');
	destroyXMLRequest();
	timer = setInterval(function(){sendRequest();},2000);
	
}
function imageOnClick(obj){
	destroyXMLRequest();
	deleteId = obj.getAttribute('numId'); // retin id-ul paragrafului ce trebuie sters;
	
	pgraphs = document.getElementsByTagName('p');
	for(var i=0; i<pgraphs.length; i++){
		var id  = pgraphs.item(i).getAttribute("numId");
		if(id ==  deleteId){
			pgraphs[i].parentNode.removeChild(pgraphs[i]);
			break;
		}
	}
	
	
	myurl = 'second.php'; // linkul de la care se asteapta raspuns
	xml.open('POST', myurl, false);
	xml.onreadystatechange = receiveInfoDelete;
	xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xml.send("deleteId="+deleteId);
	
	
	
}

//functie pentru deleteMessage, mai exact pt onreadystatechange;
function receiveInfoDelete(){

	if(xml.readyState == 4){
		//alert(xml.readyState + " " + xml.status);
		if(xml.status == 200){
			alert("Done")
			timer = setInterval(function(){sendRequest();},2000);
		}
	}

}

window.onload = textAreaFunction;

function textAreaFunction(){
	textArea = document.getElementById('message');
	textArea.addEventListener("focus",function(){textArea.innerHTML = "";},false);
}




