$(document).ready(function(){
    // Get all dones
    let done = document.querySelectorAll("#done");
    for (let x = 0; x < done.length; x++){
        $(done).click(function(){ 
        
            $.ajax({ 
                method: "GET", 
                url: "../controllers/check.php",
                dataType: "html",
                data: {
                    "checkID": $(this).attr('value')
                },
                success: function(response){
                    // Done();
                    // $('#tasks').html($('#tasks', response).html());
                    // $.ajax({
                    //     method: "GET",
                    //     url : "../controllers/readdbajax.php",
                    //     success: function(data){
                    //         // Get taskID
                    //         let id = $("#hidden").attr('value');
                    //         window.location.href = "../views/tasks.php?taskID=" + id ;
                    //     }
                    // });
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            $("#tasks").html(this.responseText);
                        }
                    };
                    let id = $("#hidden").attr('value');
                    xhttp.open("GET", "../views/tasks.php?taskID=" + id, true);
                    xhttp.send();
                    
                    // Get taskID
                    // let id = $("#hidden").attr('value');
                    // window.location.href = "../views/tasks.php?taskID=" + id ;
                    // console.log("Hiddem: " + hi);
                }
            });
        });
    }
   
    // let chid = document.getElementById("done");

});

