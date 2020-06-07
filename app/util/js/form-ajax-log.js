let submitBtn2 = document.getElementById("fetchBtnLog");
let user = document.getElementById("user");
let password = document.getElementById("password");
let logdata;
let fetched2=false;
let map1;
let signDiv=document.getElementById("idSign");
let wrongg=document.getElementById("wrong");
submitBtn2.addEventListener("click", onClick);

function onClick(){
    submitBtn2.setAttribute("disabled", true);
    

   
    var payload = {
        user : user.value,
        password : password.value
        
    
    };
    
    var data = new FormData();
    data.append( "json", JSON.stringify( payload ) );

    
    fetch("api/singUp",{ method:"POST", body: JSON.stringify(payload)})
        .then(function (resp) {
            signDiv.style.visibility='hidden'; 
            wrongg.style.visibility='hidden';
            aut=true;
            return resp.text();
        })
        .then(function (jsonResp) {
           console.log(jsonResp);
            logdata = jsonResp;
            fetched2 = true;
            submitBtn1.removeAttribute("disabled");
            submitBtn1.textContent = 'Set';
        })
        .catch(function (err) {
            console.log(err);
        })
    
   
    
}
var previous = "";

