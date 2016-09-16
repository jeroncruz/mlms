
// Global Variables

	var intLotAvailable = 0;
	var intLotReserved = 0;
	var intLotOwned = 0;
	var jsonLot;
	var intAshAvailable = 0;
	var intAshReserved = 0;
	var intAshOwned = 0;
	var jsonAsh;
	var jsonBill = [];
	var intAshID;
	var typeAvail;
	var jsonDependency;

// Functions for Lot Avail Unit Tab

// Add Section to Dropdown Section
	
	$.get('getData2.php?fnName=getSection', function(data) {
        $.each(data, function(key, val) {
        	$('#selectSection').append("<option value=" + val.intSectionID + ">" + val.strSectionName + "</option>");
        });
    });

// Add Block to Dropdown Block

	function changeSection(intSectionID) {
		intLotAvailable = 0;
		intLotReserved = 0;
		intLotOwned = 0;
		$('#lotMap').html('');
		$('.circle').html('');
		$('#selectBlock').html('<option selected disabled>Choose Block</option>');
		$.get('getData2.php?fnName=getBlock&intSectionID='+intSectionID, function(data) {
	        $.each(data, function(key, val) {
	        	$('#selectBlock').append("<option value=" + val.intBlockID + ">" + val.strBlockName + "</option>");
	        });
	    });
	}

// Display Lot

	function changeBlock(intBlockID) {
		intLotAvailable = 0;
		intLotReserved = 0;
		intLotOwned = 0;
		$('#mapLot').html('');
		$.get('getData2.php?fnName=getLot&intBlockID='+intBlockID, function(data) {
			jsonLot = data;
	        $.each(data, function(key, val) {
	        	switch (val.intLotStatus) {
                	case '0': lotStatus = "available"; intLotAvailable++; break;
                	case '1': lotStatus = "reserved"; intLotReserved++; break;
                	case '2': lotStatus = "owned"; intLotOwned++; break;
                   	default: break;
                }
	        	$('#mapLot').append("<div class='lot " + lotStatus + "' key=" + key + " onclick='actionLot("+ key +")' id='lot" + key +"'>" + val.strLotName + "</div>");
	        });
	        $('#legendLotAvailable').html(intLotAvailable);
	        $('#legendLotReserved').html(intLotReserved);
	        $('#legendLotOwned').html(intLotOwned);
	    });
	}

