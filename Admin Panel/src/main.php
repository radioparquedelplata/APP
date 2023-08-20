<?php
$load = new load;
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
              <h4 class="page-title m-b-0">Dashboard</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="<?=siteUrl?>">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
		</ul>
		<div class="row">
			<div class="col-lg-12 col-sm-12">
				<div class="card">
					<div class="card-statistic-5">
						<div class="info-box7-block">
							<div class="row ">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<h6 class="m-b-20 text-center">Total Apps</h6>
									<h4 class="text-center">
										<span>
											<?=$load->CountTable("applist");?></span>
									</h4>
								</div>
							</div>
						<div id="cardChart1"/></div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
</div>


