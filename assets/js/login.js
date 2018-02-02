
$("#login-form").submit(function (event) {
    
    event.preventDefault();
    
    var formData = {
        username: $("input[name=user]").val(),
        pass: $("input[name=pass]").val()
    };

    $.ajax({
        type: "POST",
        url: "../loginctr/login",
        data: formData,
        success: function (data) {
            
            if (data.success) {
                location.reload();
            }
            else {

                var modal = $("#modal-window");
                var span  = $("#modal-close");
                
                modal.css("display", "block");
                
                span.click(function(){
                    modal.css("display", "none");
                });
                
                window.onclick = function (event) {                    
                    var target = $(event.target);
                    if (target[0] == modal[0]) {
                        modal.css("display", "none");
                    }
                };
            }

        },
        error: function (jqXHR, textStatus) {
            console.log("error");
            console.log(jqXHR + "  ||  " + textStatus);
        },
        dataType: "json"
    });

});

$("#recovery-form").submit(function (event) {
    event.preventDefault();
    var formData = {
        email : $("input[name=email]").val()
    };
    
    $.ajax({
        type: "POST",
        url: "../loginctr/recovery",
        data: formData,
        success: function (data) {
            console.log(data);
            if (data=="enviado") {
                swal("Enviado","La solicitud a sido enviada","success");   
            } 
            if (data=="no posible enviar") {
                swal("Error","No ha sido posible enviar solicitud","error");
            }
            if (data=="usuario no existe") {
                swal("Error","El usuario ingresado no existe","error");
            }                            
        },

        dataType: "json"
    });
    
});