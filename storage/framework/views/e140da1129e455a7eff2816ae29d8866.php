    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" data-key="t-menu">Menu</li>

                    <?php if(auth()->user()->role_users_id ==1): ?>

                    <li class="<?php echo e((request()->is('admin/dashboard*')) ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin.dashboard')); ?>">
                            <i data-feather="home"></i>
                            <span data-key="t-dashboard">Dashboard</span>
                        </a>
                    </li>
                    <?php else: ?>


                    <li class="<?php echo e((request()->is('employee/dashboard*')) ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('/employee/dashboard')); ?>">
                            <i data-feather="home"></i>
                            <span data-key="t-dashboard">Dashboard</span>
                        </a>
                    </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user')): ?>
                    <li class="<?php if(request()->is('user*')): ?><?php echo e((request()->is('user*')) ? 'active' : ''); ?><?php elseif(request()->is('add-user*')): ?><?php echo e((request()->is('add-user*')) ? 'active' : ''); ?><?php endif; ?>">
                        <?php if(auth()->user()->can('view-user')): ?>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="user"></i>
                            <span data-key="t-apps"><?php echo e(trans('file.User')); ?></span>
                        </a>
                        <?php endif; ?>
                        <ul class="sub-menu" aria-expanded="false">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-user')): ?>
                            <li id="users-menu">
                                <a href="<?php echo e(route('users-list')); ?>">
                                    <span data-key="t-calendar"><?php echo e(__('Users List')); ?></span>
                                </a>
                            </li>
                            <?php endif; ?>


                             <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-access-user')): ?> 
                            <li id="user-roles">
                                <a href="<?php echo e(route('user-roles')); ?>">
                                    <span data-key="t-calendar"><?php echo e(__('Assign Role')); ?></span>
                                </a>
                            </li>
                            <?php endif; ?> 
                   
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('last-login-user')): ?>
                            <li id="user-last-login">
                                <a href="<?php echo e(route('login-info')); ?>">
                                    <span data-key="t-calendar"><?php echo e(__('Users Last Login')); ?></span>
                               </a>                     
                            </li>
                            <?php endif; ?>

                        
                        </ul>
                    </li>
                    <?php endif; ?>

               
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-details-employee')): ?>
                    <li class="<?php echo e((request()->is('staff*')) ? 'active' : ''); ?>">
                        <a href="javascript: void(0);" class="has-arrow">
                            
                            <i data-feather="users"></i>
                            <span data-key="t-employees"><?php echo e(trans('file.Employees')); ?></span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-details-employee')): ?>
                            <li><a href="<?php echo e(route('employees.index')); ?>" data-key="t-employee-list"><?php echo e(__('Employee Lists')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('import-employee')): ?>
                            <li><a href="<?php echo e(route('employees.import')); ?>" data-key="t-import-employee"><?php echo e(__('Import Employees')); ?></a></li>
                            <?php endif; ?>
                
                        </ul>
                    </li>
                    <?php endif; ?>

             
                    <li class="<?php echo e((request()->is('organization*')) ? 'active' : ''); ?>">
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="file-text"></i>
                            <span data-key="t-organization"><?php echo e(trans('file.Organization')); ?></span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-company')): ?>
                            <li><a href="<?php echo e(route('companies.index')); ?>" data-key="t-company"><?php echo e(trans('file.Company')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-department')): ?>
                            <li><a href="<?php echo e(route('departments.index')); ?>" data-key="t-department"> <?php echo e(trans('file.Department')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-designation')): ?>
                            <li><a href="<?php echo e(route('designations.index')); ?>" data-key="t-designation"> <?php echo e(trans('file.Designation')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-location')): ?>
                            <li><a href="<?php echo e(route('locations.index')); ?>" data-key="t-location"> <?php echo e(trans('file.Location')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('announcement')): ?> 
                                <li ><a href="<?php echo e(route('announcements.index')); ?>"><?php echo e(trans('file.Announcements')); ?></a></li>
                        <?php endif; ?> 

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('policy')): ?> 
                            <li ><a href="<?php echo e(route('policy.index')); ?>"><?php echo e(__('Company Policy')); ?></a></li>
                        <?php endif; ?> 
                        </ul>
                    </li>

               
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('core_hr')): ?>
                    <li  class="<?php echo e((request()->is('core_hr*')) ? 'active' : ''); ?>">
                        <?php if(auth()->user()->can('view-promotion')||auth()->user()->can('view-award') || auth()->user()->can('view-travel')||auth()->user()->can('view-transfer')||auth()->user()->can('view-resignation')||auth()->user()->can('view-complaint')||auth()->user()->can('view-warning')||auth()->user()->can('view-termination')): ?>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="briefcase"></i>
                            <span data-key="t-core"><?php echo e(__('Core HR')); ?></span>
                        </a>
                        <?php endif; ?>  
                        <ul class="sub-menu" aria-expanded="false">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-promotion')): ?>
                                <li><a href="<?php echo e(route('promotions.index')); ?>" data-key="t-promotion"><?php echo e(trans('file.Promotion')); ?></a></li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-award')): ?>
                                <li><a href="<?php echo e(route('awards.index')); ?>" data-key="t-award"><?php echo e(trans('file.Award')); ?></a></li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-travel')): ?>
                                <li><a href="<?php echo e(route('travels.index')); ?>" data-key="t-travel"><?php echo e(trans('file.Travel')); ?></a></li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-transfer')): ?>
                                <li><a href="<?php echo e(route('transfers.index')); ?>" data-key="t-transfer"><?php echo e(trans('file.Transfer')); ?></a></li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-resignation')): ?>
                                <li><a href="<?php echo e(route('resignations.index')); ?>" data-key="t-resignation"><?php echo e(trans('file.Resignation')); ?></a></li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-complaint')): ?>
                                <li><a href="<?php echo e(route('complaints.index')); ?>" data-key="t-complaint"><?php echo e(trans('file.Complaints')); ?></a></li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-warning')): ?>
                                <li><a href="<?php echo e(route('complaints.index')); ?>" data-key="t-warning"><?php echo e(trans('file.Warnings')); ?></a></li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-termination')): ?>
                                <li><a href="<?php echo e(route('terminations.index')); ?>" data-key="t-termiantion"><?php echo e(trans('file.Terminations')); ?></a></li>
                            <?php endif; ?>
                        
                        </ul>
                    </li>
                    <?php endif; ?>

               

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('timesheet')): ?>
                    <li class="<?php echo e((request()->is('timesheet*')) ? 'active' : ''); ?>">

                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="sliders"></i>
                            <span data-key="t-timesheets"><?php echo e(trans('file.Timesheets')); ?></span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-attendance')): ?>
                            <li><a href="<?php echo e(route('attendances.index')); ?>" data-key="t-attendance"><?php echo e(trans('file.Attendances')); ?></a></li>
                            <li><a href="<?php echo e(route('date_wise_attendances.index')); ?>" data-key="t-date-wise-attendance"><?php echo e(__('Date wise Attendances')); ?></a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-attendance')): ?>
                            <li><a href="<?php echo e(route('update_attendances.index')); ?>" data-key="t-update-attendances"> <?php echo e(__('Add/Update Attendances')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('import-attendance')): ?>
                            <li><a href="<?php echo e(route('attendances.import')); ?>" data-key="t-import_attendances"><?php echo e(__('Import Attendances')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-office_shift')): ?>
                            <li><a href="<?php echo e(route('office_shift.index')); ?>" data-key="t-office_shift"><?php echo e(__('Office Shift')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-holiday')): ?>
                            <li><a href="<?php echo e(route('holidays.index')); ?>" data-key="t-holiday"><?php echo e(__('Manage Holiday')); ?></a></li>
                        <?php endif; ?>
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-leave')): ?>
                            <li><a href="<?php echo e(route('leaves.index')); ?>" data-key="t-leave"><?php echo e(__('Manage Leaves')); ?></a></li>
                        <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment-module')): ?>
                    <li class="<?php echo e((request()->is('payroll*')) ? 'active' : ''); ?>">
                        <?php if(auth()->user()->can('view-payslip') || auth()->user()->can('view-paylist')): ?>
                        <a href="javascript: void(0);" class="has-arrow">
                        <i class="dripicons-wallet"></i>
                            <span data-key="t-wallet"><?php echo e(trans('file.Payroll')); ?></span>
                        </a>
                        <?php endif; ?>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-payslip')): ?>
                            <li><a href="<?php echo e(route('payroll.index')); ?>" data-key="t-payroll"><?php echo e(__('New Payment')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-paylist')): ?>
                        <li><a href="<?php echo e(route('payment_history.index')); ?>" data-key="t-payment"><?php echo e(__('Payment History')); ?></a></li>
                        <?php endif; ?>

                        
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('performance')): ?>
                    <li class="<?php echo e((request()->is('performance*')) ? 'active' : ''); ?>">
                    <?php if(auth()->user()->can('view-goal-type') || auth()->user()->can('view-goal-tracking') || auth()->user()->can('view-indicator') || auth()->user()->can('view-appraisal')): ?>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="cpu"></i>
                            <span data-key="t-performance">Performance</span>
                        </a>
                        <?php endif; ?>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-goal-type')): ?>
                            <li><a href="<?php echo e(route('performance.goal-type.index')); ?>" data-key="t-goal-type"><?php echo e(__('Goal type')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-goal-tracking')): ?>
                            <li><a href="<?php echo e(route('performance.goal-tracking.index')); ?>" data-key="t-goal-type"><?php echo e(__('Goal Tracking')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-indicator')): ?>
                            <li><a href="<?php echo e(route('performance.indicator.index')); ?>" data-key="t-indicator"><?php echo e(__('Goal type')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-appraisal')): ?>
                            <li><a href="<?php echo e(route('performance.appraisal.index')); ?>" data-key="t-appraisal"><?php echo e(__('Appraisal')); ?></a></li>
                        <?php endif; ?>
                            
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-calendar')): ?>
                    <li class="<?php echo e((request()->is('calendar*')) ? 'active' : ''); ?>">
                    
                        <a href="<?php echo e(route('calendar.index')); ?>" class="">
                            <i data-feather="calendar"></i>
                            <span data-key="t-calendar"><?php echo e(__('HR Calendar')); ?></span>
                        </a>
                        
                    
                    </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hr_report')): ?>
                    <li class="<?php echo e((request()->is('report*')) ? 'active' : ''); ?>">
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="file"></i>
                            <span data-key="t-reports"><?php echo e(__('HR Reports')); ?></span>
                        </a>
                        
                        <ul class="sub-menu" aria-expanded="false">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report-payslip')): ?>
                            <li><a href="<?php echo e(route('report.payslip')); ?>" data-key="t-payslip-report"><?php echo e(__('Payslip Report')); ?></a></li>
                        <?php endif; ?>

                    
                        
                        

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report-attendance')): ?>
                            <li><a href="<?php echo e(route('report.attendance')); ?>" data-key="t-attendance-report"><?php echo e(__('Attendance Report')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report-project')): ?>
                            <li><a href="<?php echo e(route('report.project')); ?>" data-key="t-project-report"><?php echo e(__('Project Report')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report-training')): ?>
                            <li><a href="<?php echo e(route('report.training')); ?>" data-key="t-training-report"><?php echo e(__('Project Report')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report-task')): ?>
                            <li><a href="<?php echo e(route('report.task')); ?>" data-key="t-task-report"><?php echo e(__('Task Report')); ?></a></li>
                        <?php endif; ?>

                        

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report-account')): ?>
                            <li><a href="<?php echo e(route('report.account')); ?>" data-key="t-account-report"><?php echo e(__('Account Report')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report-expense')): ?>
                            <li><a href="<?php echo e(route('report.expense')); ?>" data-key="t-expense-report"><?php echo e(__('Employees Report')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report-deposit')): ?>
                            <li><a href="<?php echo e(route('report.deposit')); ?>" data-key="t-deposit-report"><?php echo e(__('Expense Report')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report-transaction')): ?>
                            <li><a href="<?php echo e(route('report.transaction')); ?>" data-key="t-transaction-report"><?php echo e(__('Transaction Report')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report-pension')): ?>
                            <li><a href="<?php echo e(route('report.pension')); ?>" data-key="t-pension-report"><?php echo e(__('Pension Report')); ?></a></li>
                        <?php endif; ?>
                            
                        </ul>
                    </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('recruitment')): ?>
                    <li class="<?php echo e((request()->is('recruitment*')) ? 'active' : ''); ?>">

                        <?php if(auth()->user()->can('view-job_post') || auth()->user()->can('view-job_candidate')|| auth()->user()->can('view-job_interview') || auth()->user()->can('view-cms')): ?>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="clipboard"></i>
                            <span data-key="t-recruitment"><?php echo e(trans('file.Recruitment')); ?></span>
                        </a>
                        <?php endif; ?>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-job_post')): ?>
                            <li><a href="<?php echo e(route('job_posts.index')); ?>" data-key="t-job-post"><?php echo e(__('Job Post')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-job_candidate')): ?>
                            <li><a href="<?php echo e(route('job_candidates.index')); ?>" data-key="t-job-candidate"><?php echo e(__('Job Candidates')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-job_interview')): ?>
                            <li><a href="<?php echo e(route('job_interviews.index')); ?>" data-key="t-interview"><?php echo e(__('Job Interview')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-cms')): ?>
                            <li><a href="<?php echo e(route('cms.index')); ?>" data-key="t-cms"><?php echo e(__('CMS')); ?></a></li>
                        <?php endif; ?>
                            
                        </ul>
                    </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('training_module')): ?>
                    <li class="<?php if(request()->is('training*')): ?><?php echo e((request()->is('training*')) ? 'active' : ''); ?><?php elseif(request()->is('dynamic_variable/training_type*')): ?><?php echo e((request()->is('dynamic_variable/training_type*')) ? 'active' : ''); ?><?php endif; ?>">
                        <?php if(auth()->user()->can('view-training') || auth()->user()->can('access-variable_type')|| auth()->user()->can('access-trainer')): ?>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="award"></i>
                            <span data-key="t-training"><?php echo e(trans('file.Training')); ?></span>
                        </a>
                        <?php endif; ?>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-training')): ?>
                            <li><a href="<?php echo e(route('training_lists.index')); ?>" data-key="t-goal-type"><?php echo e(__('Training List')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-variable_type')): ?>
                            <li><a href="<?php echo e(route('training_type.index')); ?>" data-key="t-training-type"><?php echo e(__('Training Type')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-trainer')): ?>
                            <li><a href="<?php echo e(route('trainers.index')); ?>" data-key="t-trainers"><?php echo e(trans('file.Trainers')); ?></a></li>
                        <?php endif; ?>
                            
                        </ul>
                    </li>
                    <?php endif; ?>




                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('event_meeting')): ?>
                    <li class="<?php if(request()->is('events*')): ?><?php echo e((request()->is('events*')) ? 'active' : ''); ?><?php elseif(request()->is('meetings*')): ?><?php echo e((request()->is('meetings*')) ? 'active' : ''); ?><?php endif; ?>">
                    <?php if(auth()->user()->can('view-event') || auth()->user()->can('view-meeting')): ?>
                    <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="clock"></i>
                            <span data-key="t-event"><?php echo e(trans('file.Events')); ?> & <?php echo e(trans('file.Meetings')); ?></span>
                        </a>
                        <?php endif; ?>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-event')): ?>
                            <li><a href="<?php echo e(route('events.index')); ?>" data-key="t-event"><?php echo e(trans('file.Events')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-meeting')): ?>
                            <li><a href="<?php echo e(route('meetings.index')); ?>" data-key="t-meeting"><?php echo e(trans('file.Meetings')); ?></a></li>
                        <?php endif; ?>

    
                            
                        </ul>
                    </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('project-management')): ?>
                    <li class="<?php echo e((request()->is('project-management*')) ? 'active' : ''); ?>">
                    <?php if(auth()->user()->can('view-project') || auth()->user()->can('view-task') || auth()->user()->can('client') || auth()->user()->can('view-invoice')): ?>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="file-plus"></i>
                            <span data-key="t-management"><?php echo e(__('Project Management')); ?></span>
                        </a>
                        <?php endif; ?>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-project')): ?>
                            <li><a href="<?php echo e(route('projects.index')); ?>" data-key="t-projects"><?php echo e(trans(('file.Projects'))); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-task')): ?>
                            <li><a href="<?php echo e(route('tasks.index')); ?>" data-key="t-tasks"><?php echo e(trans(('file.Tasks'))); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client')): ?>
                            <li><a href="<?php echo e(route('clients.index')); ?>" data-key="t-clients"><?php echo e(trans(('file.Client'))); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-invoice')): ?>
                            <li><a href="<?php echo e(route('invoices.index')); ?>" data-key="t-invoices"><?php echo e(trans(('file.Invoice'))); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-variable_type')): ?>
                            <li><a href="<?php echo e(route('tax_type.index')); ?>" data-key="t-tax-type"><?php echo e(__('Tax Type')); ?></a></li>
                        <?php endif; ?>
                            
                        </ul>
                    </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-ticket')): ?>
                    <li class="<?php echo e((request()->is('tickets*')) ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('tickets.index')); ?>" class="">
                        <i
                        class="dripicons-ticket"></i>
                            <span data-key="t-tickets"><?php echo e(__('Support Tickets')); ?></span>
                        </a>
    
                    </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('finance')): ?>
                    <li class="<?php echo e((request()->is('accounting*')) ? 'active' : ''); ?>">
                    <?php if(auth()->user()->can('view-account') || auth()->user()->can('view-payee') || auth()->user()->can('view-payer') ||auth()->user()->can('view-deposit')||auth()->user()->can('view-expense')||auth()->user()->can('view-transaction')||auth()->user()->can('view-balance_transfer')): ?>
                    <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="bar-chart"></i>
                            <span data-key="t-finance"><?php echo e(trans('file.Finance')); ?></span>
                        </a>
                        <?php endif; ?>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-account')): ?>
                            <li><a href="<?php echo e(route('accounting_list.index')); ?>" data-key="t-account_list"><?php echo e(__('Accounts List')); ?></a></li>
                       
                            <li><a href="<?php echo e(route('account_balances')); ?>" data-key="t-account_balances"><?php echo e(__('Account Balances')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-payee')): ?>
                            <li><a href="<?php echo e(route('payees.index')); ?>" data-key="t-payees"><?php echo e(trans(('file.Payee'))); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-payers')): ?>
                            <li><a href="<?php echo e(route('payers.index')); ?>" data-key="t-payers"><?php echo e(trans(('file.Payer'))); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-deposit')): ?>
                            <li><a href="<?php echo e(route('deposit.index')); ?>" data-key="t-deposit"><?php echo e(trans(('file.Deposit'))); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-expense')): ?>
                            <li><a href="<?php echo e(route('expense.index')); ?>" data-key="t-expense"><?php echo e(trans(('file.Expense'))); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-transaction')): ?>
                            <li><a href="<?php echo e(route('transactions.index')); ?>" data-key="t-transactions"><?php echo e(trans(('file.Transaction'))); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-balance_transfer')): ?>
                            <li><a href="<?php echo e(route('finance_transfer.index')); ?>" data-key="t-finance_transfer"><?php echo e(trans(('file.Transferr'))); ?></a></li>
                        <?php endif; ?>
                            
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assets-and-category')): ?>
                    <li class="<?php if(request()->is('assets*')): ?><?php echo e((request()->is('assets*')) ? 'active' : ''); ?><?php elseif(request()->is('dynamic_variable/assets_category*')): ?><?php echo e((request()->is('dynamic_variable/assets_category*')) ? 'active' : ''); ?><?php endif; ?>">
                    <?php if(auth()->user()->can('category') || auth()->user()->can('assets')): ?>
                    <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="archive"></i>
                            <span data-key="t-asset"><?php echo e(trans(('file.Assets'))); ?></span>
                        </a>
                        <?php endif; ?>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category')): ?>
                            <li><a href="<?php echo e(route('assets_category.index')); ?>" data-key="t-category"><?php echo e(trans(('file.Category'))); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assets')): ?>
                            <li><a href="<?php echo e(route('assets.index')); ?>" data-key="t-assets"><?php echo e(trans(('file.Assets'))); ?></a></li>
                        <?php endif; ?>

                
                            
                        </ul>
                    </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customize_setting')): ?>
                    <li class="has-dropdown <?php echo e((request()->is('settings*')) ? 'active' : ''); ?>">
                    <?php if(auth()->user()->can('view-role')||auth()->user()->can('view-general-setting')||auth()->user()->can('access-language')||auth()->user()->can('access-variable_type')||auth()->user()->can('access-variable_method')||auth()->user()->can('view-general-setting')): ?>
                    <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="settings"></i>
                            <span data-key="t-settings"><?php echo e(__('Customize Setting')); ?></span>
                        </a>
                        <?php endif; ?>
                        <ul class="sub-menu" aria-expanded="false">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-role')): ?>
                            <li><a href="<?php echo e(route('roles.index')); ?>" data-key="t-role"><?php echo e(__('Roles and Access')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-general-setting')): ?>
                            <li><a href="<?php echo e(route('general_settings.index')); ?>" data-key="t-settings"><?php echo e(__('General Settings')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-mail-setting')): ?>
                            <li><a href="<?php echo e(route('setting.mail')); ?>" data-key="t-mail">Mail Setting</a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-language')): ?>
                            <li><a href="<?php echo e(route('languages.translations.index','English')); ?>" data-key="t-language"><?php echo e(__('Language Settings')); ?></a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-variable_type')): ?>
                            <li><a href="<?php echo e(route('variables.index')); ?>" data-key="t-variables">Variable Type</a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access-language')): ?>
                            <li><a href="<?php echo e(route('variables_method.index')); ?>" data-key="t-variables">Variable Method</a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-general-setting')): ?>
                            <li><a href="<?php echo e(route('ip_setting.index')); ?>" data-key="t-ip_settings"><?php echo e(__('IP Settings')); ?></a></li>
                        <?php endif; ?>
                            
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('file_module')): ?>
                    <li class="<?php echo e((request()->is('file_manager*')) ? 'active' : ''); ?>">

                        <?php if(auth()->user()->can('view-file_manager') || auth()->user()->can('view-official_documents')): ?>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="sliders"></i>
                            <span data-key="t-file-manager"><?php echo e(__('File Manager')); ?></span>
                        </a>
                        <?php endif; ?>
                        <ul class="sub-menu" aria-expanded="false">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-file_manager')): ?>
                                <li><a href="<?php echo e(route('files.index')); ?>" data-key="t-files"><?php echo e(__('File Manager')); ?></a></li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-official_documents')): ?>
                                <li><a href="<?php echo e(route('official_documents.index')); ?>" data-key="t-official-docs">Official Documents</a></li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-file_config')): ?>
                                <li><a href="<?php echo e(route('file_config.index')); ?>" data-key="t-file-config"><?php echo e(__('File Configuration')); ?></a></li>
                            <?php endif; ?>
                                                    
                        </ul>
                    </li>
                    <?php endif; ?>

           

                </ul>

                <div class="card sidebar-alert border-0 text-center mx-4 mb-0 mt-5">
                    <div class="card-body">
                        <img src="<?php echo e(asset('miniadmin/images/giftbox.png')); ?>" alt="">
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
    <!-- Left Sidebar End --><?php /**PATH /home/basamiy/Documents/Projects/HRMs/peoplepro-1265/peopleprohrm/resources/views/layout/main_partials/sidebar.blade.php ENDPATH**/ ?>