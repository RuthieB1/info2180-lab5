window.onload = function(){
    var countrylookup= document.getElementById("lookup");
    countrylookup.addEventListener("click", function(){
        let country = document.getElementById("country").value;
        let url = "http://localhost/info2180-lab5/world.php?country=";

        let dhttp = new XMLHttpRequest();
        let result = document.getElementById("result");
        dhttp.onreadystatechange = function(){
            if(this.readyState == XMLHttpRequest.DONE && this.status ==200){
                result.innerHTML = dhttp.response;
            }
        };

        dhttp.open("GET", url+country,true );
        dhttp.send();

    });
}