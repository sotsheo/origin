@include('backend.head.index')
<style type="text/css">
  .form-group i{
    padding: 5px;
    background: #e3e3e3;
  }
  .form-group i#active{
     background: #878f8b;
  }
  .form-group i:hover{
    background: #878f8b;
  }
</style>
<div class="content-wrapper">
   <section class="content">
      <div class="row">
       
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Menu</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  method="post" action="{{ route('create_menu') }}"  >
              <input type="hidden"   name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên menu</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên menu" name="name">
                </div>
                
               	<div class="form-group">
	                <label>Lựa chọn menu cha</label>
	                <select class="form-control select2" style="width: 100%;" name="id_parent">

	                  <option selected="selected" value="0">Chọn menu</option>

	                   <?php foreach ($menus as $key => $menu):?>
                      <option value="{{$menu["id"]}}">{{$menu["name"]}}</option>
                     <?php endforeach;?>
	                </select>
              	</div>
                
              </div>
              <div class="form-group">   
                <input type="hidden" class="form-control"  placeholder="Tên menu" name="icon"  id="icon">
                 <i class="fa fa-circle-o" ></i>             
                 <i class="fa fa-envelope" ></i>
                 
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
          
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
</div>

@include('backend.head.footer')