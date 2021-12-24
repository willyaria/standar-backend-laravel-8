<!-- Sidebar navigation-->
<nav class="sidebar-nav">
	<ul id="sidebarnav">
		<li class="nav-small-cap">MAIN MENU</li>
		<li> <a class="has-arrow waves-effect waves-dark" href="{{ url('/home') }}" aria-expanded="false"><i class="mdi mdi-home"></i>
				<span class="hide-menu">Dashboard </span>
			</a>
		</li>
		
		<?php
			$pub = 'Yes';
			$main_menu = DB::select('SELECT * from menu where parent_id=0 AND menu_type_id=1 AND publish="'.$pub.'" AND unis_id="'.$ubis_session.'"');
			foreach ($main_menu as $main) {
				// Query untuk mencari data sub menu
				
				// $sub_menu = DB::select('SELECT a.id, a.user_id, a.menu_id, b.menu_name, b.link, b.parent_id, b.sortir from menu_map a LEFT JOIN menu b ON b.id_menu = a.menu_id where a.user_id="'.$id_user_session.'" AND a.unis_id="'.$ubis_session.'" AND b.parent_id="'.$main->id.'" AND b.menu_type_id=1 AND b.publish="'.$pub.'" AND b.unis_id="'.$ubis_session.'"');
				
				$sub_menu = DB::table('menu_map as a')
					->select('a.id','a.user_id','a.menu_id','b.menu_name','b.link','b.parent_id','b.sortir')
					->join('menu as b','b.id_menu','=','a.menu_id','left')
					->where('a.user_id',$id_user_session)
					->where('a.unis_id',$ubis_session)
					->where('b.parent_id',$main->id)
					->where('b.menu_type_id',1)
					->where('b.publish',$pub)
					->where('b.unis_id',$ubis_session)
					->where('a.active',1)
					->where('a.trash',0)
					->orderBy('b.sortir','asc')
					->get();
				
				
				if (count($sub_menu) > 0)
					// if ($sub_menu->num_rows() > 0)
				{
		?>
					<li>
						<!-- start main menu dengan sub menu dan menampilkan menu dengan jenis menu parent -->               	
						<a class="has-arrow waves-effect waves-dark" href="<?=$main->link ?>" aria-expanded="false">
							<span class="hide-menu"><?=$main->menu_name ?></span> 
						</a>
						<!-- end main menu dengan sub menu -->
						<!-- start sub menu -->
						<ul aria-expanded="false" class="collapse">
						<?php
							foreach ($sub_menu as $sub) {
						?>
							<li><a href="{{url('/')}}<?= $sub->link ?>"> <?=$sub->menu_name ?> </a></li>
						<?php
							}
						?>
						</ul>
						<!-- end sub menu -->
					</li>
			<?php 
				} else { 
			?>	
		<?php 
			}
		}
		?>
		<li class="nav-devider"></li>
	</ul>
</nav>
<!-- End Sidebar navigation -->