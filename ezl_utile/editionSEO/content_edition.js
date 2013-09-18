var HTMLAreaElement=null;
function remplacerTextArea(id){
	var config = new HTMLArea.Config();
	HTMLAreaElement = new HTMLArea(id, config);
	HTMLAreaElement.generate();
}
function mettreEnCache(id,texte,lg){
	var eltidtxt = document.form_editor.idtxt;
	var eltcache = document.form_editor.cache;
	var eltlangue= document.form_editor.langue;
	eltidtxt.value=id;
	eltcache.value=texte;
	eltlangue.value=lg;
}
function recupererTextArea(id,lg){
	var eltidtxt = document.form_editor.idtxt;
	var eltcache = document.form_editor.cache;
	var eltlangue = document.form_editor.langue;
	eltidtxt.value=id;
	eltcache.value=document.getElementById('editeurHTML').value;
	eltlangue.value=lg;
}
function recupererHTMLAreaText(id,lg){
	var eltidtxt = document.form_editor.idtxt;
	var eltcache = document.form_editor.cache;
	var eltlangue = document.form_editor.langue;
	eltidtxt.value=id;
	eltcache.value = HTMLAreaElement.getHTML();
	eltlangue.value=lg;
}