var moneygo_register = "https://moneygo-api.herokuapp.com/api/register";
var coinless_register = "https://coinless.herokuapp.com/api/profile";


//post
var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");

const name = document.querySelector("#name");
const email = document.querySelector("#email");
const password = document.querySelector("#password");
const buttonSubmit = document.querySelector("#submit");

buttonSubmit.addEventListener("click", (e) => {
    e.preventDefault(); 

    var raw = JSON.stringify({
        name: name.value,
        email: email.value,
        pass: password.value    
    });

    var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
    };

    async function getResponse(url){
        try {
            let res = await fetch(url, requestOptions)
            console.log("Fetch berhasil");
            return await (res.text());
        } catch(error) {
            console.log('error', error)
        };
    }

    async function getData(){
        //response masih dalam bentuk string
        let data_moneygo = await getResponse(moneygo_register);
        let data_coinless = await getResponse(coinless_register);
        // console.log(data);

        //response string dijadiin json
        var resp_moneygo = JSON.parse(data_moneygo);
        var resp_coinless= JSON.parse(data_coinless);

        // if(resp_moneygo.status == 200){
        //     window.location.href = "login.html";
        // }
        
        // if(resp_moneygo.status == 400){
        //     alert("Try again");
        // }
        
        if(resp_moneygo.status == 200 && resp_coinless.status == 200){
            window.location.href = "login.html";
        }else{
            alert("Try again");
        }

    };

    getData();

})

