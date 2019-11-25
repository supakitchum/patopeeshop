@extends('backend.layouts.main')
@section('title','สินค้า')
@section('page_name','สินค้า')
@section('sub_page_name','')
@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <h3 class="box-title">รายละเอียดสินค้า</h3>
                        </div>
                        <div class="col-lg-6 col-sm-12" align="right">
                            <a class="btn btn-rounded text-white btn-primary"
                               href="{{ route('backend.products.index') }}">
                                <i class="fa fa-list"></i> รายการ
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form
                        action="{{ Request::is('*edit') ? route('backend.products.update',['id' => $id]):route('backend.products.store') }}"
                        method="post">
                        @csrf
                        @if(Request::is('*edit'))
                            @method('put')
                        @endif
                        <div id="images"></div>
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ชื่อสินค้า</label>
                                    <input type="text" value="{{ isset($results[0]->name) ? $results[0]->name:'' }}"
                                           class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>หมวดหมู่</label>
                                    <select multiple class="form-control selectpicker" name="catalogs[]">
                                        @foreach($catalogs as $catalog)
                                            <option
                                                {{ isset($catalog_results) && in_array($catalog->id,$catalog_results) ? 'selected':'' }} value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="file-loading">
                                    <input id="input-pd" name="input-pd[]" type="file" accept="image/*" multiple>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div id="feature" class="col-12">
                                @if(isset($results))
                                    @foreach($results as $index=>$result)
                                        <div class="row" id="feature-{{ $index+1 }}">
                                            <div id="detail-{{ $index+1 }}">
                                                <input type="hidden" name="detail_id[]" value="{{ $result->detail_id }}">
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>ขนาด</label>
                                                    <select class="form-control" name="size[]">
                                                        @foreach($sizes as $size)
                                                            <option
                                                                {{ $size->id == $result->size ? 'selected':'' }} value="{{ $size->id }}">{{ $size->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>สี</label>
                                                    <select class="form-control" name="color[]">
                                                        @foreach($colors as $color)
                                                            <option
                                                                {{ $color->id == $result->color ? 'selected':'' }} value="{{ $color->id }}">{{ $color->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>จำนวน</label>
                                                    <input id="feature-{{ $index+1 }}-quality" type="number"
                                                           name="quality[]" value="{{ $result->quality }}"
                                                           class="form-control" required placeholder="0">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <label>ราคา</label>
                                                <div class="input-group">
                                                    <input id="feature-{{ $index+1 }}-amount" type="number"
                                                           name="amount[]" value="{{ $result->price }}"
                                                           class="form-control" required placeholder="0">
                                                    <span class="input-group-addon">บาท</span>
                                                </div>
                                            </div>
                                            <div class="col-1 pt-25">
                                                <button class="btn btn-rounded btn-danger" type="button"
                                                        onclick="remove({{ $index+1 }},false,{{ $result->detail_id }})">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row" id="feature-1">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>ขนาด</label>
                                                <select class="form-control" name="size[]">
                                                    @foreach($sizes as $size)
                                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>สี</label>
                                                <select class="form-control" name="color[]">
                                                    @foreach($colors as $color)
                                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>จำนวน</label>
                                                <input id="feature-1-quality" type="number" name="quality[]"
                                                       class="form-control" required placeholder="0">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <label>ราคา</label>
                                            <div class="input-group">
                                                <input id="feature-1-amount" type="number" name="amount[]"
                                                       class="form-control" required placeholder="0">
                                                <span class="input-group-addon">บาท</span>
                                            </div>
                                        </div>
                                        <div class="col-1 pt-25">
                                            <button class="btn btn-rounded btn-danger" type="button"
                                                    onclick="remove(1,true,null)">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="button" onclick="add();" class="btn btn-rounded btn-primary"><i
                                            class="fa fa-plus"></i> เพิ่มคุณลักษณะ
                                    </button>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">รายละเอียดสินค้า</h3>
                                        <!-- tools box -->
                                        <div class="pull-right box-tools">
                                            <button type="button" class="btn btn-default btn-sm" data-widget="collapse"
                                                    data-toggle="tooltip"
                                                    title="Collapse">
                                                <i class="fa fa-minus"></i></button>
                                            <button type="button" class="btn btn-default btn-sm" data-widget="remove"
                                                    data-toggle="tooltip"
                                                    title="Remove">
                                                <i class="fa fa-times"></i></button>
                                        </div>
                                        <!-- /. tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body pad">
                                        <textarea name="detail" class="textarea" placeholder="Place some text here"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ isset($results[0]->detail) ? $results[0]->detail:'' }}</textarea>
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12" align="right">
                                <div class="checkbox inline">
                                    <input
                                        {{ isset($results[0]->recommend) && $results[0]->recommend == 1 ? 'checked':'' }} type="checkbox"
                                        id="recommend" name="recommend" value="1">
                                    <label for="recommend">สินค้าแนะนำ</label>
                                </div>
                                <button type="submit" class="btn btn-success btn-rounded ml-5">บันทึก</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        let id = {{ isset($results) ? sizeof($results):1 }}

        function remove(rid,is_new,did) {
            if (is_new)
                $('#feature-' + rid).html('')
            else
                $('#feature-' + rid).html('<input type="hidden" name="remove[]" value="'+did+'">')
        }

        function add() {
            if ($('#feature-' + id + '-amount').val()){
                $('#feature').append(
                    '<div class="row" id="feature-' + (id + 1) + '">' + $('#feature-' + id).html().replace('feature-' + id + '-amount', 'feature-' + (id + 1) + '-amount').replace('feature-' + id + '-quality', 'feature-' + (id + 1) + '-quality').replace('detail-'+id,'detail-'+(id+1)).replace('remove(' + id + ')', 'remove(' + (id + 1) + ')') + '</div>'
                )
                $('#feature-' + (id + 1) + '-amount').val($('#feature-' + id + '-amount').val())
                $('#feature-' + (id + 1) + '-quality').val($('#feature-' + id + '-quality').val())
                $('#detail-' + (id + 1)).html('')
                id++
            }
        }

        $(function () {
            $('.selectpicker').selectpicker();
        })
    </script>
    <script>
        $("#input-pd").fileinput({
            language: 'th',
            uploadUrl: "/api/image/add/{{ $id }}",
            maxFileCount: 10,
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            overwriteInitial: false,
            enableResumableUpload: true,
            @if(isset($images))
            initialPreview:
                [
                    @foreach($images as $image)
                        "{{ asset($image->path) }}",
                    @endforeach
                ],
            initialPreviewConfig:
                [
                        @foreach($images as $index=>$image)
                    {
                        caption: "image-{{$index}}",
                        width: "120px",
                        url: "{{ '/api/image/delete/'.$id }}",
                        key: "{{ $image->path }}"
                    },
                    @endforeach
                ],
            @endif
            initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
            initialPreviewFileType: 'image', // image is the default and can be overridden in config below
            purifyHtml: true, // this by default purifies HTML data for preview
        }).on('fileuploaded', function (event, previewId, index, fileId) {
            console.log('File Uploaded', 'ID: ' + fileId + ', Thumb ID: ' + previewId);
        }).on('fileuploaderror', function (event, data, msg) {
            console.log('File Upload Error', 'ID: ' + data.fileId + ', Thumb ID: ' + data.previewId);
        }).on('filebatchuploadcomplete', function (event, preview, config, tags, extraData) {
            console.log('File Batch Uploaded', preview, config, tags, extraData);
        });
    </script>

@stop
