<div class="col-md-12 col-xl-12">
	<div class="card">
		
		<div class="card-body p-6">
			<div class="panel panel-primary">
				<div class="tab-menu-heading">
					<div class="tabs-menu ">
						<!-- Tabs -->
						<ul class="nav panel-tabs">
							<li class=""><a href="#tab1" class="active" data-toggle="tab">ข้อมูลรายงาน</a></li>
							<li><a href="#tab2" data-toggle="tab" class="">รายละเอียด</a></li>
							<!--
							<li><a href="#tab3" data-toggle="tab" class="">แปลนชั้น/แปลนห้อง</a></li>
							<li><a href="#tab4" data-toggle="tab" class="">เปรียบเทียบ</a></li>
							<li><a href="#tab5" data-toggle="tab" class="">โบรชัวร์</a></li>
							<li><a href="#tab6" data-toggle="tab" class="">Price List</a></li>
							<li><a href="#tab7" data-toggle="tab" class="">อช. 10+13</a></li>
							<li><a href="#tab8" data-toggle="tab" class="">ประเมินราชการ</a></li>
							<li><a href="#tab9" data-toggle="tab" class="">ทรัพย์สินที่ประเมิน</a></li>
						-->
							
						</ul>
					</div>
				</div>
				<div class="panel-body tabs-menu-body">
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">							
							@include('admin.editcontent1')							
						</div>
						<div class="tab-pane" id="tab2">
							@include('admin.editcontent2')
							
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>