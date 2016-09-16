// Global Variables.
var jsonLot; // lot units
var jsonAshUnit; // ash units
var jsonSection; // sections
var jsonBlock; // blocks
var jsonAsh; // ashcrypts
var jsonAshLevel; // ashcrypt levels
var jsonLotInterest; // lot type  interests
var jsonAshInterest; // ashcrypt level interests
var jsonCustomer // customers
var jsonDependency // dependencies

// On document load

getLot();
getAshUnit();
getSection();
getBlock();
getAsh();
getAshLevel();
getLotInterest();
getAshInterest();
getCustomer();
getDependency();

// Functions

function getLot() {
	$.ajax({
        type: 'GET',
        url: 'getDataBase.php?getLot',
        dataType: "json",
        async:false,
        success: function(data) {
            jsonLot = data;
        }
    });
}

function getAshUnit() {
	$.ajax({
        type: 'GET',
        url: 'getDataBase.php?getAshUnit',
        dataType: "json",
        async:false,
        success: function(data) {
            jsonAshUnit = data;
        }
    });
}

function getSection() {
	$.ajax({
        type: 'GET',
        url: 'getDataBase.php?getSection',
        dataType: "json",
        async:false,
        success: function(data) {
            jsonSection = data;
        }
    });
}

function getBlock() {
	$.ajax({
        type: 'GET',
        url: 'getDataBase.php?getBlock',
        dataType: "json",
        async:false,
        success: function(data) {
            jsonBlock = data;
        }
    });
}

function getAsh() {
	$.ajax({
        type: 'GET',
        url: 'getDataBase.php?getAsh',
        dataType: "json",
        async:false,
        success: function(data) {
            jsonAsh = data;
        }
    });
}

function getAshLevel() {
	$.ajax({
        type: 'GET',
        url: 'getDataBase.php?getAshLevel',
        dataType: "json",
        async:false,
        success: function(data) {
            jsonAshLevel = data;
        }
    });
}

function getLotInterest() {
	$.ajax({
        type: 'GET',
        url: 'getDataBase.php?getLotInterest',
        dataType: "json",
        async:false,
        success: function(data) {
            jsonLotInterest = data;
        }
    });
}

function getAshInterest() {
	$.ajax({
        type: 'GET',
        url: 'getDataBase.php?getAshInterest',
        dataType: "json",
        async:false,
        success: function(data) {
            jsonAshInterest = data;
        }
    });
}

function getCustomer() {
	$.ajax({
        type: 'GET',
        url: 'getDataBase.php?getCustomer',
        dataType: "json",
        async:false,
        success: function(data) {
            jsonCustomer = data;
        }
    });
}

function getDependency() {
	$.ajax({
        type: 'POST',
        url: 'getDataBase.php?getDependency',
        dataType: "json",
        async:false,
        success: function(data) {
            jsonDependency = data;
        }
    });
}

function sendLot() {
	  //var tmp = JSON.stringify($('.dd').nestable('serialize'));
	  // tmp value: [{"id":21,"children":[{"id":196},{"id":195},{"id":49},{"id":194}]},{"id":29,"children":[{"id":184},{"id":152}]},...]
	  $.ajax({
	    type: 'POST',
	    url: 'sendData.php',
	    data: {'categories': jsonLot},
	    success: function(msg) {console.log(msg);
	      alert(msg);
	    }
	  });
}