$(document).ready(function(){
    var areaItems = [];
    var item;
    $('#hotDesksMap area').each(function(i, obj) {
      if ($(this).data('availability') == "0") {
        item = {},
        item['key'] = $(this).data('key').toString(),
        item['stroke'] = true,
        item['staticSelect'] = true,
        item['isDeselectable'] = false,
        item['selected'] = true,
        item['render_select'] = {
            fillOpacity: .8,
            fillColor: '9e9e9e',
            stroke : .8,
            strokeColor: '9e9e9e',
        },
        item['render_highlight'] = {
          fillOpacity: .8,
          fillColor: '9e9e9e',
          stroke : .8,
          strokeColor: '9e9e9e',
        }
        areaItems.push(item);
      }
      else{
        if ($(this).data('status') == "0" && $(this).data('status') == "0") {
            item = {},
            item['key'] = $(this).data('key').toString(),
            item['stroke'] = true,
            item['staticSelect'] = true,
            item['isDeselectable'] = false,
            item['selected'] = true,
            item['render_select'] = {
                fillOpacity: 1,
                fillColor: 'b71c1c',
                stroke : 1,
                strokeColor: 'b71c1c',
            },
            item['render_highlight'] = {
              fillOpacity: 1,
              fillColor: 'b71c1c',
              stroke :  1,
              strokeColor: 'b71c1c',
          }
        
        areaItems.push(item);
      }}
    });
    console.log(areaItems);
    var selectedBefore;
    var selectedCurrent;
    var status;
    var available;
    var SBstatus;
    var SBavailable;
    var mapper = $('#hotDesksImg');
    mapper.mapster({
        mapKey: 'data-key',
        fillColor: 'ff0000',
        fillOpacity: 0.3,
      isSelectable: true ,
      tooltip: 'data-tooltip',
      render_highlight: {
          strokeWidth: 0,
          fillColor: 'eeff41',
          fillOpacity: .5,
          mapkey: 'data-key',
          stroke: false,
      },
      render_select: {
          fillColor: 'ffff00',
          strokeWidth: 4,
          fillOpacity: 0,
          stroke: true,
      },
      areas: areaItems,
      onClick:function(e) {
        selectedCurrent = e.key;
        // console.log(e);
        status = $("#room-"+selectedCurrent).data('status');
        available = $("#room-"+selectedCurrent).data('availability');
        SBstatus = $("#room-"+selectedBefore).data('status');
        SBavailable = $("#room-"+selectedBefore).data('availability');
        console.log("SC : " + selectedCurrent+", stat : "+status+" | SB  "+selectedBefore+", stat : "+SBstatus);
        if (status != 0 && available != 0) {
          if (selectedBefore) {
            if ($("#room-"+selectedBefore).data('status') != 0) {
              mapper.mapster('set', false, selectedBefore);
            }
          }
          selectedBefore = e.key;
        }
        else {
          // e.preventDefault();
          return false;
        }
        $("#deskInputDisplay").attr('readonly',false);
        $("#deskInputDisplay").val($(this).data('name'));
        $("#deskInputDisplay2").attr('readonly',false);
        $("#deskInputDisplay2").val($(this).data('name'));
        $("#deskInput").val($(this).data('key'));
        $("#deskInputDisplay").attr('readonly','readonly');
        $("#deskInputDisplay2").attr('readonly','readonly');
        if(isMobile)
        {
          $("#bookingFormCollapsible").collapsible('open',0);
          $("#bookingDesksCollapsible").collapsible('close',0);
        }
        else
        {
          $("#adminFormCollapsible").collapsible('close',0);
          $("#adminConfirmationCollapsible").collapsible('open',0);
        }
      }
    });

$('#hotDeskImg').bind("contextmenu",function(e){
  return false;
});
});
