@extends('layouts.app')

@section('content')
<section class="col-lg-12 connectedSortable">
       

     <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Bienvenido Danny Alexander</h3>
            </div>
            <!-- /.box-header -->
      <div class="box-body">





    <h2>CRUD Categories - Innova</h2>
    
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
    <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal">Add</button></br></br>
    <p>Numero de Categorias: <strong>{{ count($data) }}</strong></p>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id Categoria</th>
          <th>Nombre de Categoria</th>
          <th>Descripción</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
      @foreach($data as $x)
        <tr>
          <td>{{$x->id}}</td>
          <td>{{$x->nombreCategoria}}</td>
          <td width="250">{{$x->descripcion}}</td>
          <td>
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x->id}}')">View</button>
              <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$x->id}}')">Edit</button>
              <button class="btn btn-danger" onclick="fun_delete('{{$x->id}}')">Delete</button>
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('category/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('category/delete')}}">
    <!-- Add Modal start -->
    <div class="modal fade" id="addModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Añadir Categoria</h4>
          </div>
          <div class="modal-body">
            <form action="{{ url('category/create') }}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <div class="form-group">
                  <label for="">Nombre de Categoria:</label>
                  <input type="text" class="form-control solo_letra" id="nombreCategoria" name="nombreCategoria" required>
                </div>
                <div class="form-group">
                <label for="">Descripción</label>
                <input type="text" class="form-control solo_letra" id="precioProducto" name="descripcion" required>
                </div>
              </div>
              
              <button type="submit" class="btn btn-sm btn-success">Insertar</button>
              <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
            </form>
          </div>

        </div>
        
      </div>
    </div>
    <!-- add code ends -->
 
    <!-- View Modal start -->
    <div class="modal fade" id="viewModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Ver datos</h4>
          </div>
          <div class="modal-body">
            <p><b>Código de Categoria : </b><span id="view_codigoCategoria" class="text-success"></span></p>
            <p><b>Nombre de Categoria : </b><span id="view_nombreCategoria" class="text-success"></span></p>
            <p><b>Descripción : </b><span id="view_descripcion" class="text-success"></span></p>
          </div>
           <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
    <!-- view modal ends -->
 
    <!-- Edit Modal start -->
    <div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Categoria</h4>
          </div>
          <div class="modal-body">
            <form action="{{url('category/edit')}}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" id="edit_cod" name="edit_codCategoria">
              <div class="form-group">
                <div class="form-group">
                  <label for="">Nombre de Categoria:</label>
                  <input type="text" class="form-control solo_letra" id="edit_nombreCategoria" name="edit_nombreCategoria">
                </div>
                <div class="form-group">
                  <label for="">Descripción:</label>
                  <textarea class="form-control solo_letra" name="edit_descripcion" id="edit_descripcion" id="" cols="20" rows="8"></textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-sm btn-success">Update</button>
              <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
            </form>
          </div>

        </div>
        
      </div>
    </div>
    <!-- Edit code ends -->
 
  </div>


  </div>
       </div>

       </section>
  <script type="text/javascript">
    $(".solo_numero").keypress(function(e){
              var key = window.Event ? e.which : e.keyCode
              return ((key >= 48 && key <= 57) || (key==8))
            });
            $('.solo_letra').keypress(function (key) {
              //window.console.log(key.charCode)
              var p = key.charCode;
              if ((p < 97 || key.charCode > 122)//letras mayusculas
              && (p < 65 || key.charCode > 90) //letras minusculas
              && (p != 45) //retroceso
              && (p != 241) //ÃƒÆ’Ã‚Â±
               && (p!= 209) //ÃƒÆ’Ã¢â‚¬Ëœ
               && (p != 32) //espacio
               && (p != 225) //ÃƒÆ’Ã‚Â¡
               && (p != 233) //ÃƒÆ’Ã‚Â©
               && (p != 237) //ÃƒÆ’Ã‚Â­
               && (p != 243) //ÃƒÆ’Ã‚Â³
               && (p != 250) //ÃƒÆ’Ã‚Âº
               && (p != 193) //ÃƒÆ’Ã‚Â
               && (p != 201) //ÃƒÆ’Ã¢â‚¬Â°
               && (p != 205) //ÃƒÆ’Ã‚Â
               && (p != 211) //ÃƒÆ’Ã¢â‚¬Å“
               && (p != 218) //ÃƒÆ’Ã…Â¡s
              )
              return false;
            }); 

    function fun_view(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"codCategoria":+id}, 
        success: function(result){
          //console.log(result);
          $("#view_codigoCategoria").text(result.id);
          $("#view_nombreCategoria").text(result.nombreCategoria);
          $("#view_descripcion").text(result.descripcion);          
        }
      });
    }
 
    function fun_edit(id)
    {
      var view_url = $("#hidden_view").val();
      $('#edit_cod').val(id);
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"codCategoria":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_nombreCategoria").val(result.nombreCategoria);
          $("#edit_descripcion").val(result.descripcion);
        }
      });
    }
 
    function fun_delete(id)
    {
      var conf = confirm("Estas seguro que deseas eleminar?");
      if(conf){
        var delete_url = $("#hidden_delete").val();
        $.ajax({
          url: delete_url,
          type:"POST", 
          data: {"codCategoria":id,_token:"{{ csrf_token() }}"}, 
          success: function(response){
            alert(response);
            location.reload(); 
          }
        });
      }
      else{
        return false;
      }
    }
  </script>



  @endsection