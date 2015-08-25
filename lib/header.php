	<!-- Fixed navbar -->
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">國立東華大學 通識教育中心擔任教學助理（TA）申請</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
							<?php if(isset($_SESSION['stuID'])){ 
								$result = $DBmain->query("SELECT * FROM `apply` WHERE `page` = 99 AND `stuID` = '{$_SESSION['stuID']}'; "); 
								if($result->num_rows>0) {
							?>
							<li><a target="_balnk" href="<?php echo $URLPv; ?>page1.php">列印第一頁</a></li>
							<li><a target="_blank" href="<?php echo $URLPv; ?>page2.php">列印第二頁</a></li>
							<?php } ?>
							<li><a href="<?php echo $URLPv; ?>logout.php">登出</a></li>
							<?php } ?>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>

    <!-- Fixed navbar -->

