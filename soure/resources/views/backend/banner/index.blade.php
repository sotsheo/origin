@include('backend.head.index')
<div class="content-wrapper">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Danh sách menu</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table  class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Tên</th>
            <th>Ảnh </th>
            <th>Thao tác</th>
            
          </tr>
        </thead>
        <tbody>
        <?php foreach ($banners as $key => $banner):?>
         
            <tr>
              <td>{{$banner["name"]}}</td>
              <td><img src="{{ url('soure/public/upload/banner') }}/{{ $banner['img'] }}" style="width: 300px;height: 100px"></td>
              <td><a href="{{ url("admin/banner/update/") }}/{{ $banner->id }}"><i class="fa fa-edit"></i></a> <a href=""><i class="fa fa-trash"></i></i></td>
            </tr>
            
         <?php endforeach;?>
        </tbody>
        
      </table>
      <div class="box-footer">
          <a href="{{ url("admin/banner/create") }}"  class="btn btn-primary">Thêm menu</a>
        </div>
  </div>
  <!-- /.box-body -->
</div>
</div>

@include('backend.head.footer')