// Global Variables
var intLotAvailable = 0; // no. of available lot units
var intLotReserved = 0; // no. of reserved lot units
var intLotOwned = 0; // no. of owned lot units
var intLotAtneed = 0; // no. of atneed lot units
var intAshAvailable = 0; // no. of available ash units
var intAshReserved = 0; // no. of reserved ash units
var intAshOwned = 0; // no. of owned ash units
var intAshAtneed = 0; // no. of atneed ash units
var jsonBill = []; // bill units

// On document load
addSection();
addAsh();
loadCustomer();

// Functions

// Add sections to dropdown
function addSection() {
	$.each(jsonSection, function(key, val) {
    	$('#selectSection').append("<option value=" + val.intSectionID + " key=" + key +">" + val.strSectionName + "</option>");
    });
}

// Add blocks to dropdown
function addBlock(intSectionID) {
	$.each(jsonBlock, function(key, val) {
		if(val.intSectionID == intSectionID)
    		$('#selectBlock').append("<option value=" + val.intBlockID + " key=" + key +">" + val.strBlockName + "</option>");
    });
}

// Add lots to Map
function addLot(intBlockID) {
	$.each(jsonLot, function(key, val) {
		if(val.intBlockID == intBlockID) {
			switch (val.intLotStatus) {
            	case 0: lotStatus = "available"; intLotAvailable++; break;
            	case 1: lotStatus = "reserved"; intLotReserved++; break;
            	case 2: lotStatus = "owned"; intLotOwned++; break;
            	case 3: lotStatus = "atNeed"; intAtNeed++; break;
               	default: break;
            }
            strPurchase = "";
		    if(val.intPurchase == 1)
		    	strPurchase = "disabled"
        	$('#mapLot').append("<div class='lot " + lotStatus + strPurchase + "' key=" + key + " onclick='actionLot("+ key +")' id='lot" + key +"'>" + val.strLotName + "</div>");
		}
    });
}

// Add ashcrypts to dropdown
function addAsh() {
	$.each(jsonAsh, function(key, val) {
    	$('#selectAsh').append("<option value=" + val.intAshID + ">" + val.strAshName + "</option>");
    });
    $('.containerLevelMap').width($('.ash').width());
}

// Add ash levels to Map
function addAshLevel(intAshID) {
	$.each(jsonAshLevel, function(key, val) {
		if(val.intAshID == intAshID) {
	        $('#mapAsh').append("<div class='ash' key=" + key + " id='lvl" + val.intLevelAshID + "'></div>");
	        strLevelID = "#lvl"+val.intLevelAshID;
	        $(strLevelID).append("<div class='levelDetails'>Level " + val.strLevelName + "</div>");
	        addAshUnit(val.intLevelAshID);
	        // Remove level if it does not contain an ashcrypt
			if($(strLevelID).has(".ashcrypt").length == 0) {
				$(strLevelID).remove();
			}
    	}
    });
}

// Add ash units to level
function addAshUnit(intLevelAshID) {
	$.each(jsonAshUnit, function(key, val) {
		if(val.intLevelAshID == intLevelAshID) {
			switch (val.intUnitStatus) {
		    	case 0: unitStatus = "available"; intAshAvailable++; break;
		    	case 1: unitStatus = "reserved"; intAshReserved++; break;
		    	case 2: unitStatus = "owned"; intAshOwned++; break;
		    	case 3: unitStatus = "atNeed"; intAtNeed++; break;
		        default: break;
		    }
		    strPurchase = "";
		    if(val.intPurchase == 1)
		    	strPurchase = "disabled"
		    $(strLevelID).append("<div class='ashcrypt "+unitStatus + strPurchase +"' key=" + key + " onclick='actionAsh("+ key +")' id='ash" + key + "' >" + val.strUnitName +"</div>");
    	}
	});
}

// On change selectSection
function changeSection(intSectionID) {
	intLotAvailable = 0;
	intLotReserved = 0;
	intLotOwned = 0;
	$('#mapLot').html('');
	$('.circle').html('');
	$('#selectBlock').html('<option selected disabled>Choose Block</option>');
	addBlock(intSectionID);
}

// On change selectBlock
function changeBlock(intBlockID) {
	intLotAvailable = 0;
	intLotReserved = 0;
	intLotOwned = 0;
	$('#mapLot').html('');
	addLot(intBlockID);
    $('#legendLotAvailable').html(intLotAvailable);
    $('#legendLotReserved').html(intLotReserved);
    $('#legendLotOwned').html(intLotOwned);
    $('#legendLotAtNeed').html(intLotAtneed);
}

