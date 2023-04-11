<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<input type="hidden" name="" class="hideFunction">
<!-- begin:: Content -->
<div class="pageContent loginPagePadding">
	<div class="pageTitle" data-lang="">
		<?php echo $translations['M03289'][$language]; //Add New Address ?>
	</div>
	<div class="mt-3 whiteBg">
		<div class="row">
			<div class="form-group col-md-6 col-12">
				<label data-lang="M03194"><?php echo $translations['M00177'][$language]; //Full Name ?></label>
				<input id="fullnameInp" type="text" class="form-control">
				<span id="fullname"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M02298"><?php echo $translations['M02298'][$language]; //Phone Number ?></label>
				<div class="row">
					<div class="col-md-4 col-5">
						<select id="dialingArea" class="form-control"></select>
					</div>
					<div class="col-md-8 col-7 pl-0">
						<input oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" type="text" class="form-control" id="phoneInp">
					</div>
				</div>
				<span id="phone"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M02466"><?php echo $translations['M02466'][$language]; //Address ?></label>
				<input id="addressInp" type="text" class="form-control">
				<span id="address"></span>
			</div>
			<div class="form-group col-lg-6 ccol-12">
				<label data-lang="M00178"><?php echo $translations['M00178'][$language]; //Country ?></label>
				<select id="countryInp" class="form-control">
					<option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>
				</select>
				<span id="countryID"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M00181"><?php echo $translations['M00181'][$language]; //Province ?></label>
				<select id="provinceSelect" class="form-control">
                    <!-- <option><?php echo $translations['M03502'][$language]; //Select Province ?></option> -->
                </select>
				<span id="state"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M00676"><?php echo $translations['M00676'][$language]; //City ?></label>
				<select id="citySelect" class="form-control" disabled>
                    <!-- <option><?php echo $translations['M03501'][$language]; //Select City ?></option> -->
                </select>
				<!-- <input id="cityInp" type="text" class="form-control"> -->
				<span id="city"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M03497"><?php echo $translations['M03497'][$language]; //District ?></label>
				<select id="districtSelect" class="form-control" disabled>
                    <!-- <option><?php echo $translations['M03498'][$language]; //Select District ?></option> -->
                </select>
				<span id="district"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M03155"><?php echo $translations['M03155'][$language]; //Sub-District ?></label>
				<select id="subDistrictSelect" class="form-control" disabled>
                    <!-- <option><?php echo $translations['M03499'][$language]; //Select Sub-District ?></option> -->
                </select>
				<span id="subDistrict"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M03158"><?php echo $translations['M03158'][$language]; //Zip code ?></label>
				<select id="postalSelect" class="form-control" disabled>
                    <!-- <option><?php echo $translations['M03500'][$language]; //Select Zip Code ?></option> -->
                </select>
				<!-- <input id="postalInp" type="text" class="form-control"> -->
				<span id="postalCode"></span>
			</div>
			<div class="form-group col-md-6 col-12">
				<label data-lang="M00187"><?php echo $translations['M00187'][$language]; //Email Address ?></label>
				<input id="emailInp" type="text" class="form-control">
				<span id="email"></span>
			</div>
			<div class="col-12">
                <input type="checkbox" id="setDefault" name="setDefault" class="mr-1" style="cursor: pointer">
                <label for="setDefault" class="checkboxTxt">
                    <?php echo $translations['M03290'][$language]; /* Make this default address */ ?></label>
            </div>
			<div class="mt-3 col-12">
				<button type="button" id="addNewAddressBtn" class="btn-primary btn"><?php echo $translations['M02756'][$language]; //Save ?></button>
			</div>
		</div>
	</div>
</div>
<!-- end:: Content -->
<?php include 'footer.php'; ?>
</body>

<!-- end:: Page -->

<!-- begin::Scrolltop -->
<?php include 'backToTop.php' ?>
<!-- end::Scrolltop -->

<?php include 'sharejs.php'; ?>



