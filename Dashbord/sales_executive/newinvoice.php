<!DOCTYPE html>
<html>
<!-- confirm Modal -->
  <div class="modal fade modal-warning" id="confirmModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Current invoice is not complete</h4>
        </div>
        <div class="modal-body">
          
			<h4>Are you sure you want to select another order?</h4>
        </div>
        <div class="modal-footer">
          <button  class="btn btn-sm btn-default" data-dismiss="modal" style="width: 70px;">No</button>
          <button  class="btn btn-default pull-left btn-sm" data-dismiss="modal" style="width: 70px;" onClick="selectorder();">Yes</button>
        </div>
      </div>
    </div>
  </div>
  
<head>
   <?php require_once('../../php/dbcon.php');
   include('../../assets/noinvoiceitem.php');
 
	?>
   
    <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!--toggal button-->
  <link rel="stylesheet" href="../../assets/bootstrap-toggle-master/css/bootstrap-toggle.min.css">
  <link rel="stylesheet" href="../../css/datepicker3.css">
  <?php include '../../assets/success.php'?> 
  <link href="../../css/aos.css" rel="stylesheet">
  <script src="../../js/plugins.js"></script>
</head>
<body>
    <!-- Content Header (Page header) -->
   <section class="content-header">
   <h1>New Invoice</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa"></i> Invoice</a></li>
        <li class="active"><a href="#"><i class="fa"></i> New Invoice</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="container">
    	<div class="box">
      	</div>
      		<div class="filters col-md-11"  data-aos="flip-down">
			<strong ><h4><b>Select order to invoice</b></h4></strong></br>
      	     	<!--selecting a buyer row-->
      	<div class="row margin col-md-6" >
      		<strong >Dealer /Customer Name </strong>  	
      	
		 <div  class="col-xs-7 col-md-7 pull-right" style="padding-right: 30px;">
 	<select class="form-control" id="shopname" >
        <option value="" >Select</option>
        
       <?php
	$query="select shop_name from dealer";
	$result=mysqli_query($conn,$query);
		while($row=mysqli_fetch_array($result)){
		echo " <option value=\"".$row['shop_name']."\" >".$row['shop_name']."</option>";
	}
	$query="select company_name from customer";
	$result=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($result)){
		echo " <option value=\"".$row['company_name']."\" >".$row['company_name']."</option>";
	}
	
	?>
      		 </select>
		 </div><br><br><br>
	
	  
		 <!-- by clicking on this button orders will show accroding to filters-->
		 <button class="col-xs-6 col-md-3 btn btn-primary" id="searchord" type="button"><i class="fa fa-search" aria-hidden="true"></i>
 			Search</button>
		 </div>

