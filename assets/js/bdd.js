
  function bdd(action,id,table,id_table){
    id = (typeof id === 'undefined') ? 'default' : id;
    table = (typeof table === 'undefined') ? 'default' : table;
    id_table = (typeof id_table === 'undefined') ? 'default' : id_table;
    $.post('backend/bdd.php',
        {
            action: action,
            id: id,
            table: table,
            id_table: id_table
        }, function(data) {
          if(action == 'get')
          {
            var selector = '"#'+'id"';
            console.log(selector);
            $(selector).html(data);
          }
            console.log(data);
      });
    }
