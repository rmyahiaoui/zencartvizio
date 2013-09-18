$(document).ready(init);

function init(){
	var content = $("div#content");
	content.append('<p>Sélectionner le nombre d\'équipements en projection interactive  à inclure <select name="nb_salle"></select></p>');
	var sel = $("select[name=nb_salle]");
	for(var i=1;i<=5;i++){
		sel.append('<option value="'+i+'">'+i+'</option>');
	}
	$("select[name=nb_salle]").change(function(){
		var val = $(this).children(":selected").html();
		displayLines(val);
	});
	displayLines(1);
	content.append('<a id="suivant" href="index.php?main_page=quotavi&salle=1&amp;node=equipement" class="button">Suivant</a>');
	$("#suivant").click(function(ev){
		ev.preventDefault();
		saveSalles();
	});
}

function displayLines(val){
	$("div#content").append('<div id="name_salles"></div>');
	var sel = $("#name_salles");
	sel.html("");
	for(var i=1;i<=val;i++){
		sel.append('<p><label>Indiquez le nom de l\'équipement  en projection  interactive '+i+' : </label><input type="text" name="'+i+'" value="équipement '+i+'"/></p>');
	}
	$("#name_salles input").each(
		function(){
			$(this).focus(function(){
				if($(this).val()=="équipement "+$(this).attr('name'))
					$(this).val('');
			})
		});
}

function saveSalles(){
	var salles = $("#name_salles input");
	var datas = {};
	$.each(salles, function(i, k){
		datas[$(k).attr("name")]=$(k).val();
	});
	datas['salles']="save";
	var request = $.ajax({
		url: "../ajax_quotavi.php",
		type: "POST",
		data: datas,
		dataType: "json"
  	});
	request.done(function(data){
		window.location = $("#suivant").attr("href");
	});
}