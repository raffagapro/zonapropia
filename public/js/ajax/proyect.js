$(function() {

  $('#tipologia').on('change',() =>{
      dataObj = {
          tipoSelected: $("#tipologia option:selected").attr('value'),
      }
      // console.log(dataObj);
      $.ajax({
          url: 'tSwitcher',
          type: 'POST',
          headers: {'X-CSRF-TOKEN': $('#token').val()},
          data: dataObj,
      })
      .done(data =>{
        // console.log("success");
        let modelos = '<option selected disabled>Modelo</option>';
        data.forEach(i => {
            modelos += '<option value="'+i.id+'">'+i.modelo+'</option>';
        });
        $("#model").empty().append(modelos);
        //orientation
        let oris = '<option selected disabled>Orientacion</option> ';
        data.forEach(i => {
          if (Number(i.orientacion) === 0) {
            oris += '<option value="'+i.id+'">Sin Orientación</option>';
          } else if(Number(i.orientacion) === 1){
            oris += '<option value="'+i.id+'">Sur Poniente</option>';
          } else if(Number(i.orientacion) === 2){
            oris += '<option value="'+i.id+'">Nor Oriente</option>';
          }
        });
        $("#orientacion").empty().append(oris);
        //pisos
        let pisos = '<option selected disabled>Piso</option>';
        data.forEach(i => {
          pisos += '<option value="'+i.id+'">'+i.piso+'</option>';
        });
        $("#piso").empty().append(pisos);
      })
      .fail(e =>{
        // console.log("error");
        // console.log(e);
        // console.log(e.responseText);
      })
      .always(data =>{
        // console.log("always");
        // console.log(dataObj);
        // console.log(data);
      }); 
  });

  $('#model').on('change',() =>{
    dataObj = {
        unidadId: $("#model option:selected").attr('value'),
    }
    
    // console.log(dataObj);
    $.ajax({
      url: 'uSwitcher',
      type: 'POST',
      headers: {'X-CSRF-TOKEN': $('#token').val()},
      data: dataObj,
    })
    .done(data =>{
      // console.log("success");
      $("#tipoImgCont").empty().append(
          '<img src="'+data[0][0].media+'" alt=""></img>'
      );
      $("#tipoTitleCont").empty().append(data[0][0].titulo);
      //orientation
      let oris = '';
      if (Number(data[1].orientacion) === 0) {
        oris = '<option value="'+data[1].id+'" selected>Sin Orientación</option>';
      } else if(Number(data[1].orientacion) === 1){
        oris = '<option value="'+data[1].id+'" selected>Sur Poniente</option>';
      } else if(Number(data[1].orientacion) === 2){
        oris = '<option value="'+data[1].id+'" selected>Nor Oriente</option>';
      }
      $("#orientacion").empty().append(oris);
      //pisos
      $("#piso").empty().append('<option value="'+data[1].id+'">'+data[1].piso+'</option>');
    })
    .fail(e =>{
      // console.log("error");
      // console.log(e);
      // console.log(e.responseText);
    })
    .always(data =>{
      // console.log("always");
      // console.log(dataObj);
      // console.log(data);
    }); 
  });

  $('#orientacion').on('change',() =>{
    dataObj = {
        ori: $("#orientacion option:selected").attr('value'),
    }
    
    // console.log(dataObj);
    $.ajax({
      url: 'oSwitcher',
      type: 'POST',
      headers: {'X-CSRF-TOKEN': $('#token').val()},
      data: dataObj,
    })
    .done(data =>{
      console.log("success");
      let modelos = '<option selected disabled>Modelo</option>';
      data.forEach(i => {
          modelos += '<option value="'+i.id+'">'+i.modelo+'</option>';
      });
      $("#model").empty().append(modelos);
      //pisos
      let pisos = '<option selected disabled>Piso</option>';
      data.forEach(i => {
        pisos += '<option value="'+i.id+'">'+i.piso+'</option>';
      });
      $("#piso").empty().append(pisos);
    })
    .fail(e =>{
      console.log("error");
      console.log(e);
      console.log(e.responseText);
    })
    .always(data =>{
      console.log("always");
      console.log(dataObj);
      console.log(data);
    }); 
  });

  $('#piso').on('change',() =>{
    dataObj = {
        piso: $("#piso option:selected").attr('value'),
    }
    
    // console.log(dataObj);
    $.ajax({
      url: 'pSwitcher',
      type: 'POST',
      headers: {'X-CSRF-TOKEN': $('#token').val()},
      data: dataObj,
    })
    .done(data =>{
      console.log("success");
      let modelos = '<option selected disabled>Modelo</option>';
      data.forEach(i => {
          modelos += '<option value="'+i.id+'">'+i.modelo+'</option>';
      });
      $("#model").empty().append(modelos);
      //orientation
      let oris = '<option selected disabled>Orientacion</option> ';
      data.forEach(i => {
        if (Number(i.orientacion) === 0) {
          oris += '<option value="'+i.id+'">Sin Orientación</option>';
        } else if(Number(i.orientacion) === 1){
          oris += '<option value="'+i.id+'">Sur Poniente</option>';
        } else if(Number(i.orientacion) === 2){
          oris += '<option value="'+i.id+'">Nor Oriente</option>';
        }
      });
      $("#orientacion").empty().append(oris);
    })
    .fail(e =>{
      console.log("error");
      console.log(e);
      console.log(e.responseText);
    })
    .always(data =>{
      console.log("always");
      console.log(dataObj);
      console.log(data);
    }); 
  });

  $('#contBtn').on('click', (event) =>{
    event.preventDefault();
    dataObj = {
      unidadId: $("#model option:selected").attr('value'),
    }
    if (!dataObj.unidadId) {
      $('#errorCont').show();
    } else {
      $('#errorCont').hide();
      $('#model').hide();
      $('#orientacion').hide();
      $('#piso').hide();
      $('#tipologia').hide();
      $('#contBtn').hide();
      $('#sendCotBtn').show();
      $('#rutCont').show();
      $('#nameCont').show();
      $('#phoneCont').show();
      $('#emailCont').show();
      $('#unidadId').val(dataObj.unidadId);
    }
    console.log($('#unidadId').val());
  });
});