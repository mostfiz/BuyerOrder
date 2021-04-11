$(document).ready(function () {
    $("form").submit(function (event) {
        
      var formData = {
        amount: $("#amount").val(),
        buyer: $("#buyer").val(),
        receipt_id: $("#receipt_id").val(),
        items: $("#items").val(),
        buyer_email: $("#buyer_email").val(),
        note: $("#note").val(),
        city: $("#city").val(),
        phone: $("#phone").val(),
        entry_by: $("#entry_by").val(),
      };
  
      $.ajax({
        type: "POST",
        url: "save",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function (data) {
          if (!data.success) {
            if (data.errors.amount) {
                $("#amount-group").addClass("has-error");
                $("#amount-group").append(
                '<div class="help-block">' + data.errors.amount + "</div>"
                );
            }
    
            if (data.errors.buyer) {
                $("#buyer-group").addClass("has-error");
                $("#buyer-group").append(
                '<div class="help-block">' + data.errors.buyer + "</div>"
                );
            }
    
            if (data.errors.receipt_id) {
                $("#receipt_id-group").addClass("has-error");
                $("#receipt_id-group").append(
                '<div class="help-block">' + data.errors.receipt_id + "</div>"
                );
            }
            if (data.errors.items) {
                $("#items-group").addClass("has-error");
                $("#items-group").append(
                    '<div class="help-block">' + data.errors.items + "</div>"
                );
            }
      
            if (data.errors.buyer_email) {
                $("#buyer_email-group").addClass("has-error");
                $("#buyer_email-group").append(
                  '<div class="help-block">' + data.errors.buyer_email + "</div>"
                );
            }
      
            if (data.errors.note) {
                $("#note-group").addClass("has-error");
                $("#note-group").append(
                  '<div class="help-block">' + data.errors.note + "</div>"
                );
            }
            if (data.errors.city) {
                $("#city-group").addClass("has-error");
                $("#city-group").append(
                  '<div class="help-block">' + data.errors.city + "</div>"
                );
            }
      
            if (data.errors.note) {
                $("#phone-group").addClass("has-error");
                $("#phone-group").append(
                  '<div class="help-block">' + data.errors.note + "</div>"
                );
            }
            if (data.errors.entry_by) {
                $("#entry_by-group").addClass("has-error");
                $("#entry_by-group").append(
                  '<div class="help-block">' + data.errors.entry_by + "</div>"
                );
            }
          } else {
            $("form").html(
              '<div class="alert alert-success">' + data.message + "</div>"
            );
          }
    
        });
    
        event.preventDefault();
      });
    });