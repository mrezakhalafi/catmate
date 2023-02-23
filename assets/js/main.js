$(document).ready(function(){

	var url = $('meta[name=url]').attr("content");
 	var base_url = url + "index.php/";
	var base_url2 = url;

	function requestSearch(){
		console.log(ras);
	}

	$('#cariRas').on('change', function() {

		var nama = $(this).find(':selected').data('nama')
		var id = $(this).find(':selected').data('id')
        var data = `<div class="form-group m-0 isi-category">
            <label class="bungkus-check m-0"><span class="txt-dark">`+ nama +`</span>
                <input type="checkbox" class="listnama" value="`+id+`" checked>
                <span class="checkmark"></span>
            </label>
        </div>`;

      	var listnama = $('.listnama').val();

      	var check = 0;

      	$('.listnama').each(function(i, obj) {
		    if (id == $(this).val()) {
	    	  	
	    	  	check = 1;
	    	  	$(this).attr('checked','checked');
	    	  	
		    }
		});

		if (check == 0 ) {
			$('#rasTampung').append(data);
		}
	
	});

	$('#btnCari').on('click', function() {
		var rass = [];
		$('.listkucing').html("");


		$('.listnama:checked').each(function(i, obj) {
			rass.push($(this).val());
		});

		var kotaa = $('.rbtempat:checked').val();
		var jkk = $('.jkucing:checked').val();
		// console.log(kota);
		// console.log(jk);

		$('#check_id').val();

		 $.ajax({
		    type: "POST",
	    	data: {
	    	  jk : jkk,
	          kota : kotaa,
	          ras : rass
	    	},
		    url: base_url + 'User/filterKucing',
		    success: function (result) {
		      var objResult = JSON.parse(result);
		      console.log(objResult);
		      $.each(objResult, function (i, v) {
		      	// console.log(v);
		      	$('.listkucing').append(`
				<div class="col-lg-4 mb-4">
                    <div class="card pricing popular">
                        <div class="card-body">
                            <div class="bungkus-card">
                                <img src="` + base_url2 + v.foto +`" class="w-100">
                                <div class="overlay">
                                    <div class="text">
                                        `+ v.nama +`
                                    </div>
                                </div>
                            </div>
                            <a href="`+ base_url+`user/detailKucing/`+ v.id +`" class="btn btn-catmate btn-lg btn-block mt-4">Detail Kucing</a>
                        </div>
                    </div>
                </div>

		      	`);
		      });
		  }
		});



	});


});