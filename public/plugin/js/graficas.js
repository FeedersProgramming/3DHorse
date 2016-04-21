

var graf1 = AmCharts.makeChart("graf1", {
	"type": "pie",
	"startDuration": 0,
	"theme": "light",
	"addClassNames": true,
	"legend":{
		"position":"right",
		"marginRight":100,
		"autoMargins":false
	},
	"innerRadius": "30%",
	"defs": {
		"filter": [{
			"id": "shadow",
			"width": "200%",
			"height": "200%",
			"feOffset": {
				"result": "offOut",
				"in": "SourceAlpha",
				"dx": 0,
				"dy": 0
			},
			"feGaussianBlur": {
				"result": "blurOut",
				"in": "offOut",
				"stdDeviation": 5
			},
			"feBlend": {
				"in": "SourceGraphic",
				"in2": "blurOut",
				"mode": "normal"
			}
		}]
	},
	"dataProvider": ajaxgraficas('HorseAnatomy/graficas/', 'grafica1'),
	"valueField": "value",
	"titleField": "Evaluacion",
	"export": {
		"enabled": true
	}
});

graf1.addListener("init", handleInit1);

graf1.addListener("rollOverSlice", function(e) {
	handleRollOver1(e);
});

function handleInit1(){
	graf1.legend.addListener("rollOverItem", handleRollOver1);
}

function handleRollOver1(e){
	var wedge = e.dataItem.wedge.node;
	wedge.parentNode.appendChild(wedge);  
}

	//console.log('hola ', datos);

	var graf2 = AmCharts.makeChart("graf2", {
		"type": "pie",
		"startDuration": 0,
		"theme": "light",
		"addClassNames": true,
		"legend":{
			"position":"right",
			"marginRight":100,
			"autoMargins":false
		},
		"innerRadius": "30%",
		"defs": {
			"filter": [{
				"id": "shadow",
				"width": "200%",
				"height": "200%",
				"feOffset": {
					"result": "offOut",
					"in": "SourceAlpha",
					"dx": 0,
					"dy": 0
				},
				"feGaussianBlur": {
					"result": "blurOut",
					"in": "offOut",
					"stdDeviation": 5
				},
				"feBlend": {
					"in": "SourceGraphic",
					"in2": "blurOut",
					"mode": "normal"
				}
			}]
		},
		"dataProvider": [{
			"evaluacion": "Teorico Buenas",
			"value": 15
		}, {
			"evaluacion": "Teorico Malas",
			"value": 0
		},{
			"evaluacion": "Practico Buenas",
			"value": 8
		}, {
			"evaluacion": "Practico Malas",
			"value": 7
		}],
		"valueField": "value",
		"titleField": "evaluacion",
		"export": {
			"enabled": true
		}
	});

	graf2.addListener("init", handleInit2);

	graf2.addListener("rollOverSlice", function(e) {
		handleRollOver2(e);
	});

	function handleInit2(){
		graf2.legend.addListener("rollOverItem", handleRollOver2);
	}

	function handleRollOver2(e){
		var wedge = e.dataItem.wedge.node;
		wedge.parentNode.appendChild(wedge);  
	}