$(document).ready(function(){

	$("button[type=button]").click(function () {

		var voting = new Array();

		var vote = $(this).val();

		$("button[name="+vote+"]").addClass('disabled');

		//console.log(vote);


		voting.push(vote);

	console.log(voting);	
	});

	



});