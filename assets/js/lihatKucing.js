$(".list2").hide();

$('.kategori').click(function () {

  var idd = $(this).data('id');
  var userr = $(this).data('user');

  var url = $('meta[name=url]').attr("content");
  var base_url = url + "index.php/";
  var base_url2 = url;

  $(".hehe").html("");
  $('.all').removeClass('btn-secondary-category-active');

  $('.kategori').removeClass('btn-secondary-category-active');
  $(this).removeClass('btn-secondary-category').addClass('btn-secondary-category-active');

  output = "<div class='col-lg-3 mb-4'>";
  output += "<div class='card pricing popular'>";
  output += "<div class='card-body' style='height: 400px'>";
  output += "<a href=''>";
  output += "<div class='bungkus-card-tambah'>";
  output += "<img src='" + base_url2 + "assets/images/addcat.png' class='w-100'  style='margin-top: 30px'>";
  output += "<div class='overlay'>";
  output += " <div class='text'>Add A Cat</div>";
  output += "</div>";
  output += "</div>";
  output += "</a>";
  output += "</div>";
  output += "</div>";
  output += "</div>";

  $.ajax({
    type: "POST",
    data: {
      id:  idd,
      user: userr
    },
    url: base_url + 'User/getKategori',
    success: function (result) {
      var objResult = JSON.parse(result);

      $.each(objResult, function (i, v) {

        output += "<div class='col-lg-3 mb-4'>";
        output += "<div class='card pricing popular'>";
        output += "<div class='card-body'>";
        output += "<div class='bungkus-card'>";
        output += "<img src='" + base_url2 + v.foto + "' class='w-100'>";
        output += "<div class='overlay'>";
        output += " <div class='text'>";
        output += "" + v.nama + "";
        output += "</div>";
        output += "</div>";
        output += "</div>";
        output += "<div class='col-lg-12 pr-2'>";
        output += "<a href='"+base_url+'user/detailKucing/'+v.id+"' class='btn btn-catmate btn-lg btn-block mt-4'>Detail</a>"
        output += "</div>"
        output += "<div class='row'>";
        output += "<div class='col-lg-6 pr-2'>";
        output += "<a href='"+base_url+'user/ubahKucing/'+v.id+"' class='btn btn-catmate-secondary btn-block mt-4'>Ubah</a>";
        output += "</div>";
        output += "<div class='col-lg-6 pl-2'>";
        output += "<a href='"+base_url+'user/hapusKucing/'+v.id+"' class='btn btn-catmate-secondary btn-block mt-4'>Hapus</a>";
        output += "</div>";
        output += "</div>";
        output += "</div>";
        output += "</div>";
        output += "</div>";

        $(".hehe").html(output);

      });
    }
  });
})

$('.kategoriAll').click(function () {
  var url = $('meta[name=url]').attr("content");
  var base_url = url + "index.php/";
  var base_url2 = url;

  var userr = $(this).data('user');

  $(".hehe").html("");
  $('.all').removeClass('btn-secondary-category-active');

  $('.kategori').removeClass('btn-secondary-category-active');
  $(this).removeClass('btn-secondary-category').addClass('btn-secondary-category-active');

  output = "<div class='col-lg-3 mb-4'>";
  output += "<div class='card pricing popular'>";
  output += "<div class='card-body' style='height: 400px'>";
  output += "<a href=''>";
  output += "<div class='bungkus-card-tambah'>";
  output += "<img src='" + base_url2 + "assets/images/addcat.png' class='w-100' style='margin-top: 30px'>";
  output += "<div class='overlay'>";
  output += " <div class='text'>Add A Cat</div>";
  output += "</div>";
  output += "</div>";
  output += "</a>";
  output += "</div>";
  output += "</div>";
  output += "</div>";

  $.ajax({
    type: "POST",
     data: {
      user: userr
    },
    url: base_url + 'User/getKategoriAll',
    success: function (result) {
      var objResult = JSON.parse(result);

      $.each(objResult, function (i, v) {

        output += "<div class='col-lg-3 mb-4'>";
        output += "<div class='card pricing popular'>";
        output += "<div class='card-body'>";
        output += "<div class='bungkus-card'>";
        output += "<img src='" + base_url2 + v.foto + "' class='w-100'>";
        output += "<div class='overlay'>";
        output += " <div class='text'>";
        output += "" + v.nama + "";
        output += "</div>";
        output += "</div>";
        output += "</div>";
        output += "<div class='col-lg-12 pr-2'>";
        output += "<a href='"+base_url+'user/detailKucing/'+v.id+"' class='btn btn-catmate btn-lg btn-block mt-4'>Detail</a>"
        output += "</div>"
        output += "<div class='row'>";
        output += "<div class='col-lg-6 pr-2'>";
        output += "<a href='"+base_url+'user/ubahKucing/'+v.id+"' class='btn btn-catmate-secondary btn-block mt-4'>Ubah</a>";
        output += "</div>";
        output += "<div class='col-lg-6 pl-2'>";
        output += "<a href='"+base_url+'user/hapusKucing/'+v.id+"' class='btn btn-catmate-secondary btn-block mt-4'>Hapus</a>";
        output += "</div>";
        output += "</div>";
        output += "</div>";
        output += "</div>";
        output += "</div>";

        $(".hehe").html(output);

      });
    }
  });
});