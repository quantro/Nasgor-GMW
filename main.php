<?php 
/***
	file:	main.php
	created:	2015-04-25 04:39:36
***/
?>
<!--start main-->
<div class='col-lg-12 col-md-12 col-xs-12'>	
	<div class="panel panel-default">
		
        <div class="panel-heading">PASIEN BARU</div>
		<form role="form" class='form-horizontal' method="post" id='pasienForm' action="" style='width:100%'>
        <div class="panel-body">
    
        <table class='table table-striped'>
            <tbody>
                <tr>
                    <td width=200>
                        <div class="form-group">
                            <label for="frmmr" class="col-lg-4 control-label">Medical&nbsp;Record</label>
                        </div>
                    </td>
                    <td>
                        <div class="col-lg-12">
                            <input type="text" class="form-control col-lg-4" id="frmmr" placeholder="Masukkan Medical Record" name='inp[mr]' value='' />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width=200>
                        <div class="form-group">
                            <label for="frmname" class="col-lg-4 control-label">Nama</label>
                        </div>
                    </td>
                    <td>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="frmname" placeholder="Masukkan Nama" name='inp[pat_name1]' value='' />
                            <input type="text" class="form-control" id="frmname2" placeholder="Masukkan nama Akhir" name='inp[pat_name2]' value='' />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width=200>
                        <div class="form-group">
                            <label for="frmpat_gen" class="col-lg-4 control-label">Kelamin</label>
                        </div>
                    </td>
                    <td>
                        <div class="col-lg-12">
                            <select name='inp[pat_gen]' class="form-control col-lg-5" id="frmpat_gen">
                                <option>Pilih dari Pilihan berikut</option>
                                <option value='0'>Perempuan</option>
                                <option value='1'>Pria</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width=200>
                        <div class="form-group">
                            <label for="frmpat_birth" class="col-lg-4 control-label">Lahir</label>
                        </div>
                    </td>
                    <td>
                        <div class="col-lg-12">
                            <input type="date" class="datepicker form-control" id="frmpat_birth" placeholder="" name='inp[pat_birth]' value='' />*klik here</div>
                    </td>
                </tr>
                <tr>
                    <td width=200>
                        <div class="form-group">
                            <label for="frmpat_phone" class="col-lg-4 control-label">Telepon</label>
                        </div>
                    </td>
                    <td>
                        <div class="col-lg-12">
                            <input type="text" class="form-control col-lg-4" id="frmpat_phone" placeholder="Masukkan No Telepon" name='inp[pat_phone]' value='' />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan=2>
                        <div class="form-group">Alamat
                            <div class='clear'></div>
                            <textarea class="form-control tinyMce" id="frmaddr" placeholder="Masukkan Alamat" name='inp[pat_addr]'></textarea>
                            <br/>Kode Pos:
                            <input type="text" class="form-control" id="frmaddr3" name='inp[pat_addr3]' value='' />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width=200>
                        <div class="form-group">
                            <label for="frmpat_desc" class="col-lg-4 control-label">Keterangan</label>
                        </div>
                    </td>
                    <td>
                        <div class="col-lg-12">
                            <textarea class="form-control col-lg-4" id="frmpat_desc" name='inp[pat_desc]'></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width=200>
                        <div class="form-group">
                            <label for="frmpassword" class="col-lg-4 control-label">Password</label>
                        </div>
                    </td>
                    <td>
                        <div class="col-lg-12">
                            <input type="password" class="form-control col-lg-4" id="frmpassword" placeholder="Masukkan Password" name='inp[password]' value='' />
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <button class='btn btn-default' type='button' onclick="checkUser('frmusername','frmpassword')">Update <i class="fa fa-edit"></i>

        </button>
    
		</div>
		</form>
	</div>
	
</div>
<div class='col-lg-12 col-md-12 col-xs-12'>
    <div class="panel panel-default">
        <div class="panel-heading">Mencari Pasien</div>
        <div class="panel-body">
            <div class='formCari'>
                <form id='cari'>
                    <div class="input-group"> <span class="input-group-addon">NO PASIEN</span>

                        <input type=text name='no' autocomplete='off' />
                    </div>
                    <div class="input-group"> <span class="input-group-addon">Nama</span>

                        <input type=text name='name' autocomplete='off' />
                    </div>
                    <div class="input-group"> <span class="input-group-addon">Lahir</span>

                        <input type=text name='lahir' autocomplete='off' />
                    </div>
  
                    <div class="btn-group  btn-group-lg">
                        <button type='button' class='btn btn-primary' onclick='cariPasien()'>Cari</button>
                        <button type='button' class='btn btn-success' onclick='cariPasien("reset")'>Reset</button>
                    </div>
                </form>
            </div>
        </div>
        <div class='panel-footer'>format untuk pencarian tanggal: tglbulantahun (260415) tahun cukup 2 angka terakhir</div>
    </div>
