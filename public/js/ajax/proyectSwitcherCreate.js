$( document ).ready(function() {
  $("#proyecto").on("change", () =>{
    const dataObj = {
      proyecto: $("#proyecto option:selected").attr('value'),
    };

    // console.log(dataObj);
    $.ajax({
      url: 'proyectSwitcher',
      type: 'POST',
      headers: {'X-CSRF-TOKEN': $('#token').val()},
      data: dataObj,
    })
    .done(data =>{
      // console.log("success");
      // console.log(data);
      let unidades = "<option value='z'>Sin unidad</option>";
      data.forEach(i =>{
        unidades += '<option value="'+i.id+'">'+i.modelo+'</option>';
      });
      $("#unidad").empty().append(unidades);

    })
    .fail(e =>{
      console.log("error");
      console.log(e.responseText);
    })
    .always(data =>{
      // console.log("always");
      // console.log(dataObj);
      // console.log(data);
    });
  });
});
