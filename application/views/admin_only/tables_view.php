    		<div id="page-wrapper">
    			<div class="row">
    				<div class="col-lg-12">
    					<h3 class="page-header"><?= $breadcrumbs ?></h3>
    				</div>
    				<!-- /.col-lg-12 -->
    			</div>
    			<!-- /.row -->
    			<div class="row">
    				<div class="col-lg-12">
    					<div class="panel panel-default">
    						<div class="panel-heading">
    							<?= $active_table ?>
                                <a class="pull-right" href="<?= base_url('tables/'.strtolower($active_table).'/insert') ?>"><i class="fa fa-plus fa-fw"></i> Add</a>
    						</div>
    						<!-- /.panel-heading -->
    						<div class="panel-body">
    							<div class="table-responsive">
    								<?php $this->load->view($active_table_view);  ?>
    							</div>
    							<!-- /.table-responsive -->
    						</div>
    						<!-- /.panel-body -->
    					</div>
    					<!-- /.panel -->
    				</div>
    				<!-- /.col-lg-12 -->
    			</div>
    			<!-- /.row -->
    		</div>