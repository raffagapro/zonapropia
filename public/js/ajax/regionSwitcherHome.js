$(function() {
  $("#region").on("change", () =>{
    const dataObj = {
      region: $("#region option:selected").attr('value'),
    };

    // console.log(dataObj);
    if (dataObj.region !== 'z') {
      $.ajax({
        url: 'proyects/comuna',
        type: 'POST',
        headers: {'X-CSRF-TOKEN': $('#token').val()},
        data: dataObj,
      })
      .done(data =>{
        // console.log("success");
  
        let comunas = '<option value="z">Comuna</option>';
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

  $("#comuna").select2();

  $("#gridBtn").on('click', () =>{
    $("#gridBtn").hide();
    $("#gridCont").hide();
    $('#listBtn').show();
    $('#listCont').show();
    // console.log('ias clicked bitchets!');
  });

  $("#listBtn").on('click', () =>{
    $("#gridBtn").show();
    $("#gridCont").show();
    $('#listBtn').hide();
    $('#listCont').hide();
    // console.log('ias clicked bitchets!');
  });

  $("#min_price").on('mousemove', () =>{
    $("#ufmin").empty().append($("#min_price").val());
  });

  $("#max_price").on('mousemove', () =>{
    $("#ufmax").empty().append($("#max_price").val());
  });

  $("#min_sq").on('mousemove', () =>{
    $("#sqmin").empty().append($("#min_sq").val());
  });

  $("#max_sq").on('mousemove', () =>{
    $("#sqmax").empty().append($("#max_sq").val());
  });

  $('#sortingSelect').on('change', () =>{
    const dataObj = {
      tag: $('input[name="tagId"]').val(),
      cat: $('input[name="catId"]').val(),
      comuna: $('input[name="comunaId"]').val(),
      region: $('input[name="regionId"]').val(),
      price: $("#sortingSelect option:selected").attr('value'),
    }

    console.log(dataObj);
    $.ajax({
      url: 'proyects/sort',
      type: 'POST',
      headers: {'X-CSRF-TOKEN': $('#token').val()},
      data: dataObj,
    })
    .done(data =>{
      // console.log("success");
      let comunas = '<option value="z">Comuna</option>';
      data.forEach(i => {
        comunas += '<option value="'+i.id+'">'+i.name+'</option>';
      });
      $("#comuna").empty().append(comunas);
    })
    .fail(e =>{
      console.log("error");
      console.log(e.responseText);
    })
    .always(data =>{
      console.log("always");
      console.log(dataObj);
      console.log(data);
    }); 
  });
    
});


