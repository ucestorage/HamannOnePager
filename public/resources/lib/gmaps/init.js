jQuery(document).ready(function(){

var map = new GMaps({
el: '#map', lat:51.8091 , lng:9.4406713 , zoom: 11, zoomControl: true,
zoomControlOpt: {style:'SMALL', position:'TOP_LEFT'}, panControl: false, scroolWheel: false });

map.addMarker({ lat: 51.8091, lng:9.4406713 , title: 'Fitz Hamann Speditionsgesellschaft mbH & Co. KG',
infoWindow: {content: '<p>Spedition Hamann, Lüchtringer Weg 18, D-37603 Holzminden</p>'}});


});
