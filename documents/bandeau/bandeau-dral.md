{# 1 - Initialisation #}


{% set npage =  0                                                     %}
{% set nBandeau =  0                                                  %}
{% set rows=[]                                                        %}
{% set dateDepot = "now"|date("d/m/Y", "Europe/Paris")                %}
{% set dateDist  = "now"|date("d/m/Y", "Europe/Paris")                %}
{% set thebac    = 0                                                  %}

{# 2 - Variable Globales         #}
{%         if (options.mybac=='Sept'  ) %}{% set thebac=7 %}
    {% elseif (options.mybac=='Six'   ) %}{% set thebac=6 %}
    {% elseif (options.mybac=='Cinq'  ) %}{% set thebac=5 %}
    {% elseif (options.mybac=='Quatre') %}{% set thebac=4 %}
    {% elseif (options.mybac=='Trois' ) %}{% set thebac=3 %}
    {% elseif (options.mybac=='Deux'  ) %}{% set thebac=2 %}
    {% else                             %}{% set thebac=1 %}
    {% endif                            %}
    
    {%     if (options.mydepot=='Sept'  ) %}{% set dateDepot = "now"|date_modify("+7 day")|date("d/m/Y", "Europe/Paris")                %}
    {% elseif (options.mydepot=='Six'   ) %}{% set dateDepot = "now"|date_modify("+6 day")|date("d/m/Y", "Europe/Paris")                %}
    {% elseif (options.mydepot=='Cinq'  ) %}{% set dateDepot = "now"|date_modify("+5 day")|date("d/m/Y", "Europe/Paris")                %}
    {% elseif (options.mydepot=='Quatre') %}{% set dateDepot = "now"|date_modify("+4 day")|date("d/m/Y", "Europe/Paris")                %}
    {% elseif (options.mydepot=='Trois' ) %}{% set dateDepot = "now"|date_modify("+3 day")|date("d/m/Y", "Europe/Paris")                %}
    {% elseif (options.mydepot=='Deux'  ) %}{% set dateDepot = "now"|date_modify("+2 day")|date("d/m/Y", "Europe/Paris")                %}
    {% elseif (options.mydepot=='Un'    ) %}{% set dateDepot = "now"|date_modify("+1 day")|date("d/m/Y", "Europe/Paris")                %}
    {% else                               %}{% set dateDepot = "now"|date_modify("+0 day")|date("d/m/Y", "Europe/Paris")                %}
    {% endif                            %}

    {%     if (options.mydist=='Dix'   ) %}{% set dateDist = "now"|date_modify("+10 day")|date("d/m/Y", "Europe/Paris")                %}
    {% elseif (options.mydist=='Neuf'  ) %}{% set dateDist = "now"|date_modify("+9 day")|date("d/m/Y", "Europe/Paris")                %}
    {% elseif (options.mydist=='Huit'  ) %}{% set dateDist = "now"|date_modify("+8 day")|date("d/m/Y", "Europe/Paris")                %}
    {% elseif (options.mydist=='Sept'  ) %}{% set dateDist = "now"|date_modify("+7 day")|date("d/m/Y", "Europe/Paris")                %}
    {% elseif (options.mydist=='Six'   ) %}{% set dateDist = "now"|date_modify("+6 day")|date("d/m/Y", "Europe/Paris")                %}
    {% elseif (options.mydist=='Cinq'  ) %}{% set dateDist = "now"|date_modify("+5 day")|date("d/m/Y", "Europe/Paris")                %}
    {% elseif (options.mydist=='Quatre') %}{% set dateDist = "now"|date_modify("+4 day")|date("d/m/Y", "Europe/Paris")                %}
    {% elseif (options.mydist=='Trois' ) %}{% set dateDist = "now"|date_modify("+3 day")|date("d/m/Y", "Europe/Paris")                %}
    {% elseif (options.mydist=='Deux'  ) %}{% set dateDist = "now"|date_modify("+2 day")|date("d/m/Y", "Europe/Paris")                %}
    {% elseif (options.mydist=='Un'    ) %}{% set dateDist = "now"|date_modify("+1 day")|date("d/m/Y", "Europe/Paris")                %}
    {% else                              %}{% set dateDist = "now"|date_modify("+0 day")|date("d/m/Y", "Europe/Paris")                %}
    {% endif                            %}

 
{# 3 - Lecture table inscritions -> construction table rows   #}

    
{% for inscription  in inscriptions %}
 
    {% set abonne = 0 %}
    {% set bac = 0 %}
    {% set fin_abonnement = "" %}
    {% set pm = false %}
    {% set centreDist = "" %}
    {% set tourneeFacteur = 0 %}
    {% set dist = "" %}
    {% set personneMorale = "" %}
    {% set bac = 0      %}
    {% for value in inscription.valuesExtras %}
    {%     if value.champExtra.id==47010 %}{% set fin_abonnement = value.valueChampExtraGroupe %}
    {% elseif value.champExtra.id==47013 %}{% set abonne         = value.valueChampExtraGroupe %}
    {% elseif value.champExtra.id==47426 %}{% set bac            = value.valueChampExtraGroupe %}
    {% elseif value.champExtra.id==47077 %}{% set dist           = value.valueChampExtraGroupe %}
    {% elseif value.champExtra.id==47078 %}{% set centreDist     = value.valueChampExtraGroupe %}
    {% elseif value.champExtra.id==47087 %}{% set tourneeFacteur = value.valueChampExtraGroupe %}
    {% elseif value.champExtra.id==57457 %}{% set personneMorale = value.valueChampExtraGroupe %}
    {% endif %}
    {% endfor %}


{% if     (bac==thebac) %}
{% if  (date(fin_abonnement) >= date('-30days')) or (fin_abonnement|length <= 10)    %}

{% set nBandeau = nBandeau +1     %}
                                            
{% set ligne=[{
dateDepot:dateDepot,
dateDist:dateDist,
titre:inscription.personne.titre,
nom:inscription.personne.nom,
prenom:inscription.personne.prenom,
fin_abo:fin_abonnement,
abonne:abonne,
bac:bac,
personneMorale:personneMorale,
numeroRue:inscription.personne.membrefoyer[0].adressePostale.numeroRue,
rue:inscription.personne.membrefoyer[0].adressePostale.rue,
complementAdresse:inscription.personne.membrefoyer[0].adressePostale.complementAdresse,
cp:inscription.personne.membrefoyer[0].adressePostale.cp,
ville:inscription.personne.membrefoyer[0].adressePostale.ville,
dist:dist,
tourneeFacteur:tourneeFacteur,
centreDist:centreDist
}] %}

{% set rows = rows|merge(ligne) %}
{% endif %}
{% endif %}


    {% endfor %}

    
    {# 4 - Affichage                   #}
     
    
<div style=" font-family: sans-serif;font-size: 15px;margin: -90px 0 -90px 0;padding:0 0 0 0 0;border:0px;">
<h2 style="color:red; text-align:center">Paroisse Bonne Nouvelle - LANNION</h2>
<h1 style="margin: 100px 0 0 0"> Bandeau Adresses DRAL  </h1>
<h2 style="margin: 100px 0 0 0">  09/12/2024</h2>
    <p>Les abonnements échus ne sont plus inclus dans cette liste.</p>
    <p>Ce fichier comporte {{ nBandeau }} bandeaux.
     
<h3 style="margin: 100px 0 0 0; font-weight: normal;">Edité à partir de Enoria par {{app.user.Personne.NomComplet}}, le {{"now"|date("d/m/Y")}} - {% if "Paroisse" in app.user.entiteActive.nom %}{{app.user.entiteActive.nom}}{% else %}Paroisse {{app.user.entiteActive.nom}}{% endif %}</h3>
	
{# for row in rows #}
{% for row in rows|sort((a, b) => a.tourneeFacteur >= b.tourneeFacteur) %}
    
    
   
{% set npage = npage +1     %}
{% if npage is odd %}  <p style="page-break-before: always; margin: 0 0 0 0;"></p>{% endif %}
    
    
    
<table style="font-family: sans-serif;font-size: 15px; margin: 0 0 0 200px;"><tr>
<td style="width: 220px;">
<div style="text-align: right; margin: -30px 0 0 0;">
     Déposé le {{ dateDepot}}<br />
    A distribuer avant le {{ dateDist }}
</div>
<div style="margin: 20px 0 0 0;">D'UNE RIVE A L'AUTRE</div>
<div style="font-size: 13px;">Paroisse de la Bonne Nouvelle</div>
<div style="font-size: 13px;">1, rue Saint Yves</div>
<div style="font-size: 13px;">22300 LANNION</div>
</td>
<td style="width:10px;"></td>
<td style="width: 200px;">
<div>LANNION PDC1</div>
<div style="font-size: 80px;  font-weight: bold; margin: -50px 0 0 0;">P4</div>
<div style=" margin: -20px 0 0 0;">LA POSTE</div>
<div style="font-size: 13px;">DISPENSE DE TIMBRAGE</div>
</td>
</tr></table>
<div style="margin:0 0 0 200px;">----------------------------------------------------------</div>

{# tableau 1 ligne, 2 colonnes #}
<table style="font-family: sans-serif;font-size: 15px;margin:0 0 0 300px;">
<tr>
<td style="width:150px;"><div style="margin: 0 0 0 0;">{{ row.abonne }}</div></td>
<td>1 -<span style="font-weight: bold">{{ row.bac }}</span></td>
</tr>
</table>
    
<div style="font-family: sans-serif;font-size: 15px;margin: 0 0 0 300px;">
   
     {% if  (row.personneMorale!="Oui")  %}
    {% if (row.fin_abo|length == 10) %}
    {% if (date(row.fin_abo) >= date())  %}
     Votre abonnement se termine le <span style="background-color: yellow;">{{ row.fin_abo|date("d/m/Y") }}</span>
    {% else %}
    Votre abonnement est échu depuis le <span style="background-color: yellow;">{{ row.fin_abo|date("d/m/Y") }}</span>,  pensez à le renouveler.
    {% endif %}
    {% endif %}
    {% endif %}
    
    
    
    </div>
<div style="font-family: sans-serif;font-size: 15px;margin: 0 0 0 300px;"><strong>{% if (row.personneMorale!="Oui") %}{{row.titre}} {% endif %}{{row.prenom}} {{row.nom}}</strong></div>
<div style="font-family: sans-serif;font-size: 15px;margin: 0 0 0 300px;">{{row.numeroRue}} {{row.rue}} {{row.complementAdresse}}</div>
<div style="font-family: sans-serif;font-size: 15px;margin: 0 0 0 300px;">{{row.cp}} {{row.ville|upper }}
      
    
 
       </div>
 <div style="margin: 0 0 0 300px;">-------------------------------------------</div>

<div style="margin: 0 0 0 300px;">{{ row.cp }} {{ row.dist }}   <span style="margin:100px;">  {{ row.tourneeFacteur }}</span> </div>
  
<div style="margin: 0 0 65px 300px;">{{ row.centreDist }}</div>
 
     

{% endfor %}



</div>