<!-- end::Body -->
</html>

<script>
	var url             = 'scripts/reqDefault.php';
	var jsonUrl         = 'json/addressList.json';
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 0;
	var fCallback = "";
	var countriesList;
    var districtList;
    var subDistrictList;
    var postalCodeList;
    var cityList;
    var stateList;
    var saveJsonData;


	$(document).ready(function(){
		var formData  = {
            command   : "getRegistrationDetailMember"
        };
        var fCallback = loadCountryList;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        /*$('#countryInp').change(function(){
            var dialingArea = $('#countryInp option:selected').attr('data-code');
            $('#dialingArea').val(dialingArea);
        });*/

        /*$('#dialingArea').change(function() {
            var country = $('#dialingArea option:selected').attr('name');
            $(`#countryInp option[name="${country}"]`).prop('selected', true);

            countryChanged();
        })*/

        /*$('#countryInp').change(function() {
            countryChanged();
        });*/

		$("#addNewAddressBtn").click(function(){
			$("input").each(function(){
                $(this).removeClass('is-invalid');
                $('.invalid-feedback').html("");
            });
            if($("#setDefault").is(":checked")){

            }
            var fullname = $('#fullnameInp').val();
            var dialingArea = $('#dialingArea').val();
            var phone = $('#phoneInp').val();
            var email = $('#emailInp').val();
            var address = $('#addressInp').val();
            var districtID = $('#districtSelect').find('option:selected').val();
            var subDistrictID = $('#subDistrictSelect').find('option:selected').val();
            var cityID = $('#citySelect').find('option:selected').val();
            var postalCodeID = $('#postalSelect').find('option:selected').val();
            var stateID = $('#provinceSelect').find('option:selected').val();
            var countryID = $('#countryInp').find('option:selected').val();
            var isDefault;
            if ($("#setDefault").is(":checked")) {
                isDefault = 1;
            } else {
                isDefault = 0;
            }

            formData  = {
	            command 		: "addAddress",
	            addressType 	: 'delivery',
	            fullname 		: fullname,
				dialingArea 	: dialingArea,
				phone 			: phone,
				email 			: email,
				address 		: address,
				districtID 		: districtID,
				subDistrictID 	: subDistrictID,
				cityID 			: cityID,
				stateID 		: stateID,
				countryID 		: countryID,
				disabled 		: 0,
				postalCodeID	: postalCodeID,
				isDefault 		: isDefault
	        };

	        fCallback = addAddressSucc;
	        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		});

		$('#dialingArea').change(function() {
			var dialingCountry = $('#dialingArea option:selected').attr('name');
            $("#countryInp > option").each(function() {
                if($(this).attr('name') === dialingCountry)
                    $("#countryInp").val($(this).val()).change();
            });
        });
	});

	/*function SortByName(a, b){
	    var aName = a.name.toLowerCase();
	    var bName = b.name.toLowerCase(); 
	    return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
	}*/

	function loadCountryList(data,message){
		$.getJSON(jsonUrl, function( jsonData ) {
        saveJsonData = jsonData;

	        // countriesList = jsonData.countriesList;
	        // countriesList.sort(SortByName);
	        // districtList = jsonData.countyList;
	        // districtList.sort(SortByName);
	        // subDistrictList = jsonData.subCountyList;
	        // subDistrictList.sort(SortByName);
	        // postalCodeList = jsonData.postalCodeList;
	        // cityList = jsonData.cityList;
	        // cityList.sort(SortByName);
	        // stateList = jsonData.stateList;
	        // stateList.sort(SortByName);
	        // var firstCountry = saveJsonData['countriesList'][0]['id'];
	        if(saveJsonData['countriesList']) {
            	$.each(saveJsonData['countriesList'], function(k,v) {
	                var selected = '';

	                var countryDisplay = '';
	                countryDisplay = v['display'];

	                $('#countryInp').append('<option value="'+v['id']+'" data-code="+'+v['countryCode']+'" name="'+v['name']+'" '+selected+'>'+countryDisplay+'</option>');
	                $('#dialingArea').append('<option value="'+v['countryCode']+'" data-code="+'+v['countryCode']+'" name="'+v['name']+'" display="'+countryDisplay+'" '+selected+'>+'+v['countryCode']+'</option>');
	            });

	            // if (country) {
	            //     $('#country').val(country);
	            // }
	            
	            // var phoneCode = $('#country option:selected').attr('data-code');
	            // $('#phoneCode').text(phoneCode);
	        }

	        var dialingCountry = $('#dialingArea option:selected').attr('name');
            $("#countryInp > option").each(function() {
                if($(this).attr('name') === dialingCountry)
                    $("#countryInp").val($(this).val()).change();
            });

	        // filter state based on country selected then build option
	        var countryInp = $("#countryInp").val();
	        filterData("provinceSelect", countryInp, "country_id", "stateList", "id", "stateDisplay");

	        // filter city based on state selected then build option
	        var stateID = $("#provinceSelect").val();
	        filterData("citySelect", stateID, "state_id", "cityList", "id", "cityDisplay");

	        // filter district based on state selected then build option
	        var cityID = $("#citySelect").val();
	        filterData("districtSelect", cityID, "city_id", "countyList", "id", "countyDisplay");

	        // filter sub district based on state selected then build option
	        var countyID = $("#districtSelect").val();
	        filterData("subDistrictSelect", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

	        // filter zipcode based on state selected then build option
	        var subCountyID = $("#subDistrictSelect").val();
	        filterData("postalSelect", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

	        

	        $("#countryInp").change(function(){
	        	var countryInp = $('#countryInp').val();
	        	filterData("provinceSelect", countryInp, "country_id", "stateList", "id", "stateDisplay");

	        	var stateID = $("#provinceSelect").val();
	        	filterData("citySelect", stateID, "state_id", "cityList", "id", "cityDisplay");

	        	var cityID = $("#citySelect").val();
	        	filterData("districtSelect", cityID, "city_id", "countyList", "id", "countyDisplay");

	        	var countyID = $("#districtSelect").val();
	        	filterData("subDistrictSelect", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

	        	var subCountyID = $("#subDistrictSelect").val();
	        	filterData("postalSelect", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

	            $('#provinceSelect').prop("disabled",true);
	            $('#citySelect').prop("disabled",true);
	            $('#districtSelect').prop("disabled",true);
	            $('#subDistrictSelect').prop("disabled",true);
	            $('#postalCodeSelect').prop("disabled",true);

	            var countryDDL = $('#countryInp option:selected').val();
	            countryDDL != "-"? ($('#provinceSelect').prop("disabled",false)) : ($('#provinceSelect').prop("disabled",true));
	            var stateDDL = $('#provinceSelect option:selected').val();
	            stateDDL != "-"? ($('#citySelect').prop("disabled",false)) : ($('#citySelect').prop("disabled",true));
	            var cityDDL = $('#citySelect option:selected').val();
	            cityDDL != "-"? ($('#districtSelect').prop("disabled",false)) : ($('#districtSelect').prop("disabled",true));
	            var districtDDL = $('#districtSelect option:selected').val();
	            districtDDL != "-"? ($('#subDistrictSelect').prop("disabled",false)) : ($('#subDistrictSelect').prop("disabled",true));
	            var subDistrictDDL = $('#subDistrictSelect option:selected').val();
	            subDistrictDDL != "-"? ($('#postalSelect').prop("disabled",false)) : ($('#postalSelect').prop("disabled",true));
	        });

	        $("#provinceSelect").change(function(){
	            var stateID = $(this).val();
	            filterData("citySelect", stateID, "state_id", "cityList", "id", "cityDisplay");

	            var cityID = $("#citySelect").val();
	            filterData("districtSelect", cityID, "city_id", "countyList", "id", "countyDisplay");

	            var countyID = $("#districtSelect").val();
	            filterData("subDistrictSelect", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

	            var subCountyID = $("#subDistrictSelect").val();
	            filterData("postalSelect", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

	            $('#citySelect').prop("disabled",true);
	            $('#districtSelect').prop("disabled",true);
	            $('#subDistrictSelect').prop("disabled",true);
	            $('#postalCodeSelect').prop("disabled",true);

	            var stateDDL = $('#provinceSelect option:selected').val();
	            stateDDL != "-"? ($('#citySelect').prop("disabled",false)) : ($('#citySelect').prop("disabled",true));
	            var cityDDL = $('#citySelect option:selected').val();
	            cityDDL != "-"? ($('#districtSelect').prop("disabled",false)) : ($('#districtSelect').prop("disabled",true));
	            var districtDDL = $('#districtSelect option:selected').val();
	            districtDDL != "-"? ($('#subDistrictSelect').prop("disabled",false)) : ($('#subDistrictSelect').prop("disabled",true));
	            var subDistrictDDL = $('#subDistrictSelect option:selected').val();
	            subDistrictDDL != "-"? ($('#postalSelect').prop("disabled",false)) : ($('#postalSelect').prop("disabled",true));
	        });

	        $("#citySelect").change(function(){
	            var cityID = $(this).val();
	            filterData("districtSelect", cityID, "city_id", "countyList", "id", "countyDisplay");

	            var countyID = $("#districtSelect").val();
	            filterData("subDistrictSelect", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

	            var subCountyID = $("#subDistrictSelect").val();
	            filterData("postalSelect", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

	            $('#districtSelect').prop("disabled",true);
	            $('#subDistrictSelect').prop("disabled",true);
	            $('#postalCodeSelect').prop("disabled",true);

	            var cityDDL = $('#citySelect option:selected').val();
	            cityDDL != "-"? ($('#districtSelect').prop("disabled",false)) : ($('#districtSelect').prop("disabled",true));
	            var districtDDL = $('#districtSelect option:selected').val();
	            districtDDL != "-"? ($('#subDistrictSelect').prop("disabled",false)) : ($('#subDistrictSelect').prop("disabled",true));
	            var subDistrictDDL = $('#subDistrictSelect option:selected').val();
	            subDistrictDDL != "-"? ($('#postalSelect').prop("disabled",false)) : ($('#postalSelect').prop("disabled",true));
	        });

	        $("#districtSelect").change(function(){
	            var countyID = $(this).val();
	            filterData("subDistrictSelect", countyID, "county_id", "subCountyList", "id", "subCountyDisplay");

	            var subCountyID = $("#subDistrictSelect").val();
	            filterData("postalSelect", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

	            $('#subDistrictSelect').prop("disabled",true);
	            $('#postalCodeSelect').prop("disabled",true);

	            var districtDDL = $('#districtSelect option:selected').val();
	            districtDDL != "-"? ($('#subDistrictSelect').prop("disabled",false)) : ($('#subDistrictSelect').prop("disabled",true));
	            var subDistrictDDL = $('#subDistrictSelect option:selected').val();
	            subDistrictDDL != "-"? ($('#postalSelect').prop("disabled",false)) : ($('#postalSelect').prop("disabled",true));
	        });

	        $("#subDistrictSelect").change(function(){
	            var subCountyID = $(this).val();
	            filterData("postalSelect", subCountyID, "sub_county_id", "postalCodeList", "id", "postalCode");

	            $('#postalCodeSelect').prop("disabled",true);

	            var subDistrictDDL = $('#subDistrictSelect option:selected').val();
	            subDistrictDDL != "-"? ($('#postalSelect').prop("disabled",false)) : ($('#postalSelect').prop("disabled",true));
	        });

	        // if(countriesList) {
	        //     $.each(countriesList, function(key) {
	        //         var selected = '';

	        //         var countryDisplay = '';
	        //         countryDisplay = countriesList[key]['display'];

	        //         $('#countryInp').append('<option value="'+countriesList[key]['id']+'" data-code="+'+countriesList[key]['countryCode']+'" name="'+countriesList[key]['name']+'" '+selected+'>'+countryDisplay+'</option>');
	        //         $('#dialingArea').append('<option value="'+countriesList[key]['countryCode']+'" data-code="+'+countriesList[key]['countryCode']+'" name="'+countriesList[key]['name']+'" display="'+countryDisplay+'" '+selected+'>+'+countriesList[key]['countryCode']+'</option>');
	        //     }); 
	        // }

	        // if(districtList) {
	        //     $.each(districtList, function(key) {
	        //         var selected = '';
	        //         if(districtList[key]['country_id']==firstCountry) {
	        //             $('#districtSelect').append('<option value="'+districtList[key]['id']+'" data-code="'+districtList[key]['country_id']+'" name="'+districtList[key]['name']+'" '+selected+'>'+districtList[key]['name']+'</option>');
	        //         }
	        //     });
	        // }

	        // if(subDistrictList) {
	        //     $.each(subDistrictList, function(key) {
	        //         var selected = '';
	        //         if(subDistrictList[key]['country_id']==firstCountry) {
	        //             $('#subDistrictSelect').append('<option value="'+subDistrictList[key]['id']+'" data-code="'+subDistrictList[key]['country_id']+'" name="'+subDistrictList[key]['name']+'" '+selected+'>'+subDistrictList[key]['name']+'</option>');
	        //         }
	        //     });
	        // }

	        // if(postalCodeList) {
	        //     $.each(postalCodeList, function(key) {
	        //         var selected = '';
	        //         if(postalCodeList[key]['country_id']==firstCountry) {
	        //             $('#postalSelect').append('<option value="'+postalCodeList[key]['id']+'" data-code="'+postalCodeList[key]['country_id']+'" name="'+postalCodeList[key]['postalCode']+'" '+selected+'>'+postalCodeList[key]['postalCode']+'</option>');
	        //         }
	        //     });
	        // }

	        // if(cityList) {
	        //     $.each(cityList, function(key) {
	        //         var selected = '';
	        //         if(subDistrictList[key]['country_id']==firstCountry) {
	        //             $('#citySelect').append('<option value="'+cityList[key]['id']+'" data-code="'+cityList[key]['country_id']+'" data-code-2="'+cityList[key]['state_id']+'" name="'+cityList[key]['name']+'" '+selected+'>'+cityList[key]['name']+'</option>');
	        //         }
	        //     });
	        // }

	        // // console.log(stateList);
	        // if(stateList) {
	        //     $.each(stateList, function(key) {
	        //         var selected = '';
	        //         if(stateList[key]['country_id']==firstCountry) {
	        //             $('#provinceSelect').append('<option value="'+stateList[key]['id']+'" data-code="'+stateList[key]['country_id']+'" name="'+stateList[key]['stateDisplay']+'" '+selected+'>'+stateList[key]['stateDisplay']+'</option>');
	        //         }
	        //     });
	        // }
	        // $('#state').children().length==0 ? $('#state').prop('disabled', true) : $('#state').prop('disabled', false);
	    });
	}

	function filterData(nextSelectID, id, idVariable, nextAdd, value, display) {
	    var filteredArr = (saveJsonData[nextAdd]).filter((item) => item[idVariable] == id );
	    buildOption(nextSelectID, filteredArr, value, display);
	}

	function buildOption(id, data, value, display) {
	    var option = `<option value="-"><?php echo $translations['M00054'][$language]; //Please Select ?></option>`;
	    data = data.sort(function(a, b) {
	        var aName = a[display].toLowerCase();
	        var bName = b[display].toLowerCase(); 
	        return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
	    });
	    $.each(data, function(k,v){
	        option+=`<option value="${v[value]}">${v[display]}</option>`;
	    });
	    $("#"+id).html(option);

	    // new TomSelect("#"+id,{
	    //     sortField: {
	    //         field: "text",
	    //         direction: "asc"
	    //     }
	    // });
	}

	function focus() {
	  [].forEach.call(this.options, function(o) {
	    o.textContent = o.getAttribute('display') + ' (' + o.getAttribute('data-code') + ')';
	  });
	}
	function blur() {
	  [].forEach.call(this.options, function(o) {
	    // console.log(o);
	    o.textContent = o.getAttribute('data-code');
	  });
	}

	[].forEach.call(document.querySelectorAll('#dialingArea'), function(s) {
	    s.addEventListener('focus', focus);
	    s.addEventListener('blur', blur);
	    blur.call(s);
	});

	$('#dialingArea').change(function() {
	    $('#dialingArea').blur();
	});

	/*function countryChanged() {
	    var countryID = $('#countryInp option:selected').val();

	    $('#districtSelect').html('');
	    $('#districtSelect').html('<option><?php echo $translations['M00054'][$language]; //Please Select ?></option>');
	    $.each(districtList, function(key) {
	        var selected = '';
	        if(districtList[key]['country_id']==firstCountry) {
	            $('#district').append('<option value="'+districtList[key]['id']+'" data-code="'+districtList[key]['country_id']+'" name="'+districtList[key]['name']+'" '+selected+'>'+districtList[key]['name']+'</option>');
	        }
	    });

	    $('#subDistrictSelect').html('');
	    $('#subDistrictSelect').html('<option><?php echo $translations['M00054'][$language]; //Please Select ?></option>');
	    $.each(subDistrictList, function(key) {
	        var selected = '';
	        if(subDistrictList[key]['country_id']==firstCountry) {
	            $('#subDistrict').append('<option value="'+subDistrictList[key]['id']+'" data-code="'+subDistrictList[key]['country_id']+'" name="'+subDistrictList[key]['name']+'" '+selected+'>'+subDistrictList[key]['name']+'</option>');
	        }
	    });

	    $('#postalSelect').html('');
	    $('#postalSelect').html('<option><?php echo $translations['M00054'][$language]; //Please Select ?></option>');
	    $.each(postalCodeList, function(key) {
	        var selected = '';
	        if(stateList[key]['country_id']==countryID) {
	            $('#state').append('<option value="'+postalCodeList[key]['id']+'" data-code="'+postalCodeList[key]['country_id']+'" name="'+postalCodeList[key]['postalCode']+'" '+selected+'>'+postalCodeList[key]['postalCode']+'</option>');
	        }
	    });

	    $('#citySelect').html('');
	    $('#citySelect').html('<option><?php echo $translations['M00054'][$language]; //Please Select ?></option>');
	    $.each(cityList, function(key) {
	        var selected = '';
	        if(subDistrictList[key]['country_id']==firstCountry) {
	            $('#city').append('<option value="'+cityList[key]['id']+'" data-code="'+cityList[key]['country_id']+'" data-code-2="'+cityList[key]['state_id']+'" name="'+cityList[key]['name']+'" '+selected+'>'+cityList[key]['name']+'</option>');
	        }
	    });

	    $('#provinceSelect').html('');
	    $('#provinceSelect').html('<option><?php echo $translations['M00054'][$language]; //Please Select ?></option>');
	    $.each(stateList, function(key) {
	        var selected = '';
	        if(stateList[key]['country_id']==countryID) {
	            $('#state').append('<option value="'+stateList[key]['id']+'" data-code="'+stateList[key]['country_id']+'" name="'+stateList[key]['stateDisplay']+'" '+selected+'>'+stateList[key]['stateDisplay']+'</option>');
	        }
	    });
	}*/

	function addAddressSucc(data,message){
		showMessage(message, 'success', '<?php echo $translations['M00228'][$language]; /* Congratulations */ ?>', 'success', 'addressListing');
	}
</script>