<!--picking a date range picker,we can choos to date of from date or both at once-->
		 <div class="row margin pull-right col-md-5">
		 <div class="col-sm-2 col-md-4">
      		<strong>From Date</strong>
      	 </div>
      	<div class="col-sm-2 col-md-7">
		 	<div class="form-group">
				<div class="input-group date " >
					 <div class="input-group-addon">
					   <i class="fa fa-calendar"></i>
					 </div>
					   <input type="text" class="form-control pull-right datepicker" id="fromdate"  placeholder="MM/DD/YYYY" >
				</div>
			</div>
		 </div>
		 <div class="col-sm-2 col-md-4">
      		<strong>To Date</strong>
      	</div>
      	<div class="col-sm-2 col-md-7">
		 	<div class="form-group">
				<div class="input-group date ">
					 <div class="input-group-addon">
					   <i class="fa fa-calendar"></i>
					 </div>
					   <input type="text" class="form-control pull-right datepicker" id="todate"  placeholder="MM/DD/YYYY" >
				</div>
			</div>
		 	</div>	 	 
		 </div>

		  </div>
	  	</br>
  <!-- found order details are shown in this table-->	  
		 <div class="row" style="margin-top: 250px;" data-aos="flip-down">
			  <div  class="col-xs-12 col-md-10" style="margin-left: 72px">
				  <div class="box" >
					<div class="box-header">
					  <h3 class="box-title">Orders Found</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body style="overflow-x:auto;"">
						<table class=" table col-md-10 table-bordered table-hover table-responsive" id="foundorders" >
							<thead>
								<tr>
								  <th>SOrdNo</th>
								  <th>Dealer/Customer</th>
								  <th>Date</th>
								  <th>Total Amount(Rs.)</th>

								</tr>
							</thead>
							<tbody>

							<?php //loading all incompleted orders to new invoice interface
								$query="SELECT * FROM sales_order where status='incomplete';";
								$result=mysqli_query($conn,$query);
								while($row=mysqli_fetch_array($result)){
									//selecting the dealer or customer or guest name from the relevent tables
									if($row['dealer_d_id']==null && $row['regular_customer_r_id']==null){

										$dcname=$row['guest_name'];
									}
									else if($row['dealer_d_id']==null){
										$query2="SELECT * FROM customer WHERE r_id='".$row['regular_customer_r_id']."';";
										$result2=mysqli_query($conn,$query2);
										$row2=mysqli_fetch_array($result2);
										$dcname=$row2['company_name'];
									}
									else{
										$query2="SELECT * FROM dealer WHERE d_id='".$row['dealer_d_id']."';";
										$result2=mysqli_query($conn,$query2);
										$row2=mysqli_fetch_array($result2);
										$dcname=$row2['shop_name'];
									}
									//appending the row to incompleted orders found table
									echo("<tr><td>".$row['sord_no']."</td><td>$dcname</td><td>".$row['date']."</td><td>".$row['total_amount']."</td><td><button class=\"btn btn-primary viewitems\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Invoice this order\">Select Order</button></td></tr>");
								}

							?>

							 </tbody>               
						  </table>
					 </div>
			   <!-- /.box-body -->
				  </div>
			  <!-- /.box -->
		  </div>
	</div>
						 
	  </br>
  <!-- when clicking on a row of found orders table the items of the selected order will be showing on this table -->	  
<div class="row">
       
    <div  class="col-md-8 pull-left" style="margin-left: 72px">
        <div class="box" >
            <div class="box-header">
              <h3 class="box-title">Order Items</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
				  <table id="orderitems2" class=" table table-bordered table-hover table-responsive">
					<thead>
						<tr>
							 <th><input type=checkbox id="addall" data-toggle="tooltip" data-placement="top" title="Select all"></th>
							  <th>Brand</th>
							  <th>Country</th>
							  <th>Tire Size</th>
							  <th>Unit Price(Rs.)</th>
							  <th>Quantity</th>
							  <th>Total Amount</th>
							  <th>Status</th>
						</tr>
					</thead>
					<tbody id="orderitembody">
					<!-- this body will be loaded whith order items when order is selected-->
					</tbody>
				 </table>
            </div>
            <!-- /.box-body -->
         </div>
          <!-- /.box -->
	 </div>
	 <div class=" col-xs-12 col-md-2">
			
			 <div class=" col-md-12" style="margin-top: 17px;">
			 	<button type="button" class="btn btn-md btn-sm btn-success" id="additems" onClick="additemstoinv();" style="width: 150px;" data-toggle="tooltip" data-placement="top" title="Add to invoce">Add Selected Items</button>
			 </div>
			 </br></br>

	 </div>
	  
	  </section>
  <!-- /.content-wrapper -->

			 
