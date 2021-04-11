$(document).ready(function () {
    $("form").submit(function (event) {
        
      var formData = {
        from: $("#from").val(),
        to: $("#to").val(),
        user_id: $("#user_id").val(),
      };
  
      $.ajax({
        type: "POST",
        url: "search",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function (data) {
          if (!data.success) {
            if (data.errors.from) {
                $("#from-group").addClass("has-error");
                $("#from-group").append(
                '<div class="help-block">' + data.errors.from + "</div>"
                );
            }
    
            if (data.errors.to) {
                $("#to-group").addClass("has-error");
                $("#to-group").append(
                '<div class="help-block">' + data.errors.to + "</div>"
                );
            }
    
            if (data.errors.user_id) {
                $("#user_id-group").addClass("has-error");
                $("#user_id-group").append(
                '<div class="help-block">' + data.errors.user_id + "</div>"
                );
            }
            
          } else {
            $("#result-group").addClass("has-error");
            $("#result-group").append(
            '<div class="help-block">' + data.message + "</div>"
            );
          }
          result-group
        });
    
        event.preventDefault();
      });
    });