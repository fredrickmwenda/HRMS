@extends('layout.main')
@section('content')

<div class="page-content">

        <div id="formModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Status')}}</h5>
                        <button type="button" data-bs-dismiss="modal" id="close" aria-label="Close" class="close"><span
                                    aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                        <span id="bug__status_form_result"></span>
                        <form method="post" id="bug_status_form" class="form-horizontal">

                            @csrf
                            <div class="row">

                                <div class="col-md-6 form-group">
                                    <label>{{trans('file.Status')}}</label>
                                    <select name="bug_status" id="bug_status" class="form-control selectpicker "
                                            data-live-search="true" data-live-search-style="contains"
                                            title='{{__('Selecting',['key'=>trans('file.Status')])}}...'>
                                        <option value="pending">{{trans('file.Pending')}}</option>
                                        <option value="solved">{{trans('file.Solved')}}</option>
                                    </select>
                                </div>

                                <div class="container">
                                    <div class="form-group" align="center">
                                        <input type="hidden" name="action" id="action"/>
                                        <input type="hidden" name="bug_status_id" id="bug_status_id"/>
                                        <input type="submit" name="action_button" id="action_button"
                                               class="btn btn-primary"
                                               value='{{trans('file.Update')}}'/>
                                    </div>
                                </div>


                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 ">
                    <div class="wrapper count-title text-center mb-30px ">
                        <div class="table-responsive">
                            <table id="task_progress" class="table ">
                                <thead><h3>{{__('Task Details')}}</h3></thead>
                                <tbody>
                                <tr>
                                    <th scope="row">{{trans('file.Title')}}</th>
                                    <td class="text-right">{{$task->task_name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{trans('file.Project')}}</th>
                                    <td class="text-right">{{$task->project->title}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{__('Created By')}}</th>
                                    <td class="text-right">{{$task->addedBy->username}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{__('Start Date')}}</th>
                                    <td class="text-right">{{$task->start_date}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{__('End Date')}}</th>
                                    <td class="text-right">{{$task->end_date}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{__('Estimated Hours')}}</th>
                                    <td class="text-right">{{$task->task_hour}}</td>
                                </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>

                    <div class="wrapper count-title text-center ">
                        <div class="card-title"><h3>{{__('Assigned To')}}</h3></div>
                        <span id="assigned_result"></span>

                        <form method="post" id="assigned_form" class="form-horizontal">
                            @csrf
                            <div class="col-md-8 form-group">
                                <label>{{trans('file.Employee')}} *</label>
                                <select name="employee_id[]" id="employee_id" class="form-control pre-assigned"
                                        multiple="multiple">
                                    @foreach($employees as $emp)
                                        <option value="{{$emp->id}}">{{$emp->full_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            @can('assign-task')
                                <div class="col-md-6 form-group">
                                    <input type="submit" name="assigned_submit" id="assigned_submit"
                                           class="btn btn-success"
                                           value={{trans("file.Save")}}>
                                </div>
                            @endcan
                        </form>
                    </div>
                </div>


                <div class="col-md-8">

                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="details-tab" data-bs-toggle="tab" href="#Details"
                                       role="tab" aria-controls="Details"
                                       aria-selected="true">{{trans('file.Details')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="discussions-tab" data-bs-toggle="tab" href="#Discussions"
                                       role="tab"
                                       aria-controls="Discussions" data-table="discussion"
                                       aria-selected="false">{{trans('file.Discussions')}}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="progress-tab" data-bs-toggle="tab" href="#Progress" role="tab"
                                       aria-controls="Progress" data-table="progress"
                                       aria-selected="false">{{trans('file.Progress')}}</a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link" id="files-tab" data-bs-toggle="tab" href="#Files" role="tab"
                                       aria-controls="Files" data-table="files"
                                       aria-selected="false">{{trans('file.Files')}}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="notes-tab" data-bs-toggle="tab" href="#Notes" role="tab"
                                       aria-controls="Notes" aria-selected="false">{{trans('file.Notes')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="Details" role="tabpanel"
                                     aria-labelledby="progress-tab">
                                    <!--Contents for Details starts here-->
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="card-title"><h2>{{trans('file.Details')}}</h2></div>
                                            <div id="task_description"></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="Discussions" role="tabpanel"
                                     aria-labelledby="discussions-tab">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="card-title"><h2>{{trans('file.Discussions')}}</h2></div>
                                            <span id="discussions_result"></span>
                                            <form method="post" id="discussions_form" class="form-horizontal"
                                            >
                                                @csrf
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>{{trans('file.Discussions')}}</label>
                                                        <textarea required class="form-control" id="task_discussions"
                                                                  name="task_discussions" rows="3"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 form-group">
                                                    <input type="submit" name="discussions_submit"
                                                           id="discussions_submit"
                                                           class="btn btn-success" value={{trans("file.Save")}}>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="table-responsive">
                                            <table id="discussions-table" class="table ">
                                                <thead>
                                                <tr>
                                                    <th>{{trans('file.User')}}</th>
                                                    <th>{{trans('file.Message')}}</th>
                                                    <th class="not-exported">{{trans('file.action')}}</th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="Progress" role="tabpanel" aria-labelledby="progress-tab">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="card-title"><h2>{{__('Task Progress')}}</h2></div>
                                            <span id="progress_result"></span>
                                            <form method="post" id="progress_form" class="form-horizontal">
                                                @csrf
                                                <div class="col-md-8 form-group ">
                                                    <label>{{__('Progress Bar')}}} </label>
                                                    <input type="text" name="task_progress" id="task_progress"
                                                           class="form-control range-slider "
                                                           placeholder="{{__('Progress Bar')}}}">
                                                </div>
                                                <div class="col-md-6 form-group show-edit">
                                                    <label>{{trans('file.Status')}}</label>
                                                    <select name="task_status" id="task_status"
                                                            class="form-control selectpicker "
                                                            data-live-search="true" data-live-search-style="contains"
                                                            title='{{__('Selecting',['key'=>trans('file.Status')])}}...'>
                                                        <option value="not started">Not Started</option>
                                                        <option value="ongoing">{{trans('file.Ongoing')}}</option>
                                                        <option value="completed">{{trans('file.Completed')}}</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6 form-group">
                                                    <label>{{__('Estimated Hour')}} *</label>
                                                    <input type="text" name="task_hour" id="task_hour" required
                                                           class="form-control"
                                                           value="{{$task->task_hour}}"
                                                           placeholder="{{__('Estimated Hour')}}">
                                                </div>

                                                <div class="col-md-6 form-group">
                                                    <input type="submit" name="project_progress_submit"
                                                           id="project_progress_submit"
                                                           class="btn btn-success" value={{trans("file.Save")}}>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="Files" role="tabpanel" aria-labelledby="files-tab">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="card-title"><h2>{{trans('file.Files')}}</h2></div>
                                            <span id="files_result"></span>
                                            <form method="post" id="files_form" class="form-horizontal"
                                                  enctype="multipart/form-data">
                                                @csrf

                                                <div class="col-md-6 form-group">
                                                    <label>{{trans('file.Title')}} *</label>
                                                    <input type="text" name="file_title" id="file_title" required
                                                           class="form-control"
                                                           placeholder="{{trans('file.Title')}}">
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>{{trans('file.Description')}}</label>
                                                        <textarea required class="form-control" id="file_description"
                                                                  name="file_description" rows="3"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 form-group">
                                                    <label>{{trans('file.Attachments')}} </label>
                                                    <input type="file" name="file_attachment" id="file_attachment"
                                                           class="form-control">
                                                </div>

                                                <div class="col-md-6 form-group">
                                                    <input type="submit" name="file_submit" id="file_submit"
                                                           class="btn btn-success" value={{trans("file.Save")}}>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="table-responsive">
                                            <table id="files-table" class="table ">
                                                <thead>
                                                <tr>
                                                    <th>{{trans('file.Title')}}</th>
                                                    <th>{{trans('file.Description')}}</th>
                                                    <th>{{__('Date and Time')}}</th>
                                                    <th class="not-exported">{{trans('file.action')}}</th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>

                                    </div>
                                </div>


                                <div class="tab-pane fade" id="Notes" role="tabpanel" aria-labelledby="notes-tab">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="card-title"><h2>{{__('Project Note')}}</h2></div>
                                            <span id="note_result"></span>
                                            <form method="post" id="note_form" class="form-horizontal">
                                                @csrf
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>{{__('Project Note')}}</label>
                                                        <textarea required class="form-control" id="task_note"
                                                                  name="task_note"
                                                                  rows="3">{{$task->task_note}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <input type="submit" name="task_note_submit"
                                                           id="task_note_submit"
                                                           class="btn btn-success" value={{trans("file.Save")}}>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>



@endsection

@push('scripts')
<script type="text/javascript">
    (function($) {
        "use strict";

        let task_status = <?php echo json_encode($task->task_status) ?>;
        let task_progress = <?php echo json_encode($task->task_progress) ?>;
        let assigned = <?php echo json_encode($name) ?>;
        let description = <?php echo json_encode($task->description) ?>;

        function htmlDecode(input){
            var e = document.createElement('div');
            e.innerHTML = input;
            return e.childNodes.length == 0 ? "" : e.childNodes[0].nodeValue;
        }


        $('#task_status').val(task_status);
        $('#task_description').html(htmlDecode(description));


        $(document).ready(function () {

            let date = $('.date');
            date.datepicker({
                format: '{{ env('Date_Format_JS')}}',
                autoclose: true,
                todayHighlight: true
            });

            $('#employee_id').select2({
                placeholder: '{{__('Assign Employee...')}}',
            });
            $('#employee_id').val(assigned);
            $('#employee_id').trigger('change');


            $('#assigned_form').on('submit', function (event) {
                event.preventDefault();

                $.ajax({
                    url: "{{ route('tasks.assigned',$task) }}",
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
                            for (let count = 0; count < data.errors.length; count++) {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if (data.success) {
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                        }
                        $('#assigned_result').html(html).slideDown(300).delay(5000).slideUp(300);
                    }
                })

            });
        });

        $('#progress_form').on('submit', function (event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('task_progress.store',$task) }}",
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
                        for (let count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                    }
                    $('#progress_result').html(html).slideDown(300).delay(5000).slideUp(300);
                }
            })
        });

        $('[data-table="discussion"]').one('click', function (e) {

            $('#discussions-table').DataTable().clear().destroy();

            let table_table = $('#discussions-table').DataTable({
                initComplete: function () {
                    this.api().columns([1]).every(function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
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
                    url: "{{ route('task_discussions.index',$task) }}",
                    method: "post"
                },

                columns: [


                    {
                        data: 'user',
                        name: 'user'
                    },
                    {
                        data: 'message',
                        name: 'message',
                        render: function (data, type, row) {
                            return data + ' (' + row.created_at + ')';
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
                        'targets': [0, 2],
                    },
                ],

                'select': {style: 'multi', selector: 'td:first-child'},
                'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
            });
            new $.fn.dataTable.FixedHeader(table_table);
        });

        $('#discussions_form').on('submit', function (event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('task_discussions.store',$task) }}",
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
                        for (let count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        $('#discussions_form')[0].reset();
                        $('#discussions-table').DataTable().ajax.reload();
                    }
                    $('#discussions_result').html(html).slideDown(300).delay(5000).slideUp(300);
                }
            })
        });

        $(".range-slider").ionRangeSlider({
            type: "single",
            min: 0,
            max: 100,
            step: 1,
            grid: true,
            postfix: "%",
            skin: "round"
        });

        var instance = $('.range-slider').data("ionRangeSlider");
        instance.update({
            from: task_progress,
        });


        $('[data-table="files"]').one('click', function (e) {

            $('#files-table').DataTable().clear().destroy();

            let table_table = $('#files-table').DataTable({
                initComplete: function () {
                    this.api().columns([1]).every(function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
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
                    url: "{{ route('task_files.index',$task) }}",
                    method: "post"
                },

                columns: [


                    {
                        data: 'file_title',
                        name: 'file_title'
                    },
                    {
                        data: 'file_description',
                        name: 'file_description',

                    },
                    {
                        data: 'created_at',
                        name: 'created_at',

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
                        'targets': [0, 2],
                    },
                ],

                'select': {style: 'multi', selector: 'td:first-child'},
                'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
            });
            new $.fn.dataTable.FixedHeader(table_table);
        });

        $('#files_form').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('task_files.store',$task) }}",
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
                        for (let count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        $('#files_form')[0].reset();
                        $('#files-table').DataTable().ajax.reload();
                    }
                    $('#files_result').html(html).slideDown(300).delay(5000).slideUp(300);
                }
            })
        });


        $('#note_form').on('submit', function (event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('task_notes.store',$task) }}",
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
                        for (let count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                    }
                    $('#note_result').html(html).slideDown(300).delay(5000).slideUp(300);
                }
            })
        });

        $(document).on('click', '.delete-discussion', function () {

            if (confirm('{{__('Delete Selection',['key'=>trans('file.Discussions')])}}')) {

                let delete_id = $(this).attr('id');
                let target = "{{ route('tasks.index') }}/" + delete_id + '/delete_discussions';
                $.ajax({
                    url: target,
                    success: function (data) {
                        let html = '';
                        if (data.success) {
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                        }
                        if (data.error) {
                            html = '<div class="alert alert-danger">' + data.error + '</div>';
                        }
                        setTimeout(function () {
                            $('#general_result').html(html).slideDown(300).delay(5000).slideUp(300);
                            $('#confirmModal').modal('hide');
                            $('#discussions-table').DataTable().ajax.reload();
                        }, 2000);
                    }
                })
            }

        });

        $(document).on('click', '.delete-file', function () {

            if (confirm('{{__('Delete Selection',['key'=>trans('file.Files')])}}')) {

                let delete_id = $(this).attr('id');
                let target = "{{ route('tasks.index') }}/" + delete_id + '/delete_files';
                $.ajax({
                    url: target,
                    success: function (data) {
                        let html = '';
                        if (data.success) {
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                        }
                        if (data.error) {
                            html = '<div class="alert alert-danger">' + data.error + '</div>';
                        }
                        setTimeout(function () {
                            $('#general_result').html(html).slideDown(300).delay(5000).slideUp(300);
                            $('#confirmModal').modal('hide');
                            $('#files-table').DataTable().ajax.reload();
                        }, 2000);
                    }
                })
            }

        });

    })(jQuery);
</script>
@endpush
