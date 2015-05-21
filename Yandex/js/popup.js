
$(document).ready(function(){
	var wordsArray = new Array();
	var oldWord;
	var newWord;
	var spanToChange;
			

	//individual word click
	$('[id^="word-"]').click(function(){
		wordsArray = [];
		$("#wordList li").empty();
		oldWord = $(this).text();

		//php to js var - language code for translated text - translate.php
		//var from translate.php -langTo
		var dictLang = langTo + "-" + langTo;
		//alert(dictLang);
		
		//var url = "https://dictionary.yandex.net/api/v1/dicservice.json/lookup?";
		var fullUrl = "https://dictionary.yandex.net/api/v1/dicservice.json/lookup?key=dict.1.1.20150422T115101Z.5abcc685b6b7f362.4a6c7f76c9e9471ddb118386839ab77d55429167&lang="+dictLang+"&text=" + oldWord;
			alert(fullUrl);
		var httpRequest = new XMLHttpRequest();
		httpRequest.open("GET", fullUrl, true);
		httpRequest.send();

		httpRequest.onreadystatechange = function(){
			if(httpRequest.readyState == 4 && httpRequest.status == 200){
				var myArr = JSON.parse(httpRequest.responseText);
				myFunction(myArr);
			}
					
		}


		function myFunction(myArr){
			var arr = $.makeArray(myArr.def);
			
			for(var key in arr){
				for(var i=0; i<arr[key].tr.length; i++){
					console.log("arr " + arr[key].tr[i].text);
					wordsArray.push(arr[key].tr[i].text);
				}
			}
		
			console.log("WordsArray: " + wordsArray);
			
			var list = "";
			
			$("#wordList li").empty();
		
			//get json values to populate list
			//i=key val=value
			$.each(wordsArray, function(i, val){
				list += "<li id=" + i + ">" + val + "</li>";
				console.log("list " + list);
			})
		
			$('#wordList').html(list);
		}


		//get word clicked
		oldWord = $(this).text();
		spanToChange = $(this);

				
		//position popup
		var x = $(this).offset().left;
		var y = $(this).offset().top + 20;
		$('.popup').css({top: y, left: x});

		//make popup visible
		$('.popup').css("visibility", "visible");
	})


	//individual word highlight
	$('[id^="word-"]').hover(function(){
		$(this).toggleClass("highlight");
	})

	//attach event handlers to dynamic element
	$('#wordList').on('click', 'li', function(){
		var wordKey = $(this).attr('id');
		newWord = wordsArray[wordKey];
		spanToChange.text(newWord + " ");
	})
			
	//remove popup
	$('span.close').click(function(){
		//$('.popup').toggleClass("show_popup");
		$('.popup').css("visibility", "hidden");
	})

});