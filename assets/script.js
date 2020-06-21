function getdata() {
    var recherche = document.getElementById("recherche");

    if (recherche) {
        $.ajax({
            type: 'post',
            url: 'getdata.php',
            data: {
                name: recherche,
            },
            success: function(response) {
                $('#resultat').html(response);
            }
        });
    } else {
        $('#resultat').html("Entrer votre recherche");
    }
}

// function showUser(str) {
//     if (str == "") {
//         document.getElementById("txtHint").innerHTML = "";
//         return;
//     }
//     if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
//         xmlhttp = new XMLHttpRequest();
//     } else { // code for IE6, IE5
//         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//     }
//     xmlhttp.onreadystatechange = function() {
//         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//             document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
//         }
//     }
//     xmlhttp.open("GET", "getuser.php?q=" + str, true);
//     xmlhttp.send();
// }