
var moneygo_login = "https://moneygo-api.herokuapp.com/api/login"

var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");

const email = document.querySelector("#email");
const password = document.querySelector("#password");
const buttonSubmit = document.querySelector("#submit");

// email.innerText = (nilai yang mau ditampilkan disini) harus dideklrasi terlebih dahulu 

buttonSubmit.addEventListener("click", (e) => {
    e.preventDefault(); // mencegah refresh

    var raw = JSON.stringify({
        email: email.value,
        password: password.value
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
        let dataSarah = await getResponse(moneygo_login);
        
        console.log(dataSarah)
        
        var dataJSONSarah = JSON.parse(dataSarah);
        

        if(dataJSONSarah.success == true){
            
            window.localStorage.setItem('moneygo', dataJSONSarah.token);
                    
            window.location.href = "index2.php";
        }
        
        if(dataJSONSarah.error == true){
            alert("Terdapat kesalahan silahkan coba lagi");
        }
    };

    getData();
})