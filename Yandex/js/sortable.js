$(function(){
	$("#sortable").sortable({
		//stop click from triggering when item is dragged
		helper: 'clone'
	});
	$("#sortable").disableSelection();
});
// $(document).ready(function(){
// 	$("#send").click(function(){
// 		var text = $("#sortable > li").text();
// 		console.log(text);
// 	})
// })