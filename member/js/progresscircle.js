function makesvg(percentage, inner_text="", id){

  var abs_percentage = Math.abs(percentage).toString();
  var percentage_str = percentage.toString();
  var classes = "success-stroke";
  
  var svg = '';
  
  if (abs_percentage == 0)
    classes = "no-stroke";

  if (id === "currentRankPercentage"){
    classes = "rank-stroke";
	  svg = '<svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg">'
		 + '<circle class="circle-chart__background2" cx="16.9" cy="16.9" r="15.9" />'
		 + '<circle class="circle-chart__circle '+classes+'"'
		 + 'stroke-dasharray="'+ abs_percentage+',100"    cx="16.9" cy="16.9" r="15.9" />'
		 + '<g class="circle-chart__info">'
		 + '<text class="circle-chart__percent" x="17.9" y="15.5">'
     + '<p style="color: white;margin-top: -50px;transform: translateY(-55px);font-size: 40px;">'+percentage_str+'%</p>'
     + '</text>';
  } else {
	  svg = '<svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg">'
		 + '<circle class="circle-chart__background" cx="16.9" cy="16.9" r="15.9" />'
		 + '<circle class="circle-chart__circle '+classes+'"'
		 + 'stroke-dasharray="'+ abs_percentage+',100"    cx="16.9" cy="16.9" r="15.9" />'
		 + '<g class="circle-chart__info">'
		 + '   <text class="circle-chart__percent" x="17.9" y="15.5">'+percentage_str+'%</text>';
  }

  if(inner_text){
    svg += '<text class="circle-chart__subline" x="16.91549431" y="22">'+inner_text+'</text>'
  }
  
  svg += ' </g></svg>';
  
  return svg
}

(function( $ ) {

    $.fn.circlechart = function() {
        this.each(function() {
            var percentage = $(this).data("percentage");
            var inner_text = $(this).text();
			      var id         = $(this).attr('id');
            $(this).html(makesvg(percentage, inner_text, id));
        });
        return this;
    };

}( jQuery ));