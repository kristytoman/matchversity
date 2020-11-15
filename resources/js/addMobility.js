var homeCode = null;
var homeName = null;
var foreignCode = null;
var foreignName = null;
var num_pairings = 0;



function appendPairing()
{
    var in_homeCode = document.getElementById("in_homeCode");
    var in_homeName = document.getElementById("in_homeName");

    var in_foreignCode = document.getElementById("in_foreignCode");
    var in_foreignName = document.getElementById("in_foreignName");

    // TODO: check if the foreign code is not already in the list
    var sp_pairing = document.createElement("span");
        sp_pairing.id = in_foreignCode.value;
        sp_pairing.appendChild(document.createElement("br"));
        var pairing = "pairing[" + num_pairings + "]";
        
        var li_homeCode = document.createElement("input");
            li_homeCode.name = pairing + "[homeCode]";
            li_homeCode.type = "text";
            li_homeCode.value = in_homeCode.value;
            li_homeCode.readOnly = true;
            sp_pairing.appendChild(li_homeCode);
        
        var li_homeName = document.createElement("input");
            li_homeName.name = pairing + "[homeName]";
            li_homeName.type = "text";
            li_homeName.value = in_homeName.value;
            li_homeName.readOnly = true;
            sp_pairing.appendChild(li_homeName);
    
        var li_foreignCode = document.createElement("input");
            li_foreignCode.name = pairing + "[foreignCode]";
            li_foreignCode.type = "text";
            li_foreignCode.value = in_foreignCode.value;
            li_foreignCode.readOnly = true;
            sp_pairing.appendChild(li_foreignCode);
        
        var li_foreignName = document.createElement("input");
            li_foreignName.name = pairing + "[foreignName]";
            li_foreignName.type = "text";
            li_foreignName.value = in_foreignName.value;
            li_foreignName.readOnly = true;
            sp_pairing.appendChild(li_foreignName);

        
        var b_edit = document.createElement("input");
            b_edit.type = "button";
            b_edit.name = "edit";
            b_edit.value = "Upravit";
            b_edit.onclick = function(){ editPairing(sp_pairing); };
            sp_pairing.appendChild(b_edit);

        var b_delete = document.createElement("input");
            b_delete.type = "button";
            b_delete.name = "delete";
            b_delete.value = "Smazat";
            b_delete.onclick = function(){ deletePairing(sp_pairing); };
            sp_pairing.appendChild(b_delete);

        document.getElementById("div_addedPairings").appendChild(sp_pairing);

    in_homeCode.value = "";
    in_homeName.value = "";
    in_foreignCode.value = "";
    in_foreignName.value = "";
}



function editPairing(span)
{
    var sp_pairing = span.children;
    for (let i = 0; i < sp_pairing.length; i++)
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
        b_save.value = "Uložit změny";
        b_save.onclick = function(){ saveChanges(span); };
        span.appendChild(b_save);
    
    var b_unsave = document.createElement("input");
        b_unsave.type = "button";
        b_unsave.value = "Zrušit";
        b_unsave.onclick = function(){ unsaveChanges(span); };
        span.appendChild(b_unsave);
}



function saveChanges(span)
{
    var sp_pairing = span.children;
    for ( let i = 0; i < sp_pairing.length; i++ )
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
    for ( let i = 0; i < sp_pairing.length; i++ )
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
    foreignName = null;
}



function deletePairing(span)
{
    var children = span.children;
    for ( let i = 0; i < children.length; i++ ) 
    {
        children[i].remove();
    }
    span.remove();
}

function uniset()
{
    var uniname = document.getElementById("in_uniName").value;
    var list = document.getElementById("dl_universities");
    for ( let i = 0; i < list.children.length; i++ )
    {
        if (list.children[i].label == uniname)
        {
            return;
        }
    }
    document.getElementById('uniform').style.display = "inline";
}