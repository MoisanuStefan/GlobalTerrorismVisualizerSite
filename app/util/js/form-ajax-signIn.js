let submitBtn3 = document.getElementById("fetchBtnLogIn");
let user1 = document.getElementById("topfield");
let password1 = document.getElementById("password1");
let logdata1;
let fetched3=false;
let map2;
let signDiv2=document.getElementById("idSign");

submitBtn3.addEventListener("click", onClick);

function onClick(){
    // LOADING STATE
    submitBtn3.setAttribute("disabled", true);
    submitBtn3.textContent = "...";
    // CALL

   
    var payload = {
        user : user1.value,
        password : password1.value
        
    
    };
    
    var data = new FormData();
    data.append( "json", JSON.stringify( payload ) );

    
    fetch("api/logIn",{ method:"POST", body: JSON.stringify(payload)})
        .then(function (resp) {
            return resp.text();
        })
        .then(function (jsonResp) {
            if(parseInt(jsonResp)==1)
            signDiv2.style.visibility='hidden'; 
           console.log(jsonResp);

            logdata1 = jsonResp;
            fetched3 = true;
            submitBtn1.removeAttribute("disabled");
            submitBtn1.textContent = 'Set';
        })
        .then(function() {
            
        })
        .catch(function (err) {
            console.log(err);
        })
    
   
    
}



