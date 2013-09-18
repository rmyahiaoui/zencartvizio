$(document).ready(init);

function init(){

	$("select[name=select_products]").each(function(){
		var el = $(this).children(":selected");
		var val = el.attr("value");
		if(val.length>0)
			displayProduct(val, el.attr("class"));
		else{
			$("div."+el.attr("class")).empty();
		}
	});

	$("select[name=select_products]").change(function(){
		var el = $(this).children(":selected");
		var val = el.attr("value");
		if(val.length>0)
			displayProduct(val, el.attr("class"));
		else{
			$("div."+el.attr("class")).empty();
		}
	});
	
	$("a.buy").click(function(ev){
		ev.preventDefault();
		if($(this).hasClass("inc")){
			addProducts(false);
			inc();
		}
		else
			addProducts(true);
	});

	$("a.cDevis").click(function(ev){
		ev.preventDefault();
		creerDevis();
	});

	$("a.lDevis").click(function(ev){
		ev.preventDefault();
		loadDevis();
	});

	$("#precedent").click(function(ev){
		ev.preventDefault();
		window.history.back();
	});
	$("#initEquipement").click(function(ev){
		ev.preventDefault();
		saveEquipement();
	});

	save();
	formatPrice();
	$("#content a.print").click(function(ev){
		ev.preventDefault();
		window.print();
  		return false;
	});
}

function formatPrice(){
	$('#content span.format_price').each(function(){
		var value = $(this).text();
		$(this).text(value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " "));
	});
}

function displayProduct(productId, divID){
	 var request = $.ajax({
		url: "../ajax_quotavi.php",
		type: "POST",
		data: {"id":productId},
		contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
		dataType: "json"
  });
  
  request.done(function(data){
	$.each(data, function(){
		var name = this.name, description = this.desc;
		$("div."+divID).html("<img src='../images/"+ this.illustration+"' width='250' height='250'><div class='devis_product_description'><h2 class='devis_pr_title'>"+this.name+'</h2><strong class="devis_pr_price"><span>Prix:</span>'+this.price+'€</strong><div class="devis_description"><h4>DESCRIPTION:</h4><div class="desc">'+this.desc+'</div></div></div></div>');
		var desc = $("div."+divID+" div.desc");
		if(desc.height()>350){
			desc.attr('class', "devis_descProduct");
			desc.after('<a href="" id="descPlus'+divID+'">Plus</a>');
			$("#descPlus"+divID).click(function(ev){
				ev.preventDefault();
				popup("<h1>"+name+'</h1>'+'<p>'+description+'</p>');
			});
		}
	});
	formatPrice();
   });
}

function popup(data){
  var generator=window.open('','name','height=400,width=500');
  generator.document.write('<html><head><title>Détails produits</title></head><body>');
  generator.document.write(data);
  generator.document.write('</body></html>');
  generator.document.close();
}

function addProducts(bool){
	var i=0;
	var els=$("select[name=select_products]");
	els.each(function(){
		var el = $(this).children(":selected");
		var val = el.attr("value");
		if(val.length>0){
			var request = $.ajax({
				url: "../ajax_quotavi.php",
				type: "POST",
				data: {"id_product":el.attr("value"), "cpt":el.attr("cpt"), "id_salle":GetURLParameter("salle")},
				dataType: "json"
	  		});
	  		request.done(function(data){
	  			i++;
	  			if(i==els.length && bool == true)
	  				window.location = $("#suivant").attr("href");
	  		});
  		}
  		else{
			var request = $.ajax({
				url: "../ajax_quotavi.php",
				type: "POST",
				data: {"remProduct":'1', "cpt":el.attr("cpt"), "id_salle":GetURLParameter("salle")},
				dataType: "json"
	  		});
	  		request.done(function(data){
	  			i++;
	  			if(i==els.length && bool == true)
	  				window.location = $("#suivant").attr("href");
	  		});
  		}
	});
}

function creerDevis(){
	var request = $.ajax({
			url: "../ajax_quotavi.php",
			type: "POST",
			data: {"devis":"create"},
			dataType: "json"
  		});
  		request.done(function(data){
  				window.location = "index.php?main_page=quotavi&node=salles";
  		});
}

function loadDevis(){
	var request = $.ajax({
			url: "../ajax_quotavi.php",
			type: "POST",
			data: {"devis":$("#numDevis").val()},
			dataType: "json"
  		});
  		request.done(function(data){
  				if(data.status=="ok")
  					window.location = "index.php?main_page=quotavi&salle="+data.lSalle+"&node="+data.node;
  				else
  					alert('Aucun devis trouvé');
  		});
}

function inc(){
	var request = $.ajax({
		url: "../ajax_quotavi.php",
		type: "POST",
		data: {},
		dataType: "json"
 	});
	request.done(function(data){
		var salle_n = parseInt(GetURLParameter("salle"));
		if(salle_n+1<=data.nb_salle)
			window.location = "index.php?main_page=quotavi&salle="+(salle_n+1)+"&node=equipement";
		else
			window.location = "index.php?main_page=quotavi&salle="+salle_n+"&node=devis";
	});
}

function GetURLParameter(sParam){
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}

function save(){
	var request = $.ajax({
		url: "../ajax_quotavi.php",
		type: "POST",
		data: {"node": GetURLParameter("node"), "id_salle":GetURLParameter("salle")},
		dataType: "json"
 	});
	request.done(function(data){
	});
}

function saveEquipement(){
	var request = $.ajax({
		url: "../ajax_quotavi.php",
		type: "POST",
		data: {"numSalle": GetURLParameter("salle"), "tableau": checked("input[name='tableau']"), "proj":checked("input[name='proj']"), "ordi": checked("input[name='ordi']"), "logiciel": checked("input[name='logiciel']"), "service": checked("input[name='service']")},
		dataType: "json"
 	});
	request.done(function(data){
		window.location = $("#initEquipement").attr("href");
	});
}

function checked(sel){
	if($(sel).is(':checked'))
		return "ok";
	else
		return "";
}