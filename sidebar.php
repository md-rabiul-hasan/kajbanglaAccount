<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image"  src="img/logo.png" style="max-height: 100px; max-width: 100px;"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold"><?php print $_SESSION['user_name'];?></span>
                            <span class="text-muted text-xs block"><?php print $_SESSION['role_name'];?> <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                            <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                            <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> <span class="fa arrow"></span></a>
                    
                </li>
                <?php

                if($_SESSION['role']==1)
                {
                ?>
                 <li <?php if( get_page_name()=='NewGl' or get_page_name()=='AuthNewGl')
                    print 'class="active"';
                ?>
                >
                    <a href="index.html"><i class="fa fa-edit"></i> <span class="nav-label">GL Management</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li <?php if(get_page_name()=='NewGl')
                    print 'class="active"';
                ?> ><a href="newGl">Create New GL</a></li>
                       <li <?php if(get_page_name()=='AuthNewGl') print 'class="active"';?> ><a href="authNewGl">Authorize New Gl</a></li>
                        <!-- <li><a href="dashboard_3.html">Dashboard v.3</a></li>
                        <li class="active"><a href="dashboard_4_1.html">Dashboard v.4</a></li>
                        <li><a href="dashboard_5.html">Dashboard v.5 </a></li> -->
                    </ul>
                </li>

                 <li <?php if( get_page_name()=='Accounts' or get_page_name()=='AuthAccount')
                    print 'class="active"';
                ?>
                >
                    <a href=""><i class="fa fa-edit"></i> <span class="nav-label">Account Management</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li <?php if(get_page_name()=='Accounts')
                    print 'class="active"';
                ?> ><a href="accounts">Accounts Entry</a></li>
                        <li <?php if(get_page_name()=='AuthAccount')
                    print 'class="active"';
                ?> ><a href="authAccount">Authorize Accounts</a></li>
                        <!-- <li><a href="dashboard_3.html">Dashboard v.3</a></li>
                        <li class="active"><a href="dashboard_4_1.html">Dashboard v.4</a></li>
                        <li><a href="dashboard_5.html">Dashboard v.5 </a></li> -->
                    </ul>
                </li>


                <li <?php if( get_page_name()=='NewUser')
                    print 'class="active"';
                ?>
                >
                    <a href="index.html"><i class="fa fa-edit"></i> <span class="nav-label">User Management</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li <?php if(get_page_name()=='NewUser')
                    print 'class="active"';
                ?> ><a href="newUser">Create New User</a></li>
                        <li><a href="dashboard_2.html">Edit User</a></li>
                        <!-- <li><a href="dashboard_3.html">Dashboard v.3</a></li>
                        <li class="active"><a href="dashboard_4_1.html">Dashboard v.4</a></li>
                        <li><a href="dashboard_5.html">Dashboard v.5 </a></li> -->
                    </ul>
                </li>
                <!--  <li <?php if( get_page_name()=='OfficeSetup' or get_page_name()=='AuthNewOffice') print 'class="active"';?> >
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Parameter Setup</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li <?php if(get_page_name()=='OfficeSetup') print 'class="active"';?> ><a href="officeSetup">Create New Office</a></li>
                        <li <?php if(get_page_name()=='AuthNewOffice') print 'class="active"';?> ><a href="authNewOffice">Authorize New Office</a></li>
                        
                    </ul>
                </li> -->
                <li <?php if( get_page_name()=='OfficeSetup' or get_page_name()=='AuthNewOffice' or get_page_name()=='EditNewOffice' or get_page_name()=='PassengerSetup' or get_page_name()=='AuthNewPassenger' or get_page_name()=='EditNewPassenger' or get_page_name()=='CompanySetup' or get_page_name()=='Medical' or get_page_name()=='MedicalAuth' or get_page_name()=='Sales' or get_page_name()=='SalesAuth' or get_page_name()=='Pc' or get_page_name()=='PcAuth' or get_page_name()=='Visa' or get_page_name()=='VisaAuth' or get_page_name()=='Training' or get_page_name()=='TrainingAuth' or get_page_name()=='AgentSetup' or get_page_name()=='AuthNewAgent' or get_page_name()=='MedicalEdit' or get_page_name()=='TrainingEdit' or get_page_name()=='ManPower' or get_page_name()=='ManPowerAuth' or get_page_name()=='Vaccine' or get_page_name()=='VaccineAuth' or get_page_name()=='VaccineEdit' or get_page_name()=='Flight' or get_page_name()=='FlightAuth' or get_page_name()=='Pcr' or get_page_name()=='PcrAuth' or get_page_name()=='PcrEdit' or get_page_name()=='Profession' or get_page_name()=='AuthNewProfession' or get_page_name()=='NewCompanySetup' or get_page_name()=='AuthNewCompanySetup' or get_page_name()=='AuthNewCompany' or get_page_name()=='Mofa' or get_page_name()=='MofaAuth' or get_page_name()=='PassportReceived' or get_page_name()=='AuthNewPassportReceived') print 'class="active"';?> >
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Information Entry</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li <?php if( get_page_name()=='OfficeSetup' or get_page_name()=='AuthNewOffice' or get_page_name()=='EditNewOffice') print 'class="active"';?>>
                            <a href="#">Office Setup<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                
                                   <li <?php if(get_page_name()=='OfficeSetup') print 'class="active"';?> ><a href="officeSetup">Create New Office</a></li>
                               
                                
                                    <li <?php if(get_page_name()=='AuthNewOffice') print 'class="active"';?> ><a href="authNewOffice">Authorize New Office</a></li>
                               
                                <li <?php if(get_page_name()=='EditNewOffice') print 'class="active"';?>>
                                    <a href="editNewOffice">Edit Office Info</a>
                                </li>

                            </ul>
                        </li>
                        <li <?php if( get_page_name()=='PassengerSetup' or get_page_name()=='AuthNewPassenger' or get_page_name()=='EditNewPassenger') print 'class="active"';?>>
                            <a href="#">Passenger Setup<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                
                                   <li <?php if(get_page_name()=='PassengerSetup') print 'class="active"';?> ><a href="passengerSetup">Create New Passenger</a></li>
                               
                                
                                    <li <?php if(get_page_name()=='AuthNewPassenger') print 'class="active"';?> ><a href="authNewPassenger">Authorize New Passenger</a></li>
                               
                                <li <?php if(get_page_name()=='EditNewPassenger') print 'class="active"';?>>
                                    <a href="editNewPassenger">Edit Passenger Info</a>
                                </li>

                            </ul>
                        </li>
                         <li <?php if( get_page_name()=='CompanySetup' or get_page_name()=='AuthNewCompany' or get_page_name()=='EditNewCompany' or get_page_name()=='NewCompanySetup' or get_page_name()=='AuthNewCompanySetup') print 'class="active"';?>>
                            <a href="#">Company Setup<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                     <li <?php if(get_page_name()=='NewCompanySetup') print 'class="active"';?> ><a href="NewCompanySetup">New Company Setup</a></li>
                                      <li <?php if(get_page_name()=='AuthNewCompanySetup') print 'class="active"';?> ><a href="AuthNewCompanySetup">Authorize New Company</a></li>

                                   <li <?php if(get_page_name()=='CompanySetup') print 'class="active"';?> ><a href="companySetup">Company Info Setup</a></li>
                               
                                
                                    <li <?php if(get_page_name()=='AuthNewCompany') print 'class="active"';?> ><a href="authNewCompany">Authorize Company Info</a></li>
                               
                                <li <?php if(get_page_name()=='EditNewCompany') print 'class="active"';?>>
                                    <a href="editNewCompany">Edit Company Info</a>
                                </li>

                            </ul>
                        </li>
                        <li <?php if( get_page_name()=='AgentSetup' or get_page_name()=='AuthNewAgent') print 'class="active"';?>>
                            <a href="#">Agent Setup<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                
                                   <li <?php if(get_page_name()=='AgentSetup') print 'class="active"';?> ><a href="agentSetup">Create New Agent</a></li>
                               
                                
                                    <li <?php if(get_page_name()=='AuthNewAgent') print 'class="active"';?> ><a href="authNewAgent">Authorize New Agent</a></li>
                               
                                <li <?php if(get_page_name()=='EditNewCompany') print 'class="active"';?>>
                                    <a href="editNewCompany">Edit Company Info</a>
                                </li>

                            </ul>
                        </li>
                         <li <?php if( get_page_name()=='Profession' or get_page_name()=='AuthNewProfession' or get_page_name()=='EditNewCompany' or get_page_name()=='AuthNewAgent') print 'class="active"';?>>
                            <a href="#">Profession Setup<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                
                                   <li <?php if(get_page_name()=='Profession') print 'class="active"';?> ><a href="profession">Create New Profession</a></li>
                               
                                
                                    <li <?php if(get_page_name()=='AuthNewProfession') print 'class="active"';?> ><a href="authNewProfession">Authorize New Profession</a></li>
                               
                                <li <?php if(get_page_name()=='EditNewCompany') print 'class="active"';?>>
                                    <a href="editNewCompany">Edit Company Info</a>
                                </li>

                            </ul>
                        </li>
                         <li <?php if( get_page_name()=='Profession' or get_page_name()=='AuthNewProfession' or get_page_name()=='PassportReceived' or get_page_name()=='AuthNewPassportReceived') print 'class="active"';?>>
                            <a href="#">Passport<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                
                                   <li <?php if(get_page_name()=='PassportPosition') print 'class="active"';?> ><a href="passportPosition">Passport Position</a></li>
                                <li <?php if(get_page_name()=='AuthNewPassportPosition') print 'class="active"';?> ><a href="authNewPassportPosition">Authorize New Profession</a></li>
                                
                                    <li <?php if(get_page_name()=='AuthNewProfession') print 'class="active"';?> ><a href="authNewProfession">Authorize New Profession</a></li>
                                    <li <?php if(get_page_name()=='PassportReceived') print 'class="active"';?> ><a href="passportReceived">Passport Received</a></li>
                                <li <?php if(get_page_name()=='authNewPassportReceived') print 'class="active"';?> ><a href="authNewPassportReceived">Authorize New Passport Received</a></li>
                                
                                    <li <?php if(get_page_name()=='AuthNewProfession') print 'class="active"';?> ><a href="authNewProfession">Authorize New Profession</a></li>
                               
                                <li <?php if(get_page_name()=='EditNewCompany') print 'class="active"';?>>
                                    <a href="editNewCompany">Edit Company Info</a>
                                </li>

                            </ul>
                        </li>
                       <li <?php if( get_page_name()=='Medical' or get_page_name()=='MedicalAuth' or get_page_name()=='Sales' or get_page_name()=='SalesAuth' or get_page_name()=='Pc' or get_page_name()=='PcAuth' or get_page_name()=='Visa' or get_page_name()=='VisaAuth' or get_page_name()=='Training' or get_page_name()=='TrainingAuth' or get_page_name()=='MedicalEdit' or get_page_name()=='TrainingEdit' or get_page_name()=='ManPower' or get_page_name()=='ManPowerAuth' or get_page_name()=='Vaccine' or get_page_name()=='VaccineAuth' or get_page_name()=='VaccineEdit' or get_page_name()=='Flight' or get_page_name()=='FlightAuth' or get_page_name()=='Pcr' or get_page_name()=='PcrAuth' or get_page_name()=='PcrEdit' or get_page_name()=='Mofa' or get_page_name()=='MofaAuth') print 'class="active"';?>>
                            <a href="#">Process Entry<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                
                                   <li <?php if(get_page_name()=='Medical') print 'class="active"';?> ><a href="medical">Medical</a></li>
                                     <li <?php if(get_page_name()=='MedicalAuth') print 'class="active"';?> ><a href="medicalAuth">Authorize Medical</a></li>
                                    <li <?php if(get_page_name()=='MedicalEdit') print 'class="active"';?> ><a href="medicalEdit">Edit Medical</a></li>
                                    <li <?php if(get_page_name()=='Sales') print 'class="active"';?> ><a href="sales">Sales</a></li>
                               <li <?php if(get_page_name()=='SalesAuth') print 'class="active"';?> ><a href="salesAuth">Authorize Sales</a></li>
                                <li <?php if(get_page_name()=='Pc') print 'class="active"';?>><a href="pc">Police Clearance</a>
                                     <li <?php if(get_page_name()=='PcAuth') print 'class="active"';?>><a href="pcAuth">Authorize Police Clearance</a></li>
                                    <li <?php if(get_page_name()=='Visa') print 'class="active"';?> ><a href="visa">Visa Process</a></li>
                                    <li <?php if(get_page_name()=='VisaAuth') print 'class="active"';?>><a href="visaAuth">Authorize Visa</a>
                                    <li <?php if(get_page_name()=='Training') print 'class="active"';?> ><a href="training">Training+Finger</a></li>
                                     <li <?php if(get_page_name()=='TrainingAuth') print 'class="active"';?>><a href="trainingAuth">Authorize Training+Finger</a></li>
                                     <li <?php if(get_page_name()=='TrainingEdit') print 'class="active"';?>><a href="trainingEdit">Edit Training+Finger</a></li>
                                    <li <?php if(get_page_name()=='ManPower') print 'class="active"';?> ><a href="manPower">Man Power</a></li>
                                    <li <?php if(get_page_name()=='ManPowerAuth') print 'class="active"';?> ><a href="manPowerAuth">Authorize Man Power</a></li>
                                    <li <?php if(get_page_name()=='Vaccine') print 'class="active"';?> ><a href="vaccine">Vaccine</a></li>
                                    <li <?php if(get_page_name()=='VaccineEdit') print 'class="active"';?> ><a href="vaccineEdit">Vaccine Edit</a></li>
                                    <li <?php if(get_page_name()=='VaccineAuth') print 'class="active"';?> ><a href="vaccineAuth">Authorize Vaccine</a></li>
                                    <li <?php if(get_page_name()=='Flight') print 'class="active"';?> ><a href="flight">Flight</a></li>
                                    <li <?php if(get_page_name()=='FlightAuth') print 'class="active"';?> ><a href="flightAuth">Authorize Flight</a></li>
                                    <li <?php if(get_page_name()=='Pcr') print 'class="active"';?> ><a href="pcr">PCR Test</a></li>
                                     <li <?php if(get_page_name()=='PcrEdit') print 'class="active"';?> ><a href="pcrEdit">PCR Test Edit</a></li>
                                    <li <?php if(get_page_name()=='PcrAuth') print 'class="active"';?> ><a href="pcrAuth">Authorize PCR Test</a></li>
                                <li <?php if(get_page_name()=='Mofa') print 'class="active"';?> ><a href="mofa">Mofa Entry</a></li>
                                     <li <?php if(get_page_name()=='MofaAuth') print 'class="active"';?> ><a href="mofaAuth">Authorize Mofa</a></li>

                            </ul>
                        </li>
                    </ul>
                </li>
                <?php

                }
                ?>
                <!-- <li>
                    <a href="layouts.html"><i class="fa fa-diamond"></i> <span class="nav-label">Layouts</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="graph_flot.html">Flot Charts</a></li>
                        <li><a href="graph_morris.html">Morris.js Charts</a></li>
                        <li><a href="graph_rickshaw.html">Rickshaw Charts</a></li>
                        <li><a href="graph_chartjs.html">Chart.js</a></li>
                        <li><a href="graph_chartist.html">Chartist</a></li>
                        <li><a href="c3.html">c3 charts</a></li>
                        <li><a href="graph_peity.html">Peity Charts</a></li>
                        <li><a href="graph_sparkline.html">Sparkline Charts</a></li>
                    </ul>
                </li>
                <li>
                    <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span class="label label-warning float-right">16/24</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="mailbox.html">Inbox</a></li>
                        <li><a href="mail_detail.html">Email view</a></li>
                        <li><a href="mail_compose.html">Compose email</a></li>
                        <li><a href="email_template.html">Email templates</a></li>
                    </ul>
                </li>
                <li>
                    <a href="metrics.html"><i class="fa fa-pie-chart"></i> <span class="nav-label">Metrics</span>  </a>
                </li>
                <li>
                    <a href="widgets.html"><i class="fa fa-flask"></i> <span class="nav-label">Widgets</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Forms</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="form_basic.html">Basic form</a></li>
                        <li><a href="form_advanced.html">Advanced Plugins</a></li>
                        <li><a href="form_wizard.html">Wizard</a></li>
                        <li><a href="form_file_upload.html">File Upload</a></li>
                        <li><a href="form_editors.html">Text Editor</a></li>
                        <li><a href="form_autocomplete.html">Autocomplete</a></li>
                        <li><a href="form_markdown.html">Markdown</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">App Views</span>  <span class="float-right label label-primary">SPECIAL</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="profile_2.html">Profile v.2</a></li>
                        <li><a href="contacts_2.html">Contacts v.2</a></li>
                        <li><a href="projects.html">Projects</a></li>
                        <li><a href="project_detail.html">Project detail</a></li>
                        <li><a href="activity_stream.html">Activity stream</a></li>
                        <li><a href="teams_board.html">Teams board</a></li>
                        <li><a href="social_feed.html">Social feed</a></li>
                        <li><a href="clients.html">Clients</a></li>
                        <li><a href="full_height.html">Outlook view</a></li>
                        <li><a href="vote_list.html">Vote list</a></li>
                        <li><a href="file_manager.html">File manager</a></li>
                        <li><a href="calendar.html">Calendar</a></li>
                        <li><a href="issue_tracker.html">Issue tracker</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="article.html">Article</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                        <li><a href="pin_board.html">Pin board</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="search_results.html">Search results</a></li>
                        <li><a href="lockscreen.html">Lockscreen</a></li>
                        <li><a href="invoice.html">Invoice</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="login_two_columns.html">Login v.2</a></li>
                        <li><a href="forgot_password.html">Forget password</a></li>
                        <li><a href="register.html">Register</a></li>
                        <li><a href="404.html">404 Page</a></li>
                        <li><a href="500.html">500 Page</a></li>
                        <li><a href="empty_page.html">Empty page</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-globe"></i> <span class="nav-label">Miscellaneous</span><span class="label label-info float-right">NEW</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="toast_notifications.html">Notification</a></li>
                        <li><a href="nestable_list.html">Nestable list</a></li>
                        <li><a href="agile_board.html">Agile board</a></li>
                        <li><a href="timeline_2.html">Timeline v.2</a></li>
                        <li><a href="diff.html">Diff</a></li>
                        <li><a href="pdf_viewer.html">PDF viewer</a></li>
                        <li><a href="i18support.html">i18 support</a></li>
                        <li><a href="sweetalert.html">Sweet alert</a></li>
                        <li><a href="idle_timer.html">Idle timer</a></li>
                        <li><a href="truncate.html">Truncate</a></li>
                        <li><a href="password_meter.html">Password meter</a></li>
                        <li><a href="spinners.html">Spinners</a></li>
                        <li><a href="spinners_usage.html">Spinners usage</a></li>
                        <li><a href="tinycon.html">Live favicon</a></li>
                        <li><a href="google_maps.html">Google maps</a></li>
                        <li><a href="datamaps.html">Datamaps</a></li>
                        <li><a href="social_buttons.html">Social buttons</a></li>
                        <li><a href="code_editor.html">Code editor</a></li>
                        <li><a href="modal_window.html">Modal window</a></li>
                        <li><a href="clipboard.html">Clipboard</a></li>
                        <li><a href="text_spinners.html">Text spinners</a></li>
                        <li><a href="forum_main.html">Forum view</a></li>
                        <li><a href="validation.html">Validation</a></li>
                        <li><a href="tree_view.html">Tree view</a></li>
                        <li><a href="loading_buttons.html">Loading buttons</a></li>
                        <li><a href="chat_view.html">Chat view</a></li>
                        <li><a href="masonry.html">Masonry</a></li>
                        <li><a href="tour.html">Tour</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">UI Elements</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="icons.html">Icons</a></li>
                        <li><a href="draggable_panels.html">Draggable Panels</a></li> <li><a href="resizeable_panels.html">Resizeable Panels</a></li>
                        <li><a href="buttons.html">Buttons</a></li>
                        <li><a href="video.html">Video</a></li>
                        <li><a href="tabs_panels.html">Panels</a></li>
                        <li><a href="tabs.html">Tabs</a></li>
                        <li><a href="notifications.html">Notifications & Tooltips</a></li>
                        <li><a href="helper_classes.html">Helper css classes</a></li>
                        <li><a href="badges_labels.html">Badges, Labels, Progress</a></li>
                    </ul>
                </li>

                <li>
                    <a href="grid_options.html"><i class="fa fa-laptop"></i> <span class="nav-label">Grid options</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Tables</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="table_basic.html">Static Tables</a></li>
                        <li><a href="table_data_tables.html">Data Tables</a></li>
                        <li><a href="table_foo_table.html">Foo Tables</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">E-commerce</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="ecommerce_products_grid.html">Products grid</a></li>
                        <li><a href="ecommerce_product_list.html">Products list</a></li>
                        <li><a href="ecommerce_product.html">Product edit</a></li>
                        <li><a href="ecommerce_product_detail.html">Product detail</a></li>
                        <li><a href="ecommerce-cart.html">Cart</a></li>
                        <li><a href="ecommerce-orders.html">Orders</a></li>
                        <li><a href="ecommerce_payments.html">Credit Card form</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="basic_gallery.html">Lightbox Gallery</a></li>
                        <li><a href="slick_carousel.html">Slick Carousel</a></li>
                        <li><a href="carousel.html">Bootstrap Carousel</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Menu Levels </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="#">Third Level <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>

                            </ul>
                        </li>
                        <li><a href="#">Second Level Item</a></li>
                        <li>
                            <a href="#">Second Level Item</a></li>
                        <li>
                            <a href="#">Second Level Item</a></li>
                    </ul>
                </li>
                <li>
                    <a href="css_animation.html"><i class="fa fa-magic"></i> <span class="nav-label">CSS Animations </span><span class="label label-info float-right">62</span></a>
                </li>
                <li class="landing_link">
                    <a target="_blank" href="landing.html"><i class="fa fa-star"></i> <span class="nav-label">Landing Page</span> <span class="label label-warning float-right">NEW</span></a>
                </li>
                <li class="special_link">
                    <a href="package.html"><i class="fa fa-database"></i> <span class="nav-label">Package</span></a>
                </li> -->
            </ul>

        </div>
    </nav>