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
            <th>Nổi bật</th>
            <th>Danh mục</th>
            <th>Thao tác</th>
            
          </tr>
        </thead>
        <tbody>
          <?php foreach($news as $key => $new):?>
            <tr>
              <td><a href="{{ url("admin/news/update/") }}/{{ $new->id }}">{{$new["name"]}}</a></td>
              <td>{{($new["status"]==1) ? "Nổi bật" :"Không nổi bật"}}</td>
              <td>
                <?php foreach($categorys as $key => $category){
                  if($new["id_category"]==$category["id"]){
                    echo($category["name"]);
                  }
                }?>
              </td>
              <td><a href="{{ url("admin/news/delete/") }}/{{ $new->id }}"><i class="fa fa-edit"></i></a> <a href="{{ url("admin/news/category_delete/") }}/{{ $new->id }}"><i class="fa fa-trash"></i></i></td>
            </tr>
        <?php endforeach;?>
        </tbody>
        </tbody>
        
      </table> 
      <div class="box-footer">
          <a  href="{{ url("admin/news/create") }}"  class="btn btn-primary">Thêm bài viết</a>
        </div>
  </div>
  <!-- /.box-body -->
</div>
</div>

@include('backend.head.footer')