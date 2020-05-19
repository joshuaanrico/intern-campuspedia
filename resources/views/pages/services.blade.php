@extends('layouts.app')

@section('content')
    <h1>Sistem Menghitung Jam Kerja</h1>
    <p>Sistem ini untuk menghitung berapa jam anak magang mengerjakan tugas di kantor dan menampilkannya kedalam tabel dibawah form.</p>
    <br>
    <form>
	  <fieldset>
	    <legend>Masukan info anda hari ini: </legend>

		<div class="form-group">
	      <label for="exampleTextarea">Tanggal kerja:</label>
	      <input class="form-control" type="date" id="tanggal">
	    </div>
	    <div class="form-group">
	      <label for="exampleTextarea">Jam masuk kerja:</label>
	      <input class="form-control" type="time" id="jamMasuk">
	    </div><div class="form-group">
	      <label for="exampleTextarea">Jam keluar kerja:</label>
	      <input class="form-control" type="time" id="jamKeluar">
	    </div>
	    <div class="form-group">
	      <label for="exampleTextarea">Tugas yang dikerjakan:</label>
	      <textarea class="form-control" id="tugas" rows="3" placeholder="Contoh: membuat aplikasi mobile"></textarea>
	    </div>
	    <div class="form-group">
	      <label for="exampleTextarea">Kendala saat mengerjakan tugas:</label>
	      <textarea class="form-control" id="kendala" rows="3" placeholder="Contoh: tidak bisa membuat header"></textarea>
	    </div>
	    <br>
	    <button type="button" class="btn btn-primary" onclick="myFunction()">Hitung Jam Kerja</button>
	  </fieldset>
	</form>

	<br><hr><hr>
	
	<h1>Tabel Hasil Perhitungan Jam Kerja</h1>
	<br>
	<table class="table table-hover">
	<thead>
	    <tr class="table-active">
	      <th scope="col" style="width: 10%;">Tanggal</th>
	      <th scope="col" style="width: 10%;">Jam Masuk</th>
	      <th scope="col" style="width: 10%;">Jam Pulang</th>
	      <th scope="col">Tugas Yang Dikerjakan</th>
	      <th scope="col">Kendala Saat Pengerjaan</th>
	      <th scope="col" style="width: 12%;">Total Jam Kerja</th>
	    </tr>
	</thead>
	<tbody  id="myTable">
	</tbody>    
	</table> 

	<br><br><br>

<script>
function timeStringToFloat(time) {
    var hoursMinutes = time.split(/[.:]/);
    var hours = parseInt(hoursMinutes[0], 10);
    var minutes = hoursMinutes[1] ? parseInt(hoursMinutes[1], 10) : 0;
	return hours + minutes / 60;
}
var jam;

function myFunction() {
    var table = document.getElementById("myTable");
    var row = table.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    cell1.innerHTML = document.getElementById("tanggal").value;
    cell2.innerHTML = document.getElementById("jamMasuk").value;
    cell3.innerHTML = document.getElementById("jamKeluar").value;
    cell4.innerHTML = document.getElementById("tugas").value;
    cell5.innerHTML = document.getElementById("kendala").value;
  
	var waktu1 = timeStringToFloat(document.getElementById("jamMasuk").value);
    var waktu2 = timeStringToFloat(document.getElementById("jamKeluar").value);
    var hasil = waktu2-waktu1;

    if (document.getElementById("jamMasuk").value < "12:00" && document.getElementById("jamKeluar").value > "19:00") {
		hasil = hasil - 3;
	}else if(document.getElementById("jamMasuk").value < "12:00" && document.getElementById("jamKeluar").value > "17:00"){
		hasil = hasil - 2;
	}else if(document.getElementById("jamMasuk").value < "12:00" && document.getElementById("jamKeluar").value > "13:00"){
		hasil = hasil - 1;
	}else if((document.getElementById("jamMasuk").value > "13:00" && document.getElementById("jamMasuk").value > "16:00") && document.getElementById("jamKeluar").value > "19:00"){
		hasil = hasil - 2;
	}else if((document.getElementById("jamMasuk").value > "13:00" && document.getElementById("jamMasuk").value > "16:00") && document.getElementById("jamKeluar").value > "17:00"){
		hasil = hasil - 1;
	}else if((document.getElementById("jamMasuk").value > "17:00" && document.getElementById("jamMasuk").value > "18:00") && document.getElementById("jamKeluar").value > "19:00"){
		hasil = hasil - 1;
	}

	var decimalTimeString = hasil;
	var decimalTime = parseFloat(decimalTimeString);
	decimalTime = decimalTime * 60 * 60;
	var hours = Math.floor((decimalTime / (60 * 60)));
	decimalTime = decimalTime - (hours * 60 * 60);
	var minutes = Math.floor((decimalTime / 60));
	if(hours < 10){
		hours = "0" + hours;
	}
	if(minutes < 10){
		minutes = "0" + minutes;
	}
	jam = ("" + hours + ":" + minutes);
	
    cell6.innerHTML = jam;
}
</script>
@endsection