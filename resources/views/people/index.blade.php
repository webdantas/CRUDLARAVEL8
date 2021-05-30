<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD PHP</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Toast -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>
  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css"/>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <!-- DataTables -->
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>

</head>
<body>
    <!-- barra de navegação -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CRUD PHP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </nav>
    <!-- barra de navegação -->

    <!-- container do conteúdo de abas -->
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Lista de usuários</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Criar usuário</button>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h3>Lista de Usuários</h3>
                <table id="tabela-usuarios" class="table table-hover">
                    <thead>
                        <td>Código</td>
                        <td>Nome</td>
                        <td>E-mail</td>
                        <td>Categoria</td>
                        <td>Ações</td>
                    </thead>
                </table>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                <form class="row gx-3 gy-2 align-items-center" id="store-people">
                    @csrf
                    <div class="col-sm-3">
                      <label class="visually-hidden" for="txtName">Nome</label>
                      <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Insira o nome">
                    </div>
                    <div class="col-sm-3">
                      <label class="visually-hidden" for="txtEmail">E-mail</label>
                      <div class="input-group">
                        <div class="input-group-text">@</div>
                        <input type="text" class="form-control" id="txtEmail" name="txtEmail" placeholder="e-mail">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <label class="visually-hidden" for="selCategories">Categoria</label>
                      <select class="form-select" id="selCategories" name="selCategories">
                        <option selected>Selecione categoria</option>
                        @foreach ($selCategories as $selCategorie )
                        <option value="{{ $selCategorie->id }}" >{{ $selCategorie->name }}
                        </option>
                    @endforeach
                      </select>
                    </div>

                    <div class="col-auto">
                      <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>

            </div>
        </div>

        <!-- Modal delete -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja apagar este registro?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" id="btnEliminar" name="btnEliminar" class="btn btn-danger">Apagar</button>
                </div>
            </div>
            </div>
        </div>

        <!-- Modal edit -->
        <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Editar pessoa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="edit-people">
                        @csrf
                        <input type="hidden" id="txtIdEdit" name="txtIdEdit">
                        <div class="modal-body">
                            <div class="col">
                                <label class="visually-hidden" for="txtNameEdit">Nome</label>
                                <input type="text" class="form-control" id="txtNameEdit" name="txtNameEdit" placeholder="Insira o nome">
                            </div>
                            <div class="col">
                                <label class="visually-hidden" for="txtEmailEdit">E-mail</label>
                                <div class="input-group">
                                <div class="input-group-text">@</div>
                                <input type="text" class="form-control" id="txtEmailEdit" name="txtEmailEdit" placeholder="e-mail">
                                </div>
                            </div>
                            <div class="col">
                                <label class="visually-hidden" for="selCategoriesEdit">Categoria</label>
                                <select class="form-select" id="selCategoriesEdit" name="selCategoriesEdit">
                                <option selected>Selecione categoria</option>
                                @foreach ($selCategories as $selCategoriesEdit )
                                <option value="{{ $selCategoriesEdit->id }}" >{{ $selCategoriesEdit->name }}
                                </option>
                            @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- container do conteúdo de abas -->

    <script>
        //listar registro
        $(document).ready(function(){
            var tabelaUsuarios = $('#tabela-usuarios').DataTable({
                processing:true,
                serverSide:true,
                ajax:{
                    url: "{{ route('people.index') }}",
                },
                columns:[
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'category.name'},
                    {data: 'action', orderable: false}
                ]
            });
        });

        //gravar registro
        $('#store-people').submit(function(e){
            e.preventDefault();
            // valores da tabela
            var name            = $('#txtName').val();
            var email           = $('#txtEmail').val();
            var categorie_id    = $('#selCategories').val();
            var _token          = $('input[name=_token]').val();

            $.ajax({
                url:    "{{ route('people.store') }}",
                type:   "POST",
                data:   {//tabelas do banco - dados esquerdos
                    name:          name,
                    email:         email,
                    category_id:   categorie_id,
                    _token:        _token
                },
                success:function(response){
                    if(response){
                        $('#store-people')[0].reset();
                        toastr.success('Pessoa cadastrada com sucesso.', 'Novo cadastro', {timeOut:3000});
                        $('#tabela-usuarios').DataTable().ajax.reload();
                        window.location.href = '#myTabContent';
                        window.location.reload();

                    }
                }
            });
        });

        //apagar registro
        var people_id;
        $(document).on('click','.delete',function(){
            people_id = $(this).attr('id');

            $('#deleteModal').modal('show');
        });
        $('#btnEliminar').click(function(){

            $.ajax({
                url:"people/destroy/"+people_id,
                beforeSend:function(){
                    $('#btnEliminar').text('Apagando registro....');
                },
                success:function(data){
                    setTimeout(function(){
                        $('#deleteModal').modal('hide');
                        toastr.warning('Registro apagado com sucesso.', 'Apagar registro', {timeOut:3000});
                        $('#tabela-usuarios').DataTable().ajax.reload();

                      }, 2000);
                      $('#btnEliminar').text('Apagar registro');
                }
            });
        });

        //Editar registro
        function editPeople(id){

            $.get('people/edit/'+id, function(people){

                $('#txtIdEdit').val(people.id);
                $('#txtNameEdit').val(people.name);
                $('#txtEmailEdit').val(people.email);
                $('#selCategoriesEdit').val(people.category_id);
                $("input[name=_token]").val

                $('#editModal').modal('toggle');
            })
        }

        //Atualizar registro
        $('#edit-people').submit(function(e){

            e.preventDefault();
            var idUp                = $('#txtIdEdit').val();
            var nameUp              = $('#txtNameEdit').val();
            var emailUp             = $('#txtEmailEdit').val();
            var selCategoriesUp     = $('#selCategoriesEdit').val();
            var _tokenUp            = $('input[name=_token]').val();

            $.ajax({
                url:"{{ route('people.update') }}",
                type:"POST",
                data:{
                    id:idUp,
                    name:nameUp,
                    email:emailUp,
                    category_id:selCategoriesUp,
                    _token:_tokenUp

                },

                success:function(response){
                    if(response){
                        $('#editModal').modal('hide');
                        toastr.info('Registro atualizado com sucesso.', 'Atualizar registro', {timeOut:3000});
                        $('#tabela-usuarios').DataTable().ajax.reload();
                    }
                }
            })
        });


    </script>




    <!-- Toast -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- NPM -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

</body>
</html>
