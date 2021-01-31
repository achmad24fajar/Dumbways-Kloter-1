function hitungHurufDariKalimat(str, kalimat){
	var regex = new RegExp(str, "g");
	var hasil = kalimat.match(regex)
	console.log(hasil.length)
}

hitungHurufDariKalimat('a', 'saya mau makan sate bersama teman saya setelah lulus dari sekolah dasar')