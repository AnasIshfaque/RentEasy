$(document).ready(function(){

    $(document).on("submit","#updateForm",function(e){
        e.preventDefault();
        $.ajax({
            url:"/RENTEASY/ajax.php",
            type:"POST",
            dataType:"json",
            data: new FormData(this),
            processData:false,
            contentType:false,
            beforeSend:function(){
                console.log("Waiting....");
            },
            success:function(response){
                console.log(response);

            },
            error:function(request,error){
                console.log(arguments);
                console.log("Error"+error);
            }
        })
    })
})