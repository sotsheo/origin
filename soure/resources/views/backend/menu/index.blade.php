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
            <th>Thao tác</th>
            
          </tr>
        </thead>
        <tbody>
        <?php foreach ($menus as $key => $menu):?>
           <?php if($menu["id_parent"]==0):?>
            <tr>
              <td>{{$menu["name"]}}</td>
              <td><a href="{{ url("admin/menu/update/") }}/{{ $menu->id }}"><i class="fa fa-edit"></i></a> <a href=""><i class="fa fa-trash"></i></i></td>
            </tr>
            <?php foreach ($menus as $key => $menu_item):?>
              <?php if($menu_item["id_parent"]==$menu["id"]):?>
                <tr>
                    <td> |-- {{$menu_item["name"]  }}</td>
                    <td><a href="{{ url("admin/menu/update/") }}/{{ $menu_item->id }}"><i class="fa fa-edit"></i></a> <a href="{{ url("admin/menu/delete/") }}/{{ $menu_item->id }}"><i class="fa fa-trash"></i></i></td>
                </tr>
              <?php endif;?>
            <?php endforeach;?>
            <?php endif;?>
         <?php endforeach;?>
        </tbody>
        
      </table>
      <div class="box-footer">
          <a href="{{ url("admin/menu/create") }}"  class="btn btn-primary">Thêm menu</a>
        </div>
  </div>
  <!-- /.box-body -->
</div>
</div>

@include('backend.head.footer')