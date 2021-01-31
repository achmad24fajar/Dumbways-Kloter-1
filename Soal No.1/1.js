
function proses(){
	eTipe = document.getElementById("tipeid");
	TipeValue = eTipe.options[eTipe.selectedIndex].value;
	eKredit = document.getElementById("kreditid");
	KreditValue = eKredit.options[eKredit.selectedIndex].value;

	return kreditRumah(TipeValue, KreditValue)
}

function kreditRumah(tipe, lamaKredit){
	if(tipe == 'Rose'){
		var harga = 120000000;
		var dp = harga * 20 / 100;
	} else 
	if(tipe == 'Gold'){
		var harga = 300000000;
		var dp = harga * 20 / 100;
	} else 
	if(tipe == 'Platimun'){
		var harga = 360000000;
		var dp = harga * 20 / 100;
	}

	var sisa = harga - dp;
	var angsuran = sisa / lamaKredit;

	document.getElementById("cetakTipe").innerHTML = tipe;
	document.getElementById("cetakHarga").innerHTML = harga;
	document.getElementById("cetakDp").innerHTML = dp;
	document.getElementById("cetakSisa").innerHTML = sisa;
	document.getElementById("cetakKredit").innerHTML = lamaKredit;
	document.getElementById("cetakAngsuran").innerHTML = angsuran;

	var data = []
	for(var i=1; i <= lamaKredit; i++) {
		sisa -= angsuran
		var html = '<tr><td>'+i+'</td><td>Rp. '+angsuran+'</td><td>Rp. '+sisa+'</td></tr>'
		data.push(html)
		document.getElementById("isiTabel").innerHTML = data.join(' ')
	}
	
}