</div>
	  </br>
	  <!-- invoice header section -->
	  <div class="col-md-11" style="background-color:#e2e2e2; margin-left: 25px;">
		<div class="row"><br>
		  <div class="col-md-12">
			   <label class="col-md-2 col-md-offset-1" >Sales Order No</label><input id="sordnolable" class="col-md-2" disabled>
			   <label class="col-md-2 col-md-offset-1" >Order Date</label><input id="orddatelable" class="col-md-2" disabled><br><br>
			   <label class="col-md-2 col-md-offset-1" >Customer/Dealer</label><input id="dcnamelable"  class="col-md-2" disabled>
			   <label class="col-md-2  col-md-offset-1" >Invoice Date</label><input id="invoicedatelable" class="col-md-2" disabled><br><br>
			   <label class="col-md-2 col-md-offset-1" >Invoice No</label><input id="invoicenolable" class="col-md-2" disabled>
			   <label class="col-md-2 col-md-offset-1" >Payment Method</label>
			   <select id="pmmethod" class="col-md-2 selectpicker">
					<option value="paid">On cash</option>
					<option value="notpaid">Credit</option>
			   </select>
		   </div>
		   <br><br><br><br><br><br>
		   <div  class="col-xs-12 col-md-11 pull-left" style=" margin-left: 32px;">

			  <div class="box" >
				<div class="box-header">
				  <h3 class="box-title">Invoice Items</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body" style="overflow-x:auto;">
				  <table id="invoiceitems" class="table-bordered table table-hover" >
					<thead>
					<tr>
						 <th><input type="checkbox" id="removeall" data-toggle="tooltip" data-placement="top" title="Select all"></th>
						  <th>Brand</th>
						  <th>Country</th>
						  <th>Tire Size</th>
						  <th>Unit Price(Rs.)</th>
						  <th>Quantity</th>
						  <th>Total Amount</th>
						  <th>Status</th>
						  <th>Discount</th>
						  <th>Discounted Price</th>
					</tr>
					</thead>

					<tbody id="invoiceitembody"><!-- invoice body will be loaded when we add items to invoice from the selected order-->

					</tbody>


				  </table>
				</div>
				<div class="box-footer"><!--invoice footer containing discont ,net amoutnt etc-->
					<div class="col-md-8 pull-right">
						<div class="row">
							<div class="col-md-3 pull-right">
								<label class="pricelabel" id="subtotal"></label>
							</div>
							<div class="col-md-3 pull-right">
								<strong>Sub Total</strong>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 pull-right">
							<label class="pricelabel " id="dis"></label>
							</div>
							<div class="col-md-3 pull-right">
								<strong>Discount</strong>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 pull-right">
								<label class="pricelabel" id="net"></label>
							</div>
							<div class="col-md-3 pull-right">
								<strong>Net Amount</strong>
							</div>
						</div>

						<div class="pull-right" ><!--invoice action buttons-->
							<button class="btn btn-primary" id="printinvoice">Print Invoice</button>
							<button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Remove selected items from invoice" id="removeselected">Remove Selected</button>
							<button class="btn btn-danger" id="resetinvoice">Reset Invoice</button>
						</div>
					</div>
					<div class="col-md-4"><!--invoice note area-->
						<textarea cols="60" rows="7" id="invoicenote"></textarea>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
		  </div>
	  	</div>
	  </div>
		
	  </section>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
	</div>
</body>
<script src="../../assets/bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>
<script src="../../js/formcontrol.js?8"></script> 
<script src="../../js/bootstrap-datepicker.js"></script>
<script>
	//initializing gloabal variables
	var subtot=0;
	var netamount=0;
	var prevdiscount=0;
	var gsno=0;
	var gdcname="";
	var gorderdate="";
$(function () {
    //Date picker
    $('.datepicker').datepicker({
      autoclose: true
    });
  });
