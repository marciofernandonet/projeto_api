<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aplicação teste</title>
    <link href="https://getbootstrap.com.br/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com.br/docs/4.1/examples/pricing/pricing.css" rel="stylesheet">
  </head>
  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">Admin</h5>
    </div>
    <div class="pricing-header px-3 py-3 pt-md-3 pb-md-4 mx-auto text-center">
      <h2><small>Lista de devedores</small></h2>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-10 border rounded">
                <div class="table-responsive-sm mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Data de nascimento</th>
                                <th scope="col">Dívida(s)</th>
                            </tr>
                        </thead>
                        <tbody id="devs">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="divs" class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>  
    <script src="https://getbootstrap.com.br/docs/4.1/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      axios.get('http://localhost:8000/api/devedores').then(function (devs){
        document.getElementById('devs').innerHTML = devs.data.map(function (dev){
          let dt_nasc = new Date(dev.data_nascimento); 
          return (
            '<tr>'+
              '<td>'+dev.nome+'</td>'+
              '<td>'+dev.cpf_cnpj+'</td>'+
              '<td>'+dt_nasc.toLocaleString().substring(0,10)+'</td>'+
              '<td><button type="button" onclick="getInfo('+dev.id+')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" >Detalhes</button></td>'+
            '</tr>'
          );
        }).join('');
      });
      function getInfo(id){
        axios.get('http://localhost:8000/api/dividas/'+id+'')
          .then(function (response) {
            document.getElementById('divs').innerHTML = response.data.map(function (info){
              let dt_ven = new Date(info.data_vencimento); 
              let dt_ocr = new Date(info.created_at); 
              return (
                '<h6>Descrição: '+info.desc_titulo+'</h6>'+
                '<h6>Valor: R$ '+info.valor.toFixed(2).toLocaleString('pt-BR')+'</h6>'+
                '<h6>Data de vencimento: '+dt_ven.toLocaleString().substring(0,10)+'</h6>'+
                '<h6>Data ocorrência: '+dt_ocr.toLocaleString().substring(0,10)+'</h6>'+
                '<hr>'
              );
            }).join('');
            
            if(!response.data.length)
              document.getElementById('divs').innerHTML = '<h6>Sem dívidas!</h6>';
          })
          .catch(function (err) {
            document.getElementById('divs').innerHTML = '<h6 class="text-danger">' + err.message + '</h6>';
          });
      }
    </script>
  </body>
</html>
