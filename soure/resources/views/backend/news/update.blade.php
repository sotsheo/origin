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
              <h3 class="box-title">Update bài viết</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  method="post" action="{{ route('update_news') }}"  >
              <input type="hidden"   name="_token" value="{{ csrf_token() }}"/>
              <input type="hidden"   name="id" value="{{ $news['id'] }}" />
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên danh mục</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" name="name" value="{{ $news['name'] }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Đường dẫn SEO</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên dẫn SEO" name="url" value="{{ $news['url'] }}">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Mô tả ngắn</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Mô tả ngắn" name="news_sortdesc" value="{{ $news['news_sortdesc'] }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Mô tả </label>
                  <textarea id="demo" class="ckeditor" name="desc" >{{ $news['desc'] }}</textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nổi bật     </label>
                  <input type="checkbox"  name="status" {{ ($news['status']==1)?"checked":"" }}>
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Hình ảnh</label>
                  <img src="{{ url('soure/public/upload/tintuc') }}/{{ $news['img'] }}" style="width: 100px;height: 100px">
                  <input type="file" name="img" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Thứ tự</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên menu" name="orders" value="{{ $news['orders'] }}">
                </div>
                
               	 <div class="form-group">
                  <label>Lựa chọn danh mục bài viết</label>
                  <select class="form-control select2" style="width: 100%;" name="id_category">

                    <option  value="0">Chọn menu</option>

                     <?php foreach ($categorys as $key => $category):?>
                      <option value="{{$category["id"]}}" {{($news["id_category"]==$category["id"])?"selected" :""}}>{{$category["name"]}}</option>
                     <?php endforeach;?>
                  </select>
                </div>
                
            
                
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

<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
@include('backend.head.footer')