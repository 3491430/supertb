function start(){
	var languageSelected = false;

	//Disable the translate and save button
	document.getElementById('submit').disabled=true;
	if(document.getElementById('div_translated').innerHTML == ""){
		document.getElementById('save').disabled=true;
	}
	function onFileSelected(event){
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
		
		//document.getElementById('ta_translated').innerHTML = " ";
		//alert(document.getElementById('ta_translated').innerHTML);
		checkInput();
	}


	function onLangSelected(event){
		//Get the language selected from the droplist
		var dropDown = document.getElementById('langList');
		var selectedValue = dropDown.options[dropDown.selectedIndex].value;
		

		//Determine if a language is selected
		if(selectedValue == "Select a language"){
			languageSelected = false;
		}else{
			languageSelected = true;
		}

		checkInput();
	}


	function checkInput(){
		//Check that both a language and file has been selected
		if(document.getElementById('file').value != "" && languageSelected != false){
			//Enable the translate button
			document.getElementById('submit').disabled=false;
		}
	}



	function enableSave(){
		document.getElementById('save').disabled=false;
	}

	//Browse button event listener
	document.getElementById('file').addEventListener('change', onFileSelected, false);

	//Drop-list event listener
	document.getElementById('langList').addEventListener('change', onLangSelected, false);

	//
	document.getElementById('submit').addEventListener('click', enableSave, false);
}

window.onload = start;























