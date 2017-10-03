<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                <span class="bigtitle"><?=$config->get('config.systeminfo.title')?></span>
                <span class="site-description"><?=$config->get('config.systeminfo.subtitle')?></span>
                </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right ">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul id="nav_messages" class="dropdown-menu dropdown-messages">

                      <?php
                    	/*

				$msgarr=$usermessage->getbykeyword('','','5','1');
				if (empty($msgarr)) echo '<li><a href="#"><div><strong>没有未读消息</strong></div></a></li>';
				foreach ($msgarr as $msg){
					$sender=$msg['sender'];
					$date=date('Y-m-d',strtotime($msg['time']));
					$msgtxt=$msg['msg'];
					echo <<<CODE
					<li>
				            <a href="??message.notread">
				                <div>
				                    <strong>$sender</strong>
				                    <span class="pull-right text-muted">
				                        <em>$date</em>
				                    </span>
				                </div>
				                <div>$msgtxt</div>
				            </a>
				        </li>
				        <li class="divider"></li>
CODE;
				}
                    	*/
                    	?>

                        <li>
                            <a class="text-center" href="??message.all">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul id="nav_tasks" class="dropdown-menu dropdown-tasks">
                    	<?php
                    	/*
                    		$_workorder=new userWorkOrder();
				$_list=$_workorder->getlist($user->uid,'1,2','5');
                    		foreach ($_list as $v){
                    			$id=$v['_id'];
					$type=$_workorder->config['type'][$v['type']];
					$status=$_workorder->config['status'][$v['status']];
					if ($v['status']=='1'){
						$p='30';
						$class='progress-bar-info';
					}else{
						$p='70';
						$class='progress-bar-success';
					}
					echo <<<CODE
					<li>
				            <a href="??workorder.orderdtl&id=$id">
				                <div>
				                    <p>
				                        <strong>$type</strong>
				                        <span class="pull-right text-muted">$status</span>
				                    </p>
				                    <div class="progress progress-striped active">
				                        <div class="progress-bar $class" role="progressbar" aria-valuenow="$p" aria-valuemin="0" aria-valuemax="100" style="width: $p%">
				                        </div>
				                    </div>
				                </div>
				            </a>
				        </li>
				        <li class="divider"></li>
CODE;
				}
			*/
                    	?>



                        <li>
                            <a class="text-center" href="??workorder.myorder">
                                <strong>See All WorkOrder</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul id="nav_alerts" class="dropdown-menu dropdown-alerts">
			<?php
			/*
				$msgarr=$useralertmessage->getbykeyword('','','5','1');
				foreach ($msgarr as $msg){
					$sender=$msg['sender'];
					$date=verifyformat::format_date(strtotime($msg['time']));
					$msgtxt=$msg['msg'];
					echo <<<CODE
					<li>
				            <a href="??smartalert.allalertmsg">
				                <div>
				                    <strong><i class="glyphicon glyphicon-exclamation-sign"></i> $sender</strong>
				                    <span class="pull-right text-muted small">
				                        <em>$date</em>
				                    </span>
				                </div>
				                <div class="small">$msgtxt</div>
				            </a>
				        </li>
				        <li class="divider"></li>
CODE;
				}
                    	*/
			?>

                        <li>
                            <a class="text-center" href="??smartalert.allalertmsg">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                    	<li><a href="??usercenter.index"><i class="fa fa-user fa-fw"></i><?=$user->nickname?></a>
                        </li>

                        <li><a href="??usercenter.index"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php?act=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       <!-- <li class="sidebar-search">

                        <form action="??mydev.manage" method="post">
                            <div class="input-group custom-search-form">
                                <input type="text" name="key" class="form-control" placeholder="Search Device...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        </li>-->

                        <?php



						$themes->require('menu');



						?>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
