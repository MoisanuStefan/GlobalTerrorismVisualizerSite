let submitBtn3 = document.getElementById("fetchBtnLogIn");
let user1 = document.getElementById("topfield");
let password1 = document.getElementById("password1");
let logdata1;
let fetched3=false;
let map2;
let signDiv2=document.getElementById("idSign");
let wrongPassword=document.getElementById("wrong");
let aut=false;
let MapText=document.getElementById("authent");
let MapText2=document.getElementById("beforeAut");
submitBtn3.addEventListener("click", onClick);

function onClick(){
    submitBtn3.setAttribute("disabled", true);
   
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
            console.log(jsonResp);
            if(parseInt(jsonResp)==1)
            {signDiv2.style.visibility='hidden'; 
            MapText.style.visibility="visible";
            MapText2.style.visibility="hidden";
            aut=true;}
            else
            wrongPassword.style.visibility='visible';
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



