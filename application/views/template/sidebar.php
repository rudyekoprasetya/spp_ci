<?php
$akses=$this->session->userdata('akses');
?>
<ul class="nav navbar-nav side-nav">
<?php if($akses=='admin') {?>
          <li><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="<?php echo site_url('transaksi') ?>"><i class="fa fa-money"></i> Transaksi</a></li>
          <li><a href="<?php echo site_url('admin/siswa') ?>"><i class="fa fa-users"></i> Data Siswa</a></li>
          <li><a href="<?php echo site_url('admin/kelas') ?>"><i class="fa fa-home"></i> Data Kelas</a></li>
          <li><a href="<?php echo site_url('admin/user') ?>"><i class="fa fa-user-md"></i> Data Pengguna</a></li>
          <li><a href="<?php echo site_url('admin/inbox') ?>"><i class="fa fa-envelope"></i> Inbox SMS</a></li>
          <li><a href="<?php echo site_url('admin/outbox') ?>"><i class="fa fa-mail-reply-all"></i> Kirim SMS</a></li>
          <li><a href="<?php echo site_url('admin/sentitems') ?>"><i class="fa fa-envelope-o"></i> SMS Terkirim</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Laporan <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo site_url('laporan/spp') ?>"><i class="fa fa-book"></i> Pembayaran SPP</a></li>
          <li><a href="<?php echo site_url('laporan/lain') ?>"><i class="fa fa-book"></i> Pembayaran Lain-lain</a></li>
          <li><a href="<?php echo site_url('admin/rekap') ?>"><i class="fa fa-book"></i> Rekapitulasi</a></li>
        </ul>
    </li>
<?php  } else { ?>
          <li><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="<?php echo site_url('transaksi') ?>"><i class="fa fa-money"></i> Transaksi</a></li>
          <li><a href="<?php echo site_url('admin/inbox') ?>"><i class="fa fa-envelope"></i> Inbox SMS</a></li>
          <li><a href="<?php echo site_url('admin/sentitems') ?>"><i class="fa fa-envelope-o"></i> SMS Terkirim</a></li>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Laporan <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('laporan/spp') ?>"><i class="fa fa-book"></i> Pembayaran SPP</a></li>
                <li><a href="<?php echo site_url('laporan/lain') ?>"><i class="fa fa-book"></i> Pembayaran Lain-lain</a></li>
                <li><a href="<?php echo site_url('admin/rekap') ?>"><i class="fa fa-book"></i> Rekapitulasi</a></li>
              </ul>
          </li>
<?php } ?>            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> User Menu <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('login/profil') ?>"><i class="fa fa-lock"></i> Ubah Password</a></li>
                <li><a href="<?php echo site_url('login/logout') ?>" onclick="return confirm('Yakin Mau Keluar?');"><i class="fa fa-sign-out"></i> Log Out</a></li>
              </ul>
</li>
</ul>