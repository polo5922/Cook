
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


    function add_recive(action,name,duree,diff,desc,quanti,genre,pays,user){
      name = (typeof name === 'undefined') ? 'default' : name;
      duree = (typeof duree === 'undefined') ? 'default' : duree;
      diff = (typeof diff === 'undefined') ? 'default' : diff;
      desc = (typeof desc === 'undefined') ? 'default' : desc;
      quanti = (typeof quanti === 'undefined') ? 'default' : quanti;
      genre = (typeof genre === 'undefined') ? 'default' : genre;
      pays = (typeof pays === 'undefined') ? 'default' : pays;
      user = (typeof user === 'undefined') ? 'default' : user;
      $.post('backend/bdd.php',
          {
              action: action,
              name: name,
              duree: duree,
              diff: diff,
              desc: desc,
              quanti: quanti,
              genre: genre,
              pays: pays,
              user: user
          }, function(data) {
            console.log(data);
        });
      }