$('.viewitems').click(function(){
	//getting the sales order number
	gsno=this.parentElement.parentElement.getElementsByTagName('td')[0].innerHTML;
	//getting the sales order date
	gorderdate=this.parentElement.parentElement.getElementsByTagName('td')[2].innerHTML;
	//getting the sales order customer or dealer or guest name
	gdcname=this.parentElement.parentElement.getElementsByTagName('td')[1].innerHTML;
	var numrows=document.getElementById('invoiceitems').getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;
	if(numrows!=0){//check atleast one order item is added to the invoice when selecting a new order
		//if it is true that means current porcess is not complete,then get the confimation from the user
	$("#confirmModal").modal('show');
	}
	else{//if fales just select the order
		selectorder();
	}
	
});
function selectorder(){//this function loads the invoice header and the order items to order items table
	$('#sordnolable').val(gsno);
	$('#orddatelable').val(gorderdate);
	$('#dcnamelable').val(gdcname);
	$("#invoiceitembody tr").remove();
	$(".removable").remove();
	subtot=0;
	netamount=0;
	prevdiscount=0;
	update();
	$.ajax({// get the data from the database
		type:'post',
		url:"model/loadorderitemtoinvoice.php",
		data:{sno:gsno},
		success:function(data){//append the new rows
			$('#orderitembody').append(data);
		}
	});	
		
	}

function update(){//update invoice footer
		
		$('#subtotal').html(subtot);
		$('#net').html(netamount);
		$('#dis').html(subtot-netamount);
}
function additemstoinv(){//this will run when click on add items to invoice
		
		var rows = document.getElementById('orderitems2').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
		
		for(var i=0;i<rows.length;i++){
			//check if item is already in the invoice or the item is not supplirble at this movement
			if(rows[i].firstChild.firstChild.checked==true && rows[i].firstChild.firstChild.disabled==false){
				// updating the global variables
				subtot+=parseInt(rows[i].childNodes[6].innerHTML);
				netamount+=parseInt(rows[i].childNodes[6].innerHTML);
				//changing the background colour of the order item when it is added to invoice
				rows[i].classList.add("bg-success");
				//load the order item to invoice item table
				id=rows[i].getAttribute('id');
				$('#invoiceitembody').append("<tr id=\""+id+"\">"+rows[i].innerHTML+"<td><select onChange=\"a(this);\" style=\"width:100%;\"><option value=\"0\">0%</option><option value=\"5\">5%</option><option value=\"10\">10%</option><option value=\"15\">15%</option><option value=\"20\">20%</option></td><td>"+rows[i].childNodes[6].innerHTML+"</td></tr>");
				update();
				//disabling the checkbox of the added item in the order items table
				rows[i].firstChild.firstChild.disabled=true;
				//check if the order comming as the confirmation of a quotation
				if(rows[i].getAttribute('name')!=""){
					//if it is then load the discount to order item and disable the change discount selection
					var discount=rows[i].getAttribute('name').trim();
					var discountelement=document.getElementById('invoiceitembody').lastChild.getElementsByTagName('td')[8].firstChild;
					discountelement.value=discount;
					discountelement.disabled=true;
			
					
				}
			}
		}
		
	}
	//updating the discount and net amount
function a(element){
		//get the priviously given discount by substracting discounted price from total amount
		prevdiscount=(parseInt(element.parentElement.parentElement.childNodes[6].innerHTML))-(parseInt(element.parentElement.parentElement.childNodes[9].innerHTML));
		//setting the new discounted price
		var discountedprice=(parseInt(element.parentElement.parentElement.childNodes[6].innerHTML))*((100-(element.value))/100);
		element.parentElement.parentElement.childNodes[9].innerHTML=discountedprice;
		//substract the new discount from the net amount
		netamount-=(parseInt(element.parentElement.parentElement.childNodes[6].innerHTML))-(parseInt(element.parentElement.parentElement.childNodes[9].innerHTML));
		//add the privious discount to the net amount
		netamount+=prevdiscount;
		//update the data
		update();
	
}
$('#invoicenolable').val(<?php
	//load the new invoice number to invoice header
			$var=0;																
		   $query="SELECT MAX(invoice_no) AS invoiceno FROM invoice";
		   $result=mysqli_query($conn,$query);
			if(!$result){
				 echo($var);
			}
			else{															
		   $obj=mysqli_fetch_object($result);
		   $invoiceno=$obj->invoiceno;
			$var=$invoiceno+1;
		   echo($var);}
			
		   ?>);
	
	
