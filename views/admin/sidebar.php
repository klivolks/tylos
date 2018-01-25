<div class="col m4 l2 s12 grey darken-3 sidebar hide-on-small-only">
	<div class="time">

	</div>
	<ul>
		<li class="<?php if($sub_page=='dashboard'){ echo 'active-menu'; } ?>"><a href="/admin/dashboard/"><i class="material-icons">dashboard</i><span>DASHBOARD</span></a></li>
		<li  class="<?php if($sub_page=='courts'){ echo 'active-menu'; } ?>"><a href="/admin/court/"><i class="material-icons">golf_course</i><span>COURT MANAGEMENT</span></a>
			<ul>
				<li><a href="/admin/court/"><i class="material-icons">account_balance</i><span>COURTS</span></a></li>
				<li><a href="/admin/booking/"><i class="material-icons">book</i><span>BOOKINGS</span></a></li>
			</ul>
		</li>
		<li class="<?php if($sub_page=='members'){ echo 'active-menu'; } ?>"><a href="/admin/members/"><i class="material-icons">verified_user</i><span>MEMBERS</span></a></li>
		<li class="<?php if($sub_page=='gallery'){ echo 'active-menu'; } ?>"><a href="/admin/gallery/"><i class="material-icons">photo</i><span>GALLERY</span></a></li>
		<li class="<?php if($sub_page=='admin'){ echo 'active-menu'; } ?>"><a href="/admin/all"><i class="material-icons">supervisor_account</i><span>ADMINS</span></a>
			<ul>
				<li class=""><a href="/admin/all"><small>&gt;&gt;</small> ALL ADMINS</a></li>
				<li class=""><a href="/admin/new"><small>&gt;&gt;</small> NEW ADMIN</a></li>
			</ul>
		</li>
		<li class="<?php if($sub_page=='settings'){ echo 'active-menu'; } ?>"><a href="/admin/settings/"><i class="material-icons">settings</i><span>SETTINGS</span></a></li>
	</ul>
	<div class="footer hide-on-med-and-down">
		&copy; TYLOS | 2017-18 | All rights reserved
	</div>
</div>