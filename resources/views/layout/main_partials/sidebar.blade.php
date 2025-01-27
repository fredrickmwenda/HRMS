    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" data-key="t-menu">Menu</li>

                    @if(auth()->user()->role_users_id ==1)

                    <li class="{{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
                        <a href="{{route('admin.dashboard')}}">
                            <i data-feather="home"></i>
                            <span data-key="t-dashboard">Dashboard</span>
                        </a>
                    </li>
                    @else


                    <li class="{{ (request()->is('employee/dashboard*')) ? 'active' : '' }}">
                        <a href="{{url('/employee/dashboard')}}">
                            <i data-feather="home"></i>
                            <span data-key="t-dashboard">Dashboard</span>
                        </a>
                    </li>
                    @endif


                    @can('user')
                    <li class="@if(request()->is('user*')){{ (request()->is('user*')) ? 'active' : '' }}@elseif(request()->is('add-user*')){{ (request()->is('add-user*')) ? 'active' : '' }}@endif">
                        @if(auth()->user()->can('view-user'))
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="user"></i>
                            <span data-key="t-apps">{{trans('file.User')}}</span>
                        </a>
                        @endif
                        <ul class="sub-menu" aria-expanded="false">
                            @can('view-user')
                            <li id="users-menu">
                                <a href="{{route('users-list')}}">
                                    <span data-key="t-calendar">{{__('Users List')}}</span>
                                </a>
                            </li>
                            @endcan


                             @can('role-access-user') 
                            <li id="user-roles">
                                <a href="{{route('user-roles')}}">
                                    <span data-key="t-calendar">{{__('Assign Role')}}</span>
                                </a>
                            </li>
                            @endcan 
                   
                            @can('last-login-user')
                            <li id="user-last-login">
                                <a href="{{route('login-info')}}">
                                    <span data-key="t-calendar">{{__('Users Last Login')}}</span>
                               </a>                     
                            </li>
                            @endcan

                        
                        </ul>
                    </li>
                    @endcan

               
                    @can('view-details-employee')
                    <li class="{{ (request()->is('staff*')) ? 'active' : '' }}">
                        <a href="javascript: void(0);" class="has-arrow">
                            
                            <i data-feather="users"></i>
                            <span data-key="t-employees">{{trans('file.Employees')}}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @can('view-details-employee')
                            <li><a href="{{route('employees.index')}}" data-key="t-employee-list">{{__('Employee Lists')}}</a></li>
                            @endcan
                            @can('import-employee')
                            <li><a href="{{route('employees.import')}}" data-key="t-import-employee">{{__('Import Employees')}}</a></li>
                            @endcan
                
                        </ul>
                    </li>
                    @endcan

             
                    <li class="{{ (request()->is('organization*')) ? 'active' : '' }}">
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="file-text"></i>
                            <span data-key="t-organization">{{trans('file.Organization')}}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                        @can('view-company')
                            <li><a href="{{route('companies.index')}}" data-key="t-company">{{trans('file.Company')}}</a></li>
                        @endcan

                        @can('view-department')
                            <li><a href="{{route('departments.index')}}" data-key="t-department"> {{trans('file.Department')}}</a></li>
                        @endcan

                        @can('view-designation')
                            <li><a href="{{route('designations.index')}}" data-key="t-designation"> {{trans('file.Designation')}}</a></li>
                        @endcan

                        @can('view-location')
                            <li><a href="{{route('locations.index')}}" data-key="t-location"> {{trans('file.Location')}}</a></li>
                        @endcan

                        @can('announcement') 
                                <li ><a href="{{route('announcements.index')}}">{{trans('file.Announcements')}}</a></li>
                        @endcan 

                        @can('policy') 
                            <li ><a href="{{route('policy.index')}}">{{__('Company Policy')}}</a></li>
                        @endcan 
                        </ul>
                    </li>

               
                    @can('core_hr')
                    <li  class="{{ (request()->is('core_hr*')) ? 'active' : '' }}">
                        @if(auth()->user()->can('view-promotion')||auth()->user()->can('view-award') || auth()->user()->can('view-travel')||auth()->user()->can('view-transfer')||auth()->user()->can('view-resignation')||auth()->user()->can('view-complaint')||auth()->user()->can('view-warning')||auth()->user()->can('view-termination'))
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="briefcase"></i>
                            <span data-key="t-core">{{__('Core HR')}}</span>
                        </a>
                        @endif  
                        <ul class="sub-menu" aria-expanded="false">
                            @can('view-promotion')
                                <li><a href="{{route('promotions.index')}}" data-key="t-promotion">{{trans('file.Promotion')}}</a></li>
                            @endcan

                            @can('view-award')
                                <li><a href="{{route('awards.index')}}" data-key="t-award">{{trans('file.Award')}}</a></li>
                            @endcan

                            @can('view-travel')
                                <li><a href="{{route('travels.index')}}" data-key="t-travel">{{trans('file.Travel')}}</a></li>
                            @endcan

                            @can('view-transfer')
                                <li><a href="{{route('transfers.index')}}" data-key="t-transfer">{{trans('file.Transfer')}}</a></li>
                            @endcan

                            @can('view-resignation')
                                <li><a href="{{route('resignations.index')}}" data-key="t-resignation">{{trans('file.Resignation')}}</a></li>
                            @endcan

                            @can('view-complaint')
                                <li><a href="{{route('complaints.index')}}" data-key="t-complaint">{{trans('file.Complaints')}}</a></li>
                            @endcan

                            @can('view-warning')
                                <li><a href="{{route('complaints.index')}}" data-key="t-warning">{{trans('file.Warnings')}}</a></li>
                            @endcan

                            @can('view-termination')
                                <li><a href="{{route('terminations.index')}}" data-key="t-termiantion">{{trans('file.Terminations')}}</a></li>
                            @endcan
                        
                        </ul>
                    </li>
                    @endcan

               

                    @can('timesheet')
                    <li class="{{ (request()->is('timesheet*')) ? 'active' : '' }}">

                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="sliders"></i>
                            <span data-key="t-timesheets">{{trans('file.Timesheets')}}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                        @can('view-attendance')
                            <li><a href="{{route('attendances.index')}}" data-key="t-attendance">{{trans('file.Attendances')}}</a></li>
                            <li><a href="{{route('date_wise_attendances.index')}}" data-key="t-date-wise-attendance">{{__('Date wise Attendances')}}</a></li>
                        @endcan
                        @can('edit-attendance')
                            <li><a href="{{route('update_attendances.index')}}" data-key="t-update-attendances"> {{__('Add/Update Attendances')}}</a></li>
                        @endcan

                        @can('import-attendance')
                            <li><a href="{{route('attendances.import')}}" data-key="t-import_attendances">{{__('Import Attendances')}}</a></li>
                        @endcan

                        @can('view-office_shift')
                            <li><a href="{{route('office_shift.index')}}" data-key="t-office_shift">{{__('Office Shift')}}</a></li>
                        @endcan

                        @can('view-holiday')
                            <li><a href="{{route('holidays.index')}}" data-key="t-holiday">{{__('Manage Holiday')}}</a></li>
                        @endcan
                        
                        @can('view-leave')
                            <li><a href="{{route('leaves.index')}}" data-key="t-leave">{{__('Manage Leaves')}}</a></li>
                        @endcan
                        </ul>
                    </li>
                    @endcan

                    @can('payment-module')
                    <li class="{{ (request()->is('payroll*')) ? 'active' : '' }}">
                        @if(auth()->user()->can('view-payslip') || auth()->user()->can('view-paylist'))
                        <a href="javascript: void(0);" class="has-arrow">
                        <i class="dripicons-wallet"></i>
                            <span data-key="t-wallet">{{trans('file.Payroll')}}</span>
                        </a>
                        @endif
                        <ul class="sub-menu" aria-expanded="false">
                        @can('view-payslip')
                            <li><a href="{{route('payroll.index')}}" data-key="t-payroll">{{__('New Payment')}}</a></li>
                        @endcan

                        @can('view-paylist')
                        <li><a href="{{route('payment_history.index')}}" data-key="t-payment">{{__('Payment History')}}</a></li>
                        @endcan

                        
                        </ul>
                    </li>
                    @endcan

                    @can('performance')
                    <li class="{{ (request()->is('performance*')) ? 'active' : '' }}">
                    @if(auth()->user()->can('view-goal-type') || auth()->user()->can('view-goal-tracking') || auth()->user()->can('view-indicator') || auth()->user()->can('view-appraisal'))
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="cpu"></i>
                            <span data-key="t-performance">Performance</span>
                        </a>
                        @endif
                        <ul class="sub-menu" aria-expanded="false">
                        @can('view-goal-type')
                            <li><a href="{{route('performance.goal-type.index')}}" data-key="t-goal-type">{{__('Goal type')}}</a></li>
                        @endcan

                        @can('view-goal-tracking')
                            <li><a href="{{route('performance.goal-tracking.index')}}" data-key="t-goal-type">{{__('Goal Tracking')}}</a></li>
                        @endcan

                        @can('view-indicator')
                            <li><a href="{{route('performance.indicator.index')}}" data-key="t-indicator">{{__('Goal type')}}</a></li>
                        @endcan

                        @can('view-appraisal')
                            <li><a href="{{route('performance.appraisal.index')}}" data-key="t-appraisal">{{__('Appraisal')}}</a></li>
                        @endcan
                            
                        </ul>
                    </li>
                    @endcan

                    @can('view-calendar')
                    <li class="{{ (request()->is('calendar*')) ? 'active' : '' }}">
                    
                        <a href="{{route('calendar.index')}}" class="">
                            <i data-feather="calendar"></i>
                            <span data-key="t-calendar">{{__('HR Calendar')}}</span>
                        </a>
                        
                    
                    </li>
                    @endcan


                    @can('hr_report')
                    <li class="{{ (request()->is('report*')) ? 'active' : '' }}">
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="file"></i>
                            <span data-key="t-reports">{{__('HR Reports')}}</span>
                        </a>
                        
                        <ul class="sub-menu" aria-expanded="false">
                        @can('report-payslip')
                            <li><a href="{{route('report.payslip')}}" data-key="t-payslip-report">{{__('Payslip Report')}}</a></li>
                        @endcan

                    
                        
                        

                        @can('report-attendance')
                            <li><a href="{{route('report.attendance')}}" data-key="t-attendance-report">{{__('Attendance Report')}}</a></li>
                        @endcan

                        @can('report-project')
                            <li><a href="{{route('report.project')}}" data-key="t-project-report">{{__('Project Report')}}</a></li>
                        @endcan

                        @can('report-training')
                            <li><a href="{{route('report.training')}}" data-key="t-training-report">{{__('Project Report')}}</a></li>
                        @endcan

                        @can('report-task')
                            <li><a href="{{route('report.task')}}" data-key="t-task-report">{{__('Task Report')}}</a></li>
                        @endcan

                        {{-- @can('report-employee')
                            <li><a href="{{route('report.employee')}}" data-key="t-employee-report">{{__('Employees Report')}}</a></li>
                        @endcan --}}

                        @can('report-account')
                            <li><a href="{{route('report.account')}}" data-key="t-account-report">{{__('Account Report')}}</a></li>
                        @endcan

                        @can('report-expense')
                            <li><a href="{{route('report.expense')}}" data-key="t-expense-report">{{__('Employees Report')}}</a></li>
                        @endcan

                        @can('report-deposit')
                            <li><a href="{{route('report.deposit')}}" data-key="t-deposit-report">{{__('Expense Report')}}</a></li>
                        @endcan

                        @can('report-transaction')
                            <li><a href="{{route('report.transaction')}}" data-key="t-transaction-report">{{__('Transaction Report')}}</a></li>
                        @endcan

                        @can('report-pension')
                            <li><a href="{{route('report.pension')}}" data-key="t-pension-report">{{__('Pension Report')}}</a></li>
                        @endcan
                            
                        </ul>
                    </li>
                    @endcan


                    @can('recruitment')
                    <li class="{{ (request()->is('recruitment*')) ? 'active' : '' }}">

                        @if(auth()->user()->can('view-job_post') || auth()->user()->can('view-job_candidate')|| auth()->user()->can('view-job_interview') || auth()->user()->can('view-cms'))
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="clipboard"></i>
                            <span data-key="t-recruitment">{{trans('file.Recruitment')}}</span>
                        </a>
                        @endif
                        <ul class="sub-menu" aria-expanded="false">
                        @can('view-job_post')
                            <li><a href="{{route('job_posts.index')}}" data-key="t-job-post">{{__('Job Post')}}</a></li>
                        @endcan

                        @can('view-job_candidate')
                            <li><a href="{{route('job_candidates.index')}}" data-key="t-job-candidate">{{__('Job Candidates')}}</a></li>
                        @endcan

                        @can('view-job_interview')
                            <li><a href="{{route('job_interviews.index')}}" data-key="t-interview">{{__('Job Interview')}}</a></li>
                        @endcan

                        @can('view-cms')
                            <li><a href="{{route('cms.index')}}" data-key="t-cms">{{__('CMS')}}</a></li>
                        @endcan
                            
                        </ul>
                    </li>
                    @endcan


                    @can('training_module')
                    <li class="@if(request()->is('training*')){{ (request()->is('training*')) ? 'active' : '' }}@elseif(request()->is('dynamic_variable/training_type*')){{ (request()->is('dynamic_variable/training_type*')) ? 'active' : '' }}@endif">
                        @if(auth()->user()->can('view-training') || auth()->user()->can('access-variable_type')|| auth()->user()->can('access-trainer'))
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="award"></i>
                            <span data-key="t-training">{{trans('file.Training')}}</span>
                        </a>
                        @endif
                        <ul class="sub-menu" aria-expanded="false">
                        @can('view-training')
                            <li><a href="{{route('training_lists.index')}}" data-key="t-goal-type">{{__('Training List')}}</a></li>
                        @endcan

                        @can('access-variable_type')
                            <li><a href="{{route('training_type.index')}}" data-key="t-training-type">{{__('Training Type')}}</a></li>
                        @endcan

                        @can('view-trainer')
                            <li><a href="{{route('trainers.index')}}" data-key="t-trainers">{{trans('file.Trainers')}}</a></li>
                        @endcan
                            
                        </ul>
                    </li>
                    @endcan




                    @can('event_meeting')
                    <li class="@if(request()->is('events*')){{ (request()->is('events*')) ? 'active' : '' }}@elseif(request()->is('meetings*')){{ (request()->is('meetings*')) ? 'active' : '' }}@endif">
                    @if(auth()->user()->can('view-event') || auth()->user()->can('view-meeting'))
                    <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="clock"></i>
                            <span data-key="t-event">{{trans('file.Events')}} & {{trans('file.Meetings')}}</span>
                        </a>
                        @endif
                        <ul class="sub-menu" aria-expanded="false">
                        @can('view-event')
                            <li><a href="{{route('events.index')}}" data-key="t-event">{{trans('file.Events')}}</a></li>
                        @endcan

                        @can('view-meeting')
                            <li><a href="{{route('meetings.index')}}" data-key="t-meeting">{{trans('file.Meetings')}}</a></li>
                        @endcan

    
                            
                        </ul>
                    </li>
                    @endcan


                    @can('project-management')
                    <li class="{{ (request()->is('project-management*')) ? 'active' : '' }}">
                    @if(auth()->user()->can('view-project') || auth()->user()->can('view-task') || auth()->user()->can('client') || auth()->user()->can('view-invoice'))
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="file-plus"></i>
                            <span data-key="t-management">{{__('Project Management')}}</span>
                        </a>
                        @endif
                        <ul class="sub-menu" aria-expanded="false">
                        @can('view-project')
                            <li><a href="{{route('projects.index')}}" data-key="t-projects">{{trans(('file.Projects'))}}</a></li>
                        @endcan

                        @can('view-task')
                            <li><a href="{{route('tasks.index')}}" data-key="t-tasks">{{trans(('file.Tasks'))}}</a></li>
                        @endcan

                        @can('client')
                            <li><a href="{{route('clients.index')}}" data-key="t-clients">{{trans(('file.Client'))}}</a></li>
                        @endcan

                        @can('view-invoice')
                            <li><a href="{{route('invoices.index')}}" data-key="t-invoices">{{trans(('file.Invoice'))}}</a></li>
                        @endcan

                        @can('access-variable_type')
                            <li><a href="{{route('tax_type.index')}}" data-key="t-tax-type">{{__('Tax Type')}}</a></li>
                        @endcan
                            
                        </ul>
                    </li>
                    @endcan


                    @can('view-ticket')
                    <li class="{{ (request()->is('tickets*')) ? 'active' : '' }}">
                        <a href="{{route('tickets.index')}}" class="">
                        <i
                        class="dripicons-ticket"></i>
                            <span data-key="t-tickets">{{__('Support Tickets')}}</span>
                        </a>
    
                    </li>
                    @endcan


                    @can('finance')
                    <li class="{{ (request()->is('accounting*')) ? 'active' : '' }}">
                    @if(auth()->user()->can('view-account') || auth()->user()->can('view-payee') || auth()->user()->can('view-payer') ||auth()->user()->can('view-deposit')||auth()->user()->can('view-expense')||auth()->user()->can('view-transaction')||auth()->user()->can('view-balance_transfer'))
                    <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="bar-chart"></i>
                            <span data-key="t-finance">{{trans('file.Finance')}}</span>
                        </a>
                        @endif
                        <ul class="sub-menu" aria-expanded="false">
                        @can('view-account')
                            <li><a href="{{route('accounting_list.index')}}" data-key="t-account_list">{{__('Accounts List')}}</a></li>
                       
                            <li><a href="{{route('account_balances')}}" data-key="t-account_balances">{{__('Account Balances')}}</a></li>
                        @endcan

                        @can('view-payee')
                            <li><a href="{{route('payees.index')}}" data-key="t-payees">{{trans(('file.Payee'))}}</a></li>
                        @endcan

                        @can('view-payers')
                            <li><a href="{{route('payers.index')}}" data-key="t-payers">{{trans(('file.Payer'))}}</a></li>
                        @endcan

                        @can('view-deposit')
                            <li><a href="{{route('deposit.index')}}" data-key="t-deposit">{{trans(('file.Deposit'))}}</a></li>
                        @endcan

                        @can('view-expense')
                            <li><a href="{{route('expense.index')}}" data-key="t-expense">{{trans(('file.Expense'))}}</a></li>
                        @endcan

                        @can('view-transaction')
                            <li><a href="{{route('transactions.index')}}" data-key="t-transactions">{{trans(('file.Transaction'))}}</a></li>
                        @endcan

                        @can('view-balance_transfer')
                            <li><a href="{{route('finance_transfer.index')}}" data-key="t-finance_transfer">{{trans(('file.Transferr'))}}</a></li>
                        @endcan
                            
                        </ul>
                    </li>
                    @endcan

                    @can('assets-and-category')
                    <li class="@if(request()->is('assets*')){{ (request()->is('assets*')) ? 'active' : '' }}@elseif(request()->is('dynamic_variable/assets_category*')){{ (request()->is('dynamic_variable/assets_category*')) ? 'active' : '' }}@endif">
                    @if(auth()->user()->can('category') || auth()->user()->can('assets'))
                    <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="archive"></i>
                            <span data-key="t-asset">{{trans(('file.Assets'))}}</span>
                        </a>
                        @endif
                        <ul class="sub-menu" aria-expanded="false">
                        @can('category')
                            <li><a href="{{route('assets_category.index')}}" data-key="t-category">{{trans(('file.Category'))}}</a></li>
                        @endcan

                        @can('assets')
                            <li><a href="{{route('assets.index')}}" data-key="t-assets">{{trans(('file.Assets'))}}</a></li>
                        @endcan

                
                            
                        </ul>
                    </li>
                    @endcan


                    @can('customize_setting')
                    <li class="has-dropdown {{ (request()->is('settings*')) ? 'active' : '' }}">
                    @if(auth()->user()->can('view-role')||auth()->user()->can('view-general-setting')||auth()->user()->can('access-language')||auth()->user()->can('access-variable_type')||auth()->user()->can('access-variable_method')||auth()->user()->can('view-general-setting'))
                    <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="settings"></i>
                            <span data-key="t-settings">{{__('Customize Setting')}}</span>
                        </a>
                        @endif
                        <ul class="sub-menu" aria-expanded="false">
                        @can('view-role')
                            <li><a href="{{route('roles.index')}}" data-key="t-role">{{__('Roles and Access')}}</a></li>
                        @endcan

                        @can('view-general-setting')
                            <li><a href="{{route('general_settings.index')}}" data-key="t-settings">{{__('General Settings')}}</a></li>
                        @endcan

                        @can('view-mail-setting')
                            <li><a href="{{route('setting.mail')}}" data-key="t-mail">Mail Setting</a></li>
                        @endcan

                        @can('access-language')
                            <li><a href="{{route('languages.translations.index','English')}}" data-key="t-language">{{__('Language Settings')}}</a></li>
                        @endcan

                        @can('access-variable_type')
                            <li><a href="{{route('variables.index')}}" data-key="t-variables">Variable Type</a></li>
                        @endcan

                        @can('access-language')
                            <li><a href="{{route('variables_method.index')}}" data-key="t-variables">Variable Method</a></li>
                        @endcan

                        @can('view-general-setting')
                            <li><a href="{{route('ip_setting.index')}}" data-key="t-ip_settings">{{__('IP Settings')}}</a></li>
                        @endcan
                            
                        </ul>
                    </li>
                    @endcan

                    @can('file_module')
                    <li class="{{ (request()->is('file_manager*')) ? 'active' : '' }}">

                        @if(auth()->user()->can('view-file_manager') || auth()->user()->can('view-official_documents'))
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="sliders"></i>
                            <span data-key="t-file-manager">{{__('File Manager')}}</span>
                        </a>
                        @endif
                        <ul class="sub-menu" aria-expanded="false">
                            @can('view-file_manager')
                                <li><a href="{{route('files.index')}}" data-key="t-files">{{__('File Manager')}}</a></li>
                            @endcan

                            @can('view-official_documents')
                                <li><a href="{{route('official_documents.index')}}" data-key="t-official-docs">Official Documents</a></li>
                            @endcan

                            @can('view-file_config')
                                <li><a href="{{route('file_config.index')}}" data-key="t-file-config">{{__('File Configuration')}}</a></li>
                            @endcan
                                                    
                        </ul>
                    </li>
                    @endcan

           

                </ul>

                <div class="card sidebar-alert border-0 text-center mx-4 mb-0 mt-5">
                    <div class="card-body">
                        <img src="{{ asset('miniadmin/images/giftbox.png')}}" alt="">
                        <div class="mt-4">
                            <h5 class="alertcard-title font-size-16">Unlimited Access</h5>
                            <p class="font-size-13">Upgrade your plan from a Free trial, to select ‘Business Plan’.</p>
                            <a href="#!" class="btn btn-primary mt-2">Upgrade Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->