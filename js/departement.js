/* Requetes AJAX pour recuperer toute les données de la base concernant les médecins */
function loadData(annuaireData){

	$.ajax({
		url: 'module/RecupData.php',
		type: 'GET',
		data: {
			'annuaireData':annuaireData,
		},
		success: function(data) {

			var listeMedecin=JSON.parse(data);
			GenerateTableau(listeMedecin);
		}
	});
}

/* Requetes AJAX pour recupere tout les département de France */ 

function loadDepartement(annuaireDep){

	$.ajax({
		url:'module/RecupDep.php',
		type: 'GET',
		data: {
			'annuaireDep':annuaireDep,
		},
		success: function(data){
			var listeDepartement=JSON.parse(data);
			GenerateListe(listeDepartement);
		}
	});
}

/* Function qui place les départements dans le menu déroulant automatiquement */ 
function GenerateListe(listeDepartement){
	var listeAuto;
	console.log(listeDepartement);
	listeAuto='<option selected>Tous les departements';
	for(i=0; i<listeDepartement.length; i++) {
		listeAuto+='<option value='+listeDepartement[i].CP+'>'+listeDepartement[i].CP+'-'+listeDepartement[i].Nom;
	}
	
	document.getElementById('departement').innerHTML=listeAuto;
};

/* Function avec boucle for pour que le tableau ce genère tout seul en fonction du nombre de data */
function GenerateTableau(listeMedecin){
	var tableauAuto;
	var e = document.getElementById("departement");
	var value = e.options[e.selectedIndex].value;
	console.log(listeMedecin);

	tableauAuto=`<div class="table-responsive"><table class="table table-striped" id="tableau"><thead>
	<tr><th scope="col">Nom</th>
	<th scope="col">Prénom</th>
	<th scope="col">Adresse</th>
	<th scope="col">Téléphone</th>
	<th scope="col">Spécialité médicale</th></tr></thead><tbody>`;
	
	for(i=0; i<listeMedecin.length; i++) {		
		if(listeMedecin[i].Departement == value || value =="Tous les departements"){			
			tableauAuto+=`<tr><td>`+listeMedecin[i].Nom+`</td>
			<td>`+listeMedecin[i].Prenom+`</td>
			<td>`+listeMedecin[i].Adresse+`</td>
			<td>`+listeMedecin[i].Tel+`</td>
			<td>`+listeMedecin[i].Specialite+`</td>`;
		}
	}
	tableauAuto+='</tbody></table>'
	document.getElementById('tableau').innerHTML=tableauAuto;
};

/* Event Listener sur le menu deroulant */ 

document.addEventListener('DOMContentLoaded', function(event){
	var comp = document.querySelector('#departement');
	comp.addEventListener('change', function(event){
		loadData();
	});
});

