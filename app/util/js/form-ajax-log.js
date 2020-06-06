let submitBtn2 = document.getElementById("fetchBtnLog");
let user = document.getElementById("user");
let password = document.getElementById("password");
let logdata;
let fetched2=false;
let map1;
let signDiv=document.getElementById("idSign");

submitBtn2.addEventListener("click", onClick);

function onClick(){
    // LOADING STATE
    submitBtn2.setAttribute("disabled", true);
    submitBtn2.textContent = "...";
    // CALL

   
    var payload = {
        user : user.value,
        password : password.value
        
    
    };
    
    var data = new FormData();
    data.append( "json", JSON.stringify( payload ) );

    
    fetch("api/singUp",{ method:"POST", body: JSON.stringify(payload)})
        .then(function (resp) {
            signDiv.style.visibility='hidden'; 
            return resp.text();
        })
        .then(function (jsonResp) {
           console.log(jsonResp);
            logdata = jsonResp;
            fetched2 = true;
            // REMOVE LOADING STATE
            submitBtn1.removeAttribute("disabled");
            submitBtn1.textContent = 'Set';
        })
        .then(function() {
            loadM();
        })
        .catch(function (err) {
            console.log(err);
        })
    
   
    
}
var previous = "";

chartType.addEventListener("click", function () {
    if (previous.localeCompare(chartType.value) != 0 && fetched2){
       loadM();  
}
previous = chartType.value;

}
);


function loadM(){
    loadLineM(logdata);
}


function loadLineM(logdata){
   
}