const baseUrl = window.location.protocol + "//" + window.location.hostname + "/choices_backend/";

function include(file) 
{ 
    var script  = document.createElement('script'); 
    script.src  = file; 
    script.type = 'text/javascript'; 
    script.defer = true; 
    
    document.getElementsByTagName('head').item(0).appendChild(script); 
}

include(baseUrl + "res/js/events.js");

function showFormOverlay()
{
    let viewOverlay = document.getElementById("form_overlay");

    viewOverlay.style.display = "flex";
}

function hideFormOverlay()
{
    let viewOverlay = document.getElementById("form_overlay");

    viewOverlay.style.display = "none";
    viewOverlay.innerHTML = '';
}

async function sendData(phpUrl, formData) 
{
    const response = await fetch(phpUrl, { method: "POST", body: JSON.stringify(formData), headers: {"Content-type": "application/json; charset=UTF-8"} });
    const result = await response.text();
    
    return result;
}
