@extends('layouts.app')

@section('content')
<section class="col-lg-12 connectedSortable">
       

     <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Bienvenido Danny Alexander</h3>
            </div>
            <!-- /.box-header -->
      <div class="box-body">





    <h2>CRUD Products - Innova</h2>
    
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
    <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal">Add</button></br></br>
    <p>Numero de Productos: <strong>{{ count($data) }}</strong></p>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id Producto</th>
          <th>Id Categoria</th>
          <th>Nombre Producto</th>
          <th>Precio Producto</th>
          <th>Stock Producto</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
      @foreach($data as $x)
        <tr>
          <td>{{$x->id}}</td>
          <td>{{$x->codCategoria}}</td>
          <td>{{$x->nombreProducto}}</td>
          <td>{{$x->precioProducto}}</td>
          <td>{{$x->stock}}</td>
          <td>
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x->id}}')">View</button>
              <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$x->id}}')">Edit</button>
              <button class="btn btn-danger" onclick="fun_delete('{{$x->id}}')">Delete</button>
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('products/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('products/delete')}}">
    <!-- Add Modal start -->
    <div class="modal fade" id="addModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Añadir Producto</h4>
          </div>
          <div class="modal-body">
            <form action="{{ url('products/create') }}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <div class="form-group">
                  <label for="">Nombre de Categoria:</label>
                  <!--<input type="text" class="form-control" id="codCategoria" name="codCategoria">-->
                  <select class="form-control" name="codCategoria" id="codCategoria"></select>
                </div>
                <div class="form-group">
                  <label for="">Nombre Producto:</label>
                  <input type="text" class="form-control solo_letra" id="nombreProducto" name="nombreProducto" required>
                </div>
                <div class="form-group">
                <label for="">Precio Producto</label>
                <input type="text" class="form-control solo_numero" id="precioProducto" name="precioProducto" required>
                </div>
                <div class="form-group">
                <label for="">Stock</label>
                <input type="text" class="form-control solo_numero" id="stock" name="stock" requird>
                </div>
              </div>
              
              <button type="submit" class="btn btn-sm btn-success" id="btn-insertar">Insertar</button>
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
            <p><b>Código de Categoria : </b><span id="view_codCategoria" class="text-success"></span></p>
            <p><b>Nombre de Producto : </b><span id="view_nameProducto" class="text-success"></span></p>
            <p><b>Precio de Producto : </b><span id="view_precioProducto" class="text-success"></span></p>
            <p><b>Stock: </b><span id="view_stock" class="text-success"></span></p>
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
            <h4 class="modal-title">Editar Productos</h4>
          </div>
          <div class="modal-body">
            <form action="{{url('products/edit')}}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" id="edit_id" name="edit_idProducto">
              <div class="form-group">
                <div class="form-group">
                  <label for="">Categoria de Productos:</label>
                  <input type="text" class="form-control" id="edit_categoriaProducto" name="edit_categoriaProducto">
                </div>
                <div class="form-group">
                  <label for="">Nombre de Producto:</label>
                  <input type="text" class="form-control solo_letra" id="edit_nombreProducto" name="edit_nombreProducto">
                </div>
                <label for="">Precio de Producto:</label>
                <input type="short" class="form-control solo_numero" id="edit_precioProducto" name="edit_precioProducto">
              </div>
               <div class="form-group">
                  <label for="">Stock:</label>
                  <input type="text" class="form-control solo_numero" id="edit_stock" name="edit_stock">
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
    function listarCategories(){
    var html = "";
      $.ajax({
        url:'category/listaCategoria',
        type:"GET",
        data:{"a":"D4J7nOyCa21D"},
        success:function(result){
            $.each(result, function(a, val){
                   html+="<option value="+val.id+">"+val.nombreCategoria+"</option>";
            });
            $('#codCategoria').html(html);
        }
    });
    }
    listarCategories();
    function fun_view(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":+id}, 
        success: function(result){
          //console.log(result);
          $("#view_codCategoria").text(result.codCategoria);
          $("#view_nameProducto").text(result.nombreProducto);
          $("#view_precioProducto").text(result.precioProducto);
          $("#view_stock").text(result.stock);
          
        }
      });
    }
    


    function fun_edit(id)
    {
      var view_url = $("#hidden_view").val();
      $('#edit_id').val(id);
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_categoriaProducto").val(result.codCategoria);
          $("#edit_nombreProducto").val(result.nombreProducto);
          $("#edit_precioProducto").val(result.precioProducto);
          $("#edit_stock").val(result.stock);
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
          data: {"id":id,_token:"{{ csrf_token() }}"}, 
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