</div>

<div class='col-lg-12 col-md-12 col-xs-12'>
    <div class="panel panel-default">
        <div class="panel-heading">Kategori Dokter</div>
        <div class="panel-body">
            <div class="input-group">
                <!--select-->
                <select name='doc_types' class="form-control" id="docType">
                    <option value="0" selected>Pilih salah Satu</option>
                    <option value="1">POLI UMUM</option>
                    <option value="2">POLI GIGI</option>
                    <option value="3">DOKTER KANDUNGAN</option>
                </select>
                <!--select--> <span class="input-group-btn">
				<button type='button' onclick='listPasien(0)' class='btn btn-info'>Lihat Jadwal Berdasarkan Kategori Dokter <i class="fa fa-users fa-1x"></i></button>
			  </span>

            </div>
            <!-- /input-group -->
        </div>
        <div class="panel-footer">Pilih Tipe Dokter di kiri dan list akan berubah dibawah</div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">LIST PASIEN BERDASARKAN KATEGORI DOKTER</div>
        <div class="panel-body" style=''>
            <ul class="pagination">
                <li><a onclick='listPasienPage(1);'>1</a>

                </li>
                <li><a onclick='listPasienPage(2);'>2</a>

                </li>
                <li><a onclick='listPasienPage(3);'>3</a>

                </li>
                <li><a onclick='listPasienPage(4);'>4</a>

                </li>
                <li><a onclick='listPasienPage(5);'>5</a>

                </li>
                <li><a onclick='listPasienPage(6);'>6</a>

                </li>
                <li><a onclick='listPasienPage(7);'>7</a>

                </li>
                <li><a onclick='listPasienPage(8);'>8</a>

                </li>
                <li><a onclick='listPasienPage(9);'>9</a>

                </li>
                <li><a onclick='listPasienPage(10);'>10</a>

                </li>
                <li><a onclick='listPasienPage(11);'>11</a>

                </li>
                <li><a onclick='listPasienPage(12);'>12</a>

                </li>
                <li><a onclick='listPasienPage(13);'>13</a>

                </li>
                <li><a onclick='listPasienPage(14);'>14</a>

                </li>
                <li><a onclick='listPasienPage(15);'>15</a>

                </li>
                <li><a onclick='listPasienPage(16);'>16</a>

                </li>
                <li><a onclick='listPasienPage(17);'>17</a>

                </li>
                <li><a onclick='listPasienPage(18);'>18</a>

                </li>
                <li><a onclick='listPasienPage(19);'>19</a>

                </li>
                <li><a onclick='listPasienPage(20);'>20</a>

                </li>
            </ul>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Dokter</th>
                        <th>Nama</th>
                        <th colspan=2>NO KWITANSI</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
<?php 
	for($i=0;$i<15;$i++){?>
                    <tr>
                        <td>NAMA DOKTER</td>
                        <td>NAMA PASIEN <span class='badge'>000000</span> 
                            <button type='button' class='detail btn btn-info btn-sm' patid='336076' onclick='detailPat(this)'><i class='fa fa-info-circle'> </i> Detail</button>
                        </td>
                        <td>1052942<span class='label label-info'>Ok <i class='fa fa-plus-square'></i></span>

                        </td>
                        <td><a title='14-04-2015 13:15:50'>14/04 13:15</a>

                        </td>
                        <td>
                            <button type='button' class='detailMR btn btn-info btn-sm ' patid='336076' onclick='detailPat2(this)'><i class='fa fa-info'> </i> Detail</button>
                            <button type='button' patid='336076' daf='680279' class='mr btn btn-primary btn-sm' onclick='detailPat2(this)'><i class='fa fa-pencil'> </i> Tambah Medrec</button>
                            <button type='button' patid='336076' class='mr btn btn-primary btn-sm' onclick='detailPat(this)'><i class='fa fa-plus-square'> </i> Edit Pasien</button>
                            <input type="hidden" class="reg" name="register[336076]" pasien_id='336076' daftar='680279' name='ADINDA RAHMA P ' daftar_pasien='1052942' daftarDate='2015-04-14 13:15:50' doc_id='13' dokter='INSAN MULYAR DEWI, Drg' spec_id='2' type='POLI GIGI' gender='F' birth='2006-03-07' blood='A' mr='0000336076' medrecStatus='1' />
                        </td>
                    </tr>
<?php 
	}
?>
				</tbody>
            </table>
        </div>
    </div>
</div>

<div class='col-lg-12 col-md-12 col-xs-12'>
    <!--JQGRID-->
    
<h2>FIELDS</h2>

    <div id='fTypeDiv'>
        	<h3>TYPE</h3>

        <table id="fType"></table>
        <div id="fType_pager"></div>
        	<h3>GROUP</h3>

        <table id="fGroup"></table>
        <div id="fGroup_pager"></div>
    </div>
</div>
<!--end main-->