// On change selectAsh
function changeAsh(intAshID) {
	//this.intAshID = intAshID;
	intAshAvailable = 0;
	intAshReserved = 0;
	intAshOwned = 0;
	$('#mapAsh').html('');
	addAshLevel(intAshID);
	$('.ash').width($('#mapAsh')[0].scrollWidth-20);
	$('#legendAshAvailable').html(intAshAvailable);
	$('#legendAshReserved').html(intAshReserved);
	$('#legendAshOwned').html(intAshOwned);
	$('#legendAshAtNeed').html(intAshAtneed);
}

// Action Listener for Ashcrypt Unit
function actionAsh(key) {
	$('#inputAshBlock').val(jsonAshUnit[key].strAshName);
	$('#inputAshLevel').val(jsonAshUnit[key].strLevelName);
	$('#inputAshUnit').val(jsonAshUnit[key].strUnitName);
	$('#inputAshPrice').val((jsonAshUnit[key].dblSellingPrice+"").replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
	$('.btnAction').hide();
	switch(jsonAshUnit[key].intPurchase) {
		case 0: $('#addAshUnit').show(); $('#addAshUnit').attr('key',key); break;
		case 1: $('#removeAshUnit').show(); $('#removeAshUnit').attr('key',key); break;
	}
	switch(jsonAshUnit[key].intUnitStatus) {
		case 0: $('#inputAshStatus').val("Available"); break;
		case 1: $('#inputAshStatus').val("Reserved"); $('#addAshUnit').hide(); break;
		case 2: $('#inputAshStatus').val("Owned"); $('#addAshUnit').hide(); break;
		case 3: $('#inputAshStatus').val("At Need"); $('#addAshUnit').hide(); break;
	}
	$('#ashDetails').modal('show');
}

// Lot Unit Action Listener
function actionLot(key) {
	$('#inputSectionName').val(jsonLot[key].strSectionName);
	$('#inputBlockName').val(jsonLot[key].strBlockName);
	$('#inputLotType').val(jsonLot[key].strTypeName);
	$('#inputUnitName').val(jsonLot[key].strLotName);
	$('#inputLotPrice').val((jsonLot[key].dblSellingPrice+"").replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
	$('.btnAction').hide();
	switch(jsonLot[key].intPurchase) {
		case 0: $('#addLotUnit').show(); $('#addLotUnit').attr('key',key); break;
		case 1: $('#removeLotUnit').show(); $('#removeLotUnit').attr('key',key); break;
	}
	switch(jsonLot[key].intLotStatus) {
		case 0: $('#inputLotStatus').val("Available"); break;
		case 1: $('#inputLotStatus').val('Reserved'); $('#addLotUnit').hide(); break;
		case 2: $('#inputLotStatus').val('Owned'); $('#addLotUnit').hide(); break;
		case 2: $('#inputLotStatus').val('At Need'); $('#addLotUnit').hide(); break;
	}
	$('#lotDetails').modal('show');
}

// Add Lot Unit Action Listener
function actionAddLot(objLot) {
	keyValue = $(objLot).attr('key');
	lotID = "#lot" + keyValue;
	$(lotID).addClass('disabled');
	jsonLot[keyValue].intPurchase = 1;
	jsonBill.push({Type:"Lot",Key:keyValue});
	$('#lotDetails').modal('hide');
	updateBill();
}

// Add Lot Unit Action Listener
function actionAddAsh(objAsh) {
	$('#ashDetails').modal('hide');
	keyValue = $(objAsh).attr('key');
	ashID = "#ash" + keyValue;
	$(ashID).addClass('disabled');
	jsonAshUnit[keyValue].intPurchase = 1;
	jsonBill.push({"Type":"Ash","Key":keyValue});
	updateBill();
}

// Add Lot Unit Action Listener
function actionRemoveLot(objLot) {
	$('#lotDetails').modal('hide');
	keyValue = $(objLot).attr('key');
	lotID = "#lot" + keyValue;
	jsonLot[keyValue].intPurchase = '0';
	$(lotID).removeClass('disabled');
	$.each(jsonBill, function(key, val) {
		if(val.Type == "Lot" && val.Key == keyValue)
			jsonBill.splice(key, 1);
    });
   	updateBill();
}

// Add Lot Unit Action Listener
function actionRemoveAsh(objAsh) {
	keyValue = $(objAsh).attr('key');
	jsonAshUnit[keyValue].intPurchase = '0';
	ashID = "#ash" + keyValue;
	$(ashID).removeClass('disabled');
	$.each(jsonBill, function(key, val) {
		if(val.Type == "Ash" && val.Key == keyValue)
			jsonBill.splice(key, 1);
    });
	$('#ashDetails').modal('hide');
	updateBill();
}

// Bill Out Form Functions

// Updates bill
function updateBill() {	
	$('#tableBody').html('');
	if(jsonBill != ""){
		$('#btnBill').show();
		$.each(jsonBill, function(key, val){
			addBill(key);
		});
	}
	else {
		$('#btnBill').hide();
	}
}

// Add bills to table
function addBill(key) {
	unitKey = jsonBill[key].Key;
	switch(jsonBill[key].Type) {
		case "Lot": price = jsonLot[unitKey].dblSellingPrice; break;
		case "Ash": price = jsonAshUnit[unitKey].dblSellingPrice; break;
	}
	discounted = price * (jsonDependency[0].discountSpotcash*.01);
	downpayment = price * (jsonDependency[0].downpayment*.01);
	$('#tableBody').append("<tr class=''>"
                            +	"<td class=''>Unit No."+ key +"</td>"
                            +   "<td class=''><input class='btn btnView' type='button' value='View' onclick='viewUnit("+ key +")'/><i class='success fa fa-long-arrow-up'></i></td>"
                            +	"<td class='ReserveAtNeed'>"
                            +		"<select class='form-control selectYtp' id='ytp"+ key +"' onchange='changeYtp(this)'>"
                            +		"</select>"
                            +	"</td>"
                            +	"<td class='presyo' price="+ price +">"+ (price + "").replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"</td>"
                            +	"<td class='a-right a-right Spotcash'>"+ (discounted + "").replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"</td>"
                            +	"<td class='ReserveAtNeed monthly'></td>"
                            +	"<td class='ReserveAtNeed downpayment' downpayment="+ downpayment +">"+ (downpayment + "").replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"</td>"
                            +	"<td class=' last'><a href='#'><input type='button' class='btn btn-danger' value='Remove' onclick='removeBill("+ key +")'/></a>"
                            +	"</td>"
                            +	"</tr>");
	changeAvail(typeAvail);
}

// View unit of table
function viewUnit(key){
	switch(jsonBill[key].Type) {
		case "Ash": actionAsh(jsonBill[key].Key); break;
		case "Lot": actionLot(jsonBill[key].Key); break;
	}
	$('#removeAshUnit').hide();
	$('#removeLotUnit').hide();
}

// Remove a bill
function removeBill(key) {
    keyAsh = jsonBill[key].Key;
    ashID = "#ash" + keyAsh;
    $(ashID).removeClass('disabled');
	jsonBill.splice(key, 1);
    updateBill();
}

// On change availment type
function changeAvail(val) {
	typeAvail = val;
	switch(val) {
		case 'spotcash': $('.Spotcash').show(); $('.ReserveAtNeed').hide(); $('.monthly').html(""); break;
		case 'reserve': $('.Spotcash').hide(); $('.ReserveAtNeed').show(); addInterest(0); $('.monthly').html(""); break;
		case 'atneed': $('.Spotcash').hide(); $('.ReserveAtNeed').show(); addInterest(1); $('.monthly').html(""); break;
		default: $('.Spotcash, .ReserveAtNeed').hide(); break;
	}
}

function addInterest(intAtNeed) {
	$.each(jsonBill, function(key, val){
		switch(val.Type) {
			case "Ash" : {
				intLevelAshID = jsonAshUnit[val.Key].intLevelAshID;
				ytpID = "#ytp" + key;
				$(ytpID).html("<option selected disabled>Please Select</option>");
				$.each(jsonAshInterest, function(key, val) {
					if(val.intLevelAshID == intLevelAshID && val.intAtNeed == intAtNeed) {
						$(ytpID).append("<option percent="+val.dblPercent+" year="+val.intYear+" >"+val.intYear+"</option>");
					}
				});
			} break;
			case "Lot" : {
				intTypeID = jsonLot[val.Key].intTypeID;
				ytpID = "#ytp" + key;
				$(ytpID).html("<option selected disabled>Please Select</option>");
				$.each(jsonLotInterest, function(key, val) {
					if(val.intTypeID == intTypeID && val.intAtNeed == intAtNeed) {
						$(ytpID).append("<option percent="+val.dblPercent+" year="+val.intYear+" >"+val.intYear+"</option>");
					}
				});
			}; break;
		}
	});
}

function changeYtp(objYtp) {
	// MA = ((((BasePrice - Downpayment)*Interest Rate)*No of years) + BasePrice - Downpayment)) / (No.of years * 12) 
	price = parseInt($(objYtp).parent().siblings('.presyo').attr('price'));
	downpayment = parseInt($(objYtp).parent().siblings('.downpayment').attr('downpayment'));
	objOption = "#" + $(objYtp).attr('id') + " option:selected";
	year = parseInt($(objOption).attr('year'));
	percent = parseInt($(objOption).attr('percent'));
	dblMonthly = (((((price - downpayment)*percent)*year) + price - downpayment) / (year * 12)).toFixed(2);
	$(objYtp).parent().siblings('.monthly').html((""+dblMonthly).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
}

function loadCustomer() {
	$.each(jsonCustomer, function(key, val) {
    	$('#selectCustomer').append("<option customerID=" + val.intCustomerId + " value=" + key +">"+ val.strLastName + ", " + val.strFirstName + " "+ val.strMiddleName.substring(0,1) +"." + "</option>");
    });
}

function changeCustomer(customerKey) {
	if(customerKey == "default")
		formCustomerReset();
	else {
		$('#tfDate').attr("value",jsonCustomer[customerKey].datBirthday);
		$('#tfFirstName').val(jsonCustomer[customerKey].strFirstName);
		$('#tfLastName').val(jsonCustomer[customerKey].strLastName);
		$('#tfMiddleName').val(jsonCustomer[customerKey].strMiddleName);
		$('#tfAddress').val(jsonCustomer[customerKey].strAddress);
		$('#tfContactNo').val(jsonCustomer[customerKey].strContactNo);
		switch(jsonCustomer[customerKey].intGender) {
			case 0: $('#radioMale').parent().addClass("checked");$('#radioFemale').parent().removeClass("checked");
					$('#intGender').val(0); break;
			case 1: $('#radioFemale').parent().addClass("checked");$('#radioMale').parent().removeClass("checked");
					$('#intGender').val(1); break;
		}
		switch(jsonCustomer[customerKey].intCivilStatus) {
			case 0: $('#SingleID').parent().addClass("checked");$('#WidowID').parent().removeClass("checked"); $('#MarriedID').parent().removeClass("checked"); break;
			case 1: $('#MarriedID').parent().addClass("checked");$('#SingleID').parent().removeClass("checked"); $('#WidowID').parent().removeClass("checked"); break;
			case 2: $('#WidowID').parent().addClass("checked");$('#SingleID').parent().removeClass("checked"); $('#MarriedID').parent().removeClass("checked"); break;
		}
		$('#btnAddCustomer').hide();
		$('#btnUpdateCustomer').show();
	}
}

function formCustomerReset() {
	$('#formCustomer').trigger('reset');
	$('#tfDate').attr("value",0);
	$('#SingleID').parent().removeClass("checked");
	$('#WidowID').parent().removeClass("checked");
	$('#MarriedID').parent().removeClass("checked");
	$('#radioMale').parent().removeClass("checked");
	$('#radioFemale').parent().removeClass("checked"); 
	$('#btnAddCustomer').show();
	$('#btnUpdateCustomer').hide();
}

function actionAddCustomer(){
	if($('#radioFemale').is(':checked')) $("#intGender").val(1);
	else if($('#radioMale').is(':checked')) $("#intGender").val(0);
	if($('#SingleID').is(':checked')) $("#intCivilStatus").val(0);
	else if($('#MarriedID').is(':checked')) $("#intCivilStatus").val(1);
	else if($('#WidowID').is(':checked')) $("#intCivilStatus").val(2);
	form = $("#formCustomer");
	$.ajax({
	        type:"POST",
	        url:"sendData.php",
	        data:form.serialize(),
	        async:false,
	        success: function(response){
	        		alert(response);
	        		$('document').append(response);
		        	getCustomer();
		        	loadCustomer();
	        }
	});
}