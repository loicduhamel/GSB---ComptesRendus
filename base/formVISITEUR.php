<html>
   <head>
      <title>formulaire VISITEUR</title>
      <style type="text/css">
         body {background-color: white; color:5599EE; } 
         .titre { width : 180 ;  clear:left; float:left; } 
         .zone { width : 30car ; float : left; color:7091BB }
      </style>
   </head>
   <body>
      <div name="haut" style="margin: 2 2 2 2 ;height:6%;">
         <h1><img src="logo.jpg" width="100" height="60"/>Gestion des visites</h1>
      </div>
      <div name="gauche" style="float:left;width:18%; background-color:white; height:100%;">
         <h2>Outils</h2>
         <ul>
            <li>Comptes-Rendus</li>
            <ul>
               <li><a href="formRAPPORT_VISITE.htm" >Nouveaux</a></li>
               <li>Consulter</li>
            </ul>
            <li>Consulter</li>
            <ul>
               <li><a href="formMEDICAMENT.htm" >M�dicaments</a></li>
               <li><a href="formPRATICIEN.htm" >Praticiens</a></li>
               <li><a href="formVISITEUR.htm" >Autres visiteurs</a></li>
            </ul>
         </ul>
      </div>
      <div name="droite" style="float:left;width:80%;">
         <div name="bas" style="margin : 10 2 2 2;clear:left;background-color:77AADD;color:white;height:88%;">
            <form name="formVISITEUR" method="post" action="recupVISITEUR.php">
               <h1> Visiteurs </h1>
               <select name="lstDept" class="titre">
                  <option value="">D�partement</option>
                  <option value="01">Ain</option>
               </select>
               <select name="lstVisiteur" class="zone">
                  <option value="a131">Villechalane</option>
               </select>
               <label class="titre">NOM :</label><input type="text" size="25" name="VIS_NOM" class="zone" />
               <label class="titre">PRENOM :</label><input type="text" size="50" name="Vis_PRENOM" class="zone" />
               <label class="titre">ADRESSE :</label><input type="text" size="50" name="VIS_ADRESSE" class="zone" />
               <label class="titre">CP :</label><input type="text" size="5" name="VIS_CP" class="zone" />
               <label class="titre">VILLE :</label><input type="text" size="30" name="VIS_VILLE" class="zone" />
               <label class="titre">SECTEUR :</label><input type="text" size="1" name="SEC_CODE" class="zone" />
               <label class="titre">&nbsp;</label><input class="zone"type="button" value="<"></input><input class="zone"type="button" value=">"></input>
            </form>
         </div>
      </div>
   </body>
</html>