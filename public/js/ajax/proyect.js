$(function() {
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
            console.log("success");
            let tipos = '<option selected disabled>Tipologias</option>';
            data.forEach(i => {
                console.log(i.titulo);
                tipos += '<option value="'+i.id+'">'+i.titulo+'</option>';
            });
            $("#tipologia").empty().append(tipos);
            $("#tipoImgCont").empty().append(
                '<img src="'+data[0].media+'" alt=""></img>'
            );
            $("#tipoTitleCont").empty().append(data[0].titulo);
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

    $('#tipologia').on('change',() =>{
        dataObj = {
            tipoId: $("#tipologia option:selected").attr('value'),
        }
        
        // console.log(dataObj);
        $.ajax({
            url: 'tSwitcher',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('#token').val()},
            data: dataObj,
          })
          .done(data =>{
            console.log("success");
      
            $("#tipoImgCont").empty().append(
                '<img src="'+data.media+'" alt=""></img>'
            );
            $("#tipoTitleCont").empty().append(data.titulo);
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
});