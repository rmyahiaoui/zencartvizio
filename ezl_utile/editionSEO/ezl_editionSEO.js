// JavaScript Document
//_editor_url = "htmlarea";
//_editor_lang = "fr";

var elementEditeurHTML = null;

function recharger() {
//	self.opener.location.href = self.opener.location.href;
//	window.location.reload();
};

function soumettreForm(fenetre) {
	var form = fenetre.document.getElementById("criteresSelection");
	form.submit();
};

function ouvrirFenEditionHTML(url) {
	var fenetreEditeurHTML = window.open(url, 'fenetreEditeurHTML', 'toolbar=no, location=no, directories=no,status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=800, height=700, left=100, top=100');
//	fenetreEditeurHTML.moveTo(0,0);
};

function preparerEditeurHTML() {
	var config = new HTMLArea.Config(); // create a new configuration object
										// having all the default values
/*	config.width = '90%';
	config.height = '200px';*/
	
	// the following sets a style for the page body (black text on yellow page)
	// and makes all paragraphs be bold by default
/*	config.pageStyle =
	  'body { background-color: yellow; color: black; font-family: verdana,sans-serif } ' +
	  'p { font-width: bold; } ';*/
	
	// the following replaces the textarea with the given id with a new
	// HTMLArea object having the specified configuration
//	HTMLArea.replace('editeurHTML', config);
	elementEditeurHTML = new HTMLArea('editeurHTML', config);
	elementEditeurHTML.generate();
};

function recupererTexteSaisie() {
	var champCacheTransfertTexteHTML = document.getElementById("texte_saisie_pour_POST");
	champCacheTransfertTexteHTML.value = elementEditeurHTML.getHTML();
};

function declancherFermetureFenetre() {
	setTimeout("self.close();", 1000);
//	window.opener.location.reload();
	soumettreForm(window.opener);
};

	