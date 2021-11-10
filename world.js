window.onload = function()
{
    var httpRequest = new XMLHttpRequest();  
    var url = "http://localhost/info2180-lab5/world.php?country="; 
    var search = document.querySelector('#lookup'); 
    var searchC = document.querySelector('#lookupCities')
    var input = document.querySelector('input'); 
    var result = document.querySelector('#result');  
    search.addEventListener("click",function(element)
    {  
        element.preventDefault();
        console.log("button clicked")   
        httpRequest.onreadystatechange = function()
        {
            if(httpRequest.readyState == XMLHttpRequest.DONE && httpRequest.status == 200){
                var response =  httpRequest.responseText; 
                console.log("provided response")
                
                if(input.value != ""){
                    console.log(input)
                    result.innerHTML = response
                }else{
                    console.log("Search")
                    var response = httpRequest.responseText; 
                    result.innerHTML = this.responseText; 
                }

            }

                  
        }
    
        httpRequest.open("GET", "http://localhost/info2180-lab5/world.php?country="+input.value); 
        httpRequest.send();  
        
    });

    searchC.addEventListener("click", function(element)
    {
        element.preventDefault(); 
        console.log("second button clicked")
        httpRequest.onreadystatechange = function()
        {
            if(httpRequest.readyState == XMLHttpRequest.DONE && httpRequest.status == 200){
                var response =  httpRequest.responseText; 
                console.log("provided response for city")
                
                result.innerHTML = response
               
            }          
        }

        httpRequest.open("GET", "http://localhost/info2180-lab5/world.php?context=cities&country="+input.value); 
        httpRequest.send();  

    });
    

}