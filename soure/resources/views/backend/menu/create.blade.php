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
                <label>Lựa chọn icon:</label>
                <div>
                   <input type="hidden" class="form-control"  placeholder="Tên menu" name="icon"  id="icon" value="">
                 <i class="fa fa-circle-o" ></i>             
                 <i class="fa fa-envelope" ></i>
                 <i class="fa fa-address-book"></i>
                 <i class="fa fa-align-justify"></i>
                 <i class="fa fa-align-left"></i>
                 <i class="fa fa-align-right"></i>
                 <i class="fa fa-bars"></i>
                 <i class="fa fa-calendar-alt"></i>
                 <i class="fa fa-cogs"></i>
                 <i class="fa fa-cog"></i>
                 <i class="fa fa-comment-dots"></i>
                 <i class="fa fa-grip-horizontal"></i>
                 <i class="fa fa-grip-vertical"></i>
                 <i class="fa fa-list"></i>  
                 <i class="fa fa-money-bill-alt"></i>
                 <i class="fa fa-save"></i>
                 <i class="fa fa-server"></i>
                 <i class="fa fa-th"></i>
                 <i class="fa fa-th-list"></i>
                 <i class="fa fa-user-tie"></i>
                 <i class="fa fa-user-minus"></i>
                 <i class="fa fa-window-maximize"></i>
                 <i class="fa fa-window-restore"></i>
                 <i class="fa fa-window-close"></i>
                 <i class="fa fa-tshirt"></i>
                 <i class="fa fa-tshirt"></i>
                 <i class="fa fa-male"></i>
                 <i class="fa fa-id-card"></i>
                 <i class="fa fa-home"></i>
                </div>
               
              </div>
              <!-- /.box-body -->
              <div class="form-group">
                  <label>Lựa chọn đường dẫn</label>
                 <select class="form-control select2" style="width: 100%;" name="link">
                    <optgroup label="Quản lý bài viết">
                      <option value="/admin/news/index">Bài viết</option>
                      <option value="/admin/news/newscategory">Danh mục bài viết</option>
                    </optgroup>
                    <optgroup label="Quản lý banner">
                      <option value="/admin/banner/index">Banner</option>
                      <option value="/admin/banner/category">Nhóm banner</option>
                    </optgroup>
                 </select>
              </div>
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