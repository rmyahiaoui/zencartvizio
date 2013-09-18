<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Techniques AJAX - XMLHttpRequest</title>
<script type="text/javascript">
      function getXMLHttpRequest() {
        var xhr = null;

        if (window.XMLHttpRequest || window.ActiveXObject) {
            if (window.ActiveXObject) {
                try {
                    xhr = new ActiveXObject("Msxml2.XMLHTTP");
                } catch(e) {
                    xhr = new ActiveXObject("Microsoft.XMLHTTP");
                }
            } else {
                xhr = new XMLHttpRequest();
            }
        } else {
            alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
            return null;
        }

        return xhr;
      }
</script>
<script type="text/javascript">
<!--
function request(callback) {
    var sleep = document.getElementById("sleep").value;
    if (isNaN(parseInt(sleep))) {
        alert(sleep + " n'est pas un nombre valide !");
        return;
    }

    var xhr = getXMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            callback(xhr.responseText);
            document.getElementById("loader").style.display = "none";
        } else if (xhr.readyState < 4) {
            document.getElementById("loader").style.display = "inline";
        }
    };

    xhr.open("POST", "test.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("Sleep=" + sleep);
}

function readData(sData) {
    alert(sData);
}
//-->
</script>
</head>
<body>
  <?php
  $sleep = (isset($_POST["Sleep"])) ? $_POST["Sleep"] : NULL;

echo date("h:i:s") . "\n\n";

if ($sleep) {
    sleep($sleep);

}
?>
<form>
    <p>
        <label for="sleep">Temps de sommeil :</label>
        <input type="text" id="sleep" />
    </p>
    <p>
        <input type="button" onclick="request(readData);" value="Exécuter" />
        <span id="loader" style="display: none;"><img src="images/loader.gif" alt="loading" /></span>
    </p>
</form>
</body>
</html>
