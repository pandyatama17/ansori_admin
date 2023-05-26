$(document).ready(function(){
    $("#tahunAjarSelect").on('change',function() 
    {
        $("#siswaInputTahunAjar").val($(this).val());
        // if ($('#kelasSelect').val() != '' && $('#tingkatanSelect').val() != '') {
        //     $("#tingkatanSelect").trigger('change');
        // }
    });
    $("#tingkatanSelect").on('change',function() 
    {
        let tingkatan = $(this).val();
        // console.log(tingkatan);
        $("#siswaInputTingkatan").val(tingkatan);
        var newOptions;
        switch (tingkatan) {
            case '3':
                var newOptions = {
                    "1": "1",
                    "2": "2",
                    "3": "3",
                    "3": "4",
                    "3": "5",
                    "3": "6"
                };
                break;
            case '4':
                var newOptions = {
                    "VII": "7",
                    "VIII": "8",
                    "IX": "9"
                };
                break;
            case '5':
                var newOptions = {
                    "X": "10",
                    "XI": "11",
                    "XII": "12"
                };
                break;
            default:
                break;
        }
        // console.log(newOptions);
        var select = $("#kelasSelect");
        select.empty();
        select.append($("<option></option>").text('Pilih Kelas').prop('disabled','disabled').prop('selected','selected'));
        $.each(newOptions, function(key,value) {
            select.append($("<option></option>")
            .attr("value", value).text(key));
        });
    });
    $("#kelasSelect").on('change',function () {
        var thajar = $("tahunAjarSelect").val();
        var tingkatan = $("tingkatanSelect").val();
        var kelas = $(this).val();
        $("#siswaInputKelas").val(kelas);
        var form = $('#generateNisForm');
        // $.ajax({
        //     url: form.attr('action'),
        //     type: "POST",
        //     data: form.serializeObject(),
        //     beforeSend: function(){
        //         $(".main-loader").show();
        //     },
        //     success: function(response){
        //         $(".main-loader").hide();
        //         $("#generatedNIS").val(response);             
        //     },
        //     error: function (xhr, ajaxOptions, thrownError) {
        //         $(".main-loader").hide();
        //         console.log(thrownError);
        //     }
        // })
    });
    $("#generateNISButton").on('click',function(event) {
        $("#kelasSelect").trigger('change');
    });
    $("#generateNopenButton").on('click',function(event) {
        $.ajax({
            url: '/ajaxHandler/pmb/generateNopen',
            type: "GET",
            beforeSend: function(){
                $(".main-loader").show();
            },
            success: function(response){
                $(".main-loader").hide();
                $("#nopen").val(response);             
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $(".main-loader").hide();
                console.log(thrownError);
            }
        })
    });
    $('.rupiah').simpleMoneyFormat();
    $('.rupiah').inputFilter(function(value) {
        return /^[-,0-9]+$/.test(value);    // Allow digits only, using a RegExp
      },"Only digits allowed");
    $(".collapsible .col").collapsible({ accordion: false });
});
// Restricts input for the set of matched elements to the given inputFilter function.
(function($) {
    $.fn.inputFilter = function(callback, errMsg) {
      return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function(e) {
        if (callback(this.value)) {
          // Accepted value
          if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
            $(this).removeClass("input-error");
            this.setCustomValidity("");
          }
          this.oldValue = this.value;
          this.oldSelectionStart = this.selectionStart;
          this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
          // Rejected value - restore the previous one
          $(this).addClass("input-error");
          this.setCustomValidity(errMsg);
          this.reportValidity();
          this.value = this.oldValue;
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        } else {
          // Rejected value - nothing to restore
          this.value = "";
        }
      });
    };
  }(jQuery));