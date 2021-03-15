$( document ).ready(function() {
  $("#region").on("change", () =>{
    const dataObj = {
      region: $("#region option:selected").attr('value'),
    };

    // console.log(dataObj);
    if (dataObj.region !== 'z') {
      $.ajax({
        url: '../../proyects/comuna',
        type: 'POST',
        headers: {'X-CSRF-TOKEN': $('#token').val()},
        data: dataObj,
      })
      .done(data =>{
        // console.log("success");
        let comunas;
        data.forEach(i => {
          comunas += '<option value="'+i.id+'">'+i.name+'</option>';
        });
        $("#comuna").empty().append(comunas);
      })
      .fail(e =>{
        // console.log("error");
        // console.log(e.responseText);
      })
      .always(data =>{
        // console.log("always");
        // console.log(dataObj);
        // console.log(data);
      }); 
    }
  });
});
