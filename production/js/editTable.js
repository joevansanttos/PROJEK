
$(".datatable").each( function() {
  var id = this.id;
  $('#'+ id).Tabledit({
    url:'action.php',
    editButton: false,
    deleteButton: false,
    hideIdentifier: true,
    columns:{
      identifier:[0, "id_tarefas_contrato"],
      editable:[[2, 'data_inicio'], [3, 'data_fim']],[4, 'avatar', '{"1": "Black Widow", "2": "Captain America", "3": "Iron Man"}']]
    },
    onDraw: function() {
      console.log('onDraw()');
    },
    onSuccess: function(data, textStatus, jqXHR) {
      console.log('onSuccess(data, textStatus, jqXHR)');
      console.log(data);
      console.log(textStatus);
      console.log(jqXHR);
    },
    onFail: function(jqXHR, textStatus, errorThrown) {
      console.log('onFail(jqXHR, textStatus, errorThrown)');
      console.log(jqXHR);
      console.log(textStatus);
      console.log(errorThrown);
    },
    onAlways: function() {
      console.log('onAlways()');
    },
    onAjax: function(action, serialize) {
      console.log('onAjax(action, serialize)');
      console.log(action);
      console.log(serialize);
    }
  });
});
