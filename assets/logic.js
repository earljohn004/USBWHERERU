<script>
$(document).ready(function(){
	var user = [ 
		"Al Grard Ceniza",
		"Angelique Francia",
		"Carl Christian Ray Pantin",
		"Donald Verano",
		"Earl John Abaquita",
		"Janbert Jandraque",
		"Jennybelle Sillador",
		"John Ray Aligato",
		"Jurgen Lasa",
		"Kenth Remon Crisolo",
		"Klyve Bantug",
		"Regil Yana",
		"Takuya Kotsuji"
	];

	var flashDrive = [
		"San Disk number 1",
		"San Disk number 2",
		"San Disk number 3",
	];
	
	$.each(user,function(i, p){
		$('#username').append($('<option></option>').val(p).html(p));
	});

	$.each(flashDrive,function(i, p){
		$('#flashDriveNum').append($('<option></option>').val(p).html(p));
	});

    $("#myBtn").click(function(){
        $("#myModal").modal('show');
    });
	
});

	$("#registerToSite").click(function(){
		var dt = new Date();
		var selectedUser = $("#username option:selected").text();
		var selectedFD = $("#flashDriveNum option:selected").text();
		var numVar = selectedFD.charAt(16);

		if(numVar == 1){
			$.ajax({
				url:"<?php echo base_url();?>main/user_data",
				type:"POST",
				dataType:'json',
				data:{id:'1',DateTime:dt.toDateString(),BorrowerName:selectedUser},
			});
			console.log("<?php echo base_url(); ?>"+"main/user_data");
			$("#nameContainer0").html(selectedUser);
			$("#dateContainer0").html(dt.toDateString());
		}
		else if(numVar == 2){
			$.ajax({
				url:"<?php echo base_url();?>main/user_data",
				type:"POST",
				dataType:'json',
				data:{BorrowerName:selectedUser,id:'2',DateTime:dt.toDateString()},
			});
			$("#nameContainer1").html(selectedUser);
			$("#dateContainer1").html(dt.toDateString());
		}else{
			$.ajax({
				url:"<?php echo base_url();?>main/user_data",
				type:"POST",
				dataType:'json',
				data:{BorrowerName:selectedUser,id:'3',DateTime:dt.toDateString()},
			});
			$("#nameContainer2").html(selectedUser);
			$("#dateContainer2").html(dt.toDateString());
		}
		$("#myModal").modal('hide');
	});
</script>
