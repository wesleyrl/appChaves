$().ready(function(){

    var box = $('#resultado');
    box.hide();

    $("#atualiza_chave").click(function(){
        
        let id_chave = $("#id_chave_l").val();
        console.log(id_chave);

        $.post('App/controller/NextLicence.class.php',{id_chave}, function(data){
          let obj = JSON.parse(data);
          $("#id_chave").val(obj.ID);
          $("#val_chave").val("");
          $("#id_chave_l").val("");
          $("#val_chave").val(obj.CHAVES);
          $("#id_chave_l").val(obj.ID);
        });
       
    });


    $("#chave_erro").click(function(){

      let id  = $('#id_chave_l').val();
      let val_chave = $('#val_chave').val();
   
      //id:id, hostname: hostname, username: username, num_serie: num_serie, local:local, val_chave: val_chave, andar: andar
      $.post('App/Controller/UpdateLicence.class.php',{
        id:id,  val_chave: val_chave
      },function(data){
         
      });

    });


    $("#save_changes").click(function(){
      let id  = $('#id_chave_l').val();
      let hostname = $('#hostname').val();
      let username = $('#username').val();
      let num_serie = $('#num_serie').val();
      let local = $('#local').val();
      let val_chave = $('#val_chave').val();
      let andar = $('#andar').val();
      alert(hostname);
      $.post('App/Controller/SaveLicence.class.php',{
        id:id, hostname: hostname, username: username, num_serie: num_serie, local:local, val_chave: val_chave, andar: andar
      },function(data){
        console.log(data);
         if(data == 1){
          box.show();
          $('#text_result').html("<b>Alteração realizada com sucesso!</b>");
         }else{
          box.show();
          $('#text_result').html("<b>Opss algo deu errado!</b>");
         }
      });

    });


})