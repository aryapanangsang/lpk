<table id="tampilan">
<tr>
<td width="25%"><label for="alamat">Data Penerima</label></td>
<td>
<input type="radio" name="alamat" value="sama" class="detail"> Sama dengan data Pembeli
 
</td>
<td width="40%">
<input type="radio" name="alamat" value="berbeda" class="detail">Data berbeda
</td>
</tr>
 
<tr>
<td>
</td>
<td>
</td>
 
<td>
<div id="form-input">
 
<p>Nama<br />
<input type="text" name="nama"></p>
<p>Telpon/HP<br />
<input type="text" name="telpon"></p>
<p>Email<br />
<input type="text" name="email"></p>
 
</div>
</td>
 
</tr>
</table>

<script>
$(document).ready(function(){
$("#form-input").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
$(".detail").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
if ($("input[name='alamat']:checked").val() == "berbeda" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
$("#form-input").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
} else {
$("#form-input").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
}
});
});
</script>