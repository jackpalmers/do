<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Convert XLS to CSV</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://s3.amazonaws.com/hayageek/libs/jquery/bootstrap.min.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<link href="http://hayageek.com/docs/uploadfile.css" rel="stylesheet">
<script src="http://hayageek.com/docs/jquery.uploadfile.min.js"></script>
</head>
<body>
<div id="mulitplefileuploader">Upload</div>
<div id="status"></div>




</section>
<script>

$(document).ready(function()
{

var settings = {
	url: "upload.php",
	method: "POST",
	allowedTypes:"xls,xlsx",
	maxFileSize:100*1024,
	fileName: "myfile",
	multiple: false,
	returnType:"json",
	showDone:false,
	onSuccess:function(files,data,xhr)
	{
		if(data.error == undefined)
		{
				location.href="download.php?id="+data[0];
		}
		else
		{
			alert("Server Error");
		}
	},
	onError: function(files,status,errMsg)
	{
		$("#status").html("<font color='red'>Upload is Failed</font>");
	}
}
$("#mulitplefileuploader").uploadFile(settings);

});
</script>
</body>
