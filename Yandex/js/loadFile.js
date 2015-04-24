function start(){
	document.getElementById('submit').disabled=true;

	function onFileSelected(event){
		//check if file and language is selected
		var dropDown = document.getElementById('langList');
		var selectedValue = dropDown.options[dropDown.selectedIndex].value;
		var languageSelected;

		if(selectedValue == "Select a language"){
			languageSelected = false;
		}else{
			languageSelected = true;
		}

		if(document.getElementById('file').value != "" && languageSelected != false){
			document.getElementById('submit').disabled=false;
		}
		//check if File API is supported
		if(window.File){
			//get the file from the element that triggered the event
			var file = event.target.files[0];
			//check if file exists
			if(file){
				//create FileReader object to read contents of the File
				var fr = new FileReader();
				fr.onload = function(e){
					var contents = e.target.result;
					document.getElementById("ta_original").innerHTML = contents;
				}
			}else{
				alert("no file");
			}
			fr.readAsText(file);
		}else{
			alert("File API not supported");
		}

		document.getElementById('ta_translated').innerHTML = " ";
		
	}
	document.getElementById('file').addEventListener('change', onFileSelected, false);
	document.getElementById('langList').addEventListener('change', onFileSelected, false);
}

window.onload = start;