$('#printinvoice').click(function(){
		var rowarray = document.getElementById('invoiceitems').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
		var rows=rowarray.length;
		var invoiceno=document.getElementById('invoicenolable').value;
		var netamount=document.getElementById('net').innerHTML;
		var discount=document.getElementById('dis').innerHTML;
		var invoicenote=document.getElementById('invoicenote').value;
		var status=document.getElementById('pmmethod').value;
		var sordno=document.getElementById('sordnolable').value;
		var subtotal=document.getElementById('subtotal').innerHTML;
		var date=document.getElementById('invoicedatelable').value;
		
		if(rows==0){//check atleast one order item is added to the invoice
			
			$('#modal-noowner').modal('show');
		}
		else{
			$.ajax({//record the invoice header
				type:"post",
				url:"model/invoiceheader.php",
				data:({invoiceno:invoiceno,netamount:netamount,discount:discount,invoicenote:invoicenote,status:status,sordno:sordno,subtotal:subtotal,date:date}),
				success:function(data){
					
				}
			});
			//record the invoice item
			for(var i=0;i<rows;i++){
				brand=rowarray[i].getElementsByTagName('td')[1].innerHTML;
				country=rowarray[i].getElementsByTagName('td')[2].innerHTML;
				tiresize=rowarray[i].getElementsByTagName('td')[3].innerHTML;
				discount=rowarray[i].getElementsByTagName('td')[8].firstChild.value;
				qty=rowarray[i].getElementsByTagName('td')[5].innerHTML;
			$.ajax({
				type:"post",
				url:"model/invoiceitem.php",
				data:({brand:brand,country:country,tiresize:tiresize,discount:discount,invoiceno:invoiceno,sordno:sordno,qty:qty}),
				success:function(data){
					
					 document.getElementById('message1').innerHTML="Invoice success";
					   $('#modal-success').modal('show');
				}
			});
			}
			//reset the invoice 
			$('#invoicenolable').val(parseInt($('#invoicenolable').val())+1);
			$('#sordnolable').val("");
			$('#orddatelable').val("");
			$('#dcnamelable').val("");
			$("#invoiceitembody tr").remove();
			$(".removable").remove();
			
		}
		
		
	});
function removeallfrominvoice(){
		$('#invoiceitems tbody tr').remove();
	}
$('#removeselected').click(function(){
		var rowarray = document.getElementById('invoiceitems').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
		var rows=rowarray.length;
		
		for(var i=0;i<rows;i++){
			var row=document.getElementById('invoiceitems').getElementsByTagName('tbody')[0].getElementsByTagName('tr')[i];
			if(row.getElementsByTagName('td')[0].firstChild.checked){//getting the selected rows
				//updating the invoice footer
				subtot=subtot-parseInt(row.getElementsByTagName('td')[6].innerHTML);
				netamount=netamount-parseInt(row.getElementsByTagName('td')[9].innerHTML);
				row.remove();//removing the current row
				i--;
				rows--;
				update();
				var id=row.getAttribute('id');
				$("#"+id).removeClass("bg-success");
				$("#"+id+" td input").attr("disabled", false);
			}
			
		}
		
	});
	$('#resetinvoice').click(function(){
		$('#content-wrapper').load('newinvoice.php');
	})
	$('#addall').change(function(){
		if(this.checked){
			$('#orderitembody tr td input').prop("checked", true);
		}
		else{
			$('#orderitembody tr td input').prop("checked", false);
		}
	});
	$('#removeall').change(function(){
		if(this.checked){
			$('#invoiceitembody tr td input').prop("checked", true);
		}
		else{
			$('#invoiceitembody tr td input').prop("checked", false);
		}
	});
	
		  n =  new Date();
		  y = n.getFullYear();
		  m = n.getMonth() + 1;
		  d = n.getDate();
		  document.getElementById("invoicedatelable").value = y + "/" + m + "/" + d;
		</script>
<script>
    AOS.init();
 </script>	
</html>
