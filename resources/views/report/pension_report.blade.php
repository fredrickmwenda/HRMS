@extends('layout.main')
@section('content')

<div class="page-content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="wrapper count-title text-center mb-30px ">
                        <div class="box mb-4">
                            <div class="box-header with-border">
                                <h3 class="box-title"> {{__('Pension Info')}} <span id="details_month_year"></span> </h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="post" id="filter_form" class="form-horizontal">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="company_id">{{trans('file.Company')}}</label>
                                                        <select class="form-control selectpicker dynamic"
                                                                name="filter_company" id="company_id"
                                                                data-first_name="first_name" data-last_name="last_name"
                                                                data-placeholder="Company" data-column="1" required=""
                                                                tabindex="-1" aria-hidden="true">
                                                            <option value="0">{{__('All Companies')}}</option>
                                                            @foreach($companies as $company)
                                                                <option value="{{$company->id}}">{{$company->company_name}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="employee_id">{{trans('file.Employee')}}</label>
                                                        <select class="form-control selectpicker default_emp"
                                                                name="filter_employee" id="employee_id"
                                                                data-placeholder="{{trans('file.Employee')}}" required="" tabindex="-1"
                                                                aria-hidden="true">
                                                            <option value="0">{{__('All Employees')}}</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="month_year">{{__('Select Month')}}</label>
                                                        <input class="form-control month_year date"
                                                               placeholder="{{__('Select Month')}}" readonly=""
                                                               id="month_year" name="month_year" type="text" value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="form-actions">
                                                            <button type="submit" class="filtering btn btn-primary"><i
                                                                        class="fa fa-check-square-o"></i> {{trans('file.Search')}}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container-fluid"><span id="general_result"></span></div>
                        <div class="table-responsive">
                            <table id="pension_report-table" class="table ">
                                <thead>
                                <tr>
                                    <th>{{__('Employee Name')}}</th>
                                    <th>{{__('Month-Year')}}</th>
                                    <th>{{__('payment Type')}}</th>
                                    <th>{{__('Basic Salary')}}</th>
                                    <th>{{__('Pension Type')}}</th>
                                    <th>{{__('Pension Amount')}}</th>
                                    <th>{{__('Remainig Balance')}}</th>
                                </tr>
                                </thead>
                            </table>
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

        $(document).ready(function () {

            let date = $('.date');
            date.datepicker({
                format: "MM-yyyy",
                startView: "months",
                minViewMode: 1,
                autoclose: true,
            }).datepicker("setDate", new Date());

            fill_datatable();

            function fill_datatable(filter_company = '', filter_employee = '', filter_month_year = '') {
                $('#details_month_year').html($('#month_year').val());
                let table_table = $('#pension_report-table').DataTable({
                    responsive: true,
                    fixedHeader: {
                        header: true,
                        footer: true
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('report.pension') }}",
                        data: {
                            filter_company: filter_company,
                            filter_employee: filter_employee,
                            filter_month_year: filter_month_year,
                            "_token": "{{ csrf_token()}}"
                        },
                    },

                    columns: [
                        {
                            data: 'employee_name',
                            name: 'employee_name'
                        },
                        {
                            data: 'month_year',
                            name: 'month_year'
                        },
                        {
                            data: 'payment_type',
                            name: 'payment_type'
                        },
                        {
                            data: 'basic_salary',
                            name: 'basic_salary'
                        },
                        {
                            data: 'pension_type',
                            name: 'pension_type'
                        },
                        {
                            data: 'pension_amount',
                            name: 'pension_amount'
                        },
                        {
                            data: 'remaining',
                            name: 'remaining'
                        },

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
                            'targets': [0],
                        },
                    ],

                    'select': {style: 'multi', selector: 'td:first-child'},
                    'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    dom: '<"row"lfB>rtip',
                    buttons: [
                        {
                            extend: 'pdf',
                            text: '{{trans("file.PDF")}}',
                            exportOptions: {
                                columns: ':visible:Not(.not-exported)',
                                rows: ':visible'
                            },
                        },
                        {
                            extend: 'csv',
                            text: '{{trans("file.CSV")}}',
                            exportOptions: {
                                columns: ':visible:Not(.not-exported)',
                                rows: ':visible'
                            },
                        },
                        {
                            extend: 'print',
                            text: '{{trans("file.Print")}}',
                            exportOptions: {
                                columns: ':visible:Not(.not-exported)',
                                rows: ':visible'
                            },
                        },

                        {
                            extend: 'colvis',
                            text: '{{__('Column visibility')}}',
                            columns: ':gt(0)'
                        },
                    ],
                });
            }

            new $.fn.dataTable.FixedHeader($('#pension_report-table').DataTable());

            $('#filter_form').on('submit',function (e) {
                e.preventDefault();
                var filter_company = $('#company_id').val();
                var filter_employee = $('#employee_id').val();
                var filter_month_year = $('#month_year').val();
                if (filter_company !== '' && filter_employee !== '' && filter_month_year !== '') {
                    $('#pension_report-table').DataTable().destroy();
                    fill_datatable(filter_company, filter_employee, filter_month_year);
                } else {
                    alert('{{__('Select Both filter option')}}');
                }
            });
        });

        $('.dynamic').change(function() {
            if ($(this).val() !== '') {
                let value = $(this).val();
                let first_name = $(this).data('first_name');
                let last_name = $(this).data('last_name');
                let _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('dynamic_employee') }}",
                    method:"POST",
                    data:{ value:value, _token:_token, first_name:first_name,last_name:last_name},
                    success:function(result)
                    {
                        $('select').selectpicker("destroy");
                        $('#employee_id').html(result);
                        $('.default_emp').prepend('<option value="0" selected>{{__('All Employees')}}</option>');
                        $('select').selectpicker();

                    }
                });
            }
        });
    })(jQuery);

</script>
@endpush
