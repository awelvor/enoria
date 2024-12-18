<html>

<body>
<main style="font-family: sans-serif; font-size:15px;">
<h2 style="text-align: center;">Défunts</h2>
<p style="margin:100px 0 0 0;">Edité à partir de Enoria par {{app.user.Personne.NomComplet}},<br />
- le {{"now"|date("d/m/Y")}}<br />
- {{app.user.entiteActive.nom}}</p>
    <p style="margin:100px 0 0 0;">v1 du 15/12/2024</p>
    <p style="margin:100px 0 0 0;">Ce document effectue un relevé des obsèques célébrées dans un intervalle de temps,
        défini, autour de ce jour, par les options: debut et fin.</p>

    <p style="page-break-before: always; margin: 0 0 0 0;"></p>
{% set listeFunerailles = [] %}
{% set AnneeEnCours = [] %}
{% for personne in personnes %}
{% set listeFunerailles = listeFunerailles|merge([personne.funeraillesdefunt]) %}
{% for f in listeFunerailles %}
{% if f.defunt.id == personne.funeraillesdefunt.defunt.id %}
{% set listeFunerailles = listeFunerailles|sortByField('numacte') %}
{% endif %}
{% endfor %}
{% endfor %}
	
    
    
    {% set formatStart= [options.debut, 'days']|join %}
    {% set formatEnd= [options.fin, 'days']|join %}
    <p>Liste des défunts, depuis le {{"now"|date_modify(formatStart)|date("d/m/Y")}}, jusqu'au {{"now"|date_modify(formatEnd)|date("d/m/Y") }}.</p>
	

	

	<table >
		<tbody>
			

		{% set listeFunerailles = listeFunerailles|sortByField('datecelebration') %}
        {% for f in listeFunerailles %}
		{% for personne in personnes %}		
			{% if f.defunt.id == personne.funeraillesdefunt.defunt.id %}
               {% if (date(f.datecelebration)>= date(formatStart)) and  (date(f.datecelebration)<= date(formatEnd)) %}  
                {% if personne.funeraillesdefunt.defunt.nom is defined %}
            <tr>
    <td style="width: 100px;">{{ f.datecelebration|format_datetime('none','none',pattern='dd/MM') }} </td>
    <td style="width: 200px;">{{ f.reservationsalle.salle.lieu }}</td>
				<td style="width: 300px;">{{ personne.funeraillesdefunt.defunt.prenom }}
		{% if personne.funeraillesdefunt.defunt.particuleNom %}{{ personne.funeraillesdefunt.defunt.particuleNom }} {% endif %} 
                    {{ personne.funeraillesdefunt.defunt.nom }}
                    <span style="margin: 0 0 0 10px;">{{ personne.funeraillesdefunt.defunt.age|transAge }}</span>
                    </td>
</tr>
   {% endif %}  
    {% endif %}
         
			{% endif %}
		{% endfor %}
		{% endfor %}
		</tbody>
	</table>
	
</main>	
</body>
</html>