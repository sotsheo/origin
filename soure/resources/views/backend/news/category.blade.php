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
            <th>Nổi bật </th>
            <th>Thao tác</th>
            
          </tr>
        </thead>
        <tbody>
        <?php foreach($categorys as $key => $category):?>
            <tr>
              <td><a href="{{ url("admin/news/category_update/") }}/{{ $category->id }}">{{$category["name"]}}</a></td>
              <td>{{($category["status"]==1) ? "Nổi bật" :"Không nổi bật"}}</td>
              <td><a href="{{ url("admin/news/category_update/") }}/{{ $category->id }}"><i class="fa fa-edit"></i></a> <a href="{{ url("admin/news/category_delete/") }}/{{ $category->id }}"><i class="fa fa-trash"></i></i></td>
            </tr>
        <?php endforeach;?>
        </tbody>
        
      </table> 
      <div class="box-footer">
          <a href="{{ url("admin/news/createcategory") }}"  class="btn btn-primary">Thêm category</a>
        </div>
  </div>
  <!-- /.box-body -->
</div>
</div>

@include('backend.head.footer')