// Lot Unit Action Listener
	
	function actionLot(key) {
		$('#inputSectionName').val(jsonLot[key].strSectionName);
		$('#inputBlockName').val(jsonLot[key].strBlockName);
		$('#inputLotType').val(jsonLot[key].strTypeName);
		$('#inputUnitName').val(jsonLot[key].strLotName);
		$('#inputLotPrice').val(jsonLot[key].dblSellingPrice.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
		switch(jsonLot[key].intLotStatus) {
			case '0': $('#inputLotStatus').val("Available"); break;
			case '1': $('#inputLotStatus').val('Reserved'); break;
			case '2': $('#inputLotStatus').val('Owned'); break;
		}
		$('.btnAction').hide();
		switch(jsonLot[key].intPurchase) {
			case '0': $('#addLotUnit').show(); $('#addLotUnit').attr('key',key); break;
			case '1': $('#removeLotUnit').show(); $('#removeLotUnit').attr('key',key); break;
		}
		$('#lotDetails').modal('show');
	}

// Add Lot Unit Action Listener

	function actionAddLot(objLot) {
		keyValue = $(objLot).attr('key');
		lotID = "#lot" + keyValue;
		$(lotID).addClass('disabled');
		jsonLot[keyValue].intPurchase = '1';
		jsonBill.push({Type:"Lot",Key:keyValue});
		$('#lotDetails').modal('hide');
		updateBill();
	}

// Add Lot Unit Action Listener

	function actionRemoveLot(objLot) {
		keyValue = $(objLot).attr('key');
		lotID = "#lot" + keyValue;
		jsonLot[keyValue].intPurchase = '0';
		$(lotID).removeClass('disabled');
		$.each(jsonBill, function(key, val) {
			if(val.Type == "Lot" && val.Key == keyValue)
				jsonBill.splice(key, 1);
        });
  		$('#lotDetails').modal('hide');
  		updateBill();
	}

// Functions for Ashcrypt

// Add Ashcrypt to Dropdown Ashcrypt
	
	$.get('getData2.php?fnName=getAsh', function(data) {
        $.each(data, function(key, val) {
        	$('#selectAsh').append("<option value=" + val.intAshID + ">" + val.strAshName + "</option>");
        });
    });

// Resize Ash Map

	$('.containerLevelMap').width($('.ash').width());


// Get JSON of All Ashcrypt Unit

	function getAshUnits() {
		$.get("getData2.php?fnName=getAshUnit", function(data){
			jsonAsh = data;
			console.log(jsonAsh);
		});
	}

// Display Ashcrypt Unit

	function changeAsh(intAshID) {
		this.intAshID = intAshID;
		intAshAvailable = 0;
		intAshReserved = 0;
		intAshOwned = 0;
		$('#mapAsh').html('');	
		getAshUnits();
		$.get('getData2.php?fnName=getAshLevel&intAshID='+intAshID, function(data) {
	        $.each(data, function(key, val) {
	         	$('#mapAsh').append("<div class='ash' key=" + key + " id='lvl" + val.intLevelAshID + "'></div>");
	         	strLevelID = "#lvl"+val.intLevelAshID;
	         	$(strLevelID).append("<div class='levelDetails'>Level " + val.strLevelName + "</div>");
	         	$.each(jsonAsh, function(key2, val2){
		         	if(intAshID == val2.intAshID && val.intLevelAshID == val2.intLevelAshID) {
						switch (val2.intUnitStatus) {
				        	case '0': unitStatus = "available"; intAshAvailable++; break;
				        	case '1': unitStatus = "reserved"; intAshReserved++; break;
				        	case '2': unitStatus = "owned"; intAshOwned++; break;
				            default: break;
				        }
				        strPurchase = "";
				        if(val2.intPurchase == '1')
				        	strPurchase = "disabled"
				        $(strLevelID).append("<div class='ashcrypt "+unitStatus + strPurchase +"' key=" + key2 + " onclick='actionAsh("+ key2 +")' id='ash" + key2 + "' >" + val2.strUnitName +"</div>");
					}
				 });
	         	// Remove level if it does not contain an ashcrypt
				if($(strLevelID).has(".ashcrypt").length == 0) {
					$(strLevelID).remove();
				}
	        });
	       $('.ash').width($('#mapAsh')[0].scrollWidth-20);
	       $('#legendAshAvailable').html(intAshAvailable);
	       $('#legendAshReserved').html(intAshReserved);
	       $('#legendAshOwned').html(intAshOwned);
	    });
	}

// Action Listener for Ashcrypt Unit

	function actionAsh(key) {
		$('#inputAshBlock').val(jsonAsh[key].strAshName);
		$('#inputAshLevel').val(jsonAsh[key].strLevelName);
		$('#inputAshUnit').val(jsonAsh[key].strUnitName);
		$('#inputAshPrice').val(jsonAsh[key].dblSellingPrice.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
		switch(jsonAsh[key].intUnitStatus) {
			case '0': $('#inputAshStatus').val("Available"); break;
			case '1': $('#inputAshStatus').val('Reserved'); break;
			case '2': $('#inputAshStatus').val('Owned'); break;
		}
		$('.btnAction').hide();
		switch(jsonAsh[key].intPurchase) {
			case '0': $('#addAshUnit').show(); $('#addAshUnit').attr('key',key); break;
			case '1': $('#removeAshUnit').show(); $('#removeAshUnit').attr('key',key); break;
		}
		$('#ashDetails').modal('show');
	}

// Add Lot Unit Action Listener

	function actionAddAsh(objAsh) {
		keyValue = $(objAsh).attr('key');
		ashID = "#ash" + keyValue;
		$(ashID).addClass('disabled');
		jsonAsh[keyValue].intPurchase = '1';
		jsonBill.push({"Type":"Ash","Key":keyValue});
		$('#ashDetails').modal('hide');
		updateBill();
	}

// Add Lot Unit Action Listener

	function actionRemoveAsh(objAsh) {
		keyValue = $(objAsh).attr('key');
		jsonAsh[keyValue].intPurchase = '0';
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

	function updateBill() {	
		$('#tableBody').html('');
		console.log(jsonBill);
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

	function addBill(key) {
		unitKey = jsonBill[key].Key;
		price = "";
		switch(jsonBill[key].Type) {
			case "Lot": price=jsonLot[unitKey].dblSellingPrice; break;
			case "Ash": price=jsonAsh[unitKey].dblSellingPrice; break;
		}
		discounted = "" + price*(jsonDependency[0].discountSpotcash*.01);
		downpayment = "" + price*(jsonDependency[0].downpayment*.01);
		$('#tableBody').append("<tr class=''>"
                                +	"<td class=''>Unit No."+ key +"</td>"
                                +   "<td class=''><input class='btn btnView' type='button' value='View' onclick='viewUnit("+ key +")'/><i class='success fa fa-long-arrow-up'></i></td>"
                                +	"<td class='ReserveAtNeed'>"
                                +		"<select class='form-control' id='ytp"+ key +"'>"
                                +		"</select>"
                                +	"</td>"
                                +	"<td class=''>"+ price.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"</td>"
                                +	"<td class='a-right a-right Spotcash'>"+ discounted.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"</td>"
                                +	"<td class='ReserveAtNeed'></td>"
                                +	"<td class='ReserveAtNeed'>"+ downpayment.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"</td>"
                                +	"<td class=' last'><a href='#'><input type='button' class='btn btn-danger' value='Remove' onclick='removeBill("+ key +")'/></a>"
                                +	"</td>"
                                +	"</tr>");
		changeAvail(typeAvail);
	}

	function viewUnit(key){
		switch(jsonBill[key].Type) {
			case "Ash": actionAsh(jsonBill[key].Key); break;
			case "Lot": actionLot(jsonBill[key].Key); break;
		}
		$('#removeAshUnit').hide();
		$('#removeLotUnit').hide();
	}

	function removeBill(key) {
        keyAsh = jsonBill[key].Key;
        ashID = "#ash" + keyAsh;
        $(ashID).removeClass('disabled');
		jsonBill.splice(key, 1);
        updateBill();
	}

	function changeAvail(val) {
		typeAvail = val;
		switch(val) {
			case 'spotcash': $('.Spotcash').show(); $('.ReserveAtNeed').hide(); break;
			case 'reserve': $('.Spotcash').hide(); $('.ReserveAtNeed').show(); getInterest(1); break;
			case 'atneed': $('.Spotcash').hide(); $('.ReserveAtNeed').show(); getInterest(0); break;
			default: $('.Spotcash').hide(); $('.ReserveAtNeed').hide(); break;
		}
	}

	function getInterest(intAtNeed) {
		$.each(jsonBill, function(key, val){
			switch(val.Type) {
				case "Ash" : {
					intLevelAshID = jsonAsh[val.Key].intLevelAshID;
					ytpID = "#ytp" + key;
					$.get('getData2.php?fnName=getInterest&intLevelAshID='+intLevelAshID+'&intAtNeed='+intAtNeed, function(data) {
					
						 console.log(data[0]);
						$.each(data, function(key2, val2){							console.log(val2.intYear);

							$(ytpID).append("<option percent="+val2.dblPercent+">"+val2.intYear+"</option>");
							console.log(val2.intYear);
						});
					});
				} break;
			}
		});
	}

	$.get('getData2.php?fnName=getDependency', function(data) {
        $.each(data, function(key, val) {
        	jsonDependency = data;
        });
    });