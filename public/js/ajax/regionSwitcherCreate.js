$( document ).ready(function() {
  $("#region").on("change", function(){
    var dataObj = {
      region: $("#region option:selected").attr('value'),
    };

    // console.log(dataObj);
    $.ajax({
      url: 'provincia',
      type: 'POST',
      headers: {'X-CSRF-TOKEN': $('#token').val()},
      data: dataObj,
    })
    .done(function(data) {
      // console.log("success");

      let provs;
      data[0].forEach((i) => {
        provs += '<option value="'+i.id+'">'+i.name+'</option>';
      });
      $("#provincia").empty().append(provs);
      let comunas;
      data[1].forEach((i) => {
        comunas += '<option value="'+i.id+'">'+i.name+'</option>';
      });
      $("#comuna").empty().append(comunas);
    })
    .fail(function(e) {
      console.log("error");
      console.log(e.responseText);
    })
    .always(function(data) {
      // console.log("always");
      // // console.log(dataObj);
      // console.log(data);
    });
  });

  $("#provincia").on("change", function(){
    var dataObj = {
      provincia: $("#provincia option:selected").attr('value'),
    };

    // console.log(dataObj);
    $.ajax({
      url: 'comuna',
      type: 'POST',
      headers: {'X-CSRF-TOKEN': $('#token').val()},
      data: dataObj,
    })
    .done(function(data) {
      // console.log("success");

      let comunas;
      data[0].forEach((i) => {
        comunas += '<option value="'+i.id+'">'+i.name+'</option>';
      });
      $("#comuna").empty().append(comunas);
    })
    .fail(function(e) {
      console.log("error");
      console.log(e.responseText);
    })
    .always(function(data) {
      // console.log("always");
      // // console.log(dataObj);
      // console.log(data);
    });
  });
});
