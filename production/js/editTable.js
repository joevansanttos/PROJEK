  $(".datatable").each( function() {
    var id = this.id;
    $('#'+ id).Tabledit({
     url:'action.php',
     columns:{
      identifier:[0, "id_tarefas_contrato"],
      editable:[[2, 'data_inicio'], [3, 'data_fim']]
    },
    inputClass: 'form-control input-sm',
    deleteButton: false,
    restoreButton:false,
    onSuccess:function(data, textStatus, jqXHR){    
    }
  });
});