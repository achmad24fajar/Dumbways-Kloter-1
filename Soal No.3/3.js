
function cetakPola(jumlahPola){
	var star = '*'
	var space = ' '
	var text = ''
	var length = [3, 4, 5, 4, 3]
	
		for (var i = 0; i < 5; i++) {
			for (var b = 0; b < jumlahPola; b++) {
				for (var a = 0; a < 5; a++) {
					if(length[i] == 3){
						if(a == 2){
							text += star
						}else{
							text += space
						}
					}
					if(length[i] == 4){
						if(a == 1 || a == 3){
							text += star
						}else{
							text += space
						}
					}
					if(length[i] == 5){
						if(a == 0 || a == 4){
							text += star
						}else{
							text += space
						}
					}
				}
			}
			text += '\n'
		}
		console.log(text)
	
}

cetakPola(5)