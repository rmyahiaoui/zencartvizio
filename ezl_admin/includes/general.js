function SetFocus() {
  if (document.forms.length > 0) {
    var field = document.forms[0];
    for (i=0; i<field.length; i++) {
      if ( (field.elements[i].type != "image") &&
           (field.elements[i].type != "hidden") &&
           (field.elements[i].type != "reset") &&
           (field.elements[i].type != "submit") ) {

        document.forms[0].elements[i].focus();

        if ( (field.elements[i].type == "text") ||
             (field.elements[i].type == "password") )
          document.forms[0].elements[i].select();

        break;
      }
    }
  }
}

function rowOverEffect(object) {
  if (object.className == 'dataTableRow') object.className = 'dataTableRowOver';
}

function rowOutEffect(object) {
  if (object.className == 'dataTableRowOver') object.className = 'dataTableRow';
}

function affiche_onglet(onglet, typetexte)
  {
    var arrayOnglet = ['ongletPresentation', 'ongletAvantages', 'ongletCaracTech', 'ongletLogiAssoc', 'ongletAccessAssoc', 'ongletAppliAssoc'];
    var arrayBlocText = ['productDescription','productAvantages', 'productCaracTech', 'productLogiAssoc', 'productAccesAssoc', 'productAppliAssoc'];
    for (var i = 0; i < 6; i++) {

      if (arrayOnglet[i] != onglet) {
        document.getElementById(arrayOnglet[i]).style.backgroundColor ='white';
        document.getElementById(arrayOnglet[i]).style.zIndex ='998';
        document.getElementById(arrayOnglet[i]).style.borderBottom ='1px solid grey';
          if (arrayBlocText[i] != typetexte) {
            document.getElementById(arrayBlocText[i]).style.display ='none';
          }
      }

    }
    document.getElementById(typetexte).style.display ='block';
    document.getElementById(onglet).style.backgroundColor ='#ccc';
    document.getElementById(onglet).style.zIndex ='999';
    document.getElementById(onglet).style.borderBottom ='1px solid white';
    // document.getElementById("descriptTextContener").innerHTML ='bhjkfdlsssfdsq';
   }

