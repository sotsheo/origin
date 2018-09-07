@include('backend.head.index')
<div class="content-wrapper">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Table With Full Features</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">

        <thead>
          <tr>
            <th>Tên</th>
            <th>Thao tác</th>
            
          </tr>
        </thead>
        <tbody>
        
        </tbody>
        
      </table> 
      <div class="box-footer">
          <a href="{{ url("admin/news/create") }}"  class="btn btn-primary">Thêm category</a>
        </div>
  </div>
  <!-- /.box-body -->
</div>
</div>

@include('backend.head.footer')