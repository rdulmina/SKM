
<?php
/**
	This is the chief managers normal reports generation control class
	Reports Main page
*/

//echo "file called";




?>
<html>
	<head>
		<style>
			.skm-def1{
				height: 50px;
			}
		</style>
	</head>
	
<body>

<script type="text/javascript" src="chiefmgr.js"></script>

<script type="text/javascript" >
	function openTab(url){
		window.open(url, '_blank');
	}
	
	function openTabMonth(url, ele){ //url and element id
		var datm=document.getElementById(ele).value;
		var datmsplit=datm.split('-');
		var phpM = datmsplit[1]; // month
		var phpY = datmsplit[0]; // year
		
		url=url+"?yr="+phpY+"&mnth="+phpM;
		//alert(url);
		
		window.open(url, '_blank');
	}
	
	function viewMonthReport(url, ele){ //url and element id
		var datm=document.getElementById(ele).value;
		var datmsplit=datm.split('-');
		var phpM = datmsplit[1]; // month
		var phpY = datmsplit[0]; // year
		
		url=url+"?yr="+phpY+"&mnth="+phpM;
		//alert(url);
		document.getElementsByName('frm1')[0].src = url;
		//return url;
		//window.open(url, '_blank');
	}
</script>

<div class="skm-def1">
</div>

<!--current stock status report =  report2.php -->
<div class="skm-def1">
	<a href="report2.php" target="frm1"><input type="button" value="view Current stock status report"  class="btn btn-sm btn-info"> </a>
	<input type="button" value="print Current stock status report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports2.php')"/> 	<br/>
</div>
	
<!-- month sales quantity report = report3.php-->
<div class="skm-def1">
	<input type="month" name="months3" id="months3" onchange="checkCur(this.id)"/>
	
	<input type="button" onclick="viewMonthReport('report3.php','months3')" id="months3btn" value="view Monthly sales quantity"  class="btn btn-sm btn-info"  disabled /> 
	<input type="button" id="months3btn2" value="print Monthly sales quantity"  class="btn btn-sm btn-info" onclick="openTabMonth('../../report/reports3.php','months3')" disabled  /> 	<br/>
</div>

<div class="skm-def1">	
<!--month sales report = report4.php -->
	<input type="month" name="months2" id="months4" onchange="checkCur(this.id)"/>
	
	<input type="button" id="months4btn" onclick="viewMonthReport('report4.php','months4')" value="view Monthly sales report"  class="btn btn-sm btn-info"  disabled  /> 
	<input type="button" id="months4btn2" value="print Monthly sales report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports4.php')" disabled   /> 	<br/>
</div>

	
<div class="skm-def1">
	<input type="button" name="" value="Monthly stock status report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports2.php')" /> 	<br/>
</div>

<div class="skm-def1">
	<input type="button" name="" value="Monthly stock status report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports2.php')" /> 	<br/>
</div>

<div class="skm-def1">
	<input type="button" name="" value="Monthly stock status report"  class="btn btn-sm btn-info" onclick="openTab('../../report/reports2.php')" /> 	<br/>
</div>

<iframe src="" name="frm1" id="frm1" width=800 height=500 style="" >
</iframe>

</body>
</html>



