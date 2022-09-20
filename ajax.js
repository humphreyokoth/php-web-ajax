$(document).ready(function(){
// Form input to add item
$('#input-add').submit(function(e){
e.preventDefault();

formData = $(this).serialize();

$.ajax({
    type:"POST",
    url:"./addTodos.php",
    data:formData,
}).then(
    function(response){
        // Check item added to DB
        if(response==="success"){
            // Reloading page after successful submission of data.
            location.reload();
            console.log("###data");
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