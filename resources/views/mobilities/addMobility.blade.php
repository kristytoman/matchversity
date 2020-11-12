<!DOCTYPE html>
<html lang="cs">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Matchversity | Univerzita Tomáše Bati ve Zlíně</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito';
            }
            .title {
                text-align: center;
            }
            .about {
                padding-left: 5vw;
            }
        </style>
        <script>
            var homeCode = null;
            var homeName = null;
            var foreignCode = null;
            var foreignName = null;
           function appendPairing()
           {
                var in_homeCode = document.getElementById("in_homeCode");
                var in_homeName = document.getElementById("in_homeName");

                var in_foreignCode = document.getElementById("in_foreignCode");
                var in_foreignName = document.getElementById("in_foreignName");
            
                /* TODO: check if the foreign code is not already in the list */
                var sp_pairing = document.createElement("span");
                sp_pairing.id = in_foreignCode.value;
                    var li_homeCode = document.createElement("input");
                    li_homeCode.type = "text";
                    li_homeCode.name = "homeCode";
                    li_homeCode.value = in_homeCode.value;
                    li_homeCode.readOnly = true;
                    var li_homeName = document.createElement("input");
                    li_homeName.type = "text";
                    li_homeName.name = "homeName";
                    li_homeName.value = in_homeName.value;
                    li_homeName.readOnly = true;
                
                    var li_foreignCode = document.createElement("input");
                    li_foreignCode.type = "text";
                    li_foreignCode.value = in_foreignCode.value;
                    li_foreignCode.readOnly = true;
                    li_foreignCode.name = "foreignCode";
                    var li_foreignName = document.createElement("input");
                    li_foreignName.type = "text";
                    li_foreignName.name = "foreignName";
                    li_foreignName.value = in_foreignName.value;
                    li_foreignName.readOnly = true;

                    sp_pairing.appendChild(li_homeCode);
                    sp_pairing.appendChild(li_homeName);
                    sp_pairing.appendChild(li_foreignCode);
                    sp_pairing.appendChild(li_foreignName);
                
                    var b_edit = document.createElement("input");
                    b_edit.type = "button";
                    b_edit.name = "edit";
                    b_edit.onclick = function(){editPairing(sp_pairing)};
                    b_edit.value = "Upravit";

                    var b_delete = document.createElement("input");
                    b_delete.type = "button";
                    b_delete.name = "delete";
                    b_delete.onclick = function(){deletePairing(sp_pairing)};
                    b_delete.value = "Smazat";

                    sp_pairing.appendChild(b_edit);
                    sp_pairing.appendChild(b_delete);

                    document.getElementById("div_addedPairings").appendChild(sp_pairing);
            }

            function editPairing(span)
            {
                var sp_pairing = span.children;
                for (i = 0; i < sp_pairing.length; i++)
                {
                    switch(sp_pairing[i].name)
                    {
                        case "homeCode":
                            homeCode = sp_pairing[ i ].value;
                            sp_pairing[ i ].readOnly = false;
                            break;

                        case "homeName":
                            homeName = sp_pairing[ i ].value;
                            sp_pairing[ i ].readOnly = false;
                            break;

                        case "foreignCode":
                            foreignCode = sp_pairing[ i ].value;
                            sp_pairing[ i ].readOnly = false;
                            break;

                        case "foreignName":
                            foreignName = sp_pairing[ i ].value;
                            sp_pairing[ i ].readOnly = false;
                            break;

                        case "edit":
                        case "delete":
                            sp_pairing[i].style.visibility = "hidden";
                            break;
                    }
                }

                var b_save = document.createElement("input");
                b_save.type = "button";
                b_save.onclick = function(){saveChanges(span)};
                b_save.value = "Uložit změny";
                var b_unsave = document.createElement("input");
                b_unsave.type = "button";
                b_unsave.onclick = function(){unsaveChanges(span)};
                b_unsave.value = "Zrušit";
                span.appendChild(b_save);
                span.appendChild(b_unsave);

            }

            function saveChanges(span)
            {
                var sp_pairing = span.children;
                for ( i = 0; i < sp_pairing.length; i++ )
                {
                    switch(sp_pairing[i].name)
                    {
                        case "homeCode":
                        case "homeName":
                        case "foreignCode":
                        case "foreignName":
                            sp_pairing[ i ].readOnly = true;
                            break;

                        case "edit":
                        case "delete":
                            sp_pairing[i].style.visibility = "visible";
                            break;

                        default:
                            span.removeChild(sp_pairing[i]);
                            i--;
                            break;
                    }
                }
                homeCode = null;
                homeName = null;
                foreignCode = null;
                foreidnName = null;
            }

            function unsaveChanges(span)
            {
                var sp_pairing = span.children;
                for ( i = 0; i < sp_pairing.length; i++ )
                {
                    switch(sp_pairing[i].name)
                    {
                        case "homeCode":
                            sp_pairing[i].value = homeCode;
                            sp_pairing[i].readOnly = true;
                            break;

                        case "homeName":
                            sp_pairing[i].value = homeName;
                            sp_pairing[i].readOnly = true;
                            break;

                        case "foreignCode":
                            sp_pairing[i].value = foreignCode;
                            sp_pairing[i].readOnly = true;
                            break;

                        case "foreignName":
                            sp_pairing[i].value = foreignName;
                            sp_pairing[i].readOnly = true;
                            break;
                            
                        case "edit":
                        case "delete":
                            sp_pairing[i].style.visibility = "visible";
                            break;

                        default:
                            span.removeChild(sp_pairing[i]);
                            i--;
                            break;
                    }
                }
                homeCode = null;
                homeName = null;
                foreignCode = null;
                foreidnName = null;
            }

            function deletePairing(span)
            {
                var children = span.children;
                for ( i = 0; i < children.length; i++ ) 
                {
                    children[i].remove();
                }
                span.remove();
            }

            function uniset()
            {
                var uniname = document.getElementById("in_uniName").value;
                //if uniname not in is in datalist
                //open include uniform in div university
            }
            </script>
    </head>
    <body>
        @include('include.header')
        <form id="form_addMobility">
            @csrf
            <div id="div_university">
                <label for="in_Uni">Univerzita</label>
                    <input id="in_uniName" list="dl_universities" onchange="uniset();">
                        <datalist id="dl_universities"></datalist><br>
                        @include('include.uniform')
            </div>
            <label>Párování</label>
                <input type="button" onclick="appendPairing()" value="Přidat párování"><br>
                <label>Zahraniční předmět</label><br>
                    <label for="in_foreignCode">Kód</label>
                        <input id="in_foreignCode" type="text"/><br>
                    <label for="in_foreignName">Název</label>
                        <input id="in_foreignName" type="text"/><br>

                <label>Domácí předmět</label><br>
                    <label for="in_homeCode">Kód</label>
                        <input id="in_homeCode" type="text"/><br>
                    <label for="in_homeName">Název</label>
                        <input id="in_homeName" type="text"/><br>

            <div id="div_addedPairings">
            </div>

            <input type="submit" value="Přidat výjezd"/>       
        </form>
        @include('include.footer')
    </body>
</html>