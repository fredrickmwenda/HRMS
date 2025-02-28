@extends('layout.client')
@section('content')


<div class="page-content">

        <div class="container-fluid"><span id="general_result"></span></div>


        <div class="container-fluid">
                <button type="button" class="btn btn-info" name="create_record" id="create_record"><i
                            class="fa fa-plus"></i> {{__('Add Task')}}</button>
        </div>

        <div class="table-responsive">
            <table id="client_task-table" class="table ">
                <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th>{{trans('file.Title')}}</th>
                    <th>{{__('Start Date')}}</th>
                    <th>{{__('End Date')}}</th>
                    <th>{{trans('file.Status')}}</th>
                    <th>{{__('Assigned Employees')}}</th>
                    <th>{{__('Task Progress')}}</th>
                    <th class="not-exported">{{trans('file.action')}}</th>
                </tr>
                </thead>

            </table>
        </div>
    



    <div id="formModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{__('Add Task')}}</h5>
                    <button type="button" data-bs-dismiss="modal" id="close" aria-label="Close" class="btn-close"></button>
                </div>

                <div class="modal-body">
                    <span id="form_result"></span>
                    <form method="post" id="sample_form" class="form-horizontal">

                        @csrf

                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label>{{trans('file.Title')}} *</label>
                                <input type="text" name="task_name" id="task_name" required class="form-control"
                                       placeholder="{{trans('file.Title')}}">
                            </div>

                            <div class="col-md-6">
                                <div class="form-group hide-edit">
                                    <label>{{trans('file.Company')}}</label>
                                    <select name="company_id" id="company_id" class="form-control selectpicker dynamic"
                                            data-live-search="true" data-live-search-style="contains"
                                            data-first_name="first_name" data-last_name="last_name"
                                            title='{{__('Selecting',['key'=>trans('file.Company')])}}...'>
                                        @foreach($companies as $company)
                                            <option value="{{$company->id}}">{{$company->company_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6 form-group">
                                <label>{{__('Start Date')}} *</label>
                                <input type="text" name="start_date" id="start_date" autocomplete="off" required
                                       class="form-control date"
                                       value="">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>{{__('End Date')}} *</label>
                                <input type="text" name="end_date" id="end_date" autocomplete="off" required
                                       class="form-control date"
                                       value="">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>{{trans('file.Project')}}</label>
                                <select name="project_id" id="project_id" class="form-control selectpicker "
                                        data-live-search="true" data-live-search-style="contains"
                                        title='{{__('Selecting',['key'=>trans('file.Project')])}}...'>
                                    @foreach($projects as $project)
                                        <option value="{{$project->id}}">{{$project->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label>{{__('Estimated Hour')}} *</label>
                                <input type="text" name="task_hour" id="task_hour" required class="form-control"
                                       placeholder="{{__('Estimated Hour')}}">
                            </div>




                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{trans('file.Description')}}</label>
                                    <textarea class="form-control des-editor" id="description" name="description"
                                              rows="3"></textarea>
                                </div>
                            </div>


                            <div class="container">
                                <div class="form-group" align="center">
                                    <input type="submit" name="action_button" id="action_button" class="btn btn-primary"
                                           value={{trans('file.Add')}}>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{__('Edit Task')}}</h5>
                    <button type="button" data-bs-dismiss="modal" id="close" aria-label="Close" class="btn-close"></button>
                </div>

                <div class="modal-body">
                    <span id="edit_form_result"></span>
                    <form method="post" id="edit_sample_form" class="form-horizontal">

                        @csrf

                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label>{{trans('file.Title')}} *</label>
                                <input type="text" name="edit_task_name" id="edit_task_name" required
                                       class="form-control"
                                       placeholder="{{trans('file.Title')}}">
                            </div>

                            <div class="col-md-6">
                                <div class="form-group hide-edit">
                                    <label>{{trans('file.Company')}}</label>
                                    <select name="edit_company_id" id="edit_company_id" class="form-control selectpicker dynamic"
                                            data-live-search="true" data-live-search-style="contains"
                                            data-first_name="first_name" data-last_name="last_name"
                                            title='{{__('Selecting',['key'=>trans('file.Company')])}}...'>
                                        @foreach($companies as $company)
                                            <option value="{{$company->id}}">{{$company->company_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6 form-group">
                                <label>{{__('Start Date')}} *</label>
                                <input type="text" name="edit_start_date" id="edit_start_date" autocomplete="off"
                                       required class="form-control date"
                                       value="">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>{{__('End Date')}} *</label>
                                <input type="text" name="edit_end_date" id="edit_end_date" autocomplete="off" required
                                       class="form-control date"
                                       value="">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>{{trans('file.Project')}}</label>
                                <select name="edit_project_id" id="edit_project_id" class="form-control selectpicker "
                                        data-live-search="true" data-live-search-style="contains"
                                        title='{{__('Selecting',['key'=>trans('file.Project')])}}...'>
                                    @foreach($projects as $project)
                                        <option value="{{$project->id}}">{{$project->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label>{{__('Estimated Hour')}} *</label>
                                <input type="text" name="edit_task_hour" id="edit_task_hour" required
                                       class="form-control"
                                       placeholder="{{__('Estimated Hour')}}">
                            </div>




                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{trans('file.Description')}}</label>
                                    <textarea class="form-control des-editor" id="edit_description"
                                              name="edit_description"
                                              rows="3"></textarea>
                                </div>
                            </div>




                            <div class="container">
                                <div class="form-group" align="center">
                                    <input type="hidden" name="hidden_id" id="hidden_id"/>
                                    <input type="submit" name="edit_action_button" id="edit_action_button"
                                           class="btn btn-primary"
                                           value={{trans("file.Edit")}}>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">{{trans('file.Confirmation')}}</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 align="center">{{__('Are you sure you want to remove this data?')}}</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-primary">{{trans('file.OK')}}'
                    </button>
                    <button type="button" class="btn-close btn-light"
                            data-bs-dismiss="modal">{{trans('file.Cancel')}}</button>
                </div>
            </div>
        </div>
    </div>

</div>
    <script type="text/javascript">
        (function($) {  
        
            "use strict";

            $(document).ready(function () {

                let date = $('.date');
                date.datepicker({
                    format: '{{ env('Date_Format_JS')}}',
                    autoclose: true,
                    todayHighlight: true
                });


                let table_table = $('#client_task-table').DataTable({
                    initComplete: function () {
                        this.api().columns([1]).every(function () {
                            let column = this;
                            let select = $('<select><option value=""></option></select>')
                                .appendTo($(column.footer()).empty())
                                .on('change', function () {
                                    let val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );

                                    column
                                        .search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                                });

                            column.data().unique().sort().each(function (d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                                $('select').selectpicker('refresh');
                            });
                        });
                    },
                    responsive: true,
                    fixedHeader: {
                        header: true,
                        footer: true
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('clientTask') }}",
                    },

                    columns: [
                        {
                            data: null,
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'task_name',
                            name: 'task_name',
                        },

                        {
                            data: 'start_date',
                            name: 'start_date',
                        },

                        {
                            data: 'end_date',
                            name: 'end_date',
                        },
                        {
                            data: 'task_status',
                            name: 'task_status',
                        },
                        {
                            data: 'assigned_employee',
                            name: 'assigned_employee',
                            render: function (data) {
                                return data.join("<br>");
                            }
                        },
                        {
                            data: 'task_progress',
                            name: 'task_progress',
                            render: function (data) {
                                if (data !== null) {
                                    if(data > 70) {
                                        return data + '% complete<div class="progress"><div class="progress-bar green" role="progressbar" style="width: '+data+'%" aria-valuenow="'+data+'" aria-valuemin="0" aria-valuemax="100"></div></div>'
                                    } else if (data > 50) {
                                        return data + '% complete<div class="progress"><div class="progress-bar yellow" role="progressbar" style="width: '+data+'%" aria-valuenow="'+data+'" aria-valuemin="0" aria-valuemax="100"></div></div>'
                                    } else {
                                        return data + '% complete<div class="progress"><div class="progress-bar red" role="progressbar" style="width: '+data+'%" aria-valuenow="'+data+'" aria-valuemin="0" aria-valuemax="100"></div></div>'
                                    }
                                } else {
                                    return 0 + '% complete'
                                }
                            }
                        },


                        {
                            data: 'action',
                            name: 'action',
                            orderable: false
                        }
                    ],


                    "order": [],
                    'language': {
                        'lengthMenu': '_MENU_ {{__("records per page")}}',
                        "info": '{{trans("file.Showing")}} _START_ - _END_ (_TOTAL_)',
                        "search": '{{trans("file.Search")}}',
                        'paginate': {
                            'previous': '{{trans("file.Previous")}}',
                            'next': '{{trans("file.Next")}}'
                        }
                    },
                    'columnDefs': [
                        {
                            "orderable": false,
                            'targets': [0, 6],
                        },
                        {
                            'render': function (data, type, row, meta) {
                                if (type == 'display') {
                                    data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                                }

                                return data;
                            },
                            'checkboxes': {
                                'selectRow': true,
                                'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
                            },
                            'targets': [0]
                        }
                    ],


                    'select': {style: 'multi', selector: 'td:first-child'},
                    'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    dom: '<"row"lfB>rtip',
                    buttons: [
                        {
                            extend: 'pdf',
                            text: '<i title="export to pdf" class="fa fa-file-pdf-o"></i>',
                            exportOptions: {
                                columns: ':visible:Not(.not-exported)',
                                rows: ':visible'
                            },
                        },
                        {
                            extend: 'csv',
                            text: '<i title="export to csv" class="fa fa-file-text-o"></i>',
                            exportOptions: {
                                columns: ':visible:Not(.not-exported)',
                                rows: ':visible'
                            },
                        },
                        {
                            extend: 'print',
                            text: '<i title="print" class="fa fa-print"></i>',
                            exportOptions: {
                                columns: ':visible:Not(.not-exported)',
                                rows: ':visible'
                            },
                        },
                        {
                            extend: 'colvis',
                            text: '<i title="column visibility" class="fa fa-eye"></i>',
                            columns: ':gt(0)'
                        },
                    ],
                });
                new $.fn.dataTable.FixedHeader(table_table);
            });

            tinymce.init({
                selector: '.des-editor',
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                },
                height: 130,

                image_title: true,
                /* enable automatic uploads of images represented by blob or data URIs*/
                automatic_uploads: true,
                /*
                  URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
                  images_upload_url: 'postAcceptor.php',
                  here we add custom filepicker only to Image dialog
                */
                file_picker_types: 'image',
                /* and here's our custom image picker*/
                file_picker_callback: function (cb, value, meta) {
                    let input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    /*
                      Note: In modern browsers input[type="file"] is functional without
                      even adding it to the DOM, but that might not be the case in some older
                      or quirky browsers like IE, so you might want to add it to the DOM
                      just in case, and visually hide it. And do not forget do remove it
                      once you do not need it anymore.
                    */

                    input.onchange = function () {
                        let file = this.files[0];

                        let reader = new FileReader();
                        reader.onload = function () {
                            /*
                              Note: Now we need to register the blob in TinyMCEs image blob
                              registry. In the next release this part hopefully won't be
                              necessary, as we are looking to handle it internally.
                            */
                            let id = 'blobid' + (new Date()).getTime();
                            let blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                            let base64 = reader.result.split(',')[1];
                            let blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            /* call the callback and populate the Title field with the file name */
                            cb(blobInfo.blobUri(), { title: file.name });
                        };
                        reader.readAsDataURL(file);
                    };

                    input.click();
                },

                plugins: [
                    'advlist autolink lists link image charmap print preview anchor textcolor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code wordcount'
                ],
                toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
                branding: false
            });


            $('#create_record').on('click', function () {

                $('#formModal').modal('show');
            });

            $('#sample_form').on('submit', function (event) {
                event.preventDefault();

                $.ajax({
                    url: "{{ route('clientTask.store') }}",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function (data) {
                        let html = '';
                        if (data.errors) {
                            html = '<div class="alert alert-danger">';
                            for (var count = 0; count < data.errors.length; count++) {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if (data.success) {
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            $('#sample_form')[0].reset();
                            $('select').selectpicker('refresh');
                            $('#task-table').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                    }
                });
            });

            $('#edit_sample_form').on('submit', function (event) {
                event.preventDefault();

                $.ajax({
                    url: "{{ route('clientTask.update') }}",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function (data) {
                        let html = '';
                        if (data.errors) {
                            html = '<div class="alert alert-danger">';
                            for (var count = 0; count < data.errors.length; count++) {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if (data.success) {
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            setTimeout(function () {
                                $('#editModal').modal('hide');
                                $('select').selectpicker('refresh');
                                $('#client_task-table').DataTable().ajax.reload();
                                $('#edit_sample_form')[0].reset();
                            }, 2000);

                        }
                        $('#edit_form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                    }
                });
            });

            function htmlDecode(input){
                let e = document.createElement('div');
                e.innerHTML = input;
                return e.childNodes.length == 0 ? "" : e.childNodes[0].nodeValue;
            }

            $(document).on('click', '.edit', function () {

                let id = $(this).attr('id');
                $('#edit_form_result').html('');


                let target = "{{ route('clientTask') }}/" + id + '/edit';

                $.ajax({
                    url: target,
                    dataType: "json",
                    success: function (html) {

                        $('#edit_task_name').val(html.data.task_name);
                        $('#edit_project_id').selectpicker('val', html.data.project_id);
                        $('#edit_task_status').selectpicker('val', html.data.task_status);
                        $('#edit_company_id').selectpicker('val', html.data.company_id);
                        if (html.data.description) {
                            tinymce.get('edit_description').setContent(htmlDecode(html.data.description));
                        }
                        $('#edit_start_date').val(html.data.start_date);
                        $('#edit_end_date').val(html.data.end_date);
                        $('#edit_task_hour').val(html.data.task_hour);


                        $('#hidden_id').val(html.data.id);
                        $('#editModal').modal('show');
                    }
                })
            });

            $('.close').on('click', function () {
                $('#sample_form')[0].reset();
                $('#edit_sample_form')[0].reset();

                $('select').selectpicker('refresh');
                $('#client_task-table').DataTable().ajax.reload();
            });

        })(jQuery); 
    </script>

@endsection