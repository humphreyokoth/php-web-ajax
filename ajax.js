$(document).ready(function(){
// Form input to add item
$('#addTask').submit(function(e){
e.preventDefault();

formData = $(this).serialize();

$.ajax({
    type:"POST",
    url:"todolist_post_get.php",
    data:formData,
}).then(
    function(response){
       //var jsonData= JSON.parse(response);
        // Check item added to DB
        //console.log("data",response);
        if(response ==="success"){
          alert(`success${response}`);
            
            //console.log(response.data);
            // Reloading page after successful submission of data.
            //location.reload();
           
        }else {
            alert ("Not Successful" + "\n" + response);
        }
    },
    function (){
        alert("ERROR:Ajax did not execute");
    }
)
})

})